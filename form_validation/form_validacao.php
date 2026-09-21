<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <title>Validação de formulários</title>
</head>

<body>

<h3>Regras de validação para o formulário abaixo</h3>
<dl>
    <dt>Nome:
        <dd>Obrigadório</dd>
        <dd>Deve conter somente letras e espaços em brando</dd>
    </dt>
    <dt>E-mail:
        <dd>Obrigatório</dd>
        <dd>Deve conter uma e-mail válido (com @ e ponto)</dd>
    </dt>
    <dt>Website:
        <dd>Opcional</dd>
        <dd>Se presente, deve conter uma URL válida</dd>
    </dt>
    <dt>Cometário:
        <dd>Opcional</dd>
        <dd>Campo de entrada multi linhas.</dd>
    </dt>
    <dt>Gênero:
        <dd>Obrigatório.</dd>
        <dd>Deve selecionar uma opção.</dd>
    </dt>
</dl>

<?php
// Variáveis para mensagem de erro e dados do formulário
$name = $email = $gender = $comment = $website = "";
$nameError = $emailError = $genderError = $websiteError = "";

// Condicional para avaliar se os campos estão preenchidos.
// Se não tiverem, imprime na tela uma mensagem de erro.
// Se tiver preenchido, continua a verificação.
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"])) {
        $nameError = "O nome é obrigatório.";
        //se nao estiver vazio, verificar outros detalhes com a função verificar_entrada
    }else{
        $name = verificar_entrada($_POST["name"]);
    }
    if (empty($_POST["email"])) {
        $emailError = "O e-mail é obrigatório.";
    }else{
        $email = verificar_entrada($_POST["email"]);
    }
    if (empty($_POST["website"])){
        $website = "";
    }else{
        $website = verificar_entrada($_POST["website"]);
    }
    if (empty($_POST["comment"])){
        $comment = "";
    }else{
        $comment = verificar_entrada($_POST["comment"]);
    }
    if (empty($_POST["gender"])){
        $genderError = "O gênero é obrigatório.";
    }else{
        $gender = verificar_entrada($_POST["gender"]);
    }
}

// Retira espaços em branco, contra barras e caracteres especiais
function verificar_entrada($entrada)
{
    $entrada = trim($entrada);
    $entrada = stripslashes($entrada);
    $entrada = htmlspecialchars($entrada);
    $entrada = strtoupper($entrada);
    return $entrada;
}
?>

<h3>Formulário a ser verificado</h3>
<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
<!--    ($_SERVER["PHP_SELF"])Super global que retorna o nome do arquivo do script que está sendo executado no momento. Envia o formulário submetido para a mesma página ao invés de pular para uma página diferente.-->
<!--    O htmlspecialchars()função converte caracteres especiais em entidades HTML. Isso significa que ele irá substituir caracteres HTML como < e > com &lt;e &gt;. Isso impede que os invasores explorem o código injetando código HTML ou Javascript (Ataques de script cruzados) em formulários.-->
    <br>
    Name: <input type="text" name="name">
    <span style = "color: red">* <?php echo $nameError;?></span><br>
    E-mail: <input type="text" name="email">
    <span style = "color: red">* <?php echo $emailError;?></span><br>
    Website: <input type="text" name="website"><br>
    Comment: <textarea name="comment" rows="5" cols="40"></textarea><br>
    Gender:
    <input type="radio" name="gender" value="female">Feminino
    <input type="radio" name="gender" value="male">Masculino
    <input type="radio" name="gender" value="other">Outro
    <span style = "color: red">* <?php echo $genderError;?></span><br>

    <input type="submit" name="submit" value="Enviar">
</form>
<br><br>
<?php
echo "Dados digitados: <br>";
echo $name . "<br>";
echo $email . "<br>";
echo $website . "<br>";
echo $comment . "<br>";
echo $gender . "<br>";

?>
</body>

</html>
