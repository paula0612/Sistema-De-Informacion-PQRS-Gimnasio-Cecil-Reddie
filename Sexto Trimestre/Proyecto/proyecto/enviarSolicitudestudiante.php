<?php  //abrimos php
require "../modelo/conexionBasesDatos.php";

session_start();
 if($_SESSION['estudiante'] != 1){
        header("location:salir.php");
        die();
    }
    if($_SESSION['documento'] == null || $_SESSION['documento'] == ''){
        header("location:salir.php");
        die();
    }
    $varsession= $_SESSION['documento'];

$objConexion = Conectarse();

$sql= "select idTipoCorrespondencia, tcNombre from tipo_correspondencia";
$resultado = $objConexion->query($sql);

?>    

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> GIMNASIO CECIL REDDIE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo.css">
</head>

<body>
    
<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

   <br><br><br><br><br><br><br>
   <form id="form1" name="form1" method="post" action="enviarSolicitudE.php" enctype="multipart/form-data">
    <center>
        <table border="4" style="width: 50%;";>
           <td>

            <center> <h1> Solicitud Estudiante </h1>

            <p>Asunto:</p>
            <p><input required="required" type="text" name="asunto" class="form-control"  placeholder="Asunto" style="width: 20%;"></p>

            <p> Seleccione el tipo de solicitud que desea realizar:</p>
            <p><select  class="form-select" aria-label="solicitud" style="width: 20%;" name="correspondencia" >
            <p><option selected>Seleccione</option></p>
            <?php
            while ($tipo_correspondencia=$resultado->fetch_object()) {
            ?>
            <option value="<?php echo $tipo_correspondencia->idTipoCorrespondencia?>">
            <?php echo $tipo_correspondencia->tcNombre?></option>
            <?php 
            }
            ?></select></p>

            <p> Nos gustaria conocer el motivo de su solicitud:</p>
            <p><textarea class="form-control"required="required" placeholder="Motivo de su Solicitud" id="floatingTextarea" 
            style="width: 30%;" name="motivo"></textarea></p>

           <p>  <input type="file" id="archivo" name="archivo" accept="application/pdf"></p>

              <button id="btn" class="btn btn-primary">enviar</button><br><br></center>
              

              <script src="jquery-3.6.0.min.js"></script>
                <script src="sweetalert2.all.min.js"></script>
                <script src="enviarSolicitudE.php?btn"></script>

            </td>
         </table><br>
         </center>
         </form>

         
</body>

</html>