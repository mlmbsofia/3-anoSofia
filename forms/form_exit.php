<?php

@$nome = $_REQUEST["nome"];
@$password = $_REQUEST["password"];
@$email = $_REQUEST["email"];
@$type = $_REQUEST["kind"];
@$telefone = $_REQUEST["cellPhone"];

$conn = mysqli_connect("localhost", "root", "", "teste");

if ($conn ->connect_error){
    die("Falha na conexão: " . $conn->connect_error);
}else{
    echo "Tudo ok";
}

$sql = "INSERT INTO cadastrousuario (nome, email, telefone, tipo, senha) VALUES ($nome, $email, $telefone, $type, $password)";

if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
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