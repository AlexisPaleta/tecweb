<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> EJERCICIOS PHP </title>
</head>
<body>
<?php
//EJERCICIO 1:
//Determina cuál de las siguientes variables son válidas y explica por qué:
$_myvar = 1; //su nombre empieza por _ lo que es permitido
$_7var = 1; //su nombre empieza por _ lo que es permitido
//myvar  da ERROR porque toda variable empieza con el signo de $
$myvar = 1; //Correcto porque empieza con un caracter normal
$var7 = 1; //Como empieza por un caracter normal no hay problema
$_element1 //su nombre empieza por _ lo que es permitido
//$house*5 = 1 // da Error por el *
?>
</body>
</html>