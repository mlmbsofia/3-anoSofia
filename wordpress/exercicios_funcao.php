<?php

// criar uma função que recebe um número e duas unidades de temperatura.
// a primeira unidade é a atual
// a segunda unidade é para a qual se quer converter
// trabalhar em celcius(c), kelvin(k), fahrenheint(f) e réaumur (re)
// pesquisem ad fórmulas de conversao
// pensando bem:
// tres variaveis : $temp, $unidade_1, $unidade_2

    function temperatura_C ($temp, $unidade_1, $unidade_2){

        if ($unidade_1 == $unidade_2){
            echo "Essa conta não pode ser realizada! As unidades de temperatura são iguais!<br>";
        }else{
            if ($unidade_1 == "C" && $unidade_2 == "F"){
                $resultado = $temp * 9/5 + 32;
                echo "A converção de celvin para fahrenheint é:  " . $resultado . "<br>";
            }
            else if($unidade_1 == "C" && $unidade_2 == "K"){
                    $resultado = $temp + 273;
                    echo "A converção de celvin para kelvin é:  " . $resultado . "<br>";
            }
            else if($unidade_1 == "C" && $unidade_2 == "Re"){
                $resultado = $temp * 4/5;
                echo "A converção de celvin para réaumur é:  " . $resultado . "<br>";
            }
        }

    }

    temperatura_C (41, "C", "F");

    function temperatura_F ($temp, $unidade_1, $unidade_2){

        if ($unidade_1 == $unidade_2){
            echo "Essa conta não pode ser realizada! As unidades de temperatura são iguais!<br>";
        }else{
            if ($unidade_1 == "F" && $unidade_2 == "C"){
                $resultado = $temp - 32 * 5/9 ;
                echo "A converção de fahrenheint para celcius é:  " . $resultado . "<br>";
            }
            else if($unidade_1 == "F" && $unidade_2 == "K"){
                $resultado = $temp - 32 * 5/9 + 273;
                echo "A converção de fahrenheint para kelvin é:  " . $resultado . "<br>";
            }
            else if($unidade_1 == "F" && $unidade_2 == "Re"){
                $resultado = $temp - 32* 4/9;
                echo "A converção de fahrenheint para réaumur é:  " . $resultado . "<br>";
            }
        }

    }

    temperatura_F (41, "F", "C");

    function temperatura_K ($temp, $unidade_1, $unidade_2){

        if ($unidade_1 == $unidade_2){
            echo "Essa conta não pode ser realizada! As unidades de temperatura são iguais!<br>";
        }else{
            if ($unidade_1 == "K" && $unidade_2 == "C"){
                $resultado = $temp - 273 ;
                echo "A converção de Kelvin para celcius é:  " . $resultado . "<br>";
            }
            else if($unidade_1 == "K" && $unidade_2 == "F"){
                $resultado = $temp - 273 * 9/5 + 32;
                echo "A converção de Kelvin para fahrenheint é:  " . $resultado . "<br>";
            }
            else if($unidade_1 == "K" && $unidade_2 == "Re"){
                $resultado = $temp - 273 * 4/5;
                echo "A converção de Kelvin para réaumur é:  " . $resultado . "<br>";
            }
        }

    }

    temperatura_K (41, "K", "F");

    function temperatura_Re ($temp, $unidade_1, $unidade_2){

        if ($unidade_1 == $unidade_2){
            echo "Essa conta não pode ser realizada! As unidades de temperatura são iguais!<br>";
        }else{
            if ($unidade_1 == "Re" && $unidade_2 == "C"){
                $resultado = $temp * 4/5 ;
                echo "A converção de réaumur para celcius é:  " . $resultado . "<br>";
            }
            else if($unidade_1 == "Re" && $unidade_2 == "F"){
                $resultado = $temp * 9/5 + 32;
                echo "A converção de réaumur para fahrenheint é:  " . $resultado . "<br>";
            }
            else if($unidade_1 == "Re" && $unidade_2 == "K"){
                $resultado = $temp * 5/4 + 273;
                echo "A converção de réaumur para kelvin é:  " . $resultado . "<br>";
            }
        }

    }

    temperatura_Re (41, "Re", "F");





