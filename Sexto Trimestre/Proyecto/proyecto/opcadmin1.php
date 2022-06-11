<?php include("../modelo/conexionBasesDatos.php");?>
<?php
    session_start();
    if($_SESSION['documento'] == null || $_SESSION['documento'] == ''){
        header("location:salir.php");
        die();
    }
    if($_SESSION['rector'] == null || $_SESSION['rector'] == '' ||  $_SESSION['rector'] != 1){
        header("location:salir.php");
        die();
    }
    $varsession= $_SESSION['documento'];
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
  <link rel="stylesheet" href="../estilos/estilo.css">
  <title>GIMNASIO CECIL REDDIE </title>
</head>

<body>

<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

  <div class="Cerrar">
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
      <a class="btn btn-danger" href="salir.php" role="button">Cerrar sesión</a>
    </div>
  </div>
  <div class="Gestionar2">
    <h2>Gestionar usuarios</h2>
    <a href="listarUsuariosObjetos.php"> <img src="../imagenes/gestionarusuario1.png" width="90px" height="90px"></a>
  </div>
  <div class="Informe">
    <h2>Generar informes</h2>
    <a href="GenerarInforme.php"> <img src="../imagenes/informe.png" width="90px" height="90px"></a>
  </div>
  <div class="consultarR">
    <h2>Consultar correspondencia</h2>
    <a href="alertafinalR.php"><img src="../imagenes/consultarcorrespondencia.png" width="90px"
        height="90px"></a>
  </div>

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
if(@$_REQUEST['x']==1){

    ?>
  <script>
    swal.fire('Excelente!','¡Bienvenido!','success')
  </script>
    <?php
exit;}?>