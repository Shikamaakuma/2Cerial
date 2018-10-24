<?php
    include DB.php;
	
	header('Access-Control-Allow-Origin: https://2cerials.m2e-demo.ch/tables.php',false);
    
	//creates a datapoint Array used in canvasjs out of a sqlArray
	function createDataPoints($table,$value){
        if($Value == "temperature" || $Value == "waterSaturation"){
            foreach($table as $row){
             $data[] = array("x"=>intval($row['unix_timestamp(subdate(Datum, interval second(datum) second))*1000']),
                 "y"=> floatval($row[$value]));
        }
        }
        else{
            foreach($table as $row){
             $data[] = array("x"=>intval($row['unix_timestamp(subdate(Datum, interval second(datum) second))*1000']),
                 "y"=>intval($row[$value]));
        }
        }
        return $data;
    }
    
	//fetches the needed Data for Graph from Database
    $QUERYROMANSHORN = "select Temperature, AirPressure, AirQuality, WaterSaturation, unix_timestamp(subdate(Datum, interval second(datum) second))*1000 from Readings WHERE Readings.Datum > DATE_SUB(now(), INTERVAL 1 HOUR) AND UserID = 1;";
    $QUERYNEUHAUSEN  = "select Temperature, AirPressure, AirQuality, WaterSaturation, unix_timestamp(subdate(Datum, interval second(datum) second))*1000 from Readings WHERE Readings.Datum > DATE_SUB(now(), INTERVAL 1 HOUR) AND UserID = 2;";
    $QUERYWINTERTHUR = "select Temperature, AirPressure, AirQuality, WaterSaturation, unix_timestamp(subdate(Datum, interval second(datum) second))*1000 from Readings WHERE Readings.Datum > DATE_SUB(now(), INTERVAL 1 HOUR) AND UserID = 3;";
    $resRomanshorn = mysqli_query($mysqli, $QUERYROMANSHORN);
    $dataRomanshorn = mysqli_fetch_all($resRomanshorn,MYSQLI_ASSOC);
    $resNeuhausen = mysqli_query($mysqli, $QUERYNEUHAUSEN);
    $dataNeuhausen = mysqli_fetch_all($resNeuhausen,MYSQLI_ASSOC);
    $resWinterthur = mysqli_query($mysqli, $QUERYWINTERTHUR);
    $dataWinterthur = mysqli_fetch_all($resWinterthur,MYSQLI_ASSOC);
    mysqli_close($mysqli);
	
	//creates one big array out of all datapoint arrays such that we can json_encode it
    $toEncode=array(
    'winterthurTemperatur'=>createDataPoints($dataWinterthur,"Temperature"),
    'winterthurAirQuality'=>createDataPoints($dataWinterthur,"AirQuality"),
    'winterthurPressure'=>createDataPoints($dataWinterthur,"AirPressure"),
    'winterthurWaterSaturation'=>createDataPoints($dataWinterthur,"WaterSaturation"),
    'romanshornTemperatur'=>createDataPoints($dataRomanshorn,"Temperature"),
    'romanshornAirQuality'=>createDataPoints($dataRomanshorn,"AirQuality"),
    'romanshornPressure'=>createDataPoints($dataRomanshorn,"AirPressure"),
    'romanshornWaterSaturation'=>createDataPoints($dataRomanshorn,"WaterSaturation"),
    'neuhausenTemperatur'=>createDataPoints($dataNeuhausen,"Temperature"),
    'neuhausenAirQuality'=>createDataPoints($dataNeuhausen,"AirQuality"),
    'neuhausenPressure'=>createDataPoints($dataNeuhausen,"AirPressure"),
    'neuhausenWaterSaturation'=>createDataPoints($dataNeuhausen,"WaterSaturation"));
    
    print json_encode($toEncode);
