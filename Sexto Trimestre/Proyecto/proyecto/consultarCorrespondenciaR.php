<?php
require "../modelo/conexionBasesDatos.php";
require "../modelo/Solicitud.php";	
session_start();

if ($_SESSION["rector"]!='1')
{
  header("Location:salir.php");
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
$nombre = $resultadoNombre->fetch_object();

$objSolicitud = new Solicitud();



$resultado=$objSolicitud->consultarSolicitudResueltasPorRol('1');


?>
<!DOCTYPE html>
<html>

<head>
  <title> Consultar correspondencia </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">

  <link rel="stylesheet" href="../estilos/estilo.css">
</head>

<body>

<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

<div class="Atras">
    <div class="d-grid gap-2 d-md-block">
      <a class="btn btn-warning" href="opcadmin1.php" role="button">Atrás</a>
    </div>
  </div>
  <div class="Cerrar">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a class="btn btn-danger" href="salir.php" role="button">Cerrar sesión</a>
    </div>
  </div>
  <div class="Mensaje1">
    <input class="form-control" type="text" value="Correspondencia " aria-label="Disabled input example" disabled
      readonly>
  </div>
  <div class="Mensaje2">
    <input class="form-control" type="text" value="Funcionario: <?php echo $nombre->petNombre." ".$nombre->petApellido ?>" aria-label="Disabled input example" disabled
      readonly>
  </div>
  <div class="Mensaje3">
    <input class="form-control" type="text" value="Identificación: <?php echo $varsession ?>" aria-label="Disabled input example" disabled
      readonly>
  </div>

  <div class="Tabla3">
    <table class="table text-center table-striped table-hover table-sm">
      <tr>
        <th>Id Solicitud</th>
        <th>Tipo solicitud</th>
        <th>Fecha entrada</th>
        <th>Fecha vencimiento</th>
        <th>Motivo Solicitud</th>
        <th>Archivo</th>
        <th>Respuesta</th>
        <th>Archivo</th>
        <th>Enviado por</th>
      </tr>
      <?php
  //vamos agregar cada fila de la tabla de acuerdo al número de pacientes de forma dinamica
  while ($solicitud = $resultado->fetch_object())
  {
	?>
      <tr>
        <td><?php  echo  $solicitud->	idSolicitud ?></td>
        <?php           
          $sol=$solicitud->idSolicitud;
        ?>
        <td><?php  echo  $solicitud->	tcNombre ?></td>
        <td><?php  echo  $solicitud->	sdFechaenvio ?></td>
        <td><?php  echo  $solicitud->	fechaVencimiento ?></td>
        <td>
          
          <?php

            echo "<form name='sdffg' method='POST' action='motivoSolicitudRector.php'>";
            echo "<input type='hidden' name='radicado' value='$sol'>";
            echo "<input class='btn btn-outline-primary' type='submit' value='Ver Solicitud'>";
            echo "</form>";
          ?>
        </td>
        <?php 

        $archivo=$solicitud->sdArchivo;

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

          echo "<form name='sdffg' method='POST' action='respuestaSolicitudRector.php'>";
          echo "<input type='hidden' name='radicado' value='$sol'>";
          echo "<input class='btn btn-outline-primary' type='submit' value='Ver Respuesta'>";
          echo "</form>";
        ?>
      
      </td>
       
        <?php 

        $archivo_respuesta=$solicitud->rsArchivo;

        if($archivo_respuesta!="Sin Archivo"){
        ?>
      <td>
      <?php

        echo "<form name='sdffg' method='POST' action='archivoRespuesta.php'>";
        echo "<input type='hidden' name='id' value='$sol'>";
        echo "<input type='image' name='botondeenvio' src='../imagenes/pdf1.png'  width='40px' height='48px' alt='Enviar formulario'>";
        echo "</form>";
      ?>
        
      </td>


      <?php
      }if($archivo_respuesta=="Sin Archivo"){
      ?>

      <td><center><img src='../imagenes/pdf2.png' width='40px' height='48px'></a></center></td><?php

        }
      ?>     

      <td>
        <?php  echo  $solicitud->	petNombre." ".$solicitud->petApellido ?>
      </td>
      </tr>
      <?php
  }
  ?>
    </table>
  </div>
  <div class="SinResolver">
    <div class="d-grid gap-2 d-md-block">
      <a class="btn btn-danger" href="correspondenciaSinResolverR.php" role="button">Sin resolver</a>
    </div></div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
$x='0';
$x=@$_REQUEST['x'];
if($x==1){

    ?>
  <script>
    swal.fire('Solicitudes que vencen el dia de hoy:','<?php $Conn = new mysqli("localhost","root","","proyecto");
	
	$sql = "SELECT  count(*) as cantidad from solicitud INNER JOIN
   tipo_correspondencia ON solicitud.sdTipoCorrespondencia =
   tipo_Correspondencia.idTipoCorrespondencia WHERE solicitud.sdDestinatario = 1 and DATE_ADD(solicitud.sdFechaenvio, INTERVAL tipo_correspondencia.tcTiempoRespuesta DAY)
      = CURDATE()";
	$result = mysqli_query($Conn,$sql);
	while($row = mysqli_fetch_array($result)) {
		echo $row["cantidad"];
	}?>','info')
  </script>
    <?php
exit;
}
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if($x==5){

    ?>
  <script>
    swal.fire('Excelente!','¡La solicitud ha sido resuelta!','success')
  </script>
    <?php
exit;
}if($x==3){
    ?>
  <script>
   swal.fire('Excelente!','¡La solicitud ha sido resuelta!','success')
      </script>
        <?php
    exit;  
}
if($x==8){
    ?>
  <script>
    swal.fire('Error!','¡El archivo no fue encontrado!','error')
  </script>
    <?php
exit;
}
