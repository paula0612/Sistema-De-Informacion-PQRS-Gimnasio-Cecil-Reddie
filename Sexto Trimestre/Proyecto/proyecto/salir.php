<?php
session_start();
$_SESSION["rector"]='0';
$_SESSION["secretaria"]='0';
$_SESSION["coordinador"]='0';
$_SESSION["estudiante"]='0';
$_SESSION["externo"]='0';
header ("Location:../controlador/index.php")

?>