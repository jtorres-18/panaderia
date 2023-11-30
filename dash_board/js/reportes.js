$.ajax({
  type: "post",
  url: "procesar_reportes.php",
  data: {
      reporte: "ventas"
  },
  success: function(respuesta) {
      const ventas = JSON.parse(respuesta);
      grafico1(ventas); 
  },
});




function grafico1(ventas){
am5.ready(function() {

// Create root element
// https://www.amcharts.com/docs/v5/getting-started/#Root_element
var root = am5.Root.new("ventas_semana");


// Set themes
// https://www.amcharts.com/docs/v5/concepts/themes/
root.setThemes([
am5themes_Animated.new(root)
]);


// Create chart
// https://www.amcharts.com/docs/v5/charts/xy-chart/
var chart = root.container.children.push(am5xy.XYChart.new(root, {
panX: true,
panY: true,
wheelX: "none",
wheelY: "none"
}));

// We don't want zoom-out button to appear while animating, so we hide it
chart.zoomOutButton.set("forceHidden", true);


// Create axes
// https://www.amcharts.com/docs/v5/charts/xy-chart/axes/
var xRenderer = am5xy.AxisRendererX.new(root, {
minGridDistance: 30
});
xRenderer.labels.template.setAll({
rotation: -90,
centerY: am5.p50,
centerX: 0,
paddingRight: 15
});
xRenderer.grid.template.set("visible", false);

var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
maxDeviation: 0.3,
categoryField: "dia",
renderer: xRenderer
}));

var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
maxDeviation: 0.3,
min: 0,
renderer: am5xy.AxisRendererY.new(root, {})
}));


// Add series
// https://www.amcharts.com/docs/v5/charts/xy-chart/series/
var series = chart.series.push(am5xy.ColumnSeries.new(root, {
name: "Series 1",
xAxis: xAxis,
yAxis: yAxis,
valueYField: "value",
categoryXField: "dia"
}));

// Rounded corners for columns
series.columns.template.setAll({
cornerRadiusTL: 5,
cornerRadiusTR: 5,
strokeOpacity: 0
});

// Make each column to be of a different color
series.columns.template.adapters.add("fill", function (fill, target) {
return chart.get("colors").getIndex(series.columns.indexOf(target ));
});

series.columns.template.adapters.add("stroke", function (stroke, target) {
return chart.get("colors").getIndex(series.columns.indexOf(target ));
});

// Add Label bullet
series.bullets.push(function () {
return am5.Bullet.new(root, {
    locationY: 1,
    sprite: am5.Label.new(root, {
    text: "{valueYWorking.formatNumber('#.')}",
    fill: root.interfaceColors.get("alternativeText"),
    centerY: 0,
    centerX: am5.p50,
    populateText: true
    })
});
});







// Set data
var data = [{
"dia": "lunes",
"value": parseFloat(ventas[0].total_vendido_dia)
}, {
"dia": "martes",
"value": parseFloat(ventas[1].total_vendido_dia)
}, {
"dia": "miercoles",
"value": parseFloat(ventas[2].total_vendido_dia)
}, {
"dia": "jueves",
"value": parseFloat(ventas[3].total_vendido_dia)
}, {
"dia": "viernes",
"value": parseFloat(ventas[4].total_vendido_dia)
}, {
"dia": "sabado",
"value": parseFloat(ventas[5].total_vendido_dia)
}, {
"dia": "domingo",
"value": parseFloat(ventas[6].total_vendido_dia)
}];

xAxis.data.setAll(data);
series.data.setAll(data);

// update data with random values each 1.5 sec





// Get series item by category
function getSeriesItem(category) {
for (var i = 0; i < series.dataItems.length; i++) {
    var dataItem = series.dataItems[i];
    if (dataItem.get("categoryX") == category) {
    return dataItem;
    }
}
}


// Axis sorting
function sortCategoryAxis() {

  // Sort by value
series.dataItems.sort(function (x, y) {
    return y.get("valueY") - x.get("valueY"); // descending
    //return y.get("valueY") - x.get("valueY"); // ascending
})

  // Go through each axis item
am5.array.each(xAxis.dataItems, function (dataItem) {
    // get corresponding series item
    var seriesDataItem = getSeriesItem(dataItem.get("category"));

    if (seriesDataItem) {
      // get index of series data item
    var index = series.dataItems.indexOf(seriesDataItem);
      // calculate delta position
    var deltaPosition = (index - dataItem.get("index", 0)) / series.dataItems.length;
      // set index to be the same as series data item index
    dataItem.set("index", index);
      // set deltaPosition instanlty
    dataItem.set("deltaPosition", -deltaPosition);
      // animate delta position to 0
    dataItem.animate({
        key: "deltaPosition",
        to: 0,
        duration: 1000,
        easing: am5.ease.out(am5.ease.cubic)
    })
    }
});

  // Sort axis items by index.
  // This changes the order instantly, but as deltaPosition is set,
  // they keep in the same places and then animate to true positions.
xAxis.dataItems.sort(function (x, y) {
    return x.get("index") - y.get("index");
});
}


// Make stuff animate on load
// https://www.amcharts.com/docs/v5/concepts/animations/
series.appear(1000);
chart.appear(1000, 100);

}); // end am5.ready()





}









//segundo grafico

function grafico2(producto){
  am5.ready(function() {

    // Create root element
    // https://www.amcharts.com/docs/v5/getting-started/#Root_element
    var root = am5.Root.new("mas_vendido");
    
    // Set themes
    // https://www.amcharts.com/docs/v5/concepts/themes/
    root.setThemes([
    am5themes_Animated.new(root)
    ]);
    
    // Create chart
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/
    var chart = root.container.children.push(am5percent.PieChart.new(root, {
    radius: am5.percent(90),
    innerRadius: am5.percent(50),
    layout: root.horizontalLayout
    }));
    
    // Create series
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Series
    var series = chart.series.push(am5percent.PieSeries.new(root, {
    name: "Series",
    valueField: "sales",
    categoryField: "producto"
    }));
    
    // Set data
    // https://www.amcharts.com/docs/v5/charts/percent-charts/pie-chart/#Setting_data

    




    series.data.setAll([{
    producto: producto[0].nameProd,
    sales: producto[0].total_vendido
    }, {
        producto: producto[1].nameProd,
    sales: producto[1].total_vendido
    }, {
        producto: producto[2].nameProd,
    sales: producto[2].total_vendido
    }, {
        producto: producto[3].nameProd,
    sales: producto[3].total_vendido
    }, {
        producto: producto[4].nameProd,
    sales: producto[4].total_vendido
    }]);
    
    // Disabling labels and ticks
    series.labels.template.set("visible", false);
    series.ticks.template.set("visible", false);
    
    // Adding gradients
    series.slices.template.set("strokeOpacity", 0);
    series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
    stops: [{
        brighten: -0.8
    }, {
        brighten: -0.8
    }, {
        brighten: -0.5
    }, {
        brighten: 0
    }, {
        brighten: -0.5
    }]
    }));
    
    // Create legend
    // https://www.amcharts.com/docs/v5/charts/percent-charts/legend-percent-series/
    var legend = chart.children.push(am5.Legend.new(root, {
    centerY: am5.percent(50),
    y: am5.percent(50),
    layout: root.verticalLayout
    }));
    // set value labels align to right
    legend.valueLabels.template.setAll({ textAlign: "right" })
    // set width and max width of labels
    legend.labels.template.setAll({ 
    maxWidth: 140,
    width: 140,
    oversizedBehavior: "wrap"
    });
    
    legend.data.setAll(series.dataItems);
    
    
    // Play initial series animation
    // https://www.amcharts.com/docs/v5/concepts/animations/#Animation_of_series
    series.appear(1000, 100);
    
    }); // end am5.ready()

}

$.ajax({
  type: "post",
  url: "procesar_reportes.php",
  data: {
      reporte: "producto"  
  },
  success: function(respuesta) {
      const productos = JSON.parse(respuesta);
      grafico2(productos); 
  },
});



