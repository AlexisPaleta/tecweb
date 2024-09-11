<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang=“es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Respuesta del ejercicio 6</title>
</head>
<body>
    <?php
        $vehiculos = array(
            "ABC1234" => array(
                "Auto" => array(
                    "Marca" => "BMW",
                    "Modelo" => "2020",
                    "Tipo" => "Camioneta"
                ),
                "Propietario" => array(
                    "Nombre" => "Alexis P.",
                    "Ciudad" => "Puebla",
                    "Direccion" => "Av. San Alfonso"
                )
            ),
            "DBC1234" => array(
                "Auto" => array(
                    "Marca" => "Audi",
                    "Modelo" => "2023",
                    "Tipo" => "Sedán"
                ),
                "Propietario" => array(
                    "Nombre" => "Juanito P.",
                    "Ciudad" => "Tlaxcala",
                    "Direccion" => "San Manuel"
                )
            ),
            "XYZ5678" => array(
                "Auto" => array(
                    "Marca" => "Toyota",
                    "Modelo" => "2021",
                    "Tipo" => "SUV"
                ),
                "Propietario" => array(
                    "Nombre" => "Marta R.",
                    "Ciudad" => "Ciudad de México",
                    "Direccion" => "Av. Insurgentes"
                )
            ),
            "JKL7890" => array(
                "Auto" => array(
                    "Marca" => "Ford",
                    "Modelo" => "2019",
                    "Tipo" => "Camioneta"
                ),
                "Propietario" => array(
                    "Nombre" => "Carlos S.",
                    "Ciudad" => "Guadalajara",
                    "Direccion" => "Calle Independencia"
                )
            ),
            "MNO4567" => array(
                "Auto" => array(
                    "Marca" => "Chevrolet",
                    "Modelo" => "2020",
                    "Tipo" => "Hatchback"
                ),
                "Propietario" => array(
                    "Nombre" => "Lucía V.",
                    "Ciudad" => "Monterrey",
                    "Direccion" => "Av. Constitución"
                )
            ),
            "PQR2345" => array(
                "Auto" => array(
                    "Marca" => "Honda",
                    "Modelo" => "2022",
                    "Tipo" => "Sedán"
                ),
                "Propietario" => array(
                    "Nombre" => "Mario T.",
                    "Ciudad" => "Chihuahua",
                    "Direccion" => "Calle Revolución"
                )
            ),
            "STU0987" => array(
                "Auto" => array(
                    "Marca" => "Mazda",
                    "Modelo" => "2018",
                    "Tipo" => "SUV"
                ),
                "Propietario" => array(
                    "Nombre" => "Ana C.",
                    "Ciudad" => "Oaxaca",
                    "Direccion" => "Av. Juárez"
                )
            ),
            "VWX3456" => array(
                "Auto" => array(
                    "Marca" => "Nissan",
                    "Modelo" => "2021",
                    "Tipo" => "Camioneta"
                ),
                "Propietario" => array(
                    "Nombre" => "José M.",
                    "Ciudad" => "Veracruz",
                    "Direccion" => "Calle 5 de Mayo"
                )
            ),
            "YZA6789" => array(
                "Auto" => array(
                    "Marca" => "Hyundai",
                    "Modelo" => "2017",
                    "Tipo" => "Sedán"
                ),
                "Propietario" => array(
                    "Nombre" => "Teresa L.",
                    "Ciudad" => "Querétaro",
                    "Direccion" => "Blvd. Bernardo Quintana"
                )
            ),
            "BCD3456" => array(
                "Auto" => array(
                    "Marca" => "Volkswagen",
                    "Modelo" => "2020",
                    "Tipo" => "Hatchback"
                ),
                "Propietario" => array(
                    "Nombre" => "Pablo F.",
                    "Ciudad" => "Morelia",
                    "Direccion" => "Av. Madero"
                )
            ),
            "EFG9876" => array(
                "Auto" => array(
                    "Marca" => "Kia",
                    "Modelo" => "2022",
                    "Tipo" => "SUV"
                ),
                "Propietario" => array(
                    "Nombre" => "Luis R.",
                    "Ciudad" => "Cancún",
                    "Direccion" => "Blvd. Kukulcán"
                )
            ),
            "HIJ5432" => array(
                "Auto" => array(
                    "Marca" => "Mercedes-Benz",
                    "Modelo" => "2019",
                    "Tipo" => "Sedán"
                ),
                "Propietario" => array(
                    "Nombre" => "Gabriela Q.",
                    "Ciudad" => "León",
                    "Direccion" => "Blvd. Adolfo López Mateos"
                )
            ),
            "KLM7654" => array(
                "Auto" => array(
                    "Marca" => "Subaru",
                    "Modelo" => "2021",
                    "Tipo" => "Camioneta"
                ),
                "Propietario" => array(
                    "Nombre" => "Ricardo J.",
                    "Ciudad" => "Aguascalientes",
                    "Direccion" => "Av. Tecnológico"
                )
            ),
            "NOP1234" => array(
                "Auto" => array(
                    "Marca" => "Tesla",
                    "Modelo" => "2023",
                    "Tipo" => "Eléctrico"
                ),
                "Propietario" => array(
                    "Nombre" => "Sofía K.",
                    "Ciudad" => "Tijuana",
                    "Direccion" => "Av. Paseo de los Héroes"
                )
            ),
            "QRS5678" => array(
                "Auto" => array(
                    "Marca" => "Peugeot",
                    "Modelo" => "2018",
                    "Tipo" => "Sedán"
                ),
                "Propietario" => array(
                    "Nombre" => "Esteban O.",
                    "Ciudad" => "Saltillo",
                    "Direccion" => "Calle Victoria"
                )
            )
        );
        
    ?>
    <h2>Información Vehicular:</h2>
    <form action="http://localhost/tecweb/practicas/p07/src/ejercicio6.php" method="post">
        <label>Selecciona una matrícula:
            <select name="autos">
                <option value="todos">Todos los vehiculos</option>
                <?php
                    foreach ($vehiculos as $key => $coche) {
                        echo "<option value='$key'>$key</option>";
                    } 
                    
                ?>
            </select>
            <br>
            <input type="submit" value="Consultar Datos">
        </label>
    </form>
    <br>
    <?php
        if(isset($_POST["autos"])){

            $eleccion = $_POST["autos"];
            if($eleccion == "todos"){
                echo "Datos de todos los vehiculos";
                echo "<br>";
                echo "<ol>";
                foreach ($vehiculos as $key => $coche) {
                    echo "<li>Matricula: $key</li>";
                        echo "<ul>";
                            echo "<li>Auto:</li>";
                                echo "<ul>";
                                    echo "<li>Marca:".$coche["Auto"]["Marca"],"</li>";
                                    echo "<li>Modelo:".$coche["Auto"]["Modelo"],"</li>";
                                    echo "<li>Tipo:".$coche["Auto"]["Tipo"],"</li>";
                                echo "</ul>";
                            echo "<li>Propietario:</li>";
                                echo "<ul>";
                                    echo "<li>Nombre:".$coche["Propietario"]["Nombre"],"</li>";
                                    echo "<li>Ciudad:".$coche["Propietario"]["Ciudad"],"</li>";
                                    echo "<li>Direccion:".$coche["Propietario"]["Direccion"],"</li>";
                                echo "</ul>";
                        echo "</ul>";
                } 
                echo "</ol>";
            }else{
                echo "Matricula: $eleccion";
                    echo "<ul>";
                        echo "<li>Auto:</li>";
                            echo "<ul>";
                                echo "<li>Marca:".$vehiculos[$eleccion]["Auto"]["Marca"],"</li>";
                                echo "<li>Modelo:".$vehiculos[$eleccion]["Auto"]["Modelo"],"</li>";
                                echo "<li>Tipo:".$vehiculos[$eleccion]["Auto"]["Tipo"],"</li>";
                            echo "</ul>";
                        echo "<li>Propietario:</li>";
                            echo "<ul>";
                                echo "<li>Nombre:".$vehiculos[$eleccion]["Propietario"]["Nombre"],"</li>";
                                echo "<li>Ciudad:".$vehiculos[$eleccion]["Propietario"]["Ciudad"],"</li>";
                                echo "<li>Direccion:".$vehiculos[$eleccion]["Propietario"]["Direccion"],"</li>";
                            echo "</ul>";
                    echo "</ul>";
            }

        }
    ?>
</body>
</html>