@extends('layouts.frontend')
@section('title')
    {{ config('shop.shop_name') }}
@endsection

@section('content')
    <section>
        <div class="top-banner" style="background-image: url('https://www.jassreseller.com.bd/imgs/sent/Home main.png');background-size: contain;">

            <div class="row" style="margin-right: 0px;margin-left: 0px;">

                <div class="quote  col-md-5 ">
                    A one stop platform for your small business
                </div>
            </div>

        </div>

        <div class="our-services-section">

            <div class="container">
                <div class="our-services">
                    <h5 class="title sectionTitle ng-binding">Platform Facilities:</h5>
                    <div class="services-list">
                        <a class="one-service" href="javascript:;">
                            <h6 class="name ng-binding">Free Website</h6>
                            <img class="artwork" src="https://www.jassreseller.com.bd/imgs/sent/home-give it first.png">
                            <i class="arrowIcon sprite sprite-right-orange"></i>
                            <span class="readmore">READ MORE <img src="~/assets/74c71403c0062604c4cf533f01f6f5c7.png"></span>
                        </a>
                        <a class="one-service" href="/delivery">
                            <h6 class="name ng-binding">Trusted Delivery Partner</h6>
                            <img class="artwork" src="https://www.jassreseller.com.bd/imgs/sent/home-give it second.png">
                            <i class="arrowIcon sprite sprite-right-blue"></i>
                            <span class="readmore">READ MORE <img src="~/assets/74c71403c0062604c4cf533f01f6f5c7.png"></span>
                        </a>
                        <a class="one-service" href="/reseller">
                            <h6 class="name ng-binding">Sourcing Products</h6>
                            <img class="artwork" src="https://www.jassreseller.com.bd/imgs/sent/home -give it third.png">
                            <i class="arrowIcon sprite sprite-right-orange"></i>
                            <span class="readmore">READ MORE <img src="~/assets/74c71403c0062604c4cf533f01f6f5c7.png"></span>
                        </a>
                        <!--      <a class="one-service" href="/promotion-and-boosting">
                                 <h6 class="name ng-binding">Content and Promotion</h6>
                                 <img class="artwork" src="~/assets/1399589b5cdd6314c88c478b77409554.jpg">
                                 <i class="arrowIcon sprite sprite-right-pink"></i>
                                 <span class="readmore">READ MORE <img src="~/assets/74c71403c0062604c4cf533f01f6f5c7.png"></span>
                             </a>
                             <a class="one-service" href="/eloan">
                                 <h6 class="name ng-binding">Working Capital Investment</h6>
                                 <img class="artwork" src="~/assets/945b8eda6f31f2a69fa8c496b33f2293.jpg">
                                 <i class="arrowIcon sprite sprite-right-violet"></i>
                                 <s class="readmore">READ MORE <img src="~/assets/74c71403c0062604c4cf533f01f6f5c7.png"></s>
                             </a> -->
                    </div>
                </div>
            </div>


        </div>


        <link rel="stylesheet" href="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.css">

        <script src="https://cdn.jsdelivr.net/bxslider/4.2.12/jquery.bxslider.min.js"></script>


        <script>
            $(document).ready(function(){
                $('.cargo-moving').bxSlider();
            });
        </script>


        <div class="home-testimonial-section">
            <div class="site-container">
                <h5 class="sectionTitle ">We've supported over 60,000 entrepreneurs to grow their businesses. Hear what they are saying:</h5>
            </div>
            <div class="site-container">
                <div class="cargo-slider">
                    <div class="cargo-rail">
                        <div class="cargo-moving">
                            <div class="each-cargo one-slide " >
                                <div class="slider-img">
                                    <img src="https://www.jassreseller.com.bd/imgs/da-ching-ching-finery.png">
                                </div>
                                <div class="qouteWrap">
                                    <p class="quote ">If you have the internet and willpower, everything is possible.</p>
                                    <div class="merchant">
                                        <p class="owner ">Da Ching Ching</p>
                                        <a class="shop " href="https://www.facebook.com/finerydhaka/" target="_blank">Finery</a>
                                    </div>
                                </div>
                            </div><!--  -->
                            <div class="each-cargo one-slide " >
                                <div class="slider-img">
                                    <img src="https://www.jassreseller.com.bd/imgs/khandokar-nishat-ezina.png">
                                </div>
                                <div class="qouteWrap">
                                    <p class="quote ">Nothing is easy, so you need to be patient</p>
                                    <div class="merchant">
                                        <p class="owner ">Khandokar Nishat</p>
                                        <a class="shop " href="https://www.facebook.com/myezina/" target="_blank">Ezina</a>
                                    </div>
                                </div>
                            </div>
                            <div class="each-cargo one-slide " >
                                <div class="slider-img">
                                    <img src="https://www.jassreseller.com.bd/imgs/kajal-rekha-orkid-point.png">
                                </div>
                                <div class="qouteWrap">
                                    <p class="quote ">If you work hard and keep faith in yourself, success will come</p>
                                    <div class="merchant">
                                        <p class="owner ">Kajal Rekha</p>
                                        <a class="shop " href="https://www.facebook.com/orkidpoint/" target="_blank">Orkid Point</a>
                                    </div>
                                </div>
                            </div>

                            <div class="each-cargo one-slide " >
                                <div class="slider-img">
                                    <img src="https://www.jassreseller.com.bd/imgs/farzana-afroze-deeba-suchi-shoili.png">
                                </div>
                                <div class="qouteWrap">
                                    <p class="quote ">In our bad times we could have left Suchi Shoili, But we didn�t because if you are just persistent, Success comes.</p>
                                    <div class="merchant">
                                        <p class="owner ">Farzana Afroze Deeba</p>
                                        <a class="shop " href="https://www.facebook.com/suchishoili/" target="_blank">Suchi Shoili</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>



        <div class="partners-section">
            <div class="site-container">
                <h5 class="sectionTitle ng-binding">Strategic Partners</h5>
                <div class="partners">

                    <picture>
                        <img src="https://www.jassreseller.com.bd/imgs/d3504eb0512b3235604a39e6a2c753b3.png">
                    </picture>
                    <picture>
                        <img src="https://www.jassreseller.com.bd/imgs/6ce9d0e1ef6bedb9996539d12b1655fe.png">
                    </picture>

                    <picture>

                        <img src="https://www.jassreseller.com.bd/imgs/04abf249aab2796e18d48ed0fe277b17.png">
                    </picture>
                    <picture>
                        <img src="https://www.jassreseller.com.bd/imgs/d84a5a99a2674f7ca4e09f06d3d6936e.png">
                    </picture>

                </div>
            </div>
        </div>


    </section>

    <style>

        .top-banner{
            height: 500px; background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
        .top-banner .quote{
            padding-left: 200px;
            margin-top: 100px;
            font-size: 48px;
            font-weight: 600;
            line-height: 56px;
            color: #fff;
        }


        .our-services-section {
            background-color: #FFC929;
            padding-bottom: 85px;
        }

        .our-services-section   .our-services .title {
            font-weight: 500;
            font-size: 32px;
            line-height: 1.19;
            color:
                rgba(0, 0, 0, 0.75);
            padding-top: 65px;
            margin-bottom: 30px;
        }

        .our-services-section .our-services .services-list {
            display: flex;
            flex-direction: column;
        }

        .our-services-section  .our-services .services-list {
            flex-direction: row;
            justify-content: space-between;
        }
        .our-services-section .our-services .services-list .one-service {
            cursor: pointer;
            text-decoration: none;
            box-sizing: border-box;
            background-color:
                #fff;
            border-radius: 10px;
            box-shadow: 0 0 5px
            rgba(0, 0, 0, 0.25);
            display: inline-flex;
            justify-content: space-between;
            align-items: center;
        }
        .our-services-section .our-services .services-list .one-service {
            width: 355px;
            padding: 22px 25px;
            flex-direction: column;
        }
        .our-services-section   .our-services .services-list .one-service .name {
            font-weight: 500;
            font-size: 13px;
            line-height: 1.38;
            color: rgba(0, 0, 0, 0.35);
            font-family: 'Lato';
            color: rgba(0, 0, 0, 0.8);
            flex: 1;
            padding: 0;
            margin-bottom: 20px;
            align-self: flex-start;
        }
        .our-services-section   .our-services .services-list .one-service .name {
            font-weight: 500;
            font-size: 18px;
            line-height: 1.33;
            color: rgba(0, 0, 0, 0.56);
            color:
                rgba(0, 0, 0, 0.8);
            font-weight: 300;
        }

        .our-services-section .our-services .services-list .one-service .artwork {
            width: auto;
            height: auto;
            margin-bottom: 20px;
        }
        .our-services-section  .our-services .services-list .one-service .readmore {
            display: inline-block;
            color:
                #3FB5B4;
            text-decoration: none;
            letter-spacing: 2px;
            margin-top: 17px;
            font-weight: 100;
        }

        .home-testimonial-section{
            padding-left: 15px;
            padding-right: 15px;
        }
        .home-testimonial-section .one-slide {
            width: 980px;
            display: flex;
        }
        .home-testimonial-section .one-slide {
            width: 625px;
            /*flex-direction: row-reverse;*/
            margin-right: 20px;
            border-radius: 10px;
            overflow: hidden;
            background-color:#3FB5B4;
        }
        .home-testimonial-section .sectionTitle {
            width: 65%;
            margin: 38px 0 38px;
        }
        .sectionTitle {
            font-weight: 500;
            font-size: 32px;
            line-height: 1.19;
            color:
                rgba(0, 0, 0, 0.75);
            font-weight: 300;
        }
        .home-testimonial-section .one-slide .slider-img {
            width: 59%;
        }
        .home-testimonial-section .one-slide .qouteWrap {
            padding: 0 50px;
            width: 41%;
        }
        .home-testimonial-section .one-slide .qouteWrap {
            box-sizing: border-box;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
            background-color: #3FB5B4;
        }

        .home-testimonial-section .one-slide .qouteWrap .quote {
            margin-bottom: 22px;
        }
        .home-testimonial-section .one-slide .qouteWrap .quote {
            font-weight: 400;
            font-size: 17px;
            line-height: 26px;
            color: rgba(0, 0, 0, 0.56);
            font-weight: 300;
            color: #FFF;
        }
        .home-testimonial-section .one-slide .qouteWrap .merchant .shop {
            font-weight: 500;
            font-size: 13px;
            line-height: 1.38;
            color: rgba(0, 0, 0, 0.35);
            color:
                #ffc929;
            font-weight: 300;
            background: url(https://www.jassreseller.com.bd/imgs/3dd5235784b6ac32107e248d92513277.png) no-repeat;
            background-position-x: 0%;
            background-position-y: 0%;
            background-size: auto;
            background-size: 16px;
            background-position: right;
            padding-right: 21px;
        }


        .partners-section {
            padding-top: 100px;
            padding-bottom: 90px;
            background-color:#F5F3F9;
            padding-left: 15px;
            padding-right: 15px;
        }
        .partners-section .site-container {
            display: flex;
            flex-direction: row;
            align-items: center;
        }

        .partners-section .site-container .sectionTitle {
            width: 22%;
        }

        .partners-section .site-container .partners {
            padding-left: 165px;
        }
        .partners-section .site-container .partners {
            flex: 1;
            display: flex;
            justify-content: space-between;
            box-sizing: border-box;
            padding-left: 63px;
        }
        .partners-section .site-container .partners {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
        }
    </style>
@endsection
