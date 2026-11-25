
<?php

// ==============================
// VARIÁVEIS
// ==============================

$namePET = "";
$rgPET = "";
$especie = "";
$raca = "";
$peso = "";
$gender = "";
$comment = "";


// ==============================
// VARIÁVEIS DE ERRO
// ==============================

$namePetErr = "";
$genderErr = "";
$racaErr = "";
$especieErr = "";
$pesoErr = "";


// ==============================
// VALIDAÇÃO
// ==============================

if ($_SERVER["REQUEST_METHOD"] == "POST") {


    // ==============================
    // NOME
    // ==============================

    if (empty($_POST["nomedopet"])) {

        $namePetErr = "O nome do pet é obrigatório.";

    } else {

        $namePET = test_input($_POST["nomedopet"]);

        if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/", $namePET)) {

            $namePetErr = "Permitido apenas letras e espaços.";

        }
    }





    // ==============================
    // ESPÉCIE
    // ==============================

    if (empty($_POST["especiedopet"])) {

        $especieErr = "Selecione uma espécie.";

    } else {

        $especie = test_input($_POST["especiedopet"]);

    }


    // ==============================
    // RAÇA
    // ==============================

    if (empty($_POST["raça"])) {

        $racaErr = "A raça é obrigatória.";

    } else {

        $raca = test_input($_POST["raça"]);

        if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/", $raca)) {

            $racaErr = "Permitido apenas letras e espaços.";

        }
    }


    // ==============================
    // PESO
    // ==============================

    if (empty($_POST["peso"])) {

        $pesoErr = "O peso é obrigatório.";

    } else {

        $peso = test_input($_POST["peso"]);

        if (!is_numeric($peso) || $peso <= 0) {

            $pesoErr = "Digite um peso válido.";

        }
    }


    // ==============================
    // SEXO
    // ==============================

    if (empty($_POST["sexo"])) {

        $genderErr = "Selecione o sexo do pet.";

    } else {

        $gender = test_input($_POST["sexo"]);

    }


    // ==============================
    // OBSERVAÇÃO
    // ==============================

    if (!empty($_POST["comment"])) {

        $comment = test_input($_POST["comment"]);

    }


    // ==============================
    // VERIFICAÇÃO FINAL
    // ==============================

    if (
            empty($namePetErr) &&
            empty($especieErr) &&
            empty($racaErr) &&
            empty($pesoErr) &&
            empty($genderErr)
    ) {

        // Envia os dados para cadastro.php
        // através da sessão.

        session_start();

        $_SESSION["pet"] = [
                "nome" => $namePET,
                "rg" => $rgPET,
                "especie" => $especie,
                "raca" => $raca,
                "peso" => $peso,
                "sexo" => $gender,
                "observacao" => $comment
        ];

        header("Location: cadastroPet.php");
        exit;
    }
}


// ==============================
// FUNÇÃO DE SEGURANÇA
// ==============================

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);

    return $data;
}

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta
            name="viewport"
            content="width=device-width, initial-scale=1.0"
    >

    <title>Cadastro do Pet</title>


    <style>

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

            font-family: Arial, Helvetica, sans-serif;

            min-height: 100vh;

            display: flex;

            flex-direction: column;

            justify-content: flex-start;

            align-items: center;

            padding: 0;

            background: linear-gradient(
                    135deg,
                    #006c8b,
                    #78dfff
            );
        }

        /* =========================================
           HEADER
        ========================================= */

        .header {
            width: 100%;
            height: 100px;
            background-color: #bdeba2;

            display: flex;
            align-items: center;
            justify-content: center;

            position: relative;

            padding: 0 50px;

            border-bottom: 3px solid #78dfff;
            box-shadow: 0 3px 12px rgba(0, 108, 140, 0.12);

            z-index: 10;
        }


        /* =========================================
           LOGO
        ========================================= */

        .logo-container {
            display: flex;
            align-items: center;
            justify-content: center;

            height: 100%;
            text-decoration: none;
        }

        .logo-container img {
            width: 210px;
            height: 80px;

            object-fit: contain;
            display: block;
        }


        /* =========================================
           ÍCONES DO LADO DIREITO
        ========================================= */

        .header-direito {
            position: absolute;

            right: 50px;
            top: 50%;

            transform: translateY(-50%);

            display: flex;
            align-items: center;

            gap: 30px;
        }

        .icone-header {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;

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


        /* =========================================
           MENU
        ========================================= */

        .nav {
            width: 100%;

            background-color: #006c8c;

            box-shadow: 0 3px 8px rgba(0, 108, 140, 0.2);

            z-index: 9;
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
           RESPONSIVO
        ========================================= */

        @media (max-width: 900px) {

            .header {
                height: 90px;
                padding: 0 20px;
            }

            .logo-container img {
                width: 180px;
                height: 70px;
            }

            .header-direito {
                right: 20px;
                gap: 18px;
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
                height: 80px;
                padding: 0 15px;
            }

            .logo-container {
                position: absolute;
                left: 50%;

                transform: translateX(-50%);
            }

            .logo-container img {
                width: 150px;
                height: 65px;
            }

            .header-direito {
                right: 15px;
                gap: 12px;
            }

            .icone-header span {
                display: none;
            }

            .icone-header i {
                font-size: 21px;
            }

            .nav {
                overflow-x: auto;
            }

            .nav-container {
                width: max-content;

                min-height: 50px;

                flex-wrap: nowrap;
            }

            .nav-link {
                height: 50px;
                padding: 0 14px;
            }
        }


        /* ==================================
           CONTAINER
        ================================== */

        .container {

            width: 100%;

            max-width: 650px;

            background: #ffffff;

            padding: 35px;

            margin: 30px auto;

            border-radius: 20px;

            box-shadow:
                    0 10px 30px rgba(0, 108, 140, 0.12);
        }


        /* ==================================
           TÍTULO
        ================================== */

        .titulo {

            text-align: center;

            color: #006c8c;

            font-size: 30px;

            margin-bottom: 8px;
        }


        .subtitulo {

            text-align: center;

            color: #33b6de;

            font-size: 15px;

            margin-bottom: 30px;
        }


        /* ==================================
           CAMPOS
        ================================== */

        .campo {

            margin-bottom: 20px;
        }


        .campo > label {

            display: block;

            margin-bottom: 8px;

            color: #006c8c;

            font-size: 15px;

            font-weight: bold;
        }


        /* ==================================
           INPUTS
        ================================== */

        input[type="text"],
        input[type="number"],
        textarea {

            width: 100%;

            padding: 13px 15px;

            border: 2px solid #78dfff;

            border-radius: 10px;

            background: #ffffff;

            color: #006c8c;

            font-size: 15px;

            outline: none;

            transition: 0.3s;
        }


        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {

            border-color: #33b6de;

            background: #ffffff;

            box-shadow:
                    0 0 0 3px rgba(120, 223, 255, 0.15);
        }


        /* ==================================
           TEXTAREA
        ================================== */

        textarea {

            min-height: 120px;

            resize: vertical;
        }


        /* ==================================
           RADIO BUTTONS
        ================================== */

        .opcoes {

            display: flex;

            flex-wrap: wrap;

            gap: 10px;
        }


        .opcao {

            position: relative;
        }


        .opcao input {

            position: absolute;

            opacity: 0;
        }


        .opcao label {

            display: block;

            padding: 10px 17px;

            margin: 0;

            background: #b9e39a;

            border: 2px solid #78dfff;

            border-radius: 25px;

            color: #006c8c;

            font-size: 14px;

            font-weight: normal;

            cursor: pointer;

            transition: 0.3s;
        }


        .opcao label:hover {

            background: #78dfff;

            border-color: #33b6de;
        }


        .opcao input:checked + label {

            background: #33b6de;

            border-color: #33b6de;

            color: #006c8c;

            font-weight: bold;
        }


        /* ==================================
           ERROS
        ================================== */

        .error {

            display: block;

            margin-top: 6px;

            color: #ff0000;

            font-size: 13px;
        }


        /* ==================================
           BOTÃO
        ================================== */

        .botao {

            width: 100%;

            margin-top: 10px;

            padding: 15px;

            border: none;

            border-radius: 12px;

            background: linear-gradient(
                    135deg,
                    #33b6de,
                    #78dfff
            );

            color: #ffffff;

            font-size: 17px;

            font-weight: bold;

            cursor: pointer;

            transition: 0.3s;
        }


        .botao:hover {

            transform: translateY(-2px);

            box-shadow:
                    0 7px 18px rgba(0, 108, 140, 0.25);
        }


        .botao:active {

            transform: translateY(0);
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


            body {

                padding: 0;
            }


            .container {

                padding: 25px 20px;

                margin: 15px;
            }


            .titulo {

                font-size: 25px;
            }


            .opcoes {

                flex-direction: column;
            }


            .opcao label {

                width: 100%;

                text-align: center;
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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<body>


<header class="header">

    <a href="../pagina_inicial/index_inicio%20-%20Copia.html"
       class="logo-container">

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


<div class="container">

    <h1 class="titulo">
        Cadastro do Pet
    </h1>


    <form
            method="post"
            action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>"
    >

        <div class="campo">

            <label for="nomedopet">
                Nome do Pet
            </label>

            <input
                    type="text"
                    id="nomedopet"
                    name="nomedopet"
                    placeholder="Digite o nome do pet"
            >

            <?php if (!empty($namePetErr)): ?>

                <span class="error">
                        <?php echo htmlspecialchars($namePetErr); ?>
                    </span>

            <?php endif; ?>

        </div>


        <div class="campo">

            <label>
                Espécie
            </label>


            <div class="opcoes">


                <div class="opcao">

                    <input
                            type="radio"
                            id="gato"
                            name="especiedopet"
                            value="gato"

                            <?php
                            if ($especie == "gato") {
                                echo "checked";
                            }
                            ?>
                    >

                    <label for="gato">
                        Gato
                    </label>

                </div>


                <div class="opcao">

                    <input
                            type="radio"
                            id="cao"
                            name="especiedopet"
                            value="cao"

                            <?php
                            if ($especie == "cao") {
                                echo "checked";
                            }
                            ?>
                    >

                    <label for="cao">
                        Cão
                    </label>

                </div>


                <div class="opcao">

                    <input
                            type="radio"
                            id="coelho"
                            name="especiedopet"
                            value="coelho"

                            <?php
                            if ($especie == "coelho") {
                                echo "checked";
                            }
                            ?>
                    >

                    <label for="coelho">
                        Coelho
                    </label>

                </div>


                <div class="opcao">

                    <input
                            type="radio"
                            id="passaro"
                            name="especiedopet"
                            value="passaro"

                            <?php
                            if ($especie == "passaro") {
                                echo "checked";
                            }
                            ?>
                    >

                    <label for="passaro">
                        Pássaro
                    </label>

                </div>


                <div class="opcao">

                    <input
                            type="radio"
                            id="outro"
                            name="especiedopet"
                            value="other"

                            <?php
                            if ($especie == "other") {
                                echo "checked";
                            }
                            ?>
                    >

                    <label for="outro">
                        Outro
                    </label>

                </div>

            </div>


            <?php if (!empty($especieErr)): ?>

                <span class="error">
                        <?php echo htmlspecialchars($especieErr); ?>
                    </span>

            <?php endif; ?>

        </div>


        <div class="campo">

            <label for="raca">
                Raça
            </label>

            <input
                    type="text"
                    id="raca"
                    name="raça"
                    value="<?php echo htmlspecialchars($raca); ?>"
                    placeholder="Ex.: Golden Retriever"
            >

            <?php if (!empty($racaErr)): ?>

                <span class="error">
                        <?php echo htmlspecialchars($racaErr); ?>
                    </span>

            <?php endif; ?>

        </div>

        <div class="campo">

            <label for="peso">
                Peso (kg)
            </label>

            <input
                    type="number"
                    id="peso"
                    name="peso"
                    value="<?php echo htmlspecialchars($peso); ?>"
                    placeholder="Ex.: 10.5"
                    step="0.1"
                    min="0"
            >

            <?php if (!empty($pesoErr)): ?>

                <span class="error">
                        <?php echo htmlspecialchars($pesoErr); ?>
                    </span>

            <?php endif; ?>

        </div>


        <div class="campo">

            <label>
                Genêro
            </label>


            <div class="opcoes">


                <div class="opcao">

                    <input
                            type="radio"
                            id="feminino"
                            name="sexo"
                            value="female"

                            <?php
                            if ($gender == "female") {
                                echo "checked";
                            }
                            ?>
                    >

                    <label for="feminino">
                        Feminino
                    </label>

                </div>


                <div class="opcao">

                    <input
                            type="radio"
                            id="masculino"
                            name="sexo"
                            value="male"

                            <?php
                            if ($gender == "male") {
                                echo "checked";
                            }
                            ?>
                    >

                    <label for="masculino">
                        Masculino
                    </label>

                </div>


                <div class="opcao">

                    <input
                            type="radio"
                            id="outro-sexo"
                            name="sexo"
                            value="other"

                            <?php
                            if ($gender == "other") {
                                echo "checked";
                            }
                            ?>
                    >

                    <label for="outro-sexo">
                        Outro
                    </label>

                </div>


            </div>


            <?php if (!empty($genderErr)): ?>

                <span class="error">
                        <?php echo htmlspecialchars($genderErr); ?>
                    </span>

            <?php endif; ?>

        </div>


        <div class="campo">

            <label for="comment">
                Observações
            </label>

            <textarea
                    id="comment"
                    name="comment"
                    placeholder="Digite alguma observação sobre seu pet..."
            ><?php echo htmlspecialchars($comment); ?></textarea>

        </div>

        <button
                type="submit"
                class="botao"
        >
            Cadastrar meu Pet!
        </button>


    </form>

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
