<?php
    $saveThis = $_POST[Winterthur_temp];
    $winterthur_Temp = fopen("winterthur_temp.txt", "r") or die("Unable to open file!");
    $temp = fgets($winterthur_Temp, 5);
	fgets($winterthur_Temp);
    $date = fgets($winterthur_Temp);
    $time = fgets($winterthur_Temp);
    fclose($winterthur_Temp);
	
	
	//current time
	$timenow = time();
	$datenow = date("Y-m-d H:i:s", $timenow);
	
	//UNIX timestamp messured
	$datetime = $date .' '. $time;
	$dt1 = new DateTime($datetime);
	$datetime = $dt1->getTimestamp();

	//UNIX timestamp now
	$dt2 = new DateTime($datenow);
	$now = $dt2->getTimestamp();

	//calculates timedifference
	$diff = round(($now - $datetime)/60);
	
?> 
<?php
	/*change of the background image dependent on temperature*/
	/*$temp = 40.5; /*for test purposes*/
	if($temp > 40){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_mustafar.css' />";
	}
	else if($temp <= 40 && $temp > 20){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_warm.css' />";
	}
	else if($temp <= 20 && $temp > -20){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_cold.css' />" ;
	}
	else if($temp < -20){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_hoth.css' />";
	}
	
	/* class determination for the different backgroundcolours*/
	if ($temp > 40){
		$T = "Mustafar";
	}
	else if($temp <= 40 && $temp > 35){
		$T = "T35";
	}
	else if($temp <= 35 && $temp > 30){
		$T = "T30";
	}
	else if($temp <= 30 && $temp > 25){
		$T = "T25";
	}
	else if($temp <= 25 && $temp > 20){
		$T = "T20";
	}
	else if($temp <= 20 && $temp > 15){
		$T = "T15";
	}
	else if($temp <= 15 && $temp > 10){
		$T = "T10";
	}
	else if($temp <= 10 && $temp > 5){
		$T = "T5";
	}
	else if($temp <= 5 && $temp > 0){
		$T = "T0";
	}
	else if($temp <= 0 && $temp > -10){
		$T = "T-10";
	}
	else if($temp <= -10 && $temp > -20){
		$T = "T-20";
	}
	else if($temp <= -20){
		$T = "Hoth";
	}

?>
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur </title>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: portrait)" href="css/navbar_mobile.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: portrait)" href="css/main_page_mobile.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: landscape)" href="css/navbar.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: landscape)" href="css/main_page.css" />
		<link rel="stylesheet" type="text/css" href="css/temperature.css" />
	</head>
	<body>
	<div id="nav">
		<?php
		echo "<div id='left_button' class='".$T." navbutton'><a href='weather_comparison.php'>Standorte</a></div>";
		echo "<div id='middle_button' class='".$T." navbutton'><a href='https://2cerials.m2e-demo.ch/tables.php'>Wetterarchiv</a></div>";
		echo "<div id='right_button' class='".$T." navbutton'><a href='forecast_Winterthur.php'>Prognose</a></div>";
		?>
	</div>
	<div id="container">
	<?php
		echo "<p class='info ort ".$T."'>";
		echo	"Winterthur";
		echo "</p><!--ort-->";
		echo "<p class='info time ".$T."'>";
			echo $time; 
		echo "</p><!--time-->";
		echo "<p class ='info date ".$T."'>";
			echo $date;
		echo "</p><!--date-->";
		
		echo "<p class ='info temp_winti ".$T."'>";
			echo $temp."°C";
			
		if($diff > 5){
			echo "<p id='old' class='".$T."'>Daten nicht aktuell</p>";
		}
	?>
		</p><!--temp_winti-->	
	</div><!--container-->
	</body>
</html>

				
