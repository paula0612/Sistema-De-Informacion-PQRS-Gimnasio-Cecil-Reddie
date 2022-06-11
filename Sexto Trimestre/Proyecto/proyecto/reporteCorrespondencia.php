
<?php include("../modelo/conexionBasesDatos.php");?>
<?php
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

require('../fpdf/fpdf.php');
$objConexion=Conectarse();
$inicio1=$_POST['inicio'];
$inicio = date("d-m-Y", strtotime($inicio1));
$final1=$_POST['fin'];
$final = date("d-m-Y", strtotime($final1));

$query=mysqli_query($objConexion,"SELECT * FROM solicitud where 
        sdFechaenvio BETWEEN '$inicio1' AND '$final1' order by sdFechaenvio");
        $resultado = mysqli_num_rows($query);

        $cantuno="0";
         $resueltas1="0";
         $sinResolver1="0";
        $sql = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='1'";
        if(!$result = $objConexion->query($sql)){
            die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
        }
        while($row = $result->fetch_assoc()){
         
         if ($row['sdEstado']!=1) {
            $sinResolver1=$sinResolver1+1;
         }else{
            $resueltas1=$resueltas1+1;
         }
      
         $cantuno=$cantuno+1;
        }
         //2222/////////////////////////////////////////////////////777
         $cantdos="0";
         $resueltas2="0";
         $sinResolver2="0";
        $sql = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='2'";
        if(!$result = $objConexion->query($sql)){
            die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
        }
        while($row = $result->fetch_assoc()){
         
         if ($row['sdEstado']!=1) {
            $sinResolver2=$sinResolver2+1;
         }else{
            $resueltas2=$resueltas2+1;
         }
      
         $cantdos=$cantdos+1;
        }
         //33333/////////////////////////////////////////////////////
         $canttres="0";
         $resueltas3="0";
         $sinResolver3="0";
        $sql3 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='3' 
        order by sdFechaenvio";
        if(!$result3 = $objConexion->query($sql3)){
            die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
        }
        while($row3 = $result3->fetch_assoc()){
         
         if ($row3['sdEstado']!=1) {
            $sinResolver3=$sinResolver3+1;
         }else{
            $resueltas3=$resueltas3+1;
         }
      
         $canttres=$canttres+1;
        }
         //4444/////////////////////////////////////////////////////777
         $cantcuatro="0";
         $resueltas4="0";
         $sinResolver4="0";
        $sql4 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='4'";
        if(!$result4 = $objConexion->query($sql4)){
            die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
        }
        while($row4 = $result4->fetch_assoc()){
    
         if ($row4['sdEstado']!=1) {
            $sinResolver4=$sinResolver4+1;
         }else{
            $resueltas4=$resueltas4+1;
         }
      
         $cantcuatro=$cantcuatro+1;
        }
         //5555/////////////////////////////////////////////////////777
         $cantcinco="0";
         $resueltas5="0";
         $sinResolver5="0";
        $sql5 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='5' 
        order by sdFechaenvio";
        if(!$result5 = $objConexion->query($sql5)){
            die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
        }
        while($row5 = $result5->fetch_assoc()){
         
         if ($row5['sdEstado']!=1) {
            $sinResolver5=$sinResolver5+1;
         }else{
            $resueltas5=$resueltas5+1;
         }
      
         $cantcinco=$cantcinco+1;
        }
         //6666/////////////////////////////////////////////////////777
         $cantseis="0";
         $resueltas6="0";
         $sinResolver6="0";
        $sql6 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='6' 
        order by sdFechaenvio";
        if(!$result6 = $objConexion->query($sql6)){
            die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
        }
        while($row6 = $result6->fetch_assoc()){
   
         if ($row6['sdEstado']!=1) {
            $sinResolver6=$sinResolver6+1;
         }else{
            $resueltas6=$resueltas6+1;
         }
      
         $cantseis=$cantseis+1;
        }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte de Correspondencia</title>
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="StyleSheet" type="Text/Css" href="../estilos/Estilo4.css" />
    <link rel="stylesheet" href="../estilos/estilo.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current', {'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);

function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['Language', 'Rating'],
      <?php
      echo "['Queja', $cantuno],";
      echo "['Reclamo', $cantdos],";
      echo "['Solicitud', $canttres],";
      echo "['Peticion', $cantcuatro],";
      echo "['Peticion - consulta', $cantcinco],";
      echo "['Peticion - documentación', $cantseis],";
      ?>
    ]);
    
    var options = {
        title: 'Correspondencia del <?php echo $inicio ?> al <?php echo $final ?> ',
        width: 700,
        height: 300,
        is3D: true,
    };
    
    var chart = new google.visualization.PieChart(document.getElementById('piechart'));
    
    chart.draw(data, options);
}
</script>
    </head>

<body>

<div class="Atras">
            <a class="btn btn-warning" href="GenerarInforme.php" role="button">Atrás</a>
        </div>

<div class="banner">
    <header>
        
        <div class="Escudo">
            <img src="../imagenes/escudo.png">
        </div>
        <div class="Titulo">
          <br><br>
            <center><h2>GIMNASIO CECIL REDDIE</h2></center>
        </div>
        <div class="Eslogan">
            <h4>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
              "Un encuentro con el saber y el pensar para aprender a aprender"</h4>
        </div>
          <br>
        
        </div>
        
    </header>
    </div>

<br><br><br><br><br><br><br>
<div class="pdf">
<div class="pdf3">
        
        
        </div></div>

        
        <?php
    
    if($resultado != "0"){?>

    <br><br>
        <center><div id="piechart"></div></center>
        <?php
    }
    ?>
    <center><table class="table text-center table-striped table-hover table-sm">
  <thead>
    <tr>
      <th scope="col">Correspondencia</th>
      <th scope="col">Resuelta</th>
      <th scope="col">Sin resolver</th>
      <th scope="col">Total</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">Queja</th>
      <td><?php echo $resueltas1;?></td>
      <td><?php echo $sinResolver1;?></td>
      <td><?php echo $cantuno;?></td>
    </tr>
    <tr>
      <th scope="row">Reclamo</th>
      <td><?php echo $resueltas2;?></td>
      <td><?php echo $sinResolver2;?></td>
      <td><?php echo $cantdos;?></td>
    </tr>
    <tr>
      <th scope="row">Solicitud</th>
      <td><?php echo $resueltas3;?></td>
      <td><?php echo $sinResolver3;?></td>
      <td><?php echo $canttres;?></td>
    </tr>
    <tr>
      <th scope="row">Petición</th>
      <td><?php echo $resueltas4;?></td>
      <td><?php echo $sinResolver4;?></td>
      <td><?php echo $cantcuatro;?></td>
    </tr>
    <tr>
      <th scope="row">Petición - consulta</th>
      <td><?php echo $resueltas5;?></td>
      <td><?php echo $sinResolver5;?></td>
      <td><?php echo $cantcinco;?></td>
    </tr>
    <tr>
      <th scope="row">Petición - documentación</th>
      <td><?php echo $resueltas6;?></td>
      <td><?php echo $sinResolver6;?></td>
      <td><?php echo $cantseis;?></td>
    </tr>
    <tr>
      <th scope="row">Total</th>
      <td><?php echo $resueltas1+$resueltas2+$resueltas3+$resueltas4+$resueltas5+$resueltas6;?></td>
      <td><?php echo $sinResolver1+$sinResolver2+$sinResolver3+$sinResolver4+$sinResolver5+$sinResolver6;?></td>
      <td><?php echo $cantuno+$cantdos+$canttres+$cantcuatro+$cantcinco+$cantseis;?></td>
    </tr>
    
  </tbody>
</table></center>


   
</body>
<script type="text/javascript">

$(document).ready(function () {
    window.print();
});

</script>

</html>
