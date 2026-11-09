
<?php
session_start();

require_once __DIR__ . '/conexao.php';
require_once __DIR__ . '/funcoes.php';
require_once __DIR__ . '/csrf.php';

$erro = '';
$sucesso = '';

if (isset($_GET['cadastro'])) {
    $sucesso = 'Conta criada com sucesso! Faça seu login.';
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (!verificarTokenCsrf()) {
        $erro = 'Sua sessão expirou. Atualize a página e tente novamente.';
    } else {
        $identificador = trim($_POST['usuario'] ?? '');
        $senhaDigitada = $_POST['senha'] ?? '';

        if ($identificador === '' || $senhaDigitada === '') {
            $erro = 'Preencha o usuário e a senha.';
        } else {
            $stmt = null;

            if (filter_var($identificador, FILTER_VALIDATE_EMAIL)) {
                $stmt = $pdo->prepare(
                    'SELECT * FROM usuario WHERE email = ? LIMIT 1'
                );
                $stmt->execute([strtolower($identificador)]);
            } else {
                $cpf = preg_replace('/\D/', '', $identificador);

                if (validarCpf($cpf)) {
                    $stmt = $pdo->prepare(
                        'SELECT * FROM usuario WHERE cpf = ? LIMIT 1'
                    );
                    $stmt->execute([$cpf]);
                }
            }

            $dados = $stmt ? $stmt->fetch() : false;

            if (
                $dados &&
                password_verify($senhaDigitada, $dados['senha'])
            ) {
                session_regenerate_id(true);

                $_SESSION['usuario_id'] = $dados['id'];
                $_SESSION['usuario_nome'] = $dados['nome'];

                header('Location: index.php');
                exit;
            }

            $erro = 'Usuário ou senha incorretos.';
        }
    }
}

$logado = isset($_SESSION['usuario_id']);
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SysLogin | Seu cantinho</title>
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
</head>
<body>

<?php if ($logado): ?>

    <main class="card">
        <div class="ilustracao">☁️ 🌷 ✨</div>
        <div class="marca">SysLogin</div>

        <h1>Olá, <?= e($_SESSION['usuario_nome']) ?>!</h1>

        <p class="subtitulo">
            Que bom ter você por aqui. Você entrou na sua conta!
        </p>

        <div class="mensagem sucesso">
            Login realizado com sucesso.
        </div>

        <form action="logout.php" method="post">
            <input type="hidden" name="csrf_token"
                   value="<?= e(gerarTokenCsrf()) ?>">

            <button type="submit" class="botao">
                Sair da conta
            </button>
        </form>
    </main>

<?php else: ?>

    <main class="card">
        <div class="ilustracao">☁️ 🌷 ✨</div>
        <div class="marca">SysLogin</div>

        <h1>Boas-vindas!</h1>

        <p class="subtitulo">
            Entre no seu cantinho e continue de onde parou.
        </p>

        <?php if ($erro): ?>
            <div class="mensagem erro"><?= e($erro) ?></div>
        <?php endif; ?>

        <?php if ($sucesso): ?>
            <div class="mensagem sucesso"><?= e($sucesso) ?></div>
        <?php endif; ?>

        <form method="post" id="formLogin">
            <input type="hidden" name="csrf_token"
                   value="<?= e(gerarTokenCsrf()) ?>">

            <label for="usuario">E-mail ou CPF</label>

            <input
                type="text"
                id="usuario"
                name="usuario"
                placeholder="Digite seu e-mail ou CPF"
                autocomplete="username"
                required
            >

            <label for="senha">Senha</label>

            <div class="campo-senha">
                <input
                    type="password"
                    id="senha"
                    name="senha"
                    placeholder="Digite sua senha"
                    autocomplete="current-password"
                    required
                >

                <button
                    type="button"
                    class="mostrar-senha"
                    data-target="senha"
                    aria-label="Mostrar senha"
                >👁</button>
            </div>

            <button type="submit" class="botao">
                Entrar ✨
            </button>
        </form>

        <div class="links">
            <a href="cadastro.php">Criar minha conta</a>
            <a href="esqueci_senha.php">Esqueceu a senha?</a>
        </div>
    </main>

<?php endif; ?>

</body>
</html>
