<?php

?>

<!--<DOCTYPE html>-->
<!--    <html>-->
<!---->
<!--    <head>-->
<!--        <title>Converter</title>-->
<!--    </head>-->
<!---->
<!--    <body>-->
<!--    <form action="convertido.php" method="post">-->
<!---->
<!--        <label>Nome:</label><br>-->
<!--        <input type="text" name="nome" required><br><br>-->
<!---->
<!--        <label for=""></label>-->
<!--        <input type="text" id="temp" name=""><br>-->
<!--        <label for=""></label>-->
<!--        <input type="text">-->
<!--        <label for=""></label>-->
<!--        <input type="text">-->
<!--        <input type="submit" value="Enviar">-->
<!--    </form>-->
<!--    </body>-->
<!---->
<!--    </html>-->
<!--</DOCTYPE>-->


<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Converter</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
            width: 350px;
        }

        h2 {
            text-align: center;
            color: #333;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            margin-top: 20px;
            padding: 12px;
            background: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background: #0056b3;
        }
    </style>
</head>

<body>
<div class="container">
    <h2>Formulário de Conversão</h2>

    <form action="convertido.php" method="post">

        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="temp">Temperatura:</label>
        <input type="text" id="temp" name="temp">

        <label for="valor1">Unidade de temperatura 1:</label>
        <input type="text" id="unidade_1" name="unidade_1">

        <label for="valor2">Unidade de temperatura 2:</label>
        <input type="text" id="unidade_2" name="unidade_2">

        <input type="submit" value="Enviar">
    </form>
</div>
</body>
</html>





