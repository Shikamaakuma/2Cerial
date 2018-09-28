

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

<?php
    $saveThis = $_POST[Winterthur_temp];
    $winterthur_Temp = fopen("winterthur_temp.txt", "r") or die("Unable to open file!");
    $temp = fgets($winterthur_Temp, 5);
	fgets($winterthur_Temp);
    $date = fgets($winterthur_Temp);
    $time = fgets($winterthur_Temp);
    fclose($winterthur_Temp);
	
?> 

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur </title>
		<link rel="stylesheet" type="text/css" href="main_page.css" />
	</head>
	<body>
	<div id = "Winterthur">
		<h1> Winterthur </h1>
		
		<div id="datetime">
			<p id="time">
			<?php
				/*$time = "19:00";*/ /*for test purpose*/
				echo $time; 
			?>
			</p><!--time-->
			<p class="spacing">
			<?php
				echo "----------------";
			?>
			</p><!--spacing-->
			<p id ="date">
			<?php
				/*$date = "20.09.2018";*/ /*for test purpose*/
				echo $date;
			?>
			</p><!--date-->
		</div><!--date/time-->
		
		<p id ="temp_winti">
		
		<?php
			/*$temp = 20.5;*/ /*for test purposes*/
			echo $temp."°C";
		?>
		</p><!--temp_winti-->	
		<?php
			if($temp > 20){
				echo "<link rel='stylesheet' type='text/css' href='main_page_warm.css' />";
			}
			else /*if*/{
				echo "<link rel='stylesheet' type='text/css' href='main_page_cold.css' />" ;
			}
			/*
			weitere else ifs für weitere temperaturen	
			
			*/
		?>
	</div><!--Winterthur-->	
	</body>
</html>