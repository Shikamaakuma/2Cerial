<?php/*
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
    $winterthur_Temp = fopen("winterthur_h2o.txt", "r") or die("Unable to open file!");
    $h2oW = fgets($winterthur_h2o);
    fclose($winterthur_h2o);
	*/
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
						$timeW = "19:00"; /*for test purpose*/
						echo $timeW; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						$dateW = "20.09.2018"; /*for test purpose*/
						echo $dateW;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						$tempW = 20.5; /*for test purposes*/
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
						$pressW = 990;
						echo $pressW;
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						$h2oW = 25.7;
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
						$timeR = "19:00"; /*for test purpose*/
						echo $timeR; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						$dateR = "20.09.2018"; /*for test purpose*/
						echo $dateR;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						$tempR = 20.5; /*for test purposes*/
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
						$pressR = 990;
						echo $pressR;
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						$h2oR = 25.7;
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
						$timeN = "19:00"; /*for test purpose*/
						echo $timeN; 
					?>
				</p><!--time-->
				<p class ="detail date">
					<?php
						$dateN = "20.09.2018"; /*for test purpose*/
						echo $dateN;
					?>
				</p><!--date-->
				
				<p class ="detail temp">
					<?php
						$tempN = 20.5; /*for test purposes*/
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
						$pressN = 990;
						echo $pressN;
					?>
				</p><!--press-->
				<p class="detail h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="detail h2o">
					<?php
						$h2oN = 25.7;
						echo $h2oN;
					?>
				</p><!--h2o-->
			<!--leftboxend-->
		</div><!--Neuhausen-->
		
	</div><!--container-->
	</body>
</html>