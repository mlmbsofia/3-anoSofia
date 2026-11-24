<?php

$produtos = [

    [
        'nome' => 'Ração em Flocos',
        'descricao' => 'Alimento em flocos desenvolvido para complementar a alimentação dos peixes.',
        'preco' => 'R$ 12,90',
        'imagem' => 'img/produtos/racao-flocos-peixe.jpg'
    ],

    [
        'nome' => 'Granulado para Peixes',
        'descricao' => 'Alimento granulado para oferecer uma refeição saborosa aos seus peixes.',
        'preco' => 'R$ 16,90',
        'imagem' => 'img/produtos/granulado-peixe.jpg'
    ],

    [
        'nome' => 'Petisco Especial para Peixes',
        'descricao' => 'Opção especial para variar a alimentação e proporcionar momentos de diversão.',
        'preco' => 'R$ 19,90',
        'imagem' => 'img/produtos/petisco-especial-peixe.jpg'
    ]

];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Petiscos para Peixes</title>

    <link rel="stylesheet"
          href="petiscoPeixe.css">

</head>


<body>

<main class="pagina-produtos">


    <header>

        <a href="../php-produtos.php">
            ←
        </a>

        <h1>
            🐠 Petiscos para Peixes
        </h1>

    </header>


    <p class="descricao-pagina">

        Encontre opções de alimentação para deixar
        seus peixes ainda mais bem cuidados.

    </p>


    <section class="produtos-grid">


        <?php foreach ($produtos as $produto): ?>

            <article class="card">


                <div class="imagem">

                    <img src="<?php echo $produto['imagem']; ?>"
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
