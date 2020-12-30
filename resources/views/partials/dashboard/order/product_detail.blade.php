<tr>
    <td>
        <span class="sl">{{ $sl }}</span>
        <input type="hidden" class="id" value="{{ $id }}">
    </td>
    <td>
        Name : {{ $name }} <br>
        Code : {{ $code }} <br>
        Regular Price: {{ $regularPrice }} <br>
        Offer Price: {{ $offerPrice }} <br>
    </td>
    <td>
        <div class="form-group">
            <input type="text" class="form-control qty" name="qty[]" value="1">
        </div>
    </td>
    <td>
        <div class="form-group focused">
            <input type="text" class="form-control offer_price" readonly="" name="offer_price[]" value="{{$offerPrice}}">
        </div>
    </td>
    <td>
        <div class="form-group focused">
            <input type="text" class="form-control selling_price" name="selling_price[]" value="{{$offerPrice}}">
        </div>
    </td>
    <td>
        <div class="form-group focused">
            <input type="text" class="form-control total_selling_price" readonly="" name="total_selling_price[]" value="{{ $offerPrice }}">
            <input type="text" class="form-control total_offer_price" readonly="" name="total_selling_price[]" value="{{ $offerPrice }}">
            <input type="text" class="form-control total_profit" readonly="" name="total_selling_price[]" value="{{ $regularPrice - $offerPrice }} }">
        </div>
    </td>
    <td>
        <button class="btn btn-sm delete-product"><i title="Delete" class="text-danger fa fa-trash"></i></button>
    </td>
</tr>
