<?php

//echo "<pre>";
//echo "Meu array <br>";
//$meuArray = array("Volvo", 15,["apples", "bananas"]);
//var_dump($meuArray);
//echo "<br>";
//
//echo "Meu segundo array <br>";
//$meuSegundoArray = array("Volvo", 15,["apples", "bananas"]);
//var_dump($meuSegundoArray);
//echo "<br>";
//
//$names = [
//    "Jhon",
//    "Mary",
//    "Jack",
//    "Beth"
//];
//var_dump($names);
//
//echo "<br>";
//$cities = [];
//$cities[0] = "Londres";
//$cities[1] = "Australia";
//$cities[2] = "America";
//var_dump($cities);
//echo "<br>";
//
//$cars = [];
//$cars[0] = "London";
//$cars[1] = "Brazil";
//$cars[2] = "Paris";
//var_dump($cars);
//echo "<br>";
//
//$myCar = [];
//$myCar["Brand"] = "Volkswagen";
//$myCar["Model"] = "Variant";
//$myCar["Year"] = 2012;
//var_dump($myCar);
//echo "<br>";
//
////
//// arrays indexados
////
//
//echo "Arrays Indexados: <br>";
//$cars = array ("Volvo", "BMW", "Toyota");
//echo "<br>";
//var_dump($cars);
//echo "<br><br>";
//
//echo "Acessando o item do array: <br>";
//echo "Posição [0] =" . $cars[0] . "<br>";
//echo "<br><br>";
//
//echo "Mudando o valor do array: <br>";
//$animals = array("dog", "cat", "horse", "Monkey");
//var_dump($animals);
//$animals [1] = "bat";
//var_dump($animals);
//
//echo "Percorrendo o array com loop: <br>";
//foreach ($animals as $animal) {
//    echo $animal . "<br>";
//}
//
//echo "Cobtando os itens do array";
//echo count($animals);
//echo "<br><br>";
//
////
////arrays associativas
////
//
//echo "Array Associativo: <br>";
//$car = array ("Marca"=>"Ford","modelo"=>"Mustang", "ano"=>2012);
//var_dump($car);
//
//echo "Acessando o item de um array associativo: <br>";
//echo $car ["marca"];
//echo "<br>";
//echo "<br><br>";
//
//echo "Trocando item do array: <br>";
//$car ["ano"] = 2024;
//var_dump($car);
//echo "<br><br>";
//
//echo "Percorrendo o array com loop: <br>";
//foreach ($car as $X => $Y) {
//    echo "$X = $Y<br>";
//}
//
////
////  [] - ADICIONA UM ÚNICO ITEM NO FINAL DE UM ARRAY
////
//echo "<br><br>";
//echo "[] - ADICIONA UM ÚNICO ITEM NO FINAL DE UM ARRAY <br>";
//$fruits = array("Maçã", "Banana", "Morango");
//var_dump($fruits);
//echo "<br><br>";
//$fruits[] = "Laranja";
//var_dump($fruits);
//echo "<br><br>";
//
//$fruits = array("Maçã", "Banana", "Morango");
//var_dump($fruits);
//echo "<br><br>";
//$fruits[] = "Laranja";
//$fruits[] = "Pera";
//var_dump($fruits);
//echo "<br><br>";
//
//echo "[] - ADICIONA UM ÚNICO ITEM NO FINAL DE UM ARRAY ASSOCIATIVA <br>";
//echo "<br><br>";
//$cars = array("brand" => "Ford", "model" => "Mustang");
//$cars["color"] = "Red";
//var_dump($cars);
//
////  ARRAY_PUSH() - ADICIONA UM OU MAIS ITENS AO FINAL DE UM ARRAY
//
//echo"ARRAY_PUSH() - ADICIONA UM OU MAIS ITENS AO FINAL DE UM ARRAY<br>";
//$fruits = array("Maçã", "Banana", "Morango");
//var_dump($fruits);
//echo "<br><br>";
//array_push($fruits, "Laranja", "Kiwi", "Limão");
//var_dump($fruits);
//echo "<br><br>";
//
//echo"ARRAY_PUSH() - ADICIONA UM OU MAIS ITENS AO FINAL DE UM ARRAY ASSOCIATIVA<br>";
//$cars = array("brand" => "Ford", "model" => "Mustang");
//var_dump($cars);
//echo "<br><br>";
//$cars += ["color" => "red", "year" => 1964];
//var_dump($cars);
//echo "<br><br>";
//
////  ARRAY_UNSHIFT() - ADICIONA UM OU MAIS ITENS NO INÍCIO DE UM ARRAY
//
//echo "ARRAY_UNSHIFT() - ADICIONA UM OU MAIS ITENS NO INÍCIO DE UM ARRAY<br>";
//$fruits = array("Maçã", "Banana", "Morango");
//var_dump($fruits);
//echo "<br><br>";
//array_unshift($fruits, "Laranja", "Kiwi", "Limão");
//var_dump($fruits);
//echo "<br><br>";
//
////  ARRAY_SPLICE() - REMOVE UMA PORÇÃO DO ARRAY E SUBSTITUI COM NOVOS ELEMENTOS
//
//echo "ARRAY_SPLICE() - REMOVE UMA PORÇÃO DO ARRAY E SUBSTITUI COM NOVOS ELEMENTOS<br>";
//$fruits = array("Maçã", "Banana", "Morango");
//var_dump($fruits);
//echo "<br><br>";
//$new_fruit = "Laranja";
//array_splice($fruits, 1, 0, $new_fruit); // insere "Laranja" no index 1
//var_dump($fruits);
//echo "<br><br>";
//
////  ARRAY_MERGE() - MESCLA DUAS OU MAIS ARRAYS
//
//echo "ARRAY_MERGE() - MESCLA DUAS OU MAIS ARRAYS<br>";
//$fruits1 = array("Maçã", "Banana");
//$fruits2 = array("Morango", "Laranja");
//var_dump($fruits1);
//echo "<br><br>";
//var_dump($fruits2);
//echo "<br><br>";
//$result = array_merge($fruits1, $fruits2);
//var_dump($result);
//echo "<pre>";

echo "Atividade 1";
echo "<pre>";


// 1 - Qual a sintáxe correta para criar um array
echo "Qual a sintáxe correta para criar um array <br>";
$fruits = array("Apple", "Banana", "Orange");
print_r($fruits);
echo "<pre>";

// 2- NA seguinte matriz:
//$fruits = array ("Apple","Banana", "Orange");
//Qual seria a sintax correta para alterar o segundo valor 'Banana' para 'Pineapple'
echo"Qual seria a sintax correta para alterar o segundo valor 'Banana' para 'Pineapple'";
$fruits = array("Apple", "Banana", "Orange");
print_r($fruits);
$fruits [1] = "Pineapple";
print_r($fruits);
echo "<pre>";

// 3 - Exiba o segundo item da matiz $fruits
echo "Exiba o segundo item da matiz $fruits";
echo "Posição 2" . $fruits[1] . "<br>";
echo "<pre>";


echo "Atividade 2";
echo "<pre>";

// 1- $fruits = array ('Tamarindo', 'Pitaia', 'Siriguela')
//Qual a sintax correta para mudar o segundo valor para abacaxi?
echo "Qual a sintax correta para mudar o segundo valor para abacaxi?";
$fruits = array("Tamarindo", "Pitaia", "Siriguela");
print_r($fruits);
$fruits [1] = "Abacaxi";
print_r($fruits);
echo "<pre>";

// 2 - Como imprimir o terciero item do array $fruits
echo "Como imprimir o terciero item do array $fruits";
echo "posição 3" . $fruits[2] . "<br>";
echo "<pre>";

// 3 - Crie um array associativo para estado/capital/data de fundação da capital?
echo "Crie um array associativo para estado/capital/data de fundação da capital?";
$location = array ("estado" => "Pará", "capital" => "Belém", "fundação" => 2020);
print_r($location);
echo "<pre>";

// 4- Dada a array associativa abaixo. Como imprimir a idade de Ben?
//  $age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Dada a array associativa abaixo. Como imprimir a idade de Ben?";
$age = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");
echo "Idade de Ben: " . $age[1] . "<br>";

// 5- Preencha os espaços em branco para imprimir a chave e o valor.
// ________($idade ___ $x ___ $y){
// echo "Chave=" . ____ . ", Valor=" . ____;
//  }
echo "Preencha os espaços em branco para imprimir a chave e o valor.";
$aluno = array ("idade" => 18, "nome" => "Sol", "ano" => 2008);
echo $aluno["idade"] . "<br>";
echo "<pre>";

foreach ($aluno as $x => $y) {
    echo "$x: $y <br>";
}

//
//  ARRAY SPLICE()
//
//  Remove uma porção do array começando de uma posição inicial e um comprimento
echo "Remove uma porção do array começando de uma posição inicial e um comprimento<br>";
$cars = array("Chevrolet", "Fiat", "Volkswagen", "Ford");
array_splice($cars, 1, 1);
var_dump($cars);
echo "<br>";
$cars += ["cor" => "Preto", "ano" => 1964];
echo "<br><br>";

echo "Remove múltiplos itens do array começando de uma posição inicial e um comprimento<br>";
$cars = array("Chevrolet", "Fiat", "Volkswagen", "Ford");
array_splice($cars, 1, 3);
var_dump($cars);
echo "<br><br>";


//  UNSET()

//  Remove o elemento associado a uma chave específica
echo "Remove o elemento associado a uma chave específica<br>";
$cars = array("Chevrolet", "Fiat", "Volkswagen", "Ford");
unset($cars[0], $cars[2]);
var_dump($cars);
echo "<br><br>";

echo "Remove múltiplos elementos associados a uma chave específica<br>";
$cars = array("Chevrolet", "Fiat", "Volkswagen", "Ford");
unset($cars[0], $cars[2]);
var_dump($cars);
echo "<br><br>";

echo "Remove itens de um array associativo<br>";
$cars = array("marca" => "Chevrolet", "modelo" => "Celta", "ano" => 2001);
unset($cars["modelo"]);
var_dump($cars);
echo "<br>";

//  ARRAY_UNSHIFT() - ADICIONA UM OU MAIS ITENS NO INÍCIO DE UM ARRAY
echo "ARRAY_UNSHIFT() - ADICIONA UM OU MAIS ITENS NO INÍCIO DE UM ARRAY<br>";
$fruits = array("Maçã", "Banana", "Morango");
var_dump($fruits);
echo "<br>";
array_unshift($fruits, "Laranja", "Kiwi", "Limão");
var_dump($fruits);
echo "<br>";


//
//  ARRAY_SPLICE() - REMOVE UMA PORÇÃO DO ARRAY E SUBSTITUI COM NOVOS ELEMENTOS
//
echo "ARRAY_SPLICE() - REMOVE UMA PORÇÃO DO ARRAY E SUBSTITUI COM NOVOS ELEMENTOS<br>";
$fruits = array("Maçã", "Banana", "Morango", "Pera", "Abacaxi");
var_dump($fruits);
echo "<br>";
$new_fruit = array("Laranja", "Kiwi", "Maracujá");
array_splice($fruits, 4, 0, $new_fruit); // insere "Laranja" no index 1
var_dump($fruits);
echo "<br>";

//
//  ARRAY_MERGE() - MESCLA DUAS OU MAIS ARRAYS
//
echo "ARRAY_MERGE() - MESCLA DUAS OU MAIS ARRAYS<br>";
$fruits1 = array("Maçã", "Banana");
$fruits2 = array("Morango", "Laranja");
$fruits3 = array("Pera", "Abacaxi");
var_dump($fruits1);
echo "<br>";
var_dump($fruits2);
echo "<br>";
var_dump($fruits3);
echo "<br>";
$result = array_merge($fruits1, $fruits2, $fruits3);
echo "<pre>";
var_dump($result);
echo "</pre>";
echo "<br><br>";

//
//  ARRAY_DIFF()
//
//  Remove itens de um array associativo. Retorna um novo array
echo "Remove itens de um array associativo. Retorna um novo array.<br>";
$carros = array("marca" => "Chevrolet", "modelo" => "Celta", "ano" => 2001);
$novoArray = array_diff($carros, ["Celta", 2001]);
var_dump($novoArray);
echo "<br><br>";


//  ARRAY_POP()
//  Remove o último item do array
echo "Remove o último item do array<br>";
$cars = array("Chevrolet", "Fiat", "Volkswagen", "Ford");
array_pop($cars);
var_dump($cars);
echo "<br><br>";

//  ARRAY_SHIFT()
//  Remove o primeiro item do array
echo "Remove o último item do array<br>";
$cars = array("Chevrolet", "Fiat", "Volkswagen", "Ford");
array_shift($cars);
var_dump($cars);
echo "<br><br>";

//  Ordenando arrays
//  sort()
//  Ordem ascendente
echo "Ordenando em ordem ascendente<br>";
$cars = array("Chevrolet", "Fiat", "Volkswagen", "Ford");
sort($cars);
var_dump($cars);
echo "<br><br>";

//  rsort()
//  Ordem desscendente
echo "Ordenando em ordem descendente<br>";
$cars = array("Chevrolet", "Fiat", "Volkswagen", "Ford");
rsort($cars);
var_dump($cars);
echo "<br><br>";