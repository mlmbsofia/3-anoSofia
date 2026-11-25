<?php

$produtos = [

    [
        'nome' => 'Mix de Sementes para Aves',
        'descricao' => 'Mistura de sementes selecionadas para complementar a alimentação da sua ave.',
        'preco' => 'R$ 18,90',
        'imagem' => 'img/produtos/mix-sementes-aves.jpg'
    ],

    [
        'nome' => 'Petisco Natural para Aves',
        'descricao' => 'Petisco natural e saboroso para deixar os momentos da sua ave ainda mais especiais.',
        'preco' => 'R$ 15,90',
        'imagem' => 'img/produtos/petisco-natural-aves.jpg'
    ],

    [
        'nome' => 'Frutas Desidratadas',
        'descricao' => 'Frutas desidratadas selecionadas para oferecer uma opção saborosa à sua ave.',
        'preco' => 'R$ 21,90',
        'imagem' => 'img/produtos/frutas-aves.jpg'
    ]

];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Petiscos para Aves</title>

    <link rel="stylesheet"
          href="petiscoAve.css">

</head>


<body>

<main class="pagina-produtos">


    <!-- CABEÇALHO -->

    <header>

        <a href="../php-produtos.php">
            ←
        </a>

        <h1>🌻 Petiscos para Aves</h1>

    </header>


    <!-- DESCRIÇÃO -->

    <p class="descricao-pagina">

        Encontre opções saborosas para complementar
        os momentos especiais da sua ave.

    </p>


    <!-- PRODUTOS -->

    <section class="produtos-grid">


        <?php foreach ($produtos as $produto): ?>

            <article class="card">


                <div class="imagem">

                    <img src="../img_produto/ave-comida.jpg"
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