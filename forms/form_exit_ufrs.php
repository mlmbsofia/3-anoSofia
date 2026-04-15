<?php


try{
    $con = new mysqli("localhost", "root", "", "escola");
    $con->set_charset("utf8mb4");

    $sql = "INSERT INTO usuarios (nome, senha, email,tipo,telefone) VALUES ('$nome', '$password', '$email', '$type', '$telefone')";
}