<?php   
/*require_once("../../app/helpers/fpdf.php"); */
require_once("../../app/helpers/fpdf/fpdf.php");
require_once("../../app/models/database.class.php");
require_once("../../app/helpers/validator.class.php"); 
require_once("../../app/models/dashboard/autoryeditorial/autoryeditorial.class.php"); 
/*include("../../../../libraries/jpgraph.php");   
include("../../../../libraries/jpgraph_pie.php"); 
include("../../../../libraries/jpgraph_pie3d.php"); */
class PDF extends FPDF {
function Header()
{ 
    if($this->PageNo()==1){
    // fuente del header 
    $this->SetFont('Arial','B',11.5);
    //lineas paralelas(x1,y1,x2,y2) 
    $this->SetLineWidth(0.04);//ancho de las lineas
    $this->Line(1.1,1.2,20.5,1.2);
    $this->Line(1.1,4.6,20.5,4.6);
    // Logo(ruta,posicion x,y,proporcion  de la imagen)
    $this->Image('../../web/img/Logo_prototipo.png',1.2,1.4,3);  
    // Titulo
    date_default_timezone_set("America/Tegucigalpa");
    $this->Cell(7);
    $fecha=date("d-m-Y ");
    $Hora=date("h:i a");  
    // celda(ancho en cm,alto en cm,texto para mostrar,borde,ajustar celda,alineacion de la celda,color de fondo)
    $this->Cell(5,0.9,'Netbook inc ',0,0,'C',false); 
    $this->Cell(5.5);    
    $this->Cell(0,0.9,'Fecha: '.$fecha,0,1,'R',false); 
    $this->Cell(7.1);    
    $this->Cell(5,0.9,'',0,0,'C',false);
    $this->Cell(0,0.9,'Hora: '.$Hora,0,1,'R',false);    
    $this->Cell(0,0.9,'E-mail: consulta@netbook.com',0,0,'C',false); 
    $this->Cell(0,0.9,'Telefono: (+503)xxxx-xxxx',0,1,'R',false);
    $this->Cell(0,0.9,'Reporte generado por: '.$_SESSION['nickname'],0,0,'C',false);
    // Line break
    $this->Ln(1.5);
    }
}
function titulo($valores)
{ 
    // fuente del header 
    $this->SetFont('Arial','B',14);   
    // celda(ancho en cm,alto en cm,texto para mostrar,borde,ajustar celda,alineacion de la celda,color de fondo)
    $this->Cell(0,1,utf8_decode('Libros escritos por:'.$valores[0]),0,0,'C',false);  
    // Line break
    $this->Ln(1);
}
// Page footer
function Footer()
{ //posicion 
    $this->SetY(-2.5);
    // Arial
    $this->SetFont('Arial','B',14); 
    $this->Cell(0,0.9,'Libros Netbook',0,2,'C',false);
    // Page number
    $this->Cell(0,0.9,'Pagina '.$this->PageNo().' de {De}',0,0,'C');
}
/*function graficoPDF($nombreGrafico=null,$ubicacionTamamo = array(),$titulo=null)
 { 
     $album=new album();
    $data1=$album->getAlbum(); 
   #obtenemos los datos del grafico  
   foreach ($data1 as $key ){
    $data[] = $key[7];
    $nombres[] = $key[1];  
   } 
   $x = $ubicacionTamamo[0];
   $y = $ubicacionTamamo[1]; 
   $ancho = $ubicacionTamamo[2];  
   $altura = $ubicacionTamamo[3];  
   #Creamos un grafico vacio
   $graph = new PieGraph(570,570,"auto");
   #indicamos titulo del grafico si lo indicamos como parametro
   if(!empty($titulo)){
    $graph->title->Set($titulo); 
    $graph->title->SetFont(FF_ARIAL,FS_BOLD,16);
   }   
   //Creamos el plot de tipo tarta
   $p1 = new PiePlot3D($data); 
   $p1->title->SetFont(FF_ARIAL,FS_BOLD,15); 
   #indicamos la leyenda para cada porcion de la tarta
   $graph->legend->Pos(0.05,0.07);
   $p1->SetLabelPos(0.2); 
   $p1->SetLegends($nombres);
   //Añadirmos el plot al grafico
   $graph->Add($p1);
   //mostramos el grafico en pantalla
   @unlink("$nombreGrafico.png"); 
   $graph->Stroke("$nombreGrafico.png"); 
   $this->Image("$nombreGrafico.png",$x,$y,$ancho,$altura);  
 } 
*/

// Tabla coloreada
 function tabla($header, $data)  
{
    // Colores, ancho de línea y fuente en negrita
    $this->SetFillColor(53,60,140);
    $this->SetTextColor(255);
    $this->SetDrawColor(0,0,0);
    $this->SetLineWidth(0.04);
    $this->SetFont('Arial','B',12);
    // Cabecera
    $w = array(2,7,5,4,2);
    for($i=0;$i<count($header);$i++) 
    $this->Cell($w[$i],1.2,$header[$i],1,0,'C',true);
    $this->Ln();
    // Restauración de colores y fuentes
    $this->SetFillColor(148,169,190);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Datos
    $fill = false;
    foreach($data as $row)
    {       
       $this->Cell($w[0],2.5,utf8_decode($row[0]) ,'LR',0,'C',$fill);
       $this->Cell($w[1],2.5,utf8_decode($row[1]),'LR',0,'C',$fill);
       $this->Cell($w[2],2.5,utf8_decode($row[2]),'LR',0,'C',$fill);
       $this->Cell($w[3],2.5,utf8_decode($row[3]),'LR',0,'C',$fill);
       $this->Cell($w[4],2.5,utf8_decode($row[4]),'LR',0,'C',$fill);  
       //se cargan los datos 
       
        $this->Ln();
        $fill = !$fill;
    }
    // Línea de cierre 
    $this->Cell(array_sum($w),0,'','T');
}
}
//llamamos la instancia de la clase(orientacion de la pagina,unidad de medda,tamaño de la pagina) 
$fpdf= new PDF('p','cm','Letter'); 
$header = array( utf8_decode('ventas'),'libro','editorial','genero','valor'); 
//le asignamos margenes a la pagina
$fpdf->setMargins(1.1,1.1,1.1);
$fpdf->setTitle('Ventas');
$fpdf->AliasNbPages('{De}');
//crea una pagina nueva si el contenido excede a la primera
$fpdf->SetAutoPageBreak(true, 3); 
//agregamos una nueva pagina al pdf 
session_start();
$autoresEdit =new autoyedit(); 
$data=$autoresEdit->GetReportelibros($_GET['autor']);
$autor=$autoresEdit->GetdatosAutor($_GET['autor']);
$fpdf->AddPage();  
$fpdf->titulo($autor);  
if($data!=null){ 
$fpdf->Ln(1);
$fpdf->tabla($header,$data);  
$fpdf->Ln(1);  
//asignamos la fuente (nombre,tipo,tamaño)
$fpdf->SetFont('Arial',"",18);   
    $fpdf->Ln(1);   
    /*$fpdf->graficoPDF('Inventario',array($fpdf->getX()+2.3,$fpdf->getY(),15,15),'Inventario');*/
}
else{
    $fpdf->Ln(5);
    $fpdf->setFont('Arial','B',20);
    $fpdf->Cell(0,1,utf8_decode('No hay libros escritos'),0,1,'C',false);
}
// celda(ancho en mm,alto en mm,texto para mostrar,borde,ajustar celda,alineacion de la celda,color de fondo)
 $fpdf->Output(); 
?>