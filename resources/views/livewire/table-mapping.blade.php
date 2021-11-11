<div>
@push('styles')
<style>
    .mapping-container {
    width: 550px;
    height: 600px;
    border: 4px solid;
    overflow: hidden;
    position: relative;
  }

  .word {
  border: 1px solid black;
  border-radius: 2px;
  position: absolute;
  cursor: grab;
  padding: 5px;
  background: white;
  font-family: 'Zilla Slab', serif;

}

.balcony{
  width: 100%;
  height: 30px;
  top: 0 !important;
  border: 1px solid black;
  padding: 5px;
}

.long-table-1{
  position: absolute;
  width: 40%;
  height: 30px;
  top: 30px !important;
  border: 1px solid black;
  padding: 5px;
}

.bar{
position: absolute;
left:40%;
top: 30px;
width: 20%;
height: 30px;
border: 1px solid black;
padding: 5px;
}

.long-table-2{
  position: absolute;
  width: 40%;
  height: 30px;
  top: 30px !important;
  right: 0 !important;
  border: 1px solid black;
  padding: 5px;
}

.dj{
  height: 60px;
  width: 20%;
  position: absolute;
  left: 0 !important;
  top: 22.5%;
  border: 1px solid black;
  padding: 15px;
}

.kitchen{
  position: absolute;
  top: 0;
  right: 0;
  height: 50%;
  width: 5%;
  border: 1px solid black;
  padding-top: 15%;
  padding-left: 7.5px;
  padding-right: 7.5px;
}

.page-line-l{
  position: absolute;
  width: 45%;
  top: 50% !important;
  height: 1px;
  border: 2px solid black;
}

.page-line-r{
  position: absolute;
  width: 45%;
  top: 50% !important;
  right: 0 !important;
  height: 1px;
  border: 2px solid black;
}

.vip-1{
  position: absolute;
  width: 20%;
  height: 60px;
  top: 50% !important;
  left: 0;
  border: 2px solid black;
  padding: 15px;
}

.vip-2 {
  position: absolute;
  width: 20%;
  height: 60px;
  top: 50% !important;
  right: 0;
  border: 2px solid black;
  padding: 15px;
}

.bar-2{
  position: absolute;
  width: 15%;
  height: 30px;
  top: 52.5% !important;
  left:20%;
  border: 2px solid black;
  padding: 5px;
}

.station{
  position: absolute;
  width: 15%;
  height: 30px;
  top: 52.5% !important;
  right: 20%;
  border: 2px solid black;
  padding: 5px;
}

.bar-3 {
  position: absolute;
  left: 0;
  bottom: 0;
  height: 30px;
  width: 20%;
  border: 2px solid black;
  padding: 5px;
}

.dj-2{
  position: absolute;
  left: 40%;
  bottom: 0;
  height: 30px;
  width: 20%;
  border: 2px solid black;
  padding: 5px;
}

.free{
  background: red !important;
}

.not-free{
  background: green !important;
}

.curtain-1{
  position: absolute;
  width: 75%;
  bottom: 0 !important;
  left: -13% !important;
  transform: rotate(90deg);
  height: 1px;
  border: 2px solid black;
}
.curtain-2{
  position: absolute;
  width: 21%;
  bottom: 10% !important;
  left: 0 !important;
  height: 1px;
  border: 2px solid black;
}
.curtain-3{
  position: absolute;
  width: 75%;
  bottom: 0 !important;
  left: 30% !important;
  transform: rotate(90deg);
  height: 1px;
  border: 2px solid black;
}

.entrance{
  height: 220px;
  width: 6%;
  position: absolute;
  right: 0 !important;
  bottom: 3%;
  border: 1px solid black;
  padding: 15px;
}

</style>
@endpush

{{-- Mapping Outlay --}}
<div class="w-full text-center">
    <h1 class="text-4xl py-5 font-bold">Table Mapping</h1>
</div>
<h1 class="text-3xl font-bold">Color Coding:</h1>
<div class="w-3/4 mx-auto flex overflow-x-scroll py-5">
    <div style="background:red;" class="p-2 w-32 h-28 bg-opacity-60 mx-4 text-center rounded-lg">
       <h1 class="font-bold">Unnassigned</h1>
    </div>
    @forelse ($staff as $item)
    <div style="background:{{ $item->color_code }}" class="p-2 w-32 h-28 bg-opacity-60 mx-4 text-center rounded-lg">
       <h1 class="font-bold">{{ $item->userKey->name }}</h1>
    </div>
    @empty
 <div class="p-2 w-32 h-32">
        No Set Staff
    </div>
    @endforelse

</div>
    <div id="mapping-container" class="mapping-container mx-auto" >
    <section id="outside-tables">
        <div class="balcony text-center">View Of Park</div>
        <div class="long-table-1 text-center">Long Table 1</div>
        <div class="bar text-center">Cocktail Bar</div>
        <div class="long-table-2 text-center">Long Table 2</div>
        <div class="dj text-center"> DJ Stand</div>
        <div class="kitchen text-center">K I T C H E N</div>
        <div class="page-line-l"></div>
        <div class="page-line-r"></div>
        <div class="vip-1 text-center">Prive' 1</div>
        <div class="vip-2 text-center">Prive' 2</div>
        <div class="bar-2 text-center">Bar</div>
        <div class="station text-center">Station</div>
        <div class="bar-3 text-center">Main Bar</div>
        <div class="dj-2 text-center">DJ Stand</div>
        <div class="curtain-1"></div>
        <div class="curtain-2"></div>
        <div class="curtain-3"></div>
        <div class="entrance">E N T R A N C E</div>
    </section>
    </div>

@push('scripts')
<script type="text/javascript">
    !(function ($) {
  "use strict";


var table_number = [];
var table_id = [];
var managed_by = [];
var color_code_arr = [];
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
    managed_by.push(item.managed_by);
    color_code_arr.push(item.color_code);
    status.push(item.status);
    arr_top.push(item.top);
    arr_left.push(item.left);
    });

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
    let managed = managed_by[index];
    let color_code = color_code_arr[index];

   let magnet = document.createElement('div')
   magnet.append(table)
    magnet.setAttribute("class", "word")
    magnet.style.color = 'white';

    if(managed == 'free'){
      magnet.style.background = 'red';
    }else{
      magnet.style.background = color_code;
    }

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
         location.reload();
      },
      error:function(){
          console.log("error");
          window.alert("Oops Something Went Wrong");
          location.reload();
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
</script>
@endpush
</div>
