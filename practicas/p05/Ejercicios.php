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
print_r("\$_myvar = 1; //su nombre empieza por _ lo que es permitido");
echo "<br>";
$_7var = 1; //su nombre empieza por _ lo que es permitido
print_r("\$_7var = 1; //su nombre empieza por _ lo que es permitido");
echo "<br>";
//myvar  da ERROR porque toda variable empieza con el signo de $
print_r("myvar  da ERROR porque toda variable empieza con el signo de $");
echo "<br>";
$myvar = 1; //Correcto porque empieza con un caracter normal
print_r("\$myvar = 1; //Correcto porque empieza con un caracter normal");
echo "<br>";
$var7 = 1; //Como empieza por un caracter normal no hay problema
print_r("\$var7 = 1; //Como empieza por un caracter normal no hay problema");
echo "<br>";
$_element1 = 1; //su nombre empieza por _ lo que es permitido
print_r("\$_element1 = 1; //su nombre empieza por _ lo que es permitido");
echo "<br>";
//$house*5 = 1 // da Error por el *
print_r("\$house*5 = 1 // da Error por el *");
echo "<br>";


?>
</body>
</html>