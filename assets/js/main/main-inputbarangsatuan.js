require(["../common" ], function (common) {  
    require(["main-function","../app/app-inputbarangsatuan"], function (func,application) { 
    App = $.extend(application,func);
        App.init();  
    }); 
});
