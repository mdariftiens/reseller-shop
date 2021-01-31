@extends('layouts.app')
@section('title')
    Add Bonus
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">

        <section class="col-lg-8 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add Bonus</h3>
                </div>

                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            {{ Form::open( ['url'=>route('bonus.store'),'method'=>'POST']) }}
                            {{ Form::hidden("shopsetting_id", $shop->id) }}
                            {{ Form::selectGroup('bonus_type_id',$bonusType, [], "Bonus Type",['class'=>'form-control','required'=>'required',],'','col-md-12') }}
                            {{ Form::textareaGroup('description','','Description',['class'=>'form-control','placeholder'=>'Enter Product Name.'],null,'col-md-12' ) }}
                            {{ Form::numberGroup('amount','0','Amount',['class'=>'form-control','placeholder'=>'Amount'] ,null,'col-md-12' ) }}

                            {{ Form::submit("Save",['class'=>'btn btn-sm btn-success']) }}
                            {{ Form::close() }}

                            @include('partials.validation_error')
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

@push('footer_end_script')
    @include('partials.js.select2')
@endpush
