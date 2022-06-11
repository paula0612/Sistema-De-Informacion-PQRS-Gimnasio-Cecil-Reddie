<?php
require "../modelo/conexionBasesDatos.php";

session_start();

if ($_SESSION["rector"]!='1')
{
  header("Location:salir.php");
  die();
}
if($_SESSION['documento'] == null || $_SESSION['documento'] == ''){
    header("location:salir.php");
    die();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="StyleSheet" type="Text/Css" href="../estilos/Estilo4.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>

<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

<br><br><br><br><br><br><br><br>
    <center><form method="POST" action="GenerarInforme2.php">
    <div class="TituloInforme">
            <h3>Generar informe</h3>
        </div>
    <div class="Cerrar">
            <a class="btn btn-danger" href="salir.php" role="button">Cerrar sesión</a>
        </div>
        <div class="Atras">
            <a class="btn btn-warning" href="opcadmin1.php" role="button">Atrás</a>
        </div>
        <div class="Fecha1">
            <p>Fecha Inicio: </p>
        </div>
        <div class="Date1">
        <input type="date" name="fecha_inicial" class="form-control">
        </div>
        <div class="Fecha2">
            <p>Fecha Final: </p>
        </div>
        <div class="Date2">
        <input type="date" name="fecha_final" class="form-control" >
        </div>

        
      <br><br><br><br><br><br>
      <div class="boton">
        <p><input type="submit" name="boton" value="Buscar" class="btn btn-outline-success"></p>
        </div>
    </form></center>

</body>
</html>