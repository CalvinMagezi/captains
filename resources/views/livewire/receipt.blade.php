@include('partials.receiptstyles')

  <div style="width: 100%; height:100%" id="invoice-POS">
        {{-- Printing Section --}}
    <div class="print_content">
        <center id="logo">
            <div class="logo">
                <img  src="{{ asset('img/logo.svg') }}" class="w-64" alt="">
            </div>
            <div class="info">

            </div>
            <h2>Captains Terrace</h2>
        </center>
    </div>

    <div class="text-black mid">
        <div class="info">
            <h2>Contact Us</h2>
            <ul style="list-style:none;" class="block">
                <li>P.O.Box: 925-00606 Nairobi, Kenya</li>
                <li>TELEPHONE: +254795555330</li>
                <li>Pin No: {{ $selected_order->unique_key }}</li>
            </ul>
        </div>
    </div>
<hr style="width:100%;  margin-bottom:10px;">
<div style="width:100%; text-align: center;">
<h1>TILL NO:920804</h1>
</div>
<hr style="width:100%; margin-top:10px;">
    <div class="text-black bot">
        <div class="table">
            <table>
                <tr class="tabletitle">
                    <td colspan="2" class="item"><h2>Item Name</h2></td>
                    <td class="Hours"><h2>Qty</h2></td>
                    <td class="Rate"><h2>Price</h2></td>
                    <td class="item"><h2>Discount</h2></td>
                    <td class="item"><h2>Sub Total</h2></td>
                </tr>
                @foreach ($details as $receipt)
                    <tr class="service">
                        <td colspan="2" class="tableitem"><p class="itemtext">{{ $receipt->productKey->name }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ $receipt->quantity }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ number_format($receipt->productKey->price, 2) }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ $receipt->discount ? '':'0' }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ number_format(($receipt->productKey->price * $receipt->quantity), 2) }}</p></td>
                    </tr>
                @endforeach



                <tr class="service">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate">Total Amount</td>
                    <td class="Payment">
                        <h2>KES {{ number_format($selected_order->total_amount, 2) }}</h2>
                    </td>
                </tr>
                <tr class="service">
                    <td>TAX RATE</td>
                    <td>VAT AMT || CTL</td>
                    <td>VATABLE AMT</td>
                    <td>EXEMPT AMT</td>
                </tr>
                <tr>
                    <td>16% || 2%</td>
                    <td>433.99 || 54.4</td>
                    <td>2,711.85</td>
                    <td>0.00</td>
                </tr>
                <tr>
                    <td colspan="2"><strong>GRAND TOTAL</strong></td>
                    <td colspan="2">KES {{ number_format($selected_order->total_amount, 2) }}</td>
                </tr>
            </table>

            <div class="legalcopy">
                <div style="display:flex; justify-content:between; width:100%; align-items:center;">
                    <div style="margin-left:20px; margin-right:20px;">
                        <h1>Served By {{ $selected_order->taken_by }}</h1>
                    </div>

                <div style="margin-left:20px; margin-right:20px;">
                    <p class="legal"><strong> ** Captains Terrace **</strong>
                </div>
                                <div style="margin-left:20px: margin-right:20px;">
                                    <span>{{ Carbon\Carbon::now('Africa/Nairobi') }}</span>
                                </div>
                                <div style="margin-left:20px: margin-right:20px;">
                                    <h5 style="padding-left:20px;">Goods once sold will not be returned, Prices inclusive of vat where applicable. We appreciate your business here.</h5>
                                </div>


                </div>
                <br>
                </p>
            </div>
        </div>
    </div>
  </div>



