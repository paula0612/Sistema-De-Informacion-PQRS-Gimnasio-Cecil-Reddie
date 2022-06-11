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
					
					$sql="UPDATE peticionario set petNombre = '$_REQUEST[petNombre]', 
					petApellido = '$_REQUEST[petApellido]',
					petTipoDocumento = '$_REQUEST[tipoDocumento]', 
					petEstado = '$_REQUEST[petEstado]', 
					petTelefono =$_REQUEST[petTelefono]
					where idPeticionario = '$_REQUEST[idPeticionario]' ";

					$resultado=$objConexion->query($sql);

					$sql1="update usuario set usNombre = '$_REQUEST[usNombre]'
					where usPeticionario = '$_REQUEST[idPeticionario]'";
					$resultado1=$objConexion->query($sql1);

					if ($resultado==true and $resultado1==true){
                        ?>
                        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <?php header("location: listarUsuariosObjetos.php?x=2");?>
                        <?php
                        }else{?>
                            <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
                        <?php header("location: frmActualizarUsuario.php?x=1");}
                    ?>
                </font>
                <br><br>
                    <center><a class="btn btn-light" href="listarUsuariosObjetos.php" role="button">Volver</a>
                </td>

                <td width="35%">
                </td>
            </tr>
            </table>
            </div>
    </body>
</html> 