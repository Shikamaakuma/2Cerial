 <?php
    date_default_timezone_set('Europe/Zurich');
    include 'DB.php';
    //$next = false;
    
    if(isset($_POST[Winterthur_temp])){
        $w_temp = $_POST[Winterthur_temp];
        $date = date('d.m.Y');
        $time = date('H:i');
        $winterthur_Temp = fopen("winterthur_temp.txt", "w") or die("Unable to open file!");
        fwrite($winterthur_Temp, $w_temp ."\n");
        fwrite($winterthur_Temp, $date ."\n");
        fwrite($winterthur_Temp, $time ."\n");
        fclose($winterthur_Temp);
    }
    
    if(isset($_POST[Winterthur_press])){
        $w_press = $_POST[Winterthur_press];
        $winterthur_Press = fopen("winterthur_press.txt", "w") or die("Unable to open file!");
        fwrite($winterthur_Press, $w_press);
        fclose($winterthur_Press);
    } 
    
    if(isset($_POST[Winterthur_airqual])){
        $w_air = $_POST[Winterthur_airqual];
        $winterthur_Air = fopen("winterthur_air.txt", "w") or die("Unable to open file!");
        fwrite($winterthur_Air, $w_air);
        fclose($winterthur_Air);
    }
    
    if(isset($_POST[Winterthur_h2o])){
        $w_h2O = $_POST[Winterthur_h2o];
        $winterthur_H2o = fopen("winterthur_h2o.txt", "w") or die("Unable to open file!");
        fwrite($winterthur_H2o, $w_h2O);
        fclose($winterthur_H2o);
        //$next = true;
    }
    
    //if($next = true){
    //    $query = "INSERT INTO Winterthur(Temp,Press,Air,H2o)VALUES($w_temp,$w_press,$w_air,$w_h2o)";
    //    mysqli_query($mysqli, $$query);
    //    $next = false;
    //}
?> 