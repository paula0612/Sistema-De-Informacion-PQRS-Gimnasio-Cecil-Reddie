<?php  //abrimos php

require "../modelo/conexionBasesDatos.php";

$objConexion = Conectarse();

$sql= "select idTipoDocumento, tdNombre from tipo_documento";

$resultado = $objConexion->query($sql);

//cerramos php ?> 
<!DOCTYPE html>
<html>

<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> Crear usuario </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="estilos/estilo.css">
</head>

<body>
<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

    <br><br><br><br><br><br><br>
    <div class="Atras">
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-warning" href="loginEx.php" role="button">Atrás</a>
            </div>
        </div>

        <center>
        <table border="4" class="table-responsive" style="width: 50%;";>
        
        <td>
        <center>
            <h1> Crear Usuario </h1>
        </center></center>
        <form method="post" action="validarAgregarUsuarioExterno.php"><br>
            <font face='' color="#1C2833 ">
                <center>
                    <table>
                        <tr>
                            <td height="50">Nombre(s)</td>
                            <td width="20px"></td>
                            <td><input class="form-control" type="text" placeholder="Ingrese nombres"
                                    aria-label="default input example" id="nombre" name="nombre" required></td>
                        </tr>

                        <tr>
                            <td height="50">Apellido(s) </td>
                            <td width="20px"></td>
                            <td><input class="form-control" type="text" placeholder="Ingrese apellidos"
                                    aria-label="default input example" id="apellido" name="apellido" required></td>
                        </tr>

                        <tr>
                            <td height="50">Tipo de documento</td>
                            <td width="20px"></td>
                            <td>
                            <select class="form-select" name="tipoDocumento" id="tipoDocumento" style="width:270px" required>
                                
              
                                <?php
                                while ($tipoDocumento = $resultado->fetch_object())
                                {
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
                            <td height="50">Numero de documento </td>
                            <td width="20px"></td>
                            <td><input class="form-control" type="number" placeholder="1234"
                                    aria-label="default input example" name="documento" id="documento"required></td>
                        </tr>
                        <tr>
                            <td height="50">Correo</td>
                            <td width="20px"></td>
                            <td>
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control" placeholder="correo"
                                        aria-label="Recipient's username" aria-describedby="basic-addon2"
                                        name="correo" id="correo" required>
                                    
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="50">Telefono</td>
                            <td width="20px"></td>
                            <td>
                                
                                    <input class="form-control" type="text"  placeholder="telefono"
                                      
                                        name="telefono" id="telefono" required>
                                    
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td height="50">Clave (para el inicio de sesion) </td>
                            <td width="20px"></td>
                            <td>
                                <div>
                                    <div>
                                        <input type="password" class="form-control" id="clave" name="clave">
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <td height="50">Tipo de perfil</td>
                        <td width="20px"></td>
                        <td><input class="form-control" type="text" placeholder="Persona externa"
                                aria-label="disabled select example" disabled></td>
                    </table>
                    <br>
                    <button type="reset" class="btn btn-primary">Borrar</button>
                    <button type="submit" class="btn btn-primary">Registrar</button>
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

if(@$_REQUEST['x']==2){

    ?>
  <script>
    swal.fire('El usuario no fue agregado!','¡Intente nuevamente!','error')
  </script>
    <?php
exit;}?>