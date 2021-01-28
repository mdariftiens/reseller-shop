@extends('layouts.app')
@section('title')
    Product - {{ $product->name }}
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-8 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Product - {{ $product->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            {{ Form::open( ['url'=>route('product.update',[$product->id]),'method'=>'PUT','enctype'=>"multipart/form-data"]) }}
                            {{ Form::hidden("product_id",$product->id) }}
                            {{ Form::textGroup('name',$product->name,'Name',['class'=>'form-control','placeholder'=>'Enter Product Name.'],null,'col-md-12' ) }}
                            {{ Form::textGroup('code',$product->code,'Code',['class'=>'form-control','placeholder'=>'Enter Product Code.'],null,'col-md-12' ) }}
                            {{ Form::textareaGroup('description',$product->description,'Description.',['required'=>'','class'=>'form-control','placeholder'=>'Description of Collection'] ,null,'col-md-12' ) }}
                            {{ Form::numberGroup('regular_price',$product->regular_price,'Regular Price',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ,null,'col-md-12' ) }}
                            {{ Form::numberGroup('offer_price',$product->offer_price,'Offer Price',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ,null,'col-md-12' ) }}
                            {{ Form::numberGroup('delivery_within_days',$product->delivery_within_days,'Delivery Within Days',['class'=>'form-control','placeholder'=>'Enter Product Name.'] ,null,'col-md-12' ) }}

                            {{ Form::selectGroup('collection',$collections,$product->collection->id,"Select Collection",['class'=>'form-control select2','required'=>'required'],null,'col-md-12' ) }}
                            {{ Form::selectGroup('category[]',$categories,$product->categories->pluck('id')->toArray()??null,"Select Category", ['class'=>'form-control select2','multiple'=>'multiple','required'=>'required'],null,'col-md-12' ) }}
                            {{ Form::checkboxGroup('enabled',$product->enabled ,'Enabled',['required'=>'','class'=>'form-control'] ,null,'col-md-12' ) }}
                            {{ Form::fileGroup("fb-image","Fb Image") }}
                            {{ Form::fileGroup("image","Image") }}

                            {{ Form::submit("Save",['class'=>'btn btn-sm btn-success']) }}
                            {{ Form::close() }}

                            @include('partials.validation_error')
                        </div>

                        <div class="col-md-6">
                            Facebook Image
                            <img src="{{ $productFbImageUrl }}" class="img-fluid" alt="">
                            <br>
                            General Image
                            <img src="{{ $productImageUrl }}" class="img-fluid" alt="">

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
