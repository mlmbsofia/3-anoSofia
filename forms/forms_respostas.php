<?php
@$nome = $_REQUEST["nome"];
@$email = $_REQUEST["email"];
@$telefone = $_REQUEST["telefone"];
@$CPF = $_REQUEST["cpf"];
@$genero = $_REQUEST["genero"];

@$valNome = "/^[a-zA-Z]([a-zA-Z]+?)";
@$valEmail = "";
@$valTelefone = "";
@$valCPF = "";
@$valGenero = "";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<h1>Você apertou!</h1>
<?php
echo $nome . "<br>";
echo $email . "<br>";
echo $telefone . "<br>";
echo $CPF . "<br>";
echo $genero . "<br>";

?>
</body>
</html>