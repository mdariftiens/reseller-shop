@extends('layouts.app')
@section('title')
    Category - {{ $category->name }}
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Category - {{ $category->name }}</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    {{ Form::open( ['url'=>route('category.update',[$category->id]),'method'=>'PUT']) }}

                    {{ Form::textGroup('name',$category->name,'Name',['class'=>'form-control','placeholder'=>'Enter your Name.'] ) }}
                    {{ Form::textareaGroup('description',$category->description,'Description.',['required'=>'','class'=>'form-control','placeholder'=>'Description of Collection'] ) }}
                    {{ Form::checkboxGroup('enabled',$category->enabled ,'Enabled',['required'=>'','class'=>'form-control'] ) }}

                    {{ Form::submit("Save",['class'=>'btn btn-sm btn-success']) }}
                    {{ Form::close() }}

                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
@endsection

