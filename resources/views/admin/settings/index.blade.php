@extends('layouts.admin')

@section('title')
<title>Settings</title>
@endsection

@section('css')
<link rel="stylesheet" href="{{asset('admins/settings/index/index.css')}}">
@endsection


@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Settings','key' =>'List'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="btn-group float-right">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                          Add setting
                          <span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li><a href="{{route('settings.create').'?type=Text'}}">Text</a></li>
                          <li><a href="{{route('settings.create').'?type=Textarea'}}">Textarea</a></li>
                        </ul>
                      </div>
                </div>
                <div class="col-md-12">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Config key</th>
                                <th scope="col">Config value</th>
                                <th scope="col">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach($settings as $setting)
                            <tr>
                                <th scope="row">{{$setting->id}}</th>
                                <td>{{$setting->config_key}}</td>
                                <td>{{$setting->config_value}}</td>
                                <td>
                                    <a href="{{route('settings.edit',['id'=>$setting->id]).'?type='.$setting->type}}"
                                        class="btn btn-secondary">Sửa</a>
                                    <a href="" class="btn btn-danger"
                                        onClick="return confirm('Bạn có chắc chắn muốn xóa Menu này?')">Xóa</a>
                                </td>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
                <div class="col-md-12">
                    {{ $settings->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection