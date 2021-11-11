<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Receipt</title>
    @livewireStyles
</head>
<body>
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

    <div class="mid">
        <div class="info">
            <h2>Contact Us</h2>
            <p>
                Address: Test
                Email: Test
                Phone: Test
                Website: Test
            </p>
        </div>
    </div>

    <div class="bot">
        <div class="table">
            <table>
                <tr class="tabletitle">
                    <td class="item"><h2>Item</h2></td>
                    <td class="Hours"><h2>Qty</h2></td>
                    <td class="Rate"><h2>Price</h2></td>
                    <td class="item"><h2>Discount</h2></td>
                    <td class="item"><h2>Sub Total</h2></td>
                </tr>
                @foreach (App\Models\OrderDetail::latestDetails() as $receipt)
                    <tr class="service">
                        <td class="tableitem"><p class="itemtext">{{ $receipt->productKey->name }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ $receipt->quantity }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ number_format($receipt->productKey->price, 2) }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ $receipt->discount ? '':'0' }}</p></td>
                        <td class="tableitem"><p class="itemtext">{{ number_format($receipt->amount, 2) }}</p></td>
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
                        <h2>KES {{ number_format($receipt->sum('amount'), 2) }}</h2>
                    </td>
                </tr>
            </table>

            <div class="legalcopy">
                <p class="legal"><strong> ** Karibu **</strong>
                <br>
                Local Taxes Implied
                </p>
            </div>
            <div class="serial-number">
                Serial: <span class="serial">12099476817982</span>
                <br>
                <span>24/09/2021</span>
            </div>
        </div>
    </div>
  </div>

  <style>
      #invoice-POS{
          box-shadow: 0 0 1in rgb(0,0,0.5);
          padding:2mm;
          margin: 0 auto;
          width: 68mm;
          background: #fff
      }
      #invoice-POS ::selection{
          background: #f315f3;
          color: #fff;
      }

      #invoice-POS ::-moz-selection{
        background: #f315f3;
          color: #fff;
      }

      #invoice-POS h1{
          font-size:1.5em;
          color:#222;
      }
      #invoice-POS h2{
          font-size:0.5em;
      }
      #invoice-POS h3{
          font-size:1.2em;
          font-weight:300;
          line-height: 2em;
      }
      #invoice-POS p{
          font-size:0.7em;
          line-height: 1.2em;
          color: #000;
      }

      #invoice-POS #top, #invoice-POS #mid, #invoice-POS #bot{
          border-bottom: 1px solid #eee;
      }

      #invoice-POS #top{
          min-height:100px
      }
      #invoice-POS #mid{
          min-height:80px
      }
      #invoice-POS #bot{
          min-height:50px
      }

      #invoice-POS img{
          max-width: 180px;
      }

      #invoice-POS #top .logo{
          height:60px;
          width: 60px;
          background-image: url() no-repeat;
          background-size: 60px 60px;
          border-radius: 50px;
      }

      #invoice-POS .info{
          display:block;
          margin-left: 0;
          text-align:center;
      }

      #invoice-POS .title {
          float:right;
      }

      #invoice-POS .title p{
          text-align:right;
      }
      #invoice-POS table{
          width: 100%;
          border-collapse: collapse;
      }

      #invoice-POS .tabletitle{
        font-size:0.5em;
        background:#eee;
      }
      #invoice-POS .service{
        border-bottom: 1px solid #eee;
      }
      #invoice-POS .item{
       width:24mm
      }
      #invoice-POS .itemtext{
       font-size:0.5em;
      }
      #invoice-POS .legalcopy{
        text-align:center;
      }
      .serial-number{
          margin-top: 5mm;
          margin-bottom: 2mm;
          text-align: center;
          font-size:12px;
      }

      .serial{
          font-size: 10px !important;
      }


  </style>

  @livewireScripts

</body>
</html>
