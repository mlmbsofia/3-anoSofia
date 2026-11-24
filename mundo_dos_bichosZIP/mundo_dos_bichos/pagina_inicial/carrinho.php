<?php
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrinho | Mundo dos Bichos</title>

    <link rel="stylesheet" href="css/carrinho.css">
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

    <h1>
        <i class="fa-solid fa-cart-shopping"></i>
        Meu Carrinho
    </h1>

    <div class="conteudo">

        <!-- Produtos -->
        <div class="produtos">

            <div class="produto">

                <img src="../img/ra-o-premier-super-premium-formula-sabor-frango-e-mandioca-para-c-es-adultos-de-dxgcecfwxj.webp" alt="Ração" >

                <div class="info">

                    <h3>Ração Premium Cães Adultos</h3>

                    <p>1kg</p>

                    <span>R$ 89,90</span>

                </div>

                <div class="quantidade">

                    <button>-</button>

                    <input type="number" value="1">

                    <button>+</button>

                </div>

            </div>

            <div class="produto">

                <img src="../img/D_Q_NP_2X_820367-MLB112274280991_052026-P.webp" alt="Brinquedo">

                <div class="info">

                    <h3>Brinquedo Mordedor</h3>

                    <p>Borracha Natural</p>

                    <span>R$ 39,90</span>

                </div>

                <div class="quantidade">

                    <button>-</button>

                    <input type="number" value="2">

                    <button>+</button>

                </div>

            </div>

            <div class="produto">

                <img src="../img/imagem_coleira_ajustavel_M.jpg" alt="Coleira">

                <div class="info">

                    <h3>Coleira Ajustável</h3>

                    <p>Tamanho M</p>

                    <span>R$ 49,90</span>

                </div>

                <div class="quantidade">

                    <button>-</button>

                    <input type="number" value="1">

                    <button>+</button>

                </div>

            </div>

        </div>

        <!-- Resumo -->
        <aside class="resumo">

            <h2>Resumo da Compra</h2>

            <div class="linha">
                <span>Subtotal</span>
                <strong>R$ 219,70</strong>
            </div>

            <div class="linha">
                <span>Frete</span>
                <strong>Grátis</strong>
            </div>

            <hr>

            <div class="linha total">
                <span>Total</span>
                <strong>R$ 219,70</strong>
            </div>

            <input
                type="text"
                placeholder="Digite seu CEP">

            <button class="cep">
                Calcular Frete
            </button>

            <button class="finalizar">
                <i class="fa-solid fa-credit-card"></i>
                Finalizar Compra
            </button>

            <a href="produtos.php" class="continuar">
                Continuar Comprando
            </a>

        </aside>

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

    /* CONTEÚDO */

    .banner{
        text-align:center;
        padding:80px 20px;
    }

    .banner h1{
        color:#006c8c;
        font-size:48px;
        margin-bottom:20px;
    }

    .banner p{
        color:#555;
        font-size:20px;
    }


    .logo{
        color:white;
        text-decoration:none;
        font-size:28px;
        font-weight:bold;
    }

    .logo i{
        color:#FAB9DA;
        margin-right:10px;
    }

    .container{
        width:1200px;
        margin:40px auto;
    }

    h1{
        color:#006c8c;
        margin-bottom:30px;
    }

    .conteudo{
        display:flex;
        gap:30px;
    }

    .produtos{
        flex:2;
    }

    .produto{

        display:flex;
        align-items:center;

        background:white;

        border-radius:18px;

        padding:20px;

        margin-bottom:20px;

        box-shadow:0 8px 20px rgba(0,0,0,.1);

    }

    .produto img{

        width:120px;
        height:120px;

        object-fit:cover;

        border-radius:15px;

        margin-right:20px;

    }

    .info{
        flex:1;
    }

    .info h3{
        color:#006c8c;
        margin-bottom:8px;
    }

    .info p{
        color:#777;
        margin-bottom:10px;
    }

    .info span{

        font-size:22px;

        font-weight:bold;

        color:#33b6de;

    }

    .quantidade{

        display:flex;
        align-items:center;
        gap:10px;

    }

    .quantidade button{

        width:35px;
        height:35px;

        border:none;

        border-radius:50%;

        background:#33b6de;

        color:white;

        cursor:pointer;

        font-size:18px;

    }

    .quantidade input{

        width:60px;

        text-align:center;

        padding:8px;

    }

    .resumo{

        flex:1;

        background:white;

        border-radius:20px;

        padding:30px;

        height:fit-content;

        box-shadow:0 8px 20px rgba(0,0,0,.1);

    }

    .resumo h2{

        color:#006c8c;

        margin-bottom:25px;

    }

    .linha{

        display:flex;

        justify-content:space-between;

        margin:18px 0;

    }

    .total{

        font-size:22px;

    }

    .resumo input{

        width:100%;

        padding:12px;

        margin:20px 0;

        border:2px solid #b9e39a;

        border-radius:10px;

    }

    .cep{

        width:100%;

        padding:13px;

        border:none;

        background:#33b6de;

        color:white;

        border-radius:10px;

        cursor:pointer;

        margin-bottom:15px;

    }

    .finalizar{

        width:100%;

        padding:15px;

        background:#006c8c;

        color:white;

        border:none;

        border-radius:10px;

        font-size:18px;

        cursor:pointer;

        transition:.3s;

    }

    .finalizar:hover{

        background:#33b6de;

    }

    .continuar{

        display:block;

        text-align:center;

        margin-top:20px;

        color:#006c8c;

        text-decoration:none;

        font-weight:bold;

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
