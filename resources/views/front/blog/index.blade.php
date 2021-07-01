@extends('front.layout')
@section('content')
@section('phone',$data['phone']->value)

<section class="banner-area relative" id="home">
   <div class="overlay overlay-bg"></div>
   <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
         <div class="about-content col-lg-12">
            <h1 class="text-white">
               Blog
            </h1>
         </div>
      </div>
   </div>
</section>
<section class="blog-posts-area section-gap">
   <div class="container">
      <div class="row">

         <div class="col-lg-8 post-list blog-post-list">
         @foreach($data['blogs'] as $blog)
            <div class="single-post">
               <img class="img-fluid" src="/images/blogs/{{ $blog->file }}" alt="">
               <br>
               <i class="fa fa-calendar"> {{ $blog->created_at }}</i>
               <?php $lang = Lang::locale(); ?>
               <a href="/{{$lang}}/blog-detail/{{$blog->slug}}">
                  <h1>
                    {{$blog->title}}
                  </h1>
               </a>
               <p style="word-wrap: break-word;">
               {{substr(strip_tags(html_entity_decode($blog->content)),0, 350)}}...
               </p>
               <div class="bottom-meta">
                  <div class="user-details row align-items-center">
                     <div class="social-wrap col-lg-6">
                        <ul>
                           <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                           <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                           <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         @endforeach
         </div>
         <div class="single-widget recent-posts-widget">
        <h4 class="title">Recent Posts</h4>
        <div class="blog-list ">
        @foreach($recent['blogs'] as $blog)
            <div class="single-recent-post d-flex flex-row">
                <div class="recent-thumb">
                    <img class="img-fluid" style="width:35px" src="/images/blogs/{{$blog->file}}" alt="">
                </div>
                <div class="recent-details">
                  <a href="/{{$lang}}/blog-detail/{{$blog->slug}}">
                    <h4>
                      {{$blog->title}}
                    </h4>
                    </a>
                    <p style="overflow: hidden;
                           text-overflow: ellipsis;
                           word-wrap: break-word;">
                         {{substr(strip_tags(html_entity_decode($blog->content)),0, 30)}}...

                    </p>
                </div>
            </div>
        @endforeach
     
   </div>
      </div>
   
   </div>
</section>

@endsection()