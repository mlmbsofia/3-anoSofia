<?php

session_start();
include "conexao.php";

if (empty($_POST['usuario']) || empty($_POST['senha'])) {

//  REDIRECIONA PARA A TELA INICIAL DE LOGIN
    header("Location: tela_inicial_login.php");
    exit();
}

$usuario = htmlspecialchars($_POST['usuario']);
$senha = htmlspecialchars($_POST['senha']);

$sql_usuario = "SELECT * FROM usuario WHERE nome = '$usuario'";

$resultado_usuario = mysqli_query($conn, $sql_usuario);
$num_registro = mysqli_num_rows($resultado_usuario);
//  Se retornar algum resultado
if ($num_registro > 0) {
    $sql_senha = "SELECT senha FROM usuario WHERE nome = '$usuario'";
    $retorno_senha = mysqli_query($conn, $sql_senha);
    $usuario_senha = mysqli_fetch_assoc($retorno_senha);
    if (password_verify($senha, $usuario_senha['senha'])) {
        $_SESSION['usuario'] = $usuario;
        header("Location: dashoboard.php");
        exit();
    }else{
        $_SESSION['nao_autenticado'] = true;
        header("Location: tela_inicial_login.php");
    }
}else{
    echo "<h2>Usuário não cadastrado.</h2><br>";
    echo "<hr>";
    echo "<a href='tela_inicial_login.php'>Voltar</a>";
}