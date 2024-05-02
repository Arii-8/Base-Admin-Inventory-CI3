define([
    "jQuery",
    "jQueryUI",
    "bootstrap", 
    "datatablesbs4",  
    "responsiveBS4", 
    "jqvalidate",
    ], function (
        $,
        jQueryUI,
        bootstrap, 
        datatablesbs4,  
        responsiveBS4, 
        jqvalidate
    ) {
    return {  
        table:null,
        init: function () {
        
        	App.initFunc(); 
            App.initEvent();   
            $(".loadingpage").hide();
		}, 
        initEvent : function(){
            App.table = $('#table').DataTable({
                "language": {
                    "search": "Cari",
                    "lengthMenu": "Tampilkan _MENU_ baris per halaman",
                    "zeroRecords": "Data tidak ditemukan",
                    "info": "Menampilkan _PAGE_ dari _PAGES_",
                    "infoEmpty": "Tidak ada data yang ditampilkan ",
                    "infoFiltered": "(pencarian dari _MAX_ total records)",
                    "paginate": {
                        "first":      "Pertama",
                        "last":       "Terakhir",
                        "next":       "Selanjutnya",
                        "previous":   "Sebelum"
                    },
                },
                "responsive": true,
                "processing": true,
                "serverSide": true,
                "ajax":{
                    "url": App.baseUrl+"dashboard/dataList",
                    "dataType": "json",
                    "type": "POST",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "id_transaksi" },
                    { "data": "tanggal_keluar" },
                    { "data": "lokasi" },
                    { "data": "kode_barang" },
                    { "data": "nama_barang" },
                    { "data": "nama_satuan" },
                    { "data": "jumlah_barang" },
                    { "data": "tabelkurir_name" },
                    // { "data": "action" ,"orderable": false}
                ]
            });    
        } 
	}
});