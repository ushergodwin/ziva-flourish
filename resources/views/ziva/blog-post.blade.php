<!doctype html>
<html class="" lang="en">
@php $page = page_settings('blog') @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name') }} | {{ $blog->title }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    @include('common.meta')
    <meta name="description" content="{{ $blog->title}}">
        @section('meta')
        <meta name="title" content="{{ $blog->title }}">
        <meta name="description" content="{{ Str::limit(strip_tags($blog->content), 160) }}">
        <meta name="author" content="{{ $blog->author_name ?? 'Ziva Flourish Centre' }}">
        <meta name="keywords" content="Ziva Flourish, Blog, {{ $blog->title }}, Culinary, Wellness, {{ $blog->category->name ?? 'Blog' }}">

        <!-- Open Graph -->
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $blog->title }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($blog->content), 160) }}">
        <meta property="og:image" content="{{ asset('storage/' . $blog->thumbnail) }}">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $blog->title }}">
        <meta name="twitter:description" content="{{ Str::limit(strip_tags($blog->content), 160) }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $blog->thumbnail) }}">
        
    @endsection

</head>

<body>
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
                <div class="our-blog-details ptb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-9 col-sm-12 col-xs-12">
                                <div class="blog-left-sidebar">
                                    <article class="articles-details">
                                        <div class="article-thumbnail">
                                            <img src="{{ Storage::url($blog?->thumbnail)}}" alt="thumbnail image">
                                            <div class="blog-bottom-action">
                                                <div class="blog-publish">
                                                    <p><i class="zmdi zmdi-time"></i>{{ \Carbon\Carbon::parse($blog?->published_at)->format('M d, Y') }} </p>
                                                </div>
                                                <div class="blog-action-box">
                                                    <ul>
                                                        <li><a href="javascript:void(0)" id="like-blog-post" data-blog-post-id="{{ $blog?->id}}" data-blog-like-count="{{ $blog?->stats->likes }}">
                                                            <i class="zmdi zmdi-favorite-outline"></i>(<span id="blog-like-count">{{ $blog?->stats->likes }}</span>)
                                                        </a></li>
                                                        <li><a href="#leave-comment"><i class="zmdi zmdi-comments"></i>({{ $blog?->stats->comments }})</a></li>
                                                        <li><a href="#"><i class="zmdi zmdi-eye"></i>({{ $blog?->stats->views }})</a></li>
                                                    </ul>
                                                </div>
                                            </div> 
                                        </div>
                                        <div class="article-desc">
                                            <div class="article-title">
                                                <h3>{{ $blog?->title }}</h3>
                                            </div>
                                            <div class="article-text">
                                            <!-- Author -->
                                            <div class="article-author">
                                                <p>By <a href="javascript:void(0)">{{ $blog?->author_name }}</a></p>
                                            </div>
                                            <div class="article-text">
                                            {!! $blog?->content !!}
                                            </div>
                                        </div>
                                        <div class="blog-comment-box">
                                            <div class="comment-title">
                                                <h3>({{ $blog?->stats->comments}}) comments</h3>
                                            </div>
                                            @if ($blog?->comments->count() > 0)
                                                @foreach ($blog?->comments as $comment)
                                                    <div class="comment-box-inner fix">
                                                        <div class="blog-comment fix">
                                                            <div class="blog-comment-img">
                                                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0 0 12 15.75a7.488 7.488 0 0 0-5.982 2.975m11.963 0a9 9 0 1 0-11.963 0m11.963 0A8.966 8.966 0 0 1 12 21a8.966 8.966 0 0 1-5.982-2.275M15 9.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z" />
                                                                </svg>

                                                            </div>
                                                            <div class="blog-comment-desc">
                                                                <div class="comment-top-box">
                                                                    <div class="comment-title-box">
                                                                        <h5>{{ $comment?->name }}</h5>
                                                                        <p>{{ \Carbon\Carbon::parse($comment?->created_at)->diffForHumans() }}</p>
                                                                    </div>
                                                                    <div class="comment-action-box">
                                                                        <a href="#leave-comment" onclick="replyComment('{{$comment?->name}}')"><i class="fa fa-share" ></i></a>
                                                                    </div>
                                                                </div>
                                                                <div class="comment-bottom-box">
                                                                    <p>{{ $comment?->comment }}</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endforeach
                                                
                                            @else
                                                <span class="alert alert-info">No comments yet.</span>
                                            @endif
                                            <!--blog comment form start-->
                                            <div class="blog-comment-form" id="leave-comment">
                                                <div class="comment-title">
                                                    <h3>leave a comment</h3>
                                                </div>
                                                <form action="#" id="blog-comment-form">
                                                    @csrf
                                                    <input name="blog_post_id" type="hidden" value="{{ $blog?->id }}">
                                                    <div class="comment-input fix">
                                                        <div class="input-field">
                                                            <input type="text" placeholder="Name" name="name">
                                                        </div>
                                                        <div class="input-field">
                                                            <input type="text" placeholder="E-mail" name="email">
                                                        </div>
                                                    </div>
                                                    <div class="textarea">
                                                        <textarea placeholder="Comment" name="comment"></textarea>
                                                    </div>
                                                    <div class="submit">
                                                        <button type="submit">Submit</button>
                                                    </div>
                                                </form>
                                            </div>
                                            <!--blog comment form end-->
                                        </div>
                                    </article>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-12 col-xs-12">
                                <div class="blog-right sidebar">
                                    <aside class="widget mb-30">
                                        <div class="widget-search">
                                            <form action="/blog" method="GET">
                                                <input type="text" name="q" placeholder="Search here...." autocomplete="off">
                                                <button type="submit"><i class="zmdi zmdi-search"></i></button>
                                            </form>
                                        </div>    
                                    </aside>
                                    <aside class="widget categories grey-bg mb-30">
                                        <div class="widget-title">
                                            <h3>categories</h3>
                                        </div>
                                        <div class="widget-categories"> 
                                            <!--Accordion item 1--> 
                                            @foreach ($blogCategoryCounts as $item)
                                                <h6>{{ $item?->name }} </h6>
                                            @endforeach
                                        </div>
                                    </aside>
                                    <aside class="widget mb-30 grey-bg">
                                        <div class="widget-title">
                                            <h3>recent post</h3>
                                        </div>
                                        <div class="recent-post">
                                            @foreach ($recentPosts as $item)
                                                <div class="single-recent-post mb-15">
                                                    <div class="recent-post-thumbnail">
                                                        <img src="{{ Storage::url($item?->thumbnail)}}" alt="">
                                                    </div>
                                                    
                                                        <div class="post-detail">
                                                            <div class="post-title">
                                                                <h5><a href="/blog/{{$item?->slug}}">{{ $item?->title }}</a></h5>
                                                            </div>
                                                            <div class="post-publish">
                                                                <p class="post-date">
                                                                    On {{ \Carbon\Carbon::parse($blog?->published_at)->format('d, M Y') }}
                                                                </p>
                                                            </div>
                                                        </div>
                                                </div>
                                            @endforeach
                                        </div>    
                                    </aside>
    
                                    <aside class="widget newsletter grey-bg">
                                        <div class="widget-title">
                                            <h3>Subscribe</h3>
                                        </div>
                                        <div class="widget-newsletter">
                                            <p>Subscribe to our newsletter and stay updated with the latest news, offers, and events. </p>
                                            <form action="" method="POST" id="subscribe-to-newsletters-from-blog-details">
                                                @csrf
                                                <input class="mb-1" type="text" name="name" placeholder="Enter your name" autocomplete="off">
                                                <input class="mb-1" type="email" name="email" autocomplete="off" placeholder="Enter your email address" required>
                                                <button type="submit">Send</button>
                                            </form>
                                        </div>
                                    </aside>
                                </div>
                            </div>
                        </div>
                    </div>
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