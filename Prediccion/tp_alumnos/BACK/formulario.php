<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $_SESSION["nombre"] = $_POST["nombre"];
    $_SESSION["password"] = $_POST["password"];

    require 'conexion_bd.php';

if(isset($_POST['enviar'])){

    $usuario = $_POST['nombre'];
    $contraseña = $_POST['password'];

    $sql = "SELECT * FROM usuarios WHERE usuarioLogin = '$usuario' and usuarioPass = '$contraseña'";
    $resultado = mysqli_query($conexion,$sql);
    $numero_registro = mysqli_num_rows($resultado);
        if ($numero_registro !=0) {

            while($row = $resultado->fetch_array()){
                $nivel = $row['nivel'];
                if($nivel == 'admin'){
                    header("Location: administracion.php");
                    exit;
                }
                else{
                    header("Location: usuarios.php");
                    exit;
                }
            }
           
            

        } else {
            ?><span class="error"><?php echo "Usuario y/o contraseña incorrecta!";?></span><?php
        }
        
}
  
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Formulario</title>
    <style>
        .error {color: #FF0000;}
    </style>
</head>
<body>
    <?php
    include('loginRequired.php');
    ?>
    <form method="post">
        <input type="text" name="nombre" placeholder="Nombre">
        <span class="error"> <?php echo $nameErr;?></span>
        <br>
        <input type="password" name="password" placeholder="Contraseña">
        <span class="error"> <?php echo $passErr;?></span>
        <br>
        <input type="submit" name="enviar" value="Enviar">
    </form>
</body>
</html>