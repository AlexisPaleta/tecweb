<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" 
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> EJERCICIOS PHP </title>
</head>
<body>
<?php
error_reporting(E_ERROR | E_PARSE);

//EJERCICIO 1:
print_r("<h2>Ejercicio 1:</h2>");
echo "<p>\$_myvar = 1; //su nombre empieza por _ lo que es permitido</p>";
echo "<p>\$_7var = 1; //su nombre empieza por _ lo que es permitido</p>";
echo "<p>myvar  da ERROR porque toda variable empieza con el signo de \$</p>";
echo "<p>\$myvar = 1; //Correcto porque empieza con un caracter normal</p>";
echo "<p>\$var7 = 1; //Como empieza por un caracter normal no hay problema</p>";
echo "<p>\$_element1 = 1; //su nombre empieza por _ lo que es permitido</p>";
echo "<p>\$house*5 = 1 // da Error por el *</p>";

//EJERCICIO 2:
print_r("<h2>Ejercicio 2:</h2>");
$a = "ManejadorSQL";
$b = 'MySQL';
$c = &$a;

echo "<p>Contenido de a = $a</p>";
echo "<p>Contenido de b = $b</p>";
echo "<p>Contenido de c = $c</p>";

print_r("<p>MODIFICANDO...</p>");
$a = "PHP SERVER";
$b = &$a;
echo "<p>Contenido de a = $a</p>";
echo "<p>Contenido de b = $b</p>";
echo "<p>Contenido de c = $c</p>";
print_r("<p>Lo que ocurrió fue que al inicio a poseía una cadena, b otra aparte, pero a c se le asignó la dirección de memoria de a, por lo que entonces ahora c contiene lo que esté guardado en la variable a, eso se muestra en la primera impresión, después se ve cómo al asignar en b la dirección de memoria de 'a' también, ahora si se modifica 'a' cambiarán los 3.</p>");

//EJERCICIO 3:
print_r("<h2>Ejercicio 3:</h2>");
$a = "PHP5";
echo "<p>Contenido de a = $a</p>";
$z[] = &$a;
echo "<p>Contenido de z[0] = $z[0]</p>";
$b = "5a version de PHP";
echo "<p>Contenido de b = $b</p>";
$c = $b*10;
echo "<p>Contenido de c = $c</p>";
$a .= $b;
echo "<p>Contenido de a = $a</p>";
$b *= $c;
echo "<p>Contenido de b = $b</p>";
$z[0] = "MySQL";
echo "<p>Contenido de z[0] = $z[0]</p>";

//EJERCICIO 4:
print_r("<h2>Ejercicio 4:</h2>");
echo "<p>\$a en el ámbito global: " . $GLOBALS["a"] . "</p>";
echo "<p>\$a en el ámbito simple: " . $a . "</p>";
echo "<p>\$b en el ámbito global: " . $GLOBALS["b"] . "</p>";
echo "<p>\$b en el ámbito simple: " . $b . "</p>";
echo "<p>\$c en el ámbito global: " . $GLOBALS["c"] . "</p>";
echo "<p>\$c en el ámbito simple: " . $c . "</p>";
echo "<p>\$z en el ámbito global: " . $GLOBALS["z"] . "</p>";
echo "<p>\$z[0] en el ámbito simple: " . $z[0] . "</p>";

//EJERCICIO 5:
print_r("<h2>Ejercicio 5:</h2>");
$a2 = "7 personas";
$b2 = (integer) $a2;
$a2 = "9E3";
$c2 = (double) $a2;
echo "<p>Contenido de a2 = $a2</p>";
echo "<p>Contenido de b2 = $b2</p>";
echo "<p>Contenido de c2 = $c2</p>";

//EJERCICIO 6:
print_r("<h2>Ejercicio 6:</h2>");
$a3 = "0";
$b3 = "TRUE";
$c3 = FALSE;
$d = ($a3 OR $b3);
$e = ($a3 AND $c3);
$f = ($a3 XOR $b3);

echo "<p>Contenido de a3 = $a3</p>";
echo "<p>Contenido de b3 = $b3</p>";
echo "<p>Contenido de c3 = " . var_export($c3, true) . "</p>";
echo "<p>Contenido de d = $d</p>";
echo "<p>Contenido de e = " . var_export($e, true) . "</p>";
echo "<p>Contenido de f = $f</p>";

echo("<p>var_dump imprime:</p>");
echo "<p>",var_dump($a3, $b3, $c3, $d, $e, $f),"</p>";
echo "<p>La funcion que uso para mostrar c3 y e es: echo var_export(\$c3, true);</p>";

//EJERCICIO 7:
print_r("<h2>Ejercicio 7:</h2>");
echo "<p>Versión del servidor (Apache): " . $_SERVER['SERVER_SOFTWARE'] . "</p>";
echo "<p>Versión de PHP: " . phpversion() . "</p>";
echo "<p>Sistema operativo del servidor: " . PHP_OS . "</p>";
echo "<p>Idioma del navegador: " . $_SERVER['HTTP_ACCEPT_LANGUAGE'] . "</p>";

?>

<p>
    <a href="https://validator.w3.org/markup/check?uri=referer"><img
    src="https://www.w3.org/Icons/valid-xhtml11" alt="Valid XHTML 1.1" height="31" width="88" /></a>
</p>
</body>
</html>
