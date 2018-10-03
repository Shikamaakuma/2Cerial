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
<?php
	/*$temp = 20.5; /*for test purposes*/
	if($temp > 20){
		$wetter = "higher";
		
		echo "<link rel='stylesheet' type='text/css' href='css/main_page_warm.css' />";
	}
	else {
		$wetter = "lower";
		
		echo "<link rel='stylesheet' type='text/css' href='css/main_page_cold.css' />" ;
	}
	
	if ($temp > 30){
		$T = "T30";
	}	
	else if($temp <= 30 && $temp > 20){
		$T = "T20";
	}
	else if($temp <= 20 && $temp > 10){
		$T = "T10";
	}
	else if($temp <= 10 && $temp > 0){
		$T = "T0";
	}
	else if($temp <= 0){
		$T = "T-10";
	}
?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur </title>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/main_page.css" />
		<link rel="stylesheet" type="text/css" href="css/temperature.css" />
	</head>
	<body>
	<?php
	echo "<div class=".$wetter.">";
	echo "<div id = 'Winterthur' class=".$T.">";
	?>
		<h1> Winterthur </h1>
		
		<div id="datetime">
			<p id="time">
			<?php
				/*$time = "19:00"; /*for test purposes*/
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
				/*$date = "20.09.2018"; /*for test purposes*/
				echo $date;
			?>
			</p><!--date-->
		</div><!--date/time-->
		
		<p id ="temp_winti">
		
		<?php
			/*$temp = 20.5; /*for test purposes*/
			echo $temp."°C";
		?>
		</p><!--temp_winti-->	
	</div><!--Winterthur-->	
	</div><!--wetter-->
	</body>
</html>