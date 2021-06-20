@extends('layouts.admin')

@section('title')
<title>Admin C-panel</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Menu','key' =>'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <a href="{{ route('menus.create') }}" class="btn btn-success float-right m-2">Add</a>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Tên Menu</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                        @foreach($menus as $menu)
                            <tr>
                                <th scope="row">{{ $menu->id }}</th>
                                <td>{{ $menu->name }}</td>
                                <td>
                                    <a href="{{ route('menus.edit',['id'=>$menu->id]) }}" class="btn btn-secondary">Sửa</a>
                                    <a href="{{ route('menus.del',['id'=>$menu->id]) }}" class="btn btn-danger" onClick="return confirm('Bạn có chắc chắn muốn xóa Menu này?')">Xóa</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $menus->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection