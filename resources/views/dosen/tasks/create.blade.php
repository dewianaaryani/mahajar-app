@extends('dosen.layouts.app')
@section('title','Create Task')
@section('backItem')
    href="{{route('dosen.viewTask', $course->id)}}"
@endsection
@section('content')
    <div class="main-content" style="">
        <h1 style="color: #002C6E; margin-bottom: 50px; text-align: center;">Create New Task From Course {{$course->name}}</h1>
        <form action="{{route('dosen.tasks.store', $course->id)}}" method="post" enctype="multipart/form-data">
            @csrf
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
            <div class="row mt-3">
                <div class="col-3">
                    <label for="title" style="color: #002C6E; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word; display: inline-block; vertical-align: middle;">Title : </label>
                </div>
                <div class="col-9">
                    <input placeholder="Title" name="title" type="text" style="width: 100%;height: 60px; border-radius: 10px; border: 1px black solid; color: #002C6E; font-size: 30px; font-family: Poppins; font-weight: 400; padding-left: 10px" autofocus>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    <label for="desc" style="color: #002C6E; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word; display: inline-block; vertical-align: middle;">Desc : </label>
                </div>
                <div class="col-9">
                    <textarea id="summernote" name="desc" ></textarea>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    <label for="overdue" style="color: #002C6E; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word; display: inline-block; vertical-align: middle;">Overdue : </label>
                </div>
                <div class="col-9">
                    <input name="overdue" type="datetime-local" style="width: 100%;height: 60px; border-radius: 10px; border: 1px black solid; color: #002C6E; font-size: 30px; font-family: Poppins; font-weight: 400; padding-left: 10px; padding-right: 10px;">
                </div>
            </div>
                 
            <div class="row mt-3">
                <div class="col-3">

                </div>
                <div class="col-3">
                    <button type="submit" style="width: 100%; height: 60px; background: #5271FF;border:none; border-radius: 10px; color: white; font-size: 25px; font-family: Poppins; font-weight: 600;">
                        Submit
                    </button>
                </div>
                
            </div>
    
        </form>
    </div>
    
@endsection