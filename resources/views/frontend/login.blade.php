
<section>
    <div class="container" >
        <div class="login-content">
            <div class="login-bottom-div">
                <h5><span>Signin / Signup  </span><span>JassReseller</span></h5>
                <div class="first-step">
                    <div class="form-group cus-form-group">
                        <div class="mobile-no-india">BD +88 | </div>
                        <input class="form-control cus-form-control required padding-left-60" id="phone" v-model='mobile' name="phone" size="11" type="text" autocomplete="off" maxlength="11" value="01703655691">
                    </div>
                    <div class="error_show"  id="mobile_help"></div>

                    <div v-if='codeFormShow==false'>
                        <button class="btn btn btn-outline-info" style="display:block; margin:0 auto;" @click='sendCodeToMobile' type="submit">Send OTP To Mobile</button>
                    </div>
                </div>


                <div class="second-step" v-if='codeFormShow==true'>
                    <div class="form-group cus-form-group">
                        <input class="form-control cus-form-control required padding-left-60" id="code" name="code" v-model="code" autocomplete="off" placeholder="Code" style="font-size: 26px;" value="01703655691">
                        <div  class="error_show" id="code_help"></div>
                    </div>
                    <div>
                        <button class="btn btn btn-outline-success" style="display:block; margin:0 auto;"  @click='verifyMobileAndCode'>Login</button>
                    </div>
                </div>


            </div>
        </div>
    </div>


</section>


<style>

    article, aside, dialog, figcaption, figure, footer, header, hgroup, main, nav, section {
        display: block;
    }
    .error_show{
        display: block;
        font-size: 12px;
        color: #b95959;
    }
    .login-content{
        width: 460px;
        margin: 61px auto;
    }
    .login-content .login-bottom-div {
        background:#fff;
        border-radius: 4px;
        border: thin solid #e4e4e4;
        padding: 40px 60px;
    }
    .login-content .login-bottom-div h5 {
        color: #000;
        margin-bottom: 25px;
        letter-spacing: .4px;
        font-size: 20px;
        font-weight: 500;
    }

    .cus-form-group {
        border: thin solid
        #e0e0e0;
        border-radius: 2px;
        position: relative;
        display: flex;
        height: 55px;
    }
    .control-label {
        opacity: .5;
        pointer-events: none;
        position: absolute;
        transform: translate3d(0,22px,0) scale(1);
        transform-origin: left top;
        transition: .24s;
    }
    .mobile-no-india {
        position: absolute;
        top: 17px;
        left: 10px;
        font-size: 12px;
        color:
            #555;
    }

    .login-content .login-bottom-div .login-btn-box a.pull-left {
        margin-top: 40px;
        padding: 12px;
        width: 165px;
        margin-bottom: 0;
    }
    .login-content .login-bottom-div .login-btn-box button {
        border: none;
        padding: 12px;
        width: 180px;
        margin-top: 40px;
    }

    .login-content .login-bottom-div input#phone{
        margin-left: 63px;
        margin-top: 8px;
        border: 1px solid  #eaeaea;
        margin-right: 15px;
    }
</style>
