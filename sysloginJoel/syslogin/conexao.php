<?php
$conn = mysqli_connect("localhost", "root", "", "syslogin");

if ($conn->connect_error) {
    echo "Erro de conexão com o banco de dados;";
}
?>