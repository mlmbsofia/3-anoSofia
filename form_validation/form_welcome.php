<?php
?>
<!DOCTYPE html>
<html>
<head>
    <title>Form Welcome</title>
</head>
<body>

<p>No método GET a informações digitadas são mostradas na barra de URL</p>
<p>No método POST elas são suprimidas.</p>


Bem-vindo Sr. Dr. <?php echo "<b>" . $_POST["nome"] ."</b>";?><br>

Seu e-mail cadastrado foi: <?php echo "<b>" . $_POST["email"] ."</b>";?><br>

Seu número de telefone cadastrado foi: <?php echo "<b>" . $_POST["telefone"] ."</b>";?><br>

</body>
</html>
