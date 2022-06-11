<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

<!--<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>-->
    <script src="jquery-3.6.0.min.js"></script>
    <script src="sweetalert2.all.min.js"></script>

<?php
require "../modelo/conexionBasesDatos.php";
require "../modelo/Estudiante.php";
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

$objConectarse=Conectarse();
$sql="SELECT idUsuario FROM usuario WHERE usPeticionario=$varsession";
$resultado2=$objConectarse->query($sql);


$objEstudiante = new estudiante();
$archivo = $_FILES['archivo']['name'];
$ruta = $_FILES['archivo']['tmp_name'];
$destino = "../archivos/" . $archivo;
if ($archivo!= "") {
if (copy($ruta, $destino)) {
    date_default_timezone_set('America/Bogota');
    echo $hora =date("H").":".date("i").":".date("s");
    echo $fecha = date("Y") . "-" . date("m") . "-" . date("d");
extract ($_REQUEST);

$objEstudiante->crearSolicitud($_REQUEST['asunto'],$_REQUEST['correspondencia'],
$_REQUEST['motivo'],$archivo,'2',  $varsession, $fecha, $hora);

$resultado=$objEstudiante->enviarSolicitud();

if($resultado){

    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: consultarCorrespondenciaE.php?x=1");?>

    <?php
exit;
}else{
    ?>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: consultarCorrespondenciaE.php?x=2");?>
        <?php
    exit;  

}
}}else{
    $objEstudiante = new estudiante();
date_default_timezone_set('America/Bogota');
echo $hora =date("H").":".date("i").":".date("s");
echo $fecha = date("Y") . "-" . date("m") . "-" . date("d");
extract ($_REQUEST);

$objEstudiante->crearSolicitud($_REQUEST['asunto'],$_REQUEST['correspondencia'],
$_REQUEST['motivo'],'Sin Archivo','2',  $varsession, $fecha, $hora);
$resultado=$objEstudiante->enviarSolicitud();

if($resultado){
    ?>
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: consultarCorrespondenciaE.php?x=3");?>
    <?php

exit;
}else{
    ?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: consultarCorrespondenciaE.php?x=4");?>
        <?php
    exit;  
}

}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous">
	</script>
</body>
</html>