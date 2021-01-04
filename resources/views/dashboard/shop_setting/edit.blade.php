@extends('layouts.app')
@section('title')
    Shop Setting - Edit
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

                            {{ Form::open(['url'=>route('shop-setting.update', $shopSettings->id), 'method'=>'POST']) }}

                                @method('put')

                                {{ Form::selectGroup('payment_method',config('shop.payment_method'), $shopSettings->payment_method,'Payment Method',['class'=>'form-control']) }}
                                {{ Form::textareaGroup('bank_account_holder_name', $shopSettings->bank_account_holder_name,'Bank Account Holder Name',['class'=>'form-control']) }}
                                {{ Form::textGroup('back_account_name', $shopSettings->back_account_name,'Bank Account Name',['class'=>'form-control']) }}
                                {{ Form::textareaGroup('bank_name_and_branch', $shopSettings->bank_name_and_branch,'Bank Name &amp; Branch',['class'=>'form-control']) }}
                                {{ Form::selectGroup('business_type',config('shop.business_type'), $shopSettings->business_type,'Business Type',['class'=>'form-control']) }}
                                {{ Form::selectGroup('experience',config('shop.experience'), $shopSettings->experience,'Experience',['class'=>'form-control']) }}
                                {{ Form::selectGroup('age_of_business',config('shop.age_of_business'), $shopSettings->age_of_business,'Age Of Business',['class'=>'form-control']) }}
                                {{ Form::textGroup('fb_page_link', $shopSettings->fb_page_link,'fb Page Link',['class'=>'form-control']) }}
                                {{ Form::textGroup('bkash_mobile_number', $shopSettings->bkash_mobile_number,'bKash Mobile Number',['class'=>'form-control']) }}

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



