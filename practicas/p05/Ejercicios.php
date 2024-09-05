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
print_r("<h2>Ejercicio 1:</h2>");
echo "<br>";
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

print_r("<h2>Ejercicio 2:</h2>");
echo "<br>";
$a = "ManejadorSQL";
$b = 'MySQL';
$c = &$a;

print_r("Contenido de a = $a");
echo "<br>";
print_r("Contenido de b = $b");
echo "<br>";
print_r("Contenido de c = $c");
echo "<br>";

print_r("MODIFICANDO...");
echo "<br>";
$a = "PHP SERVER";
$b = &$a;
print_r("Contenido de a = $a");
echo "<br>";
print_r("Contenido de b = $b");
echo "<br>";
print_r("Contenido de c = $c");
echo "<br>";
print_r("Lo que ocurrió fue que al inicio a poseia una cadena, b otra aparte, pero a c se le asignó la dirección de memoria de a, por lo que entonces ahora c contiene lo que este guardado en la variable a, eso se muestra en la primera impresión, después se ve cómo al asignar en b la dirección de memoria de 'a' también, ahora si se modifica 'a' cambiarán los 3 ");
echo "<br>";


print_r("<h2>Ejercicio 3:</h2>");
echo "<br>";
$a = "PHP5";
echo "<br>";
print_r("Contenido de a = $a");
echo "<br>";
$z[] = &$a;
echo "<br>";
print_r("Contenido de z[0] = $z[0]");
echo "<br>";
$b = "5a version de PHP";
echo "<br>";
print_r("Contenido de b = $b");
echo "<br>";
$c = $b*10;
echo "<br>";
print_r("Contenido de c = $c");
echo "<br>";
$a .= $b;
echo "<br>";
print_r("Contenido de a = $a");
echo "<br>";
$b *= $c;
echo "<br>";
print_r("Contenido de b = $b");
echo "<br>";
$z[0] = "MySQL";
echo "<br>";
print_r("Contenido de Z[0] = $Z[0]");
echo "<br>";


print_r("<h2>Ejercicio 4:</h2>");
echo "<br>";
echo '$a en el ámbito global: ' . $GLOBALS["a"] . "\n";
echo "<br>";
echo '$a en el ámbito simple: ' . $a . "\n";
echo "<br>";
echo '$b en el ámbito global: ' . $GLOBALS["b"] . "\n";
echo "<br>";
echo '$b en el ámbito simple: ' . $b . "\n";
echo "<br>";
echo '$c en el ámbito global: ' . $GLOBALS["c"] . "\n";
echo "<br>";
echo '$c en el ámbito simple: ' . $c . "\n";
echo "<br>";
echo '$z en el ámbito global: ' . $GLOBALS["z"] . "\n";
echo "<br>";
echo '$z[0] en el ámbito simple: ' . $z[0] . "\n";
echo "<br>";

print_r("<h2>Ejercicio 5:</h2>");
echo "<br>";
$a2 = "7 personas";
$b2 = (integer) $a2;
$a2 = "9E3";
$c2 = (double) $a2;
// Les cambié el nombre porque antes estaban funcionando mal
echo "<br>";
print_r("Contenido de a2 = $a2");
echo "<br>";
print_r("Contenido de b2 = $b2");
echo "<br>";
print_r("Contenido de c2 = $c2");
echo "<br>";






?>
</body>
</html>