<?php

session_start();


// ==============================
// VERIFICA SE EXISTEM DADOS
// ==============================

if (!isset($_SESSION["pet"])) {

    header("Location: forms.php");

    exit;
}


// ==============================
// RECUPERA OS DADOS
// ==============================

$pet = $_SESSION["pet"];

$namePET = $pet["nome"] ?? "";
$especie = $pet["especie"] ?? "";
$raca = $pet["raca"] ?? "";
$peso = $pet["peso"] ?? "";
$gender = $pet["sexo"] ?? "";
$observacao = $pet["observacao"] ?? "";

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Cadastro realizado | Mundo dos Bichos</title>


    <!-- FONT AWESOME -->

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


    <style>

        /* ==================================
           CORES
        ================================== */

        :root {

            --azul-claro: #78dfff;
            --azul: #33b6de;
            --azul-escuro: #006c8c;
            --verde: #bdeba2;
            --rosa: #FAB9DA;
        }


        /* ==================================
           RESET
        ================================== */

        * {

            margin: 0;

            padding: 0;

            box-sizing: border-box;
        }


        /* ==================================
           BODY
        ================================== */

        body {

            min-height: 100vh;

            display: flex;

            flex-direction: column;

            font-family: Arial, Helvetica, sans-serif;

            background: linear-gradient(
                    135deg,
                    #e9fbff,
                    #ffffff
            );

            color: #444;
        }


        /* ==================================
           HEADER
        ================================== */

        .header {

            width: 100%;

            min-height: 100px;

            background: #bdeba2;

            display: flex;

            align-items: center;

            justify-content: center;

            position: relative;

            padding: 8px 50px;

            border-bottom: 3px solid var(--azul-claro);

            box-shadow:
                    0 3px 15px rgba(0, 108, 140, 0.12);
        }


        .header-esquerdo {

            position: absolute;

            left: 40px;

            display: flex;

            align-items: center;
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

            right: 45px;

            display: flex;

            align-items: center;

            gap: 25px;
        }


        .icone-header {

            display: flex;

            flex-direction: column;

            align-items: center;

            gap: 4px;

            color: var(--azul-escuro);

            font-size: 13px;

            font-weight: 700;

            text-decoration: none;

            transition: 0.25s;
        }


        .icone-header i {

            font-size: 24px;

            color: var(--azul);
        }


        .icone-header:hover {

            color: var(--azul);

            transform: translateY(-2px);
        }


        /* ==================================
           NAV
        ================================== */

        .nav {

            width: 100%;

            background: var(--azul-escuro);

            box-shadow:
                    0 3px 10px rgba(0, 108, 140, 0.20);
        }


        .nav-container {

            min-height: 58px;

            display: flex;

            align-items: center;

            justify-content: center;

            gap: 4px;
        }


        .nav-link {

            min-height: 58px;

            padding: 0 22px;

            display: flex;

            align-items: center;

            gap: 8px;

            color: white;

            font-size: 15px;

            font-weight: 700;

            text-decoration: none;

            position: relative;

            transition: 0.25s;
        }


        .nav-link:hover {

            background: var(--azul);
        }


        .nav-link::after {

            content: "";

            position: absolute;

            bottom: 0;

            left: 50%;

            width: 0;

            height: 4px;

            background: var(--rosa);

            transform: translateX(-50%);

            transition: 0.25s;
        }


        .nav-link:hover::after {

            width: 70%;
        }


        /* ==================================
           CONTEÚDO
        ================================== */

        main {

            flex: 1;

            width: 100%;

            display: flex;

            align-items: center;

            justify-content: center;

            padding: 55px 20px;
        }


        /* ==================================
           CARD
        ================================== */

        .card {

            width: 100%;

            max-width: 620px;

            background: white;

            padding: 40px;

            border-radius: 25px;

            text-align: center;

            border: 2px solid #e2f7fc;

            border-top: 7px solid var(--verde);

            box-shadow:
                    0 12px 35px rgba(0, 108, 140, 0.13);
        }


        /* ==================================
           ÍCONE
        ================================== */

        .icone {

            width: 85px;

            height: 85px;

            margin: 0 auto 18px;

            border-radius: 50%;

            display: flex;

            align-items: center;

            justify-content: center;

            background: var(--verde);

            color: var(--azul-escuro);

            font-size: 45px;

            font-weight: bold;
        }


        /* ==================================
           TÍTULO
        ================================== */

        .card h2 {

            color: var(--azul-escuro);

            font-size: 29px;

            margin-bottom: 10px;
        }


        .mensagem {

            color: #777;

            font-size: 16px;

            margin-bottom: 25px;
        }


        /* ==================================
           DADOS
        ================================== */

        .dados {

            background: #f2fbff;

            border: 1px solid #d5f1fa;

            border-radius: 18px;

            padding: 20px;

            text-align: left;

            margin-bottom: 25px;
        }


        .dados p {

            padding: 10px 0;

            border-bottom: 1px solid #dceff5;

            font-size: 16px;
        }


        .dados p:last-child {

            border-bottom: none;
        }


        .dados strong {

            color: var(--azul-escuro);

            margin-right: 5px;
        }


        /* ==================================
           BOTÕES
        ================================== */

        .botoes {

            display: flex;

            justify-content: center;

            flex-wrap: wrap;

            gap: 12px;
        }


        .botao {

            display: inline-flex;

            align-items: center;

            justify-content: center;

            gap: 8px;

            padding: 13px 20px;

            border-radius: 12px;

            background: var(--azul-escuro);

            color: white;

            text-decoration: none;

            font-size: 15px;

            font-weight: bold;

            transition: 0.25s;
        }


        .botao:hover {

            background: var(--azul);

            transform: translateY(-2px);
        }


        .botao.secundario {

            background: var(--rosa);

            color: #59364a;
        }


        .botao.secundario:hover {

            background: #f5a4ce;
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

        <a href="index_inicio - Copia.html.php" class="nav-link ativo">
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


<!-- ================= CONTEÚDO ================= -->

<main>

    <div class="card">

        <div class="icone">
            ✓
        </div>


        <h2>
            Cadastro do pet realizado!
        </h2>


        <p class="mensagem">
            O cadastro do seu pet foi realizado com sucesso.
        </p>


        <div class="dados">

            <p>

                <strong>
                    <i class="fa-solid fa-paw"></i>
                    Pet:
                </strong>

                <?php echo htmlspecialchars($namePET); ?>

            </p>


            <p>

                <strong>
                    Espécie:
                </strong>

                <?php echo htmlspecialchars($especie); ?>

            </p>


            <p>

                <strong>
                    Raça:
                </strong>

                <?php echo htmlspecialchars($raca); ?>

            </p>


            <p>

                <strong>
                    Peso:
                </strong>

                <?php echo htmlspecialchars($peso); ?> kg

            </p>


            <p>

                <strong>
                    Gênero:
                </strong>

                <?php echo htmlspecialchars($gender); ?>

            </p>


            <?php if (!empty($observacao)): ?>

                <p>

                    <strong>
                        Observações:
                    </strong>

                    <?php echo htmlspecialchars($observacao); ?>

                </p>

            <?php endif; ?>

        </div>


        <div class="botoes">

            <a href="index_inicio.html"
               class="botao">

                <i class="fa-solid fa-house"></i>

                Página inicial

            </a>


            <a href="forms.php"
               class="botao secundario">

                <i class="fa-solid fa-plus"></i>

                Cadastrar outro pet

            </a>

        </div>

    </div>

</main>


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