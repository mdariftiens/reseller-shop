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
                                        {{ $item->deliveryMan->name }} <br>
                                        {{ $item->deliveryMan->mobile }} <br>
                                        <span><strong>Created By:</strong></span> <br>
                                        {{ $item->createdBy->name }} <br>
                                        {{ $item->createdBy->mobile }} <br>
                                    </td>
                                    <td>
                                        Original Price Total : {{ $item->original_price_total }} <br>
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
                                        {{ Form::open(['url'=> route('order.destroy',$item->id), 'style' => 'display: initial','method'=>'POST']) }}
                                            @method('DELETE')
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger"/>Delete</button>
                                        {{ Form::close() }}
                                        <a  class="btn btn-warning" href="{{ route('order.edit',[$item->id]) }}">Edit</a>
                                        <a  class="btn btn-warning" href="{{ route('order.show',[$item->id]) }}">Detail</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center"> <span class="text-danger">No Item Found!</span> </td>
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
    @include('partials.dashboard.js.tooltip')
@endpush
