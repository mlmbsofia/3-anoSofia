<?php
    //if , elseif, if

//if

$idade = 18;
    if($idade >= 18){
        echo "Você é maior de idade!<br>";
    }

echo "<br>=======================================================<br>";

$diaSemana = 3;

switch($diaSemana){

    case 1:
        echo "domingo<br>";
        break;
    case 2:
        echo "segunda<br>";
        break;
    case 3:
        echo "terça<br>";
        break;
    case 4:
         echo "quarta<br>";
         break;
    case 5:
        echo "quinta<br>";
        break;
        echo "dia valido<br>";
    default:
    echo "dia inválido<br>";
}

echo "<br>=======================================================<br>";