/**
 * Created by lukas on 04.07.16.
 */

$(document).ready(function(){
    $.ajax({
        url: "https://mars.iuk.hdm-stuttgart.de/~lv018/chartjs/data.php",
        method: "GET",
        success: function(data) {
            console.log(data);
            var Antwort = [];
            var Vote = [];

            for(var i in data) {
                Antwort.push("Antwort " + A);
                Antwort.push("Antwort " + B);

                if (isset(data[i].Antwort_C)) {
                    Antwort.push("Antwort " + C);
                }
                if (isset(data[i].Antwort_D)) {
                    Antwort.push("Antwort " + D);
                }

                Vote.push(data[i].Vote);
            }

            var chartdata = {
                labels: Antwort,
                datasets : [
                    {
                        label: 'Antwort',
                        backgroundColor: 'rgba(200, 200, 200, 0.75)',
                        borderColor: 'rgba(200, 200, 200, 0.75)',
                        hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
                        hoverBorderColor: 'rgba(200, 200, 200, 1)',
                        data: Vote
                    }
                ]
            };

            var ctx = $("#mycanvas");

            var barGraph = new Chart(ctx, {
                type: 'bar',
                data: chartdata
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});