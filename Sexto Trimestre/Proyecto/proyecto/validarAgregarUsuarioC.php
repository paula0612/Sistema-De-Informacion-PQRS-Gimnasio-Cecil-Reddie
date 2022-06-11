<!DOCTYPE html>
<html>
    <head>
        <title> Menú </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos/estilo.css">
    </head>

    <body>
        <div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

        <br><br><br><br><br><br><br><br>

        <div class="Tabla2">
            <table  width="100%">
            <tr>
                <td  width="35%">
                </td>

                <td>
                <td height="200px" align="center" style="background-color: #9AFE2E  ;"><font size= 4>
                <?php
                    require "../modelo/conexionBasesDatos.php";
                    require "../modelo/Usuario.php";

                    extract ($_REQUEST);

                    $objUsuario = new Usuario();


                    $objUsuario->CrearUsuario($_REQUEST['nombre'] , $_REQUEST['apellido'],$_REQUEST['rol'],
                    $_REQUEST['tipoDocumento'], $_REQUEST['documento'] , md5($_REQUEST['clave']),
                    $_REQUEST['correo'], $_REQUEST['telefono'],'1');

                    $resultado1 = $objUsuario->agregarUsuario();
                    $resultado2 = $objUsuario->agregarU(); 
                    
                    if($resultado1 ){?>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <?php header("location: listarUsuariosObjetosC.php?x=1");?><?php
                     } else{?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <?php header("location: frmCrearUsuarioC.php?x=2");}
                ?>
                </font>
                <br><br>
                    <center><a class="btn btn-light" href="listarUsuariosObjetosC.php" role="button">Volver</a>
                </td>

                <td width="35%">
                </td>
            </tr>
            </table>
            </div>
    </body>
</html> 