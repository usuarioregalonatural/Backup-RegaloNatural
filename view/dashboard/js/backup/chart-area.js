
$(document).ready(function() {
    $.ajax({
        url: "../../../funciones/conectaBDGraficos.php",
        dataType: 'json',
        contentType: "application/json; charset=utf-8",
        method: "GET",
        success: function(data) {
   //         var id_backup = [];
            var fx_inicio = [];
            var duracion = [];
            var color = ['rgba(255, 99, 132, 0.2)', 'rgba(54, 162, 235, 0.2)', 'rgba(255, 206, 86, 0.2)', 'rgba(75, 192, 192, 0.2)', 'rgba(153, 102, 255, 0.2)', 'rgba(255, 159, 64, 0.2)'];
            var bordercolor = ['rgba(255,99,132,1)', 'rgba(54, 162, 235, 1)', 'rgba(255, 206, 86, 1)', 'rgba(75, 192, 192, 1)', 'rgba(153, 102, 255, 1)', 'rgba(255, 159, 64, 1)'];
            console.log(data);
     //       alert(data);

            for (var i in data) {
 //               id_backup.push(data[i].id_backup);
                fx_inicio.push(data[i].fx_inicio);
                duracion.push(data[i].duracion);
            }

            var chartdata = {
                labels: fx_inicio,
                datasets: [{
                    label: fx_inicio,
                    backgroundColor: color,
                    borderColor: color,
                    borderWidth: 2,
                    hoverBackgroundColor: color,
                    hoverBorderColor: bordercolor,
                    data: duracion
                }]
            };

            var mostrar = $("#graficoChartArea");

// ---------------- COMIENZO DEL GRAFICO
            var grafico = new Chart(mostrar, {
                type: 'line',
                data: chartdata,
                options: {
                    responsive: true,
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero: true
                            }
                        }]
                    }
                }
            });
//-------------------- fin del grafico
        },
        error: function(data) {
            console.log(data);
     //       alert(data);
        }
    });
});