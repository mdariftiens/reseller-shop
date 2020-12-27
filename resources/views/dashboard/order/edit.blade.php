@extends('layouts.app')
@section('title')
    Order- {{ $order->id }}
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Edit Order - {{ $order->id }} </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <div class="col-3">

                        Select Category
                        {{ Form::select('category',array_merge([''=>'Select Category'],$categories) ,null,['class'=>'form-control']) }}

                        <ul class="list-group">
                            @foreach($products as $product)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4 item-image">
                                            <img class="list-img" src="" alt="">
                                        </div>

                                        <div class="col-md-4 item-data" >
                                            Name : {{ $product->name }} <br>
                                            Code : {{ $product->code }} <br>
                                            Offer Price: {{ original_price}} <br>
                                            Regular Price: {{ selling_price }} <br>
                                        </div>

                                        <div class="col-md-4">
                                            <button type="button" name="button" class="btn btn-success btn-sm" @click='addToList(p.id,p.name,p.code,p.offer_price,p.regular_price)'> + Add</button>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        </ul>
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
    @include('partials.dashboard.js.select2')
@endpush
