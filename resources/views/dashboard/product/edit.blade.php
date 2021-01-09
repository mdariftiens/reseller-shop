@extends('layouts.app')
@section('title')
    Product - {{ $product->name }}
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product - {{ $product->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">



                    {{ Form::open( ['url'=>route('product.update',[$product->id]),'method'=>'PUT']) }}

                    {{ Form::textGroup('name',$product->name,'Name',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ) }}
                    {{ Form::textareaGroup('description',$product->description,'Description.',['required'=>'','class'=>'form-control','placeholder'=>'Description of Collection'] ) }}
                    {{ Form::numberGroup('regular_price',$product->regular_price,'Regular Price',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ) }}
                    {{ Form::numberGroup('offer_price',$product->offer_price,'Offer Price',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ) }}
                    {{ Form::numberGroup('delivery_within_days',$product->delivery_within_days,'Delivery Within Days',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ) }}

                    {{ Form::selectGroup('collection',$collections,$product->collection->id,"Select Collection",'',['class'=>'form-control select2','required'=>'required']) }}
                    {{ Form::selectGroup('category[]',$categories,$product->categories->pluck('id')->toArray()??null,"Select Category",'',['class'=>'form-control select2','multiple'=>'multiple','required'=>'required']) }}
                    {{ Form::checkboxGroup('enabled',$product->enabled ,'Enabled',['required'=>'','class'=>'form-control'] ) }}


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
