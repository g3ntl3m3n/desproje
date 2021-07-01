@extends('front.layout')
@section('content')
@section('phone',$data['phone']->value)

<section class="banner-area relative" id="home">
         <div class="overlay overlay-bg"></div>
         <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
               <div class="about-content col-lg-12">
                  <h1 class="text-white">
                     Contact Us
                  </h1>
                  <p class="text-white link-nav"><a href="index-2.html">Home </a> <span class="lnr lnr-arrow-right"></span> <a href="contact.html"> Contact Us</a></p>
               </div>
            </div>
         </div>
      </section>
      <section class="contact-page-area section-gap">
         <div class="container">
            <div class="row">
               <div class="map-wrap" style="width:100%; height: 445px;" id="map"></div>
               <div class="col-lg-4 d-flex flex-column address-wrap">
                  <div class="single-contact-address d-flex flex-row">
                     <div class="icon">
                        <span class="lnr lnr-home"></span>
                     </div>
                     <div class="contact-details">
                        <h5>Dhaka, Bangladesh</h5>
                        <p>56/8, West Panthapath</p>
                     </div>
                  </div>
                  <div class="single-contact-address d-flex flex-row">
                     <div class="icon">
                        <span class="lnr lnr-phone-handset"></span>
                     </div>
                     <div class="contact-details">
                        <h5>00 (880) 9865 562</h5>
                        <p>Mon to Fri 9am to 6 pm</p>
                     </div>
                  </div>
                  <div class="single-contact-address d-flex flex-row">
                     <div class="icon">
                        <span class="lnr lnr-envelope"></span>
                     </div>
                     <div class="contact-details">
                        <h5><a href="https://preview.colorlib.com/cdn-cgi/l/email-protection" class="__cf_email__" data-cfemail="c3b0b6b3b3acb1b783a0aca7a6b7aba6aea6b0eda0acae">[email&#160;protected]</a></h5>
                        <p>Send us your query anytime!</p>
                     </div>
                  </div>
               </div>
               <div class="col-lg-8">
                  <form class="form-area " id="myForm" action="{{route('store')}}" method="post" class="contact-form text-right">
                  @csrf
                     <div class="row">
                        <div class="col-lg-6 form-group">
                           <input name="name" placeholder="Enter your name" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your name'" class="common-input mb-20 form-control" required="" type="text">
                           <input name="email" placeholder="Enter email address" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter email address'" class="common-input mb-20 form-control" required="" type="email">
                           <input name="title" placeholder="Enter your subject" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your subject'" class="common-input mb-20 form-control" required="" type="text">
                           <input name="phone" placeholder="Enter your phone" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter your phone'" class="common-input mb-20 form-control" required="" type="text">
                           <div class="mt-20 alert-msg" style="text-align: left;"></div>
                        </div>
                        <div class="col-lg-6 form-group">
                           <textarea class="common-textarea form-control" name="message" placeholder="Messege" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                           <button class="genric-btn primary circle mt-30" style="float: right;">Send Message</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </section>


@endsection()   