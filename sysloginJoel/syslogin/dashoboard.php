<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="robots" content="index, nofollow, noarchive">

    <title>Página Inicial</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background-color: #008080;
        }
        .principal{
            width: 800px;
            height: 1500px;
            border: 5px solid #FFFFFF;
            margin-left: 30%;
        }
    .interna{
        width: 800px;
        background-color: #2f4f4f;
        margin: 0;
        color: white;
        padding: 15px;
    }
    h2{
        color: white;
        margin-left: 20px;
        padding: 20px;
    }
    h3{
        text-align: center;
        line-height: 40px;
        font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
    }
    h4{
        text-align: center;
        color: #FFFFFF;
        padding: 5px;
    }
    </style>
</head>

<body>

<?php

include "arquivo_de_login/verificar_login.php";
?>
<h2>Olá, <?php echo $_SESSION['usuario']; ?> <a href="arquivo_de_login/logout.php">Encerrar sessão</a></h2>
<hr>
<div class="principal">
    <div class="interna">
        <h3>DASHBOARD DO USUÁRIO</h3>
    </div>
    <hr style="color: white;">
</div>
<div>
    <h4>&copy;Fluid Analysis Technology Ltda.</h4>

</div>

</body>

</html>
