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
    <table class="table table-striped table-hover table-sm">
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
        <td><?php echo $estudiante->sdAsunto ?></td>
        <td><?php echo $estudiante->tcNombre ?></td>
        <td><?php echo $estudiante->sdFechaenvio ?></td>
        <td><?php echo $estudiante->sdHoraenvio ?></td>
      <!--  <td><?php echo $estudiante->sdMotivo ?></td>-->
      <td><a class="btn btn-outline-primary"  href="motivoSolicitudEstu.php?radicado=<?php echo $estudiante->idSolicitud?>" role="button">Ver Solicitud</a></td>
      <td><a class="btn btn-outline-primary"  role="button">Sin Archivo</a></td>

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