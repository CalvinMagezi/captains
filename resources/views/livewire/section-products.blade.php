<div  wire:poll.5s>
@include('partials.messages')

 <div class="w-full">
 <div class="table-responsive">
         <table class="table w-full table-hover">
             <thead>
                 <tr class="text-center">
                     <td class="text-2xl font-bold">Table #</td>
                     <td class="text-2xl font-bold">Order #</td>
                     <td class="text-2xl font-bold">Item Name</td>
                     <td class="text-2xl font-bold">Quantity</td>
                     <td class="text-2xl font-bold">Specifics</td>
                     <td class="text-2xl font-bold">Priority</td>
                     <td class="text-2xl font-bold">Notify Waiter</td>
                 </tr>
             </thead>
             <tbody id="main_bar_table">
                 @forelse ($order_details as $details)
                 @if ($details->dispatched_to == $dispatched_to)
                    <tr class="text-center">
                         <td>{{$details->orderKey->table_number}}</td>
                         <td>{{$details->order_key_id}}</td>
                         <td>{{$details->productKey->name}}</td>
                         <td>{{$details->productKey->quantity}}</td>
                         <td>{{$details->productKey->specifics}}</td>
                         <td>{{$details->productKey->priority}}</td>
                         <td>
                             <form action="{{ route('item-ready') }}" method="post">
                             @csrf
                             <input type="hidden" name="item_name" value="{{$details->productKey->name}}">
                             <input type="hidden" name="taken_by" value="{{$details->orderKey->taken_by}}">
                             <input type="hidden" name="product_id" value="{{$details->product_key_id}}">
                             <input type="hidden" name="order_id" value="{{$details->order_key_id}}">
                             <button type="submit" class="w-24 p-4 text-white bg-green-600 rounded-lg hover:bg-blue-600">{{Str::limit($details->orderKey->taken_by,9)}}</button>
                             </form>
                        </td>
                     </tr>
                 @endif
                 @empty
                 <tr colspan="6">
                     <td>
                         <h1>No Data Found</h1>
                     </td>
                 </tr>
             @endforelse
             </tbody>
         </table>
     </div>
 </div>
</div>
