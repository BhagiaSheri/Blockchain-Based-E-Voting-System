// on document ready
$(document).ready(function () {
  // when logout is clicked 
  $("#log-me-out").click(function (event) {
    swal({
      title: "Logging out...",
      icon: "success",
      buttons: true,
      dangerMode: false,
    })
      .then((willDelete) => {
        if (willDelete) {
          log_out();
        } 
      });
  });

  //on click to edit candidate
  $(".edit-candidate").click(function (event) {
    editCandidate(event.target.id);
  });

  //on click to delete candidate 
  $(".dlt-candidate").click(function (event) {
    var modal = $("#deleteCandidateModal");
    modal.find('#delete-candidate-id').val(event.target.id);
    modal.modal();
  });

  //on click to delete user
  $(".dlt-user").click(function (event) {
    var modal = $("#deleteUserModal");
    modal.find('#delete-user-id').val(event.target.id);
    modal.modal();
  });

  //on click to delete vote schedule
  $(".dlt-schedule").click(function (event) {
    var modal = $("#deleteScheduleModal");
    modal.find('#delete-schedule-id').val(event.target.id);
    modal.modal();
  });

  // on click to edit profile
  $("#editProfile").click(function () {
    editProfile();
  });

  // --------- Chart JS Functionality ----------

  // Set new default font family and font color to mimic Bootstrap's default styling
  Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
  Chart.defaults.global.defaultFontColor = '#292b2c';

  // when results page is load - show pie-chart and barchart
  $.ajax({
    url: "http://localhost/Blockchain-Based-E-Voting-System/php/result-charts/chart.php",
    method: "GET",
    success: function (data) {
      console.log(data);
      var candidates = [];
      var votes = [];

      // data from candidates table columns
      for (var i in data) {
        candidates.push(data[i].name);
        votes.push(data[i].no_of_votes);
      }

      // setting the candidates for barchart w.r.t votes
      var barChartData = {
        labels: candidates,
        datasets: [
          {
            label: 'Candidates Votes',
            backgroundColor: 'rgba(46,56,83, 1)',
            borderColor: 'rgba(46,56,86,0.75)',
            hoverBackgroundColor: 'rgba(46,56,83,0.5)',
            hoverBorderColor: 'rgba(46,56,83,0.5)',
            data: votes
          }
        ]
      };

      // barchart view
      var bar = $("#myBarChart");
      var barGraph = new Chart(bar, {
        type: 'bar',
        data: barChartData,
        options: {
          scales: {
            xAxes: [{
              gridLines: {
                display: false
              },
            }],
          },
          plugins: {
            labels: {
              render: () => { }
            }
          }
        }
      });

      // setting dataset of pie chart w.r.t votes of candidates
      var pieChartData = {
        labels: candidates,
        datasets: [
          {
            label: 'Candidates',
            fill: true,
            lineTension: 2.1,
            backgroundColor: ['#007bff', '#dc3545', '#ffc107', '#28a745'],
            data: votes
          }
        ]
      };

      // pie chart view
      var pie = $("#myPieChart");
      var pieChart = new Chart(pie, {
        type: 'pie',
        data: pieChartData,
        options: {
          responsive: true,
          maintainAspectRatio: true,
          plugins: {
            labels: {
              render: 'percentage',
              fontColor: 'white',
            }
          },
        }
      });
    },
    // if url not found or error occurs
    error: function (data) {
      console.log(data);
    }
  });

});