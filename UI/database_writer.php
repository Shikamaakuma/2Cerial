<?php
	include "DB.php";
	
	//Checks if all needed Variables are set and gets them from _POST
	if(	isset($_POST['macAddr'])&&
		isset($_POST['pw'])&&
		isset($_POST['temperature'])&&
		isset($_POST['airPressure'])&&
		isset($_POST['airQuality'])&&
		isset($_POST['humidity'])){
		
		$macAddr = $_POST['macAddr'];
		$pw = $_POST['pw'];
		$temperature = $_POST['temperature'];
		$airPressure = $_POST['airPressure'];
		$airQuality = $_POST['airQuality'];
		$humidity = $_POST['humidity'];
		
		
		//Gets the PW asociated with the User from the Database and then compares it with the _POSTed one 
		$pwQuery = 'select ID, Pw from Users where MacAddr = "'.$macAddr.'";';
		$resPw = mysqli_query($mysqli, $pwQuery);
		if($resPw != null){
			
			$dataPw = mysqli_fetch_all($resPw,MYSQLI_ASSOC);
		
			if($dataPw[0]['Pw'] == $pw){
				
				//If useridentification was successfull inserts sent data into the Database
				$insertQuery = "INSERT INTO Readings (Temperature, AirPressure, AirQuality, WaterSaturation,UserID)VALUES($temperature,$airPressure,$airQuality,$humidity,".$dataPw[0]['ID'].");";
				echo $insertQuery;
				if(!mysqli_query($mysqli, $insertQuery)){
					echo "Invalid insert";
				}
			}
			else{
				echo "invalid User or Password";
			}
		}
		else{
			echo "mysql invalid";
		}
		
	}
	else{
		echo "Invalid Dataset";
	}
	
	mysqli_close($mysqli);
	?>