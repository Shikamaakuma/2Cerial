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
	
		<h1> Winterthur </h1>
		
		<p id="time_date">
		<?php
			echo date('H:i') . "</br>"; 
			echo date('j. n. Y');
		?>
		</p>
		
		<p id="temp_winti">
		
		<?php
		$temp = rand(200, 450)/10.0;
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
		
	</body>
</html>