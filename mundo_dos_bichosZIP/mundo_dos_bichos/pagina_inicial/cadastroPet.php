<?php

session_start();


// Verifica se existem dados do pet

if (!isset($_SESSION["pet"])) {

    header("Location: forms.php");
    exit;

}




// Recupera os dados

$pet = $_SESSION["pet"];

$namePET = $pet["nome"];
$especie = $pet["especie"];
$raca = $pet["raca"];
$peso = $pet["peso"];
$gender = $pet["sexo"];
$observacao = $pet["observacao"];

?>


<!DOCTYPE html>
<html lang="pt-br">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro realizado com sucesso!</title>

    <style>

        * {
            box-sizing: border-box;
        }


        body {
            margin: 0;

            background: #78dfff;

            font-family: Arial, sans-serif;

            min-height: 100vh;
        }


        /* =========================================
   HEADER
========================================= */

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

        .header-esquerdo {
            position: absolute;
            left: 50px;
            color: #006c8c;
            font-size: 14px;
            font-weight: bold;
        }

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

        .icone-header:first-child i {
            color: #33b6de;
        }

        .perfil i {
            color: #006c8c;
        }

        .perfil:hover i {
            color: #FAB9DA;
        }


        /* =========================================
           MENU
        ========================================= */

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

        .nav-link:hover {
            background-color: #33b6de;
            color: white;
        }

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


        /* =========================================
           RESPONSIVO DO HEADER
        ========================================= */

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


        /* ==================================
           CARD
        ================================== */

        .card {
            background: white;

            padding: 40px;

            border-radius: 15px;

            box-shadow: 0 10px 30px rgba(0, 108, 140, 0.25);

            width: 400px;

            max-width: 90%;

            text-align: center;

            margin: 40px auto;
        }


        .icone {
            width: 70px;

            height: 70px;

            margin: 0 auto 20px;

            background: #33b6de;

            color: white;

            border-radius: 50%;

            display: flex;

            justify-content: center;

            align-items: center;

            font-size: 35px;
        }


        h2 {
            color: #006c8c;

            margin-bottom: 10px;
        }


        .mensagem {
            color: #006c8c;

            font-size: 17px;

            margin-bottom: 25px;
        }


        .dados {
            background: #b9e39a;

            padding: 15px;

            border-radius: 10px;

            margin-bottom: 25px;

            text-align: left;
        }


        .dados p {
            margin: 8px 0;

            font-size: 16px;

            color: #006c8c;
        }


        .botoes {
            display: flex;

            flex-direction: column;

            gap: 10px;
        }


        .botao {
            display: block;

            padding: 12px 20px;

            background: #33b6de;

            color: white;

            text-decoration: none;

            border-radius: 8px;

            font-size: 16px;

            transition: 0.3s;
        }


        .botao:hover {
            background: #006c8c;
        }


        .botao.secundario {
            background: #78dfff;

            color: #006c8c;
        }


        .botao.secundario:hover {
            background: #b9e39a;
        }


        /* ==================================
           RESPONSIVIDADE
        ================================== */

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


            .card {
                padding: 30px 20px;

                margin: 25px auto;
            }

        }

        /* =========================================
   FOOTER
========================================= */

        .footer {

            background: var(--azul-claro);

            color: #000;

            width: 100%;
        }


        .footer-container {

            max-width: 1200px;

            margin: 0 auto;

            padding: 45px 35px;

            display: grid;

            grid-template-columns: 1.2fr 1fr 0.8fr;

            gap: 50px;
        }


        .footer-section h3 {

            font-size: 19px;

            color: #000;

            margin-bottom: 14px;
        }


        .footer-section p {

            color: #17212b;

            font-size: 14px;

            line-height: 1.7;

            margin-bottom: 7px;
        }


        .footer-section i {

            margin-right: 7px;
        }


        .social-icons {

            display: flex;

            gap: 12px;

            margin: 10px 0 12px;
        }


        .social-icons a {

            width: 42px;

            height: 42px;

            border-radius: 50%;

            background: var(--azul);

            color: #000;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 19px;

            transition: 0.25s;
        }


        .social-icons a:hover {

            background: white;

            transform: translateY(-3px);
        }


        .footer-bottom {

            background: var(--azul);

            text-align: center;

            padding: 15px 20px;
        }


        .footer-bottom p {

            margin: 0;

            color: #000;

            font-size: 13px;
        }


        /* =========================================
           RESPONSIVIDADE
        ========================================= */

        @media (max-width: 950px) {

            .header {

                padding: 8px 20px;
            }


            .header-esquerdo {

                left: 20px;
            }


            .header-direito {

                right: 20px;

                gap: 15px;
            }


            .hero-conteudo {

                grid-template-columns: 1fr;

                text-align: center;
            }


            .hero-texto {

                margin: auto;
            }


            .hero-botoes,
            .etiqueta {

                justify-content: center;
            }


            .hero-ilustracao {

                min-height: 290px;
            }


            .beneficios {

                grid-template-columns: repeat(2, 1fr);

                margin-left: 20px;

                margin-right: 20px;
            }


            .categorias-grid,
            .ofertas-grid {

                grid-template-columns: repeat(2, 1fr);
            }


            .servicos-conteudo {

                grid-template-columns: 1fr;
            }


            .footer-container {

                grid-template-columns: 1fr 1fr;
            }

        }


        @media (max-width: 650px) {

            .header {

                min-height: 82px;
            }


            .logo-pequeno {

                width: 70px;

                height: 65px;
            }


            .logo-container img {

                width: 170px;

                height: 65px;
            }


            .icone-header span {

                display: none;
            }


            .header-direito {

                gap: 12px;
            }


            .icone-header i {

                font-size: 21px;
            }


            .nav {

                overflow-x: auto;
            }


            .nav-container {

                width: max-content;

                justify-content: flex-start;
            }


            .nav-link {

                min-height: 50px;

                padding: 0 15px;

                font-size: 13px;
            }


            .hero-conteudo {

                padding: 45px 22px;
            }


            .hero h1 {

                font-size: 42px;
            }


            .hero-texto > p {

                font-size: 16px;
            }


            .pet-card {

                width: 235px;

                height: 235px;
            }


            .pet-card span {

                font-size: 75px;
            }


            .beneficios {

                grid-template-columns: 1fr;
            }


            .secao {

                padding: 60px 20px;
            }


            .titulo-secao h2 {

                font-size: 29px;
            }


            .categorias-grid,
            .ofertas-grid,
            .servicos-grid {

                grid-template-columns: 1fr;
            }


            .servicos-texto h2 {

                font-size: 34px;
            }


            .cta {

                margin: 0 20px 60px;

                padding: 28px 24px;

                flex-direction: column;

                align-items: flex-start;
            }


            .cta h2 {

                font-size: 23px;
            }


            .footer-container {

                grid-template-columns: 1fr;

                text-align: center;
            }


            .social-icons {

                justify-content: center;
            }

        }

        /* ==================================================
           FOOTER
        ================================================== */

        .footer {
            width: 100%;

            margin-top: 60px;

            background: #78dfff;

            color: #17212b;

            border-top: 3px solid #33b6de;
        }


        /* ==================================================
           CONTAINER PRINCIPAL DO FOOTER
        ================================================== */

        .footer-container {
            width: min(1200px, 92%);

            margin: 0 auto;

            padding: 55px 40px;

            display: grid;

            grid-template-columns:
        1.3fr
        1fr
        0.8fr;

            gap: 70px;

            align-items: start;
        }


        /* ==================================================
           SEÇÕES
        ================================================== */

        .footer-section {
            min-width: 0;
        }

        .footer-section h3 {
            margin: 0 0 18px;

            color: #006c8c;

            font-size: 21px;

            font-weight: 700;

            line-height: 1.3;
        }


        .footer-section p {
            margin: 0 0 11px;

            color: #17212b;

            font-size: 15px;

            line-height: 1.7;
        }


        /* ==================================================
           CONTATO
        ================================================== */

        .footer-contato p {
            display: flex;

            align-items: flex-start;

            gap: 10px;
        }


        .footer-contato i {
            width: 20px;

            flex-shrink: 0;

            margin-top: 4px;

            color: #006c8c;

            font-size: 16px;

            text-align: center;
        }


        /* ==================================================
           REDES SOCIAIS
        ================================================== */

        .social-icons {
            display: flex;

            align-items: center;

            gap: 14px;

            margin: 5px 0 16px;
        }


        .social-icons a {
            width: 46px;

            height: 46px;

            border-radius: 50%;

            background: #33b6de;

            color: #ffffff;

            display: flex;

            align-items: center;

            justify-content: center;

            font-size: 20px;

            text-decoration: none;

            transition:
                    transform 0.25s ease,
                    background 0.25s ease;
        }


        .social-icons a:hover {
            background: #006c8c;

            color: #ffffff;

            transform: translateY(-3px);
        }


        .redes-texto {
            color: #17212b !important;

            font-size: 15px !important;
        }


        /* ==================================================
           RODAPÉ INFERIOR
        ================================================== */

        .footer-bottom {
            width: 100%;

            padding: 18px 25px;

            background: #006c8c;

            text-align: center;
        }


        .footer-bottom p {
            margin: 0;

            color: #ffffff;

            font-size: 14px;

            line-height: 1.5;
        }


        /* ==================================================
           TABLET
        ================================================== */

        @media (max-width: 950px) {

            .footer-container {
                width: 94%;

                padding: 45px 25px;

                grid-template-columns:
            1fr
            1fr;

                gap: 40px;
            }

            .footer-escola {
                grid-column: 1 / -1;
            }

        }


        /* ==================================================
           CELULAR
        ================================================== */

        @media (max-width: 650px) {

            .footer {
                margin-top: 40px;
            }

            .footer-container {
                width: 92%;

                padding: 40px 20px;

                grid-template-columns: 1fr;

                gap: 35px;

                text-align: center;
            }

            .footer-escola {
                grid-column: auto;
            }

            .footer-section h3 {
                font-size: 19px;
            }

            .footer-section p {
                font-size: 14px;
            }

            .footer-contato p {
                justify-content: center;

                align-items: center;

                text-align: left;
            }

            .footer-contato i {
                margin-top: 0;
            }

            .social-icons {
                justify-content: center;
            }

            .footer-bottom {
                padding: 16px 15px;
            }

            .footer-bottom p {
                font-size: 12px;
            }

        }

    </style>

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


<div class="card">

    <div class="icone">✓</div>

    <h2>Cadastro do pet realizado!</h2>

    <p class="mensagem">
        O cadastro do seu pet foi realizado com sucesso.
    </p>


    <div class="dados">

        <p>

            <strong>Pet:</strong>

            <?= htmlspecialchars($namePET) ?>

        </p>


        <p>

            <strong>Espécie:</strong>

            <?= htmlspecialchars($especie) ?>

        </p>


        <p>

            <strong>Raça:</strong>

            <?= htmlspecialchars($raca) ?>

        </p>


        <p>

            <strong>Peso:</strong>

            <?= htmlspecialchars($peso) ?>

        </p>


        <p>

            <strong>Genêro:</strong>

            <?= htmlspecialchars($gender) ?>

        </p>

    </div>


    <div class="botoes">

        <a
                href="index_inicio%20-%20Copia.html"
                class="botao"
        >
            Voltar à página inicial
        </a>


        <a
                href="forms.php"
                class="botao secundario"
        >
            Cadastrar outro pet
        </a>

    </div>

</div>

<!-- ================= FOOTER ================= -->

<footer class="footer">

    <div class="footer-container">


        <div class="footer-section">

            <h3>
                Escola Estadual Maria Luiza Miranda Bastos
            </h3>

            <p>
                Educação, conhecimento e desenvolvimento
                para nossos alunos.
            </p>

        </div>


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


        <div class="footer-section">

            <h3>Redes Sociais</h3>

            <div class="social-icons">

                <a href="#"
                   aria-label="Instagram">

                    <i class="fa-brands fa-instagram"></i>

                </a>

                <a href="https://www.facebook.com/pages/Escola-Estadual-Maria-Luiza-Miranda-Bastos/196619360362700"
                   target="_blank"
                   aria-label="Facebook">

                    <i class="fa-brands fa-facebook"></i>

                </a>

            </div>

            <p class="redes-texto">
                Acompanhe as novidades da escola.
            </p>

        </div>

    </div>


    <div class="footer-bottom">

        <p>
            &copy;
            <?php echo date("Y"); ?>
            Escola Estadual Maria Luiza Miranda Bastos -
            Todos os direitos reservados.
        </p>

    </div>

</footer>

</body>

</html>