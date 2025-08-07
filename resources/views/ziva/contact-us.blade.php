<!doctype html>
<html class="" lang="en">
@php $page = page_settings('contact-us') @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name')}} | Contact us</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    @include('common.meta')
</head>

<body>
    @include('common.early-access')
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
        <div class="box-layout">
            <div class="wrapper white-bg">
                <!--header section start-->
                <!--header section start-->
                @include('common.header')
                <!--Breadcrumbs start-->
                <div class="breadcrumbs text-center" style="background-image: url('{{ asset('storage/' . $page->background_image) }}')">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="breadcrumbs-title">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="col-md-8 offset-md-2">
                            <div class="section-title text-center">
                                <h2>{{ $page?->title }}</h2>
                            </div>
                            <div class="section-title text-center">
                                        
                            </div>
                        </div>
                    </div>
                </div>
                <!--Breadcrumbs end-->
                <!--Contact start-->
                <div class="contact-us">
                    <div class="container">
                        <div class="contact-list fix">
                            <div class="row">
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="single-contact">
                                        <div class="contact-icon">
                                            <a href="#"><i class="zmdi zmdi-phone"></i></a>
                                        </div>
                                        <div class="contact-desc">
                                            <p>{{ $company?->phone_1 }}<br>{{ $company?->phone_2 }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="single-contact text-center">
                                        <div class="contact-icon">
                                            <a href="#"><i class="zmdi zmdi-dribbble"></i></a>
                                        </div>
                                        <div class="contact-desc">
                                            <p>{{ $company?->email }}<br>thezivafkourish@gmail.com</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-sm-12 col-xs-12">
                                    <div class="single-contact float-right">
                                        <div class="contact-icon">
                                            <a href="#"><i class="zmdi zmdi-pin"></i></a>
                                        </div>
                                        <div class="contact-desc">
                                            <p> {{ $company?->address }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Contact end-->
                <!--Contact form start-->
                <div class="contact-form ptb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="section-title text-center">
                                    <h2>Get in touch</h2>
                                    <h5>We’d Love to Hear from You</h5>
                                    <p>
                                        Whether you have questions, need guidance, or simply want to share your heart, our team is here to listen and help. 
                                        Private inquiries, prayer requests, and service details are all welcome. We treat every message with care and confidentiality.
                                    </p>
                                    <p>
                                        Fill out the form below, and we’ll respond as swiftly as a freshly baked loaf cools! (Usually within 24 hours.)
                                    </p>
                                    <em>“Come to me, all you who are weary and burdened, and I will give you rest.” — Matthew 11:28 </em>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 col-sm-12 col-xs-12 order-md-2">
                                <div class="contact-form-img text-center">
                                    <img src="images/common/contact.jpg" alt="">
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12 col-xs-12 order-md-1">
                                <div class="contact-form">
                                    <p class="form-messege"></p>
                                    <form id="contact-form" action="" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 col-sm-12 col-xs-12 mb-2">
                                                <input name="name" class="form-control" type="text" placeholder="Name" required>
                                            </div>
                                            <div class="col-md-6 col-sm-12 col-xs-12 mb-2">
                                                <input name="phone" class="form-control" type="text" placeholder="Phone" required>
                                            </div>
                                        </div>
                                        <input class="form-control mb-2" name="email" type="email" placeholder="Email">
                                        <textarea name="message" class="form-control mb-2" placeholder="Message"></textarea>
                                        <button type="submit">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Contact form end-->
                
                <div id="contact-map" class="map-area">
                    <div class="mapouter">
                        <div class="gmap_canvas">
                            <iframe id="gmap_canvas" style="width:100%;height:500px;" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.699293619604!2d32.60462951091904!3d0.4425724638175614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177db1b3bb2d5aa3%3A0x3607feb0c8c8bbae!2sEunie&#39;s%20Kitchen!5e0!3m2!1sen!2sug!4v1752233487445!5m2!1sen!2sug" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                            <a href="https://sites.google.com/view/maps-api-v2/mapv2"></a>
                        </div>
                    </div>
                </div> 
                <!--footer start-->
                
                @include('common.footer')
                <!--footer end-->
            
            </div>
        </div>
    <!--=================================
     style-customizer start  -->

    <!-- style-customizer End -->
    

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All js plugins included in this file. -->
    @include('common.scripts')
</body>

</html>