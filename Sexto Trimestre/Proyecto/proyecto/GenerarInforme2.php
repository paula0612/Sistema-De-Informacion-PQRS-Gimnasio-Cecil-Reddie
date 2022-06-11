<?php
require "../modelo/conexionBasesDatos.php";
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

$objConexion=Conectarse();
$inicio=$_POST['fecha_inicial'];

$final=$_POST['fecha_final'];

$query=mysqli_query($objConexion,"SELECT * FROM solicitud where 
        sdFechaenvio BETWEEN '$inicio' AND '$final' order by sdFechaenvio");
        $resultado = mysqli_num_rows($query);
    if(isset($_POST['boton'])){

        //$inicio=$_POST['fecha_inicial'];
        //$final=$_POST['fecha_final'];

        
        //++++++++++++ CONSULTA  1 ++++++++++++++++++++++++++++++++++++
        $cantuno="0";
        $sql = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='1' AND 
        sdFechaenvio BETWEEN '$inicio' AND '$final' order by sdFechaenvio";
        if(!$result = $objConexion->query($sql)){
            die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
        }
        while($row = $result->fetch_assoc()){
	        //	$sdAsunto=stripslashes($row["sdAsunto"]);
            $cantuno=$cantuno+1;
        }
        //++++++++++++ CONSULTA 2++++++++++++++++++++++++++++++++++++
        $cantdos="0";
        $sql2 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='2'AND 
        sdFechaenvio BETWEEN '$inicio' AND '$final' order by sdFechaenvio";
        if(!$result2 = $objConexion->query($sql2)){
             die('Hay un error primera consulta!!! [' . $$objConexion->error . ']');
        }
        while($row2 = $result2->fetch_assoc()){
	        //	$sdAsunto=stripslashes($row["sdAsunto"]);
            $cantdos=$cantdos+1;
        }
    //++++++++++++ CONSULTA 3++++++++++++++++++++++++++++++++++++
    $canttres="0";
    $sql3 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='3'AND 
    sdFechaenvio BETWEEN '$inicio' AND '$final' order by sdFechaenvio";
    if(!$result3 = $objConexion->query($sql3)){
        die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
    }
    while($row3 = $result3->fetch_assoc()){
	    //	$sdAsunto=stripslashes($row["sdAsunto"]);
         $canttres=$canttres+1;
    }
    //++++++++++++++CONSULTA 4++++++++++++++++++++++++++++++++++
    $cantcuatro="0";
    $sql4 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='4'AND 
    sdFechaenvio BETWEEN '$inicio' AND '$final' order by sdFechaenvio";
    if(!$result4 = $objConexion->query($sql4)){
        die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
    }
    while($row4 = $result4->fetch_assoc()){
	    //	$sdAsunto=stripslashes($row["sdAsunto"]);
      $cantcuatro=$cantcuatro+1;
    }
    //++++++++++++++CONSULTA 5++++++++++++++++++++++++++++++++++
    $cantcinco="0";
    $sql5 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='5'AND 
    sdFechaenvio BETWEEN '$inicio' AND '$final' order by sdFechaenvio";
    if(!$result5 = $objConexion->query($sql5)){
        die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
    }
    while($row5 = $result5->fetch_assoc()){
	    //	$sdAsunto=stripslashes($row["sdAsunto"]);
      $cantcinco=$cantcinco+1;
    }
    //++++++++++++++CONSULTA 6++++++++++++++++++++++++++++++++++
    $cantseis="0";
    $sql6 = "SELECT * FROM solicitud WHERE sdTipoCorrespondencia='6'AND 
    sdFechaenvio BETWEEN '$inicio' AND '$final' order by sdFechaenvio";
    if(!$result6 = $objConexion->query($sql6)){
        die('Hay un error primera consulta!!! [' . $objConexion->error . ']');
    }
    while($row6 = $result6->fetch_assoc()){
	    //	$sdAsunto=stripslashes($row["sdAsunto"]);
      $cantseis=$cantseis+1;
    }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="StyleSheet" type="Text/Css" href="../estilos/Estilo4.css" />
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

<div id="divEncabezado"> <?php include "../vista/encabezado.php";?></div>

<br><br><br><br><br><br><br>
<div class="pdf">
<div class="pdf3">
        <form  method='POST' action='reporteCorrespondencia.php'>
        <input type='hidden' name='inicio' value='<?php echo $inicio ?>'>
        <input type='hidden' name='fin' value='<?php echo $final ?>'>
        <input type='image' name='botondeenvio' src='../imagenes/pdf3.png'  width='50px' height='58px' alt='Enviar formulario'>
        </form>
        
        </div></div>
    <center><form method="POST" action="GenerarInforme2.php">
    <div class="TituloInforme">
            <h3>Generar informe</h3>
        </div>
    <div class="Cerrar">
            <a class="btn btn-danger" href="salir.php" role="button">Cerrar sesión</a>
        </div>
        <div class="Atras">
            <a class="btn btn-warning" href="opcadmin1.php" role="button">Atrás</a>
        </div>
        <div class="Fecha1">
            <p>Fecha Inicio: </p>
        </div>
        <div class="Date1">
        <input type="date" name="fecha_inicial" value=" <?php echo date('d/m/Y', strtotime($inicio))?>" class="form-control">
        </div>
        <div class="Fecha2">
            <p>Fecha Final: </p>
        </div>
        <div class="Date2">
        <input type="date" name="fecha_final" class="form-control" >
        </div>

        
      <br><br><br>
      <div class="boton">
        <p><input type="submit" name="boton" 
               onclick="window.print()" value="Buscar" class="btn btn-outline-success"></p>
        </div>
        
        
        <?php
    
    if($resultado == "0"){?>
    <div class="alerta">
    <div class="alert alert-primary d-flex align-items-center" role="alert">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor" class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16" role="img" aria-label="Warning:">
    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
  </svg>
  <div>
   
  <b>El rango seleccionado no cuenta con registros.</b>
     </div>
</div>
    </div>
<?php
    //echo '<h2>NO SE ENCUENTRA NADITA</h2>';
     
    }else{?>
    <br><br>
        <center><div id="piechart"></div></center>
        <?php
    }
    ?>
    </form></center>
   
</body>
</html>