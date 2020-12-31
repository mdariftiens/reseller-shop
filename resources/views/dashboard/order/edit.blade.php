@extends('layouts.app')
@section('title')
    Order- {{ $order->id }}
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Order - {{ $order->id }} </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="row">

                        <div class="first-step" style="display: block; width: 100%;">
                            <div class="row">
                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Select Category
                                        </div>
                                        <div class="card-body">

                                            {{ Form::select('category',array_merge(['*'=>'All'],$categories) ,null,['class'=>'form-control select2']) }}
                                            <br>
                                            <br>
                                            <ul class="list-group product-list-group" style="height: 600px; overflow-y: scroll">
                                                @foreach($products as $product)
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-md-4 item-image">
                                                                <img class="image img-fluid" src="https://dummyimage.com/600x400/000/fff" alt="">
                                                            </div>

                                                            <div class="col-md-8 item-data" >

                                                                Name : {{ $product->name }} <br>
                                                                Code : {{ $product->code }} <br>
                                                                Regular Price: {{ $product->regular_price }} <br>
                                                                Offer Price: {{ $product->offer_price}} <br>

                                                                <button type="button" name="button" class="btn btn-success btn-sm btn-add" title="Add To Order"
                                                                        data-id = "{{ $product->id }}"
                                                                        data-name = "{{ $product->name }}"
                                                                        data-code = "{{ $product->code }}"
                                                                        data-image = "{{ 'https://dummyimage.com/600x400/000/fff' }}"
                                                                        data-regular_price = "{{ $product->regular_price }}"
                                                                        data-offer_price = "{{ $product->offer_price }}"
                                                                > <i class="fa fa-plus"></i> Add</button>

                                                            </div>

                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>

                                </div>

                                <div class="col-6">
                                    <div class="card">
                                        <div class="card-header">
                                            Order Detail
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-light table-bordered  order-table table-order-detail" >
                                                <thead class="thead-light">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Name</th>
                                                    <th>Qty</th>
                                                    <th>product price</th>
                                                    <th>selling price</th>
                                                    <th>Total Selling Price</th>
                                                    <th>Action</th>
                                                </tr>
                                                </thead>
                                                <tbody>

                                                @foreach($order->orderDetails  as $productDetail)

                                                    @include('partials.dashboard.order.product_detail',[
                                                            'sl'=>$loop->iteration,
                                                            'id'=>$productDetail->product->id,
                                                            'name'=>$productDetail->product->name,
                                                            'code'=>$productDetail->product->code,
                                                            'regularPrice'=>$productDetail->product->offer_price,
                                                            'offerPrice'=>$productDetail->selling_price,
                                                            'qty' => $productDetail->quantity
                                                            ])

                                                @endforeach

                                                </tbody>

                                            </table>

                                        </div>
                                    </div>
                                </div>

                                <div class="col-3">
                                    <div class="card">
                                        <div class="card-header">
                                            Order Summary
                                        </div>
                                        <div class="card-body">
                                            <div class="form-group focused">

                                                {{ Form::textGroup('total_offer_price',$order->offer_price_total,'Total Offer Price',['class'=>'form-control net_total_offer_price','readonly'],'','col-md-12') }}
                                            </div>
                                            <div class="form-group focused">
                                                {{ Form::textGroup('total_selling_price',$order->selling_price_total,'Total Selling Price',['class'=>'form-control net_total_selling_price','readonly'],'','col-md-12') }}

                                            </div>
                                            <div class="form-group focused">
                                                {{ Form::textGroup('total_profit', $order->profit_total,'Total Profit',['class'=>'form-control net_total_profit','readonly'],'','col-md-12') }}
                                            </div>
                                            <div class="form-group focused">
                                                @php
                                                    $options = [
                                                        ''=>'Select Area',
                                                        '50'=>'In Dhaka',
                                                        '100'=>'Near Dhaka',
                                                        '150'=>'Out Of Dhaka',
                                                        '0'=>'No Delivery Charge',
                                                    ];
                                                @endphp
                                                {{ Form::selectGroup('delivery_in',$options,$order->delivery_charge,'Delivery',['class'=>'form-control delivery_in'],'','col-md-12') }}
                                            </div>

                                            <table class="table table-light table-summery">
                                                <tr>
                                                    <th>Delivery Charge:</th>
                                                    <td>
                                                        <input type="text" class="form-control" readonly="" id="delivery_charge" name="delivery_charge" value="{{$order->delivery_charge}}">TK
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td><input type="text" class="form-control" readonly="" id="final_total" name="final_total" value="{{ $order->selling_price_total + $order->delivery_charge }}">TK</td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2">

                                                        {{ Form::submit('Next Step',['class'=>'btn btn-info btn-next-back']) }}

                                                    </td>
                                            </table>

                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="second-step" style="display: none; width: 100%;">

                            <div class="col-3">
                                <div class="card">
                                    <div class="card-header">
                                        Order Shipping Address
                                    </div>
                                    <div class="card-body">

                                            @php
                                                $shipping = $order->orderShipping;
                                            @endphp

                                            {{ Form::textGroup('name',$shipping->name,'Name',['class'=>'form-control shipping-name',],'','col-md-12') }}

                                            {{ Form::textareaGroup('address',$shipping->address,'Address',['class'=>'form-control shipping-address','placeholder'=>'Address'],'','col-md-12') }}

                                            {{ Form::textareaGroup('optional_address',$shipping->optional_address,'Optional Address',['class'=>'form-control shipping-optional_address','placeholder'=>'Optional Address'],'','col-md-12') }}

                                            {{ Form::textGroup('mobile_number',$shipping->mobile_number,'Mobile Number',['class'=>'form-control shipping-mobile_number','placeholder'=>'010xxxxxxxx'],'','col-md-12') }}

                                            {{ Form::submit('Back',['class'=>'btn btn-info btn-next-back']) }}
                                            {{ Form::submit('Place Order',['class'=>'btn btn-success btn-submit']) }}

                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->

@endsection

@push('footer_end_script')
    @include('partials.dashboard.js.select2')
    @include('partials.dashboard.js.axios')
    @include('partials.dashboard.js.toastr')

    <script>

        $(document).ready(function() {

            let $body = $('body');

            // after loading data only for editing order.
            calculate();

            $body.on('click','.btn-next-back',function (){
                console.log($body.find('.sl').length, "$body.on('click','.btn-next-back',function (){")
                if( $body.find('.sl').length == 0){
                    toastr.error("Must have one product in product list");
                    return;
                }
                $('.first-step').toggle()
                $('.second-step').toggle()
            })


            $body.on('click','.btn-submit',function (){

                let f = {};
                f.name = $('#name').val()
                f.address = $('#address').val()
                f.optional_address = $('#optional_address').val()
                f.mobile_number = $('#mobile_number').val()
                f.delivery_charge = $('#delivery_charge').val()

                f.product_id = [];
                $body.find('.id').each(function (i,e) {
                    f.product_id.push( e.value);
                })

                f.qty = [];
                $body.find('.qty').each(function (i,e) {
                    f.qty.push( e.value);
                })

                f.selling_price = [];
                $body.find('.selling_price').each(function (i,e) {
                    f.selling_price.push( e.value);
                })

                axios.put('{{ route('order.update',$order->id) }}', f)
                    .then(function (response) {
                        // handle success
                        console.log(response);

                        toastr.success( response.data.message)
                        setTimeout(function (){
                            window.location.href = response.data.url;
                        },1000)
                    })
                    .catch(function (error) {
                        // handle error

                        if( error.response.status === 422){

                            let errorMessage = '';

                            let i = 1;
                            $.each(error.response.data.errors, function(index, value){
                                errorMessage += i++ + '. ' + value[0] + "<br>";
                            });

                            toastr.error(errorMessage)

                        }

                    })
                    .then(function () {
                        // always executed
                    });
            })



            $('.select2').on('select2:select', function (e) {
                var id = e.params.data.id;
                console.log(id);
                let item = "";
                axios.get('/api/product/'+id)
                    .then(function (response) {
                        // handle success
                        console.log(response);

                        let resItem = response.data;
                        let item = '';

                        $(resItem).each(function (index,el){
                            console.log(el)
                            item +=
                                    '<li class="list-group-item">\
                                        <div class="row">\
                                            <div class="col-md-4 item-image">\
                                                <img class="image img-fluid" src="https://dummyimage.com/600x400/000/fff" alt="">\
                                            </div>\
                                                    \
                                            <div class="col-md-8 item-data" > \
                                                \
                                                Name : '+ el.name+' <br> \
                                                Code : '+ el.code +'<br> \
                                                Offer Price: '+el.offer_price+' <br> \
                                                Regular Price: '+el.regular_price+' <br> \
                                                \
                                                <button type="button" name="button" class="btn btn-success btn-sm btn-add"\
                                                    data-id = "'+el.id+'"\
                                                    data-name = "'+el.name+'"\
                                                    data-code = "'+el.code+'"\
                                                    data-image = "'+el.image+'"\
                                                    data-regular_price = "'+el.regular_price+'"\
                                                    data-offer_price = "'+el.offer_price+'"\
                                                > <i class="fa fa-plus"></i> Add</button>\
                                            </div>\
                                            \
                                        </div>\
                                        \
                                    </li>'
                        });

                        $('.product-list-group').html( item )
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });


            });

            $body.on('click','.btn-add',function (e) {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let code = $(this).data('code');
                let image = $(this).data('image');
                let regular_price = $(this).data('regular_price');
                let offer_price = $(this).data('offer_price');
                console.log(id,name,code,image,regular_price,offer_price)

                let isAdded = false;

                $body.find('.id').each(function (i,e) {
                   if( $(e).val() == id)
                   {
                       isAdded = true;
                       toastr.error("Product already added!")
                   }
                });

                if ( isAdded ){
                    return;
                }

                let isRealRow = $body.find('.table-order-detail tbody tr').first().find('td').length > 1;

                if ( ! isRealRow){
                    $body.find('.table-order-detail tbody').html('');
                }

                $body.find('.table-order-detail tbody').append(rowHtmlTemplate(id, name, code, regular_price, offer_price));

                generateSl();
                calculate()
            })

            function calculate(){
                let $body = $('body');

                $body.find('.table-order-detail tbody tr').each(function (i,el) {

                    let qty = parseInt($(el).find('.qty').val())

                    let offer_price = parseInt($(el).find('.offer_price').val())
                    let selling_price = parseInt($(el).find('.selling_price').val())

                    let total_selling_price = qty * selling_price;
                    let total_offer_price = qty * offer_price;

                    $(el).find('.total_selling_price').val( total_selling_price );
                    $(el).find('.total_offer_price').val( total_offer_price );
                    $(el).find('.total_profit').val( total_selling_price - total_offer_price );

                    console.log('qty '+qty,'selling_price '+selling_price)
                })


                let net_total_selling_price = 0;

                $body.find('.total_selling_price').each(function (index,el) {

                    net_total_selling_price+= parseFloat(el.value)
                })
                $body.find('.net_total_selling_price').val(net_total_selling_price)


                let net_total_offer_price = 0;

                $body.find('.total_offer_price').each(function (index,el) {

                    net_total_offer_price+= parseFloat(el.value)
                })
                $body.find('.net_total_offer_price').val(net_total_offer_price)


                let net_total_profit = 0;

                $body.find('.total_profit').each(function (index,el) {

                    net_total_profit+= parseFloat(el.value)
                })
                $body.find('.net_total_profit').val(net_total_profit)


                let delivery_charge = isNaN(parseFloat($('.delivery_in').val()))? 0 : parseFloat($('.delivery_in').val());

                $('#delivery_charge').val( delivery_charge )

                let total = net_total_selling_price + delivery_charge;

                $('#final_total').val( total )


            }

            $body.on("keyup",'.qty, .selling_price', function (e) {
                calculate();
            })

            $body.on('click','.delete-product', function (e) {
                if( $('body').find('.sl').length > 1){
                    $(this).parents('tr').remove()
                    generateSl();
                    calculate();
                    return;
                }
                toastr.error("Must have one product in product list");
            })


            function rowHtmlTemplate(id,name, code, regularPrice, offerPrice,) {
                rowCount = $('body').find('.table-order-detail tbody tr').length + 1;
                console.log(rowCount+'rowCount')
                let row =
                `<tr>
                    <td>
                        <span class="sl">${rowCount}</span>
                        <input type="hidden" class="id" value="${id}">
                    </td>
                    <td>
                        Name : ${name} <br>
                        Code : ${code} <br>
                        Regular Price: ${regularPrice} <br>
                        Offer Price: ${offerPrice} <br>
                    </td>
                    <td>
                        <div class="form-group">
                            <input type="text" class="form-control qty" name="qty[]" value="1">
                        </div>
                    </td>
                    <td>
                        <div class="form-group focused">
                            <input type="text" class="form-control offer_price" readonly="" name="offer_price[]" value="${offerPrice}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group focused">
                            <input type="text" class="form-control selling_price" name="selling_price[]" value="${offerPrice}">
                        </div>
                    </td>
                    <td>
                        <div class="form-group focused">
                            <input type="text" class="form-control total_selling_price" readonly="" name="total_selling_price[]" value="${offerPrice}">
                            <input type="text" class="form-control total_offer_price" readonly="" name="total_selling_price[]" value="${offerPrice}">
                            <input type="text" class="form-control total_profit" readonly="" name="total_selling_price[]" value="${ regularPrice - offerPrice}">
                        </div>
                    </td>
                    <td>
                        <button class="btn btn-sm delete-product"><i title="Delete" class="text-danger fa fa-trash"></i></button>
                    </td>
                </tr>`;

                return row;
            }

            function generateSl(){

                if( $body.find('.sl').length == 0){
                    $body.find('.table-order-detail tbody').html(noRowHtml());
                }else{
                    $body.find('.sl').each(function (index,el) {
                        $(el).text(index+1) ;
                    })
                }

            }

            let noRowHtmlVar;
            noRowHtmlVar = '<td class="text-center text-danger" colspan="7">\
                                No product added !\
                                </td>';


            function noRowHtml(){
                return noRowHtmlVar;
            }

            $body.on('change','.delivery_in',function (el) {
                calculate()
            })
        });


    </script>


@endpush

@push('head_end_style')
    <style>
        .table-order-detail input{
            width: 65px;
        }
        .delivery_in {
            width: 200px;
            float: right;
        }
        .table-summery input[type=text]{
            width: 80px;
            float: left;
            margin-right: 10px;
        }
    </style>
@endpush
