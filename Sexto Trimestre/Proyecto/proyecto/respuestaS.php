<?php
    session_start();
    if ($_SESSION['secretaria']!=1){
      header("Location:salir.php");
      die();
    }
?>
<?php
require "../modelo/conexionBasesDatos.php";

require "../modelo/Solicitud.php";
//header("location:index.php?x=2");	
	
extract ($_REQUEST);
if (!isset($_REQUEST['x']))
	$_REQUEST['x']=0;

$objConexion=Conectarse();
$radicado=$_REQUEST['radicado'];

    $objSolicitud = new Solicitud();

    $resultado=$objSolicitud->consultarSolicitudYRemitente($radicado);

    $solicitud = $resultado->fetch_object();


?> 
<!DOCTYPE html>
<html>

<head>
    <title> GIMNASIO CECIL REDDIE</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="../estilos/estilo.css">
</head>

<body>
 
<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

   <br><br><br><br><br><br><br><br><br>
   <form id="form1" name="form1" method="post" action="validarRespuestaSolicitudS.php?radicado=<?php echo $solicitud->idSolicitud?>" 
    enctype="multipart/form-data">
    <center>
        <table border="4" style="width: 50%;";>
           <td>

            <center> <h1> Respuesta Solicitud </h1>
            <input id="remitente" name="remitente" type="hidden"
             value="<?php echo $solicitud->idPeticionario?>">

            <p>Usted dara respuesta a la solicitud con N° Radicado:</p>
            <?php  echo  $solicitud->idSolicitud?> 

            <p> Respuesta solicitud:</p>
            <p><textarea class="form-control"required="required" placeholder="Respuesta solicitud N°<?php  echo  $solicitud->idSolicitud?> " id="floatingTextarea" 
            style="width: 30%;" name="motivo"></textarea></p>

           <p>  <input type="file" id="archivo" name="archivo" accept="application/pdf"></p>



             <p> <button type="submit" class="btn btn-primary">enviar</button><br><br></center></p>

            </td>
         </table><br>
         </center>
         </form>
</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if(@$_REQUEST['x']==2){

    ?>
  <script>
 swal.fire('¡Error al responder solicitud!','intente nuevamente','error')
   </script>
    <?php
exit;
}if(@$_REQUEST['x']==4){
    ?>
  <script>
 swal.fire('¡Error al responder solicitud!','intente nuevamente','error')
       </script>
        <?php
    exit;  
}