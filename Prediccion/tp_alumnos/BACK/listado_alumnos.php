<!DOCTYPE html>
<head>
    <title>Listado</title>
</head>
<body>
    <div class="row">
        <div class="col l10 offset-l1">
            <h1>Listado de alumnos</h1>
            <li><a href="administracion.php">Volver a administracion</a></li>
            <br>
        <table>
         <tr>
             <th>ID</th>
             <th>Apellido</th>
             <th>Nombre</th>
             <th>1°parcial </th>
             <th>2°parcial </th>
             <th>1°recuperatorio </th>
             <th>2°recuperatorio </th>
             <th>Nota Final</th>
         </tr>
        <?php
            include("conexion_bd.php");
            $primerParcial= $segundoParcial = $recuperatorio1 = $recuperatorio2 = $final="";
            $consulta="SELECT * FROM usuarios WHERE nivel='user'";
            $resultado = mysqli_query($conexion,$consulta);
            while ($row=mysqli_fetch_array($resultado)) {
                $id = $row['id_usuario'];
                $apellido = $row['apellido'];
                $nombre = $row['nombre'];
                $documento = $row['documento'];
            
                $consulta_notas="SELECT * FROM materias WHERE id_materia=$id";
                $resultado_notas = mysqli_query($conexion,$consulta_notas);
                while ($row2=mysqli_fetch_array($resultado_notas)) {
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
                <th><?php ECHO $id; ?></th>
                <th><?php ECHO $apellido; ?></th>
                <th><?php ECHO $nombre; ?></th>
                <th><?php ECHO $primerParcial; ?></th>
                <th><?php ECHO $segundoParcial; ?></th>
                <th><?php ECHO $recuperatorio1; ?></th>
                <th><?php ECHO $recuperatorio2; ?></th>
                <th><?php ECHO $final; ?></th>
                <th><?php ECHO "<a href='editar_listado.php?id=".$row['id_usuario']."'>EDITAR</a>  ";?></th>
                
                
        </tr>

                <?php }}?>
        </table>



        </div>
    </div>
               
    
</body>
</html>