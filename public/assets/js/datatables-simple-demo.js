window.addEventListener('DOMContentLoaded', event => {
    // Simple-DataTables
    // https://github.com/fiduswriter/Simple-DataTables/wiki

    const datatablesSimple = document.getElementById('alldata');
    if (datatablesSimple) {
        new simpleDatatables.DataTable(datatablesSimple, {
            perPage:100,
            perPageSelect: [10, 25, 50, 100, 200],
        });
    }

    const datatablesSimple2 = document.getElementById('info');
    if (datatablesSimple2) {
        new simpleDatatables.DataTable(datatablesSimple2, {
            searchable:false,
            paging:false,
        });
    }
    const datatablesSimple9 = document.getElementById('widget');
    if (datatablesSimple9) {
        new simpleDatatables.DataTable(datatablesSimple9, {
            searchable:false,
            paging:false,
        });
    }
    const datatablesSimple10 = document.getElementById('kritiksaran');
    if (datatablesSimple10) {
        new simpleDatatables.DataTable(datatablesSimple10, {
            searchable:false,
            paging:false,
        });
    }
    const datatablesSimple3 = document.getElementById('penduduk');
    if (datatablesSimple3) {
        new simpleDatatables.DataTable(datatablesSimple3, {
            perPage:50,
            perPageSelect: [10, 25, 50, 100, 200],
        });
    }
    const datatablesSimple4 = document.getElementById('pindah');
    if (datatablesSimple4) {
        new simpleDatatables.DataTable(datatablesSimple4, {
            
        });
    }
    const datatablesSimple5 = document.getElementById('meninggal');
    if (datatablesSimple5) {
        new simpleDatatables.DataTable(datatablesSimple5, {
            
        });
    }
});
