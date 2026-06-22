<?php

$nome = $_REQUEST['fullName'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];
$type = $_REQUEST['kind'];
$telefone = $_REQUEST['cellPhone'];

try {
    //  conexão com o banco de dados
    $con = new mysqli("localhost", "root", "", "escola");
    $con->set_charset("utf8mb4");

    //  INSERIR DADOS NA TABELA DO BANCO DE DADOS
    //  PRESTAR ATENÇÃO NO NOME DA TABELA
    $sql = "INSERT INTO cadastro_aluno (nome, senha, email, tipo, telefone) VALUES ('$nome','$password','$email','$type','$telefone')";
    $con->query($sql);
    echo "New record created successfully";

}catch (mysqli_sql_exception $e){
    echo "Erro ao inserir no banco de dados." . $e->getMessage();
} finally {
    $con->close();
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Exit</title>
</head>
<body>

<h3>Parabéns <?php echo $nome ?>, seu cadastro foi realizado com sucesso.</h3>

</body>
</html>
