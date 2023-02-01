$(document).ready(function(){
  $.ajax({
    url: "http://localhost/chartjs/data.php",
    method: "GET",
    success: function(data) {
      console.log(data);
      var id = [];
      var Tinggi = [];

      for(var i in data) {
        id.push("id" + data[i].id);
        Tinggi.push(data[i].Tinggi);
      }

      var chartdata = {
        labels: ID,
        datasets : [
          {
            label: 'ID Number',
            backgroundColor: 'rgba(200, 200, 200, 0.75)',
            borderColor: 'rgba(200, 200, 200, 0.75)',
            hoverBackgroundColor: 'rgba(200, 200, 200, 1)',
            hoverBorderColor: 'rgba(200, 200, 200, 1)',
            data: Tinggi
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