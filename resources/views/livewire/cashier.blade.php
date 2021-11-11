<div>
      @if ($ordermessage)
     <!-- This is an example component -->
     <div class="max-w-lg mx-auto">
         <div class="flex p-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg" role="alert">
             <svg class="inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
             <div>
                 <span class="font-medium">{{ $ordermessage }}</span>
             </div>
             <svg x-on:click="$wire.emit('clear_ordermessage')" class="w-6 h-6 ml-auto text-gray-700 cursor-pointer fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 18 18">
                 <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z"/>
             </svg>
         </div>
      </div>
     @endif

     @if ($searched)
         <div class="w-full">
             <div class="text-center row justify-content-center">
        <div class="text-center col-12">
            <hr>
            <h4 class="py-3">Print</h4>
            <hr>
           </div>
        <div class="col-m6-4">
            <a
            href="/receipt/{{ $selected_id }}"
            target="_blank"
            style="border-radius:10px;"
            type="button"
            class="mx-1 my-auto btn btn-dark w-100">
            <i class="fa fa-print" aria-hidden="true"></i>
            <br>
            <p>Receipt</p>
          </a>
        </div>
    </div>
         </div>
     @endif

<div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">

  <div class="w-1/2 px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-1 lg:px-1 lg:w-1/2 xl:my-1 xl:px-1 xl:w-1/2">
     <div class="text-center col-3">
       <h4 class="py-2 text-center">Select Order #</h4>
       <input
       placeholder="Eg. 1"
       style="
       color:#000;
        font-size:3.5rem;"
       wire:keydown.debounce.100ms="verifyOrder"
       wire:model="selected_id" type="number"
       class="text-center form-control">
       @error('selected_id') <span class="error">{{ $message }}</span> @enderror
     </div>
  </div>

  <div class="w-1/2 px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-1 lg:px-1 lg:w-1/2 xl:my-1 xl:px-1 xl:w-1/2">
     @if ($searched)
    <div class="mx-auto modal">
        <div id="print">
            @livewire('receipt', ['order' => $selected_id])
        </div>
    </div>
    @endif
  </div>

</div>

<div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">

  <div class="w-full px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3">
    <div>
        <h4 class="py-2 text-center">Received (KES):
            <br>
            <br>
        <input
            style="background:rgba(100, 100, 100, 0.438);
                  border-radius: 15px 50px 30px;
                  color:#fff;
                  min-height:100px"
        wire:keydown.debounce.100ms="getChange"
        wire:model="received"
        type="number" name="paid_amount" id="paid_amount" class="text-center form-control">
        @error('received') <span class="error">{{ $message }}</span> @enderror
     </div>
  </div>

  <div class="w-full px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3">
    <div>
        <h4 class="py-2 text-center">Expected (KES):
            <br>
            <br>
            <input
        style="background:rgba(100, 100, 100, 0.438);
                  border-radius: 30px 50px 15px;
                  color:#fff;
                  min-height:100px"
               type="number"
                readonly type="number" value="{{ $expected }}"  class="text-center form-control">
        </h4>
    </div>
  </div>

  <div class="w-full px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/3 md:my-1 md:px-1 md:w-1/3 lg:my-1 lg:px-1 lg:w-1/3 xl:my-1 xl:px-1 xl:w-1/3">
    <div class="py-1 col-4">
         <h4 class="py-2 text-center">Change (KES):
             <br>
             <br>
         <input
         style="background:rgba(100, 100, 100, 0.438);
         border-radius: 30px 15px 50px;
         color:#fff;
         min-height:100px"
         type="number"
          wire:model="balance"
          readonly type="number" value="{{ $balance }}" name="balance" id="balance" class="text-center form-control">
         @error('balance') <span class="error">{{ $message }}</span> @enderror
      </div>
  </div>

</div>

<div class="flex flex-wrap -mx-1 overflow-hidden sm:-mx-1 md:-mx-1 lg:-mx-1 xl:-mx-1">

  <div class="w-full px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-1 lg:px-1 lg:w-1/2 xl:my-1 xl:px-1 xl:w-1/2">
    <div class="py-3 row justify-content-center">
         <div class="text-center col-12">
             <hr>
             <h4 class="py-3">Payment Method</h4>
             <hr>
         </div>
         <div class="py-2 row justify-content-center">
            <ul class="flex">
                 <li class="col-md-3">
                 <span class="flex radio-item">
                     <input type="radio" wire:model="pay_mode" name="payment_method"
                        class="true" value="cash" checked="checked">
                     <h5 style="font-size:1.rem; font-weight:800;">
                        <i style="font-size:1.4rem;" class="py-2 fas fa-money-bill text-success"></i>
                        Cash
                    </h5>
                </span>
                </li>
                <li class="col-md-3">
                    <span class="flex radio-item">
                        <input type="radio" wire:model="pay_mode" name="payment_method"
                        class="true" value="card">
                       <h5 style="font-size:1.rem; font-weight:800;">
                           <i style="font-size:1.4rem;" class="py-2 fas fa-credit-card text-success"></i>
                        Card
                    </h5>
                        </span>
                </li>
                   <li class="col-md-3">
                    <span class="flex radio-item">
                        <input type="radio" wire:model="pay_mode" name="payment_method"
                        class="true" value="mpesa">
                        <h5 style="font-size:1.rem; font-weight:800;">
                            <i style="font-size:1.4rem;" class="py-2 fas fa-phone text-success"></i>
                            Mpesa
                        </h5>
                    </span>
                </li>
            </ul>
         </div>
          <div class="col-12">
              @error('pay_mode') <span class="error">{{ $message }}</span> @enderror
          </div>
     </div>
  </div>

  <div class="w-full px-1 my-1 overflow-hidden sm:my-1 sm:px-1 sm:w-1/2 md:my-1 md:px-1 md:w-1/2 lg:my-1 lg:px-1 lg:w-1/2 xl:my-1 xl:px-1 xl:w-1/2">
    <div class="flex pt-2 justify-content-center">
         <div class="w-3/4 pt-2 mx-auto">
             <button wire:click="closeOrder"
             type="submit"
             class="p-5 bg-green-600 rounded-lg ">Close</button>
         </div>
         @if (Auth::user()->role == 'admin')
         <div class="w-3/4 pt-2 mx-auto">
             <button wire:click="updateShowModal({{ $order_id }})"
             class="p-5 bg-yellow-600 rounded-lg ">Edit</button>
         </div>
         <div class="w-3/4 pt-2 mx-auto">
             <button wire:click="deleteShowModal({{ $order_id }})"
             class="p-5 bg-red-600 rounded-lg ">Delete</button>
         </div>
         @endif
         </div>
  </div>

</div>

 <div class="text-center card-footer">
        Manging Order As {{ Auth::user()->name }}
</div>



</div>

<style>
    /* Chrome, Safari, Edge, Opera */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
        }

        /* Firefox */
        input[type=number] {
        -moz-appearance: textfield;
        }

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
        width: 30px;
        height: 30px;
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
        width: 30px;
        height: 30px;
        border-radius:10px;
        border: 2px inset rgb(150, 150, 150, 0.75);
        background: radial-gradient(ellipse at top left, rgb(255, 255, 255) 0%, rgb(250, 250, 250) 5%,rgb(230, 230, 230) 95%, rgb(225, 225, 225) 100%);
        content:'';
        cursor:pointer;
    }

    /* After */
    .radio-item input[type="radio"]:checked:after{
        position: relative;
        display: inline-block;
        visibility: visible;
        width: 24px;
        height: 24px;
        background: radial-gradient(ellipse at top left, rgb(240, 255, 220) 0%, rgb(240, 255, 220) 0%,rgb(225, 250, 100) 5%, rgb(75, 75, 75) 100%);
        content:'';
        cursor:pointer;
        border-radius:5px;
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

    .details_modal .modal-dialog{
        position: absolute;
        left:0;
        top:30vh;
        min-width:70vw;
    }

    .details_modal h1{
        font-weight:800;
        font-size:1.8rem;
    }

    .detail_row{
        border:1px solid #000;
    }
    .detail_row .col-2{
        border-right:1px solid #000;
    }
    .detail_title p{
        font-weight:600;
        font-size:1.3rem;
    }

    .details_modal .modal-title{
        font-weight:900 !important;
        font-size:1.7rem !important;
    }

</style>

@section('script')
<script>

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
@endsection

