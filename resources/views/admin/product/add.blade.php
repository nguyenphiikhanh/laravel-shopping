@extends('layouts.admin')

@section('title')
<title>Add Product</title>
@endsection

@section('css')
<link href="{{ asset('vendors/select2/select2.min.css') }}" rel="stylesheet" />
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection


@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Product','key' =>'Add'])

    <form action="{{ route('product.store') }}" method="post" enctype="multipart/form-data">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">

                        @csrf
                        <div class="form-group">
                            <label>Tên sản phẩm</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                                value="{{  old('name') }}" placeholder="Nhập tên sản phẩm">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Giá</label>
                            <input type="text" name="price" value="{{ old('price')}}"
                                class="form-control @error('price') is-invalid @enderror"
                                placeholder="Nhập giá sản phẩm">
                            @error('price')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Ảnh hiển thị</label>
                            <input type="file" name="feature_image_path" class="form-control-file">
                        </div>

                        <div class="form-group">
                            <label>Ảnh chi tiết</label>
                            <input type="file" multiple name="image_path[]" class="form-control-file">
                        </div>


                        <div class="form-group">
                            <label>Chọn danh mục</label>
                            <select class="form-control select2_init @error('category_id') is-invalid @enderror"
                                name="category_id">
                                <option value="">Chọn danh mục</option>
                                {!! $htmlOption !!}
                            </select>
                            @error('category_id')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Nhập tags</label>
                            <select name="tags[]" class="form-control tag_select_choose" multiple="multiple">

                            </select>
                        </div>

                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Mô tả</label>
                            @error('contents')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                            <textarea class="form-control tinymce_editor_init @error('price') is-invalid @enderror"
                                
                            name="contents" id="exampleFormControlTextarea1" rows="20">{{old('contents')}}</textarea>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <button type="submit" class="btn btn-success">Add</button>
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