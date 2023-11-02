define(['jquery'], function($){
    "use strict";
        return function ajax()
        {
           $('#ajaxcall').on('click', function(e){
            e.preventDefault();    
            jQuery.ajax({
                // url: "http://www.example.com/Frontname/Controller/Action",
                url: "/ajax/index",
                type: "POST",
                data: {param:6},
                showLoader: true,
                cache: false,
                success: function(response){
                    console.log("success");
                }
            });
           });
        }
 });
