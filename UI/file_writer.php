 <?php
    $saveThis = $_POST[Winterthur_temp];
    $winterthur_Temp = fopen("winterthur_temp.txt", "w") or die("Unable to open file!");
    fwrite($winterthur_Temp, $saveThis);
    fclose($myfile);
?> 