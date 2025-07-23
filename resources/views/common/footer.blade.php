            <div class="footer">
                <div class="custom-footer ptb-100">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <div class="single-footer contact">
                                    <div class="footer-title">
                                        <h3>Contact us</h3>
                                    </div>
                                    <p>
                                        <span style="font-size: 20px"><i class="zmdi zmdi-pin"></i></span>
                                        {{ $company?->address }}
                                    </p>
                               
                                    <p> 
                                        <span style="font-size: 20px"><i class="zmdi zmdi-email"></i></span>
                                        {{ $company?->email }}
                                    </p>
                                  
                                    <p>
                                        <span style="font-size: 20px"><i class="zmdi zmdi-phone"></i></span> 
                                        {{ $company?->phone_1 }}
                                        <br>
                                        <span style="font-size: 20px"><i class="zmdi zmdi-phone"></i></span>
                                        {{ $company?->phone_2 }}
                                    </p>
                                  
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6 col-xs-12">
                                <div class="single-footer quick-links">
                                   <div class="footer-title">
                                        <h3>Quick links</h3>
                                    </div>
                                    <ul>
                                        <li><a href="/" @class(['active-page' => isActivePage('home')])>Home</a></li>
                                        <li><a href="/about-us" @class(['active-page' => isActivePage('about')])>About Us</a></li>
                                        <li><a href="/services" @class(['active-page' => isActivePage('services')])>Services</a></li>
                                        <li><a href="/blog"  @class(['active-page' => isActivePage('blog') || isActivePage('blog.post')])>Blog</a></li>
                                        <li><a href="/contact-us" @class(['active-page' => isActivePage('contact')])>Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-xs-12">
                                <div class="single-footer open-hours">
                                    <div class="footer-title">
                                        <h3>Open hours</h3>
                                    </div>
                                    <ul>
                                         @foreach ($openingHours as $item)
                                            <li>
                                                <div class="row">
                                                    <div class="col-md-6 col-xs-6">
                                                        <span>{{ $item->day }}</span>
                                                    </div>
                                                    <div class="col-md-6 col-xs-6">
                                                        @if($item?->is_closed)<span class="close">Closed</span>
                                                        @else
                                                        <span>{{ $item?->opens_at }} - {{ $item?->closes_at }}</span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </li> 
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                                                
                            <div class="col-lg-3 col-md-6 col-xs-12">
                                <div class="single-footer widget">
                                    <div class="footer-title">
                                        <h3>Subscribe</h3>
                                    </div>
                                    <div class="subscribe-form">
                                        <form action="" method="POST" id="subscribe-to-newsletters">
                                            @csrf
                                            <input class="mb-1" type="text" name="name" placeholder="Enter your name" autocomplete="off">
                                            <input class="mb-1" type="email" name="email" autocomplete="off" placeholder="Enter your email address" required>
                                            <button class="mt-1" type="submit">Submit</button>
                                        </form>
                                        <p>Subscribe to our newsletter and stay updated with the latest news, offers, and events.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="footer-bottom text-center">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12 col-sm-12 col-xs-12">
                                <div class="copyright">
                                    <p>
                                        Copyright© {{ config('app.name')}} {{ date('Y')}}.All right reserved. Created by
                                        <a href="https://cinemaug.com">Cinema UG</a>
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
