
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header text-center">
                <h4 class="modal-title w-100 font-weight-bold">Register</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body mx-3">


                <form id="regForm" @submit.prevent="">
                    <input type="hidden" id="fbUserId" name="fbUserId" value="test">
                    <div class="form-group diu-focused">
                        <input id="name" type="name" class="form-control" name="name" autofocus >
                        <label for="name" class="">Your Name</label>
                        <small id="name_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <input id="address" type="address" class="form-control" name="address">
                        <label for="address" class="">Your Address</label>
                        <small id="address_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <input id="region" type="region" class="form-control" name="region">
                        <label for="region" class="">Region</label>
                        <small id="region_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <input id="mobile" type="text" class="form-control" name="mobile" >
                        <label for="mobile" class="">Phone Number</label>
                        <small id="mobile_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <input id="email" type="email" class="form-control" name="email" >
                        <label for="email" class="">E-Mail Address</label>
                        <small id="email_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <input id="phone_number2" type="text" class="form-control" name="phone_number2" >
                        <label for="phone_number2" class="">Alternate Phone Number</label>
                        <small id="phone_number2_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <label for="payment_method" class="">Payment Method</label><br>
                        <select id="payment_method"  name="payment_method" class="form-control">
                            <option value="Bkash">Bkash</option>
                            <option value="Bank">Bank</option>
                            <option value="Both">Both</option>
                        </select>
                        <small id="payment_method_help" class="form-text text-danger">&nbsp;</small>

                    </div>

                    <div class="form-group diu-focused">
                        <input id="bkash_number" type="text" class="form-control" name="bkash_number" >
                        <label for="bkash_number" class="">Bkash Number</label>
                        <small id="bkash_number_help" class="form-text text-danger">&nbsp;</small>
                    </div>

                    <div class="form-group diu-focused">
                        <input id="bank_account_holder_name" type="text" class="form-control" name="bank_account_holder_name" >
                        <label for="bank_account_holder_name" class="">Bank Account Holder Name</label>
                        <small id="bank_account_holder_name_help" class="form-text text-danger">&nbsp;</small>
                    </div>


                    <div class="form-group diu-focused">
                        <input id="bank_account_number" type="text" class="form-control" name="bank_account_number" >
                        <label for="bank_account_number" class="">Bank Account Number</label>
                        <small id="bank_account_number_help" class="form-text text-danger">&nbsp;</small>
                    </div>


                    <div class="form-group diu-focused" >
                        <input id="bank_name_and_branch" type="text" class="form-control" name="bank_name_and_branch">
                        <label for="bank_name_and_branch" class="">Bank Name And Branch</label>
                        <small id="bank_name_and_branch" class="form-text text-danger">&nbsp;</small>
                    </div>


                    <div class="form-group diu-focused">
                        <select name="gender" class="form-control">
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                        <label for="gender" class="">Gender</label>
                        <small id="gender_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <input id="date_of_birth" type="text" class="form-control" name="date_of_birth" >
                        <label for="date_of_birth" class="">Date Of Birth</label>
                        <small id="date_of_birth_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <select name="business_type" class="form-control">
                            <option value="website">Website</option>
                            <option value="fb-page">FB-page</option>
                            <option value="shop-showroom">Shop/Showroom</option>
                            <option value="nothing">nothing</option>
                        </select>
                        <label for="business_type" class="">Business Type</label>
                        <small id="business_type_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <label for="experience" class="">Experience</label> <br>
                        <select name="experience" id="experience" class="form-control">
                            <option value="Experienced">Experienced</option>
                            <option value="No Experience">No Experience</option>
                        </select>
                        <small id="experience_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <input id="website_url" type="text" class="form-control" name="website_url">
                        <label for="website_url" class="">Website URL</label>
                        <small id="website_url_help" class="form-text text-danger">&nbsp;</small>
                    </div>
                    <div class="form-group diu-focused">
                        <input id="fb_page_link" type="text" class="form-control" name="fburl">
                        <label for="fb_page_link" class="">FB-URL</label>
                        <small id="fb_page_link_help" class="form-text text-danger">&nbsp;</small>
                    </div>

                    <div class="form-group diu-focused">
                        <label for="age_of_business" class="">Age of Business</label> <br>
                        <select name="age_of_business" id="experience" class="form-control">
                            <option value="New">New</option>
                            <option value="1-3 Year(s)">1-3 Year(s)</option>
                            <option value="1-5 Year(s)">1-5 Year(s)</option>
                            <option value="5+ Years">5+ Years</option>
                        </select>
                        <small id="age_of_business_help" class="form-text text-danger">&nbsp;</small>
                    </div>

                    <div class="form-group diu-focused">
                        <label for="your_profession" class="">Your Profession</label> <br>
                        <select name="your_profession" id="experience" class="form-control">
                            <option value="New">New</option>
                            <option value="1-3 Year(s)">1-3 Year(s)</option>
                            <option value="1-5 Year(s)">1-5 Year(s)</option>
                            <option value="5+ Years">5+ Years</option>
                        </select>
                        <small id="your_profession_help" class="form-text text-danger">&nbsp;</small>
                    </div>

                    <div class="form-group diu-focused">
                        <label for="business_category" class="">Business Category</label> <br>
                        <select name="business_category[]" id="business_category" multiple class="form-control">
                            <option value="Women’s Clothing">Women’s Clothing</option>
                            <option value="Men’s Clothing">Men’s Clothing</option>
                            <option value="Mobile, Gadgets & Accessories">Mobile, Gadgets & Accessories</option>
                            <option value="Computer & Home Appliance">Computer & Home Appliance</option>
                            <option value="Shoes, Bag & Leather Items">Shoes, Bag & Leather Items</option>
                            <option value="Kids, Mother  & Baby items">Kids, Mother  & Baby items</option>
                            <option value="Home & living">Home & living</option>
                            <option value="Makeup & Cosmetics">Makeup & Cosmetics</option>
                            <option value="Watch,Sunglass,Perfume & Jewllery">Watch,Sunglass,Perfume & Jewllery</option>
                            <option value="Bokk,Sports & Travels">Bokk,Sports & Travels</option>
                            <option value="Multi Products">Multi Products</option>
                            <option value="Others">Others</option>
                        </select>
                        <small id="business_category_help" class="form-text text-danger">&nbsp;</small>
                    </div>

                    <div class="form-check">
                        <input id="agree" type="checkbox" class="form-check-input" name="agree">
                        <label for="agree" class="form-check-label">I agree with Jass reseller Terms And Conditions</label>
                        <small id="agree_help" class="form-text text-danger">&nbsp;</small>
                    </div>

                </form>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button class="btn btn-default" @click='register()'>Register</button>
            </div>
        </div>
    </div>
</div>

<div class="text-center">
    <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalLoginForm">
        Register Yourself</a>
</div>
