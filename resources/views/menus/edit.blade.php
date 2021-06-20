@extends('layouts.admin')

@section('title')
<title>Admin C-panel</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Menus','key' =>'Edit'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{ route('menus.update',['id'=>$menuFollowId->id]) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Tên Menu</label>
                            <input type="text" name="name" class="form-control" value="{{ $menuFollowId->name }}">
                        </div>

                        <div class="form-group">
                            <label>Chọn danh mục cha</label>
                            <select class="form-control" name="parent_id">
                                <option value="0">Chọn Menu cha</option>
                                {!! $optionSelect !!}
                            </select>
                        </div>

                        <button type="submit" class="btn btn-success">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection