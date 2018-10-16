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
                    fontSize: 16,
                    itemclick: toggleDataSeries
                },
                toolTip: {
                    shared: true
                },
                data: [{
                        type: "spline",
                        name: "Winterthur Temperatur",
                         xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Winterthur Temperatur (°C)",
                        color:"#1B2A41",
                        dataPoints: data['winterthurTemperatur']
                    },
                    {
                        type: "spline",
                        name: "Winterthur Luftfeuchtigkeit",
                        xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Winterthur Luftfeuchtigkeit (%)",
                        color:"#324A5F",
                        dataPoints: data['winterthurWaterSaturation']
                    },
                    {
                        type: "spline",
                        name: "Winterthur Luftdruck",
                        axisYType: "secondary",
                        xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Winterthur Luftdruck (hPa)",
                        color:"#1D7874",
                        dataPoints: data['winterthurPressure']
                    },
                    {
                        type: "spline",
                        name: "Winterthur Luftqualität",
                        xValueType: "dateTime",
                        showInLegend: true,
                        color:"#679289",
                        dataPoints: data['winterthurAirQuality']
                    },
                    {
                        type: "spline",
                        name: "Romanshorn Temperatur",
                        xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Romanshorn Temperatur (°C)",
                        color:"#E57A44",
                        dataPoints: data['romanshornTemperatur']
                    },
                    {
                        type: "spline",
                        name: "Romanshorn Luftfeuchtigkeit",
                        xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Romanshorn Luftfeuchtigkeit (%)",
                        color:"#ED7E2A",
                        dataPoints: data['romanshornWaterSaturation']
                    },
                    {
                        type: "spline",
                        name: "Romanshorn Luftdruck",
                        axisYType: "secondary",
                        xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Romanshorn Luftdruck (hPa)",
                        color:"#F5B841",
                        dataPoints: data['romanshornPressure']
                    },
                    {
                        type: "spline",
                        name: "Romanshorn Luftqualität",
                        xValueType: "dateTime",
                        showInLegend: true,
                        color:"#FFFB3D",
                        dataPoints: data['romanshornAirQuality']
                    },
                    {
                        type: "spline",
                        name: "Neuhausen Temperatur",
                        xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Neuhausen Temperatur (°C)",
                        color:"#386C0B",
                        dataPoints: data['neuhausenTemperatur']
                    },
                    {
                        type: "spline",
                        name: "Neuhausen Luftfeuchtigkeit",
                        xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Winterthur Neuhausen (%)",
                        color:"#38A700",
                        dataPoints: data['neuhausenWaterSaturation']
                    },
                    {
                        type: "spline",
                        name: "Neuhausen Luftdruck",
                        axisYType: "secondary",
                        xValueType: "dateTime",
                        showInLegend: true,
                        legendText: " Neuhausen Luftdruck (hPa)",
                        color:"#29BF12",
                        dataPoints: data['neuhausenPressure']
                    },
                    {
                        type: "spline",
                        name: "Neuhausen Luftqualität",
                        xValueType: "dateTime",
                        showInLegend: true,
                        color:"#1EFC1E",
                        dataPoints: data['neuhausenAirQuality']
                    }
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