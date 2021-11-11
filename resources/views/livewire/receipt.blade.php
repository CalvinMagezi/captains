@extends('layouts.receipt')
@section('content')
  <div id="invoice-POS">
        {{-- Printing Section --}}
    <div class="print_content">
        <center id="logo">
            {{-- <div class="logo">
                <img src="img/logo/logo.png" alt="">
            </div> --}}
            <div class="info">

            </div>
            <h2>Captains Terrace</h2>
        </center>
    </div>

    <div class="text-black mid">
        <div class="info">
            <h2>Contact Us</h2>
            <ul class="block">
                <li>Address: Test</li>
                <li>Email: Test</li>
                <li>Phone: Test</li>
                <li>Website: Test</li>
            </ul>
        </div>
    </div>

    <div class="text-black bot">
        <div class="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Item</h2></td>
                    <td class="Hours"><h2>Qty</h2></td>
                    <td class="Rate"><h2>Price</h2></td>
                    <td class="item"><h2>Discount</h2></td>
                    <td class="item"><h2>Sub Total</h2></td>
                </tr>
                @foreach ($details as $receipt)
                    <tr class="service">
                        <td class="tableitem"><p class="itemtext">{{ $receipt->productKey->name }}</p></td>
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
                    <td class="Rate"><p class="itemtext">Tax</p></td>
                    <td class="Payment"><p class="itemtext">5% </p></td>
                </tr>

                <tr class="service">
                    <td></td>
                    <td></td>
                    <td></td>
                    <td class="Rate">Total</td>
                    <td class="Payment">
                        <h2>KES {{ number_format($selected_order->total_amount, 2) }}</h2>
                    </td>
                </tr>
            </table>

            <div class="legalcopy">
                <p class="legal"><strong> ** Captains Terrace **</strong>
                <br>
                Local Taxes Implied
                </p>
            </div>
            <div class="serial-number">
                Serial: <span class="serial">12099476817982</span>
                <br>
                <span>{{ Carbon\Carbon::now('Africa/Nairobi') }}</span>
            </div>
        </div>
    </div>
  </div>
@endsection

