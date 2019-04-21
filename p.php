<!DOCTYPE HTML>
<html>
<head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
<script type="text/javascript" src="https://www.google.com/jsapi"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


<style>
body {
  background-color: #ebfaeb;
}
.chart {
  width: 100%; 
  min-height: 450px;
}
.row {
  margin:0 !important;
}
</style>

</head>
<body>
<div class="row">
  <div class="col-md-12 text-center">
<div style="padding: 10px 0px 0px 0px; margin: 0px;text-align:center;">
<img class="img-fluid" src="images/templatemo_logo.png"><br><br>
</div>

<br>
<br>
  
<?php

if(!empty($_GET['i'])) 
{ $x = $_GET['i']; }
else
{ die("<h1>Did not specify any roll number</h1>"); }


//$x = '17-1-201';

$x = str_replace("O","1", $x);
$x = str_replace("T","2", $x);
$x = str_replace("H","3", $x);
$x = str_replace("F","4", $x);
$x = str_replace("I","5", $x);
$x = str_replace("S","6", $x);
$x = str_replace("V","7", $x);
$x = str_replace("E","8", $x);
$x = str_replace("N","9", $x);
$x = str_replace("Z","0", $x);

if (file_exists('Data/' . $x . '.txt')){
	$data = file_get_contents('Data/' . $x . '.txt');
} else {
	die("No record found");
}
$myObj = json_decode($data, false);


echo "<h1>" . $myObj->Stud->nam . " [" . $myObj->Stud->rol . "]</h1>"; 


$Rem = "PASS";
?>

<br>
<br>
<table class='table' style='margin: 0 auto'>
<thead class='thead-dark'>
	<th>Subject</th>
	<th>Obtained / Total</th>
	<th>Remarks</th>
</thead>
<tr>
	<?php
	if ($myObj->fb->Sub1->tot>0) {
	echo "<td>" . $myObj->fb->Sub1->nam . "</td>";
	echo "<td>" . $myObj->fb->Sub1->obt . "/" . $myObj->fb->Sub1->tot . "</td>";
	if ($myObj->fb->Sub1->per < 33) { echo "<td class='table-danger'>Fail</td>";$Rem="FAIL"; } else { echo "<td class='table-success'>Pass</td>"; }
	}
	?>
</tr>
<tr>
	<?php
	if ($myObj->fb->Sub2->tot>0) {
	echo "<td>" . $myObj->fb->Sub2->nam . "</td>";
	echo "<td>" . $myObj->fb->Sub2->obt . "/" . $myObj->fb->Sub2->tot . "</td>";
	if ($myObj->fb->Sub2->per < 33) { echo "<td class='table-danger'>Fail</td>";$Rem="FAIL"; } else { echo "<td class='table-success'>Pass</td>"; }
	}
	?>
</tr>
<tr>
	<?php
	if ($myObj->fb->Sub3->tot>0) {
	echo "<td>" . $myObj->fb->Sub3->nam . "</td>";
	echo "<td>" . $myObj->fb->Sub3->obt . "/" . $myObj->fb->Sub3->tot . "</td>";
	if ($myObj->fb->Sub3->per < 33) { echo "<td class='table-danger'>Fail</td>";$Rem="FAIL"; } else { echo "<td class='table-success'>Pass</td>"; }
		}
	?>
</tr>
<tr>
	<?php
	if ($myObj->fb->Sub4->tot>0) {
	echo "<td>" . $myObj->fb->Sub4->nam . "</td>";
	echo "<td>" . $myObj->fb->Sub4->obt . "/" . $myObj->fb->Sub4->tot . "</td>";
	if ($myObj->fb->Sub4->per < 33) { echo "<td class='table-danger'>Fail</td>";$Rem="FAIL"; } else { echo "<td class='table-success'>Pass</td>"; }
	}
	?>
</tr>
<tr>
	<?php
	if ($myObj->fb->Sub5->tot>0) {
	echo "<td>" . $myObj->fb->Sub5->nam . "</td>";
	echo "<td>" . $myObj->fb->Sub5->obt . "/" . $myObj->fb->Sub5->tot . "</td>";
	if ($myObj->fb->Sub5->per < 33) { echo "<td class='table-danger'>Fail</td>";$Rem="FAIL"; } else { echo "<td class='table-success'>Pass</td>"; }
	}
	?>
</tr>
<tr>
	<?php
	if ($myObj->fb->Sub6->tot>0) {
	echo "<td>" . $myObj->fb->Sub6->nam . "</td>";
	echo "<td>" . $myObj->fb->Sub6->obt . "/" . $myObj->fb->Sub6->tot . "</td>";
	if ($myObj->fb->Sub6->per < 33) { echo "<td class='table-danger'>Fail</td>";$Rem="FAIL"; } else { echo "<td class='table-success'>Pass</td>"; }
	}
	?>
</tr>
<tr>
	<?php
	if (property_exists($myObj->fb, 'Sub7')) {
	echo "<td>" . $myObj->fb->Sub7->nam . "</td>";
	echo "<td>" . $myObj->fb->Sub7->obt . "/" . $myObj->fb->Sub7->tot . "</td>";
	if ($myObj->fb->Sub7->per < 33) { echo "<td class='table-danger'>Fail</td>";$Rem="FAIL"; } else { echo "<td class='table-success'>Pass</td>"; }
	}
	?>
</tr>
<tfoot class='thead-light'>
	<th>Total</th>
	<?php echo "<th>" . $myObj->fb->Obtained . " / " . $myObj->fb->Total . "</th>"; 
	if ($Rem == "FAIL") { echo "<td class='bg-danger'>FAIL</td>"; } else { echo "<td class='bg-success'>PASS</td>"; }
	?>
</tfoot>
</table>
<br>





<script type="text/javascript">

google.load("visualization", "1", {packages:["corechart"]});
google.setOnLoadCallback(drawChart1);
function drawChart1() {
  var data = google.visualization.arrayToDataTable([
          ['Attendance', 'Percent'],
          ['Present',   <?php echo       $myObj->Stud->att; ?>  ],
          ['Absent',    <?php echo 100 - $myObj->Stud->att; ?>  ]
        ]);

  var options = {
          legend:{position:'none'},
		  backgroundColor: '#ebfaeb',
		  colors: ['#2eb82e', '#ff1a1a']

        };

var chart = new google.visualization.PieChart(document.getElementById('chart_div1'));
  chart.draw(data, options);
}



google.setOnLoadCallback(drawChart2);
function drawChart2() {
	
	var data = google.visualization.arrayToDataTable([
        ['Marks', 'Correct', 'Incorrect', { role: 'annotation' } ],
		<?php
		if ($myObj->fb->Sub1->tot>0) {
		echo  "[ '" . $myObj->fb->Sub1->nam . "'," . $myObj->fb->Sub1->per . "," . (100-$myObj->fb->Sub1->per) . ", '']";
		}
		if ($myObj->fb->Sub2->tot>0) {
        echo  ",[ '" . $myObj->fb->Sub2->nam . "'," . $myObj->fb->Sub2->per . "," . (100-$myObj->fb->Sub2->per) . ", '']";
		}
		if ($myObj->fb->Sub3->tot>0) {
		echo  ",[ '" . $myObj->fb->Sub3->nam . "'," . $myObj->fb->Sub3->per . "," . (100-$myObj->fb->Sub3->per) . ", '']";
		}
		if ($myObj->fb->Sub4->tot>0) {
		echo  ",[ '" . $myObj->fb->Sub4->nam . "'," . $myObj->fb->Sub4->per . "," . (100-$myObj->fb->Sub4->per) . ", '']";
		}
		if ($myObj->fb->Sub5->tot>0) {
		echo  ",[ '" . $myObj->fb->Sub5->nam . "'," . $myObj->fb->Sub5->per . "," . (100-$myObj->fb->Sub5->per) . ", '']";
		}
		if ($myObj->fb->Sub6->tot>0) {
		echo  ",[ '" . $myObj->fb->Sub6->nam . "'," . $myObj->fb->Sub6->per . "," . (100-$myObj->fb->Sub6->per) . ", '']";
		}
		if (property_exists($myObj->fb, 'Sub7')) {
		echo  ",[ '" . $myObj->fb->Sub7->nam . "'," . $myObj->fb->Sub7->per . "," . (100-$myObj->fb->Sub7->per) . ", '']";
		}
		?>

      ]);

      var options = {
        bar: { groupWidth: '75%' },
        isStacked: 'percent',
        legend:{position:'none'},
		backgroundColor: '#ebfaeb',
		colors: ['#2eb82e', '#ff1a1a'],
		hAxis: {
            minValue: 0,
            ticks: [0, .33, .6, .9, 1]
		}
      };
  
	var options_fullStacked = {
          isStacked: 'percent',
          height: 300,
          legend: {position: 'top', maxLines: 3},

        };
    

var chart = new google.visualization.BarChart(document.getElementById('chart_div2'));
  chart.draw(data, options);
}


$(window).resize(function(){
  drawChart1();
  drawChart2();
});



    </script>

    
  </div>

  <div class="clearfix"></div>
  <div class="col-sd-12 col-md-6">
	<H3 class="text-center">Full Book Exam</h3>
    <div id="chart_div2" class="chart"></div>
  </div>
  <div class="col-sd-12 col-md-6">
	<h3 class="text-center">Attendance</h3>
    <div id="chart_div1" class="chart"></div>
  </div>

</div>

<div class='alert alert-warning text-center'><strong>Remarks: </strong> <?php echo $myObj->Stud->rem; ?> </div>

<div style="padding: 5px 0px 5px 0px; margin: 0px; text-align:center;border-top:1px;text-size:8px;">
Government Khawaja Rafique Shaheed College, Walton Road, Lahore - <a href="http://www.gkrscollege.edu.pk">http://www.gkrscollege.edu.pk</a>
</div>
<footer  class="col-md-12 text-center">This app is in test phase
<?php

// Add correct path to your countlog.txt file.
$path = 'Data/countlog.txt';

// Opens countlog.txt to read the number of hits.
$file  = fopen( $path, 'r' );
$count = fgets( $file, 1000 );
fclose( $file );

// Update the count.
$count = abs( intval( $count ) ) + 1;

// Output the updated count.
echo  $count ;

// Opens countlog.txt to change new hit number.
$file = fopen( $path, 'w' );
fwrite( $file, $count );
fclose( $file );
?> </footer>
