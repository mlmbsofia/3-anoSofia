<?php

session_start();

// ==============================
// VARIÁVEIS
// ==============================

$namePET = "";
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

    if (empty($_POST["raca"])) {

        $racaErr = "A raça é obrigatória.";

    } else {

        $raca = test_input($_POST["raca"]);

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

        // Guarda os dados na sessão

        $_SESSION["pet"] = [
                "nome" => $namePET,
                "especie" => $especie,
                "raca" => $raca,
                "peso" => $peso,
                "sexo" => $gender,
                "observacao" => $comment
        ];

        // Vai para a página de sucesso

        header("Location: cadastro.php");
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

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro do Pet | Mundo dos Bichos</title>

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
            --verde: #b9e39a;
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

            font-family: Arial, Helvetica, sans-serif;

            min-height: 100vh;

            display: flex;

            flex-direction: column;

            background: linear-gradient(
                    135deg,
                    #006c8c,
                    #78dfff
            );
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


        .nav-link:hover,
        .nav-link.ativo {

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


        .nav-link:hover::after,
        .nav-link.ativo::after {

            width: 70%;
        }


        /* ==================================
           CONTAINER
        ================================== */

        .container {

            width: 100%;

            max-width: 650px;

            margin: 40px auto;

            padding: 35px;

            background: white;

            border-radius: 20px;

            box-shadow:
                    0 10px 30px rgba(0, 108, 140, 0.20);
        }


        /* ==================================
           TÍTULO
        ================================== */

        .titulo {

            text-align: center;

            color: var(--azul-escuro);

            font-size: 30px;

            margin-bottom: 8px;
        }


        .subtitulo {

            text-align: center;

            color: var(--azul);

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

            color: var(--azul-escuro);

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

            border: 2px solid var(--azul-claro);

            border-radius: 10px;

            background: white;

            color: var(--azul-escuro);

            font-size: 15px;

            outline: none;

            transition: 0.3s;
        }


        input[type="text"]:focus,
        input[type="number"]:focus,
        textarea:focus {

            border-color: var(--azul);

            box-shadow:
                    0 0 0 3px rgba(120, 223, 255, 0.20);
        }


        /* ==================================
           TEXTAREA
        ================================== */

        textarea {

            min-height: 120px;

            resize: vertical;
        }


        /* ==================================
           OPÇÕES
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

            background: var(--verde);

            border: 2px solid var(--azul-claro);

            border-radius: 25px;

            color: var(--azul-escuro);

            cursor: pointer;

            transition: 0.3s;
        }


        .opcao label:hover {

            background: var(--azul-claro);

            border-color: var(--azul);
        }


        .opcao input:checked + label {

            background: var(--azul);

            border-color: var(--azul);

            color: white;

            font-weight: bold;
        }


        /* ==================================
           ERROS
        ================================== */

        .error {

            display: block;

            margin-top: 6px;

            color: #e00000;

            font-size: 13px;

            font-weight: bold;
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
                    var(--azul),
                    var(--azul-claro)
            );

            color: white;

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


        /* ==================================
           RESPONSIVIDADE
        ================================== */

        @media (max-width: 900px) {

            .header-esquerdo {

                display: none;
            }

            .header-direito {

                right: 20px;
            }

            .nav-container {

                flex-wrap: wrap;
            }
        }


        @media (max-width: 600px) {

            .header {

                min-height: 85px;
            }

            .logo-container img {

                width: 180px;

                height: 70px;
            }

            .icone-header span {

                display: none;
            }

            .nav {

                overflow-x: auto;
            }

            .nav-container {

                width: max-content;

                justify-content: flex-start;

                flex-wrap: nowrap;
            }

            .nav-link {

                min-height: 50px;

                padding: 0 14px;
            }

            .container {

                margin: 20px 15px;

                padding: 25px 20px;
            }

            .opcoes {

                flex-direction: column;
            }

            .opcao label {

                text-align: center;
            }
        }

        /* =========================================
   FOOTER
========================================= */

        .footer {
            background: var(--azul-claro);
            color: #000;
            width: 100%;
            margin-top: auto;
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


<!-- ================= FORMULÁRIO ================= -->

<div class="container">

    <h1 class="titulo">
        Cadastro do Pet
    </h1>

    <p class="subtitulo">
        Preencha os dados do seu amiguinho 🐾
    </p>


    <form method="post"
          action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">


        <!-- NOME -->

        <div class="campo">

            <label for="nomedopet">
                Nome do Pet
            </label>

            <input
                    type="text"
                    id="nomedopet"
                    name="nomedopet"
                    value="<?php echo htmlspecialchars($namePET); ?>"
                    placeholder="Digite o nome do pet"
            >

            <?php if (!empty($namePetErr)): ?>

                <span class="error">
                    <?php echo htmlspecialchars($namePetErr); ?>
                </span>

            <?php endif; ?>

        </div>


        <!-- ESPÉCIE -->

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
                            <?php if ($especie == "gato") echo "checked"; ?>
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
                            <?php if ($especie == "cao") echo "checked"; ?>
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
                            <?php if ($especie == "coelho") echo "checked"; ?>
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
                            <?php if ($especie == "passaro") echo "checked"; ?>
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
                            value="outro"
                            <?php if ($especie == "outro") echo "checked"; ?>
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


        <!-- RAÇA -->

        <div class="campo">

            <label for="raca">
                Raça
            </label>

            <input
                    type="text"
                    id="raca"
                    name="raca"
                    value="<?php echo htmlspecialchars($raca); ?>"
                    placeholder="Ex.: Golden Retriever"
            >

            <?php if (!empty($racaErr)): ?>

                <span class="error">
                    <?php echo htmlspecialchars($racaErr); ?>
                </span>

            <?php endif; ?>

        </div>


        <!-- PESO -->

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


        <!-- GÊNERO -->

        <div class="campo">

            <label>
                Gênero
            </label>


            <div class="opcoes">

                <div class="opcao">

                    <input
                            type="radio"
                            id="feminino"
                            name="sexo"
                            value="female"
                            <?php if ($gender == "female") echo "checked"; ?>
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
                            <?php if ($gender == "male") echo "checked"; ?>
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
                            <?php if ($gender == "other") echo "checked"; ?>
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


        <!-- OBSERVAÇÕES -->

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


        <!-- BOTÃO -->

        <button type="submit" class="botao">

            <i class="fa-solid fa-paw"></i>

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

                <a href="#" aria-label="Instagram">
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