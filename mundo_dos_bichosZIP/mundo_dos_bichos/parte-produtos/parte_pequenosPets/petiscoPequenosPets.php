<?php

$produtos = [

    [
        'nome' => 'Mix de Sementes',
        'descricao' => 'Mistura de sementes selecionadas para complementar a alimentação do seu pequeno pet.',
        'preco' => 'R$ 17,90',
        'imagem' => 'img/produtos/mix-sementes-pequenos.jpg'
    ],

    [
        'nome' => 'Petisco Natural',
        'descricao' => 'Petisco natural e saboroso para deixar os momentos do seu pequeno companheiro ainda mais especiais.',
        'preco' => 'R$ 14,90',
        'imagem' => 'img/produtos/petisco-natural-pequenos.jpg'
    ],

    [
        'nome' => 'Biscoito para Pequenos Pets',
        'descricao' => 'Biscoitos especiais para complementar a alimentação de pequenos animais.',
        'preco' => 'R$ 19,90',
        'imagem' => 'img/produtos/biscoito-pequenos.jpg'
    ]

];

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Petiscos para Pequenos Pets</title>

    <link rel="stylesheet"
          href="petiscoPequenosPets.css">

</head>


<body>

<main class="pagina-produtos">


    <header>

        <a href="../php-produtos.php">
            ←
        </a>

        <h1>
            🥕 Petiscos para Pequenos Pets
        </h1>

    </header>


    <p class="descricao-pagina">

        Encontre petiscos saborosos e opções especiais
        para os seus pequenos companheiros.

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