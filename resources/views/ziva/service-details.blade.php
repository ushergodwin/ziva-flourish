<!doctype html>
<html class="" lang="en">
    @php $page = page_settings('services') @endphp
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{ config('app.name')}} | {{ $service?->name }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('common.meta')
    @section('meta')
        <meta name="title" content="{{ $service->title }}">
        <meta name="description" content="{{ Str::limit(strip_tags($service->description), 160) }}">
        <meta name="author" content="{{ 'Ziva Flourish Centre' }}">
        <meta name="keywords" content="Ziva Flourish Centre Services, {{ $service->name }}">

        <!-- Open Graph -->
        <meta property="og:type" content="article">
        <meta property="og:url" content="{{ url()->current() }}">
        <meta property="og:title" content="{{ $service->name }}">
        <meta property="og:description" content="{{ Str::limit(strip_tags($service->description), 160) }}">
        <meta property="og:image" content="{{ asset('storage/' . $service->thumbnail) }}">

        <!-- Twitter -->
        <meta name="twitter:card" content="summary_large_image">
        <meta name="twitter:title" content="{{ $service->name }}">
        <meta name="twitter:description" content="{{ Str::limit(strip_tags($service->description), 160) }}">
        <meta name="twitter:image" content="{{ asset('storage/' . $service->image) }}">
    @endsection
</head>

<body>
    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  
    <div class="box-layout">
        <div class="wrapper white-bg">
            <!--Header start-->
            @include('common.header')
            
            <!-- Breadcrumbs Section -->
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
            
            <!-- Service Details Section -->
            <section class="service-details pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <!-- Main Content -->
                        <div class="col-md-8 col-sm-12">
                            <div class="service-details-content">
                                <div class="service-img">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="img-responsive">
                                </div>
                                <h3>{{ $service->name }}</h3>
                                <p>{!! $service->short_description !!}</p>
                                <p>{!! $service->full_description !!}</p>
                                <p>{!! $service->price_note !!}</p>
                            </div>
                        </div>
                        
                        <!-- Sidebar -->
                        <div class="col-md-4 col-sm-12">
                            <div class="sidebar-widget">
                                <!-- Service Categories -->
                                <div class="widget categories">
                                    <h4>Our Services</h4>
                                    <ul>
                                        @foreach($relatedServices as $related)
                                        <li>
                                            <a href="{{ route('services.show', $related->slug) }}">{{ $related->name }}</a>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                                
                                <!-- Booking Form -->
                                <div class="widget booking-form mt-30">
                                    <h4>Book This Service</h4>
                                    <form  method="POST" id="book-service-form" onsubmit="bookServiceFromDetails('{{ $service->name }}', '{{ $company->whatsapp }}')">
                                        @csrf
                                        <input type="hidden" name="service_id" value="{{ $service->id }}">
                                        <style>
                                                .form-label {
                                                    text-align: left !important;
                                                    display: block;
                                                }
                                            </style>
                                            <hr/>
                                            <div class="text-muted mb-1">
                                                Please fill in the details below to book the service.
                                            </div>
                                            <div class="mb-1">
                                                <label for="swal-name" class="form-label">Full Name</label>
                                                <input type="text" id="swal-name" class="form-control mb-2" name="name" placeholder="Full Name" autocomplete="off" required>
                                            </div>
                                            <div class="mb-1">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="swal-phone" class="form-label">Phone Number</label>
                                                        <input type="tel" id="swal-phone" name="phone" class="form-control mb-2" placeholder="Active phone number" autocomplete="off" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="swal-email" class="form-label">Email</label>
                                                        <input type="email" id="swal-email" name="email" class="form-control mb-2" placeholder="Active email address" autocomplete="off" required>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="mb-1">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <label for="swal-date" class="form-label">Preferred Date</label>
                                                        <input type="date" id="swal-date" name="preferred_date" class="form-control mb-2" placeholder="Preferred Date" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="swal-time" class="form-label">Preferred Time</label>
                                                        <input type="time" id="swal-time" name="preferred_time" class="form-control mb-2" placeholder="Preferred Time">
                                                    </div>
                                                <div>
                                            </div>
                                            <!-- Number of people -->
                                            <div class="mb-1">
                                                <label for="swal-number-of-people" class="form-label">Number of People</label>
                                                <input type="number" id="swal-number-of-people" name="number_of_people" class="form-control mb-2" placeholder="Number of People" min="1" value="1">
                                            </div>
                                            <!-- Message -->
                                            <div class="mb-1">
                                                <label for="swal-message" class="form-label">Additional Message</label>
                                                <textarea id="swal-message" class="form-control mb-2" name="message" placeholder="Any additional message or request"></textarea>
                                            </div>
                                            <div class="book-now">
                                                <button style="submit" class="btn btn-success rounded">Book Now</button>
                                            </div>
                                        </form>
                                    </div>
                                
                                <!-- Download Brochure -->
                                @if($service->brochure)
                                <div class="widget download-brochure mt-30">
                                    <a href="{{ asset('storage/' . $service->brochure) }}" class="btn btn-secondary btn-block" download>
                                        <i class="fa fa-download"></i> Download Brochure
                                    </a>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            
            <!-- Related Services Section -->
            @if($relatedServices->count() > 0)
            <section class="related-services pt-50 pb-70 gray-bg">
                <div class="container">
                    <div class="section-title text-center">
                        <h2>You May Also Like</h2>
                        <p>Explore other services that might interest you</p>
                    </div>
                    <div class="row">
                        @foreach($relatedServices as $service)
                        <div class="col-md-4 col-sm-6">
                            <div class="service-item">
                                <div class="service-img">
                                    <img src="{{ asset('storage/' . $service->image) }}" alt="{{ $service->name }}" class="img-responsive">
                                </div>
                                <div class="service-content">
                                    <h3><a href="{{ route('services.show', $service->slug) }}">{{ $service->name }}</a></h3>
                                    <p>{{ Str::limit(strip_tags($service->description), 100) }}</p>
                                    <a href="{{ route('services.show', $service->slug) }}" class="read-more">Learn More</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </section>
            @endif
            
            <!-- Call to Action Section -->
            <section class="cta-section pt-50 pb-50" style="background-image: url('{{ asset('images/cta-bg.jpg') }}')">
                <div class="container">
                    <div class="row">
                        <div class="col-md-8 col-sm-12">
                            <h3>Ready to Begin Your Journey?</h3>
                            <p>Contact us today to learn more about this service or to schedule your first session.</p>
                        </div>
                        <div class="col-md-4 col-sm-12 text-right">
                            <a href="{{ route('contact') }}" class="btn btn-primary">Contact Us</a>
                            <a href="{{ route('services') }}" class="btn btn-secondary">Book Now</a>
                        </div>
                    </div>
                </div>
            </section>
            
            <!--footer start-->
            @include('common.footer')
            <!--footer end-->
        </div>
    </div>
    
    @include('common.scripts')
    
    <!-- Initialize Testimonial Carousel -->
    <script>
        $(document).ready(function(){
            $('.testimonial-carousel').owlCarousel({
                loop: true,
                margin: 30,
                nav: false,
                dots: true,
                responsive: {
                    0: { items: 1 },
                    600: { items: 1 },
                    1000: { items: 1 }
                }
            });
        });
    </script>
</body>
</html>