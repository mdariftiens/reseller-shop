@extends('layouts.app')
@section('title')
    Collections
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Bordered Table</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>No Of Products</th>
                            <th>Min Offer Price</th>
                            <th>Edit</th>
                        </tr>
                        </thead>
                        <tbody>
                            @forelse($list as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td data-toggle="tooltip" title="{{ $item->description }}">{{ $item->name }}</td>
                                    <td>{{ $item->no_of_products }}</td>
                                    <td>{{ $item->min_offer_price }}</td>
                                    <td>
                                        {{ Form::open(['url'=> route('category.destroy',$item->id), 'style' => 'display: initial','method'=>'POST']) }}
                                            @method('DELETE')
                                            {!! csrf_field() !!}
                                            <button type="submit" class="btn btn-danger"/>Delete</button>
                                        {{ Form::close() }}
                                        <a  class="btn btn-warning" href="{{ route('category.edit',[$item->id]) }}">Edit</a>
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
    @include('partials.dashboard.js.tooltip')
@endpush
