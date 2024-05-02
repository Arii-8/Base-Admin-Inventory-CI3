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
                    "url": App.baseUrl+"inputbarangsatuan/dataList",
                    "dataType": "json",
                    "type": "POST",
                },
                "columns": [
                    { "data": "id" },
                    { "data": "nama_satuan_barang" },
                    { "data": "kode_satuan_barang" },
                    { "data": "action" ,"orderable": false}
                ]
            }); 

            if($("#form").length > 0){
                $("#save-btn").removeAttr("disabled");
                $("#form").validate({
                    rules: {
                        nama_satuan_barang: {
                            required: true,
                        } ,
                        kode_satuan_barang: {
                            required: true,
                        } ,
                    },
                    messages: {
                        nama_satuan_barang: {
                            required: "Nama Harus Diisi",
                        } ,
                        kode_satuan_barang: {
                            required: "Code Harus Diisi",
                        } ,
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
