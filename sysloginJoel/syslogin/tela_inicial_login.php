<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">

    <title>Login</title>

    <style>
        body{
            background-color: #008080;
        }
        .login{
            width: 300px;
            height: 200px;
            margin: 5% 0 0 38%;
        }
        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 20px;
            box-sizing: border-box;
        }
        input:focus{
            outline: none;
            border: 2px solid blue;
        }
        h3{
            text-align: center;
            color: #FFFFFF;
        }
        a{
            font-size: 20px;
            text-decoration: none;
            color: #FFFFFF;
        }
        a:hover{
            color: #f8b052;
        }
        .erro{
            color: #FFFFFF;
            width: 100%;
            height: auto;
            padding: 10px 0;
            background-color: red;
        }
        .botao:hover{
            background-color: #005050;
            color: #f8b052;
            cursor: pointer;
        }
    </style>
</head>

<body>

<h3>Login</h3>
<hr>

<?php
if(isset($_SESSION['nao_autenticado'])):

?>
<div class="erro">
    <h3>Senha inválida.</h3>
</div>

<?php
endif;
unset($_SESSION['nao_autenticado']);
?>

<div class="login">
    <form class="row g-3" action="login.php" method="post">
        <div class="col-12">
            <label for="nome" class="form-label">Usuário</label>
            <input type="text" class="form-control" id="nome" name="usuario">
        </div>

        <div class="col-12">
            <label for="password" class="form-label">Senha</label>
            <input type="password" class="form-control" id="password" name="senha">
        </div>

        <div class="col-12">
            <input type="submit" class="btn-solid theme-primary botao" value="ENTRAR">
        </div>
        <div>
            <a href="cadastro_usuario.php">Cadastre-se</a>
        </div>
        <div>
            <a href="senha_esquecida/trocar_senha.php">Esqueceu a senha?</a>
        </div>
    </form>
</div>


<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>
</html>
