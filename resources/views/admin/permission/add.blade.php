@extends('layouts.admin')

@section('title')
<title>Add permission</title>
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Permission','key' =>'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <form action="{{route('permission.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Chọn Module</label>
                            <select class="form-control" name="module_parent">
                                <option value="">Chọn module</option>
                                @foreach (config('permissions.table_module') as $moduleItem)
                                
                                <option value="{{$moduleItem}}">{{$moduleItem}}</option>

                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                @foreach (config('permissions.module_children') as $moduleItemChildren )
                                <div class="col-md-3">
                                    <label>
                                        <input type="checkbox" multiple name="module_child[]" value="{{$moduleItemChildren}}">
                                        {{$moduleItemChildren}}
                                    </label>
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
</div>
@endsection