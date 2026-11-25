<?php

$produtos = [

    [
        'nome' => 'Cama Confortável',
        'descricao' => 'Cama macia e confortável para o descanso do seu cachorro.',
        'preco' => 'R$ 89,90',
        'imagem' => 'img/produtos/cama-cachorro.jpg'
    ],

    [
        'nome' => 'Brinquedo Interativo',
        'descricao' => 'Brinquedo para estimular a diversão e interação do seu pet.',
        'preco' => 'R$ 39,90',
        'imagem' => 'img/produtos/brinquedo-interativo.jpg'
    ],

    [
        'nome' => 'Kit Especial para Cães',
        'descricao' => 'Um conjunto especial de produtos para deixar seu pet ainda mais confortável.',
        'preco' => 'R$ 119,90',
        'imagem' => 'img/produtos/kit-especial-cachorro.jpg'
    ]

];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Linha Especial - Cachorros</title>

    <link rel="stylesheet"
          href="linha-especial-cachorro.css">

</head>


<body>

<main class="pagina-produtos">


    <header>

        <a href="../php-produtos.php">
            ←
        </a>

        <h1>⭐ Linha Especial</h1>

    </header>


    <p class="descricao-pagina">

        Produtos especiais escolhidos para proporcionar
        conforto, diversão e bem-estar ao seu cachorro.

    </p>


    <section class="produtos-grid">


        <?php foreach ($produtos as $produto): ?>

            <article class="card">


                <div class="imagem">

                    <img src="../img_produto/caminha-de-cachorro.jpg" alt="<?php echo $produto['nome']; ?>">

                </div>


                <div class="informacoes">

                <span>
                    LINHA ESPECIAL
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