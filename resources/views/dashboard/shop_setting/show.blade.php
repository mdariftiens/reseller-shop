@extends('layouts.app')
@section('title')
    Shop Setting
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">

        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">

                <div class="card-body">
                    <div class="row">
                        <div class="col-8">

                            <h3> Shop Setting</h3>

                            <table class="table table-light">
                                    <tr>
                                        <th>Shop Name</th>
                                        <td>{{ $shopSettings->shop_name }}</td>
                                    </tr><tr>
                                        <th>Payment Method</th>
                                        <td>{{ $shopSettings->payment_method }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Account Holder Name</th>
                                        <td>{{ $shopSettings->bank_account_holder_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Account Name</th>
                                        <td>{{ $shopSettings->back_account_name }}</td>
                                    </tr>
                                    <tr>
                                        <th>Bank Name &amp; Branch</th>
                                        <td>{{ $shopSettings->bank_name_and_branch }}</td>
                                    </tr>
                                    <tr>
                                        <th>Business Type</th>
                                        <td>{{ $shopSettings->business_type }}</td>
                                    </tr>
                                    <tr>
                                        <th>Experience</th>
                                        <td>{{ $shopSettings->experience }}</td>
                                    </tr>
                                    <tr>
                                        <th>Age Of Business</th>
                                        <td>{{ $shopSettings->age_of_business }}</td>
                                    </tr>
                                    <tr>
                                        <th>fb Page Link</th>
                                        <td>{{ $shopSettings->fb_page_link }}</td>
                                    </tr>
                                    <tr>
                                        <th>bKash Mobile Number</th>
                                        <td>{{ $shopSettings->bkash_mobile_number }}</td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <a href="{{ route('shop-setting.edit', $shopSettings->user_id) }}" class="btn btn-warning">Edit</a>
                                        </td>
                                    </tr>

                            </table>

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



