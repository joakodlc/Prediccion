<?php
session_start();

if (isset($_SESSION["nombre"]) && isset($_SESSION["password"])) {
    $nombre = $_SESSION["nombre"];
    $contraseña = $_SESSION["password"];

    // Aquí puedes usar los datos en la página.
}
?>
<!DOCTYPE html>

<head>

    <title>Datos personales</title>
</head>
<body>
<h1>Datos personales</h1>
<?php
    

    $inc = include("conexion_bd.php");
    
    if($inc){
    
    
     
        $consulta = "SELECT * FROM usuarios WHERE usuarioLogin = '$nombre'";
      
        $resultado = mysqli_query($conexion,$consulta);
        if ($resultado) {
            while($row = $resultado->fetch_array()){
                $usuario = $row['usuarioLogin'];
                $apellido = $row['apellido'];
                $nombre = $row['nombre'];
                $documento = $row['documento'];
                $mail = $row['mail'];
                $telefono = $row['telefono'];
                $nivel = $row['nivel'];
                ?>
               
                    <div>
                        <p>
                        <?php
                            if ($nivel=="admin") {
                               ?>
                               <li><a href="administracion.php">Volver al menu</a></li>
                               <?php
                            } else {
                                ?>
                               <li><a href="usuarios.php">Volver al menu</a></li>
                               <?php
                            }
                            
                            ?>
                            <br>
                            <b>Usuario: </b> <?php ECHO $usuario; ?><br>
                            <b>Apellidos: </b> <?php ECHO $apellido; ?><br>
                            <b>Nombres: </b> <?php ECHO $nombre; ?><br>
                            <b>DNI: </b> <?php ECHO $documento; ?><br>
                            <b>Email: </b> <?php ECHO $mail; ?><br>
                            <b>telefono: </b> <?php ECHO $telefono; ?><br>
                        </p>
                    </div>
                
    
                
                <?php
            }
        }
    }
    ?>
    
</body>
</html>