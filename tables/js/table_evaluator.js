$(document).ready(function () {
    $.ajax({
        url: "https://2cerials.m2e-demo.ch/load_tables.php",
        type: "GET",
        dataType: "JSON",
        success: function (data) {
            console.log(data);
            var chart = new CanvasJS.Chart("graph", {
                animationEnabled: true,
                title: {
                    text: "Graph Moff Tarkin"
                },
                legend: {
                    cursor: "pointer",
                    fontSize:20,
                    itemclick: toggleDataSeries
                },
				toolTip: {
					cornerRadius:10,
					shared: true,
					fontSize: 20,
					contentFormatter: function (e) {
						var content = " ";
							for (var i = 0; i < e.entries.length; i++) {
							if(e.entries[i].dataSeries.visible == true){
								content += e.entries[i].dataSeries.name + ": " + "<strong>" + e.entries[i].dataPoint.y + "</strong>";
								content += "<br/>";
							}
						}
						return content;
					}
				},   
				axisY:{
					title: "Temperatur(°C) und Luftfeuchtigkeit(%)",
					includeZero: false
				},
				axisY2:{
					title: "Luftdruck(hPa)",
					includeZero: false
				},
                data: [{
                        type: "spline",
                        name: "Winterthur Temperatur",
                         xValueType: "dateTime",
                        showInLegend: true,
						visible: true,
                        legendText: " Winterthur Temperatur (°C)",
                        color:"#1B2A41",
						markerType: "none", 
                        dataPoints: data['winterthurTemperatur']
                    },
                    {
                        type: "spline",
                        name: "Winterthur Luftfeuchtigkeit",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        legendText: " Winterthur Luftfeuchtigkeit (%)",
                        color:"#324A5F",
						markerType: "none",
                        dataPoints: data['winterthurWaterSaturation']
                    },
                    {
                        type: "spline",
                        name: "Winterthur Luftdruck",
                        axisYType: "secondary",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        legendText: " Winterthur Luftdruck (hPa)",
                        color:"#1D7874",
						markerType: "none",
                        dataPoints: data['winterthurPressure']
                    },
                    /*{
                        type: "spline",
                        name: "Winterthur Luftqualität",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        color:"#679289",
						markerType: "none", 
                        dataPoints: data['winterthurAirQuality']
                    },*/
                    {
                        type: "spline",
                        name: "Romanshorn Temperatur",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: true,
                        legendText: " Romanshorn Temperatur (°C)",
                        color:"#E57A44",
						markerType: "none",
                        dataPoints: data['romanshornTemperatur']
                    },
                    {
                        type: "spline",
                        name: "Romanshorn Luftfeuchtigkeit",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        legendText: " Romanshorn Luftfeuchtigkeit (%)",
                        color:"#ED7E2A",
						markerType: "none",
                        dataPoints: data['romanshornWaterSaturation']
                    },
                    {
                        type: "spline",
                        name: "Romanshorn Luftdruck",
                        axisYType: "secondary",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        legendText: " Romanshorn Luftdruck (hPa)",
                        color:"#F5B841",
						markerType: "none", 
                        dataPoints: data['romanshornPressure']
                    },
                    /*{
                        type: "spline",
                        name: "Romanshorn Luftqualität",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        color:"#FFFB3D",
						markerType: "none", 
                        dataPoints: data['romanshornAirQuality']
                    },*/
                    {
                        type: "spline",
                        name: "Neuhausen Temperatur",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: true,
                        legendText: " Neuhausen Temperatur (°C)",
                        color:"#386C0B",
						markerType: "none", 
                        dataPoints: data['neuhausenTemperatur']
                    },
                    {
                        type: "spline",
                        name: "Neuhausen Luftfeuchtigkeit",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        legendText: "Neuhausen Luftfeuchtigkeit(%)",
                        color:"#38A700",
						markerType: "none", 
                        dataPoints: data['neuhausenWaterSaturation']
                    },
                    {
                        type: "spline",
                        name: "Neuhausen Luftdruck",
                        axisYType: "secondary",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        legendText: " Neuhausen Luftdruck (hPa)",
                        color:"#29BF12",
						markerType: "none", 
                        dataPoints: data['neuhausenPressure']
                    },
                   /* {
                        type: "spline",
                        name: "Neuhausen Luftqualität",
                        xValueType: "dateTime",
                        showInLegend: true,
						visible: false,
                        color:"#1EFC1E",
						markerType: "none",
                        dataPoints: data['neuhausenAirQuality']
                    }*/
                ]
            });
            chart.render();

            function toggleDataSeries(e) {
                if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                    e.dataSeries.visible = false;
                } else {
                    e.dataSeries.visible = true;
                }
                chart.render();
            }

        },
        error: function (data) {

        }
    });
});