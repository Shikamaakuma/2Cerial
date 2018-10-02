<?php
	//reads temperature of Winterthur
    $winterthur_Temp = fopen("winterthur_temp.txt", "r") or die("Unable to open file!");
    $tempW = fgets($winterthur_Temp, 6);
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
    $tempR = fgets($romanshorn_Temp, 6);
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
    $h2oW = fgets($romanshorn_h2o);
    fclose($romanshorn_h2o);
	
	
	//reads temperature of Neuhausen am Rheinfall
    $neuhausen_Temp = fopen("neuhausen_temp.txt", "r") or die("Unable to open file!");
    $tempN = fgets($neuhausen_Temp, 6);
	fgets($neuhausen_Temp);
    $dateN = fgets($neuhausen_Temp);
    $timeN = fgets($neuhausen_Temp);
    fclose($neuhausen_Temp);
	
	// reads airpressure of Neuhausen am Rheinfall
    $winterthur_Press = fopen("neuhausen_press.txt", "r") or die("Unable to open file!");
    $pressW = fgets($neuhausen_Press);
    fclose($neuhausen_Press);
	
	// reads waterconcentration in air of Neuhausen am Rheinfall
    $winterthur_h2o = fopen("neuhausen_h2o.txt", "r") or die("Unable to open file!");
    $h2oN = fgets($neuhausen_h2o);
    fclose($neuhausen_h2o);
	
?> 

<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur/Romanshorn/Schaffhausen </title>
		<link rel="stylesheet" type="text/css" href="wetter_vergleich.css" />
	</head>
	<body>
	<div id = "container">
		<div id = "Winterthur">
			<!--rightboxstart-->
				<p class="detail ort"> 
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
				<?php?>
				<!--
				if ($tempW > 30){
					echo"<style='background-color: '>";
				}	
				else if($tempW <= 20 && $temp > 20){
					echo "<style='background-color: '>";
				}
				else if($tempW <= 20 && $temp >10){
					echo "<style='background-color: '>";
				}
				else if($tempW <= 10 && $temp >0){
					echo "<style='background-color: '>";
				}
				else if($tempW <= 0){
					echo "<style='background-color: '>";
				}*/
				?>-->
			<!--rightboxend-->
			<!--leftboxstart-->
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
			<!--leftboxend-->
		</div><!--Winterthur-->	
		<div id = "Romanshorn">
			<!--rightboxstart-->
				<p class="detail ort"> 
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
				<?php?>
				<!--
				if ($tempR > 30){
					echo"<style='background-color: '>";
				}	
				else if($tempR <= 20 && $temp > 20){
					echo "<style='background-color: '>";
				}
				else if($tempR <= 20 && $temp >10){
					echo "<style='background-color: '>";
				}
				else if($tempR <= 10 && $temp >0){
					echo "<style='background-color: '>";
				}
				else if($tempR <= 0){
					echo "<style='background-color: '>";
				}*/
				?>-->
			<!--rightboxend-->
			<!--leftboxstart-->
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
			<!--leftboxend-->
		</div><!--Romanshorn-->	
		<div id = "Neuhausen">
			<!--rightboxstart-->
				<p class="detail ort"> 
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
				<?php?>
				<!--
				if ($tempN > 30){
					echo"<style='background-color: '>";
				}	
				else if($tempN <= 20 && $temp > 20){
					echo "<style='background-color: '>";
				}
				else if($tempN <= 20 && $temp >10){
					echo "<style='background-color: '>";
				}
				else if($tempN <= 10 && $temp >0){
					echo "<style='background-color: '>";
				}
				else if($tempN <= 0){
					echo "<style='background-color: '>";
				}*/
				?>-->
			<!--rightboxend-->
			<!--leftboxstart-->
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
			<!--leftboxend-->
		</div><!--Neuhausen-->
		
	</div><!--container-->
	</body>
</html>