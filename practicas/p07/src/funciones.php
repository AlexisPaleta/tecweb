<?php

//Primera funcion, ejercicio 1:
function Multiplo(){
    if(isset($_GET['numero']) == FALSE){
        return "err";
    }
    $numero = $_GET["numero"];
    if(($numero % 5 == 0) && ($numero % 7 == 0) && ($numero != 0)){
        echo "El número $numero SI es múltiplo de 5 y 7";
    }else{
        echo "El número $numero NO es múltiplo de 5 y 7";
    }
}

//Segunda funcion, ejercicio 2:
function Aleatorios(){
    $contador = 0;
    while(true){
        $matriz[$contador][0] = rand(1,100);
        $matriz[$contador][1] = rand(1,100);
        $matriz[$contador][2] = rand(1,100);
        //Se realiza la comprobacion de si el primer numero es par, el segundo impar y el tercero es par
        //solo en caso de que se cumplan las 3 condiciones se va a salir del ciclo
        if(($matriz[$contador][0] % 2 == 0) && ($matriz[$contador][1] % 2 == 1) && ($matriz[$contador][2] % 2 == 0)){
            $contador++;//Para imprimir correctamente el numero de iteraciones, ya que el contador
            //inicia en 0
            break; //para romper el while y poder terminar la ejecucion
        }
        $contador++;
    }
    echo $contador*4," números obtenidos en $contador iteraciones";
}

//Ejercicio 3
function Ejercicio3v1(){
    $num = $_GET["numeroM"];
}


?>