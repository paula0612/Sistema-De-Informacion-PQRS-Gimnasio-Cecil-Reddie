<?php
require "../modelo/conexionBasesDatos.php";
require "../modelo/Estudiante.php";

//header("location:index.php?x=2");	
	
extract ($_REQUEST);
session_start();
if($_SESSION['secretaria'] != 1){
        header("location:salir.php");
        die();
    }
    if($_SESSION['documento'] == null || $_SESSION['documento'] == ''){
        header("location:salir.php");
        die();
    }
    $varsession= $_SESSION['documento'];

$objConexion=Conectarse();
$sql= "select 	petNombre, petApellido from peticionario where idPeticionario=$varsession";

$resultadoNombre = $objConexion->query($sql);

$objEstudiante = new Estudiante();
$nombre = $resultadoNombre->fetch_object();
    $resultado=$objEstudiante-> enviarSecretaria();
/*
    $sql="SELECT * FROM solicitud WHERE idSolicitud='$_REQUEST[radicado]'";
    $resultado=$objConexion->query($sql);*/
                

?>
<!DOCTYPE html>
<html>

<head>
    <title> Menú </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo.css">
</head>

<body>

<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

    <div class="Atras">
        <div class="d-grid gap-2 d-md-block">
            <a class="btn btn-warning" href="consultarCorrespondenciaS.php" role="button">Atrás</a>
        </div>
    </div>
    <div class="Cerrar">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-danger"  href="salir.php" role="button">Cerrar sesión</a>
        </div>
    </div>
    <div class="Mensaje4">
        <input class="form-control" type="text" value="Correspondencia sin resolver" aria-label="Disabled input example"
            disabled readonly>
    </div>
    <div class="Mensaje2">
        <input class="form-control" type="text" value="Funcionario: <?php echo $nombre->petNombre." ".$nombre->petApellido ?>" aria-label="Disabled input example" disabled
            readonly>
    </div>
    <div class="Mensaje3">
        <input class="form-control" type="text" value="Identificación: <?php echo $varsession ?>" aria-label="Disabled input example"
            disabled readonly>
    </div>

    <div class="Tabla3">
        <table class="table text-center table-striped table-hover table-sm">
            <tr>
        <th>N° radicado</th>
        <th>Asunto </th>
        <th>Tipo Solicitud</th>
        <th>Fecha Solicitud</th>
        <th>Hora Solicitud</th>
        <th>Motivo Solicitud</th>
        <th>Archivo</th>
        <th>Responder</th>
            </tr>
   <?php
       //while ($estudiante = $resultado->fetch_object())
       //{
        while ($estudiante = $resultado->fetch_object()){
      ?>
            <tr>
        <td><?php  echo  $estudiante->idSolicitud?> </td>
        <?php           
          $sol= $estudiante->idSolicitud;
        ?>
        <td><?php  echo  $estudiante->sdAsunto?> </td>
        <td><?php  echo  $estudiante->tcNombre?> </td>
        <td><?php  echo  $estudiante->sdFechaenvio ?> </td>
        <td><?php  echo  $estudiante->sdHoraenvio  ?> </td>
        <!--<td><?php  echo  $estudiante->sdMotivo  ?> </td>-->
        <td>
        <?php
            echo "<form name='sdffg' method='POST' action='motivoSolicitudES.php'>";
            echo "<input type='hidden' name='radicado' value='$sol'>";
            echo "<input class='btn btn-outline-primary' type='submit' value='Ver Solicitud'>";
            echo "</form>";
        ?>
        </td>
        
        <?php
        $archivo=$estudiante->sdArchivo;

        if($archivo!="Sin Archivo"){
?>
        <td>
        <?php

            echo "<form name='sdffg' method='POST' action='archivo.php'>";
            echo "<input type='hidden' name='id' value='$sol'>";
            echo "<input type='image' name='botondeenvio' src='../imagenes/pdf1.png'  width='40px' height='48px' alt='Enviar formulario'>";
            echo "</form>";
        ?>
       
        </td>

<?php
        }if($archivo=="Sin Archivo"){
            ?>
                        <td><center><img src='../imagenes/pdf2.png' width='40px' height='48px'></a></center></td><?php

        }
        ?>
        <td> 
        <?php

            echo "<form name='sdffg' method='POST' action='respuestaS.php'>";
            echo "<input type='hidden' name='radicado' value='$sol'>";
            echo "<input class='btn btn-outline-success' type='submit' value='Crear respuesta'>";
            echo "</form>";
        ?>
           
        </td>
            </tr>
            <?php
       //}
    }
     ?>
           
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
        crossorigin="anonymous"></script>
</body>

</html>