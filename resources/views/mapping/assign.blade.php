@extends('layouts.dashboard')
@section('content')
<div class="w-full text-center text-4xl py-5">
    <h1 class="font-bold">Table Assignment</h1>
</div>
<h1 class="text-3xl font-bold">Select Staff Member:</h1>
<div class="w-3/4 mx-auto flex overflow-x-scroll py-5">
    @forelse (\App\Models\Staff::staffList() as $waiter)
    <div style="background:{{ $waiter->color_code }}" class="p-2 w-32 h-28 bg-opacity-60 mx-4 text-center rounded-lg">
        <input type="radio" value="{{ $waiter->name }}" id="{{$waiter->color_code}}" name="assignto" class="mr-1 assignto" required>
         <label style="background:{{$waiter->color_code}}; color:white;" for="{{$waiter->color_code}}">{{ $waiter->name }} </label>
       <h1 class="font-bold">{{ $waiter->userKey->name }}</h1>
    </div>
    @empty
 <div class="p-2 w-32 h-32">
        No Set Staff
    </div>
    @endforelse

</div>
     <div class="w-1/2 text-center">
            <h1 class="text-2xl font-italic py-3">Select Tables</h1>
        </div>
 <div class="flex">
        <div class="w-1/2 text-center">
    <div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">
@forelse (\App\Models\Table::tableList() as $table)
        <div class="my-1 px-1 w-1/4 overflow-hidden sm:my-1 sm:px-1 sm:w-1/4 md:my-1 md:px-1 md:w-1/4 lg:my-1 lg:px-1 lg:w-1/4 xl:my-1 xl:px-1 xl:w-1/4">
                @if ($table->managed_by == 'free')
            <button class="choose_this_table w-10 mx-1 my-1" id="tb{{ $table->table_number }}" style="border: 1px solid black; background:red;" >
                 {{ $table->table_number }}
             </button>
                 @else
                <button disabled class="choose_this_table w-10 mx-1 my-1" id="tb{{ $table->table_number }}" style="border: 1px solid black; color:white; background:{{ $table->color_code }};" >
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
    <button class="p-2 my-2 mx-auto rounded-lg bg-green-800 submit-button hover:p-5 hover:bg-blue-600"> Assign Selected</button>
    <button x-on:click="clear = ! clear" class="p-2 my-2 mx-auto rounded-lg bg-red-800 hover:p-5 hover:bg-blue-600"> Clear Tables</button>


    {{-- Clear Tables Modal --}}
        <div x-show="clear" class="flex items-center justify-center fixed left-0 bottom-0 w-full h-full bg-gray-800 bg-opacity-60">
        <div class="bg-white rounded-lg w-1/2">
            <div class="flex flex-col items-start p-4">
            <div class="flex items-center w-full">
                <div class="text-gray-900 font-medium text-lg">Clear Tables</div>
                <svg x-on:click="clear = ! clear" class="ml-auto fill-current text-gray-700 w-6 h-6 cursor-pointer" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
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
                      <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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

</script>
@endpush
@endsection
