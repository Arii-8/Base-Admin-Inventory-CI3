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
            App.initConfirm();
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
                    "url": App.baseUrl+"tabelbarangmasuk/dataList",
                    "dataType": "json",
                    "type": "POST",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "id_transaksi" },
                    { "data": "tanggal_input" },
                    { "data": "lokasi" },
                    { "data": "kode_barang" },
                    { "data": "nama_barang" },
                    { "data": "nama_satuan" },
                    { "data": "jumlah_barang" },
                    { "data": "tabelkurir_name" },
                    { "data": "action" ,"orderable": false}
                ]
            }); 

            if($("#form").length > 0){
                $("#save-btn").removeAttr("disabled");
                $("#form").validate({
                    rules: {
                        id_transaksi: {
                            required: true,
                        },
                        tanggal_input: {
                            required: true,
                        },
                        lokasi: {
                            required: true,
                        },
                        kode_barang: {
                            required: true,
                        },
                        nama_barang: {
                            required: true,
                        },
                        nama_satuan: {
                            required: true,
                        },
                        jumlah_barang: {
                            required: true,
                        },
                        data_kurir: {
                            required: true,
                        },
                    },
                    messages: {
                        id_transaksi: {
                            required: "ID Transaksi Harus Diisi",
                        } ,
                        tanggal_input: {
                            required: "Tanggal Input Harus Diisi",
                        } ,
                        lokasi: {
                            required: "Lokasi Input Harus Diisi",
                        } ,
                        kode_barang: {
                            required: "Kode Barang Harus Diisi",
                        } ,
                        nama_barang: {
                            required: "Nama Barang Harus Diisi",
                        },
                        nama_satuan: {
                            required: "Nama Satuan Barang Harus Diisi",
                        },
                        jumlah_barang: {
                            required: "Jumlah Barang Harus Diisi",
                        },
                        data_kurir: {
                            required: "Nama Kurir Harus Diisi",
                        },
                    }, 

                    errorPlacement: function(error, element) { 
                        var name = element.attr('name');
                        var errorSelector = '.form-control-feedback[for="' + name + '"]';
                        var $element = $(errorSelector);
                        if ($element.length) {
                            $(errorSelector).html(error.html());
                        } else {
                            error.insertAfter(element);
                        }
                    },
                    submitHandler : function(form) { 
                        console.log(form)
                        form.submit();
                    }
                });
            } 
        },
        initConfirm :function(){
            $('#table tbody').on( 'click', '.delete', function () {
                var url = $(this).attr("url");
                App.confirm("Apakah Anda Yakin Untuk Mengubah Ini?",function(){
                   $.ajax({
                      method: "GET",
                      url: url
                    }).done(function( msg ) {
                        App.table.ajax.reload(null,true);
                    });
                })
            });
        }
	}
});
