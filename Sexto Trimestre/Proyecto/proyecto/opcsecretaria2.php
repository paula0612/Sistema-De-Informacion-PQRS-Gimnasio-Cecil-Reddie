<?php include("../modelo/conexionBasesDatos.php");?>
<?php
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estilos/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <title>GIMNASIO CECIL REDDIE </title>
</head>

<body>

<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

    <div class="Cerrar">
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a class="btn btn-danger"  href="salir.php" role="button">Cerrar sesión</a>
        </div>
    </div>
    <div class="ConsultarS">
        <h2>Consultar correspondencia</h2>
        <a href="alertafinalS.php"> <img src="../imagenes/consultarcorrespondencia.png" width="90px"
                height="90px"></a>
    </div>
    <div class="Remitir">
        <h2>Remitir solicitud</h2>
        <a href="remitirSolicitud.php"> <img src="../imagenes/reenviar.png" width="90px" height="90px"></a>
    </div>
  <!--  <div class="Alertas">
        <h2>Ajustar alertas de vencimiento</h2>
        <a href="ajustedealertas.php"><img src="../imagenes/alarma.png" width="90px" height="90px"></a>
    </div>-->

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
if($_REQUEST['x']==1){

    ?>
  <script>
    swal.fire('Excelente!','¡Bienvenido!','success')
  </script>
    <?php
exit;}?>