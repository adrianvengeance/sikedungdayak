const ctxrt2jj = document.getElementById('jjrt2chart').getContext('2d');
const chartrt2jj = new Chart(ctxrt2jj, {
    type: 'pie',
    data: {
        labels: ['Laki-Laki', 'Perempuan'],
        datasets: [{                  
          data: jjrt2,
          backgroundColor: ['#36A2EB', '#FF1A68'],
          borderWidth: 1,
          // barPercentage: 10,
          barThickness: 100,
          maxBarThickness: 150,
          // minBarLength: 2,          
        }]
    },
    options: {        
        // responsives: true,
        maintainAspectRatio: false,        
        plugins: {
            title: {
                display: true,
                text: 'Jumlah Jiwa RT 2',
                fullSize: true,
                font: {
                    size: 24
                },
            },
            subtitle: {
              display: true,
              position: 'bottom',
              padding: 10,
              text: 'Total: '+totalrt2
            },
            legend: {
                labels: {
                  generateLabels: (chart) => {
                    return chart.data.labels.map(
                      (label, index) => ({
                        text: label,
                        strokeStyle: chart.data.datasets[0].backgroundColor[index],
                        fillStyle: chart.data.datasets[0].backgroundColor[index],
                        hidden: false
                      })
                    )
                  }
                }
            }
        }  
    }
});
