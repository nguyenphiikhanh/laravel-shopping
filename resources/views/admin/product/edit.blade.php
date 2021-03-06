@extends('layouts.admin')

@section('title')
<title>Edit Product</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection


@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Product','key' =>'Edit'])
    <form action="{{ route('product.update',['id'=>$product->id]) }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">

                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control"
                            value="{{ $product->name }}"
                            placeholder="Nhập tên sản phẩm">
                        </div>

                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" name="price" class="form-control"
                            value="{{ $product->price }}"
                            placeholder="Nhập giá sản phẩm">
                        </div>

                        <div class="form-group">
                            <label>Ảnh hiển thị</label>
                            <input type="file" name="feature_image_path" class="form-control-file">
                            <div class="col-md-3 ctn_feature_image">
                                <div class="row">
                                    <img class="feature_image" src="{{ $product->feature_image_path }}" alt="">
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple name="image_path[]" class="form-control-file">
                            <div class="col-md-12 ctn_image_detail">
                                <div class="row">
                                    @foreach($product->images as $productImageItem)
                                    <div class="col-md-3">
                                        <img class="image_detail_product" src="{{ $productImageItem->image_path }}" alt="">
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>


                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init" name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Nhập tags</label>
                            <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">
                            @foreach($product->tags as $tagItem)    
                            <option selected value="{{ $tagItem->name }}">{{ $tagItem->name }}</option>
                            @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea class="form-control tinymce_editor_init" name="contents" id="exampleFormControlTextarea1" rows="20">{{ $product->content }}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>

                </div>
            </div>
        </div>
    </form>
</div>
@endsection

@section('js')
<script src="{{ asset('vendors/select2/select2.min.js') }}"></script>
<script src="{{ asset('editor/tinymce.min.js') }}"></script>
<script src="{{ asset('admins/product/add/add.js') }}"></script>


@endsection