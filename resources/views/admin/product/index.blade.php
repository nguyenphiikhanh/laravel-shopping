@extends('layouts.admin')

@section('title')
<title>Admin C-panel</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Product','key' =>'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('product.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                           
                            <tr>
                                <th scope="row">1</th>
                                <td>IPhone 13</td>
                                <td>$2.500.000</td>
                                <td>
                                <img src="" alt="">
                                </td>
                                <td>Điện thoại Iphone13</td>
                                <td>
                                    <a href="" class="btn btn-secondary">Sửa</a>
                                    <a href="" onClick="return confirm('Bạn có chắc chắn muốn xóa Mục này?')" class="btn btn-danger">Xóa</a>
                                </td>
                            </tr>
                          
                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection