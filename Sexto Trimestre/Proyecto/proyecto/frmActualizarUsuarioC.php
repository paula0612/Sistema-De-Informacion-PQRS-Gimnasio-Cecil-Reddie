<?php
    require "../modelo/conexionBasesDatos.php";
    require "../modelo/Usuario.php";
    extract ($_REQUEST);
    session_start();
    if($_SESSION['coordinador'] != 1){
        header("location:salir.php");
        die();
    }
    if($_SESSION['documento'] == null || $_SESSION['documento'] == ''){
        header("location:salir.php");
        die();
    }
    $varsession= $_SESSION['documento'];
    $objConexion = Conectarse();
    
    $sql3= "select epNombre, idEstadoPeticionario from estado_peticionario";
    $resultado3 = $objConexion->query($sql3);
    
    $sql2= "select rolNombre, idRol from rol";
    $resultado2 = $objConexion->query($sql2);

    $sql1= "select tdNombre, idTipoDocumento from tipo_documento";
    $resultado1 = $objConexion->query($sql1);

    $sql="SELECT idPeticionario, petNombre, petApellido, petTelefono, usNombre, usClave,rolNombre from 
    peticionario inner join usuario on usPeticionario=idPeticionario 
    inner join rol on idRol=petRol where idPeticionario= '$_REQUEST[peticionario]'";
    $resultadoPeticionario = $objConexion->query($sql);

    $objUsuario= $resultadoPeticionario->fetch_object();
?>
<!DOCTYPE html>
<html>
    <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Actualizar usuario </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <link rel="stylesheet" href="estilos/estilo.css">
    </head>

    <body>
        <div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

        <br><br><br><br><br><br><br>

        <div class="Atras">
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-warning" href="listarUsuariosObjetosC.php" role="button">Atrás</a>
            </div>
        </div>

       <center>
        <table border="4" style="width: 50%";>  <td>
        </center>
        <div>
            <form method="post" action="validarActualizarUsuarioC.php"><br>
                <font face='' color="#1C2833 ">
                    <center>
                    
                    <h1> Actualizar Usuario </h1>
                        <table>
                            <tr>
                                <td height="50">Nombre(s)</td>
                                <td width="20px"></td>
                                <td><label for="petNombre"></label>
                                    <input class="form-control" name="petNombre" type="text" id="petNombre" 
                                    value=" <?php echo $objUsuario->petNombre?>"
                                        aria-label="default input example"></td>
                            </tr>

                            <tr>
                                <td height="50">Apellido(s) </td>
                                <td width="20px"></td>
                                <td><label for="petApellido"></label>
                                    <input class="form-control" name="petApellido" type="text" id="petApellido" 
                                    value=" <?php echo $objUsuario->petApellido?>"
                                        aria-label="default input example"></td>
                            </tr>

                            <tr>
                            <td height="50">Tipo de documento</td>
                                <td width="20px"></td>
                                <td>
                                <select class="form-select" name="tipoDocumento" id="tipoDocumento" style="width:270px" required> 
                                    <?php
                                        while ($tipoDocumento = $resultado1->fetch_object())
                                        {
                                            if($tipoDocumento->idTipoDocumento==$objUsuario->petTipoDocumento)
                                            {
                                                ?>
                                                <option value="<?php echo $tipoDocumento->idTipoDocumento?>" selected="selected">
                                                <?php echo $tipoDocumento->tdNombre?></option>  
                                                <?php  
                                            }                                    
                                            ?>
                                            <option value="<?php echo $tipoDocumento->idTipoDocumento?>">
                                            <?php echo $tipoDocumento->tdNombre?></option>  
                                            <?php
                                        }		  
                                    ?>
                                </select>
                                </td>
                            </tr>
                            
                            <tr>
                                <td height="30">N° Documento</td>
                                <td width="10px"></td>
                                <td><label for="idPeticionario"></label>
                                    <input class="form-control" name="idPeticionario" type="numb" id="idPeticionario" 
                                    value=" <?php echo $objUsuario->idPeticionario?>" readonly
                                        aria-label="default input example"></td>
                            </tr>
                           
                            <tr height="10"></tr>
                            <tr>
                                <td height="50">Correo</td>
                                <td width="20px"></td>
                                <td>
                                    <div class="input-group mb-3">
                                        <label for="usNombre"></label>
                                        <input class="form-control" name="usNombre" type="text" id="usNombre" 
                                        value=" <?php echo $objUsuario->usNombre?>"
                                            aria-label="Recipient's username" aria-describedby="basic-addon2">
                                    </div>
                                </td>
                            </tr>

                          <!--  <tr>
                                <td height="50">Contraseña </td>
                                <td width="20px"></td>
                                <td>
                                    <div>
                                        <div>
                                            <label for="usClave"></label>
                                            <input name="usClave" type="text" class="form-control" id="usClave" placeholder="Ingrese nueva clave" >
                                        </div>
                                    </div>
                                </td>
                            </tr>-->

                            <tr>
                                <td height="50">Telefono </td>
                                <td width="20px"></td>
                                <td><label for="petTelefono"></label>
                                    <input class="form-control" name="petTelefono" type="text" id="petTelefono" 
                                    value=" <?php echo $objUsuario->petTelefono?>"
                                        aria-label="default input example"></td>
                            </tr>
                            
                           <tr>
                                <td height="50">Tipo Perfil</td>
                                <td width="20px"></td>
                                <td><label for="petRol"></label>
                                    <input class="form-control" name="petRol" type="petRol" id="idRol" 
                                    value=" <?php echo $objUsuario->rolNombre?>" readonly
                                        aria-label="default input example"></td>
                            </tr>                         

                            <tr>
                                <td height="50">Estado</td>
                                <td width="20px"></td>
                                <td>
                                    <select class="form-select" name="petEstado" id="petEstado" style="width:270px" required> 
                                            <?php
                                                while ($estado = $resultado3->fetch_object())
                                                {
                                                    if($estado->idEstadoPeticionario==$objUsuario->petEstado)
                                                    {
                                                        ?>
                                                        <option value="<?php echo $estado->idEstadoPeticionario?>"selected>
                                                        <?php echo $estado->epNombre?></option>  
                                                        <?php  
                                                    }                                    
                                                    ?>
                                                    <option value="<?php echo $estado->idEstadoPeticionario?>">
                                                    <?php echo $estado->epNombre?></option>  
                                                    <?php
                                                }		  
                                            ?>
                                    </select>
                                </td>                    
                            </tr>
                            </table>
                        <br>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                                            
                   
                </font>
                <br><br>
            </form>
          
            </table><br>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ"
            crossorigin="anonymous"></script>
    </body>
</html>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<?php

if(@$_REQUEST['x']==1){

?>
<script>
swal.fire('El usuario no fue actualizado!','¡Intente nuevamente!','error')
</script>
<?php
exit;}