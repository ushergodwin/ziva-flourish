<!doctype html>
<html class="" lang="en">
@php $page = page_settings('blog') @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }} | Blog</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    @include('common.meta')
    <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: "Libre Franklin", sans-serif;
        }
        <style>
    /* Base font for entire page */
    body {
        font-family: "Libre Franklin", sans-serif !important;
    }
    
    /* Nuclear option for all text elements */
    body *:not(i):not(.fa):not(.fas):not(.far):not(.fab):not(.glyphicon) {
        font-family: "Libre Franklin", sans-serif !important;
    }
    
    /* Specific targeting for blog content areas */
    .article-text,
    .article-text *,
    .article-desc,
    .article-desc *,
    .blog-comment-box,
    .blog-comment-box *,
    .articles-details,
    .articles-details * {
        font-family: "Libre Franklin", sans-serif !important;
    }
    
    /* Override for rich text editor content */
    .article-text p,
    .article-text h1,
    .article-text h2,
    .article-text h3,
    .article-text h4,
    .article-text h5,
    .article-text h6,
    .article-text li,
    .article-text a,
    .article-text span,
    .article-text div,
    .article-text blockquote,
    .article-text pre,
    .article-text strong,
    .article-text em {
        font-family: "Libre Franklin", sans-serif !important;
    }
    
    /* Force font on elements with inline styles */
    [style*="font-family"] {
        font-family: "Libre Franklin", sans-serif !important;
    }
    
    /* Fix for SVG icons if needed */
    .zmdi, .fa {
        font-family: 'Material-Design-Iconic-Font' !important;
    }
</style>
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
            <!--header section end-->
            <!--header section end-->
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
            <!--Breadcrumbs end-->
            <!--our gallery section start-->
            <div class="our-blog blog-pages ptb-30 fix">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 offset-md-2">
                            <div class="section-title text-center">
                                <h2>Our blog</h2>
                                <p>Take the first step toward nourishment, healing and transformation. Whether you are looking to sharpen your culinary skills, receive Christ-centered counselling, explore personal or business growth, we are here to tale the journey with you.</p>
                            </div>
                        </div>
                    </div>
                    <!-- Blog List -->
                    @if ($blogPosts->isEmpty())
                        <div class="text-center">
                            <h3>No blog posts available at the moment.</h3>
                            <p>Check back later for updates.</p>
                            <a href="/" class="btn btn-primary">Go to Home</a>
                        </div>
                        
                    @else
                        <div class="row blog-list">
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
                                                        <li> <a href="/blog/{{ $item?->slug}}"><i class="zmdi zmdi-favorite-outline"></i>({{ $item?->stats->likes }})</a></li>
                                                        <li><a href="/blog/{{ $item?->slug}}"><i class="zmdi zmdi-comments"></i>({{ $item?->stats->comments }})</a></li>
                                                        <li><a href="/blog/{{ $item?->slug}}"><i class="zmdi zmdi-eye"></i>({{ $item?->stats->views }})</a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                        </div>
                    @endif

                </div>
                <!-- Pagination -->
                @if ($blogPosts->isNotEmpty())
                    <div class="pagination-box text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="pagination-inner">
                                        <ul>
                                            {{-- Previous Page Link --}}
                                            @if ($blogPosts->onFirstPage())
                                                <li class="disabled"><span><i class="zmdi zmdi-caret-left"></i></span></li>
                                            @else
                                                <li><a href="{{ $blogPosts->previousPageUrl() }}"><i class="zmdi zmdi-caret-left"></i></a></li>
                                            @endif

                                            {{-- Pagination Elements --}}
                                            @for ($i = 1; $i <= $blogPosts->lastPage(); $i++)
                                                @if ($i == $blogPosts->currentPage())
                                                    <li class="active"><span>{{ $i }}</span></li>
                                                @else
                                                    <li><a href="{{ $blogPosts->url($i) }}">{{ $i }}</a></li>
                                                @endif
                                            @endfor

                                            {{-- Next Page Link --}}
                                            @if ($blogPosts->hasMorePages())
                                                <li><a href="{{ $blogPosts->nextPageUrl() }}"><i class="zmdi zmdi-caret-right"></i></a></li>
                                            @else
                                                <li class="disabled"><span><i class="zmdi zmdi-caret-right"></i></span></li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            <!--our gallery section end-->
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