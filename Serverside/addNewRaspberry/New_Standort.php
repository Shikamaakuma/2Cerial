
<!--TODO: Change Standort to name of your desired location-->
<!--TODO: insert parts 1, 2 and 3 above corresponding TODO-line in weather_comparison.php-->

<?php	//Part 1 start
	//Standort start 
	
	//TODO: change userNumber to your UserID. You will get it from 2cerials
	
	//reads temperature of Standort
	$tempStandort = $data[userNumber]['Temperature'];
	// reads airpressure of Standort
	$pressStandort = $data[userNumber]['AirPressure'];
	// reads Saterconcentration in air of Standort
	$h2oStandort = $data[userNumber]['SaterSaturation'];
	// reads datetime of messurement and splits it into $date and $time
	$datetimeStandort = $data[1]['Datum'];
	$messuredStandort = explode(" ", $data[userNumber]['Datum']);
	$dateStandort = $messuredStandort[0];
	$dateStandort = str_replace("-", ".", $dateStandort);
	$dateStandort = explode(".", $dateStandort);
	$dateStandort = $dateStandort[2].".".$dateStandort[1].".".$dateStandort[0];
	$timeStandort = $messuredStandort[1];
	$timeStandort = substr ($timeStandort , 0 , 5 );
	
	//UNIX timestamp messured by Standort
	$dtStandort = new DateTime($datetimeStandort);
	$datetimeStandort = $dtStandort->getTimestamp();

	//calculates timedifference for Standort in minutes
	$diffStandort = round(($now - $datetimeStandort)/60);
	
	//Standort end
	//Part 1 end
?>	

<?php	//Part 2 start
	/* class determination for the different backgroundcolours for Standort*/
	if ($tempStandort > 40){
		$Standort = "Mustafar";
	}
	else if($tempStandort <= 40 && $tempStandort > 35){
		$Standort = "T35";
	}
	else if($tempStandort <= 35 && $tempStandort > 30){
		$Standort = "T30";
	}
	else if($tempStandort <= 30 && $tempStandort > 25){
		$Standort = "T25";
	}
	else if($tempStandort <= 25 && $tempStandort > 20){
		$Standort = "T20";
	}
	else if($tempStandort <= 20 && $tempStandort > 15){
		$Standort = "T15";
	}
	else if($tempStandort <= 15 && $tempStandort > 10){
		$Standortt = "T10";
	}
	else if($tempStandort <= 10 && $tempStandort > 5){
		$Standort = "T5";
	}
	else if($tempStandort <= 5 && $tempStandort > 0){
		$Standort = "T0";
	}
	else if($tempStandort <= 0 && $tempStandort > -10){
		$Standort = "T-10";
	}
	else if($tempStandort <= -10 && $tempStandort > -20){
		$Standort = "T-20";
	}
	else if($tempStandort <= -20){
		$Standort = "Hoth";
	}
	//Part 2 end
?>
	
	<!--part3 start-->
	<?php
	echo "<div id = 'Standort' class='".$Standort." ort'>";
	?>
		<!--leftboxstart-->
			<p class="detail name"> 
				Standort 				
			</p><!--ort-->
			<p class="detail time">
				<?php
					echo $timeStandort; 
				?>
			</p><!--time-->
			<p class ="detail date">
				<?php
					echo $dateStandort;
				?>
			</p><!--date-->
			
			<p class ="detail temp">
				<?php
					echo $tempStandort."°C";
				?>
			</p><!--temp-->	
		<!--leftboxend-->
		<!--rightboxstart-->
			<?php
			if($diffStandort > 5){
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
					echo $pressStandort." hPa";
				?>
			</p><!--press-->
			<p class="detail h2oText">
				Luftfeuchtigkeit
			</p><!--h2oText-->
			<p class="detail h2o">
				<?php
					echo $h2oStandort." %";
				?>
			</p><!--h2o-->
		<!--rightboxend-->
	</div><!--Standort-->	
	<!--part3 end-->