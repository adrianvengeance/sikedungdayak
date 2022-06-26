//male datapoint converter
const male = umurpria;
const maleData = [];
male.forEach(element => maleData.push(element * -1));
//setup
const data = {  
  labels: batasumur,
  datasets: [
    {
    label: 'Laki-laki',
    data: maleData,
    backgroundColor: 'rgba(54, 162, 235, 1)',
    borderColor: 'rgba(54, 162, 235, 1)',
    borderWidth:1
  },{
    label: 'Perempuan',
    data: umurwanita,
    backgroundColor: 'rgba(255, 26, 104, 1)',
    borderColor: 'rgba(255, 26, 104, 1)',
    borderWidth:1
  }
]
};
// block tooltip
const tooltip = {
  yAlign: 'bottom',
  titleAlign: 'center',
  callbacks: {
    label: function(context) {
      return `${context.dataset.label} ${Math.abs(context.raw)}`;
    }
  }
};
// config
const config = {
  type: 'bar',
  data,
  options: {
    indexAxis: 'y',
    responsives: false,
    maintainAspectRatio: false,
    scales: {
      x: {
        stacked: true,
        ticks: {
          callback: function(value, index, values) {
            return Math.abs(value);
          }
        }
      },
      y: {
        beginAtZero: true,
        stacked: true
      }
    },
    plugins: {
      title: {
        display: true,
        text: 'Jumlah Penduduk Berdasarkan Tingkat Usia',
        fullSize: true,
        font: {
            size: 24
        },
    },
      tooltip,
      legend: {
        labels: {
          font: {
            family: "'Montserrat', sans-serif;",
            size: 16
          }
        }
      }
    },
  }
};
//render init block
const myChart = new Chart(
  document.getElementById('umurchart'),
  config
);