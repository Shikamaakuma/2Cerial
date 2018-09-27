

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
- <?php
    $saveThis = $_POST[Winterthur_temp];
    $winterthur_Temp = fopen("winterthur_temp.txt", "r") or die("Unable to open file!");
    $temp = fgets($winterthur_Temp);
    $date = fgets($winterthur_Temp);
    $time = fgets($winterthur_Temp);
    fclose($winterthur_Temp);
?> 

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
				echo $time; 
		?>
		</div>
		
		<div class="date">
		<?php
				echo $date;
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