@extends('layouts.app')
@section('title')
    Products
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Products</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Regular Price</th>
                            <th>Offer Price</th>
                            <th>Collection</th>
                            <th>Categories</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td data-toggle="tooltip" title="{{ $item->description }}">{{ $item->name }}</td>
                                    <td> {{ $item->regular_price }} </td>
                                    <td> {{ $item->offer_price }} </td>
                                    <td> {{ $item->collection->name }} </td>
                                    <td> {{ implode(" , ", $item->categories->pluck('name')->toArray() ) }} </td>
                                    <td>
                                        {{ Form::open(['url'=> route('product.destroy',$item->id), 'style' => 'display: initial','method'=>'POST']) }}
                                            @method('DELETE')
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger"/>Delete</button>
                                        {{ Form::close() }}
                                        <a  class="btn btn-warning" href="{{ route('product.edit',[$item->id]) }}">Edit</a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center"> <span class="text-danger">No Item Found!</span> </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        {{ $list->links() }}
                    </ul>
                </div>
            </div>
            <!-- /.card -->

        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
@endsection

@push('footer_end_script')
    @include('partials.js.tooltip')
@endpush
