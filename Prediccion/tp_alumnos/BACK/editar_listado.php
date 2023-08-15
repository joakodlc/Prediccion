<?php
include("conexion_bd.php");
?>
<!DOCTYPE html>
<head>
<title>Actualizar alumno</title>
</head>
<body>
<?php

   if (isset($_POST['enviar'])) {
      $id=$_POST['id'];
      $primer_parcial=$_POST['primer'];//nombre de input
      $segundo_parcial=$_POST['segundo'];
      $primer_recuperatorio=$_POST['recu1'];
      $segundo_recuperatorio=$_POST['recu2'];
      $examen_final=$_POST['final'];

      $sql="UPDATE materias SET primerParcial='".$primer_parcial."',
      segundoParcial='".$segundo_parcial."',
      primerRecu='".$primer_recuperatorio."',
      segundoRecu='".$segundo_recuperatorio."',
      finalMateria='".$examen_final."' WHERE id_materia='".$id."' ";
      $resultado=mysqli_query($conexion,$sql);
         if ($resultado) {
            echo "<script lenguage='JavaScript'>
                     alert('los datos se guardaron correctamente');
                     location.assign('listado_alumnos.php');
                     </script>";
         } else {
            "<script lenguage='JavaScript'>
                     alert('los datos NO se guardaron correctamente');
                     location.assign('listado_alumnos.php');
                     </script>";
         }
         mysqli_close($conexion);

   } else {
      $id=$_GET['id'];
      $sql="SELECT * FROM usuarios WHERE id_usuario='".$id."'";
      $resultado=mysqli_query($conexion,$sql);

      $fila=mysqli_fetch_assoc($resultado);
      $apellido=$fila['apellido'];
      $nombre=$fila['nombre'];
      /////////////////////////consulta materia
      $sql="SELECT * FROM materias WHERE id_materia='".$id."'";
      $respuesta=mysqli_query($conexion,$sql);

      $row=mysqli_fetch_assoc($respuesta);
      $primer_parcial=$row['primerParcial'];
      $segundo_parcial=$row['segundoParcial'];
      $primer_recuperatorio=$row['primerRecu'];
      $segundo_recuperatorio=$row['segundoRecu'];
      $examen_final=$row['finalMateria'];

      mysqli_close($conexion);
   

?>

    <h1>Actualizar alumno</h1>
    <li><a href="listado_alumnos.php">Volver a lista de alumnos</a></li><br>
    <form action="<?=$_SERVER['PHP_SELF']?>" method="post">
         <label>Alumno: </label>
         <label><?php ECHO "$apellido, $nombre"; ?></label> <br>
         <label>1°parcial: </label>
         <select name="primer">
            <option value ="<?php ECHO $primer_parcial; ?>"><?php ECHO $primer_parcial; ?></option>
            <option value =""></option>
            <option value ="A">A</option>
            <option value ="1">1</option>
            <option value ="2">2</option>
            <option value ="3">3</option>
            <option value ="4">4</option>
            <option value ="5">5</option>
            <option value ="6">6</option>
            <option value ="7">7</option>
            <option value ="8">8</option>
            <option value ="9">9</option>
            <option value ="10">10</option>
         </select><br>
         <label>2°parcial: </label>
         <select name="segundo">
            <option value ="<?php ECHO $segundo_parcial; ?>"><?php ECHO $segundo_parcial; ?></option>
            <option value =""></option>
            <option value ="A">A</option>
            <option value ="1">1</option>
            <option value ="2">2</option>
            <option value ="3">3</option>
            <option value ="4">4</option>
            <option value ="5">5</option>
            <option value ="6">6</option>
            <option value ="7">7</option>
            <option value ="8">8</option>
            <option value ="9">9</option>
            <option value ="10">10</option>
         </select><br>
         <label>1°recuperatorio: </label>
         <select name="recu1">
            <option value ="<?php ECHO $primer_recuperatorio; ?>"><?php ECHO $primer_recuperatorio; ?></option>
            <option value =""></option>
            <option value ="A">A</option>
            <option value ="1">1</option>
            <option value ="2">2</option>
            <option value ="3">3</option>
            <option value ="4">4</option>
            <option value ="5">5</option>
            <option value ="6">6</option>
            <option value ="7">7</option>
            <option value ="8">8</option>
            <option value ="9">9</option>
            <option value ="10">10</option>
         </select><br>
         <label>2°recuperatorio: </label>
         <select name="recu2">
            <option value ="<?php ECHO $segundo_recuperatorio; ?>"><?php ECHO $segundo_recuperatorio ?></option>
            <option value =""></option>
            <option value ="A">A</option>
            <option value ="1">1</option>
            <option value ="2">2</option>
            <option value ="3">3</option>
            <option value ="4">4</option>
            <option value ="5">5</option>
            <option value ="6">6</option>
            <option value ="7">7</option>
            <option value ="8">8</option>
            <option value ="9">9</option>
            <option value ="10">10</option>
         </select><br>
         <label>Final: </label>
         <select name="final">
            <option value ="<?php ECHO $examen_final; ?>"><?php ECHO $examen_final; ?></option>
            <option value =""></option>
            <option value ="A">A</option>
            <option value ="1">1</option>
            <option value ="2">2</option>
            <option value ="3">3</option>
            <option value ="4">4</option>
            <option value ="5">5</option>
            <option value ="6">6</option>
            <option value ="7">7</option>
            <option value ="8">8</option>
            <option value ="9">9</option>
            <option value ="10">10</option>
         </select><br>

         <input type="hidden" name="id" value="<?php ECHO $id; ?>">

         <br><input type="submit" name="enviar" value="ACTUALIZAR"><br>
         
          <br><span class="error"> <?php echo "*A: Es ausente en parcial*";?></span> 
          <br><span class="error"> <?php echo "*Notas menores a 6, es desaprobado*";?></span> 
          <br><span class="error"> <?php echo "*Con los dos parciales aprobados promociona la materia*";?></span> 
               
               
   
   </form>
   <?php
   }
   ?>

</body>
</html>