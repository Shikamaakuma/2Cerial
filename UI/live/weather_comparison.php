<?php 
	//current time
	$timenow = time();
	$datenow = date("Y-m-d H:i:s", $timenow);
	
	//UNIX timestamp now
	$dtall = new DateTime($datenow);
	$now = $dtall->getTimestamp();
	
	//reads data from database
	include "DB.php";
	
	$query = "select *
	from Readings
    inner join (
        select UserID as UI, max(Datum) as MaxDate
        from Readings
        group by UserID
    ) tm on Readings.UserID = tm.UI and Readings.Datum = tm.MaxDate order by UserID;";
	$resQuery = mysqli_query($mysqli,$query);
	if(!$resQuery){
		echo "query invalid";
	}
	else{
		$data = mysqli_fetch_all($resQuery,MYSQLI_ASSOC);
	}
	
	
	//Winterthur start
	
	//reads temperature of Winterthur
	$tempW = $data[1]['Temperature'];
	// reads airpressure of Winterthur
	$pressW = $data[1]['AirPressure'];
	// reads waterconcentration in air of Winterthur
	$h2oW = $data[1]['WaterSaturation'];
	// reads datetime of messurement and splits it into $date and $time
	$datetimeW = $data[1]['Datum'];
	$messuredW = explode(" ", $data[1]['Datum']);
	$dateW = $messuredW[0];
	$dateW = str_replace("-", ".", $dateW);
	$dateW = explode(".", $dateW);
	$dateW = $dateW[2].".".$dateW[1].".".$dateW[0];
	$timeW = $messuredW[1];
	$timeW = substr ($timeW , 0 , 5 );
	
	//UNIX timestamp messured by Winterthur
	/*$datetimeW = $dateW .' '. $timeW;*/
	$dtW = new DateTime($datetimeW);
	$datetimeW = $dtW->getTimestamp();

	//calculates timedifference for Winterthur in minutes
	$diffW = round(($now - $datetimeW)/60);
	
	//Winterthur end
	
	//Romanshorn start
	
	//reads temperature of Romanshorn
	$tempR = $data[0]['Temperature'];
	// reads airpressure of Romanshorn
	$pressR = $data[0]['AirPressure'];
	// reads waterconcentration in air of Romanshorn
	$h2oR = $data[0]['WaterSaturation'];
	// reads datetime of messurement and splits it into $date and $time
	$datetimeR = $data[0]['Datum'];
	$messuredR = explode(" ", $data[0]['Datum']);
	$dateR = $messuredR[0];
	$dateR = str_replace("-", ".", $dateR);
	$dateR = explode(".", $dateR);
	$dateR = $dateR[2].".".$dateR[1].".".$dateR[0];
	$timeR = $messuredR[1];
	$timeR = substr ($timeR , 0 , 5 );
	
	//UNIX timestamp messured by Romanshorn
	//$datetimeR = $dateR .' '. $timeR;
	$dtR = new DateTime($datetimeR);
	$datetimeR = $dtR->getTimestamp();

	//calculates timedifference for Romanshorn in minutes
	$diffR = round(($now - $datetimeR)/60);

	//Romanshorn end
	
	//Neuhausen am Rhenfall start
	
	//reads temperature of Neuhausen am Rheinfall
	$tempN = $data[2]['Temperature'];
	// reads airpressure of Neuhausen am Rheinfall
	$pressN = $data[2]['AirPressure'];
	// reads waterconcentration in air of Neuhausen am Rheinfall
	$h2oN = $data[2]['WaterSaturation'];
	// reads datetime of messurement and splits it into $date and $time
	$datetimeN = $data[2]['Datum'];
	$messuredN = explode(" ", $data[2]['Datum']);
	$dateN = $messuredN[0];
	$dateN = str_replace("-", ".", $dateN);
	$dateN = explode(".", $dateN);
	$dateN = $dateN[2].".".$dateN[1].".".$dateN[0];
	$timeN = $messuredN[1];
	$timeN = substr ($timeN , 0 , 5 );

	//UNIX timestamp messured by Neuhausen am Rheinfall
	//$datetimeN = $dateN .' '. $timeN;
	$dtN = new DateTime($datetimeN);
	$datetimeN = $dtN->getTimestamp();

	//calculates timedifference for Neuhausen am Rheinfall in minutes
	$diffN = round(($now - $datetimeN)/60);
	
	//Neuhausen am Rheinfall end
	
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