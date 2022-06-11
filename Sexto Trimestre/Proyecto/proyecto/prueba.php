<?php
session_start();
$general=$_SESSION["general"];
if ($general!="1")
{
header("Location:salir.php");
}
echo "algo";
?>