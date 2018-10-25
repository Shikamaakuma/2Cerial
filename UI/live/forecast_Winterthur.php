<!DOCTYPE HTML>
<?php
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = "select * from weather.forecast where woeid=784723 and u='c'";
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
    // Make call with cURL
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    // Convert JSON to PHP object
    $phpObj =  json_decode($json);
	
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
	<title> Prognosen für Winterthur </title>
	<link rel="stylesheet" type="text/css" media="all and (orientation: portrait)" href="css/navbar_mobile.css" />
	<link rel="stylesheet" type="text/css" media="all and (orientation: portrait)" href="css/forecast_mobile.css" />
	<link rel="stylesheet" type="text/css" media="all and (orientation: landscape)" href="css/navbar.css" />
	<link rel="stylesheet" type="text/css" media="all and (orientation: landscape)" href="css/forecast.css" />
	<link rel="stylesheet" type="text/css" href="css/temperature.css" />
</head>
<body>
<div id="nav">
		<div id="left_button" class="navbutton"><a href="https://2cerials.m2e-demo.ch/tables.php">Wetterarchiv</a></div>
		<div id="middle_button" class="navbutton"><a href="index.php">Startseite</a></div>
		<div id="right_button" class="navbutton"><a href="weather_comparison.php">Standorte</a></div>
</div>
<?php
	
if(isset($phpObj->query->results->channel->item->forecast)){
	echo
	"<div id='title'>
		<h1 class='info'> Prognosen für Winterthur </h1>
	</div>";

echo "<div class='container'>";
	//Übersetzung der Wetterbeschreibung
	function transl_engl2de($weather){
		switch ($weather){
			case "Mostly Cloudy":
				return "Überwiegend bewölkt";
				break;		
			case "Partly Cloudy":
				return "Teilweise bewölkt";
				break;	
			case "Mostly Sunny":
				return "Überwiegend sonnig";
				break;
			case "Rain":
				return "Regen";
				break;
			case "Hurricane":
				return "Hurrikan";
				break;
			case "Severe Thunderstorms":
				return "Schweres Gewitter";
				break;
			case "Thunderstorms":
				return "Gewitter";
				break;
			case "Mixed Rain And Snow":
				return "Regen und Schnee gemischt";
				break;
			case "Rain And Snow":
				return "Regen und Schnee gemischt";
				break;
			case "Mixed Rain And Sleet":
				return "Regen und Schneeregen gemischt";
				break;
			case "Mixed Snow And Sleet":
				return "Schnee und Regen gemischt";
				break;
			case "Freezing Drizzle":
				return "Gefrierender Nieselregen";
				break;
			case "Drizzle":
				return "Überwiegend bewölkt";
				break;
			case "Freezing Rain":
				return "Gefrierender Regen";
				break;
			case "Showers":
				return "Schauer";
				break;
			case "Snow Flurries":
				return "Schneeflocken";
				break;
			case "Light Snow Showers":
				return "Leichte Schneeschauer";
				break;
			case "Blowing Snow":
				return "Dichter Schnee";
				break;
			case "Snow":
				return "Schnee";
				break;
			case "Hail":
				return "Hagel";
				break;
			case "Sleet":
				return "Nieselregen";
				break;
			case "Dust":
				return "Staub";
				break;
			case "Foggy":
				return "Nebel";
				break;
			case "Haze":
				return "Dunst";
				break;
			case "Smoky":
				return "Rauch";
				break;
			case "Blustery":
				return "Stürmisch";
				break;
			case "Windy":
				return "Wind";
				break;
			case "Cold":
				return "Kalt";
				break;
			case "Cloudy":
				return "Bewölkt";
				break;
			case "Clear":
				return "Klar";
				break;
			case "Sunny":
				return "Sonnig";
				break;
			case "Fair":
				return "Hell";
				break;
			case "Mixed Rain And Hail":
				return "Regen und Hagel";
				break;
			case "Hot":
				return "Heiss";
				break;
			case "Isolated Thunderstorms":
				return "Einzelne Gewitter";
				break;
			case "Scattered Thunderstorms":
				return "Vereinzelte Gewitter";
				break;
			case "Scattered Showers":
				return "Vereinzelte Regenschauer";
				break;
			case "Scattered Rain":
				return "Vereinzelter Regen";
				break;
			case "Heavy Snow":
				return "Schwerer Schnee";
				break;
			case "Scattered Snow Showers":
				return "Vereinzelte Schneeschauer";
				break;
			case "Thundershowers":
				return "Gewitterregen";
				break;
			case "Snow Showers":
				return "Schneeschauer";
				break;
			case "Isolated Thundershowers":
				return "Vereinzelte Gewitterregen";
				break;
			case "Not Available":
				return "Wetter nicht vorhanden";
				break;
			default : 
				return $weather;
				break;
		}
	}
	
	//Kreieren der divs für zehn Tage ab heute
	$daily_data=1;
	
	for ($counter = 0; $counter < 8; $counter++){
		$db_path = $phpObj->query->results->channel->item->forecast[$counter];
		//Einteilung der Klassen für die verschiedenen Hintergrundfarben
		if ($db_path->high > 40){
			$W = "Mustafar";
		}
		else if($db_path->high  <= 40 && $db_path->high > 35){
			$W = "T35";
		}		
		else if($db_path->high  <= 35 && $db_path->high > 30){
			$W = "T30";
		}
		else if($db_path->high  <= 30 && $db_path->high > 25){
			$W = "T25";
		}
		else if($db_path->high  <= 25 && $db_path->high > 20){
			$W = "T20";
		}
		else if($db_path->high  <= 20 && $db_path->high > 15){
			$W = "T15";
		}
		else if($db_path->high  <= 15 && $db_path->high > 10){
			$W = "T10";
		}
		else if($db_path->high  <= 10 && $db_path->high > 5){
			$W = "T5";
		}
		else if($db_path->high <= 5 && $db_path->high > 0){
			$W = "T0";
		}
		else if($db_path->high <= 0 && $db_path->high > -10){
			$W = "T-10";
		}
		else if($db_path->high  <= -10 && $db_path->high > -20){
			$W = "T-20";
		}
		else if($db_path->high <= -20){
			$W = "Hoth";
		}
		echo "<div class='".$W." days'>";
		
		switch ($daily_data){
			case 1:
					echo "<div class='today'>";
					echo "<h2>Heute</h2>";
					break;
			case 2:
					echo "<div class='tomorrow'>";
					echo "<h2>Morgen</h2>";
					break;
			case 3:
					echo "<div class='daft1'>";
					echo "<h2>Übermorgen</h2>";	
					break;
			case 4:
					echo "<div class='daft2'>";
					echo "<h2>In 3 Tagen</h2>";	
					break;
			case 5:
					echo "<div class='daft3'>";
					echo "<h2>In 4 Tagen</h2>";
					break;
			case 6:
					echo "<div class='daft4'>";
					echo "<h2>In 5 Tagen</h2>";	
					break;
			case 7:
					echo "<div class='daft5'>";
					echo "<h2>In 6 Tagen</h2>";	
					break;
			case 8:
					echo "<div class='daft6'>";
					echo "<h2>In 7 Tagen</h2>";	
					break;
		}
		
		$timestamp_foo=strtotime($db_path->date);
		setlocale(LC_TIME, 'German');
		echo "<p class='date'>".strftime('%A', $timestamp_foo)."</br>".strftime('%d. %B %Y', $timestamp_foo)."</br></p>";
		
		echo "<p class='high info'>Höchste Temperatur: ".$db_path->high . "°C</br></p>";
		
		echo "<p class='low info'>Niedrigste Temperatur: ".$db_path->low . "°C</br></p>";

		$text=$db_path->text;
		echo "<p class='text info'>".transl_engl2de($text)."</br></p>";
		
		echo "</div>";
		echo "</div>";
		$daily_data++;
	}


echo "</div><!--container-->";
}
else{
	echo
	"<div id='title'>
		<h1 class='info'>Prognose für Winterthur nicht verfügbar</h1>
	</div>";
}
?>

</body>
</html>