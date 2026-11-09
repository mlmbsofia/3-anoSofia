
<?php
session_start();

require 'conexao.php';
require 'funcoes.php';
require 'csrf.php';

$mensagem = '';
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = strtolower(trim($_POST['email'] ?? ''));
    $confirmarEmail = strtolower(
        trim($_POST['confirmar_email'] ?? '')
    );
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');

    if (!verificarTokenCsrf()) {
        $erro = 'Sessão expirada. Atualize a página.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'Informe um e-mail válido.';
    } elseif ($email !== $confirmarEmail) {
        $erro = 'Os e-mails não coincidem.';
    } elseif (!validarCpf($cpf)) {
        $erro = 'Informe um CPF válido.';
    } else {
        $stmt = $pdo->prepare(
            'SELECT id, email FROM usuario WHERE email = ? AND cpf = ? LIMIT 1'
        );
        $stmt->execute([$email, $cpf]);
        $conta = $stmt->fetch();

        if ($conta) {
            $token = bin2hex(random_bytes(32));
            $tokenHash = hash('sha256', $token);

            $pdo->beginTransaction();

            try {
                $stmt = $pdo->prepare(
                    'DELETE FROM recuperacao_senha
                     WHERE usuario_id = ? OR expira_em < NOW()'
                );
                $stmt->execute([$conta['id']]);

                $stmt = $pdo->prepare(
                    'INSERT INTO recuperacao_senha
                    (usuario_id, token_hash, expira_em)
                    VALUES (?, ?, DATE_ADD(NOW(), INTERVAL 30 MINUTE))'
                );
                $stmt->execute([$conta['id'], $tokenHash]);

                $pdo->commit();

                $protocolo = (
                    !empty($_SERVER['HTTPS']) &&
                    $_SERVER['HTTPS'] !== 'off'
                ) ? 'https' : 'http';

                $host = $_SERVER['HTTP_HOST'] ?? 'localhost';

                // Em produção, configure um domínio confiável.
                if ($host !== 'localhost' && !str_starts_with($host, 'localhost:')) {
                    $host = 'localhost';
                    $protocolo = 'http';
                }

                $url = $protocolo . '://' . $host
                    . '/syslogin/redefinir_senha.php?token='
                    . urlencode($token);

                $assunto = 'Recuperação de senha - SysLogin';

                $corpo = "Olá!\n\n";
                $corpo .= "Para criar uma nova senha, acesse:\n";
                $corpo .= $url . "\n\n";
                $corpo .= "O link expira em 30 minutos.\n";
                $corpo .= "Se você não solicitou a recuperação, ignore esta mensagem.";

                $headers = "Content-Type: text/plain; charset=UTF-8\r\n";

                // Requer mail() configurado no servidor.
                $enviado = mail(
                    $conta['email'],
                    $assunto,
                    $corpo,
                    $headers
                );

                if (!$enviado) {
                    error_log(
                        'Configure o SMTP para enviar recuperação de senha.'
                    );
                }
            } catch (Throwable $e) {
                if ($pdo->inTransaction()) {
                    $pdo->rollBack();
                }

                error_log($e->getMessage());
            }
        }

        // Mensagem genérica para não revelar se a conta existe.
        $mensagem = 'Se os dados corresponderem a uma conta, '
            . 'as instruções serão enviadas ao e-mail cadastrado.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SysLogin | Recuperar senha</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
<main class="card">
    <div class="ilustracao">🔐 🌷</div>
    <div class="marca">SysLogin</div>
    <h1>Esqueceu a senha?</h1>
    <p class="subtitulo">
        Vamos ajudar você a recuperar o acesso.
    </p>

    <?php if ($erro): ?>
        <div class="mensagem erro"><?= e($erro) ?></div>
    <?php endif; ?>

    <?php if ($mensagem): ?>
        <div class="mensagem sucesso"><?= e($mensagem) ?></div>
    <?php endif; ?>

    <form method="post" id="formRecuperacao">
        <input type="hidden" name="csrf_token"
               value="<?= e(gerarTokenCsrf()) ?>">

        <label for="email">E-mail cadastrado</label>
        <input type="email" id="email" name="email" required>

        <label for="confirmar_email">Confirme o e-mail</label>
        <input type="email" id="confirmar_email"
               name="confirmar_email" required>

        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf"
               inputmode="numeric" maxlength="14"
               placeholder="000.000.000-00" required>

        <button type="submit" class="botao">
            Solicitar recuperação
        </button>
    </form>

    <div class="links">
        <a href="index.php">Voltar para o login</a>
    </div>
</main>
</body>
</html>
