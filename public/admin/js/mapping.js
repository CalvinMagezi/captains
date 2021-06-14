!(function ($) {
  "use strict";


var table_number = [];
var table_id = [];
var status = [];
var arr_top = [];
var arr_left = [];

var sPositions = localStorage.positions || "{}",
    positions = JSON.parse(sPositions);
    
$.each(positions, function (id, pos) {
    $("#" + id).css(pos)
})

$(document).ready(function() {


$.ajaxSetup({

headers: {
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});

$.ajax({

    url: '/api/get-tables',
    type: "GET",
  success: function (result) {

    result.forEach((item) => {

    table_number.push(item.table_number);
    table_id.push(item.table_id);
    status.push(item.status);        
    arr_top.push(item.top);        
    arr_left.push(item.left);        
    });   

    console.log(arr_top)
    console.log(arr_left)
    
var outside_tables = document.getElementById('outside-tables');

var tables = table_number;

var last_table = tables[tables.length - 1]

var new_table = parseInt(last_table) + 1;

$('.inside_number').attr('value', new_table);
$('.outside_number').attr('value', new_table);

function placeTablesOut(array) {
  let index = 0
 
  array.forEach(table => {

    let top = arr_top[index];
    let left = arr_left[index];   

   let magnet = document.createElement('div')
   magnet.append(table)
    magnet.setAttribute("class", "word")
    magnet.setAttribute("id", table + index)
    outside_tables.appendChild(magnet)
    magnet.style.top = top 
    magnet.style.left = left   

    $("#"+table+index).draggable({
      containment: "#mapping-container",
      scroll: false,
      stop: function (event, ui) {
          positions[this.id] = ui.position
          localStorage.positions = JSON.stringify(positions)
      }
    });
    
    if (left > window.innerWidth/1.5) {
      top += magnet.offsetHeight + 8
      left = 30
    }
    else {
      left += magnet.offsetWidth + 8

    }
   
    index++
  })
}

$('.save_tables').click(function(){

  var PostTableNumber = [],
      PostTop = [],
      PostLeft = [];

  for(var i = 0; i<= table_number.length; i++){
    
    var table = i + 1;
    var top = $('#'+table+i);

    var ctable_number = i + 1;
    ctable_number = PostTableNumber.push(ctable_number);

    var ctop = top.css('top');
   
     ctop = PostTop.push(ctop);

    var cleft = top.css('left');
    cleft = PostLeft.push(cleft);
  }

  $.ajax({
      //this part
      url: "/api/save-tables",
      type:"POST",
      data: { table_number: PostTableNumber,top: PostTop,left: PostLeft},
      success:function(response){
         console.log("success");
         window.alert("Successfully Updated Table Mapping");
      },
      error:function(){
          console.log("error");
          window.alert("Oops Something Went Wrong");
      }
  });
});

//Run Functions
placeTablesOut(tables)


  },

error: function (error) {
  console.log(`Error ${error}`);
}


});

});

})(jQuery);