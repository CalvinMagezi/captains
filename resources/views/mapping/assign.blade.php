@extends('layouts.dashboard')
@section('content')
@if (Auth::user()->role == 'admin')
    <button class="sticky z-20 float-right p-4 text-sm text-white bg-green-500 border-gray-100 rounded-lg cursor-pointer save_tables top-20 hover:scale-125 hover:underline">
        Save Mapping Changes
    </button>
@endif
<div class="w-full py-5 text-4xl text-center">
    <h1 class="font-bold">Table Assignment</h1>
</div>
<h1 class="text-3xl font-bold">Select Staff Member:</h1>
<div class="flex w-3/4 py-5 mx-auto overflow-x-scroll">
    @forelse (\App\Models\Staff::staffList() as $waiter)
    <div style="background:{{ $waiter->color_code }}" class="w-32 p-2 mx-4 text-center rounded-lg h-28 bg-opacity-60">
        <input type="radio" value="{{ $waiter->name }}" id="{{$waiter->color_code}}" name="assignto" class="mr-1 assignto" required>
         <label style="background:{{$waiter->color_code}}; color:white;" for="{{$waiter->color_code}}">{{ $waiter->name }} </label>
       <h1 class="font-bold">{{ $waiter->userKey->name }}</h1>
    </div>
    @empty
 <div class="w-32 h-32 p-2">
        No Set Staff
    </div>
    @endforelse

</div>
     <div class="w-1/2 text-center">
            <h1 class="py-3 text-2xl font-italic">Select Tables</h1>
        </div>
 <div class="flex">
        <div class="w-1/2 text-center">
    <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">
@forelse (\App\Models\Table::tableList() as $table)
        <div class="w-1/4 px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/4 md:my-1 md:px-1 md:w-1/4 lg:my-1 lg:px-1 lg:w-1/4 xl:my-1 xl:px-1 xl:w-1/4">
                @if ($table->managed_by == 'free')
            <button class="w-10 mx-1 my-1 choose_this_table" id="tb{{ $table->table_number }}" style="border: 1px solid black; background:red;" >
                 {{ $table->table_number }}
             </button>
                 @else
                <button disabled class="w-10 mx-1 my-1 choose_this_table" id="tb{{ $table->table_number }}" style="border: 1px solid black; color:white; background:{{ $table->color_code }};" >
                 {{ $table->table_number }}
             </button>
                 @endif
        </div>
    @empty
        <h1>No Tables Configured</h1>
    @endforelse

</div>
</div>
<div class="w-1/2"  x-data="{ clear: false }">
    <button class="p-2 mx-auto my-2 bg-green-800 rounded-lg submit-button hover:p-5 hover:bg-blue-600"> Assign Selected</button>
    <button x-on:click="clear = ! clear" class="p-2 mx-auto my-2 bg-red-800 rounded-lg hover:p-5 hover:bg-blue-600"> Clear Tables</button>


    {{-- Clear Tables Modal --}}
        <div x-show="clear" class="fixed bottom-0 left-0 flex items-center justify-center w-full h-full bg-gray-800 bg-opacity-60">
        <div class="w-1/2 bg-white rounded-lg">
            <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
                <div class="text-lg font-medium text-gray-900">Clear Tables</div>
                <svg x-on:click="clear = ! clear" class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                    <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                </svg>
            </div>
            <hr>
            <div class="text-black">
                 Are you sure you wish to clear all table assignments?
            </div>
            <hr>
            <div class="ml-auto">
                <form action="{{ route('clear-assign')}}" method="POST">
                    @csrf
                      <button type="submit" class="px-4 py-2 font-bold text-white bg-blue-500 rounded hover:bg-blue-700">
                Clear
                </button>
                </form>
            </div>
            </div>
        </div>
        </div>

</div>
 </div>


@livewire('table-mapping')


@push('scripts')
<script type="text/javascript">
!(function ($) {
    "use strict";
    var table_number = [];
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
          location.reload();
      }
  });
  })

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
          location.reload();
      }
  });
});

})(jQuery);

</script>
@endpush
@endsection
