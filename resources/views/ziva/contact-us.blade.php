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
    <style>
        /* =============================================
   Contact Page Custom Styles
   ============================================= */

/* Breadcrumbs Section */
.breadcrumbs {
    position: relative;
    padding: 100px 0;
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    color: #fff;
    text-align: center;
}

.breadcrumbs-title {
    position: relative;
    z-index: 2;
}

.breadcrumbs-title h1 {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
    color: #fff;
    text-shadow: 1px 1px 3px rgba(0,0,0,0.3);
}

/* Main Contact Content */
.main-contact-content {
    padding: 80px 0;
}

/* Contact Info Cards */
.contact-info-section {
    margin-bottom: 60px;
}

.single-contact {
    background: #f9f9f9;
    padding: 30px 20px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
    height: 100%;
    transition: all 0.3s ease;
}

.single-contact:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.1);
}

.contact-icon {
    font-size: 2.5rem;
    color: #556c4c; /* Or your theme color */
    margin-bottom: 20px;
}

.contact-desc h4 {
    font-size: 1.25rem;
    margin-bottom: 15px;
    color: #333;
}

.contact-desc p {
    color: #666;
    margin-bottom: 0;
    line-height: 1.6;
}

/* Contact Form Section */
.contact-form-section {
    margin-top: 50px;
}

.contact-form-wrapper {
    background: #fff;
    padding: 40px;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
}

.form-intro {
    color: #666;
    font-size: 1rem;
    margin-bottom: 25px;
    text-align: center;
}

#contact-form .form-control {
    height: 50px;
    border: 1px solid #eee;
    border-radius: 4px;
    padding: 10px 15px;
    margin-bottom: 20px;
    transition: all 0.3s;
}

#contact-form .form-control:focus {
    border-color: #556c4c; /* Or your theme color */
    box-shadow: none;
}

#contact-form textarea.form-control {
    height: auto;
    min-height: 150px;
}

#contact-form button[type="submit"] {
    background: #2a3b2c; /* Or your theme color */
    color: #fff;
    border: none;
    padding: 12px 30px;
    font-size: 1rem;
    font-weight: 600;
    border-radius: 4px;
    cursor: pointer;
    transition: all 0.3s;
    width: 100%;
    max-width: 200px;
}

#contact-form button[type="submit"]:hover {
    background: #2a3b2c; /* Darker shade of theme color */
    transform: translateY(-2px);
}

/* Map Section */
.map-section {
    margin-top: 80px;
}

.map-container {
    width: 100%;
    overflow: hidden;
    border-radius: 8px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Responsive Adjustments */
@media (max-width: 767px) {
    .breadcrumbs {
        padding: 60px 0;
    }
    
    .breadcrumbs-title h1 {
        font-size: 1.8rem;
    }
    
    .main-contact-content {
        padding: 50px 0;
    }
    
    .single-contact {
        margin-bottom: 30px;
    }
    
    .contact-form-wrapper {
        padding: 25px;
    }
    
    #contact-form button[type="submit"] {
        max-width: 100%;
    }
}

@media (max-width: 575px) {
    .contact-form-wrapper {
        padding: 20px 15px;
    }
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
            <!-- Header Section -->
            @include('common.header')
            
            <!-- Breadcrumbs Section -->
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
            
            <!-- Main Contact Content -->
            <div class="main-contact-content ptb-30">
                <div class="container">
                    <div class="section-title text-center mb-3">
                        <h2>Get in Touch</h2>
                        <p class="lead">We'd Love to Hear from You</p>
                        <p class="text-muted">
                            Whether you have questions, need guidance, or simply want to share your heart, our team is here to listen and help. 
                            Private inquiries, prayer requests, and service details are all welcome. We treat every message with care and confidentiality.
                        </p>
                    </div>
                    <!-- Contact Info Cards -->
                    <div class="contact-info-section">
                        <div class="row">
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="single-contact text-center">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-phone"></i>
                                    </div>
                                    <div class="contact-desc">
                                        <h4>Call Us</h4>
                                        <p>
                                            {{ $company?->phone_1 }}
                                            @if ($company?->phone_2)
                                                <br>{{ $company?->phone_2 }}
                                            @endif
                                            @if ($company?->phone_3)
                                                <br>{{ $company?->phone_3 }}
                                            @endif
                                            @if ($company?->phone_4)
                                                <br>{{ $company?->phone_4 }}
                                            @endif
                                        </p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="single-contact text-center">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-email"></i>
                                    </div>
                                    <div class="contact-desc">
                                        <h4>Email Us</h4>
                                        <p>{{ $company?->email }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4 col-sm-6 mb-4">
                                <div class="single-contact text-center">
                                    <div class="contact-icon">
                                        <i class="zmdi zmdi-pin"></i>
                                    </div>
                                    <div class="contact-desc">
                                        <h4>Visit Us</h4>
                                        <p>{{ $company?->address }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Contact Form Section -->
                    <div class="contact-form-section mt-5">
                        <div class="row justify-content-center">
                            <div class="col-lg-8">
                                <div class="contact-form-wrapper">
                                    <div class="form-intro mb-4">
                                        <p>Fill out the form below, and we'll respond as swiftly as a freshly baked loaf cools! (Usually within 24 hours.)</p>
                                    </div>
                                    
                                    <form id="contact-form" action="" method="post">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6 mb-3">
                                                <input name="name" class="form-control" type="text" placeholder="Name" required>
                                            </div>
                                            <div class="col-md-6 mb-3">
                                                <input name="phone" class="form-control" type="text" placeholder="Phone" required>
                                            </div>
                                        </div>
                                        <div class="mb-3">
                                            <input class="form-control" name="email" type="email" placeholder="Email" required>
                                        </div>
                                        <div class="mb-3">
                                            <textarea name="message" class="form-control" placeholder="Message" rows="5" required></textarea>
                                        </div>
                                        <div class="text-center mb-3">
                                            <button type="submit">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Map Section -->
            <div class="map-section">
                <div class="container-fluid p-0">
                    <div class="map-container">
                        <iframe id="gmap_canvas" style="width:100%;height:500px;" 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3989.699293619604!2d32.60462951091904!3d0.4425724638175614!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x177db1b3bb2d5aa3%3A0x3607feb0c8c8bbae!2sEunie&#39;s%20Kitchen!5e0!3m2!1sen!2sug!4v1752233487445!5m2!1sen!2sug" 
                                style="border:0;" allowfullscreen="" loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
            </div>
            
            <!-- Footer Section -->
            @include('common.footer')
        </div>
    </div>

    <!-- All js plugins included in this file. -->
    @include('common.scripts')
</body>
</html>