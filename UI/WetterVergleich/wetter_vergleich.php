<?php/*
	//reads temperature of Winterthur
    $winterthur_Temp = fopen("winterthur_temp.txt", "r") or die("Unable to open file!");
    $temp = fgets($winterthur_Temp, 6);
	fgets($winterthur_Temp);
    $date = fgets($winterthur_Temp);
    $time = fgets($winterthur_Temp);
    fclose($winterthur_Temp);
	
	// reads airpressure of Winterthur
    $winterthur_Press = fopen("winterthur_press.txt", "r") or die("Unable to open file!");
    $press = fgets($winterthur_Press);
    fclose($winterthur_Press);
	
	// reads waterconcentration in air of Winterthur
    $winterthur_Temp = fopen("winterthur_h2o.txt", "r") or die("Unable to open file!");
    $temp = fgets($winterthur_h2o);
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
			<div class="leftbox">
				<p class="ort"> Winterthur </p>
				<div class="datetime">
					<p class="time">
					<?php
						$time = "19:00"; /*for test purpose*/
						echo $time; 
					?>
					</p><!--time-->
					<p class ="date">
					<?php
						$date = "20.09.2018"; /*for test purpose*/
						echo $date;
					?>
					</p><!--date-->
				</div><!--date/time-->
				
				<p class ="temp">
				
				<?php
					$temp = 20.5; /*for test purposes*/
					echo $temp."°C";
				?>
				</p><!--temp-->	
				<?php?>
				<!--
				if ($temp > 30){
					echo"<style='background-color: '>";
				}	
				else if($temp <= 20 && $temp > 20){
					echo "<style='background-color: '>";
				}
				else if($temp <= 20 && $temp >10){
					echo "<style='background-color: '>";
				}
				else if($temp <= 10 && $temp >0){
					echo "<style='background-color: '>";
				}
				else if($temp <= 0){
					echo "<style='background-color: '>";
				}*/
				?>-->
			</div><!--leftbox-->
			<div class="detail">
				<p class="pressText">
					Luftdruck
				</p><!--pressText-->
				<p class="press">
					<?php
						$press = 990;
						echo $press;
					?>
				</p><!--press-->
				<p class="h2oText">
					Luftfeuchtigkeit
				</p><!--h2oText-->
				<p class="h2o">
					<?php
						$h2o = 25.7;
						echo $h2o;
					?>
				</p><!--h2o-->
			</div><!--detail-->
		</div><!--Winterthur-->	
	</div><!--container-->
	</body>
</html>