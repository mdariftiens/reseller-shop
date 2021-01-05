@extends('layouts.app')
@section('title')
    Shop Setting - Create
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">

        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">

                <div class="card-header">
                    <div class="card-title">
                        Shop Setting
                    </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">

                            {{ Form::open(['url'=>route('shop-setting.store'), 'method'=>'POST']) }}

                            {{ Form::textGroup('shop_name', null,'Shop Name',['class'=>'form-control']) }}
                            {{ Form::selectGroup('payment_method',config('shop.payment_method'), null,'Payment Method',['class'=>'form-control']) }}
                            {{ Form::textareaGroup('bank_account_holder_name',  null,'Bank Account Holder Name',['class'=>'form-control']) }}
                            {{ Form::textGroup('back_account_name',  null,'Bank Account Name',['class'=>'form-control']) }}
                            {{ Form::textareaGroup('bank_name_and_branch',  null,'Bank Name &amp; Branch',['class'=>'form-control']) }}
                            {{ Form::selectGroup('business_type',config('shop.business_type'),  null,'Business Type',['class'=>'form-control']) }}
                            {{ Form::selectGroup('experience',config('shop.experience'),  null,'Experience',['class'=>'form-control']) }}
                            {{ Form::selectGroup('age_of_business',config('shop.age_of_business'),  null,'Age Of Business',['class'=>'form-control']) }}
                            {{ Form::textGroup('fb_page_link',  null,'fb Page Link',['class'=>'form-control']) }}
                            {{ Form::textGroup('bkash_mobile_number',  null,'bKash Mobile Number',['class'=>'form-control']) }}

                            {{ Form::submit('Save',['class'=>'btn btn-success']) }}

                            {{ Form::close() }}


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



