<?php

$name = $email = $cpf = $telefone = $endereco = $senha = $confirma_senha = "";
$nameError = $emailError = $cpfError = $telefoneError = $enderecoError = $senhaError = $confirma_senhaError = "";



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameError = "O nome é obrigatório.";
    }else{
        $name = verificar_entrada($_POST["name"]);
        if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
            $nameError = "Permitido apenas letras e espaço em branco";
        }
    }

    if (empty($_POST["email"])) {
        $emailError = "O e-mail é obrigatório.";
    }else{
        $email = verificar_entrada($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailError = "Formato de email invalido.";
        }
    }

    if (empty($_POST["cpf"])){
        $cpfError = "O CPF é obrigatorio.";
    }else{
        $cpf = verificar_entrada($_POST["cpf"]);

        if (!filter_var($cpf, FILTER_VALIDATE_EMAIL)) {
            $cpfError = "Formato de CPF invalido.";
        }
    }

    if (empty($_POST["telefone"])){
        $telefoneError = "O telefone é obrigatorio.";
    }else{
        $telefone = verificar_entrada($_POST["telefone"]);
        if (!preg_match('/^\d{10,11}$/',$telefone)) {
            $telefoneError = "Formato de telefone invalido.";
        }
    }

    if (empty($_POST["endereco"])){
        $enderecoError = "O endereço é obrigatório.";
    }else{
        $endereco = verificar_entrada($_POST["endereco"]);
    }

    if (empty($_POST["senha"])){
        $senhaError = "A senha é obrigatoria";
    }else{
        $senha = verificar_entrada($_POST["senha"]);
    }

    if( empty($_POST["confirma_senha"])){
        $confirma_senhaError = "A confirmação da senha é obrigatoria";
    } else{
        $confirma_senha = verificar_entrada($_POST["confirma_senha"]);
    }
}


function verificar_entrada($entrada)
{
    $entrada = trim($entrada);
    $entrada = stripslashes($entrada);
    $entrada = htmlspecialchars($entrada);
    $entrada = strtoupper($entrada);
    return $entrada;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro | Mundo dos Bichos</title>

    <link rel="stylesheet" href="css/cadastro.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
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

<div class="container">

    <div class="lado-esquerdo">

        <i class="fa-solid fa-dog"></i>

        <h1>Bem-vindo!</h1>

        <p>
            Cadastre-se e aproveite ofertas exclusivas,
            descontos especiais e tudo para deixar seu
            pet mais feliz.
        </p>

    </div>

    <div class="lado-direito">

        <h2>Criar Conta</h2>

        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">

            <div class="campo">
                <label>Nome Completo</label>
                <input type="text" name="name">
                <span style="color: red"> * <?php echo $nameError;?> </span>

            </div>

            <div class="campo">
                <label>E-mail</label>
                <input type="email" name="email">
                <span style="color: red"> * <?php echo $emailError;?> </span>
            </div>

            <div class="linha">

                <div class="campo">
                    <label>CPF</label>
                    <input type="text" name="cpf">
                    <span style="color: red"> * <?php echo $cpfError;?> </span>
                </div>

                <div class="campo">
                    <label>Telefone</label>
                    <input type="text" name="telefone">
                    <span style="color: red"> * <?php echo $telefoneError;?> </span>
                </div>

            </div>

            <div class="campo">
                <label>Endereço</label>
                <input type="text" name="endereco">
                <span style="color: red"> * <?php echo $enderecoError;?> </span>
            </div>

            <div class="linha">

                <div class="campo">
                    <label>Senha</label>
                    <input type="password" name="senha">
                    <span style="color: red"> * <?php echo $senhaError;?> </span>
                </div>

                <div class="campo">
                    <label>Confirmar Senha</label>
                    <input type="password" name="confirma_senha">
                    <span style="color: red"> * <?php echo $confirma_senhaError;?> </span>
                </div>

            </div>

            <button type="submit">
                <i class="fa-solid fa-user-plus"></i>
                Cadastrar
            </button>

            <button type="submit">
                <a href="cadastroPet.php" style="text-decoration: none; color: #fff0f7;">
                    Cadastre seu Pet
                </a>
            </button>

        </form>

        <p class="login">
            Já possui uma conta?

            <a href="login.php">
                Fazer Login
            </a>

        </p>

    </div>

</div>


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
    *{
        margin:0;
        padding:0;
        box-sizing:border-box;
        font-family:'Segoe UI',sans-serif;
    }

    body{

        background:linear-gradient(135deg,#78dfff,#b9e39a);

        min-height:100vh;

        display:flex;
        flex-direction:column;

    }

    .header {
        height: 100px;

        background-color: #c2eda9;

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

    .container{

        width:1100px;

        margin:50px auto;

        background:white;

        border-radius:25px;

        overflow:hidden;

        display:flex;

        box-shadow:0 15px 40px rgba(0,0,0,.15);

    }

    .lado-esquerdo{

        width:40%;

        background:linear-gradient(180deg,#006c8c,#33b6de);

        color:white;

        display:flex;

        flex-direction:column;

        justify-content:center;

        align-items:center;

        padding:40px;

    }

    .lado-esquerdo i{

        font-size:120px;

        margin-bottom:25px;

    }

    .lado-esquerdo h1{

        margin-bottom:20px;

    }

    .lado-esquerdo p{

        text-align:center;

        line-height:28px;

    }

    .lado-direito{

        width:60%;

        padding:45px;

    }

    .lado-direito h2{

        color:#006c8c;

        margin-bottom:25px;

    }

    .campo{

        display:flex;

        flex-direction:column;

        margin-bottom:20px;

        width:100%;

    }

    .campo label{

        margin-bottom:8px;

        color:#555;

        font-weight:600;

    }

    .campo input{

        padding:14px;

        border:2px solid #b9e39a;

        border-radius:12px;

        outline:none;

        transition:.3s;

    }

    .campo input:focus{

        border-color:#33b6de;

    }



    .linha{

        display:flex;

        gap:20px;

    }

    button{

        width:100%;

        padding:16px;

        margin-top:15px;

        border:none;

        border-radius:12px;

        background:#006c8c;

        color:white;

        font-size:18px;

        cursor:pointer;

        transition:.3s;


    }

    button:hover{

        background:#33b6de;

        transform:translateY(-3px);

    }

    .login{

        margin-top:25px;

        text-align:center;

    }

    .login a{

        color:#006c8c;

        text-decoration:none;

        font-weight:bold;

    }

    .login a:hover{

        color:#33b6de;

    }

    /* FOOTER */
    .footer {
        background-color: #78dfff;
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