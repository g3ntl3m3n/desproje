@extends('front.layout')
@section('content')
@section('phone',$data['phone']->value)

<section class="banner-area relative" id="home">
   <div class="overlay overlay-bg"></div>
   <div class="container">
      <div class="row d-flex align-items-center justify-content-center">
         <div class="about-content col-lg-12">
            <h1 class="text-white">
               {{$data->title}}
            </h1>
         </div>
      </div>
   </div>
</section>

<section class="blog-posts-area section-gap">
   <div class="container">
      <div class="row">
         <div class="col-lg-8 post-list blog-post-list">
            <div class="single-post">
               <img class="img-thumbnail" src="/images/blogs/{{$data->file}}" alt="">
               <br>
               <i class="fa fa-calendar"> {{ $data->created_at}}</i>

               <a href="#">
                  <h1>
                  {{$data->title}}
                  </h1>
               </a>
               <br>
               <div class="content-wrap">
                  <p style="overflow: hidden;
                           text-overflow: ellipsis;
                           word-wrap: break-word;">  
                  {{strip_tags(html_entity_decode($data->content))}}
                  </p>
           
               </div>
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
                    <a href="{{$blog->slug}}">
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
   </div>
</section>

@endsection()