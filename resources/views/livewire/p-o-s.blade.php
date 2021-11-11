<div>
    <div class="container-fluid">
        <div class="col-lg-12">
            <div class="row justify-content-center">
                <div x-data="{ confirm: false }">
                    <button x-on:click="confirm = ! confirm" class="absolute right-0 z-40 p-3 px-4 py-2 text-white bg-green-500 rounded hover:bg-green-600 focus:outline-none">
                        Confirm Order
                    </button>

                    <div x-show="confirm" class="fixed bottom-0 left-0 flex items-center justify-center w-full h-full bg-gray-800">
                    <div class="w-1/2 bg-white rounded-lg">
                        <div class="flex flex-col items-start p-4">
                        <div class="flex items-center w-full">
                            <div class="text-lg font-medium text-gray-900">Please confirm wether the bellow details are correct.</div>
                            <svg x-on:click="confirm = false" class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                            </svg>
                        </div>
                        <hr>
                        <div class="">
                             <form action="{{ route('store-order') }}" method="post">
                        @csrf
                        <input type="hidden" name="taken_by" value="{{ Auth::user()->name }}">
                        <input type="hidden" name="table_number" value="{{ $table_number }}">
                        <input type="hidden" name="extra_notes" value="{{ $extra_notes }}">
                        <input type="hidden" name="total_amount" value="{{ $productInCart->sum('product_price') }}">
                        @foreach ($productInCart as $cart)
                        <input type="hidden" name="product_id[]"
                        value="{{ $cart->productKey->id }}">
                        <input type="hidden" name="price[]"
                        value="{{ $cart->productKey->price }}">
                        <input type="hidden" name="discount[]"
                        value="{{ $discounted_amount }}" class="discount">
                       <input type="hidden" name="quantity[]"
                       value="{{ $cart->product_qty }}">
                        @endforeach
                        <div class="card">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="text-center card-header" style="background:#000; color:white;">
                                        <h4>Table Number:  <b>{{ $table_number }}</b></h4>
                                        <br>
                                        <h4>Total <b class="total">{{ $productInCart->sum('product_price') }}</b></h4>
                                    </div>
                                    <div class="card-body">
                                         <div class="mt-3 text-black">
                                             <label for="">Extra Notes</label>
                                         <textarea style="color:#fff; background:#000;" wire:model="extra_notes" class="form-control" rows="3"></textarea>
                                         </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="text-center card-footer">
                                        Placing order as {{ Auth::user()->name }}
                                    </div>
                                </div>
                            </div>
                        </div>

                        </div>
                        <hr>
                        <div class="ml-auto">
                            <button type="submit" wire:click="placeOrder" class="px-4 py-2 font-bold text-white bg-green-500 rounded hover:bg-blue-700">
                            Place Order
                            </button>
                             <button wire:click="clearOrder" class="px-4 py-2 font-bold text-white bg-red-500 rounded hover:bg-blue-700">
                            Clear Order
                            </button>
                            <button x-on:click="confirm = false" class="px-4 py-2 font-semibold text-blue-700 bg-transparent border border-blue-500 rounded hover:bg-gray-500 hover:text-white hover:border-transparent">
                            Close
                            </button>
                        </div>
                        </form>
                        </div>
                    </div>
                    </div>


                </div>
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header" style="background:#000; color:white;">
                            <h4 class="text-3xl font-bold text-center">Place A New Order</h4>
                        </div>
                        <div class="card-body">
                            @if ($message)
                            <!-- This is an example component -->
                            <div class="max-w-lg mx-auto">
                                <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg" role="alert">
                                    <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                                    <div>
                                        <span class="font-medium">{{ $message }}</span>
                                    </div>
                                    <svg x-on:click="$wire.emit('clear_message')" class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
                                    </svg>
                                </div>
                            </div>
                            @endif

                            <div>
                            @if ($searched)
                            <div class="flex flex-wrap -mx-1 overflow-hidden text-center sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">
                            @foreach ($searched as $product)
                            <div class="w-1/4 px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/4 md:my-1 md:px-1 md:w-1/4 lg:my-1 lg:px-1 lg:w-1/4 xl:my-1 xl:px-1 xl:w-1/4">
                                <button
                                wire:click="InsertCart('{{ $product->name }}')"
                                class="p-3 mx-1 bg-green-600">
                                {{ $product->name }}
                            </button>
                            </div>
                            @endforeach
                            </div>
                            @endif
                            </div>

                            <div class="flex flex-wrap w-screen -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">

                            <div class="w-full px-1 mx-auto my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-1 lg:px-1 lg:w-1/2 xl:my-1 xl:px-1 xl:w-1/2">
                                 <input style=" color: #000; font-weight:800; font-size:1.6rem; text-align:center;"
                                    wire:keydown="selectTable"
                                    wire:model="table_number"
                                    type="number" class="py-1 form-control w-100"
                                    placeholder="Select Table #">

                                    <input style=" color: #000; font-weight:800; font-size:1.6rem; text-align:center;"
                                     wire:model="discounted_amount"
                                    type="number"
                                    class="py-1 form-control w-100"
                                    placeholder="Discount %">
                            </div>

                            </div>

                            <div class="w-screen pb-2">
                                <div class="w-full mx-auto">
                                    <div class="flex items-center w-full max-w-xl p-2 mr-4 bg-white border border-gray-200 rounded shadow-sm">
                                            <button class="outline-none focus:outline-none">
                                            <svg class="w-5 h-5 text-gray-600 cursor-pointer" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" stroke="currentColor" viewBox="0 0 24 24"><path d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                                            </button>
                                            <input type="search"
                                             wire:model="term"
                                             wire:keydown.enter="displayProduct"
                                            placeholder="Search Product Name"
                                            class="w-full pl-3 text-sm text-black bg-transparent outline-none focus:outline-none" />
                                        </div>
                                </div>
                            </div>

                            <table class="min-w-full divide-y divide-gray-200">
                                <thead>
                                    <tr>
                                        <th class="px-2 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">#</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">Name</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-left text-gray-500 uppercase bg-gray-50">Qty</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">Price</th>
                                        <th class="px-6 py-3 text-xs font-medium leading-4 tracking-wider text-center text-gray-500 uppercase bg-gray-50">Total</th>
                                    </tr>
                                </thead>
                                <tbody class="addMoreProduct">
                                    @if (count($productInCart))
                                    @foreach ($productInCart as $cart)
                                    <tr class="text-center">
                                        <td>{{ $loop->iteration }}</td>
                                        <td>
                                         <input
                                         readonly
                                         style="background:none;"
                                         type="text" name="name[]"
                                         value="{{ $cart->productKey->name }}"
                                         class="text-center form-control name">
                                        </td>
                                        <td class="text-center">
                                            <div class="flex mx-auto">
                                                <div class="float-left col-md-4">
                                                    <button wire:click.prevents="incrementQty({{ $cart->id }})"
                                                        class="px-3 bg-green-500 btn btn-sm">
                                                        +
                                                    </button>
                                                </div>
                                                <div class="text-center col-md-4">
                                                   <button class="px-3 text-center btn btn-sm btn-secondary">
                                                       <strong style="font-size:1.1rem;">{{ $cart->product_qty }}</strong>
                                                    </button>
                                                </div>
                                                <div class="col-md-4">
                                                    <button wire:click.prevents="decrementQty({{ $cart->id }})"
                                                        class="px-3 bg-red-500 btn btn-sm">
                                                        -
                                                    </button>
                                                </div>
                                            </div>
                                        </td>
                                        <td class="ml-2">
                                         <input
                                         readonly
                                         style="background:none;"
                                         type="number" name="price[]"
                                         value="{{ $cart->productKey->price }}"
                                         class="text-center form-control price">
                                         </td>

                                         <td>
                                             <input class="text-center" readonly style="background:none;" type="number" name="total_amount[]"
                                             @if($discounted_amount)
                                             value="{{ ($cart->product_qty * $cart->productKey->price ) - (($cart->product_qty * $cart->productKey->price)  * ($discounted_amount / 100)) }}"
                                             @else
                                             value="{{ ($cart->product_qty * $cart->productKey->price ) }}"
                                             @endif

                                             class="form-control total_amount">
                                         </td>
                                         <td class="p-2 text-xs font-medium leading-4 tracking-wider text-center uppercase bg-red-500">
                                             <a href="#" class="bg-red rounded-circle">
                                                 <i wire:click="removeProduct({{ $cart->id }})" class="fa fa-close" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                    </tr>
                                    @endforeach
                                    @else
                                    <tr>
                                        <td colspan="3">No Items In Cart</td>
                                    </tr>
                                    @endif

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<style>

    .modal.right .modal-dialog{
        top: 0;
        right:0;
        margin-right: 19vh;
    }

    .modal.fade:not(.in).right .modal-dialog{
        --webkit-transform: translate3d(25%, 0, 0);
        transform: translate3d(25%, 0, 0);
    }

    .radio-item input[type="radio"]{
        visibility:hidden;
        width: 20px;
        height: 20px;
        margin: 0 5px 0 5px;
        padding: 0;
        cursor:pointer;
    }

    /* Before */
    .radio-item input[type="radio"]:before{
        position: relative;
        margin: 4px -25px -4px 0;
        display: inline-block;
        visibility: visible;
        width: 20px;
        height: 20px;
        border-radius:10px;
        border: 2px inset rgb(150, 150, 150, 0.75);
        background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%, rgb(250, 250, 250) 5%,rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
        content:'';
        cursor:pointer;
    }

    /* After */
    .radio-item input[type="radio"]:checked:after{
        position: relative;
        top:0;
        left:9px;
        display: inline-block;
        visibility: visible;
        width: 12px;
        height: 12px;
        background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%, rgb(240, 255, 220) 0%,rgb(225, 250, 100) 5%, rgb(75, 75, 75) 100%);
        content:'';
        cursor:pointer;
        border-radius:10px;
    }

    /* After Checked */
    .radio-item input[type="radio"].true:checked:after{
        background: radial-gradient(ellipse at top left,
                 rgb(240, 255, 220) 0%,
                 rgb(225, 250, 100) 5%,
                 rgb(75, 75, 0) 95%,
                 rgb(25, 100, 0) 100%);
    }

     /* After Checked */
     .radio-item input[type="radio"].false:checked:after{
        background: radial-gradient(ellipse at top left,
                    rgb(255, 255, 255) 0%,
                    rgb(250, 250, 250) 5%,
                    rgb(230, 230, 230) 95%,
                    rgb(225, 225, 225) 100%);
    }

    .radio-item label{
        display:inline-block;
        margin: 0;
        padding: 0;
        line-height: 25px;
        height: 25px;
        cursor:pointer;
    }

</style>

@push('scripts')
<script>
   //Full Total Logic Here
   function TotalAmount(){
       var total = 0;
       $('.total_amount').each(function(i, e){
           var amount = $(this).val() - 0;
           total += amount;
       });

       $('.total').html(total);
   }

   $('.addMoreProduct').delegate('.product_id','change', function(){
       var tr = $(this).parent().parent();
       var price = tr.find('.product_id option:selected').attr('data-price');
       tr.find('.price').val(price);
       var qty = tr.find('.quantity').val() - 0;
       var disc = tr.find('.discount').val() - 0;
       var price = tr.find('.price').val() - 0;
       var total_amount = (qty * price) - ((qty * price * disc) / 100);
       tr.find('.total_amount').val(total_amount);
       TotalAmount();
   });

   $('.addMoreProduct').delegate('.quantity , .discount','keyup', function(){
       var tr = $(this).parent().parent();
       var qty = tr.find('.quantity').val() - 0;
       var disc = tr.find('.discount').val() - 0;
       var price = tr.find('.price').val() - 0;
       var total_amount = (qty * price) - ((qty * price * disc) / 100);
       tr.find('.total_amount').val(total_amount);
       TotalAmount();
   })

   $('#paid_amount').keyup(function(){
       var total = $('.total').html();
       var paid_amount = $(this).val();
       var tot = paid_amount - total;
       $('#balance').val(tot).toFixed(2);
   });

   //Print Section
   function PrintReceiptContent(el){
       var data = `<input type="button" id="printPageButton" class="printPageButton" style="display:block; width:100%; border:none; background: #008b8b; color: #fff; padding: 14px 28px; font-size:16px; cursor:pointer; text-align:center;" value="Print Receipt" onClick="window.print()" />`;

            data += document.getElementById(el).innerHTML;
            myReceipt = window.open("","myWin","left=150, top-130, width=400, height=400");
            myReceipt.screenX = 0;
            myReceipt.screenY = 0;
            myReceipt.document.write(data);
            myReceipt.document.title = "Print Receipt";
            myReceipt.focus();
            setTimeout(() => {
                myReceipt.close();
            }, 8000);
   }

</script>
@endpush

