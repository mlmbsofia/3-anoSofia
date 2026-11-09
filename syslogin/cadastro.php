
<?php
session_start();

require 'conexao.php';
require 'funcoes.php';
require 'csrf.php';

if (isset($_SESSION['usuario_id'])) {
    header('Location: index.php');
    exit;
}

$erro = '';

$nome = '';
$cpf = '';
$email = '';
$emailConfirmacao = '';
$dataNascimento = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = trim($_POST['nome'] ?? '');
    $cpf = preg_replace('/\D/', '', $_POST['cpf'] ?? '');
    $email = strtolower(trim($_POST['email'] ?? ''));
    $emailConfirmacao = strtolower(
        trim($_POST['email_confirmacao'] ?? '')
    );
    $dataNascimento = $_POST['data_nascimento'] ?? '';
    $senha = $_POST['senha'] ?? '';
    $senhaConfirmacao = $_POST['senha_confirmacao'] ?? '';

    if (!verificarTokenCsrf()) {
        $erro = 'Sessão expirada. Atualize a página e tente novamente.';
    } elseif (!validarNome($nome)) {
        $erro = 'Informe um nome válido, sem números.';
    } elseif (!validarCpf($cpf)) {
        $erro = 'O CPF informado é inválido.';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $erro = 'Informe um e-mail válido.';
    } elseif ($email !== $emailConfirmacao) {
        $erro = 'Os e-mails não coincidem.';
    } elseif (
        !$dataNascimento ||
        !preg_match('/^\d{4}-\d{2}-\d{2}$/', $dataNascimento) ||
        !checkdate(
            (int) substr($dataNascimento, 5, 2),
            (int) substr($dataNascimento, 8, 2),
            (int) substr($dataNascimento, 0, 4)
        ) ||
        $dataNascimento > date('Y-m-d')
    ) {
        $erro = 'Informe uma data de nascimento válida.';
    } elseif (!validarSenha($senha)) {
        $erro = 'Use 8 caracteres, maiúscula, minúscula, número e símbolo.';
    } elseif ($senha !== $senhaConfirmacao) {
        $erro = 'As senhas não coincidem.';
    } else {
        $stmt = $pdo->prepare(
            'SELECT id FROM usuario WHERE cpf = ? OR email = ? LIMIT 1'
        );

        $stmt->execute([$cpf, $email]);

        if ($stmt->fetch()) {
            $erro = 'Este CPF ou e-mail já está cadastrado.';
        } else {
            try {
                $hash = password_hash($senha, PASSWORD_DEFAULT);

                $stmt = $pdo->prepare(
                    'INSERT INTO usuario
                    (nome, cpf, email, data_nascimento, senha)
                    VALUES (?, ?, ?, ?, ?)'
                );

                $stmt->execute([
                    $nome,
                    $cpf,
                    $email,
                    $dataNascimento,
                    $hash
                ]);

                header('Location: index.php?cadastro=1');
                exit;
            } catch (PDOException $e) {
                error_log($e->getMessage());
                $erro = 'Não foi possível concluir o cadastro. Tente novamente.';
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SysLogin | Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>

<main class="card card-cadastro">
    <div class="ilustracao">🌷 ☁️ ✨</div>
    <div class="marca">SysLogin</div>

    <h1>Vamos nos conhecer!</h1>
    <p class="subtitulo">Crie sua conta para começar.</p>

    <?php if ($erro): ?>
        <div class="mensagem erro"><?= e($erro) ?></div>
    <?php endif; ?>

    <form method="post" id="formCadastro" novalidate>
        <input type="hidden" name="csrf_token"
               value="<?= e(gerarTokenCsrf()) ?>">

        <label for="nome">Nome completo</label>
        <input type="text" id="nome" name="nome"
               maxlength="150" autocomplete="name"
               value="<?= e($nome) ?>" required>
        <small class="erro-campo" id="erro-nome"></small>

        <label for="cpf">CPF</label>
        <input type="text" id="cpf" name="cpf"
               inputmode="numeric" maxlength="14"
               placeholder="000.000.000-00"
               value="<?= e($cpf) ?>" required>
        <small class="erro-campo" id="erro-cpf"></small>

        <label for="email">E-mail</label>
        <input type="email" id="email" name="email"
               maxlength="254" autocomplete="email"
               value="<?= e($email) ?>" required>
        <small class="erro-campo" id="erro-email"></small>

        <label for="email_confirmacao">Confirme seu e-mail</label>
        <input type="email" id="email_confirmacao"
               name="email_confirmacao"
               value="<?= e($emailConfirmacao) ?>" required>
        <small class="erro-campo" id="erro-email_confirmacao"></small>

        <label for="data_nascimento">Data de nascimento</label>
        <input type="date" id="data_nascimento"
               name="data_nascimento" max="<?= date('Y-m-d') ?>"
               value="<?= e($dataNascimento) ?>" required>
        <small class="erro-campo" id="erro-data_nascimento"></small>

        <label for="senha">Senha</label>
        <div class="campo-senha">
            <input type="password" id="senha" name="senha"
                   autocomplete="new-password" required>
            <button type="button" class="mostrar-senha"
                    data-target="senha" aria-label="Mostrar senha">👁</button>
        </div>
        <small class="dica">
            Mínimo de 8 caracteres, com maiúscula, minúscula,
            número e símbolo.
        </small>
        <small class="erro-campo" id="erro-senha"></small>

        <label for="senha_confirmacao">Confirme sua senha</label>
        <div class="campo-senha">
            <input type="password" id="senha_confirmacao"
                   name="senha_confirmacao"
                   autocomplete="new-password" required>
            <button type="button" class="mostrar-senha"
                    data-target="senha_confirmacao"
                    aria-label="Mostrar senha">👁</button>
        </div>
        <small class="erro-campo" id="erro-senha_confirmacao"></small>

        <button type="submit" class="botao">
            Criar minha conta 💗
        </button>
    </form>

    <div class="links">
        <a href="index.php">Já tenho uma conta</a>
    </div>
</main>

</body>
</html>

