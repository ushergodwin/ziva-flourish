<!doctype html>
<html class="" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name')}} | 404</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Place favicon.ico in the root directory -->
    @include('common.meta')
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    
    <div class="wrapper white-bg">
        <!--header section start-->
        <!--header section start-->
        @include('common.header')
        <!--header section end-->
        <!--Breadcrumbs start-->
        <div class="breadcrumbs text-center">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-xs-12 col-sm-12">
                        <div class="breadcrumbs-title">
                            <h2>404</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--Breadcrumbs end-->
        
        <div class="error-area text-center ptb-100">
           <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="error-content ">
                            <h2>404</h2>
                            <h3>Page not found!</h3>
                            <h4>Oops! Looks like something going wrong</h4>
                            <p>We can’t seem to find the page you’re looking for <br>
                                make sure that you have typed the correct URL</p>
                            <a class="go-home" href="/">Go to home</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!--footer start-->
        
        @include('common.footer')
        <!--footer end-->
       
    </div>
    
    <!--=================================
     style-customizer start  -->

    <!-- style-customizer End -->

    <!-- Placed js at the end of the document so the pages load faster -->

    <!-- All js plugins included in this file. -->
    @include('common.scripts')

</body>

</html>