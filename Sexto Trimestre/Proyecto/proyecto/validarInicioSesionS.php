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
extract ($_REQUEST);
session_start();
$usuario=$_POST['documento'];
$_SESSION['documento'] = $usuario;
$pass=md5($_REQUEST['clave']);

$objConexion=Conectarse();

$sql="SELECT usClave, usPeticionario, petRol  from usuario inner join
peticionario on idPeticionario = usPeticionario where usPeticionario='$usuario' and 
petRol='2' and usClave='$pass'";

$resultado=$objConexion->query($sql);

$existe = $resultado->num_rows;
if ($existe==1)  
{
	$usuario=$resultado->fetch_object();
	
	$_SESSION['user']= $usuario->usPeticionario ;
	$_SESSION['secretaria']="1";	
	?>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: opcsecretaria2.php?x=1");?>
    <?php
exit;		
}
else
{
	?>
  
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php header("location: loginS.php?x=2");?>
    
        <?php
    exit;  
}
?>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous">
	</script>
</body>
</html>
