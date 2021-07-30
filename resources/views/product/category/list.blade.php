@extends('layouts.master')

@section('title')
<title>Lrv Shop - Trang chủ</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('js')
<link rel="stylesheet" href="{{asset('home/home.css')}}">
@endsection

@section('content')

<section>
    <div class="container">
        <div class="row">
            @include('components.sidebar')
                    <!--features_items-->
            <div class="col-sm-9 padding-right">
                <div class="features_items">

                    <h2 class="title text-center">Features Items</h2>

                    @foreach ($products as $product)
                    <div class="col-sm-4">
                        <div class="product-image-wrapper">
                            <div class="single-products">
                                <div class="productinfo text-center">
                                    <img src="{{$product->feature_image_path}}" alt="" />
                                    <h2>{{number_format($product->price)}} VNĐ</h2>
                                    <p>{{$product->name}}</p>
                                    <a href="#" class="btn btn-default add-to-cart"><i
                                            class="fa fa-shopping-cart"></i>Add to cart</a>
                                </div>
                                <div class="product-overlay">
                                    <div class="overlay-content">
                                        <h2>{{number_format($product->price)}} VNĐ</h2>
                                        <p>{{$product->name}}</p>
                                        <a href="#" class="btn btn-default add-to-cart"><i
                                                class="fa fa-shopping-cart"></i>Add to cart</a>
                                    </div>
                                </div>
                            </div>
                            <div class="choose">
                                <ul class="nav nav-pills nav-justified">
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to wishlist</a></li>
                                    <li><a href=""><i class="fa fa-plus-square"></i>Add to compare</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach



                    {{$products->links()}}
                </div>
                <!--features_items-->
            </div>
        </div>
    </div>
</section>
@endsection