<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<div id="divEncabezado"> <?php include "encabezado.php";?></div>
<main>
        <div class="Titulo1">
            <h1><span class="badge rounded-pill bg-primary">‘Bienvenidos al Sistema de PQRS de la Institución
                    Educativa’</span></h1>
        </div>
        <div class="Titulo2">
            <h2>Elija su tipo de usuario</h2>
        </div>

            <div class="Rector">
                <h2>Rector</h2>
                <a href="proyecto/controlador/loginR.php">
                    <img src="proyecto/imagenes/admin.png" width="80px" height="80px"></a>
            </div>
            <div class="Secretaria">
                <h2>Secretaria </h2>
                <a href="proyecto/controlador/loginS.php">
                    <img src="proyecto/imagenes/secretaria.png" width="80px" height="80px"></a>
            </div>
            <div class="Coordinador">
                <h2>Coordinador </h2>
                <a href="proyecto/controlador/loginC.php">
                    <img src="proyecto/imagenes/coordi.png" width="80px" height="80px"></a>
            </div>
            <div class="Estudiante">
                <h2>Estudiante</h2>
                <a href="proyecto/controlador/loginE.php">
                    <img src="proyecto/imagenes/estu.png" width="80px" height="80px"></a>
            </div>
            <div class="Externo">
                <h2> Externo </h2>
                <a href="proyecto/controlador/loginEx.php">
                    <img src="proyecto/imagenes/externo.png" width="80px" height="80px"></a>
            </div>

</body>
</html>