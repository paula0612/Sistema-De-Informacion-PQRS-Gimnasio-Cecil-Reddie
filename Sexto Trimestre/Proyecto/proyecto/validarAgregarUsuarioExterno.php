<?php
//Se reciben los datos del formulario
require "../modelo/conexionBasesDatos.php";
require "../modelo/UsuarioExterno.php";
extract ($_REQUEST);
echo $nub=$_POST['nombre'];
echo $nub=$_POST['apellido'];
echo $nub=$_POST['tipoDocumento'];
echo $nub=$_POST['documento'];
echo $nub=$_POST['clave'];
echo $nub=$_POST['correo'];
echo $nub=$_POST['telefono'];
//Forma utilizando la Clase Empleado

$objUsuarioExterno = new UsuarioExterno();

$objUsuarioExterno->CrearUsuarioExterno($_REQUEST['nombre'] , $_REQUEST['apellido'],'5',
 $_REQUEST['tipoDocumento'], $_REQUEST['documento'] , md5($_REQUEST['clave']),
 $_REQUEST['correo'],
 $_REQUEST['telefono'],'1');

$resultado1 = $objUsuarioExterno->agregarUsuarioExterno();
$resultado2 = $objUsuarioExterno->agregarUsuario();
if ($resultado1==true and $resultado2==true )
	header("location: loginEx.php?x=1");  
else
	header("location: frmCrearUsuarioPE.php?x=2");

?>