<?php

echo " <br> Olá mundo!<br>";
 echo "hoje etsá chovendo muito <br>";

echo "<br>=======================================================<br>";

$nome = "Carlos";
$idade = 17;
$altura = 1.75;
$adress = "Rua tal tal tal, 222 <br>";

echo " <br>Nome:$nome, Idade:$idade, Altura: $altura, Endereço: $adress";

$mensagem = "Olá!";
if (print $mensagem) {
    echo " - Mensagem exibida com sucesso! <br>";
}

$valorTotal = 22.90;
$_usuario = "Carlos";
$quantidade = 12;

echo "<br>=======================================================<br>";

define("PI", 3.14);
define("C",299792);

echo "O valor de PI é: ", PI, " e o valor da velocidade da luz é: ", C,"m/s";

echo "<br>=======================================================<br>";

echo " - Exercicios <br>";

$idade = 18;

if ($idade ==18 ) {
    echo " <br> Você já é de maior, parabéns! Você já pode tirar sua habilitação <br>";
}
else {
    echo "Você ainda é muito novinho, tchau! <br>";

}

echo "<br>=======================================================<br>";

for ($i=0;$i<=100;$i=$i+5) {
    echo "<br>Número$i ";
}

echo "<br>Regressivo<br>";

for ($i=100;$i>=0;$i=$i-3) {
    echo "<br>Número$i ";
}

echo "<br>=======================================================<br>";

?>


