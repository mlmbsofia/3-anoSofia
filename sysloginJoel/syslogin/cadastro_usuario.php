<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">

    <title>Cadastro de Usuário</title>

    <style>
        body{
            background-color: #008080;
        }
        .login{
            width: 400px;
            height: auto;
            margin: 5% 0 0 38%;
        }
        p{
            font-size: 30px;
            color: white;
        }
        input{
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            font-size: 20px;
            box-sizing: border-box;
        }
        input::placeholder{
            color: lightgrey;
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
            height: 30px;
            background-color: red;
        }
        .botao:hover{
            background-color: #005050;
            color: #f8b052;
            cursor: pointer;
        }
        .sucesso{
            background-color: darkgreen;
            color: white;
            padding: 10px;
        }
    </style>
</head>
<body>

<?php
include("conexao.php");



if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = htmlspecialchars($_POST["usuario"]);
    $docto = htmlspecialchars($_POST["docto"]);
    $senha = htmlspecialchars($_POST["password"]);
    $data_nascimento = htmlspecialchars($_POST["data_nasc"]);
    $data_nasc_sql = date("Y-m-d", strtotime($data_nascimento));
    $conf_senha = htmlspecialchars($_POST["conf_password"]);

    if ($senha === $conf_senha) {

        $sql = "SELECT * FROM usuario WHERE nome = '$usuario'";
        $retorno = $conn->query($sql);
        $registro = $retorno->num_rows;
        if ($registro){
            echo "<h4>Usuário já cadastrado.</h4>";
        }else{
            $hash_senha = password_hash($senha, PASSWORD_DEFAULT);
            $sql = "INSERT INTO usuario(nome, cpf, data_nascimento, senha) value ('$usuario', '$docto', '$data_nasc_sql', '$hash_senha')";
            $retorno_insert = $conn->query($sql);

            if ($retorno_insert) {
                echo "<h4 class='sucesso'>Usuário cadastrado com sucesso.</h4>";
            }else{
                echo "<h4>Usuário não cadastrado no banco de dados.</h4><br>";
            }
        }
    }else{
        echo "<h4>As senhas não coincidem.</h4>";
    }
}

?>

<h3>Cadastro de Usuário</h3>
<a href="tela_inicial_login.php">Fazer login</a>
<hr>
<div class="bloco-cadastro">
<!--    FAZ COM QUE A AÇÃO SEJA FEITA NO PRÓPRIO FORMULÁRIO-->
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" >
        <div class="row g-3 login">
            <div class="col-12">
                <label for="usuario" class="form-label">Usuário</label>
                <input type="text" class="form-control" id="usuario" name="usuario" required placeholder="Usuário:">
            </div>
            <div class="col-12">
                <label for="docto" class="form-label">CPF</label>
                <input type="text" class="form-control" id="docto" name="docto" required placeholder="CPF:">
            </div>
            <div class="col-12">
                <label for="data_nasc" class="form-label">Data de Nascimento</label>
                <input type="date" class="form-control" id="data_nasc" name="data_nasc" placeholder="Data de Nascimento:" required>
            </div>
            <div class="col-12">
                <label for="password" class="form-label">Senha</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Senha:" required>
            </div>
            <div class="col-12">
                <label for="conf_password" class="form-label">Confirme sua senha</label>
                <input type="password" class="form-control" id="conf_password" name="conf_password" placeholder="Confirme sua Senha:" required>
            </div>

            <div class="col-6">
                <input type="submit" class="btn-solid theme-primary botao" value="Cadastrar">
            </div>
            <div class="col-6">
                <input type="reset" class="btn-solid theme-danger botao" value="Limpar">
            </div>
        </div>

    </form>
    <hr>

</div>


<script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
</body>

</html>
