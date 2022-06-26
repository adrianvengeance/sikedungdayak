const autocolors = window['chartjs-plugin-autocolors'];
const ctxpekerjaan = document.getElementById('pekerjaanchart').getContext('2d');
const myChartPekerjaan = new Chart(ctxpekerjaan, {
    type: 'bar',
    data: {
        labels: jobs,
        datasets: [{
            label: 'Jumlah ',
            data: job,
            backgroundColor: [
                "#f2816b",
                "#b1dce7",
                "#65878d",
                "#bdc426",
                "#166000",
                "#1943ef",
                "#cb5624",
                "#25cba4",
                "#2a6052",
                "#e2c3d6",
                "#23e337",
                "#48fcdd",
                "#f487db",
                "#08aaba",
                "#81e279",
                "#622521",
                "#85480a",
                "#fc71b6",
                "#652d75",
                "#b33b17",
                "#631d18",
                "#9d3cfc",
                "#0d066f",
                "#9f1242",
                "#2b2b35"
            ]
        }]             
    },
    options: {   
        indexAxis: 'y',     
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
                text: 'Status Pekerjaan Utama Penduduk',
                fullSize: true,
                font: {
                    size: 24
                },
            },
            legend: {
                display: false,
            },
            // autocolors: {
            //     mode: 'data'
            // }
        }  
    }
});
