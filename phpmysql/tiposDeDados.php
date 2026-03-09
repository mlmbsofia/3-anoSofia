<?php
    //INTEIROS
    $ano = 2020;
    echo $ano;
    echo "<br>";


    // PONTO FLUTUANTE
    $PI = 3.14;
    echo "Valor de PI : $PI";
    echo "<br>";

    $nome = "Sol Garcia";
    $cpf = '1234567890';
    echo 'NOME :'.$nome. '<br>'.'CPF: ' .$cpf;

    $idade = 18;
    if($idade == true){
        echo "<br> Idade: ".$idade;
    }

    //ARRAYS

    $nome = ["Joel","Nicole","Sol","Maria"];
    foreach($nome as $nomes){
        echo "<br>".$nomes;
    }
?>
