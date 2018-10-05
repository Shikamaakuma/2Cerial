<?php 
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
	
?> 
<?php
	/*test
	$tempW = 20.5;
	$tempR = 15.8;
	$tempN = 0;
	/*test*/
	if ($tempW > 30){
		$W = "T30";
	}	
	else if($tempW <= 30 && $tempW > 20){
		$W = "T20";
	}
	else if($tempW <= 20 && $tempW >10){
		$W = "T10";
	}
	else if($tempW <= 10 && $tempW >0){
		$W = "T0";
	}
	else if($tempW <= 0){
		$W = "T-10";
	}
	
	if ($tempR > 30){
		$R = "T30";
	}	
	else if($tempR <= 30 && $tempR > 20){
		$R = "T20";
	}
	else if($tempR <= 20 && $tempR >10){
		$R = "T10";
	}
	else if($tempR <= 10 && $tempR >0){
		$R = "T0";
	}
	else if($tempR <= 0){
		$R = "T-10";
	}
	
	if ($tempN > 30){
		$N = "T30";
	}	
	else if($tempN <= 30 && $tempN > 20){
		$N = "T20";
	}
	else if($tempN <= 20 && $tempN >10){
		$N = "T10";
	}
	else if($tempN <= 10 && $tempN >0){
		$N = "T0";
	}
	else if($tempN <= 0){
		$N = "T-10";
	}
?>



<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur/Romanshorn/Neuhausen am Rheinfall </title>
		<link rel="stylesheet" type="text/css" href="css/reset.css" />
		<link rel="stylesheet" type="text/css" href="css/wetter_vergleich.css" />
		<link rel="stylesheet" type="text/css" href="css/temperature.css" />
	</head>
	<body>
	<div id="nav">
		<div id="main" class="navbutton"><a href="main_page.php">Haus</a></div>
		<div id="tables" class="navbutton"><a href="tables.php">Wetterarchiv</a></div>
		<div id="soon" class="navbutton"><a href="comingSoon.html">Prognose</a></div>
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
						/*$timeW = "19:00"; /*for test purposes*/
						echo $timeW; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						/*$dateW = "20.09.2018"; /*for test purposes*/
						echo $dateW;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						/*$tempW = 20.5; /*for test purposes*/
						echo $tempW."°C";
					?>
				</p><!--temp-->	
			<!--leftboxend-->
			<!--rightboxstart-->
				<p class="detail pressText">
					Luftdruck
				</p><!--pressText-->
				<p class="detail press">
					<?php
						/*$pressW = 990; /*for test purposes*/
						echo $pressW;
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						/*$h2oW = 25.7; /*for test purpose*/
						echo $h2oW;
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
						/*$timeR = "19:00"; /*for test purposes*/
						echo $timeR; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						/*$dateR = "20.09.2018"; /*for test purposes*/
						echo $dateR;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						/*$tempR = 20.5; /*for test purposes*/
						echo $tempR."°C";
					?>
				</p><!--temp-->	
			<!--leftboxend-->
			<!--rightboxstart-->
				<p class="detail pressText">
					Luftdruck
				</p><!--pressText-->
				<p class="detail press">
					<?php
						/*$pressR = 990; /*for test purposes*/
						echo $pressR;
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						/*$h2oR = 25.7; /*for test purposes*/
						echo $h2oR;
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
						/*$timeN = "19:00"; /*for test purposes*/
						echo $timeN; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						/*$dateN = "20.09.2018"; /*for test purposes*/
						echo $dateN;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						/*$tempN = 20.5; /*for test purposes*/
						echo $tempN."°C";
					?>
				</p><!--temp-->	
			<!--leftboxend-->
			<!--rightboxstart-->
				<p class="detail pressText">
					Luftdruck
				</p><!--pressText-->
				<p class="detail press">
					<?php
						/*$pressN = 990; /*for test purposes*/
						echo $pressN;
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						/*$h2oN = 25.7; /*for test purposes*/
						echo $h2oN;
					?>
				</p><!--h2o-->
			<!--rightboxend-->
		</div><!--Neuhausen-->
		
	</div><!--container-->
	</body>
</html>