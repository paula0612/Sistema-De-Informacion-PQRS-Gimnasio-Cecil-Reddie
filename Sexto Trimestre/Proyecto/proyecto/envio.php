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
require "../modelo/Estudiante.php";

$destinatario=$_POST['solicitud'];
$radicado=$_GET['radicado'];

$objConexion=Conectarse();

$sql="update solicitud set 	sdDestinatario=$destinatario
 where 	idSolicitud = $radicado  ";

$resultado=$objConexion->query($sql);

if ($resultado){
    ?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: remitirSolicitud.php?x=1");?>
    <?php
}else{?>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php header("location: enviarDestin.php?x=2");}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>
</html>