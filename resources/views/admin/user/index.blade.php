@extends('layouts.admin')

@section('title')
<title>Quản lý người dùng</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/slider/index/index.css')}}">
@endsection

@section('js')
<script src="{{ asset('vendors/sweetAlert2/sweetalert2@11.js') }}"></script>
<script src="{{asset('admins/main.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'User','key' =>'List'])

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
                                <th scope="col">Tên</th>
                                <th scope="col">Email</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($users as $user)
                            <tr>
                                <th scope="row">{{ $user->id}}</th>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email}}</td>
                                <td>
                                    <a href="" class="btn btn-secondary">Sửa</a>
                                    <a href="" 
                                    data-url=""
                                    class="btn btn-danger action_delete">Xóa</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $users->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection