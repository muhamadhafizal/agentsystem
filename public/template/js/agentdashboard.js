(function ($) {
    // USE STRICT
    "use strict";

  
    try {

      var url = 'agent/chart/rental';
      var rental = [];
      var rentalArr = [];
      var tempRental;

      $.get(url, function(response){

        $.each(response, function(i, item){
            tempRental = response[i];
            rental.push(tempRental);
        });
    
        getChartAgentRental(rental);
      });
    
      function getChartAgentRental($value){
      
        var tempValue = $value;

         // single bar chart
        var ctx = document.getElementById("singleBarChartAgent");
        if (ctx) {
            ctx.height = 150;
            var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7","8","9","10","11","12"],
                datasets: [
                {
                    label: "Total Success Comm",
                    data: tempValue,
                    borderColor: "rgba(0, 123, 255, 0.9)",
                    borderWidth: "0",
                    backgroundColor: "rgba(0, 123, 255, 0.5)"
                }
                ]
            },
            options: {
                legend: {
                position: 'top',
                labels: {
                    fontFamily: 'Poppins'
                }
    
                },
                scales: {
                xAxes: [{
                    ticks: {
                    fontFamily: "Poppins"
    
                    },
                    gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                }
                }],
                yAxes: [{
                    ticks: {
                    beginAtZero: true,
                    fontFamily: "Poppins"
                    },
                    gridLines: {
                    color: "rgba(0, 0, 0, 0)",
                }
                }]
                }
            }
            });
        }

      }
  
    } catch (error) {
      console.log(error);
    }
  
  })(jQuery);