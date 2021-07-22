@extends('layouts.admin')

@section('title')
<title>Add settings</title>
@endsection

@section('css')
<link href="{{ asset('admins/product/add/add.css') }}" rel="stylesheet" />
@endsection

@section('content')

<div class="content-wrapper">
    @include('partials.content-header',['name'=> 'Setting','key' =>'Add'])

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-5">
                    <form action="{{route('settings.store')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <label>Nhập config key</label>
                            <input type="text" name="config_key"
                                class="form-control @error('config_key') is-invalid @enderror"
                                placeholder="Nhập config key">
                            @error('config_key')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        @if (request()->type==='Text')
                        <div class="form-group">
                            <label>Nhập config value</label>
                            <input type="text" name="config_value" class="form-control" placeholder="Nhập config value">
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @elseif (request()->type==='Textarea')
                        <div class="form-group">
                            <label>Nhập config value</label>
                            <textarea name="config_value"
                                class="form-control @error('config_value') is-invalid @enderror" rows="5"
                                placeholder="Nhập config value"></textarea>
                            @error('config_value')
                            <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        @endif

                        <button type="submit" class="btn btn-success">Add</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection