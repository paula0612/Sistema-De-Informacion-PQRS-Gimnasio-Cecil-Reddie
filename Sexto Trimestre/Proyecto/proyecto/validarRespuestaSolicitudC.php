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
    
<?php
require "../modelo/conexionBasesDatos.php";
require "../modelo/RespuestaSolicitud.php";

session_start();
if($_SESSION['coordinador'] != 1){
        header("location:index.php");
        die();
    }
    if($_SESSION['documento'] == null || $_SESSION['documento'] == ''){
        header("location:index.php");
        die();
    }
    $varsession= $_SESSION['documento'];

    $objConectarse=Conectarse();
    $sql="SELECT idUsuario FROM usuario WHERE usPeticionario=$varsession";
$resultado2=$objConectarse->query($sql);


$objRespuesta = new RespuestaSolicitud;

$archivo = $_FILES['archivo']['name'];
$ruta = $_FILES['archivo']['tmp_name'];
$destino = "../archivos/" . $archivo;
if ($archivo!= "") {
if (copy($ruta, $destino)) {
date_default_timezone_set('America/Bogota');
    echo $hora =date("H").":".date("i").":".date("s");
    echo $fecha = date("Y") . "-" . date("m") . "-" . date("d");
extract ($_REQUEST);

$objRespuesta->crearRespuestaSolicitud('Respuesta Solicitud',$_REQUEST['motivo'],
$archivo,$_REQUEST['remitente'], $_REQUEST['radicado'],$fecha,$hora );

$resultado = $objRespuesta->enviarRespuestaSolicitud();
$resultado2 = $objRespuesta->cambiarEstado($_REQUEST['radicado']);

if ($resultado==true and $resultado2==true){
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: consultarCorrespondenciaC.php?x=5");?>

    <?php
exit;

}else{
    ?>
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: respuestaC.php?x=2");?>
        <?php
    exit;
}}}else{
    $objRespuesta = new RespuestaSolicitud;

date_default_timezone_set('America/Bogota');
echo $hora =date("H").":".date("i").":".date("s");
echo $fecha = date("Y") . "-" . date("m") . "-" . date("d");
extract ($_REQUEST);

$objRespuesta->crearRespuestaSolicitud('Respuesta Solicitud',$_REQUEST['motivo'],
'Sin Archivo',$_REQUEST['remitente'], $_REQUEST['radicado'],$fecha,$hora );

$resultado = $objRespuesta->enviarRespuestaSolicitud();
$resultado2 = $objRespuesta->cambiarEstado($_REQUEST['radicado']);

}if ($resultado==true and $resultado2==true){
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php header("location: consultarCorrespondenciaC.php?x=3");?>
    
        <?php
    exit;
    
    }else{
        ?>
       <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <?php header("location: respuestaC.php?x=4");?>
            <?php
        exit;

}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>
</html>