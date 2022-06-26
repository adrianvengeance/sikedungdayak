const ctx2 = document.getElementById('pendidikanchart').getContext('2d');
const myChart2 = new Chart(ctx2, {
    type: 'bar',
    data: {
        labels: kategoripnddkn,
        datasets: [{
            label: 'Jumlah',
            data: pnddknbyusia,
            backgroundColor: [
                'rgba(159, 161, 165, 1)',
                'rgba(107, 113, 229, 1)',
                'rgba(241, 103, 69, 1)',
                'rgba(76, 195, 217, 1)',
                'rgba(123, 200, 164, 1)',
                'rgba(255, 198, 93, 1)',
                'rgba(255, 72, 102, 1)'
            ],
            borderColor: [
                'rgba(159, 161, 165, 1)',
                'rgba(107, 113, 229, 1)',
                'rgba(241, 103, 69, 1)',
                'rgba(76, 195, 217, 1)',
                'rgba(123, 200, 164, 1)',
                'rgba(255, 198, 93, 1)',
                'rgba(255, 72, 102, 1)'
            ],
            borderWidth: 1
        }]
    },
    options: {        
        // responsives: true,
        maintainAspectRatio: false,        
        scales: {
            y: {
                beginAtZero: true
            }
        },
        plugins: {
            title: {
                display: true,
                text: 'Tingkat Pendidikan Terakhir',
                fullSize: true,
                font: {
                    size: 24
                },
            },
            legend: {
                display: false,
            }
        }  
    }
});
