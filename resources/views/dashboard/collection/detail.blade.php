@extends('layouts.app')
@section('title')
    Products
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <h3 class="">Products</h3>
                    <div class="row">
                        @forelse($products as $item)
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-header">
                                        <div class="card-title">
                                            <h3 class="text-gray text-capitalize text-md">{{ $item->name }}</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img class="img-fluid" src="https://api.jassreseller.com.bd/images/1588655803.png" alt="{{ $item->description }}">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Regular Price: {{ $item->regular_price }}
                                            </div>
                                            <div class="col-md-6">
                                                Offer Price: {{ $item->offer_price }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <a class="btn btn-sm btn-success btn-block" data-id="{{ $item->id  }}">
                                            Show Detail
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @empty
                            No Collection Found!
                        @endforelse
                    </div>


        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
@endsection

@push('footer_end_script')
    @include('partials.js.tooltip')
@endpush
