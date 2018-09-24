 <?php
    if(isset($_POST[Winterthur_temp])){
        $w_temp = $_POST[Winterthur_temp];
        $winterthur_Temp = fopen("winterthur_temp.txt", "w") or die("Unable to open file!");
        fwrite($winterthur_Temp, $w_temp);
        fwrite($winterthur_Temp, $w_temp);
        fclose($winterthur_Temp);
    }
    
    if(isset($_POST[Winterthur_press])){
        $w_press = $_POST[Winterthur_press];
        $winterthur_Press = fopen("winterthur_press.txt", "w") or die("Unable to open file!");
        fwrite($winterthur_Press, $w_press);
        fwrite($winterthur_Press, $w_press);
        fclose($winterthur_Press);
    } 
    
    if(isset($_POST[Winterthur_airqual])){
        $w_air = $_POST[Winterthur_airqual];
        $winterthur_Air = fopen("winterthur_air.txt", "w") or die("Unable to open file!");
        fwrite($winterthur_Air, $w_air);
        fwrite($winterthur_Air, $w_air);
        fclose($winterthur_Air);
    }
    
    if(isset($_POST[Winterthur_h2o])){
        $w_h2O = $_POST[Winterthur_h2o];
        $winterthur_H2o = fopen("winterthur_h2o.txt", "w") or die("Unable to open file!");
        fwrite($winterthur_H2o, $w_h2O);
        fwrite($winterthur_H2o, $w_h2O);
        fclose($winterthur_H2o);
    }
?> 