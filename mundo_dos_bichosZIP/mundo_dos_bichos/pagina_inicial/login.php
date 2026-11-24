
<?php
    $mensagem = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST["email"] ?? "";
        $senha = $_POST["senha"] ?? "";

        if (empty($email) || empty($senha)) {
            $mensagem = "Por favor, preencha todos os campos.";
        } else {
            // Aqui você poderá colocar a validação com o banco de dados futuramente.
            $mensagem = "Login realizado com sucesso!";
        }
    }
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <title>Login do Tutor | Pet Shop</title>

    <link rel="stylesheet" href="style.css">
</head>

<body>

<!-- ================= HEADER ================= -->

<header class="header">



    <a href="../pagina_inicial/index_inicio%20-%20Copia.html" class="logo-container">
        <img src="../img/Logo-MUNDO-%20DOS%20-BICHOS-em-Verde-Pastel.png"
             alt="Mundo dos Bichos">
    </a>

    <div class="header-direito">

        <a href="carrinho.php" class="icone-header">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Carrinho</span>
        </a>

        <a href="login.php" class="icone-header">
            <i class="fa-solid fa-circle-user"></i>
            <span>Meu Perfil</span>
        </a>

    </div>

</header>


<!-- ================= MENU ================= -->

<nav class="nav">

    <div class="nav-container">

        <a href="../pagina_inicial/index_inicio%20-%20Copia.html" class="nav-link ativo">
            <i class="fa-solid fa-house"></i>
            Home
        </a>

        <a href="../parte-produtos/php-produtos.php" class="nav-link">
            <i class="fa-solid fa-bone"></i>
            Produtos
        </a>

        <a href="../adocao/adocao.html" class="nav-link">
            <i class="fa-solid fa-paw"></i>
            Adoção
        </a>

        <a href="atendimento.php" class="nav-link">
            <i class="fa-solid fa-headset"></i>
            Atendimento
        </a>

        <a href="cadastro.php" class="nav-link">
            <i class="fa-solid fa-user-plus"></i>
            Cadastro
        </a>

        <a href="../sobre_nos/sobre_nos.html" class="nav-link">
            <i class="fa-solid fa-heart"></i>
            Sobre Nós
        </a>

    </div>

</nav>

    <main class="pagina-login">

        <section class="lado-esquerdo">

            <div class="logo">
                🐾
            </div>

            <h1>Olá, Tutor!</h1>

            <p>
                Entre na sua conta para acompanhar
                os cuidados e serviços do seu pet.
            </p>

            <div class="patinhas">
                🐾　🐾　🐾
            </div>

        </section>


        <section class="lado-direito">

            <div class="login-box">

                <h2>Login</h2>

                <p class="subtitulo">
                    Acesse sua conta de tutor
                </p>

                <?php if (!empty($mensagem)): ?>
                    <div class="mensagem">
                        <?php echo $mensagem; ?>
                    </div>
                <?php endif; ?>

                <form method="POST" action="">

                    <div class="campo">
                        <label for="email">E-mail</label>

                        <input
                            type="email"
                            id="email"
                            name="email"
                            placeholder="Digite seu e-mail"
                            required
                        >
                    </div>

                    <div class="campo">
                        <label for="senha">Senha</label>

                        <input
                            type="password"
                            id="senha"
                            name="senha"
                            placeholder="Digite sua senha"
                            required
                        >
                    </div>

                    <div class="opcoes">

                        <label class="lembrar">
                            <input type="checkbox" name="lembrar">
                            Lembrar de mim
                        </label>

                        <a href="#">Esqueci minha senha</a>

                    </div>

                    <button type="submit">
                        Entrar
                    </button>

                </form>

                <div class="cadastro">
                    <p>
                        Ainda não possui uma conta?
                    </p>

                    <a href="cadastro.php">
                        Cadastre-se
                    </a>
                </div>

            </div>

        </section>

    </main>

<!-- ================================
 FOOTER
================================= -->

<footer class="footer">

    <div class="footer-container">

        <!-- Informações da escola -->
        <div class="footer-section">
            <h3>Escola Estadual Maria Luiza Miranda Bastos</h3>

            <p>
                Educação, conhecimento e desenvolvimento
                para nossos alunos.
            </p>
        </div>


        <!-- Contato -->
        <div class="footer-section">

            <h3>Contato</h3>

            <p>
                <i class="fa-solid fa-phone"></i>
                (31) 3443-7477
            </p>

            <p>
                <i class="fa-solid fa-envelope"></i>
                escola.2500@educacao.mg.gov.br
            </p>

            <p>
                <i class="fa-solid fa-location-dot"></i>
                Rua São José do Jacuri, 60 - Planalto
            </p>

            <p>
                <i class="fa-solid fa-city"></i>
                Belo Horizonte - MG
            </p>

        </div>


        <!-- Redes sociais -->
        <div class="footer-section">

            <h3>Redes Sociais</h3>

            <div class="social-icons">

                <a href="#" aria-label="Instagram">
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a href="https://www.facebook.com/pages/Escola-Estadual-Maria-Luiza-Miranda-Bastos/196619360362700" aria-label="Facebook">
                    <i class="fa-brands fa-facebook"></i>
                </a>



            </div>

            <p class="redes-texto">
                Acompanhe as novidades da escola.
            </p>

        </div>

    </div>


    <!-- Rodapé inferior -->
    <div class="footer-bottom">

        <p>
            &copy; <?php echo date("Y"); ?>
            Escola Estadual Maria Luiza Miranda Bastos -
            Todos os direitos reservados.
        </p>

    </div>

</footer>

</body>

<style>
    /* =========================
    PALETA DE CORES
    =========================

    Azul claro: #78dfff
    Azul médio: #33b6de
    Azul escuro: #006c8c
    Verde:      #b9e39a
    Rosa:       #FAB9DA
    */


    * {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    }

    body {
        font-family: Arial, Helvetica, sans-serif;
        min-height: 100vh;
        background-color: #78dfff;
        margin: 0;
    }

    .header {
        height: 100px;

        background-color: #bdeba2;

        display: flex;

        align-items: center;

        justify-content: center;

        position: relative;

        padding: 0 50px;

        border-bottom: 3px solid #78dfff;

        box-shadow: 0 3px 12px rgba(0, 108, 140, 0.12);
    }


    /* ================================
    TEXTO DO LADO ESQUERDO
    ================================ */

    .header-esquerdo {
        position: absolute;

        left: 50px;

        color: #006c8c;

        font-size: 14px;

        font-weight: bold;
    }


    /* ================================
    LOGO
    ================================ */

    .logo-pequeno {

        width: 103px;

        height: 82px;

        object-fit: contain;
    }


    .logo-container {

        display: flex;

        align-items: center;

        justify-content: center;
    }


    .logo-container img {

        width: 250px;

        height: 92px;

        object-fit: contain;
    }


    /* ================================
    ÁREA DIREITA
    ================================ */

    .header-direito {
        position: absolute;

        right: 50px;

        display: flex;

        align-items: center;

        gap: 28px;
    }


    .icone-header {
        display: flex;

        flex-direction: column;

        align-items: center;

        gap: 5px;

        text-decoration: none;

        color: #006c8c;

        font-size: 13px;

        font-weight: bold;

        transition: 0.3s;
    }


    .icone-header i {
        font-size: 23px;
    }


    .icone-header:hover {
        color: #33b6de;

        transform: translateY(-2px);
    }


    /* Carrinho */

    .icone-header:first-child i {
        color: #33b6de;
    }


    /* Perfil */

    .perfil i {
        color: #006c8c;
    }


    .perfil:hover i {
        color: #FAB9DA;
    }


    /* ================================
    NAV
    ================================ */

    .nav {
        background-color: #006c8c;

        width: 100%;

        box-shadow: 0 3px 8px rgba(0, 108, 140, 0.2);
    }


    .nav-container {
        min-height: 58px;

        display: flex;

        justify-content: center;

        align-items: center;

        gap: 8px;
    }


    .nav-link {
        height: 58px;

        padding: 0 22px;

        display: flex;

        align-items: center;

        gap: 8px;

        text-decoration: none;

        color: white;

        font-size: 15px;

        font-weight: bold;

        transition: 0.3s;

        position: relative;
    }


    .nav-link i {
        font-size: 15px;
    }


    /* ================================
    EFEITO HOVER
    ================================ */

    .nav-link:hover {
        background-color: #33b6de;

        color: white;
    }


    /* Linha inferior */

    .nav-link::after {
        content: "";

        position: absolute;

        bottom: 0;

        left: 50%;

        width: 0;

        height: 4px;

        background-color: #FAB9DA;

        transition: 0.3s;

        transform: translateX(-50%);
    }


    .nav-link:hover::after {
        width: 70%;
    }


    /* ================================
    RESPONSIVIDADE
    ================================ */

    @media (max-width: 900px) {

        .header-esquerdo {
            display: none;
        }

        .header {
            padding: 0 20px;
        }

        .header-direito {
            right: 20px;
        }

        .logo span {
            display: none;
        }

        .nav-container {
            flex-wrap: wrap;

            gap: 0;
        }

        .nav-link {
            padding: 0 12px;

            font-size: 13px;
        }

    }


    @media (max-width: 600px) {

        .header {
            height: 85px;
        }

        .header-direito {
            gap: 15px;
        }

        .icone-header span {
            display: none;
        }

        .icone-header i {
            font-size: 22px;
        }

        .logo-icone {
            width: 43px;

            height: 43px;
        }

        .nav {
            overflow-x: auto;
        }

        .nav-container {
            width: max-content;

            flex-wrap: nowrap;
        }

        .nav-link {
            height: 50px;

            padding: 0 14px;
        }

    }

    .pagina-login {
        display: flex;
        width: 100%;
        max-width: 1000px;
        margin: 40px auto;
    }


    /* =========================
    LADO ESQUERDO
    ========================= */

    .lado-esquerdo {
    width: 45%;

    background-color: #33b6de;

    color: white;

    display: flex;
    flex-direction: column;

    justify-content: center;
    align-items: center;

    text-align: center;

    padding: 40px;
    }


    .logo {
    width: 90px;
    height: 90px;

    background-color: #FAB9DA;

    border-radius: 50%;

    display: flex;
    align-items: center;
    justify-content: center;

    font-size: 45px;

    margin-bottom: 25px;

    box-shadow: 0 8px 15px rgba(0, 108, 140, 0.2);
    }


    .lado-esquerdo h1 {
    font-size: 38px;

    margin-bottom: 15px;

    color: white;
    }


    .lado-esquerdo p {
    font-size: 17px;

    line-height: 1.6;

    max-width: 300px;
    }


    .patinhas {
    margin-top: 35px;

    font-size: 24px;

    color: #b9e39a;
    }


    /* =========================
    LADO DIREITO
    ========================= */

    .lado-direito {
    width: 55%;

    background-color: #ffffff;

    display: flex;

    align-items: center;
    justify-content: center;

    padding: 40px;
    }


    .login-box {
    width: 100%;
    max-width: 380px;
    }


    .login-box h2 {
    color: #006c8c;

    font-size: 34px;

    margin-bottom: 8px;
    }


    .subtitulo {
    color: #666;

    margin-bottom: 30px;

    font-size: 15px;
    }


    /* =========================
    MENSAGEM PHP
    ========================= */

    .mensagem {
    background-color: #b9e39a;

    color: #006c8c;

    padding: 12px;

    border-radius: 10px;

    margin-bottom: 20px;

    text-align: center;

    font-size: 14px;
    }


    /* =========================
    CAMPOS
    ========================= */

    .campo {
    margin-bottom: 20px;
    }


    .campo label {
    display: block;

    color: #006c8c;

    font-weight: bold;

    margin-bottom: 8px;
    }


    .campo input {
    width: 100%;

    padding: 14px 16px;

    border: 2px solid #78dfff;

    border-radius: 12px;

    outline: none;

    font-size: 15px;

    transition: 0.3s;
    }


    .campo input:focus {
    border-color: #33b6de;

    box-shadow: 0 0 0 3px rgba(120, 223, 255, 0.25);
    }


    .campo input::placeholder {
    color: #999;
    }


    /* =========================
    OPÇÕES
    ========================= */

    .opcoes {
    display: flex;

    justify-content: space-between;

    align-items: center;

    margin-bottom: 25px;

    font-size: 13px;
    }


    .lembrar {
    color: #555;

    display: flex;

    align-items: center;

    gap: 6px;
    }


    .lembrar input {
    accent-color: #33b6de;
    }


    .opcoes a {
    color: #006c8c;

    text-decoration: none;

    font-weight: bold;
    }


    .opcoes a:hover {
    color: #FAB9DA;
    }


    /* =========================
    BOTÃO
    ========================= */

    button {
    width: 100%;

    padding: 15px;

    border: none;

    border-radius: 12px;

    background-color: #006c8c;

    color: white;

    font-size: 17px;

    font-weight: bold;

    cursor: pointer;

    transition: 0.3s;
    }


    button:hover {
    background-color: #33b6de;

    transform: translateY(-2px);

    box-shadow: 0 6px 15px rgba(51, 182, 222, 0.3);
    }


    /* =========================
    CADASTRO
    ========================= */

    .cadastro {
    text-align: center;

    margin-top: 25px;

    font-size: 14px;

    color: #666;
    }


    .cadastro a {
    display: inline-block;

    margin-top: 7px;

    color: #006c8c;

    font-weight: bold;

    text-decoration: none;
    }


    .cadastro a:hover {
    color: #FAB9DA;
    }


    /* =========================
    RESPONSIVIDADE
    ========================= */

    @media (max-width: 750px) {

    .pagina-login {
    width: 90%;

    flex-direction: column;

    min-height: auto;
    }

    .lado-esquerdo {
    width: 100%;

    padding: 35px 20px;
    }

    .lado-esquerdo h1 {
    font-size: 30px;
    }

    .lado-direito {
    width: 100%;

    padding: 35px 25px;
    }
    }


    @media (max-width: 450px) {

    .pagina-login {
    width: 95%;

    border-radius: 20px;
    }

    .opcoes {
    flex-direction: column;

    gap: 12px;

    align-items: flex-start;
    }

    }

    /* FOOTER */
    .footer {
        background-color: #4abfe1;
        color: #000000;
        width: 100%;
        margin-top: 40px;
    }

    /* Área principal do footer */
    .footer-container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 40px 50px;
        display: flex;
        justify-content: space-between;
        gap: 40px;
    }

    /* Seções */
    .footer-section {
        flex: 1;
    }

    .footer-section h3 {
        font-size: 20px;
        margin-bottom: 15px;
        color: #000000;
    }

    .footer-section p {
        font-size: 15px;
        line-height: 1.7;
        margin-bottom: 8px;
    }

    /* Ícones */
    .footer-section i {
        margin-right: 8px;
    }

    /* Redes sociais */
    .social-icons {
        display: flex;
        gap: 15px;
        margin-top: 10px;
    }

    .social-icons a {
        width: 42px;
        height: 42px;
        background-color: #33b6de;
        color: #000000;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        text-decoration: none;
        font-size: 20px;
        transition: 0.3s;
    }

    .social-icons a:hover {
        background-color: #ffffff;
        transform: translateY(-3px);
    }

    /* Parte inferior */
    .footer-bottom {
        background-color: #33b6de;
        text-align: center;
        padding: 15px 20px;
    }

    .footer-bottom p {
        margin: 0;
        font-size: 14px;
    }

    /* Responsividade */
    @media (max-width: 768px) {

        .footer-container {
            flex-direction: column;
            text-align: center;
            padding: 35px 25px;
        }

        .social-icons {
            justify-content: center;
        }
    }

</style>
</html>