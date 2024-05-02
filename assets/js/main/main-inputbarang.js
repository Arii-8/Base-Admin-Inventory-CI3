require(["../common" ], function (common) {  
    require(["main-function","../app/app-inputbarang"], function (func,application) { 
    App = $.extend(application,func);
        App.init();  
    }); 
});
