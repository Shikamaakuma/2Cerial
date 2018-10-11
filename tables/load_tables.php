<?php
        //opens mysql connection
    $mysqli = mysqli_connect("2cerials.m2e-demo.ch", "2cerials","sonM5!98", "medemoc_2cerials");
    $mysqli -> set_charset('utf8');
    
        //gets all the informations needed to draw the graph the user defined
    $yAxis=$_POST['newGraph'];
    
        //splits the string $yAxis in such a way that we can use it 
    if(!empty($yAxis)){
        $newGraph = explode(",", $yAxis);
        $city = array();
        $value = array();
        
        foreach ($newGraph as $graph){
            array_push($city,getCity($graph));
            array_push($value,getValue($graph));
        }
        $counter = 0;
        foreach($city as $draw){
            $query = "select $value[$counter] from $draw;";
            $res = mysqli_query($mysqli,$query);
            if(!$res)
            {
                echo "Error MySQLI QUERY: ".mysqli_error($mysqli)."";
                die();
            }
            else{
                $line = mysqli_fetch_all($res,MYSQLI_NUM);
                foreach($line as $element){
                }
                $counter ++;
                echo "<br>";
            }
        }
    }
    
    mysqli_close($mysqli);

        //returns from which city the Value that is represented within the string stems from
    function getCity($graph){
        if(!(strpos($graph,'winterthur') === false)){               
            return 'winterthur';
        }
        else if(!(strpos($graph,'neuhausen') === false)){
            return 'neuhausen';   
        }
        else if(!(strpos($graph,'romanshorn') === false)){
            return 'romanshorn'; 
        }
        else{ echo "something weird went wrong in getCity";
         return "";
        }
    }
    
        //returns what value should be drawn
    function getValue($graph){

        if(strpos($graph,'Temperature') ==! false){               
            return 'temperature';
        }
        else if(strpos($graph,'WaterSaturation') ==! false){
            return 'waterSaturation';   
        }
        else if(strpos($graph,'Pressure') ==! false){
            return 'airpressure'; 
        }
        else if(strpos($graph,'AirQuality') ==! false){
            return 'airQuality';   
        }
        else{ echo "something weird went wrong in getValue";
            return "";
        }
    }
?>