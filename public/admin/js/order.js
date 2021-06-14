(function ($) {
    "user strict";

    var available_products = []

    $(document).ready(function() {
      

      $.ajaxSetup({

        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
        });

        //Populate Array With All Products
        $.ajax({          
          url: "/api/get-products",
          type:"GET",          
          success:function(result){
             console.log("success");
             result.forEach((item) => {
              available_products.push(item.name);                  
              }); 
          },
          error:function(){
              console.log("error");              
          }
      });

      

      $( ".search" ).autocomplete({
        source: available_products
      });

      $( ".search" ).autocomplete( "widget" );


      

    });

})(jQuery);