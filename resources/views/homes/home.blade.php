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

<!--/slider-->
@include('components.slider')
 <!--slider-->
<section>
    <div class="container">
        <div class="row">
            @include('components.sidebar')

            <div class="col-sm-9 padding-right">
                <!--features_items-->
                @include('components.feature_product')
                <!--features_items-->

                    <!--category-tab-->
                @include('components.category_tabs')
                <!--/category-tab-->

                <!--recommended_items-->
                @include('components.recommend_product')
                <!--/recommended_items-->

            </div>
        </div>
    </div>
</section>


@endsection
