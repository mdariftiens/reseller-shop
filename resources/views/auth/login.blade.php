@extends('layouts.frontend')


@section('title')
    Singin
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    @include('flash::message')
                    <form method="POST" action="{{ route('login-verify') }}">

                        @csrf

                        {{ Form::textGroup('mobile_number',null,'Mobile Number',['class'=>'form-control ']) }}
                        {{ Form::textGroup('code',null,'Code',['class'=>'form-control ']) }}
                        {{ Form::submit('Send OTP',['class'=>'btn btn-default']) }}
                        {{ Form::submit('Login',['class'=>'btn btn-info']) }}
                        <a class="btn btn-success" href="#" >Login With FB</a>


                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<br>
<br>
<br>
<br>
@endsection
