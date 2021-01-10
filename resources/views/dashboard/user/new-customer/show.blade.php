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
                        <div class="col-md-6">

                            <h3> Customer </h3>
                            <table class="table table-light">
                                <tr>
                                    <th>Name</th> <td> {{ $user->name }}</td>
                                </tr>
                                <tr>
                                    <th>Mobile</th> <td> {{ $user->mobile }}</td>
                                </tr>
                                <tr>
                                    <th>Email</th> <td> {{ $user->email??'---' }}</td>
                                </tr>
                            </table>
                            <h3> Shop Setting</h3>

                            <table class="table table-light">
                                <tr>
                                    <th>Shop Name</th>
                                    <td>{{ $user->shopSetting->shop_name }}</td>
                                </tr>
                                <tr>
                                    <th>Payment Method</th>
                                    <td>{{ $user->shopSetting->payment_method }}</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Holder Name</th>
                                    <td>{{ $user->shopSetting->bank_account_holder_name }}</td>
                                </tr>
                                <tr>
                                    <th>Bank Account Name</th>
                                    <td>{{ $user->shopSetting->back_account_name }}</td>
                                </tr>
                                <tr>
                                    <th>Bank Name &amp; Branch</th>
                                    <td>{!! $user->shopSetting->bank_name_and_branch !!}</td>
                                </tr>
                                <tr>
                                    <th>Business Type</th>
                                    <td>{{ $user->shopSetting->business_type }}</td>
                                </tr>
                                <tr>
                                    <th>Experience</th>
                                    <td>{{ $user->shopSetting->experience }}</td>
                                </tr>
                                <tr>
                                    <th>Age Of Business</th>
                                    <td>{{ $user->shopSetting->age_of_business }}</td>
                                </tr>
                                <tr>
                                    <th>fb Page Link</th>
                                    <td>{{ $user->shopSetting->fb_page_link }}</td>
                                </tr>
                                <tr>
                                    <th>bKash Mobile Number</th>
                                    <td>{{ $user->shopSetting->bkash_mobile_number }}</td>
                                </tr>
                                <tr>
                                    <td>
                                        <a class="btn btn-md btn-success" href="{{route('new-customer.verify', $user->id)}}"> Active Customer</a>
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



