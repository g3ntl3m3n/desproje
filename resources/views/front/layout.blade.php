<?php $lang = Lang::locale(); ?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
   <head>
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <link rel="shortcut icon" href="img/fav.html">
      <meta name="author" content="codepixer">
      <meta name="description" content="">
      <meta name="keywords" content="">
      <meta charset="UTF-8">
      <title>Industry</title>
      <link rel="stylesheet" href="/front/css/font-awesome.min.css">
      <link rel="stylesheet" href="/front/css/bootstrap.css">
      <link rel="stylesheet" href="/front/css/main.css">

   </head>
   <body>
      <header id="header" id="home">
         <div class="header-top">
            <div class="container">
               <div class="row">
                  <div class="col-lg-6 col-sm-6 col-4 header-top-left no-padding">
                     <ul>
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fa fa-dribbble"></i></a></li>
                        <li><a href="#"><i class="fa fa-behance"></i></a></li>
                     </ul>
                  </div>
                     <?php
                        function current_url()
                        {
                           $url      = "http://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
                           $validURL = str_replace("&", "&amp", $url);
                           return $validURL;
                        }
                        //echo "page URL is : ".current_url();

                        $offer_url = current_url();
                        $enURL = str_replace($lang, 'en', $offer_url);
                        $arURL = str_replace($lang, 'ar', $offer_url);
                        $trURL = str_replace($lang, 'tr', $offer_url);

                     ?>
                  <div class="col-lg-6 col-sm-6 col-8 header-top-right no-padding">
                  <a href="{{ $trURL }}">
                  <i class="fa fa-flag" style="color:white"  @if(App::isLocale('tr')) selected @endif> TR</i>
                  </a>          
                  <a href="{{ $enURL }}">
                  <i class="" style="color:white" @if(App::isLocale('en')) selected @endif> EN</i>
                  </a>

                  <a href="{{ $arURL }}">
                  <i class="" style="color:white" @if(App::isLocale('ar')) selected @endif> AR</i>
                  </a>

                  &nbsp;
                     <i class="fa fa-phone" style="color:white"> @yield("phone")</i>
                     &nbsp;
                     <i class="fa fa-envelope-open" style="color:white"> &nbsp; test@test.com</i>
                  </div>
               </div>
            </div>
         </div>
         
         <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
               <div id="logo">
                  <a href="/{{ $lang }}"><img src="/front/img/logo.png" alt="" title="" /></a>
               </div>
               <nav id="nav-menu-container">
                  <ul class="nav-menu">
                  

                     <li class="menu-active"><a href="/{{ $lang }}">{{__('mainpage.anasayfa')}}</a></li>
                     <li><a href="/{{ $lang }}/about">{{__('mainpage.hakkimizda')}}</a></li>
                     <li><a href="/{{ $lang }}/services">{{__('mainpage.hizmetler')}}</a></li>
                     <li><a href="/{{ $lang }}/blog">{{__('mainpage.blog')}}</a></li>
                     <li><a href="/{{ $lang }}/contact">{{__('mainpage.iletisim')}}</a></li>
                  </ul>
               </nav>
            </div>
         </div>
      </header>

      <!-- app container -->
      @yield('content')

      <footer class="footer-area section-gap">
         <div class="container">
            <div class="row">
               <div class="col-lg-5 col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                     <h6>{{__('mainpage.iletisime_gec')}}</h6>
                     <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore dolore magna aliqua.
                     </p>
                     <p class="footer-text">
                        Copyright &copy;<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script><script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart-o" aria-hidden="true"></i> by <a href="https://colorlib.com/" target="_blank">Colorlib</a>
                     </p>
                  </div>
               </div>
               <div class="col-lg-5  col-md-6 col-sm-6">
                  <div class="single-footer-widget">
                     <h6>{{__('mainpage.bize_ulas')}}</h6>
                     <p>Stay update with our latest</p>
                     <div class="" id="mc_embed_signup">
                        <form target="_blank" novalidate="true" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="form-inline">
                           <input class="form-control" name="EMAIL" placeholder="Enter Email" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Email '" required="" type="email">
                           <button class="click-btn btn btn-default"><i class="fa fa-long-arrow-right" aria-hidden="true"></i></button>
                           <div style="position: absolute; left: -5000px;">
                              <input name="b_36c4fd991d266f23781ded980_aefe40901a" tabindex="-1" value="" type="text">
                           </div>
                           <div class="info"></div>
                        </form>
                     </div>
                  </div>
               </div>
               <div class="col-lg-2 col-md-6 col-sm-6 social-widget">
                  <div class="single-footer-widget">
                     <h6>{{__('mainpage.takip_et')}}</h6>
                     <p>Let us be social</p>
                     <div class="footer-social d-flex align-items-center">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-dribbble"></i></a>
                        <a href="#"><i class="fa fa-behance"></i></a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </footer>
      <script src="/front/js/vendor/jquery-2.2.4.min.js"></script>
      <script src="/front/js/vendor/bootstrap.min.js"></script>
      <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
      <script src="/front/js/main.js"></script>
   </body>
</html>