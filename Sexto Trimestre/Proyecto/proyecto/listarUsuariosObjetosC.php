<?php
    require "../modelo/conexionBasesDatos.php";
    require "../modelo/Usuario.php";
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
    extract ($_REQUEST);

    $objConexion=Conectarse();

    $objUsuario = new Usuario();

    $resultado=$objUsuario->consultarUsuario();

    $articulos_pag = 5; 

    $sql="SELECT * from usuario";
    $resultado2 = $objConexion->query($sql);

    if ($resultado2=mysqli_query($objConexion,$sql)) {
        $rowcount=mysqli_num_rows($resultado2);
      //  echo "Las personas de la tabla usuario son: ".$rowcount; 
    }
    $paginas=$rowcount/2;
    $paginas=round($paginas);
  //  echo $paginas;

?>

<!DOCTYPE html>
<html>
    <head>
        <title> Usuarios </title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css">        <link rel="stylesheet" href="estilos/estilo.css">
    </head>

    <body>
        <div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

        

        <br><br><br><br><br><br><br><br>
        <div class="Atras">
            <div class="d-grid gap-2 d-md-block">
                <a class="btn btn-warning" href="opccoordi3.php" role="button">Atrás</a>
            </div>
        </div>

        <div class="Cerrar">
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-danger" href="salir.php" role="button">Cerrar sesión</a>
            </div>
        </div>

        <div class="Titulo3">
            <h1>USUARIOS</h1>
        </div>

        <div class="Crear">
            <a class="btn btn-primary" href="frmCrearUsuarioC.php" role="button">Crear</a>
        </div>

        <div class="Tabla1" width="100%" > 
           <!-- <table class="table table-striped table-hover table-sm" width="80%">-->
           <table class="table justify-content-center align-items-center text-center table-striped table-hover table-sm text-justify table-responsive" width="80%">
                    <th class="align-middle" width="9%">N° Documento</th>
                    <th width="14%">Nombre(s)</th>
                    <th width="14%">Apellido(s)</th>
                    <th width="8%">Tipo documento</th>
                    <th width="8%">Rol</th>
                    <th width="9%">Telefono</th>
                    <th width="15%">Correo electronico</th>
                    <th width="7%">Estado</th>
                    <th width="5%">Editar</th>
                    <th width="5%">Eliminar</th>
                </tr>
                
                <?php

                   // while ($usuario = $resultado3->fetch_object()){
                    while ($usuario = $resultado->fetch_object())
                    {
                        ?>
                        <tr>
                            <td><?php  echo  $usuario->idPeticionario  ?>     </td>
                            <?php
                             $documento=$usuario->idPeticionario;
                             ?>
                            <td><?php  echo  $usuario->petNombre  ?> </td>
                            <td><?php  echo  $usuario->petApellido  ?></td>
                            <td><?php  echo  $usuario->tdNombre  ?></td>
                            <td><?php  echo  $usuario->rolNombre  ?></td> 
                            <td><?php  echo  $usuario->petTelefono  ?></td> 
                            <td><?php  echo  $usuario->usNombre  ?></td>  
                            <td><?php  echo  $usuario->epNombre  ?></td> 
                          <td>
                            <?php

                            echo "<form name='sdffg' method='POST' action='frmActualizarUsuarioC.php'>";
                            echo "<input type='hidden' name=peticionario value='$documento'>";
                            echo "<input class='btn btn-outline-success' type='submit' value='Editar'>";
                            echo "</form>";
                           ?>
                         </td>
                          
                       <td>
                       <?php

                          echo "<form name='sdffg' method='POST' action='validarEliminarUsuarioC.php'>";
                          echo "<input type='hidden' name=peticionario value='$documento'>";
                          echo "<input class='btn btn-outline-danger' type='submit' value='Eliminar'>";
                          echo "</form>";

                      ?>  
                  </td>
                     
                        </tr>
                    <?php
                    }//}
                ?> 
            </table>
        </div>
    </body>
</html> 
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<?php
$x='0';
$x=@$_REQUEST['x'];
if($x==1){

    ?>
  <script>
    swal.fire('Excelente!','¡El usuario ha sido agregado con exito!','success')
  </script>
    <?php
exit;}
if($x==2){

?>
<script>
swal.fire('Excelente!','¡El usuario ha sido actualizado con exito!','success')
</script>
<?php
exit;}
if($x==3){

    ?>
    <script>
    swal.fire('Excelente!','¡El usuario ha sido eliminado con exito!','success')
    </script>
    <?php
    exit;}

    if($x==4){

        ?>
      <script>
        swal.fire('El usuario no fue eliminado!','¡Intente nuevamente!','error')
      </script>
        <?php
    exit;}
?>
