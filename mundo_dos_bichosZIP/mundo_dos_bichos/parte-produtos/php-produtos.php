<?php

$tipo = $_GET['tipo'] ?? 'petiscos';


$categorias = [

    'petiscos' => [
        'titulo' => 'Petiscos',
        'descricao' => 'Petiscos selecionados para diferentes tipos de animais.',
        'classe' => 'cor-petiscos'
    ],

    'acessorios' => [
        'titulo' => 'Acessórios',
        'descricao' => 'Acessórios para deixar a rotina do seu pet ainda melhor.',
        'classe' => 'cor-acessorios'
    ],

    'vacinas' => [
        'titulo' => 'Vacinas',
        'descricao' => 'Cuidados importantes para a saúde dos animais.',
        'classe' => 'cor-vacinas'
    ]

];


if (!isset($categorias[$tipo])) {
    $tipo = 'petiscos';
}


$dados = $categorias[$tipo];

?>


<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>
        <?php echo $dados['titulo']; ?> - Mundo dos Bichos
    </title>

    <link rel="stylesheet" href="style_produtos.css">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

</head>


<body>

<!-- ================= HEADER ================= -->

<header class="header">



    <a href="../pagina_inicial/index_inicio%20-%20Copia.html" class="logo-container">
        <img src="../img/Logo-MUNDO-%20DOS%20-BICHOS-em-Verde-Pastel.png"
             alt="Mundo dos Bichos">
    </a>

    <div class="header-direito">

        <a href="../pagina_inicial/carrinho.php" class="icone-header">
            <i class="fa-solid fa-cart-shopping"></i>
            <span>Carrinho</span>
        </a>

        <a href="../pagina_inicial/login.php" class="icone-header">
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

        <a href="../pagina_inicial/atendimento.php" class="nav-link">
            <i class="fa-solid fa-headset"></i>
            Atendimento
        </a>

        <a href="../pagina_inicial/cadastro.php" class="nav-link">
            <i class="fa-solid fa-user-plus"></i>
            Cadastro
        </a>

        <a href="../sobre_nos/sobre_nos.html" class="nav-link">
            <i class="fa-solid fa-heart"></i>
            Sobre Nós
        </a>

    </div>

</nav>

<main class="pagina-categoria">

    <!-- ANIMAIS -->

    <section class="animais">

        <h2>Escolha o animal</h2>


        <div class="animais-grid">


            <!-- CACHORROS -->

            <a href="#cachorros" class="animal-card cachorro">

                <span>🐶</span>

                <h3>Cachorros</h3>

            </a>


            <!-- GATOS -->

            <a href="#gatos" class="animal-card gato">

                <span>🐱</span>

                <h3>Gatos</h3>

            </a>


            <!-- AVES -->

            <a href="#aves" class="animal-card ave">

                <span>🐦</span>

                <h3>Aves</h3>

            </a>


            <!-- PEIXES -->

            <a href="#peixes" class="animal-card peixe">

                <span>🐠</span>

                <h3>Peixes</h3>

            </a>


            <!-- PEQUENOS PETS -->

            <a href="#pequenos-pets" class="animal-card pequeno">

                <span>🐹</span>

                <h3>Pequenos Pets</h3>

            </a>

        </div>

    </section>



    <!-- PRODUTOS -->


    <section class="produtos">


        <!-- CACHORROS -->

        <div class="grupo-produtos" id="cachorros">

            <h2>🐶 Produtos para Cachorros</h2>

            <div class="produtos-grid">

                <div class="produto">

                    <div class="produto-img">🐶</div>

                    <h3>
                        <?php echo $dados['titulo']; ?> para cães
                    </h3>

                    <p>
                        Produtos selecionados para cachorros.
                    </p>

                    <button> <a href="parte_cao_php/petiscos-cachorro.php"> Ver produtos </a> </button>

                </div>


                <div class="produto">

                    <div class="produto-img">🦴</div>

                    <h3>
                        Cuidado para cães
                    </h3>

                    <p>
                        Opções para o bem-estar do seu pet.
                    </p>

                    <button> <a href="parte_cao_php/cuidados-cahorro.php"> Ver produtos </a> </button>

                </div>


                <div class="produto">

                    <div class="produto-img">🐕</div>

                    <h3>
                        Linha especial
                    </h3>

                    <p>
                        Produtos pensados para cães.
                    </p>

                    <button><a href="parte_cao_php/linha-especial-cachorro.php"> Ver produtos </a></button>

                </div>

            </div>

        </div>



        <!-- GATOS -->

        <div class="grupo-produtos" id="gatos">

            <h2>🐱 Produtos para Gatos</h2>

            <div class="produtos-grid">

                <div class="produto">

                    <div class="produto-img">🐱</div>

                    <h3>
                        <?php echo $dados['titulo']; ?> para gatos
                    </h3>

                    <p>
                        Produtos especiais para gatos.
                    </p>

                    <button><a href="parte_gato/petiscoGato.php"> Ver produtos </a></button>

                </div>


                <div class="produto">

                    <div class="produto-img">🐾</div>

                    <h3>
                        Cuidados para gatos
                    </h3>

                    <p>
                        Produtos para o conforto do seu gato.
                    </p>

                    <button><a href="parte_gato/cuidadosGato.php"> Ver produtos </a></button>

                </div>

            </div>

        </div>



        <!-- AVES -->

        <div class="grupo-produtos" id="aves">

            <h2>🐦 Produtos para Aves</h2>

            <div class="produtos-grid">

                <div class="produto">

                    <div class="produto-img">🐦</div>

                    <h3>
                        <?php echo $dados['titulo']; ?> para aves
                    </h3>

                    <p>
                        Opções adequadas para aves.
                    </p>

                    <button><a href="parte_aves/petiscoAve.php"> Ver produtos </a></button>

                </div>

            </div>

        </div>



        <!-- PEIXES -->

        <div class="grupo-produtos" id="peixes">

            <h2>🐠 Produtos para Peixes</h2>

            <div class="produtos-grid">

                <div class="produto">

                    <div class="produto-img">🐠</div>

                    <h3>
                        <?php echo $dados['titulo']; ?> para peixes
                    </h3>

                    <p>
                        Produtos para cuidados com peixes.
                    </p>

                    <button><a href="parte_peixes/petiscoPeixe.php"> Ver produtos </a></button>

                </div>

            </div>

        </div>



        <!-- PEQUENOS PETS -->

        <div class="grupo-produtos" id="pequenos-pets">

            <h2>🐹 Produtos para Pequenos Pets</h2>

            <div class="produtos-grid">

                <div class="produto">

                    <div class="produto-img">🐹</div>

                    <h3>
                        <?php echo $dados['titulo']; ?> para pequenos pets
                    </h3>

                    <p>
                        Produtos para pequenos animais.
                    </p>

                    <button><a href="parte_pequenosPets/petiscoPequenosPets.php"> Ver produtos </a></button>

                </div>

            </div>

        </div>


    </section>


    <!-- VOLTAR -->

    <a href="../sobre_nos/sobre_nos.html" class="botao-voltar-categoria">

        <i class="fa-solid fa-arrow-left"></i>

        Sobre Nos

    </a>



</main>

<!-- ==================================================
     FOOTER
================================================== -->

<footer class="footer">

    <div class="footer-container">

        <!-- ESCOLA -->
        <div class="footer-section footer-escola">

            <h3>
                Escola Estadual Maria Luiza Miranda Bastos
            </h3>

            <p>
                Educação, conhecimento e desenvolvimento
                para nossos alunos.
            </p>

        </div>


        <!-- CONTATO -->
        <div class="footer-section footer-contato">

            <h3>Contato</h3>

            <p>
                <i class="fa-solid fa-phone"></i>
                <span>(31) 3443-7477</span>
            </p>

            <p>
                <i class="fa-solid fa-envelope"></i>
                <span>escola.2500@educacao.mg.gov.br</span>
            </p>

            <p>
                <i class="fa-solid fa-location-dot"></i>
                <span>Rua São José do Jacuri, 60 - Planalto</span>
            </p>

            <p>
                <i class="fa-solid fa-city"></i>
                <span>Belo Horizonte - MG</span>
            </p>

        </div>


        <!-- REDES SOCIAIS -->
        <div class="footer-section footer-redes">

            <h3>Redes Sociais</h3>

            <div class="social-icons">

                <a
                        href="#"
                        aria-label="Instagram"
                >
                    <i class="fa-brands fa-instagram"></i>
                </a>

                <a
                        href="https://www.facebook.com/pages/Escola-Estadual-Maria-Luiza-Miranda-Bastos/196619360362700"
                        target="_blank"
                        rel="noopener noreferrer"
                        aria-label="Facebook"
                >
                    <i class="fa-brands fa-facebook-f"></i>
                </a>

            </div>

            <p class="redes-texto">
                Acompanhe as novidades da escola.
            </p>

        </div>

    </div>


    <!-- RODAPÉ INFERIOR -->
    <div class="footer-bottom">

        <p>
            &copy;
            <?php echo date('Y'); ?>
            Escola Estadual Maria Luiza Miranda Bastos -
            Todos os direitos reservados.
        </p>

    </div>

</footer>

</body>

</html>