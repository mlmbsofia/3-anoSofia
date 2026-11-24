<?php

$produtos = [

    [
        'nome' => 'Shampoo para Cães',
        'descricao' => 'Shampoo desenvolvido para a higiene e limpeza dos pelos.',
        'preco' => 'R$ 29,90',
        'imagem' => 'img/produtos/shampoo-cachorro.jpg'
    ],

    [
        'nome' => 'Escova para Pelos',
        'descricao' => 'Escova para auxiliar na higiene e cuidado dos pelos.',
        'preco' => 'R$ 24,90',
        'imagem' => 'img/produtos/escova-cachorro.jpg'
    ],

    [
        'nome' => 'Kit de Higiene',
        'descricao' => 'Kit com produtos para os cuidados diários do seu cachorro.',
        'preco' => 'R$ 44,90',
        'imagem' => 'img/produtos/kit-higiene-cachorro.jpg'
    ]

];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Cuidados para Cães</title>

    <link rel="stylesheet"
          href="cuidados-cachorro.css">

</head>


<body>

<main class="pagina-produtos">


    <header>

        <a href="../php-produtos.php">
            ←
        </a>

        <h1>🧴 Cuidados para Cães</h1>

    </header>


    <p class="descricao-pagina">

        Produtos para manter seu cachorro limpo,
        confortável e bem cuidado.

    </p>


    <section class="produtos-grid">


        <?php foreach ($produtos as $produto): ?>

            <article class="card">


                <div class="imagem">

                    <img src="../img_produto/shaoopCao.jpg" alt="<?php echo $produto['nome']; ?>">

                </div>


                <div class="informacoes">

                <span>
                    CUIDADOS
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

                        <a href="#">
                            Ver detalhes
                        </a>

                        <a href="#">
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