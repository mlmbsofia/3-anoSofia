<?php

$name = $email = $gender = $CPF = $phone = "";
$nameErr = $emailErr = $genderErr = $CPFErr = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (empty($_POST["name"])) {
        $nameErr = "O nome é obrigatório.";
    } else {
        $name = test_input($_POST["name"]);

        if (!preg_match("/^[a-zA-ZÀ-ÿ ]*$/", $name)) {
            $nameErr = "Permitido apenas letras e espaços.";
        }
    }

    if (empty($_POST["email"])) {
        $emailErr = "O e-mail é obrigatório.";
    } else {
        $email = test_input($_POST["email"]);

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de e-mail inválido.";
        }
    }

    if (!empty($_POST["phone"])) {
        $phone = test_input($_POST["phone"]);
    }

    if (!empty($_POST["cpf"])) {
        $CPF = test_input($_POST["cpf"]);

        if (!preg_match("/^\d{3}\.\d{3}\.\d{3}-\d{2}$|^\d{11}$/", $CPF)) {
            $CPFErr = "CPF inválido.";
        }
    }

    if (empty($_POST["gender"])) {
        $genderErr = "Selecione um gênero.";
    } else {
        $gender = test_input($_POST["gender"]);
    }
}

function test_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cadastro</title>

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
            font-family:Arial, Helvetica, sans-serif;
        }

        body{
            height:100vh;
            display:flex;
            justify-content:center;
            align-items:center;
            background:linear-gradient(135deg,#4facfe,#00f2fe);
        }

        .container{
            width:420px;
            background:rgba(255,255,255,.95);
            padding:35px;
            border-radius:20px;
            box-shadow:0 10px 30px rgba(0,0,0,.25);
        }

        h2{
            text-align:center;
            margin-bottom:25px;
            color:#333;
        }

        label{
            display:block;
            margin-bottom:6px;
            margin-top:15px;
            color:#444;
            font-weight:bold;
        }

        input[type=text]{
            width:100%;
            padding:12px;
            border:1px solid #ccc;
            border-radius:10px;
            font-size:15px;
            transition:.3s;
        }

        input[type=text]:focus{
            border-color:#4facfe;
            outline:none;
            box-shadow:0 0 10px rgba(79,172,254,.3);
        }

        .genero{
            margin-top:10px;
        }

        .genero label{
            display:inline;
            font-weight:normal;
            margin-right:15px;
        }

        .error{
            color:#e63946;
            font-size:13px;
        }

        input[type=submit]{
            width:100%;
            margin-top:25px;
            padding:13px;
            background:#4facfe;
            color:white;
            border:none;
            border-radius:10px;
            cursor:pointer;
            font-size:17px;
            transition:.3s;
        }

        input[type=submit]:hover{
            background:#008cff;
        }

    </style>

</head>

<body>

<div class="container">

    <h2>Cadastro</h2>

    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">

        <label>Nome</label>
        <input type="text" name="name" value="<?php echo $name; ?>">
        <span class="error"><?php echo $nameErr; ?></span>

        <label>E-mail</label>
        <input type="text" name="email" value="<?php echo $email; ?>">
        <span class="error"><?php echo $emailErr; ?></span>

        <label>Telefone</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>">

        <label>CPF</label>
        <input type="text" name="cpf" value="<?php echo $CPF; ?>">
        <span class="error"><?php echo $CPFErr; ?></span>

        <label>Gênero</label>

        <div class="genero">
            <input type="radio" name="gender" value="female"
                    <?php if($gender=="female") echo "checked"; ?>> Feminino

            <input type="radio" name="gender" value="male"
                    <?php if($gender=="male") echo "checked"; ?>> Masculino

            <input type="radio" name="gender" value="other"
                    <?php if($gender=="other") echo "checked"; ?>> Outro
        </div>

        <span class="error"><?php echo $genderErr; ?></span>

        <input type="submit" value="Cadastrar">

    </form>

</div>

</body>
</html>