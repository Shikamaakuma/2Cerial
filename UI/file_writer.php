 <?php
    include 'database_writer.php';
    date_default_timezone_set('Europe/Zurich');
    
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
        writeToDatabase("winterthur");
    }
    
       if(isset($_POST[Romanshorn_temp])){
        $r_temp = $_POST[Romanshorn_temp];
        $date = date('d.m.Y');
        $time = date('H:i');
        $romanshorn_Temp = fopen("romanshorn_temp.txt", "w") or die("Unable to open file!");
        fwrite($romanshorn_Temp, $r_temp ."\n");
        fwrite($romanshorn_Temp, $date ."\n");
        fwrite($romanshorn_Temp, $time ."\n");
        fclose($romanshorn_Temp);
    }
    
    if(isset($_POST[Romanshorn_press])){
        $r_press = $_POST[Romanshorn_press];
        $romanshorn_Press = fopen("romanshorn_press.txt", "w") or die("Unable to open file!");
        fwrite($romanshorn_Press, $r_press);
        fclose($romanshorn_Press);
    } 
    
    if(isset($_POST[Romanshorn_airqual])){
        $r_air = $_POST[Romanshorn_airqual];
        $romanshorn_Air = fopen("romanshorn_air.txt", "w") or die("Unable to open file!");
        fwrite($romanshorn_Air, $r_air);
        fclose($romanshorn_Air);
    }
    
    if(isset($_POST[Romanshorn_h2o])){
        $r_h2O = $_POST[Romanshorn_h2o];
        $romanshorn_H2o = fopen("romanshorn_h2o.txt", "w") or die("Unable to open file!");
        fwrite($romanshorn_H2o, $r_h2O);
        fclose($romanshorn_H2o);
        writeToDatabase("romanshorn");
    }
?> 