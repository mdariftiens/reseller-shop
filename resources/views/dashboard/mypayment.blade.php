@extends('layouts.app')
@section('title')
    My Payment Detail
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">My Payment Detail </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <div class="col-md-6">
                        <table class="table table-bordered">
                            <tr>
                                <th>Selling Price Total</th>
                                <td>{{ $order->sum('selling_price_total') }} TK</td>
                            </tr>
                            <tr>
                                <th>Profit Total</th>
                                <td>{{ $order->sum('profit_total') }} TK</td>
                            </tr>
                            <tr>
                                <th>No. Of Product Sales</th>
                                <td>{{ $order->sum('no_of_product') }}</td>
                            </tr>
                        </table>
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
    @include('partials.js.select2')
@endpush
