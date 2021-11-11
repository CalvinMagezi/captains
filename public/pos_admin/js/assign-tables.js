!(function ($) {
    "use strict";

    var selected_tables = [];
    var assigned_to = '';
    var color_code = '';

$('.choose_this_table').click(function(){

    var table_id = $(this).attr('id');
    table_id = table_id.substring(2);    

    if($(this).hasClass('selected_table')){
        $(this).css('background', 'white');
        $(this).removeClass('selected_table')
        selected_tables.splice( $.inArray(table_id, selected_tables), 1 );
        
    }else{
        $(this).css('background', 'green');
        $(this).addClass('selected_table')
        selected_tables.push(table_id);        
        
    }   
})


$('.submit-button').click(function () {
  
   assigned_to = $("input[name='assignto']:checked").val();
   color_code = $("input[name='assignto']:checked").attr('id');
   
    $.ajax({
      
      url: "/api/assign-tables",
      type:"POST",
      data: { tables_assigned: selected_tables,assigned_to: assigned_to, color_code: color_code},
      success:function(response){
         console.log("success");
         window.alert("Successfully Updated Table Mapping");
         location.reload();
      },
      error:function(){
          console.log("error");
          window.alert("Oops Something Went Wrong");
          location.reload();
      }
  });
  }) 

})(jQuery);
