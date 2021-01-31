@extends('layouts.app')
@section('title')
    Products
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Shops</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    @include('flash::message')

                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Shop Name</th>
                            <th>Shop Detail</th>
                            <th>Payment Method</th>
                            <th>Bank Detail</th>
                            <th>Owner Info</th>
                            <th>Links</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>

                            @forelse($list as $item)
                                <tr>
                                    <td> {{ $item->id }}</td>
                                    <td> {{ $item->shop_name }}
                                    </td>
                                    <td>
                                        Type:{{ $item->business_type }} <br>
                                        Experience:{{ $item->experience }} <br>
                                        Age Of Business:{{ $item->age_of_business }} <br>
                                    </td>
                                    <td>
                                        {{ $item->payment_method }}
                                        {{ $item->payment_method=="bKash"?$item->bkash_mobile_number:'' }}

                                    </td>
                                    <td>
                                        {{ $item->bank_account_holder_name }} <br>
                                        {{ $item->back_account_name }}<br>
                                        {{ $item->bank_name_and_branch }}<br>
                                    </td>
                                    <td>
                                        {{ $item->customer->name }} <br>
                                        {{ $item->customer->mobile }}<br>
                                    </td>
                                    <td>
                                        <a href="{{ strpos($item->fb_page_link,'http')!==false? $item->fb_page_link: 'http://'.$item->fb_page_link }}" target="_blank">FB</a>
                                        <a href="{{ strpos($item->website_url,'http')!==false? $item->website_url: 'http://'.$item->website_url }}" target="_blank">Website</a>
                                    </td>
                                    <td>
                                        <a  class="btn btn-warning" href="{{ route('bonus.edit',[$item->id]) }}">Add Bonus</a>
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
    @include('partials.js.tooltip')
@endpush
