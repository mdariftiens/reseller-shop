@extends('layouts.app')
@section('title')
    Collections - Add New
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-7 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Add New Collection </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">


                    {{ Form::open( ['url'=>route('collection.store'),'method'=>'POST']) }}

                    {{ Form::textGroup('name',null,'Name',['class'=>'form-control','placeholder'=>'Enter your Name.'] ) }}
                    {{ Form::textareaGroup('description',null ,'Description.',['required'=>'','class'=>'form-control','placeholder'=>'Description of Collection'] ) }}
                    {{ Form::checkboxGroup('enabled','0' ,'Enabled',['required'=>'','class'=>'form-control'] ) }}

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
