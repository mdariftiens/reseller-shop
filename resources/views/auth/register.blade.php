@extends('layouts.frontend')
@section('title')
    {{ config('shop.shop_name') }}
@endsection

@section('content')
    <div class="row">
        <div class="mx-6 col-md-4  " style="margin: 0 auto;">

            <div class="card">
                <div class="card-header">
                    <div class="card-title">Register</div>
                </div>
                <div class="card-body">
                    {{ Form::open(['url'=>route('register.store'), 'method'=>'POST']) }}

                    @csrf

                    {{ Form::hidden('provider') }}
                    {{ Form::hidden('provider_id') }}

                    {{ Form::textGroup('name', null,'Name',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::textGroup('mobile', null,'Mobile',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::textGroup('email', null,'Email',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::textGroup('shop_name', null,'Shop Name',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::selectGroup('payment_method',config('shop.payment_method'), null,'Payment Method',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::textGroup('bank_account_holder_name',  null,'Bank Account Holder Name',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::textGroup('back_account_name',  null,'Bank Account Name',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::textareaGroup('bank_name_and_branch',  null,'Bank Name &amp; Branch',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::selectGroup('business_type',config('shop.business_type'),  null,'Business Type',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::selectGroup('experience',config('shop.experience'),  null,'Experience',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::selectGroup('age_of_business',config('shop.age_of_business'),  null,'Age Of Business',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::textGroup('fb_page_link',  null,'fb Page Link',['class'=>'form-control'],null,'col-md-12') }}
                    {{ Form::textGroup('bkash_mobile_number',  null,'bKash Mobile Number',['class'=>'form-control'],null,'col-md-12') }}

                    {{ Form::submit('Create Account',['class'=>'btn btn-success']) }}

                    {{ Form::close() }}
                </div>
            </div>


            <br>
            <br>
            <br>
            <br>


        </div>

    </div>

@endsection
