<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento PDF</title>
    <link rel="stylesheet" href="../estilos/estilo2.css">
</head>
    <body>
    <div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>
    <br><br><br><br><br><br><br>
    <?php
        require "../modelo/conexionBasesDatos.php";
        $objConexion=Conectarse();
        $sql="Select rsArchivo from respuesta_solicitud where rsSolicitud=".$_POST['id'];
        $resultado = $objConexion->query($sql);
        $archivo = $resultado->fetch_object();
       ?>
       <center>
      <iframe src="../archivos/<?php echo $archivo->rsArchivo; ?>">  </iframe></center>
                   
    </body>
</html>
