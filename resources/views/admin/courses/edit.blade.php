@extends('admin.layout.app')
@section('title','Edit Course')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.courses.index')}}">Course</a></div>    
    <div class="breadcrumb-item">Edit</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header"><h4>Edit Course</h4></div>
    @if(session('message'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('message')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('admin.courses.update', $course->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            
            <div class="row">
                <div class="form-group col-12">
                    <label>Dosen</label>
                    <select class="form-control selectric" name="user_id">
                        <option>Open this select menu</option>
                        @foreach ($dosen as $user)
                         <option value="{{ $user->id }}" {{$user->id == $course->user_id ? 'selected="selected"' : ''}}>{{ $user->name }}</option>
                        @endforeach      
                    </select>               
                </div>     
                @error('user_id')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror  
            </div>               
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Name</label>
                    <input id="name" type="text" class="form-control" name="name" value="{{$course->name}}" autofocus>
                </div>   
                @error('name')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>  
            <div class="row">
                <div class="form-group col-12">
                    <label for="name">Kelas</label>
                    <input id="name" type="text" class="form-control" name="kelas" value="{{$course->kelas}}">
                </div>   
                @error('kelas')
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