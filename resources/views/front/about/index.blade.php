@extends('front.layout')
@section('content')
@section('phone',$data['phone']->value)

<section class="banner-area relative" id="home">
   <div class="overlay overlay-bg"></div>
   <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
         <div class="about-content col-lg-12">
            <h1 class="text-white">
               About Us
            </h1>
            <p class="text-white link-nav"><a href="index-2.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="about.html"> About Us</a></p>
         </div>
      </div>
   </div>
</section>
<section class="home-about-area section-gap aboutus-about" id="about">
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-lg-8 col-md-12 home-about-left">
            <h6>Brand new app to blow your mind</h6>
            <h1>
               We’ve made a life <br>
               that will change you
            </h1>
            <p class="sub">We are here to listen from you deliver exellence</p>
            <p class="pb-20">
               Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod temp or incididunt ut labore et dolore magna aliqua. Ut enim ad minim. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim.
            </p>
            <a class="primary-btn" href="#">Get Started Now</a>
         </div>
     
      </div>
   </div>
</section>
<section class="cat-area section-gap aboutus-cat" id="feature">
   <div class="container">
      <div class="row">
         <div class="col-lg-4">
            <div class="single-cat d-flex flex-column">
               <a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-magic-wand"></span></span></a>
               <h4 class="mb-20" style="margin-top: 23px;">Maintenance</h4>
               <p>
                  inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.
               </p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="single-cat">
               <a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-rocket"></span></span></a>
               <h4 class="mt-40 mb-20">Residental Service</h4>
               <p>
                  inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.
               </p>
            </div>
         </div>
         <div class="col-lg-4">
            <div class="single-cat">
               <a href="#" class="hb-sm-margin mx-auto d-block"><span class="hb hb-sm inv hb-facebook-inv"><span class="lnr lnr-bug"></span></span></a>
               <h4 class="mt-40 mb-20">Commercial Service</h4>
               <p>
                  inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct standards especially in the workplace. That’s why.
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="service-area section-gap" id="service">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12 pb-30 header-text text-center">
            <h1 class="mb-10">Our Capturing Market Sectors</h1>
            <p>
               Who are in extremely love with eco friendly system..
            </p>
         </div>
      </div>
      <div class="row">
        @foreach($data['galery'] as $galery)
         <div class="col-lg-4">
            <div class="single-service">
               <div class="thumb">
                  <img src="/images/galeri/{{$galery->file}}" alt="">
               </div>
               <h4>{{$galery->title_tr}}</h4>

            </div>
         </div>
        @endforeach
      </div>
   </div>
</section>
<section class="faq-area section-gap relative">
   <div class="overlay overlay-bg"></div>
   <div class="container">
      <div class="row justify-content-center align-items-center">
         <div class="col-lg-3 col-md-6">
            <div class="single-faq">
               <div class="circle">
                  <div class="inner"></div>
               </div>
               <h5><span class="counter">2</span>K+</h5>
               <p>
                  Projects Completed
               </p>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="single-faq">
               <div class="circle">
                  <div class="inner"></div>
               </div>
               <h5><span class="counter">5.5</span>K</h5>
               <p>
                  Total Employees
               </p>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="single-faq">
               <div class="circle">
                  <div class="inner"></div>
               </div>
               <h5 class="counter">959</h5>
               <p>
                  Happy Clients
               </p>
            </div>
         </div>
         <div class="col-lg-3 col-md-6">
            <div class="single-faq">
               <div class="circle">
                  <div class="inner"></div>
               </div>
               <h5 class="counter">367</h5>
               <p>
                  Tickets Submited
               </p>
            </div>
         </div>
      </div>
   </div>
</section>
<section class="feedback-area aboutus-feedback section-gap" id="feedback">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-md-12 pb-60 header-text text-center">
            <h1 class="mb-10">Enjoy our Client’s Feedback</h1>
            <p>
               Who are in extremely love with eco friendly system..
            </p>
         </div>
      </div>
      <div class="row feedback-contents justify-content-center align-items-center">
         <div class="col-lg-6 feedback-left relative d-flex justify-content-center align-items-center">
            <div class="overlay overlay-bg"></div>
            <a class="play-btn" href="https://www.youtube.com/watch?v=ARA0AxrnHdM"><img class="img-fluid" src="img/play-btn.png" alt=""></a>
         </div>
         <div class="col-lg-6 feedback-right">
            <div class="active-review-carusel">
               <div class="single-feedback-carusel">
                  <div class="title d-flex flex-row">
                     <h4 class="pb-10">Fannie Rowe</h4>
                     <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                        <span class="fa fa-star"></span>
                     </div>
                  </div>
                  <p>
                     Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                  </p>
               </div>
               <div class="single-feedback-carusel">
                  <div class="title d-flex flex-row">
                     <h4 class="pb-10">Fannie Rowe</h4>
                     <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star"></span>
                     </div>
                  </div>
                  <p>
                     Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                  </p>
               </div>
               <div class="single-feedback-carusel">
                  <div class="title d-flex flex-row">
                     <h4 class="pb-10">Fannie Rowe</h4>
                     <div class="star">
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked"></span>
                        <span class="fa fa-star checked	"></span>
                     </div>
                  </div>
                  <p>
                     Accessories Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker. Here you can find the best computer accessory for your laptop, monitor, printer, scanner, speaker.
                  </p>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>

@endsection()