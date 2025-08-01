<!doctype html>
<html class="" lang="en">
@php $page = page_settings('services') @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name')}} | Services</title>
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
            <div class="pricing-plan ptb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="section-title text-center">
                                    <p> Take the first step toward nourishment, healing and transformation. Whether you are looking to sharpen your culinary skills, receive Christ-centered counselling, explore personal or business growth, we are here to tale the journey with you. </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-n-30px">
                            @foreach ($services as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-30px">
                                    <img src="{{ asset('storage/'.$item?->image)}}" alt="{{ $item?->name }}" class="img-fluid">
                                    <div class="pricing-table text-center">
                                        <div class="pricing-title">
                                            <h3>{{ $item?->name }}</h3>
                                        </div>
                                        <div class="pricing-desc">
                                            <h2>{{ number_format($item?->price)}}<span class="date">ugx</span></h2>
                                            <ul>
                                                <li>{{ $item?->price_note }}</li>
                                            </ul>
                                            <div class="book-now">
                                                <a href="javascript:void(0)" onclick="bookService('{{ $item->name }}', '{{ $company->whatsapp }}', '{{ $item->id}}')" >Book now</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
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