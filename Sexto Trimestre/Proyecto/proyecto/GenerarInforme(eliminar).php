<?php
    session_start();
    if ($_SESSION["rector"]!='1')
{
header("Location:salir.php");
die();
}
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio Cecil Reddie</title>
    <link rel="StyleSheet" type="Text/Css" href="../estilos/Estilo4.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>

<body>
<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

    <main>
        <div class="TituloInforme">
            <h3>Generar informe</h3>
        </div>
        <div class="Cerrar">
            <a class="btn btn-danger" href="salir.php" role="button">Cerrar sesión</a>
        </div>
        <div class="Fecha1">
            <p>Fecha Inicio</p>
        </div>
        <div class="Date1">
            <input type="date">
        </div>
        <div class="Fecha2">
            <p>Fecha Final</p>
        </div>
        <div class="Date2">
            <input type="date">
        </div>
        <form class="Informe" method="POST" action="">
            <div class="Mensaje1">
                <p>Informe</p>
            </div>
            <div class="Mensaje2">
                <p>Se ha generado un informe desde el 00/00/0000 hasta el 00/00/0000</p>
            </div>
            <div class="Mensaje3">
                <p>Se han realizado N°... solicitudes en las fechas indicadas</p>
            </div>
            <input class="Estadisticas" type="text" value="Generar Estadisticas" readonly>
            <div class="Torta">
                <img src="../imagenes/Torta.png" width="100" height="140">
            </div>
            <div class="Barras">
                <img src="../imagenes/Barras.png" width="100" height="140">
            </div>
            <div class="Mensaje4">
                <p>Bogota D.C. 00/00/0000 - 00:00 pm/am Colombia</p>
            </div>
        </form>
        <div class="Atras">
            <a class="btn btn-warning" href="opcadmin1.php" role="button">Atrás</a>
        </div>
    </main>
</body>

</html>