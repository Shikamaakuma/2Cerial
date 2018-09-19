<!--
Aufgabe 18.09.2018

Website-Oberfläche gestalten (html/css):

Ort: Winterthur
Temperatur: -> file Temp_Date
Datum/Zeit: -> file Temp_Date

Temp_Date:
Temperatur = 21.0° C
Datum/Zeit = auto Abruf
-->
<!DOCTYPE HTML>
<html>
	<head>
		<meta charset= "utf-8" />
		<title> Wetter Winterthur </title>
	</head>
	<body>
		<h1> Winterthur </h1>
		<div id="time_date"> 14:15 18.09.2018 </div>
		<div id="temp_winti"> 21.0° C  </div>
		<?php
		echo date('H:i:s D J. F Y');
		?> 
	</body>
</html>