@extends('layouts.app')
@section('title')
    Order Detail
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">

        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-3">

                            <h3> Order Summary</h3>
                            <table class="table table-bordered">
                                <tbody>
                                    <tr>
                                        <th>Status</th>
                                        <td>
                                            {{ Form::selectGroup('status', config('shop.order_status'), $order->status, '', ['class'=>'form-control status'],null, 'col-lg-12') }}
                                            {{ Form::hidden('hidden_status', $order->status,['class'=>'hidden_status']) }}
                                            {{ Form::submit('Change Status',['class'=>'btn btn-info btn-change-status']) }}
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Delivery Man:</th>
                                        <td>
                                            {{ $order->deliveryMan->name }} <br>
                                            {{ $order->deliveryMan->mobile }} <br>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Created By:</th>
                                        <td>
                                            {{ $order->createdBy->name }} <br>
                                            {{ $order->createdBy->mobile }}
                                        </td>
                                    </tr>
                                <tr>
                                    <th colspan="2">Order Summary</th>
                                </tr>
                                <tr>
                                    <td colspan="2">
                                        Original Price Total : {{ $order->offer_price_total }} TK <br>
                                        Selling Price Total : {{ $order->selling_price_total }} TK <br>
                                        Profit Total : {{ $order->profit_total }} TK <br>
                                        No Of Product : {{ $order->no_of_product }} TK <br>
                                        Delivery Charge : {{ $order->delivery_charge }} TK <br>
                                        <span><strong>created &amp; updated:</strong></span> <br>
                                        created @ {{ $order->created_at }} <br>
                                        @if($order->created_at != $order->updated_at )
                                            updated @ {{ $order->updated_at }} <br>
                                        @endif
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <div class="col-6">
                                    <h3> Products</h3>
                                    <table class="table table-bordered">
                                        <thead>
                                        <tr>
                                            <td> # </td>
                                            <td> Name </td>
                                            <td> Qty </td>
                                            <td> Offer Price </td>
                                            <td> Selling.Price </td>
                                        </tr>
                                        </thead>

                                        <tbody>

                                        @foreach($order->orderDetails  as $productDetail)

                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $productDetail->product->name }} - {{$productDetail->product->code}}</td>
                                                <td>{{  $productDetail->quantity }}</td>
                                                <td>{{  $productDetail->product->offer_price }}</td>
                                                <td>{{  $productDetail->selling_price }}</td>
                                            </tr>

                                        @endforeach
                                        <tr>
                                            <td colspan="4"> Selling Price Total  </td> <td> {{ $order->selling_price_total }} TK </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> Delivery Charge  </td> <td> {{ $order->delivery_charge }} TK  </td>
                                        </tr>
                                        <tr>
                                            <td colspan="4"> Net Amount  </td> <td> {{ $order->selling_price_total + $order->delivery_charge }} TK </td>
                                        </tr>
                                        </tbody>

                                    </table>
                                    <table class="table table-bordered">
                                        <tbody>
                                        <tr> <td>
                                                <strong>Shipping Address</strong><br>
                                                {{ $order->orderShipping->name }} <br>
                                                {{ $order->orderShipping->address }} <br>
                                                {{ $order->orderShipping->optional_address }} <br>
                                                {{ $order->orderShipping->mobile_number }} <br>
                                            </td>
                                        </tr>
                                        </tbody>

                                    </table>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td>
                                                <a  class="btn btn-warning" href="{{ route('order.edit',[$order->id]) }}"><i class="fa fa-edit"></i> Edit</a>
                                                {{ Form::open(['url'=> route('order.destroy',$order->id), 'style' => 'display: initial','method'=>'POST']) }}
                                                @method('DELETE')
                                                {!! csrf_field() !!}
                                                <button type="submit" class="btn btn-danger"/>Delete</button>
                                                {{ Form::close() }}
                                            </td>
                                        </tr>
                                    </table>
                        </div>
                        <div class="col-3">
                            <h3> Notes</h3>

                            <ul class="list-group note-group" >
                                @forelse($order->notes as $note)
                                    <li class="list-group-item ">
                                        <div class="text-gray">{{ $note->note }}</div> <br>- <span class="text-sm text-blue">{{ $note->created_at->diffForHumans() }}</span>
                                    </li>

                                @empty
                                    <span class="text-center text-danger"> No Notes! </span>
                                @endforelse
                            </ul>
                            <br>


                                {{ Form::textareaGroup("note",null,"Note:",['class'=>'form-control'],null,'col-md-12') }}
                                {{ Form::submit('Save Note',['class'=>'btn btn-info btn-note']) }}


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
    @include('partials.js.tooltip')
    @include('partials.js.axios')
    @include('partials.js.toastr')

    <script>

        $(document).ready(function() {

            let $body = $('body');

            $body.on('click','.btn-note',function (){

                let f = {};
                f.note = $('#note').val()

                if(  f.note.trim().length == 0 ){
                    toastr.error("Note is empty!");
                    return;
                }

                axios.post('{{ route('order.note',$order->id) }}', f)
                    .then(function (response) {
                        // handle success
                        console.log(response);

                        $('.note-group').append(`<li class="list-group-item ">
                            <div class="text-gray">${f.note }</div> <br>- <span class="text-sm text-blue">Now</span>
                        </li>`)
                        toastr.success( response.data.message)
                    })
                    .catch(function (error) {
                        // handle error
                        let errorMessage = '';
                        toastr.error(errorMessage)

                    })
                    .then(function () {
                        // always executed
                    });
            })

            $body.on('click','.btn-change-status',function (){

                let hidden_status  = $('.hidden_status').val();

                let f = {};
                f.status = $('.status').val()

                if ( hidden_status == f.status.trim() ){
                    toastr.error("Status Not Changed");
                    return;
                }
                axios.put('{{ route('order.changeStatus',$order->id) }}', f)
                    .then(function (response) {
                        // handle success
                        console.log(response);

                        toastr.success( response.data.message)
                    })
                    .catch(function (error) {

                        let errorMessage = '';
                        toastr.error(errorMessage)

                    })
                    .then(function () {
                        // always executed
                    });
            })

        });


    </script>


@endpush


