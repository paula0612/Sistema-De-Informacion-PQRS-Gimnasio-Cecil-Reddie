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

                    extract ($_REQUEST);

                    $objConexion=Conectarse();
    
                    $sql="UPDATE peticionario  set petEstado = '2'
                
                    where idPeticionario = '$_REQUEST[peticionario]'";

                    $resultado=$objConexion->query($sql);

                    if($resultado==true){?>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <?php header("location: listarUsuariosObjetosC.php?x=3");
                }
                    
                else{?>
                    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                    <?php header("location: listarUsuariosObjetosC.php?x=4");
                }
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