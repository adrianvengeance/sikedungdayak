// Set new default font family and font color to mimic Bootstrap's default styling
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Area Chart Example
var ctx = document.getElementById("myAreaChart");
var myLineChart = new Chart(ctx,
  {
  type: 'line',
  data: {
    labels: batasumur,
    datasets: [
    {
      label: "Laki-laki",
      lineTension: 0.3,
      fill: false,
      // backgroundColor: "rgba(54, 162, 235,0.2)",
      borderColor: "rgba(54, 162, 235,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(54, 162, 235,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(54, 162, 235,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: umurpria,
    },
    {
      label: "Perempuan",
      lineTension: 0.3,
      fill: false,
      // backgroundColor: "rgba(255, 26, 104),0.2)",
      borderColor: "rgba(255, 26, 104,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(255, 26, 104,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(255, 26, 104,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: umurwanita,
    },
  ],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          // maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          maxTicksLimit: 7
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
        }
      }],
    },
    legend: {
      display: false
    }
  }
}
);
