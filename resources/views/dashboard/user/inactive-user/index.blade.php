@extends('layouts.app')
@section('title')
    New Customer Request
@endsection

@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">

            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">New Customer </h3>
                </div>

                @include('flash::message')

                <!-- /.card-header -->
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th style="width: 10px">#</th>
                            <th>Name</th>
                            <th>Mobile</th>
                            <th>Email</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($list as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td> {{ $item->name }}</td>
                                <td> {{ $item->mobile }}</td>
                                <td> {{ $item->email }}</td>

                                <td>
                                    <a  class="btn btn-warning" href="{{ route('inactive-customer.show',[$item->id]) }}">show</a>
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
