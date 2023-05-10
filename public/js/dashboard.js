// Rescued Chart
$( "#rescued_from_date" ).datepicker({
    dateFormat: "yy-mm-dd"
});

$( "#rescued_to_date" ).datepicker({
    dateFormat: "yy-mm-dd"
});

  var rescuedMonth = new Array();
  var rescuedCount = new Array();
      
  // rescue chart properties
  const rchart = document.getElementById('rescue_chart').getContext('2d');
  const rescue_chart = new Chart(rchart, {
      type: 'bar',
      data: {
          labels: rescuedMonth,
          datasets: [{
          label: 'Rescued Animals Per Month',
          data:rescuedCount,
          backgroundColor: [
              'rgba(250, 101, 53, 1)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'],

          borderColor: [
              'rgba(250, 101, 53, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'],

          borderWidth: 1
          }]
      },
      responsive: true,
       maintainAspectRatio: false,
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          }
      }
  });


$('#view_rescued').click(function(){
  var date = new Array();
  var dateStart = $( "#rescued_from_date" ).val();
  var dateEnd = $( "#rescued_to_date" ).val();
  date.push(dateStart);
  date.push(dateEnd);
  console.log(date);
      $.ajax({
          type: "GET",
          dataType: 'json',
          url: "/api/dashboard/chartRescued/"+date, 
          beforeSend: function (xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
          }, 
          success: function(data){
              var rescuedMonth = new Array();
              var rescuedCount = new Array();
              for (var i = 0; i < data.length; i++) {
                  var animalRescue = data[i];
                  console.log(animalRescue);
                  rescuedMonth.push(animalRescue.month);
                  rescuedCount.push(animalRescue.rescued);
              }
              rescue_chart.data.labels = rescuedMonth;
              rescue_chart.data.datasets[0].data = rescuedCount;
              rescue_chart.update();
          },
              error: function(){}
      });
});


$.ajax({
  type: "GET",
  dataType: 'json',
  url: "/api/dashboard/index/",
  beforeSend: function (xhr) {
  xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
  }, 
  success: function(data){
      for (var i = 0; i < data.animalRescued.length; i++) {
          var animalRescue = data.animalRescued[i];
          rescuedMonth.push(animalRescue.month);
          rescuedCount.push(animalRescue.rescued);
      }
          // paglagay sa chart
          rescue_chart.data.labels = rescuedMonth;
          rescue_chart.data.datasets[0].data = rescuedCount;
          rescue_chart.update();

      for (var i = 0; i < data.animalAdopted.length; i++) {
          var animalAdopt = data.animalAdopted[i];
          adoptedMonth.push(animalAdopt.month);
          adoptedCount.push(animalAdopt.adopted);
      }
          // paglagay sa chart
             adopt_chart.data.labels = adoptedMonth;
          adopt_chart.data.datasets[0].data = adoptedCount;
          adopt_chart.update();
      },
      error: function(){}
});


  

// Adopter Chart-------------------------------------------------------------------------
$( "#adoption_from_date" ).datepicker({
  dateFormat: "yy-mm-dd"
});

$( "#adoption_to_date" ).datepicker({
  dateFormat: "yy-mm-dd"
});

  var adoptedMonth = new Array();
  var adoptedCount = new Array();

  // adoption chart 
  const achart = document.getElementById('adopt_chart').getContext('2d');
  const adopt_chart = new Chart(achart, 
      {
          type: 'bar',
          data: {
          labels: adoptedMonth,
          datasets: [{
          label: 'Adopted Animals Per Month',
          data:adoptedCount,
          backgroundColor: [
              'rgba(250, 101, 53, 1)',
              'rgba(54, 162, 235, 0.2)',
              'rgba(255, 206, 86, 0.2)',
              'rgba(75, 192, 192, 0.2)',
              'rgba(153, 102, 255, 0.2)',
              'rgba(255, 159, 64, 0.2)'],
          borderColor: [
              'rgba(250, 101, 53, 1)',
              'rgba(54, 162, 235, 1)',
              'rgba(255, 206, 86, 1)',
              'rgba(75, 192, 192, 1)',
              'rgba(153, 102, 255, 1)',
              'rgba(255, 159, 64, 1)'],
          borderWidth: 1
          }]
          },
          responsive: true,
           maintainAspectRatio: true,
          options:{
                  scales: {
                              yAxes: [{
                                  ticks: {
                                      beginAtZero: true
                                  }
                              }]
                  }
          }
  });


$('#view_adopted').click(function(){
  var date = new Array();
  var dateStart = $( "#adoption_from_date" ).val();
  var dateEnd = $( "#adoption_to_date" ).val();
  date.push(dateStart);
  date.push(dateEnd);
  console.log(date);
      $.ajax({
          type: "GET",
          dataType: 'json',
          url: "/api/dashboard/chartAdopted/"+date, 
          beforeSend: function (xhr) {
          xhr.setRequestHeader('Authorization', 'Bearer '+sessionStorage.getItem('token')+'');
          }, 
          success: function(data){
              console.log(data);
              var adoptedMonth = new Array();
              var adoptedCount = new Array();
              for (var i = 0; i < data.length; i++) {
                  var animalAdopt = data[i];
                  // console.log(data);
                  adoptedMonth.push(animalAdopt.month);
                  adoptedCount.push(animalAdopt.adopted);
              }
                  adopt_chart.data.labels = adoptedMonth;
                  adopt_chart.data.datasets[0].data = adoptedCount;
                  adopt_chart.update();
          },
                  error: function(){}
      });
});