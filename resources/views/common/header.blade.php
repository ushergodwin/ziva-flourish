            <div class="header">
                <div class="header-top">
                    <div class="container">
                        <div class="row mobile-items-center">
                            <div class="col-md-6 col-sm-6 hidden-xs">
                                <div class="header-left">
                                    <div class="call-center">
                                        <p><i class="zmdi zmdi-phone"></i> {{ $company?->phone_1 }}</p>
                                    </div>
                                    <div class="mail-address">
                                        <p><i class="zmdi zmdi-email"></i>{{ $company?->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12">
                                <div class="social-icons">
                                    <a href="{{ $company?->youtube }}"><i class="zmdi zmdi-youtube"></i></a>
                                    <a href="{{ $company?->twitter }}"><i class="zmdi zmdi-twitter"></i></a>
                                    <a href="{{ $company?->instagram }}"><i class="zmdi zmdi-instagram"></i></a>
                                    <a href="javascript:void(0)" onclick="openWhatsApp('{{$company?->whatsapp}}')"><i class="zmdi zmdi-whatsapp"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="header-bottom sticky-header custom-header">
                    <div class="container">
                        <div class="mgea-full-width">
                            <div class="row">
                                <div class="col-lg-2 col-md-6 col-sm-9 xs-3">
                                    <a href="/"><img src="/images/logo/ziva-logo.png" alt=""></a>
                                </div>
                                <div class="col-lg-8 d-none d-lg-block">
                                    <div class="menu">
                                        <nav>
                                            <ul>
                                                <li><a href="/" @class(['active-page' => isActivePage('home')])>Home</a></li>
                                                <li><a href="/about-us" @class(['active-page' => isActivePage('about')])>About Us</a></li>
                                                <li><a href="/services" @class(['active-page' => isActivePage('services') || isActivePage('services.show')])>Services</a></li>
                                                <li><a href="/blog"  @class(['active-page' => isActivePage('blog') || isActivePage('blog.post')])>Blog</a></li>
                                                <li><a href="/contact-us" @class(['active-page' => isActivePage('contact')])>Contact Us</a></li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                                <div class="col-lg-2 col-md-6 col-sm-3 xs-9">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile menu start -->
                    <div class="mobile-menu-area d-lg-none">
                        <div class="container">
                            <div class="col-md-12">
                                <nav id="mobile-dropdown">
                                      <ul>
                                        <li><a href="/" @class(['active-page' => isActivePage('home')])>Home</a></li>
                                        <li><a href="/about-us" @class(['active-page' => isActivePage('about')])>About Us</a></li>
                                        <li><a href="/services" @class(['active-page' => isActivePage('services') || isActivePage('services.show')])>Services</a></li>
                                        <li><a href="/blog"  @class(['active-page' => isActivePage('blog') || isActivePage('blog.post')])>Blog</a></li>
                                        <li><a href="/contact-us" @class(['active-page' => isActivePage('contact')])>Contact Us</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                    <!-- Mobile menu end -->
                </div>
             </div>