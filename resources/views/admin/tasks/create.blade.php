@extends('admin.layout.app')
@section('title','Create Task')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.viewTask', $course->id)}}">Task</a></div>    
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
    <div class="card-header"><h4>Create New Task From Course {{$course -> name}}</h4></div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('admin.storeTask', $course->id)}}" enctype="multipart/form-data">
            @csrf

            <div class="row">
                <div class="form-group col-12">
                    <label for="title">Title</label>
                    <input id="title" type="text" class="form-control" name="title" autofocus>
                </div>   
                @error('title')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>     
            

            <div class="row">
                <div class="form-group col-12">
                    <label for="desc">Description</label>
                 
                        <textarea id="summernote" name="desc"></textarea>
                    
                </div>    
                @error('desc')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>          
            <div class="row">
                <div class="form-group col-4">
                    <label for="desc">Overdue</label>
                    <input type="datetime-local" id="datetime" name="overdue" class="form-control"> 
                </div>    
                @error('overdue')
                    <div class="col-4">         
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