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
    <title>Materia</title>
    <style>
        .error {color: #FF0000;}
        .nice {color: #70D114;}
    </style>
</head>
<body>
    <h1>Materias cursadas</h1>
        <li><a href="usuarios.php">Volver</a></li>
        <br>
    <table>
         <tr>

             <th>Nombre materia</th>
             <th>1°parcial </th>
             <th>2°parcial </th>
             <th>1°recuperatorio </th>
             <th>2°recuperatorio </th>
             <th>Nota Final</th>
         </tr>
        <?php
            include("conexion_bd.php");
            $primerParcial= $segundoParcial = $recuperatorio1 = $recuperatorio2 = $final="";

            $consulta = "SELECT * FROM usuarios WHERE usuarioLogin = '$nombre'";
            $resultado = mysqli_query($conexion,$consulta);
            while ($row=mysqli_fetch_array($resultado)) {
                $id = $row['id_usuario'];
                $apellido = $row['apellido'];
                $nombre = $row['nombre'];
                $documento = $row['documento'];
            
                $consulta_notas="SELECT * FROM materias WHERE id_materia=$id";
                $resultado_notas = mysqli_query($conexion,$consulta_notas);
                while ($row2=mysqli_fetch_array($resultado_notas)) {
                    $nombreMateria = $row2['nombreMateria'];
                    $primerParcial = $row2['primerParcial'];
                    $segundoParcial = $row2['segundoParcial'];
                    $recuperatorio1 = $row2['primerRecu'];
                    $recuperatorio2 = $row2['segundoRecu'];
                    $final = $row2['finalMateria'];

                 if ($primerParcial==null||$primerParcial=="") {
                    $primerParcial="-";
                 } else {
                    $primerParcial = $row2['primerParcial'];
                 }
                 if ($segundoParcial==null||$segundoParcial=="") {
                    $segundoParcial="-";
                 } else {
                    $segundoParcial = $row2['segundoParcial'];
                 }
                 ////
                 if ($recuperatorio1==null||$recuperatorio1=="") {
                    $recuperatorio1="-";
                 } else {
                    $recuperatorio1 = $row2['primerRecu'];
                 }
                 if ($recuperatorio2==null||$recuperatorio2=="") {
                    $recuperatorio2="-";
                 } else {
                    $recuperatorio2 = $row2['segundoRecu'];
                 }
                 //
                 if ($final==null||$final=="") {
                    $final="-";
                 } else {
                    $final = $row2['finalMateria'];
                 }
                 ///////////////////////////////////// estado del alumno

        ?>


         <tr>
      
                <th><?php ECHO $nombreMateria; ?></th>
                <th><?php ECHO $primerParcial; ?></th>
                <th><?php ECHO $segundoParcial; ?></th>
                <th><?php ECHO $recuperatorio1; ?></th>
                <th><?php ECHO $recuperatorio2; ?></th>
                <th><?php ECHO $final; ?></th>
                
                
                
        </tr>

                <?php }}?>
        </table>



        </div>
    </div>
    <br>
    <?php
    /// ambos parciales aprobados
if ($primerParcial>=6&&$segundoParcial>=6) {
    $primerParc="3";
}
//primer parcial desaprobado o ausente, y segundo parcial sin tomar
if (($primerParcial<6||$primerParcial=="A")&&$segundoParcial=="-") {
    $primerParc="2";
}
//ningun parcial hecho todavia
if ($primerParcial=="-"&&$segundoParcial=="-") {
    $primerParc="1";
}
//primer parcial desaprobado o ausente, y segundo parcial aprobado
if (($primerParcial<6||$primerParcial=="A")&&$segundoParcial>=6) {
    $primerParc="2";
}
//ambos parciales desaprobados
if ($primerParcial<6&&$segundoParcial<6) {
    $primerParc="5";
}
//primer parcial aprobado, pero el segundo no
if ($primerParcial>=6&&($segundoParcial<6||$segundoParcial=="A")) {
    $primerParc="4";
}


switch ($primerParc) {
    case '1':
        echo"*Todavia sin notas*";
        break;
    case '2':
            ?> <span class="error"> <?php echo "*Primer parcial desaprobado, debes redir el primer recuperatorio*";?></span> <?php
           
            break;
    case '3':
            ?> <span class="nice"> <?php echo "*Ambos parciales aprobados, promociona la materia!*";?></span> <?php
               
            break;
    case '4':
            ?> <span class="error"> <?php echo "*Segundo parcial desaprobado, debes redir el segundo recuperatorio*";?></span> <?php
               
            break;
    case '5':
            ?> <span class="error"> <?php echo "*Ambos parciales desaprobados, debes rendir los dos recuperatorios!*";?></span> <?php
               
                break;
    default:
    echo"*Sin novedades...*";
        break;
}


    ?>
     

</body>
</html>