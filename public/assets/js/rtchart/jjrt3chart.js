const ctxrt3jj = document.getElementById('jjrt3chart').getContext('2d');
const chartrt3jj = new Chart(ctxrt3jj, {
    type: 'pie',
    data: {
        labels: ['Laki-Laki', 'Perempuan'],
        datasets: [{                  
          data: jjrt3,
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
                text: 'Jumlah Jiwa RT 3',
                fullSize: true,
                font: {
                    size: 24
                },
            },
            subtitle: {
              display: true,
              position: 'bottom',
              padding: 10,
              text: 'Total: '+totalrt3
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
