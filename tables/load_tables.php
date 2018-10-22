<?php
    header('Access-Control-Allow-Origin: https://2cerials.m2e-demo.ch/tables.php',false);
    function createDataPoints($table,$value){
        if($Value == "temperature" || $Value == "waterSaturation"){
            foreach($table as $row){
             $data[] = array("x"=>intval($row['unix_timestamp(datum)*1000']),
                 "y"=> floatval($row[$value]));
        }
        }
        else{
            foreach($table as $row){
             $data[] = array("x"=>intval($row['unix_timestamp(subdate(datum, interval second(datum) second))*1000']),
                 "y"=>intval($row[$value]));
        }
        }
        return $data;
    }
  
    
        //opens mysql connection
    $mysqli = mysqli_connect("2cerials.m2e-demo.ch", "2cerials","sonM5!98", "medemoc_2cerials");
    $mysqli -> set_charset('utf8');
    
    $QUERYROMANSHORN = "select airpressure, airquality, waterSaturation, temperature, unix_timestamp(subdate(datum, interval second(datum) second))*1000 from romanshorn WHERE romanshorn.datum > DATE_SUB(now(), INTERVAL 1 HOUR);";
    $QUERYNEUHAUSEN  = "select airpressure, airquality, waterSaturation, temperature, unix_timestamp(subdate(datum, interval second(datum) second))*1000 from neuhausen WHERE neuhausen.datum > DATE_SUB(now(), INTERVAL 1 HOUR);";
    $QUERYWINTERTHUR = "select airpressure, airquality, waterSaturation, temperature, unix_timestamp(subdate(datum, interval second(datum) second))*1000 from winterthur WHERE winterthur.datum > DATE_SUB(now(), INTERVAL 1 HOUR);";
    $resRomanshorn = mysqli_query($mysqli, $QUERYROMANSHORN);
    $dataRomanshorn = mysqli_fetch_all($resRomanshorn,MYSQLI_ASSOC);
    $resNeuhausen = mysqli_query($mysqli, $QUERYNEUHAUSEN);
    $dataNeuhausen = mysqli_fetch_all($resNeuhausen,MYSQLI_ASSOC);
    $resWinterthur = mysqli_query($mysqli, $QUERYWINTERTHUR);
    $dataWinterthur = mysqli_fetch_all($resWinterthur,MYSQLI_ASSOC);
    mysqli_close($mysqli);
   
    $toEncode=array(
    'winterthurTemperatur'=>createDataPoints($dataWinterthur,"temperature"),
    'winterthurAirQuality'=>createDataPoints($dataWinterthur,"airquality"),
    'winterthurPressure'=>createDataPoints($dataWinterthur,"airpressure"),
    'winterthurWaterSaturation'=>createDataPoints($dataWinterthur,"waterSaturation"),
    'romanshornTemperatur'=>createDataPoints($dataRomanshorn,"temperature"),
    'romanshornAirQuality'=>createDataPoints($dataRomanshorn,"airquality"),
    'romanshornPressure'=>createDataPoints($dataRomanshorn,"airpressure"),
    'romanshornWaterSaturation'=>createDataPoints($dataRomanshorn,"waterSaturation"),
    'neuhausenTemperatur'=>createDataPoints($dataNeuhausen,"temperature"),
    'neuhausenAirQuality'=>createDataPoints($dataNeuhausen,"airquality"),
    'neuhausenPressure'=>createDataPoints($dataNeuhausen,"airpressure"),
    'neuhausenWaterSaturation'=>createDataPoints($dataNeuhausen,"waterSaturation"));
    
    print json_encode($toEncode);
