<?php // content="text/plain; charset=utf-8"
require_once ('jpgraph/src/jpgraph.php');
require_once ('jpgraph/src/jpgraph_bar.php');

include 'koneksi.php';

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);
$sql = "SELECT id, Nama, Tinggi, Berat FROM Sensor";
$result = mysqli_query($conn, $sql);

$name_array = array();
$tinggi_array = array();
$berat_array = array ();
$i = 0;
  while($row = mysqli_fetch_array($result)) {
    //$row["id"] 
	//$row["waktu"] 
  $name_array[$i] = $row["Nama"];
  $tinggi_array[$i] = $row["Tinggi"];
  $berat_array[$i] = $row["Berat"];
  $i++;
  }

mysqli_close ($conn);

$data1y = $tinggi_array;
$data2y = $berat_array;
//$datay3 = array(5,17,32,24);

// Create the graph. These two calls are always required
$graph = new Graph(200,100,'auto');
$graph->SetScale("textlin");

$theme_class=new UniversalTheme;
$graph->SetTheme($theme_class);

$graph->yaxis->SetTickPositions(array(0,60,90,120,150,180,200), array(30,75,105,135,165,190));
$graph->SetBox(false);

$graph->ygrid->SetFill(false);
$graph->xaxis->SetTickLabels($name_array);
$graph->yaxis->HideLine(false);
$graph->yaxis->HideTicks(false,false);

// Create the bar plots
$b1plot = new BarPlot($data1y);
$b2plot = new BarPlot($data2y);
//$b3plot = new BarPlot($data3y);

// Create the grouped bar plot
$gbplot = new GroupBarPlot(array($b1plot,$b2plot));
// ...and add it to the graPH
$graph->Add($gbplot);


$b1plot->SetColor("white");
$b1plot->SetFillColor("#cc1111");

$b2plot->SetColor("white");
$b2plot->SetFillColor("#11cccc");

//$b3plot->SetColor("white");
//$b3plot->SetFillColor("#1111cc");

$graph->title->Set("Patient Data Chart");

// Display the graph
$graph->Stroke();

?>

