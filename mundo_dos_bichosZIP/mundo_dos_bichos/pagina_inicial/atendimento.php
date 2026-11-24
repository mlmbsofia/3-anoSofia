<?php
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atendimento | Mundo dos Bichos</title>

    <link rel="stylesheet" href="css/atendimento.css">

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



    <div class="conteudo">

<section class="container">

    <div class="texto">

        <h1>
            <i class="fa-solid fa-headset"></i>
            Atendimento ao Cliente
        </h1>

        <p>
            Estamos prontos para cuidar de você e do seu pet.
            Tire dúvidas, envie sugestões ou relate qualquer problema.
        </p>

    </div>

    <div class="conteudo">

        <div class="informacoes">

            <div class="card">

                <i class="fa-solid fa-phone"></i>

                <h3>Telefone</h3>

                <p>(31) 3333-4444</p>

            </div>

            <div class="card">

                <i class="fa-solid fa-envelope"></i>

                <h3>E-mail</h3>

                <p>contato@mundodosbichos.com</p>

            </div>

            <div class="card">

                <i class="fa-solid fa-clock"></i>

                <h3>Horário</h3>

                <p>Segunda a Sexta<br>08h às 18h</p>

            </div>

        </div>

        <div class="formulario">

            <h2>Envie sua mensagem</h2>

            <form>

                <input type="text" placeholder="Nome Completo" required>

                <input type="email" placeholder="E-mail" required>

                <input type="text" placeholder="Assunto">

                <textarea rows="6" placeholder="Digite sua mensagem..."></textarea>

                <button type="submit">
                    <i class="fa-solid fa-paper-plane"></i>
                    Enviar Mensagem
                </button>

            </form>

        </div>

    </div>

</section>
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

    .container{

        width:1200px;

        margin:50px auto;

    }

    .texto{

        text-align:center;

        margin-bottom:40px;

    }

    .texto h1{

        color:#006c8c;

        font-size:42px;

        margin-bottom:15px;

    }

    .texto i{

        color:#ff5ca8;

    }

    .texto p{

        font-size:20px;

        color:#555;

    }

    .conteudo{

        display:flex;

        gap:40px;

    }

    .informacoes{

        width:35%;

        display:flex;

        flex-direction:column;

        gap:25px;

    }

    .card{

        background:#fff0f7;

        border:3px solid #FAB9DA;

        border-radius:20px;

        padding:30px;

        text-align:center;

        transition:.3s;

        box-shadow:0 10px 20px rgba(0,0,0,.08);

    }

    .card:hover{

        transform:translateY(-8px);

        background:white;

    }

    .card i{

        font-size:45px;

        color:#ff5ca8;

        margin-bottom:15px;

    }

    .card h3{

        color:#006c8c;

        margin-bottom:10px;

    }

    .card p{

        color:#666;

        line-height:25px;

    }

    .formulario{

        flex:1;

        background:white;

        border-radius:25px;

        padding:40px;

        border:3px solid #FAB9DA;

        box-shadow:0 12px 25px rgba(0,0,0,.10);

    }

    .formulario h2{

        color:#006c8c;

        margin-bottom:25px;

    }

    form{

        display:flex;

        flex-direction:column;

    }

    input,
    textarea{

        padding:15px;

        margin-bottom:18px;

        border:2px solid #FAB9DA;

        border-radius:12px;

        font-size:16px;

        outline:none;

        transition:.3s;

    }

    input:focus,
    textarea:focus{

        border-color:#33b6de;

        background:#fff8fc;

    }

    textarea{

        resize:none;

    }

    button{

        padding:16px;

        border:none;

        border-radius:12px;

        background:linear-gradient(90deg,#ff8ec8,#33b6de);

        color:white;

        font-size:18px;

        cursor:pointer;

        transition:.3s;

    }

    button:hover{

        transform:scale(1.02);

        background:linear-gradient(90deg,#33b6de,#006c8c);

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
