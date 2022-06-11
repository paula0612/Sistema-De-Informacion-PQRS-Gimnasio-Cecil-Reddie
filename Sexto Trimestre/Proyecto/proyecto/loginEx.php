<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gimnasio Cecil Reddie</title>
    <link rel="StyleSheet" type="Text/Css" href="../estilos/Estilo3.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>
<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>
    <main>
        <h3>Inicio de Sesion</h3>
        <form method="post" action="validarInicioSesionEx.php">  
            <div class="formulario">    
                <div class="subtitulo"> 
                    <h2>Iniciar Sesión</h2> 
                </div>
            </div>

                <div class="Persona1">                
                    <img src="../imagenes/Persona.png" width= "30" height="30">
                </div>
                <div class="Contraseña">                
                    <img src="../imagenes/Contraseña.png" width= "30" height="30">
                </div>
                <div class="email">
                    <input type="number" name="documento" placeholder="Ingrese su documento" required/>
                </div>
                <div class="password">
                    <input type="password" name="clave" placeholder="Ingrese su password" required/>
                </div>
                <div class="Ingresar">
                    <a class="btn btn-primary"  href="frmCrearUsuarioPE.php" role="button" value="Ingresar">Registrar</a>
                    <input class="btn btn-primary" type="submit" role="button" value="Ingresar"></a>
                    <script src="jquery-3.6.0.min.js"></script>
                <script src="sweetalert2.all.min.js"></script>
                <script src="enviarSolicitudE.php?btn"></script>

                    
                </div> 
        </form>   
    </main>

</body>
</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
if($_REQUEST['x']==1){

    ?>
  <script>
    swal.fire('Excelente!','¡El registro fue correcto!','success')
  </script>
    <?php
exit;}
if($_REQUEST['x']==2){

    ?>
  <script>
    swal.fire('¡Error al iniciar sesion!','intente nuevamente','error')
  </script>
    <?php
exit;}?>