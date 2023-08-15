<?php
session_start();

if (isset($_SESSION["nombre"]) && isset($_SESSION["password"])) {
    $nombre = $_SESSION["nombre"];
    $contraseña = $_SESSION["password"];

    // Aquí puedes usar los datos en la página.
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Administracion</title>
</head>
<body>
<h1>Pagina administrador</h1>
    <?php
    
    
        echo "Bienvenido administrador $nombre!";
        ?>
        
        <li><a href="listado_alumnos.php">Listado de alumnos</a></li>
        <li><a href="datos_personales.php">Datos Personales</a></li>
        <li><a href="formulario.php">Salir</a></li>
        
      
     
</body>
</html>
