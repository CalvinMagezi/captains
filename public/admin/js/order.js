(function ($) {
    "user strict";

    var available_products = [];
    var available_prices = [];
    var available_hprices = [];
    var available_category = [];
    var available_major_category = [];

    var PostTableNumber = '',
        PostTakenBy = $('#waiter').text(),
        PostOrderItems = [],
        PostOrderPrices = [],
        PostOrderQuantities = [],
        PostOrderSpecifics = [],
        PostOrderPriority = [],
        PostOrderTotalPrice = '';   


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
              available_prices.push(item.price);                  
              available_hprices.push(item.hprice);                  
              available_category.push(item.category);                  
              available_major_category.push(item.major_category);                  
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


      
            // Denotes total number of rows
            var rowIdx = 0;
            var rowConIdx = 0;
            var price_total = 0;

            // jQuery button click event to add a row
            $('#addBtn').on('click', function () {

              var searched_word = $('#search').val();
              
              var item_index = available_products.indexOf(searched_word);

              var item_price = available_prices[item_index];              

              var item_quantity = $('#number').val();

              var confirm_price = (parseInt(item_price) * item_quantity);

              var item_specifics = $('#specifics').val();

              var item_priority = $('#priority').val();

              price_total = price_total + (parseInt(item_price) * item_quantity);   
              
              PostOrderItems.push(searched_word);
              PostOrderPrices.push(item_price);
              PostOrderPriority.push(item_priority);
              PostOrderQuantities.push(item_quantity);
              PostOrderSpecifics.push(item_specifics);
              PostOrderTotalPrice = price_total;              

              console.log(PostOrderItems);              
              console.log(PostTakenBy);
              console.log(PostTableNumber);
              console.log(PostOrderPrices);
              console.log(PostOrderPriority);
              console.log(PostOrderQuantities);
              console.log(PostOrderSpecifics);
              console.log(PostOrderTotalPrice);

              // Adding a row inside the tbody.
              $('#tbody').append(`<tr id="R${++rowIdx}">
                  <td class="row-index text-center">
                  <p>#${rowIdx}</p>
                  </td>
                  <td class="text-center">
                  <p>${searched_word}</p>
                  </td>
                  <td class="text-center">
                  <p>${item_price}</p>
                  </td>
                  <td class="text-center">
                  <p>${item_quantity}</p>
                  </td>
                    <td class="text-center">
                      <button class="btn btn-danger remove"
                        type="button">Remove</button>
                      </td>
                    </tr>`);                    

              // Adding a row inside the confirmation table.
              $('#tbody_confirm').append(`<tr id="R${++rowConIdx}">
              <td class="row-index text-center">
              <p>#${rowConIdx}</p>
              </td>
              <td class="text-center">
              <p>${searched_word} x ${item_quantity}</p>
              <input type="hidden" name="products[]" value="${searched_word}" />
              <input type="hidden" name="quantities[]" value="${item_quantity}" />
              </td>
              <td class="text-center">
              <p>${confirm_price}</p>
              <input type="hidden" name="total_price" value="${confirm_price}" />
              <input type="hidden" name="specifics[]" value="${item_specifics}" />
              <input type="hidden" name="priority[]" value="${item_priority}" />
              </td>                             
                </tr>`);

              $('#price_total').html('Order Total: KES '+price_total);  

              $('#search').val('');
              $('#number').val(1);

            });

            // jQuery button click event to remove a row.
            $('#tbody').on('click', '.remove', function () {

              // Getting all the rows next to the row
              // containing the clicked button
              var child = $(this).closest('tr').nextAll();

              // Iterating across all the rows 
              // obtained to change the index
              child.each(function () {

                // Getting <tr> id.
                var id = $(this).attr('id');

                // Getting the <p> inside the .row-index class.
                var idx = $(this).children('.row-index').children('p');

                // Gets the row number from <tr> id.
                var dig = parseInt(id.substring(1));

                // Modifying row index.
                idx.html(`Row ${dig - 1}`);

                // Modifying row id.
                $(this).attr('id', `R${dig - 1}`);
              });

              // Removing the current row.
              $(this).closest('tr').remove();



              // Decreasing total number of rows by 1.
              rowIdx--;

              // var y = [1, 2, 2, 3, 2]
              // var removeItem = 2;

              // y = jQuery.grep(y, function(value) {
              //   return value != removeItem;
              // });

              console.log(PostOrderItems);              
              console.log(PostTakenBy);
              console.log(PostTableNumber);
              console.log(PostOrderPrices);
              console.log(PostOrderPriority);
              console.log(PostOrderQuantities);
              console.log(PostOrderSpecifics);
              console.log(PostOrderTotalPrice);
            });




                    //================
                    //Quantity Button
                    //================                  
                    
                    $('#plus').unbind('click').bind('click', function () {
                      
                      var value = $('#number').val();

                      value++;

                      $('#number').val(value);
                      
                      console.log(value)
                    });
                    
                    $('#minus').unbind('click').bind('click', function () {
                        
                        var value = $('#number').val();

                        if(value > 1 ){
                          value--;
                        }        

                        console.log(value)

                        $('#number').val(value);
                    });
                    
                    

                  
                    
//Select Table Button
$('.set-table').click(function(){
  
  var table_number = $(this).text(); 

  if($(this).hasClass("chosen")){
   
    $(this).removeClass('chosen');
    $(this).css('background', 'none');
    $('.tb').css("visibility","visible")    
    PostTableNumber = ''
    $('#chosen_table').html('');

  }else{

    $(this).css('background', 'green');
    PostTableNumber = table_number;
    $('#chosen_table').html('Table Number: '+table_number);
    $('.tb').css("visibility","hidden")
    $(this).css("visibility", "visible")
  }

  $(this).addClass('chosen');

});                    

//Submit Order Ajax Request

$('.save-order').click(function(){

  $.ajax({
      //this part
      url: "/api/save-order",
      type:"POST",
      data: { table_number: PostTableNumber,
              taken_by: PostTakenBy,
              items: PostOrderItems,              
              prices: PostOrderPrices, 
              quantities: PostOrderQuantities, 
              specifics: PostOrderSpecifics, 
              priority: PostOrderPriority, 
              total: PostOrderTotalPrice},
      success:function(response){
         console.log("success");
         window.alert("Successfully Added New Order");
      },
      error:function(){
          console.log("error");
          window.alert("Oops Something Went Wrong");
      }
  });
});
            

    });
  
})(jQuery);