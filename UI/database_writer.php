<?php
        //reads all values from the textfiles attributed to $location and writes them into the database
    function writeToDatabase($location){
        $mysqli = mysqli_connect("2cerials.m2e-demo.ch", "2cerials","sonM5!98", "medemoc_2cerials");
        $mysqli -> set_charset('utf8');
        
        $file = fopen($location."_temp.txt", "r") or die("Unable to open file!");
        $temp = fgets($file,6);
        fclose($file);
        
        $file = fopen($location."_press.txt", "r") or die("Unable to open file!");
        $press = fgets($file);
        fclose($file);
        
        $file = fopen($location."_air.txt", "r") or die("Unable to open file!");
        $air = fgets($file);
        fclose($file);
        
        $file = fopen($location."_h2o.txt", "r") or die("Unable to open file!");
        $h2o = fgets($file);
        fclose($file);
        
        $query = "INSERT INTO $location (airpressure,airquality,waterSaturation,temperature)VALUES($press,$air,$h2o,$temp)";
        mysqli_query($mysqli, $query);    
        mysqli_close($mysqli);
    }
?>