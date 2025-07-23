<!doctype html>
<html class="" lang="en">
@php $page = page_settings('about-us') @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name')}} | About us</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('common.meta')
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
        <div class="box-layout">
            <div class="wrapper white-bg">
                <!--Header start-->
                @include('common.header')
                <div class="breadcrumbs text-center" style="background-image: url('{{ asset('storage/' . $page->background_image) }}')">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-xs-12 col-sm-12">
                                <div class="breadcrumbs-title">
                                    <h2>{{ $page?->title }}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--Breadcrumbs end-->
                
                <!--About us start-->
                <div class="about-us ptb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                <div class="about-desc">
                                    <h2>About {{ config('app.name') }}</h2>
                                    {!! $aboutUs?->content !!}
                                </div>
                            </div>
                            <div class="col-lg-6 col-sm-12 col-xs-12">
                                {{-- <div class="about-us-img">
                                    <img src="{{ Storage::url($aboutUs?->image)}}" alt="">
                                </div> --}}
                                <div class="row">
                                    <div class="col-md-12 col-xs-12">
                                        <div class="section-title text-center">
                                            <h2>Our Vision</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        {!! $vision?->statement !!}
                                    </div>

                                    <div class="col-md-12 col-xs-12 mt-1">
                                        <div class="section-title text-center">
                                            <h2>Our Mission</h2>
                                        </div>
                                    </div>
                                    <div class="col-md-12 col-xs-12">
                                        {!! $mission?->statement !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--About us end-->
                <!--our core values start-->
                    <div class="choose-us ptb-100 grey-bg">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-8 offset-md-2">
                                    <div class="section-title bg_grey text-center">
                                        <h2>Our Core Values</h2>
                                        <p>At Ziva Flourish Center, our core values are the foundation of everything we do. They guide our actions, shape our culture, and define our commitment to serving you with excellence.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                        @foreach ($coreValues as $item)
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
                <!--our core values  end-->
                <!--our team start-->
                <div class="our-team ptb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="section-title text-center">
                                    <h2>Meet Our lovely team</h2>
                                    <p>At Ziva Flourish Center, our team is more than just instructors and counselors—we’re family. Each member has been carefully chosen not only for their expertise but for their heart to serve, heal, and inspire through Christ’s love.</p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-n-30px">
                            @foreach ($teamMembers as $item)
                                <div class="col-md-6 col-lg-3 col-xs-12 mb-30px">
                                    <div class="single-team">
                                        <div class="team-img">
                                            <img src="{{ Storage::url($item?->photo)}}" alt="">
                                        </div>
                                        <div class="team-hover">
                                            <div class="team-desc">
                                                <div class="team-desc-tablcell">
                                                    <h5>{{ $item?->name }}</h5>
                                                    <h6>{{ $item?->role }}</h6>
                                                    <p> {{ $item?->bio }} </p>
                                                    <div class="member-follow">
                                                        <p>Follow on:</p>
                                                        <div class="member-follow-social">
                                                            <a href="{{ $item?->facebook }}"><i class="zmdi zmdi-facebook"></i></a>
                                                            <a href="{{ $item?->twitter }}"><i class="zmdi zmdi-twitter"></i></a>
                                                            <a href="{{ $item?->linkedin }}"><i class="zmdi zmdi-linkedin"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <!--our team end-->
                
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