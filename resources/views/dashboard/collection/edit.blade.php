@extends('layouts.app')
@section('title')
    Collections - {{ $collection->name }}
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Collection - {{ $collection->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="row">
                        <div class="col-md-6">

                            {{ Form::open( ['url'=>route('collection.update',[$collection->id]),'method'=>'PUT','enctype'=>"multipart/form-data"]) }}

                            {{ Form::textGroup('name',$collection->name,'Name',['class'=>'form-control','placeholder'=>'Enter your Name.'], null,'col-md-12' ) }}
                            {{ Form::textareaGroup('description',$collection->description,'Description.',['required'=>'','class'=>'form-control','placeholder'=>'Description of Collection'], null,'col-md-12' ) }}
                            {{ Form::checkboxGroup('enabled',$collection->enabled ,'Enabled',['required'=>'','class'=>'form-control'] , null,'col-md-12' ) }}
                            {{ Form::fileGroup("image","Image") }}
                            {{ Form::submit("Save",['class'=>'btn btn-sm btn-success']) }}
                            {{ Form::close() }}
                        </div>
                        <div class="col-md-6">
                            Image
                            {{ $collectionURL }}
                            <img src="{{ $collectionURL }}" alt="">
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

