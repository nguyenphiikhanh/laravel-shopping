@extends('layouts.admin')

@section('title')
<title>Sửa slider</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/add/add.css')}}">
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Slider','key' =>'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{route('slider.update',['id'=>$slider->id])}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label>Tên slider</label>
                            <input type="text" name="name" value="{{$slider->name}}"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Nhập tên slider">
                            @error('name')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Mô tả</label>
                            <textarea type="text" name="description" rows="4"
                                class="form-control @error('description') is-invalid @enderror"
                                placeholder="Nhập mô tả">{{$slider->description}}</textarea>
                            @error('description')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Hình ảnh</label>
                            <input type="file" name="image_path"
                                class="form-control-file @error('image_path') is-invalid @enderror">

                            <div class="col-md-4">
                                <div class="row">
                                    <img class="slider_image" src="{{$slider->image_path}}" alt="">
                                </div>
                            </div>
                            @error('image_path')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-success">Lưu</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection