<html crosspilot="">
<head>

    <style>
        body{
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            text-align:center;
            color:#777;
        }

        body h1{
            font-weight:300;
            margin-bottom:0px;
            padding-bottom:0px;
            color:#000;
        }

        body h3{
            font-weight:300;
            margin-top:10px;
            margin-bottom:20px;
            font-style:italic;
            color:#555;
        }

        body a{
            color:#06F;
        }

        .invoice-box{
            max-width:800px;
            margin:auto;
            padding:30px;
            border:1px solid #eee;
            box-shadow:0 0 10px rgba(0, 0, 0, .15);
            font-size:16px;
            line-height:24px;
            font-family:'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;
            color:#555;
        }

        .invoice-box table{
            width:100%;
            line-height:inherit;
            text-align:left;
        }

        .invoice-box table td{
            padding:5px;
            vertical-align:top;
        }


        .invoice-box table tr.top table td{
            padding-bottom:20px;
        }

        .invoice-box table tr.top table td.title{
            font-size:45px;
            line-height:45px;
            color:#333;
        }

        .invoice-box table tr.information table td{
            padding-bottom:40px;
        }

        .heading{
            background:#eee;
            border-bottom:1px solid #ddd;
            font-weight:bold;
        }

        .invoice-box table tr.details td{
            padding-bottom:20px;
        }

        .invoice-box table tr.item td{
            border-bottom:1px solid #eee;
        }

        .invoice-box table tr.item.last td{
            border-bottom:none;
        }

        .invoice-box table tr.total td:nth-child(2){
            border-top:2px solid #eee;
            font-weight:bold;
        }

        @media only screen and (max-width: 600px) {
            .invoice-box table tr.top table td{
                width:100%;
                display:block;
                text-align:center;
            }

            .invoice-box table tr.information table td{
                width:100%;
                display:block;
                text-align:center;
            }
        }
    </style>

<body style="zoom: 1;">
<div class="invoice-box">
    <table width="600px">
        <tbody>
        <tr>
            <td width="50%">
                <img src="{{ $order->createdBy->shopSetting->shop_name }}" alt="{{ $order->createdBy->shopSetting->shop_name }}" style="width:120px;">
            </td>
            <td width="50%" style="text-align: right">

                Created: {{ $order->created_at->format("d/m/y") }}<br>
            </td>
        </tr>
        </tbody>
    </table>

    <table width="600px">
        <tbody>
        <tr>
            <td width="33%">
                {{ $order->createdBy->shopSetting->shop_name }}<br>
                {{ $order->createdBy->shopSetting->fb_page_link }}<br>
                {{ $order->createdBy->shopSetting->website_url }}<br>
            </td>
            <td width="33%"></td>
            <td width="33%" style="text-align: right">
                {{ $order->orderShipping->name }}<br>
                {{ $order->orderShipping->address }}<br>
                {{ $order->orderShipping->optional_address }}<br>
                {{ $order->orderShipping->mobile_number }}<br>

            </td>
        </tr>
        </tbody>
    </table>

    <table>
        <tbody>

        <tr class="heading">
            <td> # </td>
            <td> Name </td>
            <td> Quantity </td>
            <td>Offer Price</td>
            <td>Selling Price</td>
        </tr>
        @foreach($order->orderDetails  as $productDetail)

            <tr class="item">
                <td>{{ $loop->iteration }}</td>
                <td class="text-left">{{ $productDetail->product->name }} <br> Code: {{$productDetail->product->code}}</td>
                <td>{{  $productDetail->quantity }}</td>
                <td>{{  $productDetail->product->offer_price }} TK</td>
                <td>{{  $productDetail->selling_price }} TK</td>
            </tr>

        @endforeach
        </tbody>
    </table>

    <table>

        <tr>
            <td width="25%"></td><td width="25%"></td><td width="25%" style="text-align: right"> Selling Price Total  </td> <td width="25%" style="text-align: right"> {{ $order->selling_price_total }} TK </td>
        </tr>
        <tr>
            <td width="25%"></td><td width="25%"></td><td width="25%" style="text-align: right"> Delivery Charge  </td> <td width="25%" style="text-align: right"> {{ $order->delivery_charge }} TK  </td>
        </tr>
        <tr>
            <td width="25%"></td><td width="25%"></td><td width="25%" style="text-align: right">Net Amount  </td> <td width="25%" style="text-align: right"> {{ $order->selling_price_total + $order->delivery_charge }} TK </td>
        </tr>

    </table>
</div>

</body>
</html>
