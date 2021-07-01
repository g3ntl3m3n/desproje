@extends('front.layout')
@section('content')
<?php $lang = Lang::locale(); ?>

<section class="blog-posts-area section-gap">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 post-list blog-post-list">
                <div class="single-post">
                    <div class="row">
                        @foreach($data['products'] as $product)
                        <div class="card col-md-4 m-5">
                          
                            <img style="width:100%; height:auto;" class="card-img-top" src="/images/products/{{$product->file}}">
                            <div class="card-body">
                                <h5 class="card-title">{{ $product->title }}</h5>
                                <p class="card-text">{{ strip_tags($product->content) }}</p>
                                <a href="#" class="btn btn-dark">Visit</a>
                            </div>
                        </div>                       
                        @endforeach
                    </div>
                        
                    </div>

                </div>
                <div class="col-lg-4 sidebar">

                    <div class="single-widget category-widget">
                        <h4 class="title">Categories</h4>
                        <ul>
                            @foreach($data['categories'] as $cat)
                            <li>
                                <a href="/{{$lang}}/category/{{$cat->slug}}" class="justify-content-between align-items-center d-flex">
                                    <h6>{{ $cat-> title }}</h6>
                                    <span>{{ $cat->count()}}</span>
                            </li>
                            @endforeach
                        </ul>
                    </div>

                </div>
            </div>
        </div>
</section>



@endsection()
