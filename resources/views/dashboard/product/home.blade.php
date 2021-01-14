@extends('layouts.app')
@section('title')
    Collections
@endsection
@section('content')
    <!-- Main row -->
    <div class="row">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
            <div class="row">
                <div class="col-md-6">
                    <form action="">

                    {{ Form::selectGroup('Categories',
                        $categories->pluck('name','id')->toArray(),[],'Categories',['class'=>'form-control'] ) }}
                    </form>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">
                    <ul class="list-group">
                        @forelse($categories->where('parent_id',1) as $item)
                            <li class="list-group-item" data-id="{{ $item->id }}">{{ $item->name }}</li>
                        @empty
                        @endforelse
                    </ul>

                </div>
                <div class="col-md-9">
                    <div class="row" id="data-container">
                        @forelse($categories->where('parent_id',2) as $item)

                            @continue($item->no_of_products == 0)

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
                                        <button class="btn btn-sm btn-success btn-block btn-cat" data-id="{{ $item->id}}"> Show Category And Products</button>

                                    </div>
                                </div>

                            </div>
                        @empty
                        @endforelse

                        @forelse($products as $item)

                            <div class="col-md-3" title="{{ $item->description }}">
                                <div class="card">
                                    <div class="card-title">
                                        <div class="card-header">
                                            <h3 class="text-gray text-capitalize text-md">{{ $item->name }}</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img class="img-fluid" src="https://api.jassreseller.com.bd/images/1588655803.png" alt="{{ $item->description }}">
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-success btn-block btn-product"  data-id="{{ $item->id}}"> Product Detail</button>

                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>

                </div>

            </div>
            <ul class="pagination pagination-sm m-0 float-right">
                <li><a href="#">Load More</a></li>
            </ul>

        </section>
        <!-- /.Left col -->
    </div>
    <!-- /.row (main row) -->
@endsection

@push('footer_end_script')
    @include('partials.js.tooltip')
    @include('partials.js.axios')
    @include('partials.js.select2')


    <script>
        $(document).ready(function() {

            $body = $('body');
            $dataContainer = $('#data-container');

            $('.select2').select2();

            function categoryHtml(id, name, description, image, no_of_products, min_offer_price){
                return  `<div class="col-md-3" title="${ description}">
                                <div class="card">
                                    <div class="card-title">
                                        <div class="card-header">
                                            <h3 class="text-gray text-capitalize text-md">${ name }</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img class="img-fluid" src="${image}" alt="${ description }">
                                        <div class="row">
                                            <div class="col-md-6">
                                                ${ no_of_products } Products
                                            </div>
                                            <div class="col-md-6">
                                                Min. Price: ${ min_offer_price }
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-success btn-block btn-cat" data-id="${ id }"> Show Category And Products</button>
                                    </div>
                                </div>
                            </div>`;
            }

            function productHtml(id, name, description, image, regularPrice, offerPrice){
                return  `<div class="col-md-3" title="${ description }">
                                <div class="card">
                                    <div class="card-title">
                                        <div class="card-header">
                                            <h3 class="text-gray text-capitalize text-md">${ name }</h3>
                                        </div>
                                    </div>
                                    <div class="card-body">
                                        <img class="img-fluid" src="${ image }" alt="${ description }">
                                        <div class="row">
                                            <div class="col-md-6">
                                                Regular Price: ${ regularPrice }
                                            </div>
                                            <div class="col-md-6">
                                                Offer Price: ${ offerPrice }
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button class="btn btn-sm btn-success btn-block btn-product" data-id="${ id }"> Product Detail</button>
                                    </div>
                                </div>
                            </div>`;
            }

            $body.on("click",'.btn-cat',function (){

                url = "{{ route('get-sub-cat-with-products','/') }}"
                id = $(this).data('id')

                axios.get( url + '/' +id)
                    .then(function (response) {

                        console.log(response);

                        let subCategories  = response.data.subCategories;
                        let products  = response.data.products;
                        let subCategoriesHtml = '';
                        let productsHtml = '';

                        $(subCategories).each(function (i,el){
                            console.log(i,el)
                            subCategoriesHtml += categoryHtml(el.id, el.name, el.description, "https://api.jassreseller.com.bd/images/1588655803.png", el.no_of_products, el.min_offer_price )
                        });

                        $(products).each(function (i,e){
                            console.log(i,e)
                            productsHtml += productHtml(e.id, e.name, e.description, "https://api.jassreseller.com.bd/images/1588655803.png", e.regular_price, e.offer_price )
                        });

                        $dataContainer.html( subCategoriesHtml + productsHtml)


                    })
                    .catch(function (error) {
                            console.log(error)
                    })
                    .then(function () {
                        // always executed
                    });
            });


            $body.on("click",'.btn-product',function (){

            });




        });
    </script>

@endpush
