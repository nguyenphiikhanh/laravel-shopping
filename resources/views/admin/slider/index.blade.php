@extends('layouts.admin')

@section('title')
<title>Slider settings</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Slider','key' =>'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('slider.create')}}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên slider</th>
                                <th scope="col">Mô tả</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                        {{-- @foreach($menus as $menu) --}}
                            <tr>
                                <th scope="row">1</th>
                                <td>Slider 1</td>
                                <td>Mô tả</td>
                                <td></td>
                                <td>
                                    <a href="" class="btn btn-secondary">Sửa</a>
                                    <a href="" class="btn btn-danger" onClick="return confirm('Bạn có chắc chắn muốn xóa Slider này?')">Xóa</a>
                                </td>
                            </tr>
                            {{-- @endforeach --}}

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{-- {{ $menus->links() }} --}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection