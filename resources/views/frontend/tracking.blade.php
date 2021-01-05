<section>
    <div class="white-container">
        <div class="main-container">
            <div >
                <div class="basic-shopup-header">
                    <div class="logo"></div>
                </div>
            </div>
        </div>

        <div class="main-container">
            <h4 class="text-center" style="padding: 50px;background:rgb(249, 249, 249) none repeat scroll 0% 0%; margin-top: 27px;">
                Tracking
            </h4>
        </div>
        <div class="text-center clearfix">

            <div class="col-md-4" style="margin: 30px auto;">
                <form id="trackingForm" @submit.prevent="">

                    <div class="form-group focused">
                        <select id="type" name="type"  class="form-control" v-model='type'>
                            <option value="parcel">Parcel Delivery</option>
                            <option value="order">Order Product</option>
                        </select>
                        <label for="type">Select Type *</small></label>
                        <small id="type_help" class="form-text text-danger">&nbsp;</small>
                    </div>

                    <div class="form-group focused">
                        <input type="text" name="id" placeholder="ID"class="form-control"  v-model='id'>
                        <label for="id">ID *</small></label>
                        <small id="id_help" class="form-text text-danger">&nbsp;</small>
                    </div>


                    <button class="btn btn-info" @click="getInfo()" >Search</button>
                </form>
            </div>

        </div>

        <div class="" v-if='showOrder'>

            <h3 class="text-center">Product Order Tracking || Status : {{ orderStatusToString(row.status) }} </h3> <br>
            <div class="col-md-12" v-if="row!=null">

                <table class="table table-default">
                    <thead>
                    <tr>
                        <th>Order By</th>
                        <th>Shipping Info</th>
                        <th>Others</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>
                            <strong>Name: </strong> {{ row.created_for.name}} <br>
                            <strong>Mobile Number: </strong> {{ row.created_for.mobile}} <br>
                            <strong>Address: </strong> {{ row.created_for.address}} <br>
                        </td>
                        <td>
                            <strong>Name: </strong>{{ row.order_shipping.name}} <br>
                            <strong>Mobile Number: </strong>{{ row.order_shipping.mobile_number}} <br>
                            <strong>Address: </strong>{{ row.order_shipping.address}} <br>{{ row.order_shipping.address2}}
                        </td>
                        <td>
                            <strong>Product Count: </strong>{{ row.order_details.length}} <br>
                            <strong>Created At: </strong>{{ row.created_at}} <br>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>

        </div>



    </div>
</section>

<style>

    .pair-parent{
        display: flex;
        flex-direction: row;
        margin: 60px 50px;
        background:
            #f0f0f0;
    }
    .pair {
        flex-direction: column;
        width: 346px;
        flex-basis: revert;
    }
</style>
