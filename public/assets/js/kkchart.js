
const ctx3 = document.getElementById('kkchart').getContext('2d');
const myChart3 = new Chart(ctx3, {
  type: 'pie',
  data: {
    labels: jmlhrt,
    datasets: [{
      label: 'Jumlah KK ',
      backgroundColor: [
          "#EF5464",
          "#FFCF56",
          "#5BC2A7",
          "#6798D0"
      ],
      data: jmlhkk
    }]
  },
  options: {
    maintainAspectRatio: false,    
    plugins: {
      title: {
        display: true,
        text: 'Jumlah KK Pada Setiap RT',
        fullSize: true,
        font: {
          size: 24
        },
      },
    }  
  },
    
});
