<!DOCTYPE HTML>
<html>
<head>
	<title> Prognosen für Winterthur </title>
	<link rel="stylesheet" type="text/css" href="css/forecast.css" />
	<link rel="stylesheet" type="text/css" href="css/temperature.css" />
</head>
<body>
<div id="nav">
		<div id="tables" class="navbutton"><a href="tables.php">Wetterarchiv</a></div>
		<div id="main" class="navbutton"><a href="main_page.php">Haus</a></div>
		<div id="comparison" class="navbutton"><a href="weather_comparison.php">Wetter Vergleich</a></div>
</div>
<div id="title">
	<h1 class="info"> Prognosen für Winterthur </h1>
</div>
<div class="container">
<?php
    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";
    $yql_query = 'select * from weather.forecast where woeid in (select woeid from geo.places(1) where text="winterthur, zh") and u=\'c\'';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";
    // Make call with cURL
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    // Convert JSON to PHP object
    $phpObj =  json_decode($json);
	
	//Übersetzung der Wetterbeschreibung
	function transl_engl2de($weather){
		if($weather=="Mostly Cloudy"){
			return "Überwiegend bewölkt";
		}		
		if($weather=="Partly Cloudy"){
			return "Teilweise bewölkt";
		}		
		if($weather=="Mostly Sunny"){
			return "Überwiegend sonnig";
		}		
		if($weather=="Rain"){
			return "Regen";
		}		
		if($weather=="Hurricane"){
			return "Hurrikan";
		}		
		if($weather=="Severe Thunderstorms"){
			return "Schweres Gewitter";
		}		
		if($weather=="Thunderstorms"){
			return "Gewitter";
		}	
		if($weather=="Mixed Rain And Snow"){
			return "Regen und Schnee gemischt";
		}
		if($weather=="Mixed Rain And Sleet"){
			return "Regen und Schneeregen gemischt";
		}
		if($weather=="Mixed Snow And Sleet"){
			return "Schnee und Regen gemischt";
		}
		if($weather=="Freezing Drizzle"){
			return "Gefrierender Nieselregen";
		}
		if($weather=="Drizzle"){
			return "Überwiegend bewölkt";
		}
		if($weather=="Freezing Rain"){
			return "Gefrierender Regen";
		}
		if($weather=="Showers"){
			return "Schauer";
		}
		if($weather=="Snow Flurries"){
			return "Schneeflocken";
		}
		if($weather=="Light Snow Showers"){
			return "Leichte Schneeschauer";
		}
		if($weather=="Blowing Snow"){
			return "Dichter Schnee";
		}
		if($weather=="Snow"){
			return "Schnee";
		}
		if($weather=="Hail"){
			return "Hagel";
		}
		if($weather=="Sleet"){
			return "Nieselregen";
		}
		if($weather=="Dust"){
			return "Staub";
		}
		if($weather=="Foggy"){
			return "Nebel";
		}
		if($weather=="Haze"){
			return "Dunst";
		}
		if($weather=="Smoky"){
			return "Rauch";
		}
		if($weather=="Blustery"){
			return "Stürmisch";
		}
		if($weather=="Windy"){
			return "Wind";
		}
		if($weather=="Cold"){
			return "Kalt";
		}
		if($weather=="Cloudy"){
			return "Bewölkt";
		}
		if($weather=="Clear"){
			return "Klar";
		}
		if($weather=="Sunny"){
			return "Sonnig";
		}
		if($weather=="Fair"){
			return "Hell";
		}
		if($weather=="Mixed Rain And Hail"){
			return "Regen und Hagel";
		}
		if($weather=="Hot"){
			return "Heiss";
		}
		if($weather=="Isolated Thunderstorms"){
			return "Einzelne Gewitter";
		}
		if($weather=="Scattered Thunderstorms"){
			return "Vereinzelte Gewitter";
		}
		if($weather=="Scattered Rain"){
			return "Vereinzelter Regen";
		}
		if($weather=="Heavy Snow"){
			return "Schwerer Schnee";
		}
		
		if($weather=="Scattered Snow Showers"){
			return "Vereinzelte Schneeschauer";
		}
		if($weather=="Thundershowers"){
			return "Gewitterregen";
		}
		if($weather=="Snow Showers"){
			return "Schneeschauer";
		}
		if($weather=="Isolated Thundershowers"){
			return "Vereinzelte Gewitterregen";
		}
		if($weather=="Not Available"){
			return "Wetter nicht vorhanden";
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
		if($daily_data==1){
				echo "<div class='today'>";
				echo "<h2>Heute</h2>";
		}
		else if($daily_data==2){
				echo "<div class='tomorrow'>";
				echo "<h2>Morgen</h2>";
		}
		else if($daily_data==3){
			echo "<div class='daft1'>";
			echo "<h2>Übermorgen</h2>";	
		}
		else if($daily_data==4){
			echo "<div class='daft2'>";
			echo "<h2>In 3 Tagen</h2>";	
		}
		else if($daily_data==5){
			echo "<div class='daft3'>";
			echo "<h2>In 4 Tagen</h2>";	
		}
		else if($daily_data==6){
			echo "<div class='daft4'>";
			echo "<h2>In 5 Tagen</h2>";	
		}
		else if($daily_data==7){
			echo "<div class='daft5'>";
			echo "<h2>In 6 Tagen</h2>";	
		}
		else if($daily_data==8){
			echo "<div class='daft6'>";
			echo "<h2>In 7 Tagen</h2>";	
		}
		else if($daily_data==9){
			echo "<div class='daft7'>";
			echo "<h2>In 8 Tagen</h2>";	
		}
		else if($daily_data==10){
			echo "<div class='daft8'>";
			echo "<h2>In 9 Tagen</h2>";
		}
		
		$timestamp_foo=strtotime($db_path->date);
		setlocale(LC_TIME, 'German');
		echo "<p class='date'>".strftime('%A, %d. %B %Y', $timestamp_foo)."</br></p>";
		
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