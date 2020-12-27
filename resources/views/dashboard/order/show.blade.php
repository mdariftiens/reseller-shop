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
                <div class="card-header">
                    <h3 class="card-title">Order Detail</h3>
                </div>
                <!-- /.card-header -->


                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Order Status </th>
                            <th>Order Detail </th>
                            <th>Shipping Address</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>
                                    {{ $order->status }}  <br>
                                    <span><strong>Delivery Man:</strong></span> <br>
                                    {{ $order->deliveryMan->name }} <br>
                                    {{ $order->deliveryMan->mobile }} <br>
                                    <span><strong>Created By:</strong></span> <br>
                                    {{ $order->createdBy->name }} <br>
                                    {{ $order->createdBy->mobile }} <br>
                                    <span><strong>Order Summary:</strong></span> <br>
                                    Original Price Total : {{ $order->original_price_total }} <br>
                                    Selling Price Total : {{ $order->selling_price_total }} <br>
                                    Profit Total : {{ $order->profit_total }} <br>
                                    No Of Product : {{ $order->no_of_product }} <br>
                                    <span><strong>created &amp; updated:</strong></span> <br>
                                    created @ {{ $order->created_at }} <br>
                                    @if($order->created_at != $order->updated_at )
                                        updated @ {{ $order->updated_at }} <br>
                                    @endif

                                </td>
                                <td>
                                    <table class="table table-bordered">
                                        <tr>
                                            <td> ID </td>
                                            <td> Name </td>
                                            <td> Qty </td>
                                            <td> Org.Price </td>
                                            <td> Selling.Price </td>
                                            <td> Selling.Price </td>
                                        </tr>
                                    @foreach($order->orderDetail as $product)
                                        <tr>
                                            <td> {{ $product->product->id }} </td>
                                            <td> {{ $product->product->name }} </td>
                                            <td> {{ $product->quantity }} </td>
                                            <td> {{ $product->original_price }} </td>
                                            <td> {{ $product->selling_price }} </td>
                                            <td> {{ $product->profit }} </td>
                                        </tr>
                                    @endforeach
                                    </table>
                                </td>
                                <td>
                                    {{ $order->orderShipping->name }} <br>
                                    {{ $order->orderShipping->address }} <br>
                                    {{ $order->orderShipping->optional_address }} <br>
                                    {{ $order->orderShipping->mobile_number }} <br>
                                </td>

                                <td>
                                    {{ Form::open(['url'=> route('order.destroy',$order->id), 'style' => 'display: initial','method'=>'POST']) }}
                                    @method('DELETE')
                                    {!! csrf_field() !!}
                                    <button type="submit" class="btn btn-danger"/> <i class="fa fa-trash"></i></button>
                                    {{ Form::close() }}
                                    <a  class="btn btn-warning" href="{{ route('order.edit',[$order->id]) }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        </tbody>
                    </table>
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
    @include('partials.dashboard.js.tooltip')
@endpush
