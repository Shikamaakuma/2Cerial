<?php	
	include "DB.php";
	
	$query = "select * from Readings where UserID = 2 order by Datum desc limit 1;";
	$resQuery = mysqli_query($mysqli,$query);
	if(!$resQuery){
		echo "query invalid";
	}
	else{
		$data = mysqli_fetch_all($resQuery,MYSQLI_ASSOC);
	}
	
	$temp = $data[0]['Temperature'];
	$datetime = $data[0]['Datum'];
	$messured = explode(" ", $data[0]['Datum']);
	$date = $messured[0];
	$date = str_replace("-", ".", $date);
	$time = $messured[1];
	$time = substr ($time , 0 , 5 );
	
	
	//current time
	$timenow = time();
	$datenow = date("Y-m-d H:i:s", $timenow);
	
	//UNIX timestamp messured
	//$datetime = $date .' '. $time;
	$dtmessured = new DateTime($datetime);
	$datetime = $dtmessured->getTimestamp();

	//UNIX timestamp now
	$dtnow = new DateTime($datenow);
	$now = $dtnow->getTimestamp();

	//calculates timedifference
	$diff = round(($now - $datetime)/60);
	
?> 
<?php
	/*change of the background image dependent on temperature*/
	/*$temp = 40.5; /*for test purposes*/
	if($temp > 40){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_mustafar.css' />";
	}
	else if($temp <= 40 && $temp > 15){
		echo "<link rel='stylesheet' type='text/css' media='all and (orientation: landscape)' href='css/main_page_warm.css' />";
	}
	else if($temp <= 15 && $temp > -20){
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
	<!-- displays the different possible colours -->
	<div id="infobar">
		<p class="info colour12 Mustafar">
			</br> > 40 </br>
		</p>
		<p class="info colour11 T35">
			35</br> - </br>40
		</p>
		<p class="info colour10 T30">
			30</br> - </br>35
		</p>
		<p class="info colour9 T25">
			25</br> - </br>30
		</p>
		<p class="info colour8 T20">
			20</br> - </br>25
		</p>
		<p class="info colour7 T15">
			15</br> - </br>20
		</p>
		<p class="info colour6 T10">
			10</br> - </br>15
		</p>
		<p class="info colour5 T5">
			5</br> - </br>10
		</p>
		<p class="info colour4 T0">
			0</br> - </br>10
		</p>
		<p class="info colour3 T-10">
			-10</br> - </br>0
		</p>
		<p class="info colour2 T-20">
			-10</br> - </br>-20
		</p>
		<p class="info colour1 Hoth">
			</br> < -20 </br>
		</p>
	</div><!-- infobar-->
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

				
