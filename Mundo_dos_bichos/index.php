
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Mundo Dos Bichos</title>
        <link rel="stylesheet" href="style_inicial.css">
    </head>
    <body>

    <!-- HEADER -->
    <header>

        <div class="header-left"></div>

        <div class="logo-container">
            <img src="img/logo.png" alt="Logo Mundo Dos Bichos">
        </div>

        <div class="header-icons">

            <a href="cadastro.php" title="Cadastro">
                <i class="fa-solid fa-user"></i>
            </a>

            <a href="carrinho.php" title="Carrinho">
                <i class="fa-solid fa-cart-shopping"></i>
            </a>

        </div>

    </header>

    <!-- MENU -->
    <nav>

        <div class="nav-buttons">

            <a href="index.php">Home</a>

            <a href="../parte-produtos/secao_produtos.html">Produtos</a>

            <a href="atendimento.php">Atendimento</a>

        </div>

    </nav>

    <div class="carousel">

        <div class="slides">

            <div class="slide active">
                <div class="info">
                    <h2>🐶 Ração Premium</h2>
                    <p>Até <span>30% OFF</span> em rações para cães e gatos.</p>
                </div>
            </div>

            <div class="slide">
                <div class="info">
                    <h2>🦴 Brinquedos</h2>
                    <p>Compre 2 e leve o 3º grátis!</p>
                </div>
            </div>

            <div class="slide">
                <div class="info">
                    <h2>🛏️ Caminhas</h2>
                    <p>Conforto para seu pet com <span>25% OFF</span>.</p>
                </div>
            </div>

            <div class="slide">
                <div class="info">
                    <h2>🐱 Acessórios</h2>
                    <p>Coleiras, peitorais e guias a partir de R$29,90.</p>
                </div>
            </div>

        </div>

        <button class="prev">&#10094;</button>
        <button class="next">&#10095;</button>

    </div>

    <script src="script.js"></script>

    <section class="animais">

        <div class="card-animal">Cachorro</div>
        <div class="card-animal">Gato</div>
        <div class="card-animal">Coelho</div>
        <div class="card-animal">Hamster</div>
        <div class="card-animal">Papagaio</div>
        <div class="card-animal">Peixe</div>

    </section>

    </body>
    </html>