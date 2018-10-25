<?php
    include "DB.php";
	
	header('Access-Control-Allow-Origin: https://2cerials.m2e-demo.ch/tables.php',false);
    
	//creates a datapoint Array used in canvasjs out of a sqlArray
	function createDataPoints($table,$value){
        if($Value == "Temperature" || $Value == "WaterSaturation"){
            foreach($table as $row){
             $data[] = array("x"=>intval($row['unix_timestamp(subdate(Datum, interval second(Datum) second))*1000']),
                 "y"=> floatval($row[$value]));
        }
        }
        else{
            foreach($table as $row){
             $data[] = array("x"=>intval($row['unix_timestamp(subdate(Datum, interval second(Datum) second))*1000']),
                 "y"=>intval($row[$value]));
        }
        }
        return $data;
    }
    
	//fetches the needed Data for Graph from Database
    $QUERYROMANSHORN = "select Temperature, AirPressure, WaterSaturation, unix_timestamp(subdate(Datum, interval second(Datum) second))*1000 from Readings WHERE Readings.Datum > DATE_SUB(now(), INTERVAL 1 HOUR) AND UserID = 1;";
    $QUERYWINTERTHUR  = "select Temperature, AirPressure, WaterSaturation, unix_timestamp(subdate(Datum, interval second(Datum) second))*1000 from Readings WHERE Readings.Datum > DATE_SUB(now(), INTERVAL 1 HOUR) AND UserID = 2;";
    $QUERYNEUHAUSEN = "select Temperature, AirPressure, WaterSaturation, unix_timestamp(subdate(Datum, interval second(Datum) second))*1000 from Readings WHERE Readings.Datum > DATE_SUB(now(), INTERVAL 1 HOUR) AND UserID = 3;";
    //TODO add part 1
	
	$resRomanshorn = mysqli_query($mysqli, $QUERYROMANSHORN);
    $dataRomanshorn = mysqli_fetch_all($resRomanshorn,MYSQLI_ASSOC);
    $resNeuhausen = mysqli_query($mysqli, $QUERYNEUHAUSEN);
    $dataNeuhausen = mysqli_fetch_all($resNeuhausen,MYSQLI_ASSOC);
    $resWinterthur = mysqli_query($mysqli, $QUERYWINTERTHUR);
    $dataWinterthur = mysqli_fetch_all($resWinterthur,MYSQLI_ASSOC);
	//TODO add Part 2
	
	//disconnects from Database
	mysqli_close($mysqli);
	
	//creates one big array out of all datapoint arrays such that we can json_encode it
    $toEncode=array(
    'winterthurTemperatur'=>createDataPoints($dataWinterthur,"Temperature"),
    'winterthurPressure'=>createDataPoints($dataWinterthur,"AirPressure"),
    'winterthurWaterSaturation'=>createDataPoints($dataWinterthur,"WaterSaturation"),
    'romanshornTemperatur'=>createDataPoints($dataRomanshorn,"Temperature"),
    'romanshornPressure'=>createDataPoints($dataRomanshorn,"AirPressure"),
    'romanshornWaterSaturation'=>createDataPoints($dataRomanshorn,"WaterSaturation"),
    'neuhausenTemperatur'=>createDataPoints($dataNeuhausen,"Temperature"),
    'neuhausenPressure'=>createDataPoints($dataNeuhausen,"AirPressure"),
    'neuhausenWaterSaturation'=>createDataPoints($dataNeuhausen,"WaterSaturation")
	//TODO add Part 3
	);
    
    print json_encode($toEncode);
