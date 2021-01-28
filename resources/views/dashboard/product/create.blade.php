@extends('layouts.app')
@section('title')
    Add New Product
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Product </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    {{ Form::open( ['url'=>route('product.store'),'method'=>'POST','enctype'=>"multipart/form-data"]) }}

                    {{ Form::textGroup('name',null,'Name',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ) }}
                    {{ Form::textGroup('code',null,'Code',['class'=>'form-control','placeholder'=>'Enter Product Code.'] ) }}
                    {{ Form::textareaGroup('description',null,'Description.',['required'=>'','class'=>'form-control','placeholder'=>'Description of Collection'] ) }}
                    {{ Form::numberGroup('regular_price',0.00,'Regular Price',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ) }}
                    {{ Form::numberGroup('offer_price',0.00,'Offer Price',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ) }}
                    {{ Form::numberGroup('delivery_within_days',3,'Delivery Within Days',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ) }}

                    {{ Form::selectGroup('collection',$collections,[],"Select Collection",['class'=>'form-control select2','required'=>'required']) }}
                    {{ Form::selectGroup('category[]',$categories,[],"Select Category", ['class'=>'form-control select2','multiple'=>'multiple','required'=>'required']) }}
                    {{ Form::checkboxGroup('enabled',null ,'Enabled',['required'=>'','class'=>'form-control'] ) }}
                    {{ Form::fileGroup("fb-image","Fb Image",['required'=>'',]) }}
                    {{ Form::fileGroup("image","Image",['required'=>'',]) }}

                    {{ Form::submit("Save",['class'=>'btn btn-sm btn-success']) }}
                    {{ Form::close() }}

                    @include('partials.validation_error')

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
