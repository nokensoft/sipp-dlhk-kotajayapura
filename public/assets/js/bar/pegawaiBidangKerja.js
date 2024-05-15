var options = {
    chart: {
        type: 'bar'
    },
    series: [
        {
            name: 'Penyapuan',
            data: [12], 
        },
        {
            name: 'Pembabatan',
            data: [23]
        },
        {
            name: 'Penyisiran',
            data: [15]
        },
        {
            name: 'Saluran Tebing',
            data: [17]
        },
        {
            name: 'Penyisiran Laut',
            data: [24]
        },
        {
            name: 'Penebangan',
            data: [27]
        },
        {
            name: 'Bengkel',
            data: [15]
        }
    ], 

    xaxis: {
        categories: [
            '',
        ]
    },
     
    title: {
        text: 'Jumlah Petugas Berdasarkan Bidang Kerja',
        offsetX: 0,
        offsetY: 0,
        style: {
            color: undefined,
            fontSize: '18px',
            fontFamily: 'Helvetica, Arial, sans-serif',
            fontWeight: 400,
            cssClass: 'apexcharts-xaxis-title',
        },
    },

}

var pegawaiBidangKerja = new ApexCharts(document.querySelector("#pegawaiBidangKerja"), options);

pegawaiBidangKerja.render();