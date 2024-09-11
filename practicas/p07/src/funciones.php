<?php

//Primera funcion, ejercicio 1:
function Multiplo(){
    $numero = $_GET["numero"];
    if(($numero % 5 == 0) && ($numero % 7 == 0)){
        echo "El número $numero SI es múltiplo de 5 y 7";
    }else{
        echo "El número $numero NO es múltiplo de 5 y 7";
    }
}


?>