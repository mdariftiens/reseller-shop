@extends('layouts.app')
@section('title')
    Orders
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Orders</h3>
                </div>
                <!-- /.card-header -->

                {{ Form::open(['url'=> route('order.index'), 'method'=>'get']) }}

                <div class="card-body">
                        <div class="row">

                        <div class="col-md-3">
                            {{ Form::selectGroup('status', [''=>'Default'] + config('shop.order_status') , request('status'), 'Status', ['class'=>'form-control status'],null, 'col-lg-12') }}
                        </div>

                        @if( auth()->user()->isAdmin() || auth()->user()->isManager() )
                            <div class="col-md-3">
                                {{ Form::selectGroup('deliveryMan', [''=>'Default']+$deliveryMans ,request('deliveryMan'), 'Delivery Man', ['class'=>'form-control deliveryman'],null, 'col-lg-12') }}
                            </div>
                        @endif

                        <div class="col-md-3">
                            {{ Form::textGroup('key', request('key'), 'Invoice / Order Shipping Name', ['class'=>'form-control','placeholder'=>'Invoice '],null, 'col-lg-12') }}
                        </div>
                        <div class="col-md-3">
                            <br>
                            {{ Form::submit('Search',['class'=>'btn btn-info btn-change-status']) }}
                            <a href="{{ route('order.index') }}" class="btn btn-success"> Reset Search </a>
                        </div>
                    </div>
                </div>
                {{ Form::close() }}

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Order Status </th>
                            <th>Order Summary </th>
                            <th>Shipping Address</th>
                            <th>created &amp; updated</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($list as $item)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td>
                                        {{ $item->status }}  <br>
                                        <span><strong>Delivery Man:</strong></span> <br>
                                        {{ $item->deliveryMan->name ?? "Not Assigned" }} <br>
                                        {{ $item->deliveryMan->mobile ?? "Not Assigned"}} <br>
                                        <span><strong>Created By:</strong></span> <br>
                                        {{ $item->createdBy->name }} <br>
                                        {{ $item->createdBy->mobile }} <br>
                                    </td>
                                    <td>
                                        Invoice Number : {{ $item->invoice_number }} <br>
                                        Original Price Total : {{ $item->offer_price_total }} <br>
                                        Selling Price Total : {{ $item->selling_price_total }} <br>
                                        Profit Total : {{ $item->profit_total }} <br>
                                        No Of Product : {{ $item->no_of_product }} <br>
                                    </td>
                                    <td>
                                        {{ $item->orderShipping->name }} <br>
                                        {{ $item->orderShipping->address }} <br>
                                        {{ $item->orderShipping->optional_address }} <br>
                                        {{ $item->orderShipping->mobile_number }} <br>
                                    </td>
                                    <td>
                                        {{ $item->created_at }} <br>
                                        @if($item->created_at != $item->updated_at )
                                        {{ $item->updated_at }} <br>
                                        @endif
                                    </td>

                                    <td>
                                        @can('delete', $item)
                                        {{ Form::open(['url'=> route('order.destroy',$item->id), 'style' => 'display: initial','method'=>'POST']) }}
                                            @method('DELETE')
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger"/>Delete</button>
                                        {{ Form::close() }}
                                        @endcan
                                        @can('update', $item)
                                        <a  class="btn btn-warning" href="{{ route('order.edit',[$item->id]) }}">Edit</a>
                                        @endcan
                                        <a  class="btn btn-warning" href="{{ route('order.show',[$item->id]) }}">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center"> <span class="text-danger">No Item Found!</span> </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $list->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
@endsection

@push('footer_end_script')
    @include('partials.js.tooltip')
@endpush
