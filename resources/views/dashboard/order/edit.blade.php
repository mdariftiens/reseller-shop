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
                        {{ Form::select('category',array_merge(['*'=>'All'],$categories) ,null,['class'=>'form-control select2']) }}
                        <br>
                        <br>
                        <ul class="list-group product-list-group" style="height: 600px; overflow-y: scroll">
                            @foreach($products as $product)
                                <li class="list-group-item">
                                    <div class="row">
                                        <div class="col-md-4 item-image">
                                            <img class="image img-fluid" src="https://dummyimage.com/600x400/000/fff" alt="">
                                        </div>

                                        <div class="col-md-8 item-data" >

                                            Name : {{ $product->name }} <br>
                                            Code : {{ $product->code }} <br>
                                            Offer Price: {{ $product->regular_price}} <br>
                                            Regular Price: {{ $product->offer_price }} <br>

                                            <button type="button" name="button" class="btn btn-success btn-sm btn-add"
                                                    data-id = "{{ $product->id }}"
                                                    data-name = "{{ $product->name }}"
                                                    data-code = "{{ $product->code }}"
                                                    data-image = "{{ 'https://dummyimage.com/600x400/000/fff' }}"
                                                    data-regular_price = "{{ $product->regular_price }}"
                                                    data-offer_price = "{{ $product->offer_price }}"
                                            > <i class="fa fa-plus"></i> Add</button>

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
    @include('partials.dashboard.js.axios')

    <script>
        $(document).ready(function() {
            $('.select2').on('select2:select', function (e) {
                var id = e.params.data.id;
                console.log(id);
                let item = "";
                axios.get('/api/product/'+id)
                    .then(function (response) {
                        // handle success
                        console.log(response);

                        let resItem = response.data;
                        let item = '';

                        $(resItem).each(function (index,el){
                            console.log(el)
                            item +=
                                    '<li class="list-group-item">\
                                        <div class="row">\
                                            <div class="col-md-4 item-image">\
                                                <img class="image img-fluid" src="https://dummyimage.com/600x400/000/fff" alt="">\
                                            </div>\
                                                    \
                                            <div class="col-md-8 item-data" > \
                                                \
                                                Name : '+ el.name+' <br> \
                                                Code : '+ el.code +'<br> \
                                                Offer Price: '+el.offer_price+' <br> \
                                                Regular Price: '+el.regular_price+' <br> \
                                                \
                                                <button type="button" name="button" class="btn btn-success btn-sm btn-add"\
                                                    data-id = "'+el.id+'"\
                                                    data-name = "'+el.name+'"\
                                                    data-code = "'+el.code+'"\
                                                    data-image = "'+el.image+'"\
                                                    data-regular_price = "'+el.regular_price+'"\
                                                    data-offer_price = "'+el.offer_price+'"\
                                                > <i class="fa fa-plus"></i> Add</button>\
                                            </div>\
                                            \
                                        </div>\
                                        \
                                    </li>'
                        });

                        $('.product-list-group').html( item )
                    })
                    .catch(function (error) {
                        // handle error
                        console.log(error);
                    })
                    .then(function () {
                        // always executed
                    });


            });

            $('body').on('click','.btn-add',function (e) {
                let id = $(this).data('id');
                let name = $(this).data('name');
                let code = $(this).data('code');
                let image = $(this).data('image');
                let regular_price = $(this).data('regular_price');
                let offer_price = $(this).data('offer_price');
                console.log(id,name,code,image,regular_price,offer_price)
            })
        });
    </script>
@endpush
