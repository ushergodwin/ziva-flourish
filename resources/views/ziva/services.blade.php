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
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="pricing-plan ptb-30">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-8 offset-md-2">
                                <div class="section-title text-center">
                                    <h2>Explore Our Services</h2>
                                </div>
                                <div class="section-title text-center">
                                    <p> Our carefully curated blend of services are designed to nature the body, renew the mind and restore the spirit. <br/>They include: </p>
                                </div>
                            </div>
                        </div>
                        <div class="row mb-n-30px">
                            @foreach ($services as $item)
                                <div class="col-lg-4 col-md-6 col-sm-12 mb-30px service-hover-effect h-100">
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
                                                {{ $item->book_button_text }}
                                            </a>
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