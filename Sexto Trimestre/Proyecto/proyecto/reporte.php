<?php include("../modelo/conexionBasesDatos.php");?>
<?php
require('../fpdf/fpdf.php');
$objConexion=Conectarse();
$inicio1=$_POST['inicio'];
$inicio = date("d-m-Y", strtotime($inicio1));
$final1=$_POST['fin'];
$final = date("d-m-Y", strtotime($final1));

date_default_timezone_set('America/Bogota');    
$fechaActual = date('d-m-Y h:i:s a', time());  

class PDF extends FPDF
{
   //Cabecera de página
   function Header()
   {

       $this->Image('../imagenes/escudo.png',8,5,20);

      $this->SetFont('Arial','B',16);

      $this->Cell(0,10,'COLEGIO GIMNASIO CECIL REDDIE',0,2,'C');
      $this->Ln(20);
   }
   
}
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
         
         if ($row['sdEstado']!=1) {
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
   
         if ($row['sdEstado']!=1) {
            $sinResolver6=$sinResolver6+1;
         }else{
            $resueltas6=$resueltas6+1;
         }
      
         $cantseis=$cantseis+1;
        }
         ///////////////////////////////////////////////////////777

$pdf=new PDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',12);
$pdf->Cell(0,10,'REPORTE DE CORRESPONDENCIA',0,2,'C');
$pdf->SetFont('Helvetica','I',13);
$pdf->Cell(0,20,'del '.$inicio .' al '. $final,0,1,'C');

$pdf->Cell(60,10, 'correspondencia',1,0,'C',0);
      $pdf->Cell(40,10, 'resuelta',1,0,'C',0);
      $pdf->Cell(40,10, 'sin resolver',1,0,'C',0);
      $pdf->Cell(40,10, 'total',1,1,'C',0);



   $pdf->Cell(60,10, 'Queja',1,0,'C',0);
   $pdf->Cell(40,10, $resueltas1,1,0,'C',0);
   $pdf->Cell(40,10, $sinResolver1,1,0,'C',0);
   $pdf->Cell(40,10, $cantuno,1,1,'C',0);

   $pdf->Cell(60,10, 'Reclamo',1,0,'C',0);
   $pdf->Cell(40,10, $resueltas2,1,0,'C',0);
   $pdf->Cell(40,10, $sinResolver2,1,0,'C',0);
   $pdf->Cell(40,10, $cantdos,1,1,'C',0);

   $pdf->Cell(60,10, 'Solicitud',1,0,'C',0);
   $pdf->Cell(40,10, $resueltas3,1,0,'C',0);
   $pdf->Cell(40,10, $sinResolver3,1,0,'C',0);
   $pdf->Cell(40,10, $canttres,1,1,'C',0);

   $pdf->Cell(60,10, 'Peticion',1,0,'C',0);
   $pdf->Cell(40,10, $resueltas4,1,0,'C',0);
   $pdf->Cell(40,10, $sinResolver4,1,0,'C',0);
   $pdf->Cell(40,10, $cantcuatro,1,1,'C',0);

   $pdf->Cell(60,10, 'Peticion - consulta',1,0,'C',0);
   $pdf->Cell(40,10, $resueltas5,1,0,'C',0);
   $pdf->Cell(40,10, $sinResolver5,1,0,'C',0);
   $pdf->Cell(40,10, $cantcinco,1,1,'C',0);

   $pdf->Cell(60,10, 'Peticion - documentacion',1,0,'C',0);
   $pdf->Cell(40,10, $resueltas6,1,0,'C',0);
   $pdf->Cell(40,10, $sinResolver6,1,0,'C',0);
   $pdf->Cell(40,10, $cantseis,1,1,'C',0);

   $pdf->Cell(60,10, 'total',1,0,'C',0);
   $pdf->Cell(40,10, $resueltas1+$resueltas2+$resueltas3+$resueltas4+$resueltas5+$resueltas6,1,0,'C',0);
   $pdf->Cell(40,10, $sinResolver1+$sinResolver2+$sinResolver3+$sinResolver4+$sinResolver5+$sinResolver6,1,0,'C',0);
   $pdf->Cell(40,10, $cantuno+$cantdos+$canttres+$cantcuatro+$cantcinco+$cantseis,1,1,'C',0);
   $pdf->SetY(-37);

        $pdf->SetFont('Arial','I',8);
   $pdf->Cell(0,10,'Page '.$pdf->PageNo().'  '. $fechaActual,0,0,'C');
$pdf->Output('ReporteCorrespondencia.pdf','I');
?>