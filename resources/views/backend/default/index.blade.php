@extends('backend.layout')
@section('content')
    <section class="content-header">
        <div class="box box-primary">
            <div class="box-header white-border">
                <h1 class="box-title">Dashboard</h1>
                <div class="content">
                  <div class="row">
                        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                        <div class="small-box bg-yellow">
                            <div class="inner">
                                <h3>{{ $count['count'] }}</h3>

                                <p>Users</p>
                                </div>
                                <div class="icon">
                                <i class="ion ion-person-add"></i>
                                </div>
                                <a href="{{ route('user.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                         </div>
                        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                            <h3>{{ $products['products']}}</h3>

                            <p>Products</p>
                            </div>
                            <div class="icon">
                            <i class="fa fa-shopping-cart"></i>
                            </div>
                            <a href="{{ route('products.index') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                         </div>

                    <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                        <div class="small-box bg-green">
                            <div class="inner">
                            <h3>{{ $blogs['blogs'] }}<sup style="font-size: 20px"></sup></h3>

                            <p>Blogs</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-share"></i>
                            </div>
                            <a href="{{ route('blog.index') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-xs-6">
          <!-- small box -->
                         <div class="small-box bg-red">
                            <div class="inner">
                            <h3>{{ $galeri['galeri'] }}</h3>

                            <p>Photos</p>
                            </div>
                            <div class="icon">
                            <i class="ion ion-image"></i>
                            </div>
                            <a href="{{ route('galeri.index') }}" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                            </a>
                        </div>
                    </div>
                    
                </div>
                </div>
                    </div>
                    <div class="box-body">Dashboard Page</div>

                </div>
       
    </section>
@endsection
@section('css') @endsection
@section('js') @endsection