<!doctype html>
<html class="" lang="en">
@php $page = page_settings('testimonials') @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Home </title>
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
            @include('common.header')
            <!--header section end-->
            <!--slider section start-->
            <div class="slider-container">
                <!-- Slider Image -->
                <div id="mainSlider" class="nivoSlider slider-image">
                    @foreach ($ads as $ad)
                        <img src="{{ asset('storage/' . $ad->media_path)}}" alt="" title="#htmlcaption{{$loop->index}}"/> 
                    @endforeach
                </div>
                @foreach ($ads as $ad)
                    <div id="htmlcaption1" class="nivo-html-caption slider-caption-1">
                        <div class="slider-text-table">
                            <div class="slider-text-tablecell">
                                <div class="container-fluid">
                                    <div class="row">
                                        <div class="col-md-12 col-sm-12 col-xs-12">
                                            <div class="slide1-text">
                                                <div class="middle-text">
                                                    <div class="title-1 wow rotateInDownRight" data-wow-duration="0.9s" data-wow-delay="0s">
                                                        {{-- <h1>welcome {{ config('app.name') }}</h1> --}}
                                                    </div>	
                                                    <div class="desc wow slideInRight" data-wow-duration="1.2s" data-wow-delay="0.2s">
                                                        {{-- <p>{{ $ad->caption }}</p> --}}
                                                    </div>
                                                </div>	
                                            </div>				
                                        </div>
                                    </div>	
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <!--slider section end-->
            <!--welcome section start-->
            <div class="welcome-about">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="about-img">
                                <img src="{{ asset('storage/'.$aboutUs->image) }}" alt="" height="520">
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-12 col-xs-12">
                            <div class="about-desc">
                                <h6>Welcome to {{ config('app.name') }}</h6>
                                <h2>About {{ config('app.name') }}</h2>
                                {!! $aboutUs->content !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--welcome section end-->
            <!--fun fact area-->
            <div class="fun-fact text-center ptb-30" style="background-image: url('{{ asset('storage/' . $ourImpact?->background_image) }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <div class="single-fun-fact float-left">
                                <div class="fun-icon">
                                    <a href="#"><i class="fa fa-trophy" aria-hidden="true"></i></a>
                                </div>
                                <p class="counter">{{ $ourImpact?->awards }}</p>
                                <h5>win awards</h5>
                            </div>
                        </div>
                        <div class="col-lg-2 col-md-3 col-xs-12">
                            <div class="single-fun-fact middle-margin-left">
                                <div class="fun-icon">
                                    <a href="#"><i class="zmdi zmdi-favorite"></i></a>
                                </div>
                                <p class="counter">{{ $ourImpact?->happy_clients }}</p>
                                <h5>Happy client</h5>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-3 col-xs-12">
                            <div class="single-fun-fact middle-margin">
                                <div class="fun-icon">
                                    <a href="#"><i class="zmdi zmdi-male-female"></i></a>
                                </div>
                                <p class="counter">{{ $ourImpact?->trainers }}</p>
                                <h5>trainer</h5>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-xs-12">
                            <div class="single-fun-fact float-right">
                                <div class="fun-icon">
                                    <a href="#"><i class="fa fa-pagelines" aria-hidden="true"></i></a>
                                </div>
                                <p class="counter">{{ $ourImpact?->therapy_sessions }}</p>
                                <h5>Therapy Sessions</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Video section end-->
            <!--pricing palaning start-->
            <div class="pricing-plan ptb-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="section-title text-center">
                                <h2>our services</h2>
                                <p> Take the first step toward nourishment, healing and transformation. Whether you are looking to sharpen your culinary skills, receive Christ-centered counselling, explore personal or business growth, we are here to tale the journey with you. </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-n-30px">
                        @foreach ($services as $item)
                            <div class="col-lg-4 col-md-6 col-xs-12 mb-30px">
                                <a href="/services/{{ $item?->slug}}">
                                    <img src="{{ asset('storage/'.$item?->image)}}" alt="{{ $item?->name }}" class="img-fluid">
                                </a>
                                <div class="pricing-table text-center">
                                    <div class="pricing-title">
                                         <a href="/services/{{ $item?->slug}}">
                                            <h3>{{ $item?->name }}</h3>
                                        </a>
                                    </div>
                                    <div class="pricing-desc">
                                        @if ($item?->price > 0)
                                            <h2>{{ number_format($item?->price)}}<span class="date">ugx</span></h2>
                                        @endif
                                        <ul>
                                            <li>
                                                <a href="/services/{{ $item?->slug}}">
                                                    {{ $item?->price_note }}
                                                </a>
                                            </li>
                                        </ul>
                                        <div class="book-now">
                                            <a href="javascript:void(0)" onclick="bookService('{{ $item->name }}', '{{ $company->whatsapp }}', '{{ $item->id}}', '{{ $item->book_button_text}}')" >
                                                {{ $item->book_now_text ?? 'Book now' }}
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        <div class="row mt-4">
                            <div class="col-12 text-center">
                                <a href="/services" class="view-more-btn">
                                    View More
                                </a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--pricing palaning end-->
            <div class="choose-us ptb-100 grey-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="section-title bg_grey text-center">
                                <h2>why choose us?</h2>
                                {!! $whyChooseUs?->statement !!}
                            </div>
                        </div>
                    </div>
                    <div class="row">
                                @foreach ($whyChoosePoints as $item)
                                <div class="choose-us-list col-lg-4 col-md-4">
                                    <div class="single-choose">
                                        <div class="choose-head">
                                            <div class="choose-icon">
                                                <i class="fa fa-pagelines" aria-hidden="true"></i>
                                            </div>
                                            <div class="choose-title">
                                                <h5>{{ $item?->title }}</h5>
                                            </div> 
                                        </div>
                                        <div class="choose-desc">
                                            <p> {{ $item?->description}} </p>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                    
                    </div>
                </div>
            </div>
            <!--Testimonial start-->
            <!-- style="background-image: url('{{ asset('storage/' . $page->background_image) }}')" -->
            <div class="testimonial">
                <div>
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 offset-lg-3 col-md-8 offset-md-2">
                                <div class="section-title text-center mt-4">
                                    <h2>What our clients say</h2>
                                </div>
                                <div class="testimonail-list owl_pagination">
                                    @foreach ($testimonials as $item)
                                        <div class="single-testimonial">
                                            <p>
                                                <i class="fa fa-quote-left" aria-hidden="true"></i>
                                                {{ $item?->message }}
                                            </p>
                                            <h3>{{ $item?->name }}</h3>
                                        </div>
                                    @endforeach
                                </div> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Testimonial end-->
            <!--our blog start-->
            <hr>
            <div class="our-blog pt-100 grey-bg">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="section-title text-center">
                                <h2>our Blog</h2>
                                <p>
                                    At Ziva Flourish, we believe every meal, memory, and moment of growth has a story worth sharing. Our blog is a tapestry of culinary inspiration, soul-nourishing reflections, and practical wisdom rooted in the light of Christ.
                                    Join us as we explore the intersection of faith, food, and flourishing, offering insights that nourish both body and spirit. Whether you're seeking recipes, personal growth tips, or simply a dose of encouragement, our blog is here to inspire your journey toward holistic well-being.
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="row mb-n-30px">
                        @foreach ($blogPosts as $item)
                            <div class="col-lg-6 col-sm-12 col-xs-12 mb-30px">
                                <div class="single-blog">
                                    <div class="single-blog-top fix">
                                        <div class="blog-img">
                                            <a href="/blog/{{ $item?->slug}}">
                                                <img src="{{ asset('storage/'.$item?->thumbnail)}}" alt="">
                                            </a>
                                        </div>
                                        <div class="blog-desc">
                                            <h6><a href="/blog/{{ $item?->slug}}">{{ $item?->title }}</a></h6>
                                            <p>{{ strip_tags(Str::limit($item?->content, 200)) }}</p>
                                            <a class="read-more" href="/blog/{{ $item?->slug}}">Read more <i class="zmdi zmdi-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                    <div class="blog-bottom-action">
                                        <div class="blog-publish">
                                            <p><i class="zmdi zmdi-time"></i>{{ \Carbon\Carbon::parse($item?->published_at)->format('M d, Y') }} </p>
                                        </div>
                                        <div class="blog-action-box">
                                            <ul>
                                                <li><a href="#"><i class="zmdi zmdi-favorite-outline"></i>({{ $item?->stats->likes }})</a></li>
                                                <li><a href="#"><i class="zmdi zmdi-comments"></i>({{ $item?->stats->comments }})</a></li>
                                                <li><a href="#"><i class="zmdi zmdi-eye"></i>({{ $item?->stats->views }})</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <!-- View More btn -->
                    <div class="row mt-4">
                        <div class="col-12 text-center">
                            <a href="/blog" class="view-more-btn">
                                View More
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!--our blog end-->
            <!--Our partner start-->
            <hr>
            <div class="our-partner pt-100">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="section-title text-center">
                                <h2>Trusted By</h2>
                                <p> Serving With Excellence, Rooted in Faith. At Ziva Flourish Centre, we’re honored to walk alongside individuals, families, and organizations who share our vision for Christ-centered transformation. Our partnerships reflect God’s faithfulness in every season.</p>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        @foreach ($partners as $item)
                            <div class="col-md-3">
                                <div class="">
                                    <a href="#">
                                        <img src="{{ Storage::url($item?->logo)}}" height="200" alt="{{ $item?->name}}">
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!--Our partener end-->
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