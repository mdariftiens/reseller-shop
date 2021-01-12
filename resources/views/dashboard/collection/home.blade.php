@extends('layouts.app')
@section('title')
    Collections
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <h3>Collections</h3>

            <div class="row">
                @forelse($collections as $item)

                    <div class="col-md-3" title="{{ $item->description }}">
                        <div class="card">
                            <div class="card-title">
                                <div class="card-header">
                                    <h3 class="text-gray text-capitalize text-md">{{ $item->name }}</h3>
                                </div>
                            </div>
                            <div class="card-body">
                                <img class="img-fluid" src="https://api.jassreseller.com.bd/images/1588655803.png" alt="{{ $item->description }}">
                                <div class="row">
                                    <div class="col-md-6">
                                        {{ $item->no_of_products }} Products
                                    </div>
                                    <div class="col-md-6">
                                        Min. Price:
                                        {{ $item->min_offer_price }}
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer">
                                <a class="btn btn-sm btn-success btn-block" href="{{ route('collection.detail', $item->id) }}">
                                    Show Products
                                </a>
                            </div>
                        </div>

                    </div>
                @empty
                    No Collection Found!
                @endforelse
            </div>
            <ul class="pagination pagination-sm m-0 float-right">
                {{ $collections->links() }}
            </ul>

        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
@endsection

@push('footer_end_script')
    @include('partials.js.tooltip')
@endpush
