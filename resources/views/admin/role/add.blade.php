@extends('layouts.admin')

@section('title')
<title>Thêm vai trò</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/role/add.css')}}">
@endsection


@section('js')
<script src="{{asset('admins/role/add.js')}}"></script>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Roles','key' =>'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <form action="{{route('roles.store')}}" method="post" enctype="multipart/form-data" style="width:100%">
                    <div class="col-md-12">
                        @csrf
                        <div class="form-group">
                            <label>Tên vai trò</label>
                            <input type="text" name="name" value="{{old('name')}}" class="form-control"
                                placeholder="Nhập tên vai trò">

                        </div>

                        <div class="form-group">
                            <label>Mô tả vai trò</label>
                            <textarea type="text" name="display_name" rows="4" class="form-control"
                                placeholder="Mô tả vai trò">{{old('display_name')}}</textarea>
                        </div>

                        <div class="form-group">
                            <label>Quyền trên hệ thống</label>
                        </div>

                    </div>

                    <div class="col-md-12">
                        <div class="row">

                            <div class="col-md-12">
                                <label>
                                    <input type="checkbox" class="checkall">
                                    Chọn tất cả quyền
                                </label>
                            </div>

                            @foreach ($permissionParent as $permissionParentItem)
                            <div class="card border-primary mb-3 col-md-12">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" class="checkbox_wrapper">
                                        {{$permissionParentItem->name}}
                                    </label>
                                    
                                </div>

                                <div class="row">
                                    @foreach ($permissionParentItem->permissionsChildren as $permissionsChildrenItem)
                                    <div class="card-body text-primary col-md-3">
                                        <h5 class="card-title">
                                            <label>
                                                <input type="checkbox" class="checkbox_children" name="permission_id[]"
                                                 value="{{$permissionsChildrenItem->id}}">
                                                 {{$permissionsChildrenItem->name}}
                                            </label>
                                            
                                        </h5>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            @endforeach

                        </div>
                    </div>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection