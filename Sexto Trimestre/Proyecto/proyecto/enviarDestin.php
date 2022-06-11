<?php
require "../modelo/conexionBasesDatos.php";
require "../modelo/Estudiante.php";
//header("location:index.php?x=2");	
	
extract ($_REQUEST);
if (!isset($_REQUEST['x']))
	$_REQUEST['x']=0;

$objConexion=Conectarse();
$objEstudiante = new Estudiante();

$resultado=$objEstudiante->consultarSolicitudS();

$sql="SELECT * FROM rol ORDER BY idRol ASC LIMIT 3";
$resultado2 = $objConexion->query($sql);

$sql="SELECT idSolicitud,sdMotivo,sdAsunto FROM solicitud WHERE idSolicitud='$_REQUEST[radicado]'";
$resultado=$objConexion->query($sql);
            
            $estudiante=$resultado->fetch_object();

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
<div class="Atras">
    <div class="d-grid gap-2 d-md-block">
      <a class="btn btn-warning" href="remitirSolicitud.php" role="button">Atrás</a>
    </div>
  </div>

   <br><br><br><br><br><br><br><br>
   <form id="form1" name="form1" method="post" action="envio.php?radicado=<?php echo $estudiante->idSolicitud?>" enctype="multipart/form-data">
    <center>
        <table border="4" style="width: 50%;";>
           <td>
<br>
            <center> <h1> Remitir Solicitud </h1>

            <p>Usted reenviara la solicitud con N° Radicado:</p>
            <?php  echo  $estudiante->idSolicitud?> 

            <p> Seleccione funcionario encargado:</p>
            <p><select class="form-select" aria-label="solicitud" style="width: 23%;" name="solicitud" required>
            <p><option selected>Seleccione</option></p>
            <?php
            while ($rol=$resultado2->fetch_object()) {
            ?>
            <option value="<?php echo $rol->idRol?>">
            <?php echo $rol->rolNombre?></option>
            <?php 
            }
            ?></select>

             <p> <button type="submit" class="btn btn-primary">enviar</button><br><br></center></p>

            </td>
         </table><br>
         </center>
         </form>
         

</body>

</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php
if(@$_REQUEST['x']==1){

?>
<script>
swal.fire('La solicitud no fue remitida!','¡Intente nuevamente!','error')
</script>
<?php
exit;}
