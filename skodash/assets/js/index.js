$(function() {
	"use strict";
	
// chart 1
var options = {
    series: [{
        name: "Sales",
        data: [450, 650, 440, 160, 350, 414, 555, 257, 400, 555, 257]
    },{
        name: "Orders",
        data: [580, 350, 760, 350, 687, 352, 785, 241, 352, 685, 425]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "area",
        //width: 130,
        height: 360,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3461ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#3461ff", "#12bf24"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "35%",
            endingShape: "rounded"
        }
    },
	legend: {
        show: false,
        position: 'top',
        horizontalAlign: 'left',
        offsetX: -20
    },
    dataLabels: {
        enabled: !1
    },
    grid: {
        show: true,
        // borderColor: '#eee',
        // strokeDashArray: 4,
    },
    stroke: {
        show: !0,
        width: 3,
        curve: "smooth"
    },
    fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: "vertical",
          shadeIntensity: 0.5,
          gradientToColors: ["#3461ff", "#12bf24"],
          inverseColors: true,
          opacityFrom: 0.8,
          opacityTo: 0.2,
          //stops: [0, 50, 100],
          //colorStops: []
        }
      },
    colors: ["#3461ff", "#12bf24"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function (val) {
                return "" + val + ""
            }
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart1"), options);
  chart.render();

// chart 2
  
var options = {
    series: [160, 60, 35],
    chart: {
     height: 250,
     type: 'pie',
  },
  labels: [ 'New Orders', 'Pending', 'Completed'],
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: "vertical",
      shadeIntensity: 0.5,
      gradientToColors: ["#00c6fb", "#ff6a00", "#98ec2d"],
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 1,
      //stops: [0, 50, 100],
      //colorStops: []
    }
  },
  colors: ["#005bea", "#ee0979", "#17ad37"],
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'left',
    offsetX: -20
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        height: 270
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#chart2"), options);
  chart.render();

// chart 3
  
var options = {
    series: [89, 45, 35, 62],
    chart: {
    width: 300,
    type: 'donut',
  },
  labels: ["Visitors", "Subscribers", "Contributor", "Author"],
  fill: {
    type: 'gradient',
    gradient: {
      shade: 'light',
      type: "vertical",
      shadeIntensity: 0.5,
      gradientToColors: ["#667eea", "#00c6fb", "#f77062", "#98ec2d"],
      inverseColors: true,
      opacityFrom: 1,
      opacityTo: 1,
      //stops: [0, 50, 100],
      //colorStops: []
    }
  },
  colors: ["#764ba2", "#005bea", "#fe5196", "#12bf24"],
  legend: {
    show: false,
    position: 'top',
    horizontalAlign: 'left',
    offsetX: -20
  },
  responsive: [{
    breakpoint: 480,
    options: {
      chart: {
        height: 260
      },
      legend: {
        position: 'bottom'
      }
    }
  }]
  };

  var chart = new ApexCharts(document.querySelector("#chart3"), options);
  chart.render();

// chart 4

var options = {
    series: [{
        name: "Views",
        data: [450, 650, 440, 160, 940, 414, 555, 257]
    },{
        name: "Clicks",
        data: [580, 350, 760, 350, 850, 352, 785, 241]
    }],
    chart: {
        foreColor: '#9a9797',
        type: "bar",
        //width: 130,
        height: 260,
        toolbar: {
            show: !1
        },
        zoom: {
            enabled: !1
        },
        dropShadow: {
            enabled: 0,
            top: 3,
            left: 14,
            blur: 4,
            opacity: .12,
            color: "#3361ff"
        },
        sparkline: {
            enabled: !1
        }
    },
    markers: {
        size: 0,
        colors: ["#3361ff"],
        strokeColors: "#fff",
        strokeWidth: 2,
        hover: {
            size: 7
        }
    },
    plotOptions: {
        bar: {
            horizontal: !1,
            columnWidth: "40%",
            endingShape: "rounded"
        }
    },
	legend: {
        show: false,
        position: 'top',
        horizontalAlign: 'left',
        offsetX: -20
    },
    dataLabels: {
        enabled: !1
    },
    stroke: {
        show: !0,
        width: 0,
        curve: "smooth"
    },
    fill: {
        type: 'gradient',
        gradient: {
          shade: 'light',
          type: "vertical",
          shadeIntensity: 0.5,
          gradientToColors: ["#005bea", "#ff0080"],
          inverseColors: true,
          opacityFrom: 1,
          opacityTo: 1,
          //stops: [0, 50, 100],
          //colorStops: []
        }
      },
    colors: ["#348bff", "#ff00ab"],
    xaxis: {
        categories: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"]
    },
    tooltip: {
        theme: 'dark',
        y: {
            formatter: function (val) {
                return "" + val + ""
            }
        }
    }
  };

  var chart = new ApexCharts(document.querySelector("#chart4"), options);
  chart.render();
  
   // world map
	
	jQuery('#geographic-map').vectorMap({
		map: 'world_mill_en',
		backgroundColor: 'transparent',
		borderColor: '#818181',
		borderOpacity: 0.25,
		borderWidth: 1,
		zoomOnScroll: false,
		color: '#009efb',
		regionStyle: {
			initial: {
				fill: '#6c757d'
			}
		},
		markerStyle: {
			initial: {
				r: 9,
				'fill': '#fff',
				'fill-opacity': 1,
				'stroke': '#000',
				'stroke-width': 5,
				'stroke-opacity': 0.4
			},
		},
		enableZoom: true,
		hoverColor: '#009efb',
		markers: [{
			latLng: [21.00, 78.00],
			name: 'I Love My India'
		}],
		series: {
			regions: [{
				values: {
					IN: '#8833ff',
					US: '#3461ff',
					RU: '#12bf24',
					AU: '#ffb207'
				}
			}]
		},
		hoverOpacity: null,
		normalizeFunction: 'linear',
		scaleColors: ['#b6d6ff', '#005ace'],
		selectedColor: '#c9dfaf',
		selectedRegions: [],
		showTooltip: true,
		onRegionClick: function (element, code, region) {
			var message = 'You clicked "' + region + '" which has the code: ' + code.toUpperCase();
			alert(message);
		}
	});

    $(document).ready(function() {
        $('#Transaction-History').DataTable({
           lengthMenu: [[6, 10, 20, -1], [6, 10, 20, 'Todos']]
        });
     } );

     new PerfectScrollbar(".new-customer-list")

});

// admin_karusel start

var getUrlParameter = function getUrlParameter(sParam) {
  var sPageURL = decodeURIComponent(window.location.search.substring(1)),
      sURLVariables = sPageURL.split('&'),
      sParameterName,
      i;
  for (i = 0; i < sURLVariables.length; i++) {
      sParameterName = sURLVariables[i].split('=');
      if (sParameterName[0] === sParam) {
          return sParameterName[1] === undefined ? true : sParameterName[1];
      }
  }
};

$(document).ready(function(){
  $('.ajax_title').on('input', function(e){ 
    // e.preventDefault();
    const id = getUrlParameter('id');
		const title = $('.ajax_title').val() ? $('.ajax_title').val() : 1;
    const subtitle = $('.ajax_subtitle').val() ? $('.ajax_subtitle').val() : 1;
    const text = $('.ajax_text').val() ? $('.ajax_text').val() : 1;
    const btn = $('.ajax_btn').val() ? $('.ajax_btn').val() : 1;
    const img = $('.ajax_img').val() ? $('.ajax_img').val() : 1;
    // const file = $('.ajax_file').val() ? $('.ajax_file').val() : 1;
    // const file = $('.ajax_file').files[0].val ? $('.ajax_file').files[0].val : 1;
    $.ajax({
      url: 'http://localhost/handlers/glavnaya_karusel.php',
      type: 'POST',
      data: { id: id, title: title, subtitle: subtitle, text: text, btn:btn, img:img },
      success: function (data) {
        console.log(data);
      },
      error: function () {
        alert('Error!');
      },
    })
  })
});

$(document).on('change', '.ajax_file', function () {
  
  const id = getUrlParameter('id');
  const title = $('.ajax_title').val() ? $('.ajax_title').val() : 1;
  const subtitle = $('.ajax_subtitle').val() ? $('.ajax_subtitle').val() : 1;
  const text = $('.ajax_text').val() ? $('.ajax_text').val() : 1;
  const btn = $('.ajax_btn').val() ? $('.ajax_btn').val() : 1;
  const img = $('.ajax_img').val() ? $('.ajax_img').val() : 1;

  const file_data = $('.ajax_file').prop('files')[0];  //Берем  Файл
  const form_data = new FormData();                  
  form_data.append('files', file_data);
  form_data.append('id', id);
  form_data.append('title', title);
  form_data.append('subtitle', subtitle);
  form_data.append('text', text);
  form_data.append('btn', btn);
  form_data.append('img', img);
  console.log(form_data);  //Выводим инфо по файлам которые будут отправлены на сервер              
  $.ajax({
    url: 'http://localhost/handlers/glavnaya_karusel.php', 
    dataType: 'text', 
    cache: false,
    contentType: false,
    processData: false,
    data: form_data,                         
    type: 'post',
    success: function(data){
      console.log(data);
      
    }
  });
});

function previewFile() {
  var preview = document.querySelector('.slider_img');
  var file    = document.querySelector('.ajax_file').files[0];
  var reader  = new FileReader();

  reader.onloadend = function () {
    preview.src = reader.result;
  }

  if (file) {
    reader.readAsDataURL(file);
  } else {
    preview.src = "";
  }
}
// admin_karusel end

$(document).on('click', '.category_delete', function () {
  alert("Удалить категорию?");
  // function alert(){

  // }
});

$( ".select_products_read" ).click(function() {
  $( ".form_products_read" ).submit();
});

$( ".select_products_read_by_status" ).click(function() {
  $( ".form_products_read_by_status" ).submit();
});

$(document).ready(function(){
  $('.product_create').on('click', function(e){ 
    // e.preventDefault();
    const id = $('.product_create').val() ? $('.product_create').val() : 1;
    $.ajax({
      url: 'http://localhost/handlers/product_create.php',
      type: 'POST',
      data: { id: id },
      success: function (data) {
        console.log(data);
        $(".product_create_subcategory").html(data);
        // $(".products_none").addClass("d-none");
      },
      error: function () {
        alert('Error!');
      },
    })
    
  })
});