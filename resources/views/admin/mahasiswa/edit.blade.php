@extends('admin.layout.app')
@section('title','Edit Mahasiswa')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.mahasiswa.index')}}">Mahasiswa</a></div>    
    <div class="breadcrumb-item">Edit</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Edit Mahasiswa</h4></div>
    @if(session('message'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('message')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('admin.mahasiswa.update', $mahasiswa->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">NPM</label>
                    <input id="name" type="text" class="form-control" name="nomorInduk" value="{{$mahasiswa->nomorInduk}}" autofocus>
                </div>   
                @error('nomorInduk')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Mahasiswa Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{$mahasiswa->name}}" >
                </div>   
                @error('name')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Email</label>
                    <input id="name" type="text" class="form-control" name="email" value="{{$mahasiswa->email}}">
                </div>   
                @error('email')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>            
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Password(must update)</label>
                    <input id="name" type="password" class="form-control" name="password" value="{{$mahasiswa->password}}">
                </div>   
                @error('password')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>       
            
            <div class="form-group">
            <button type="submit" class="btn btn-primary btn-lg btn-block">
                Submit
            </button>
            </div>
        </form>
    </div>
</div>
@stop