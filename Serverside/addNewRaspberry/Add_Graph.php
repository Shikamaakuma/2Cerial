<?php
//TODO replace all "LOCATION/Location/location" with your choosen new location (case sensitive)
//TODO add part 1 to 3 above their corresponding lines in load_tables.php and part 4 to the corresponding line in table_evaluator.js

//part 1
$QUERYLOCATION = "select Temperature, AirPressure, AirQuality, WaterSaturation, unix_timestamp(subdate(Datum, interval second(Datum) second))*1000 from Readings WHERE Readings.Datum > DATE_SUB(now(), INTERVAL 1 HOUR) AND UserID = 3;";

//part 2
$resLocation = mysqli_query($mysqli, $QUERYLOCATION);
$dataLocation = mysqli_fetch_all($resLocation,MYSQLI_ASSOC);

//part 3
'locationTemperatur'=>createDataPoints($dataLocation,"Temperature"),
'locationPressure'=>createDataPoints($dataLocation,"AirPressure"),
'locationWaterSaturation'=>createDataPoints($dataLocation,"WaterSaturation")

//part 4
,
{
	type: "line",
	name: "Location Temperatur",
	xValueType: "dateTime",
	showInLegend: true,
	visible: true,
	legendText: " Location Temperatur (°C)",
	color:"#386C0B",
	markerType: "none", 
	dataPoints: data['locationTemperatur']
},
{
	type: "line",
	name: "Location Luftfeuchtigkeit",
	xValueType: "dateTime",
	showInLegend: true,
	visible: false,
	legendText: "Location Luftfeuchtigkeit(%)",
	color:"#38A700",
	markerType: "none", 
	dataPoints: data['locationWaterSaturation']
},
{
	type: "line",
	name: "Location Luftdruck",
	axisYType: "secondary",
	xValueType: "dateTime",
	showInLegend: true,
	visible: false,
	legendText: " Location Luftdruck (hPa)",
	color:"#29BF12",
	markerType: "none", 
	dataPoints: data['locationPressure']
}
?>