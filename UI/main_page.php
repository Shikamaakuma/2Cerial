 <?php
    $saveThis = $_POST[Winterthur_temp];
    $winterthur_Temp = fopen("winterthur_temp.txt", "r") or die("Unable to open file!");
    $temp = fread($winterthur_Temp, 20);
    fclose($winterthur_Temp);
?> 

<!--

Aufgabe 18.09.2018

Website-Oberfläche gestalten (html/css):

Ort: Winterthur
Temperatur: -> file Temp_Date
Datum/Zeit: -> file Temp_Date

Temp_Date:
Temperatur = 21.0° C
Datum/Zeit = auto Abruf
-->
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur </title>
	</head>
	<body>
	<div id = "Winterthur">
		<h1> Winterthur </h1>
		
		
		<div id="time">
		<?php
				echo date('H:i'); 
		?>
		</div>
		
		<div id="date">
		<?php
				echo date('j. n. Y');
		?>
		</div>
		
		<p id="temp_winti">
		
		<?php
		echo $temp . "°C";
		?>
		</p>	
		<?php
		if($temp > 20){
			echo "<link rel='stylesheet' type='text/css' href='main_page_warm.css' />";
		}
		else{
			echo "<link rel='stylesheet' type='text/css' href='main_page_cold.css' />" ;
		}
		?>
	</div>	
	</body>
</html>