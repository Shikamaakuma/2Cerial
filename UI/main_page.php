

<!--

Aufgabe 18.09.2018

Website-Oberfläche gestalten (html/css):

Ort: Winterthur
Temperatur: -> file Temp_Date
Datum/Zeit: -> file Temp_Date

Temp_Date:
Temperatur = 21.0° C
Datum/Zeit = auto Abruf

ev. hilfreich für Strukturierung: gridbyexample.com
-->
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur </title>
	</head>
	<body>
	<div class = "Winterthur">
		<h1> Winterthur </h1>
		
		
		<div class="time">
		<?php
				echo date('H:i') ."&#09"; 
		?>
		</div>
		
		<div class="date">
		<?php
				echo date('j. n. Y');
		?>
		</div>
		
		<p class="temp_winti">
		
		<?php
		$temp=21.9;
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