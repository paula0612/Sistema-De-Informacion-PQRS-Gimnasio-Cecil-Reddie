<?php
require "../modelo/conexionBasesDatos.php";
require "../modelo/UsuarioExterno.php";
//header("location:index.php?x=2");	
	
extract ($_REQUEST);
session_start();
if($_SESSION['externo'] != 1){
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

$objUsExterno = new UsuarioExterno();

$sql="SELECT idSolicitud,sdMotivo,sdAsunto FROM solicitud WHERE idSolicitud='$_REQUEST[radicado]'";
$resultado=$objConexion->query($sql);
            
            $UsExterno=$resultado->fetch_object();
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

  <td><?php  echo  $UsExterno->idSolicitud?> </td>
       
  <td><?php  echo  $UsExterno->sdMotivo  ?> </td>-->

  <br><br><br><br><br><br><br><br><br>
   <div>
       <center>
       <table border="1" width="80%">
           <tr>
               <td><b><font size=5>Solicitud No. Radicado: <?php  echo  $UsExterno->idSolicitud?><br></font></b></td>
           </tr>
           <tr>
               <td><font size=4><b>De:</b><?php echo " ".$nombre->petNombre." ".$nombre->petApellido ?></font></td>
           </tr>  
                   <br><br>
           <!--<tr>
               <td><font size=4>Para: Secretaria Académica</font></td>
           </tr>  -->
           <tr>
           
               <td><font size=4><b>Asunto:</b><?php  echo  " ".$UsExterno->sdAsunto  ?> <br><br></font></td>
           </tr>  
           <tr>
               <td><font size=4><b>Motivo: </b><br> <?php  echo  " ".$UsExterno->sdMotivo  ?></font></td>
           </tr>        
       </table>     
       <br><br>
       <a class="btn btn-warning"  href="consultarCorrespondenciaEx.php" role="button">Atrás</a>
       <!--<a class="btn btn-primary" type="file" role="button">Imprimir</a>-->
       
       </center>           
           
   </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
    crossorigin="anonymous"></script>
</body>

</html>