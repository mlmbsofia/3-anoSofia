<?php

$produtos = [

    [
        'nome' => 'Petisco Crocante para Gatos',
        'descricao' => 'Petiscos crocantes e saborosos para momentos especiais.',
        'preco' => 'R$ 14,90',
        'imagem' => 'img/produtos/petisco-gato.jpg'
    ],

    [
        'nome' => 'Snack Natural para Gatos',
        'descricao' => 'Snack saboroso para complementar os momentos de diversão.',
        'preco' => 'R$ 19,90',
        'imagem' => 'img/produtos/snack-gato.jpg'
    ],

    [
        'nome' => 'Petisco Mastigável para Gatos',
        'descricao' => 'Petisco saboroso para momentos de entretenimento.',
        'preco' => 'R$ 22,90',
        'imagem' => 'img/produtos/petisco-mastigavel-gato.jpg'
    ]

];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Petiscos para Gatos</title>

    <link rel="stylesheet"
          href="petiscoGato.css">

</head>


<body>

<main class="pagina-produtos">


    <header>

        <a href="../php-produtos.php">
            ←
        </a>

        <h1>🐟 Petiscos para Gatos</h1>

    </header>


    <p class="descricao-pagina">

        Encontre petiscos deliciosos para o seu melhor amigo.

    </p>


    <section class="produtos-grid">


        <?php foreach ($produtos as $produto): ?>

            <article class="card">


                <div class="imagem">

                    <img src="../img_produto/biscoito-de-gato.jpg"
                         alt="<?php echo $produto['nome']; ?>">

                </div>


                <div class="informacoes">

                    <span>
                        PETISCOS
                    </span>

                    <h2>
                        <?php echo $produto['nome']; ?>
                    </h2>

                    <p>
                        <?php echo $produto['descricao']; ?>
                    </p>

                    <strong>
                        <?php echo $produto['preco']; ?>
                    </strong>


                    <div class="botoes">

                        <a href="../ver-detalhes-produto.php">
                            Ver detalhes
                        </a>

                        <a href="../../pagina_inicial/carrinho.php">
                            🛒 Adicionar
                        </a>

                    </div>

                </div>

            </article>

        <?php endforeach; ?>


    </section>


</main>

</body>

</html>