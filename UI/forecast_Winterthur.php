<!DOCTYPE HTML>
<html>
<head>
	<title> Prognosen für Winterthur </title>
	<link rel="stylesheet" type="text/css" href="css/forecast.css" />
	<link rel="stylesheet" type="text/css" href="css/temperature.css" />
</head>
<body>
<div id="nav">
		<div id="tables" class="navbutton"><a href="../tables.php">Wetterarchiv</a></div>
		<div id="main" class="navbutton"><a href="../main_page.php">Haus</a></div>
		<div id="comparison" class="navbutton"><a href="../weather_comparison.php">Standorte</a></div>
</div>
<div id="title">
	<h1 class="info"> Prognosen für Winterthur </h1>
</div>
<div class="container">
<?php
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from weather.forecast where woeid=784723 and u=\'c\' and datetime between date_sub(curdate(), interval 7 days) nd now()';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
    // Make call with cURL
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    // Convert JSON to PHP object
    $phpObj =  json_decode($json);
	
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
		}	
	}
	
	//Kreieren der divs für zehn Tage ab heute
	$daily_data=1;
	foreach ($phpObj->query->results->channel->item->forecast as $db_path){
		if ($db_path->high > 30){
			$W = "T30";
		}	
		else if($db_path->high  <= 30 && $db_path->high > 20){
			$W = "T20";
		}
		else if($db_path->high <= 20 && $db_path->high >10){
			$W = "T10";
		}
		else if($db_path->high <= 10 && $db_path->high >0){
			$W = "T0";
		}
		else if($db_path->high <= 0){
			$W = "T-10";
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
			/*
			 * doesn't work right now.
			 * day 9 and 10 are not wanted
			 */
			if($daily_data == 9 || $daily_data == 10){
				echo "<div class='nope'>";
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
?>

</div><!--container-->

</body>
</html>