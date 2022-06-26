const ctxrt1jj = document.getElementById('jjrt1chart').getContext('2d');
const chartrt1jj = new Chart(ctxrt1jj, {
    type: 'pie',
    data: {
        labels: ['Laki-Laki', 'Perempuan'],
        datasets: [{                  
          data: jjrt1,
          backgroundColor: ['#36A2EB', '#FF1A68'],
          borderWidth: 1,
          // barPercentage: 10,
          barThickness: 100,
          maxBarThickness: 150,
          // minBarLength: 2,          
        }]
    },
    options: {        
        responsives: true,
        maintainAspectRatio: false,        
        plugins: {
            title: {
                display: true,
                text: 'Jumlah Jiwa RT 1',
                fullSize: true,
                font: {
                    size: 24
                },
            },
            subtitle: {
              display: true,
              position: 'bottom',
              padding: 10,
              text: 'Total: '+totalrt1
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
