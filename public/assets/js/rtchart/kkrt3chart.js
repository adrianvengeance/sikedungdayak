const ctxrt3 = document.getElementById('kkrt3chart').getContext('2d');
const chartrt3 = new Chart(ctxrt3, {
    type: 'bar',
    data: {
        labels: ['Laki-Laki', 'Perempuan'],
        datasets: [{                  
          data: kkrt3,
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
        scales: {
            y: {
                beginAtZero: true,             
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Jumlah Kepala Keluarga RT 3',
                fullSize: true,
                font: {
                    size: 24
                },
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
