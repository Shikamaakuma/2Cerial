<!DOCTYPE HTML>
<html>
    <head>
	<content ref="text/html" meta charset = "utf8">
        <!--includes jquerry-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    </head>

    <body>
        <script src="js/table_evaluator.js"></script>
        <a href="main_page"> zurück </a>
        <h1> Tabellen </h1>
        
        <h2>y-Achse</h2>
        
        <h3>Temperatur</h3>
        <ul id="temperatureList">
            <li><input type="checkbox" name="winterthurTemperature" value="temperature" autocomplete="off"> Winterthur </li>
            <li><input type="checkbox" name="romanshornTemperature" value="temperature" autocomplete="off"> Romanshorn </li>
            <li><input type="checkbox" name="neuhausenTemperature" value="temperature" autocomplete="off"> Neuhausen </li>
        </ul>    
        
        <h3>Luftfeuchtigkeit</h3>
        <ul id="temperatureList">
            <li><input type="checkbox" name="winterthurWaterSaturation" value="waterSaturation" autocomplete="off"> Winterthur </li>
            <li><input type="checkbox" name="romanshornWaterSaturation" value="waterSaturation" autocomplete="off"> Romanshorn </li>
            <li><input type="checkbox" name="neuhausenWaterSaturation" value="waterSaturation" autocomplete="off"> Neuhausen </li>
        </ul>
         
        <h3>Luftdruck</h3>
        <ul id="temperatureList">
            <li><input type="checkbox" name="winterthurPressure" value="pressure" autocomplete="off"> Winterthur  </li>
            <li><input type="checkbox" name="romanshornPressure" value="pressure" autocomplete="off"> Romanshorn </li>
            <li><input type="checkbox" name="neuhausenPressure" value="pressure" autocomplete="off"> Neuhausen </li>
        </ul>
        
        <h3>Luftqualität</h3>
        <ul id="temperatureList">
            <li><input type="checkbox" name="winterthurAirQuality" value="airQuality" autocomplete="off"> Winterthur  </li>
            <li><input type="checkbox" name="romanshornAirQuality" value="airQuality" autocomplete="off"> Romanshorn </li>
            <li><input type="checkbox" name="neuhausenAirQuality" value="airQuality" autocomplete="off"> Neuhausen </li>
        </ul>
                        
        <p id="table">
            <!--load_table.php will print a graph here depending on which checkboxes have been selected-->
        </p>
    </body>
</html>
