<?php/*
    $saveThis = $_POST[Winterthur_temp];
    $winterthur_Temp = fopen("winterthur_temp.txt", "r") or die("Unable to open file!");
    $temp = fgets($winterthur_Temp, 5);
	fgets($winterthur_Temp);
    $date = fgets($winterthur_Temp);
    $time = fgets($winterthur_Temp);
    fclose($winterthur_Temp);
	*/
?> 
<?php
	$temp = 10.5; /*for test purposes*/
	if($temp > 20){
		echo "<link rel='stylesheet' type='text/css' href='css/main_page_warm.css' />";
	}
	else {
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
	<div id="nav">
		<?php
		echo "<div id='weather' class='navbutton ".$T."'><a href='weather_comparison.php'>Standorte</a></div>";
		echo "<div id='tables' class='navbutton ".$T."'><a href='tables.php'>Wetterarchiv</a></div>";
		echo "<div id='forecast' class='navbutton ".$T."'><a href='forecast_Winterthur.php'>Prognose</a></div>";
		?>
	</div>
	<div id="container">
	<?php
		echo "<p class='info ort ".$T."'>";
		echo	"Winterthur";
		echo "</p><!--ort-->";
		echo "<p class='info time ".$T."'>";
			$time = "19:00"; /*for test purpose*/
			echo $time; 
		echo "</p><!--time-->";
		echo "<p class ='info date ".$T."'>";
			$date = "20.09.2018"; /*for test purpose*/
			echo $date;
		echo "</p><!--date-->";
		
		echo "<p class ='info temp_winti ".$T."'>";
			/*$temp = 20.5; /*for test purposes*/
			echo $temp."°C";
	?>
		</p><!--temp_winti-->	
	</div><!--container-->
	</body>
</html>

				
