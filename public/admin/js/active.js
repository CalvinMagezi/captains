(function ($) {
    "user strict";

    var order_id = [];
    var taken_by = [];
    var item_name = [];
    var item_category = [];    
    var dispatched_to = [];
    var ready = [];
    var item_m_category = [];
    var price = [];
    var quantity = [];
    var specifics = [];
    var priority = [];


    $(document).ready(function(){
        $.ajaxSetup({

            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
            });

             //Populate Array With All Products
            $.ajax({          
                url: "/api/get-mainbar-items",
                type:"GET",          
                success:function(result){
                console.log("success");
                result.forEach((item) => {
                    order_id.push(item.order_id);                  
                    taken_by.push(item.taken_by);                  
                    item_name.push(item.item_name);                  
                    item_category.push(item.item_category);                  
                    dispatched_to.push(item.dispatched_to);                  
                    ready.push(item.ready);
                    item_m_category.push(item.item_m_category);
                    price.push(item.price); 
                    quantity.push(item.quantity);                  
                    specifics.push(item.specifics);                  
                    priority.push(item.priority);                  
                    }); 
                },
                error:function(){
                    console.log("error");              
                }
            });


            function mainBarItems(){
                for(var i = 0; i<= order_id.length; i++){
                    markup = "<tr><td> "+ i + "</td>  <td>"+ order_id[i] +"</td> <td>"+ item_name[i]+"</td> <td>" + quantity[i] +"</td> <td>"+ specifics[i] +"</td><td>"+ priority[i]+" </tr>";
                    tableBody = $(".table tbody");
                    tableBody.append(markup);  
                }                                                                     
            }

            mainBarItems()

    })

})(jQuery);