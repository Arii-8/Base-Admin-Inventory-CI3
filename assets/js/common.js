var App;
if(!window.console) {
        var console = {
            log : function(){},
            warn : function(){},
            error : function(){},
            time : function(){},
            timeEnd : function(){}
        }
    }
var log = function() {};

require.config({
    paths: {
        "jQuery": "../../plugins/jquery/jquery.min",
        "jQueryUI" : "../../plugins/jquery-ui/jquery-ui.min",
        "adminlte" : "../../plugins/adminlte",
        "popper" : "../../plugins/popper/popper", 
        "bootstrap" : "../../plugins/bootstrap/js/bootstrap.min", 
        "datatables" : "../../plugins/datatables/jquery.dataTables.min",
        "bootstrap-datetimepicker" : "../../plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min",
        "datatablesbs4" : "../../plugins/datatables-bs4/js/dataTables.bootstrap4.min", 
        "datatablesResponsive" : "../../plugins/datatables-responsive/js/dataTables.responsive.min",
        "bootstrap-datepicker" : "../../plugins/bootstrap-datepicker/bootstrap-datepicker.min", 
        "responsiveBS4" : "../../plugins/datatables-responsive/js/responsive.bootstrap4.min", 
        "jqvalidate" : "../../plugins/jquery-validation/jquery.validate.min",
        "moment" : "../../plugins/moment/moment.min",   
        "select2" : "../../plugins/select2/js/select2.min",  
        "fullcalendar": "../../plugins/fullcalendar/dist/fullcalendar.min",
    },
    waitSeconds: 0,
    // urlArgs: "bust=" + (new Date()).getTime(),
    shim: {
        "jQuery": {
            exports: "jQuery",
            init: function(){
                console.log('JQuery inited..');
            }
        },
        "jQueryUI": {
            exports: "jQueryUI",
            init: function(){
                console.log('jQueryUI inited..');
            }
        },
        "adminlte": {
            deps: ["jQuery"],
            exports: "adminlte",
            init: function(){
                console.log('adminlte inited..');
            }
        },
        "popper": { 
            exports: "popper",
            init: function(){
                console.log('popper inited..');
            }
        },
        "bootstrap": {
            deps: ["jQuery"],
            exports: "bootstrap",
            init: function(){
                console.log('bootstrap inited..');
            }
        },
        "datatables": {
            deps: ["jQuery"],
            exports: "datatables",
            init: function(){
                console.log('datatables inited..');
            }
        },
        "datatablesbs4": {
            deps: ["jQuery","datatables"],
            exports: "datatablesbs4",
            init: function(){
                console.log('datatablesbs4 inited..');
            }
        },
        "datatablesResponsive": {
            deps: ["jQuery","datatables"],
            exports: "datatablesResponsive",
            init: function(){
                console.log('datatablesResponsive inited..');
            }
        },
        "responsiveBS4": {
            deps: ["jQuery","datatables"],
            exports: "responsiveBS4",
            init: function(){
                console.log('responsiveBS4 inited..');
            }
        },
        "jqvalidate": {
            deps: ["jQuery"],
            exports: "jqvalidate",
            init: function(){
                console.log('jqvalidate inited..');
            }
        },
        "moment": {
            exports: "moment",
            init: function(){
                console.log('moment inited..');
            }
        },
        "select2": {
            deps: ["jQuery"],
            exports: "select2",
            init: function(){
                console.log('select2 inited..');
            }
        },
        "bootstrapDatepicker": {
            deps: ["jQuery","bootstrap"],
            exports: "bootstrapDatepicker",
            init: function(){
                console.log('bootstrapDatepicker inited..');
            }
        },
        "fullcalendar": {
            deps: ["jQuery"],
            exports: "fullcalendar",
            init: function () {
                console.log('fullcalendar inited..');
            }
        },
        
    }, 
    map: {
      '*': { 
        'datatables.net': 'datatables',
        'popper.js': 'popper',
        'datatables.net-responsive': 'datatablesResponsive',
        'datatables.net-bs4': 'responsiveBS4',
      }
    }
});
