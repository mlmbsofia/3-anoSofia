
<?php
session_start();

require 'conexao.php';
require 'funcoes.php';
require 'csrf.php';

$erro = '';
$sucesso = '';

$token = $_SERVER['REQUEST_METHOD'] === 'POST'
    ? ($_POST['token'] ?? '')
    : ($_GET['token'] ?? '');

$tokenValido = is_string($token)
    && preg_match('/^[a-f0-9]{64}$/', $token);

$registro = false;

if ($tokenValido) {
    $stmt = $pdo->prepare(
        'SELECT id, usuario_id
         FROM recuperacao_senha
         WHERE token_hash = ?
         AND expira_em > NOW()
         AND utilizado_em IS NULL
         LIMIT 1'
    );

    $stmt->execute([hash('sha256', $token)]);
    $registro = $stmt->fetch();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $senha = $_POST['senha'] ?? '';
    $confirmacao = $_POST['confirmacao'] ?? '';

    if (!verificarTokenCsrf()) {
        $erro = 'Sessão expirada. Atualize a página.';
    } elseif (!$registro) {
        $erro = 'Este link expirou ou já foi utilizado.';
    } elseif (!validarSenha($senha)) {
        $erro = 'Use 8 caracteres, maiúscula, minúscula, número e símbolo.';
    } elseif ($senha !== $confirmacao) {
        $erro = 'As senhas não coincidem.';
    } else {
        try {
            $pdo->beginTransaction();

            $stmt = $pdo->prepare(
                'SELECT id FROM recuperacao_senha
                 WHERE id = ? AND expira_em > NOW()
                 AND utilizado_em IS NULL
                 FOR UPDATE'
            );
            $stmt->execute([$registro['id']]);

            if (!$stmt->fetch()) {
                throw new RuntimeException('Token já utilizado.');
            }

            $stmt = $pdo->prepare(
                'UPDATE usuario SET senha = ? WHERE id = ?'
            );
            $stmt->execute([
                password_hash($senha, PASSWORD_DEFAULT),
                $registro['usuario_id']
            ]);

            $stmt = $pdo->prepare(
                'UPDATE recuperacao_senha
                 SET utilizado_em = NOW()
                 WHERE id = ?'
            );
            $stmt->execute([$registro['id']]);

            // Invalida outros tokens ativos da mesma conta.
            $stmt = $pdo->prepare(
                'UPDATE recuperacao_senha
                 SET utilizado_em = NOW()
                 WHERE usuario_id = ? AND utilizado_em IS NULL'
            );
            $stmt->execute([$registro['usuario_id']]);

            $pdo->commit();
            $sucesso = 'Senha alterada com sucesso! Você já pode entrar.';
        } catch (Throwable $e) {
            if ($pdo->inTransaction()) {
                $pdo->rollBack();
            }

            error_log($e->getMessage());
            $erro = 'Não foi possível redefinir a senha. Solicite um novo link.';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SysLogin | Nova senha</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>
<main class="card">
    <div class="ilustracao">🔑 ✨</div>
    <div class="marca">SysLogin</div>
    <h1>Crie uma nova senha</h1>

    <?php if ($erro): ?>
        <div class="mensagem erro"><?= e($erro) ?></div>
    <?php endif; ?>

    <?php if ($sucesso): ?>
        <div class="mensagem sucesso"><?= e($sucesso) ?></div>
        <div class="links">
            <a href="index.php">Voltar para o login</a>
        </div>
    <?php elseif (!$registro): ?>
        <p class="subtitulo">
            O link é inválido, expirou ou já foi utilizado.
            Solicite uma nova recuperação.
        </p>
        <div class="links">
            <a href="esqueci_senha.php">Solicitar novo link</a>
        </div>
    <?php else: ?>
        <p class="subtitulo">Escolha uma senha segura para sua conta.</p>

        <form method="post">
            <input type="hidden" name="csrf_token"
                   value="<?= e(gerarTokenCsrf()) ?>">
            <input type="hidden" name="token" value="<?= e($token) ?>">

            <label for="senha">Nova senha</label>
            <div class="campo-senha">
                <input type="password" id="senha" name="senha"
                       autocomplete="new-password" required>
                <button type="button" class="mostrar-senha"
                        data-target="senha">👁</button>
            </div>

            <label for="confirmacao">Confirme a senha</label>
            <div class="campo-senha">
                <input type="password" id="confirmacao"
                       name="confirmacao" autocomplete="new-password" required>
                <button type="button" class="mostrar-senha"
                        data-target="confirmacao">👁</button>
            </div>

            <button type="submit" class="botao">Salvar nova senha</button>
        </form>
    <?php endif; ?>
</main>
</body>
</html>
