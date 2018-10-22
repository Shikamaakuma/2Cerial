<?php 
	//current time
	$timenow = time();
	$datenow = date("Y-m-d H:i:s", $timenow);
	
	//UNIX timestamp now
	$dtall = new DateTime($datenow);
	$now = $dtall->getTimestamp();
	

	//reads temperature of Winterthur
    $winterthur_Temp = fopen("winterthur_temp.txt", "r") or die("Unable to open file!");
    $tempW = fgets($winterthur_Temp, 5);
	fgets($winterthur_Temp);
    $dateW = fgets($winterthur_Temp);
    $timeW = fgets($winterthur_Temp);
    fclose($winterthur_Temp);
	
	// reads airpressure of Winterthur
    $winterthur_Press = fopen("winterthur_press.txt", "r") or die("Unable to open file!");
    $pressW = fgets($winterthur_Press);
    fclose($winterthur_Press);
	
	// reads waterconcentration in air of Winterthur
    $winterthur_h2o = fopen("winterthur_h2o.txt", "r") or die("Unable to open file!");
    $h2oW = fgets($winterthur_h2o);
    fclose($winterthur_h2o);
	
	//UNIX timestamp messured by Winterthur
	$datetimeW = $dateW .' '. $timeW;
	$dtW = new DateTime($datetimeW);
	$datetimeW = $dtW->getTimestamp();

	//calculates timedifference for Winterthur
	$diffW = round(($now - $datetimeW)/60);
	
	
	//reads temperature of Romanshorn
    $romanshorn_Temp = fopen("romanshorn_temp.txt", "r") or die("Unable to open file!");
    $tempR = fgets($romanshorn_Temp, 5);
	fgets($romanshorn_Temp);
    $dateR = fgets($romanshorn_Temp);
    $timeR = fgets($romanshorn_Temp);
    fclose($romanshorn_Temp);
	
	// reads airpressure of Romanshorn
    $romanshorn_Press = fopen("romanshorn_press.txt", "r") or die("Unable to open file!");
    $pressR = fgets($romanshorn_Press);
    fclose($romanshorn_Press);
	
	// reads waterconcentration in air of Romanshorn
    $romanshorn_h2o = fopen("romanshorn_h2o.txt", "r") or die("Unable to open file!");
    $h2oR = fgets($romanshorn_h2o);
    fclose($romanshorn_h2o);
	
	//UNIX timestamp messured by Romanshorn
	$datetimeR = $dateR .' '. $timeR;
	$dtR = new DateTime($datetimeR);
	$datetimeR = $dtR->getTimestamp();

	//calculates timedifference for Romanshorn
	$diffR = round(($now - $datetimeR)/60);
	
	
	//reads temperature of Neuhausen am Rheinfall
    $neuhausen_Temp = fopen("neuhausen_temp.txt", "r") or die("Unable to open file!");
    $tempN = fgets($neuhausen_Temp, 5);
	fgets($neuhausen_Temp);
    $dateN = fgets($neuhausen_Temp);
    $timeN = fgets($neuhausen_Temp);
    fclose($neuhausen_Temp);
	
	// reads airpressure of Neuhausen am Rheinfall
    $neuhausen_Press = fopen("neuhausen_press.txt", "r") or die("Unable to open file!");
    $pressN = fgets($neuhausen_Press);
    fclose($neuhausen_Press);
	
	// reads waterconcentration in air of Neuhausen am Rheinfall
    $neuhausen_h2o = fopen("neuhausen_h2o.txt", "r") or die("Unable to open file!");
    $h2oN = fgets($neuhausen_h2o);
    fclose($neuhausen_h2o);
	
	//UNIX timestamp messured by Neuhausen am Rheinfall
	$datetimeN = $dateN .' '. $timeN;
	$dtN = new DateTime($datetimeN);
	$datetimeN = $dtN->getTimestamp();

	//calculates timedifference for Neuhausen am Rheinfall
	$diffN = round(($now - $datetimeN)/60);
	
?> 
<?php
	/*test
	$tempW = 20.5;
	$tempR = 15.8;
	$tempN = 0;
	/*test*/
	/*change of the background image dependent on temperature in Winterthur*/
	/*$temp = 40.5; /*for test purposes*/
	if($tempW > 40){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_mustafar.css' />";
	}
	else if($tempW <= 40 && $tempW > 15){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_warm.css' />";
	}
	else if($tempW <= 15 && $tempW > -20){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_cold.css' />" ;
	}
	else if($tempW < -20){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_hoth.css' />";
	}
	/* class determination for the different backgroundcolours for Winterthur*/
	if ($tempW > 40){
		$W = "Mustafar";
	}
	else if($tempW <= 40 && $tempW > 35){
		$W = "T35";
	}
	else if($tempW <= 35 && $tempW > 30){
		$W = "T30";
	}
	else if($tempW <= 30 && $tempW > 25){
		$W = "T25";
	}
	else if($tempW <= 25 && $tempW > 20){
		$W = "T20";
	}
	else if($tempW <= 20 && $tempW > 15){
		$W = "T15";
	}
	else if($tempW <= 15 && $tempW > 10){
		$W = "T10";
	}
	else if($tempW <= 10 && $tempW > 5){
		$W = "T5";
	}
	else if($tempW <= 5 && $tempW > 0){
		$W = "T0";
	}
	else if($tempW <= 0 && $tempW > -10){
		$W = "T-10";
	}
	else if($tempW <= -10 && $tempW > -20){
		$W = "T-20";
	}
	else if($tempW <= -20){
		$W = "Hoth";
	}
	/* class determination for the different backgroundcolours for Romanshorn*/
	if ($tempR > 40){
		$R = "Mustafar";
	}
	else if($tempR <= 40 && $tempR > 35){
		$R = "T35";
	}
	else if($tempR <= 35 && $tempR > 30){
		$R = "T30";
	}
	else if($tempR <= 30 && $tempR > 25){
		$R = "T25";
	}
	else if($tempR <= 25 && $tempR > 20){
		$R = "T20";
	}
	else if($tempR <= 20 && $tempR > 15){
		$R = "T15";
	}
	else if($tempR <= 15 && $tempR > 10){
		$R = "T10";
	}
	else if($tempR <= 10 && $tempR > 5){
		$R = "T5";
	}
	else if($tempR <= 5 && $tempR > 0){
		$R = "T0";
	}
	else if($tempR <= 0 && $tempR > -10){
		$R = "T-10";
	}
	else if($tempR <= -10 && $tempR > -20){
		$R = "T-20";
	}
	else if($tempR <= -20){
		$R = "Hoth";
	}
	/* class determination for the different backgroundcolours for Neuhausen am Rheinfall*/
	if ($tempN > 40){
		$N = "Mustafar";
	}
	else if($tempN <= 40 && $tempN > 35){
		$N = "T35";
	}
	else if($tempN <= 35 && $tempN > 30){
		$N = "T30";
	}
	else if($tempN <= 30 && $tempN > 25){
		$N = "T25";
	}
	else if($tempN <= 25 && $tempN > 20){
		$N = "T20";
	}
	else if($tempN <= 20 && $tempN > 15){
		$N = "T15";
	}
	else if($tempN <= 15 && $tempN > 10){
		$N = "T10";
	}
	else if($tempN <= 10 && $tempN > 5){
		$N = "T5";
	}
	else if($tempN <= 5 && $tempN > 0){
		$N = "T0";
	}
	else if($tempN <= 0 && $tempN > -10){
		$N = "T-10";
	}
	else if($tempN <= -10 && $tempN > -20){
		$N = "T-20";
	}
	else if($tempN <= -20){
		$N = "Hoth";
	}
?>



<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur/Romanshorn/Neuhausen am Rheinfall </title>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: portrait)" href="css/navbar_mobile.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: portrait)" href="css/weather_comparison_mobile.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: landscape)" href="css/navbar.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: landscape)" href="css/weather_comparison.css" />
		<link rel="stylesheet" type="text/css" href="css/temperature.css" />
	</head>
	<body>
	<div id="nav">
		<div id="left_button" class="navbutton"><a href="https://2cerials.m2e-demo.ch/tables.php">Wetterarchiv</a></div>
		<div id="middle_button" class="navbutton"><a href="index.php">Startseite</a></div>
		<div id="right_button" class="navbutton"><a href="forecast_Winterthur.php">Prognose</a></div>
	</div>
	<div id = "container">
		<?php
		echo "<div id = 'Winterthur' class='".$W." ort'>";
		?>
			<!--leftboxstart-->
				<p class="detail name"> 
					Winterthur 
				</p><!--ort-->
				<p class="detail time">
					<?php
						echo $timeW; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						echo $dateW;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						echo $tempW."°C";
					?>
				</p><!--temp-->	
			<!--leftboxend-->
			<!--rightboxstart-->
				<?php
				if($diffW > 5){
					echo "<p class='status old'>Daten veraltet</p>";
				}
				else{
					echo "<p class='status new'>Daten aktuell</p>";	
				}					
				?>
				<p class="detail pressText">
					Luftdruck
				</p><!--pressText-->
				<p class="detail press">
					<?php
						echo $pressW." hPa";
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						echo $h2oW." %";
					?>
				</p><!--h2o-->
			<!--rightboxend-->
		</div><!--Winterthur-->	
		<?php
		echo "<div id = 'Romanshorn' class='".$R." ort'>";
		?>
			<!--leftboxstart-->
				<p class="detail name"> 
					Romanshorn 
				</p><!--ort-->
				<p class="detail time">
					<?php
						echo $timeR; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						echo $dateR;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						echo $tempR."°C";
					?>
				</p><!--temp-->	
			<!--leftboxend-->
			<!--rightboxstart-->
				<?php
				if($diffR > 5){
					echo "<p class='status old'>Daten veraltet</p>";
				}	
				else{
					echo "<p class='status new'>Daten aktuell</p>";	
				}
				?>
				<p class="detail pressText">
					Luftdruck
				</p><!--pressText-->
				<p class="detail press">
					<?php
						echo $pressR." hPa";
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						echo $h2oR." %";
					?>
				</p><!--h2o-->
			<!--rightboxend-->
		</div><!--Romanshorn-->	
		<?php
		echo "<div id = 'Neuhausen' class='".$N." ort'>";
		?>
			<!--leftboxstart-->
				<p class="detail name"> 
					Neuhausen am Rheinfall
				</p><!--ort-->
				<p class="detail time">
					<?php
						echo $timeN; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						echo $dateN;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						echo $tempN."°C";
					?>
				</p><!--temp-->	
			<!--leftboxend-->
			<!--rightboxstart-->
				<?php
				if($diffN > 5){
					echo "<p id='old' class='status old'>Daten veraltet</p>";
				}
				else{
					echo "<p class='status new'>Daten aktuell</p>";	
				}				
				?>
				<p class="detail pressText">
					Luftdruck
				</p><!--pressText-->
				<p class="detail press">
					<?php
						echo $pressN." hPa";
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						echo $h2oN." %";
					?>
				</p><!--h2o-->
			<!--rightboxend-->
		</div><!--Neuhausen-->
	</div><!--container-->
	</body>
</html>