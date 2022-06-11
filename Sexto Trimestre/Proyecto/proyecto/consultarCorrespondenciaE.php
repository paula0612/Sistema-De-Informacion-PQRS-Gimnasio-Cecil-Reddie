<?php
require "../modelo/conexionBasesDatos.php";
require "../modelo/Estudiante.php";

extract ($_REQUEST);
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

$objConexion=Conectarse();
$sql= "select 	petNombre, petApellido from peticionario where idPeticionario=$varsession";

$resultadoNombre = $objConexion->query($sql);
$objEstudiante = new Estudiante();

$resultado=$objEstudiante->consultarSolicitud($varsession);
$nombre = $resultadoNombre->fetch_object();
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title> Menú </title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilos/estilo.css">
</head>

<body>

<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

  <div class="Atras">
    <div class="d-grid gap-2 d-md-block">
      <a class="btn btn-warning" href="opcestudiante4.php" role="button">Atrás</a>
    </div>
  </div>
  <div class="Cerrar">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a class="btn btn-danger" href="salir.php" role="button">Cerrar sesión</a>
    </div>
  </div>
  <div class="Mensaje1">
    <input class="form-control" type="text" value="Solicitudes " aria-label="Disabled input example" disabled readonly>
  </div>
  <div class="Mensaje2">
    <input class="form-control" type="text" value="Estudiante : <?php echo $nombre->petNombre." ".$nombre->petApellido ?>" aria-label="Disabled input example" disabled
      readonly>
  </div>
  <div class="Mensaje3">
    <input class="form-control" type="text" value="Identificación: <?php echo $varsession ?>" aria-label="Disabled input example" disabled
      readonly>
  </div>
  <div class="Filtro2">
  <a class="btn btn-outline-secondary" href="correspondenciaResueltaE.php" role="button">Resueltas</a>
  </div>

  <div class="Tabla3">
    <table class="table text-center table-striped table-hover table-sm">
      <tr>
        <th>N° radicado</th>
        <th>Asunto</th>
        <th>Tipo Solicitud</th>
        <th>Fecha Solicitud</th>
        <th>Hora Solicitud</th>
        <th>Motivo Solicitud</th>
        <th>Archivo</th>
      </tr>

      <?php
       while ($estudiante = $resultado->fetch_object())
       {
      ?>
      <tr>
        <td><?php echo $estudiante->idSolicitud?></td>
        <?php           
          $sol=$estudiante->idSolicitud;
        ?>
        <td><?php echo $estudiante->sdAsunto ?></td>
        <td><?php echo $estudiante->tcNombre ?></td>
        <td><?php echo $estudiante->sdFechaenvio ?></td>
        <td><?php echo $estudiante->sdHoraenvio ?></td>

      <td>
      <?php
          echo "<form name='sdffg' method='POST' action='motivoSolicitudEstu.php'>";
          echo "<input type='hidden' name='radicado' value='$sol'>";
          echo "<input class='btn btn-outline-primary' type='submit' value='Ver Solicitud'>";
          echo "</form>";
        ?>

      </td>
          

        <?php 
$archivo=$estudiante->sdArchivo;
     

if($archivo!="Sin Archivo") 
{

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
}
if($archivo=="Sin Archivo") 
{?>
 <!--ECHO "<td>SIN ARCHIVO</td>";-->
 <td><center><img src='../imagenes/pdf2.png' width='40px' height='48px'></a></center></td><?php
}
?>
      </tr>
      <?php
       }
      ?>

    </table>
    
  </div>
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
/*if($_REQUEST['x']<=0){
  echo("");
}*/
$x='0';
$x=@$_REQUEST['x'];
if($x==1){

    ?>
  <script>
    swal.fire('Excelente!','¡La solicitud ha sido enviada!','success')
  </script>
    <?php
exit;
}if($x==2){
    ?>
  <script>
    swal.fire('¡Error al registrar solicitud!','intente nuevamente','error')
      </script>
        <?php
    exit;  
}if($x==3){

  ?>
<script>
  swal.fire('Excelente!','¡La solicitud ha sido enviada!','success')
</script>
  <?php
exit;
}if($x==4){
  ?>
<script>
  swal.fire('¡Error al registrar solicitud!','intente nuevamente','error')
    </script>
      <?php
  exit;  
}if($x==8){
  ?>
<script>
  swal.fire('Error!','¡El archivo no fue encontrado!','error')
    </script>
      <?php
  exit;  
}
?>
