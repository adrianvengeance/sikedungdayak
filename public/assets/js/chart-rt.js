// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Bar Chart Example
var ctx = document.getElementById("myBarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: jumlahrt,
    datasets: [{
      label: "Jumlah KK",
      fill: false,    
      // backgroundColor: "rgba(255, 193, 7, 1)",
      // borderColor: "rgba(255, 193, 7, 1)",
      
      backgroundColor: [
        "#E46274",
        "#F3C83E",
        "#AAD075",
        "#86D0D0"
      ],
      borderColor: [
        "#E46274",
        "#F3C83E",
        "#AAD075",
        "#86D0D0"
      ],
      data: jumlahkk,
    }],
  },
  options: {
    scales: {
      xAxes: [{
        // time: {
        //   unit: 'month'
        // },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 40,
          maxTicksLimit: 7
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});
