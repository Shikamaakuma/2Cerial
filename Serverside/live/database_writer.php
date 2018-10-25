<?php
	include "DB.php";
	
	//Checks if all needed Variables are set and gets them from _POST
	if(	isset($_POST['macAddr'])&&
		isset($_POST['pw'])&&
		isset($_POST['temperature'])&&
		isset($_POST['airPressure'])&&
		isset($_POST['humidity'])){
		
		$macAddr = $_POST['macAddr'];
		$pw = $_POST['pw'];
		$temperature = $_POST['temperature'];
		$airPressure = $_POST['airPressure'];
		$humidity = $_POST['humidity'];
		
		
		//Gets the PW associated with the User from the Database and then compares it with the _POSTed one 
		$pwQuery = 'select ID, Pw from Users where MacAddr = "'.$macAddr.'";';
		$resPw = mysqli_query($mysqli, $pwQuery);
		if($resPw != null){
			
			$dataPw = mysqli_fetch_all($resPw,MYSQLI_ASSOC);
		
			if($dataPw[0]['Pw'] == $pw){
				
				//compare current set of values with last set of values &
				//If useridentification was successfull inserts sent data into the Database
				$query_last_insert="select * from Readings where UserID =".$dataPw[0]['ID']."order by Datum desc limit 1;";
				$handler=mysqli_query($mysqli, $query_last_insert);
				$result=mysqli_fetch_all($handler, MYSQL_ASSOC);
				
				//current time
				$timenow = time();
				$datenow = date("Y-m-d H:i:s", $timenow);

				//UNIX timestamp messured
				$datetime = $result[0]['Datum'] ;
				$dtmessured = new DateTime($datetime);
				$datetime = $dtmessured->getTimestamp();

				//UNIX timestamp now
				$dtnow = new DateTime($datenow);
				$now = $dtnow->getTimestamp();

				//calculates timedifference in minutes
				$diff = round(($now - $datetime)/60);
				
				if($diff > 5 || (($result[0] ["Temperature"]-$temperature>!15||$result[0] ["Temperature"]-$temparature<!-15)
				&&($result[0] ["AirPressure"]-$airPressure>!20||$result[0] ["AirPressure"]-$airPressure<!-20)
				&&($result[0] ["WaterSaturation"]-$humidity>!20||$result[0] ["WaterSaturation"]-$humidity<!-20))){
					$insertQuery = "INSERT INTO Readings (Temperature, AirPressure, AirQuality, WaterSaturation,UserID)
							VALUES($temperature,$airPressure,$airQuality,$humidity,".$dataPw[0]['ID'].");";
					if(!mysqli_query($mysqli, $insertQuery)){
						echo "Invalid insert";
					}			
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
?>