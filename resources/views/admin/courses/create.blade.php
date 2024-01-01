@extends('admin.layout.app')
@section('title','Create Course')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.courses.index')}}">Course</a></div>    
    <div class="breadcrumb-item">Create</div>
@stop
@section('main-content')
<div class="card card-primary">
    @if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <div class="card-header"><h4>Create New Course</h4></div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('admin.courses.store')}}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="form-group col-12">
                    <label>Dosen</label>
                    <select class="form-control selectric" name="user_id">
                    <option>Open this select menu</option>
                    @foreach ($dosen as $user)
                            <option value="{{ $user->id }}">{{ $user->name }}</option>
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
                    <input id="name" type="text" class="form-control" name="name" >
                </div>   
                @error('name')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-12">
                    <label for="kelas">Kelas</label>
                    <input id="name" type="text" class="form-control" name="kelas" >
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