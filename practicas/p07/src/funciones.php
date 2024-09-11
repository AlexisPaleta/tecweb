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
    $random = rand(1,100);
    if($random % $num ==0){
        echo "El primer número múltiplo generado de $num es ".$random;
        return;//Se termina la funcion en caso de que ya se haya encontrado el numero, sino se procede
        //al ciclo while
    }
    while($random % $num !=0){
        $random = rand(1,100);
    }
    echo "El primer número múltiplo generado de $num es ".$random;
}

function Ejercicio3v2(){//En la version del Do While ocupa menos lineas, es mas sencillo
    $num = $_GET["numeroM"];

    do{
        $random = rand(1,100);
    }while($random % $num !=0);
    echo "El primer número múltiplo generado de $num es ".$random;
}

//Ejercicio 4:
function Ascii(){
    for($i = 97; $i<123; $i++){
        $arreglo[$i] = chr($i);
    }
    echo "Los caracteres ASCII son:";
    foreach ($arreglo as $key => $letra) {//$Key toma el valor del indice, y $letra el valor de lo almacenado
        //dentro de ese indice
        echo "<br>";
        echo "ASCII[$key] = $letra";
    }
}

?>