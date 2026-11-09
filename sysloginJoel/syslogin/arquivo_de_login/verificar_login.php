<?php
session_start();

if(!$_SESSION['usuario']){
    header("Location: tela_inicial_login.php");
    exit();
}