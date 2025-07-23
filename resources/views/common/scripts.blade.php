
    <div class="style-customizer closed" style="display: none">

      <div class="buy-button">
            <a href="#" class="customizer-logo"><img src="/images/logo/logo.png" alt="Theme Logo"></a>
            <a class="opener" href="#"><i class="fa fa-cog fa-spin"></i></a>
            <div class="buy-now">
                <a class="button button-border" href="#">Buy now!</a> 
            </div>
        </div>
      <div class="clearfix content-chooser">
        <h3>Layout Options</h3>
        <p>Which layout option you want to use?</p>
        <ul class="layoutstyle clearfix">
          <li class="wide-layout selected" data-style="wide" title="wide"> Wide </li>
          <li class="boxed-layout" data-style="boxed" title="boxed"> Boxed </li>
        </ul>
        <h3>Color Schemes</h3>
        <p>Which theme color you want to use? Select from here.</p>
        <ul class="styleChange clearfix">
          <li class="skin-default selected" title="skin-default" data-style="skin-default" ></li>
          <li class="color-1" title="color-1" data-style="color-1"></li>
          <li class="color-2" title="color-2" data-style="color-2"></li>
          <li class="color-3" title="color-3" data-style="color-3"></li>
          <li class="color-4" title="color-4" data-style="color-4"></li>
          <li class="color-5" title="color-5" data-style="color-5"></li>
          <li class="color-6" title="color-6" data-style="color-6"></li>
          <li class="color-7" title="color-7" data-style="color-7"></li>
          <li class="color-8" title="color-8" data-style="color-8"></li>
          <li class="color-9" title="color-9" data-style="color-9"></li>
          <li class="color-10" title="color-10" data-style="color-10"></li>
          <li class="color-11" title="color-11" data-style="color-11"></li>
        </ul>
        
        <h3>Background Patterns</h3>
        <p>Which background pattern you want to use?</p>
        <ul class="patternChange clearfix">
          <li class="pattern-0" data-style="pattern-0" title="white background"></li>
          <li class="pattern-1" data-style="pattern-1" title="pattern-1"></li>
          <li class="pattern-2" data-style="pattern-2" title="pattern-2"></li>
          <li class="pattern-3" data-style="pattern-3" title="pattern-3"></li>
          <li class="pattern-4" data-style="pattern-4" title="pattern-4"></li>
          <li class="pattern-5" data-style="pattern-5" title="pattern-5"></li>
          <li class="pattern-6" data-style="pattern-6" title="pattern-6"></li>
          <li class="pattern-7" data-style="pattern-7" title="pattern-7"></li>
        </ul>
        <h3>Background Images</h3>
        <p>Which background image you want to use?</p>
        <ul class="patternChange main-bg-change clearfix">
          <li class="main-bg-1" data-style="main-bg-1" title="Background 1"> <img src="/images/customizer/bodybg/bg-1.jpg" alt=""></li>
          <li class="main-bg-2" data-style="main-bg-2" title="Background 2"> <img src="/images/customizer/bodybg/bg-2.jpg" alt=""></li>
          <li class="main-bg-3" data-style="main-bg-3" title="Background 3"> <img src="/images/customizer/bodybg/bg-3.jpg" alt=""></li>
          <li class="main-bg-4" data-style="main-bg-4" title="Background 4"> <img src="/mages/customizer/bodybg/bg-4.jpg" alt=""></li>
          <li class="main-bg-5" data-style="main-bg-5" title="Background 5"> <img src="images/customizer/bodybg/bg-5.jpg" alt=""></li>
          <li class="main-bg-6" data-style="main-bg-6" title="Background 6"> <img src="/images/customizer/bodybg/bg-6.jpg" alt=""></li>
          <li class="main-bg-7" data-style="main-bg-7" title="Background 7"> <img src="/images/customizer/bodybg/bg-7.jpg" alt=""></li>
          <li class="main-bg-8" data-style="main-bg-8" title="Background 8"> <img src="/images/customizer/bodybg/bg-8.jpg" alt=""></li>
          <li class="main-bg-9" data-style="main-bg-9" title="Background 9"> <img src="/images/customizer/bodybg/bg-9.jpg" alt=""></li>
          <li class="main-bg-10" data-style="main-bg-10" title="Background 10"> <img src="/images/customizer/bodybg/bg-10.jpg" alt=""></li>
          <li class="main-bg-11" data-style="main-bg-11" title="Background 11"> <img src="/images/customizer/bodybg/bg-11.jpg" alt=""></li>
          <li class="main-bg-12" data-style="main-bg-12" title="Background 12"> <img src="/images/customizer/bodybg/bg-12.jpg" alt=""></li>
        </ul>
        <ul class="resetAll">
          <li><a class="button button-border button-reset" href="#">Reset All</a></li>
        </ul>
      </div>
    </div>

    <script src="/js/vendor/jquery-1.12.0.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/jquery.nivo.slider.pack.js"></script>
    <script src="/js/owl.carousel.min.js"></script>
    <script src="/js/ajax-mail.js"></script>
    <script src="/js/jquery.magnific-popup.js"></script>
    <script src="/js/jquery.counterup.min.js"></script>
    <script src="/js/waypoints.min.js"></script>
    <script src="/js/style-customizer.js"></script>
    <script src="/js/plugins.js"></script>
    <script src="/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.2/dist/sweetalert2.all.min.js"></script>
    <script src="/js/ziva.js"></script>

<button
    onclick="openWhatsApp('{{ $company->whatsapp }}')"
    style="
        position: fixed;
        bottom: 20px;
        left: 20px;
        z-index: 9999;
        background-color: #25D366;
        border: none;
        border-radius: 50%;
        width: 60px;
        height: 60px;
        box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    "
    title="Chat with us on WhatsApp"
>
    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 32 32" fill="white">
        <path d="M16.003 2.003c-7.84 0-14 6.16-14 14 0 2.48.64 4.76 1.76 6.76l-1.88 6.76 7.08-1.88c1.92 1.04 4.24 1.64 6.72 1.64 7.84 0 14-6.16 14-14s-6.16-14-14-14zM16 26c-2.24 0-4.32-.6-6.12-1.64l-.44-.24-4.2 1.12 1.12-4.04-.28-.48C5.48 19.04 5 17.56 5 16c0-6.08 4.92-11 11-11s11 4.92 11 11-4.92 11-11 11zm6.16-8.2c-.32-.16-1.92-.96-2.24-1.08-.28-.08-.48-.12-.68.12-.2.24-.8.96-.98 1.16-.16.2-.36.24-.68.08-.32-.16-1.32-.48-2.52-1.52-.92-.8-1.56-1.8-1.76-2.12-.2-.32-.02-.48.14-.64.12-.12.28-.32.4-.48.12-.16.16-.28.24-.48.08-.16.04-.36-.02-.52-.08-.16-.68-1.64-.92-2.28-.24-.56-.48-.48-.68-.48h-.56c-.2 0-.52.08-.8.36s-1.04 1-1.04 2.44 1.08 2.84 1.24 3.04c.16.2 2.12 3.24 5.16 4.56 1.92.84 2.68.92 3.64.76.56-.08 1.92-.78 2.2-1.52.28-.76.28-1.4.2-1.52-.08-.12-.28-.2-.6-.36z"/>
    </svg>
</button>
