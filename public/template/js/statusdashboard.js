(function ($) {

    //statusproject
    $('#statusdashboard').click(function(){
    
        var status = document.getElementById("status").value;
    
    
    
        var url1 = '/project/dashboard/'+status;
        var project1 = [];
        var projectArr1 = [];
        var tempProject1;
    
        $.get(url1, function(response1){
        
        $.each(response1, function(i, item){
            tempProject1 = response1[i];
            project1.push(tempProject1);
        });
    
        getChartProjectStatus(project1);
    
        });
    
        function getChartProjectStatus($value){
    
        var tempValue = $value;
    
        // single bar chart
        var ctx1 = document.getElementById("projectChart");
        if (ctx1) {
            ctx1.height = 150;
            var myChart = new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: ["1", "2", "3", "4", "5", "6", "7","8","9","10","11","12"],
                datasets: [
                {
                    label: "Total Company Comm",
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

        //card
        var a = 'project/dashboard/card/' + status;
        
        $.get(a, function(result){
            
            $totalcases = result.totalcases;
            $totalnetselling = result.totalnetselling;
            $totalnetcomm = result.totalnetcomm;
            $totalpoolfundcomm = result.totalpoolfundcomm;
            $totalcompanycomm = result.totalcompanycomm;
            $totaldiff  = result.totaldiff;

            document.getElementById('totalcases').innerHTML = $totalcases;
            document.getElementById('totalnetselling').innerHTML = $totalnetselling;
            document.getElementById('totalnetcomm').innerHTML = $totalnetcomm;
            document.getElementById('totalpoolfundcomm').innerHTML = $totalpoolfundcomm;
            document.getElementById('totalcompanycomm').innerHTML = $totalcompanycomm;
            document.getElementById('totaldiff').innerHTML = $totaldiff;

        });
        
    
    
    
    });
  
   
})(jQuery);



  

