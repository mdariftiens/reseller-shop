@extends('layouts.frontend')


@section('title')
    Tracking Order
@endsection

@section('content')
<section>
    <div class="white-container">

        <div class="main-container">
            <h4 class="text-center" style="padding: 50px;background:rgb(249, 249, 249) none repeat scroll 0% 0%; margin-top: 27px;">
                Tracking
            </h4>
        </div>
        <div class="text-center clearfix">

            <div class="col-md-3" style="margin: 30px auto;">
                <form id="trackingForm" onsubmit="javascript:return false">

                    {{ Form::textGroup('invoice-number',null,'Invoice Number',['class'=>'form-control ','placeholder'=>'Invoice Number...'],null,'col-md-12') }}
                    <span id="invoice_number_error" class="text-danger"></span><br>
                    {{ Form::submit('Search',['class'=>'btn btn-info btn-track']) }} <br><br>

                </form>
            </div>

        </div>

        <div>

            <div class="col-md-12 show-order">
            <h3 class="text-center">Product Order Tracking || Status : <span id="status"></span> </h3> <br>

                <table class="table table-default track-table">
                    <thead>
                    <tr>
                        <th>Order</th>
                        <th>Order Detail</th>
                        <th>Shipping Info</th>
                    </tr>
                    </thead>

                    <tbody>

                    </tbody>
                </table>
            </div>

        </div>



    </div>
</section>

    @include('partials.js.axios')

@endsection

@push('footer_end_script')
    <script>
        $(document).ready(function() {

            let $body = $('body');
            let $invoice_number_error = $('#invoice_number_error');

            $('.show-order').hide()

            $body.on('keyup',function () {
                $invoice_number_error.html('')
            })

            $body.on('click','.btn-track',function (){

                let invoiceNumber = $('#invoice-number').val()

                console.log(invoiceNumber, invoiceNumber.trim().length)

                if(  invoiceNumber.trim().length == 0 ){
                    $invoice_number_error.html("Invoice Number is empty!");
                    return;
                }

                let url = '{{ route('track') }}?invoice_number=' + invoiceNumber;

                axios.get(url)
                    .then(function (response) {
                        // handle success
                        $('.show-order').show()
                        console.log(response.data.data);
                        let dataRow = response.data.data;

                        let row = `<tr>
                            <td>
                                <strong>Shop Name: </strong> ${dataRow.status} <br>
                                <strong>Invoice Number: </strong> ${dataRow.invoice_number} <br>
                                <strong>Date: </strong> ${dataRow.created_at.split('T')[0]} <br>

                            </td>
                            <td>
                                <strong>Delivery Charge: </strong>${dataRow.delivery_charge} <br>
                                <strong>Number of Product: </strong>${dataRow.no_of_product} <br>
                            </td>
                            <td>
                                <strong>Name: </strong> ${dataRow.order_shipping.name} <br>
                                <strong>Address: </strong> ${dataRow.order_shipping.address} <br>
                                <strong>Optional Address: </strong> ${dataRow.order_shipping.optional_address} <br>
                                <strong>Mobile Number: </strong> ${dataRow.order_shipping.mobile_number} <br>
                            </td>
                        </tr>`;

                        $('.track-table tbody').html(row)

                    })
                    .catch(function (error) {
                        // handle error
                        $('.show-order').hide()

                        $invoice_number_error.html( error.response.data.message);
                    })
                    .then(function () {
                        // always executed
                    });
            })

        });
    </script>
@endpush
