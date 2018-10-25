<!DOCTYPE HTML>
<?php
/*messures temp for backgroundimage data*/
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
	
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html" meta charset="utf-8" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: portrait)" href="css/navbar_mobile.css" />
        <link rel="stylesheet" type="text/css" media="all and (orientation: portrait)" href="css/archive_mobile.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: landscape)" href="css/navbar.css" />
		<link rel="stylesheet" type="text/css" media="all and (orientation: landscape)" href="css/archive.css" />
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script type="text/javascript" src="js/jquery.canvasjs.min.js"></script>
        <script type="text/javascript" src="js/table_evaluator.js"></script>
    </head>

    <body>
        <div id="nav">
		<div id="left_button" class="navbutton"><a href="weather_comparison.php">Standorte</a></div>
		<div id="middle_button" class="navbutton"><a href="index.php">Startseite</a></div>
		<div id="right_button" class="navbutton"><a href="forecast_Winterthur.php">Prognose</a></div>
	</div>
        <div id="graph" ></div>
    </body>
</html>
