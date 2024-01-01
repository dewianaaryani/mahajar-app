@extends('admin.layout.app')
@section('title', 'Assignment')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{ URL::previous() }}">Back</a></div>    
    <div class="breadcrumb-item">Assignment</div>
@stop
@section('main-content')
<div class="card card-primary">
    <div class="card-header">
        <h4 class="float-left">Assignment</h4>        
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-6">
                <p><strong>Name :</strong> {{$assignment->mahasiswa->name}}</p><br>
                <p><strong>Npm :</strong> {{$assignment->mahasiswa->nomorInduk}}</p><br>
                
                
            </div>
            <div class="col-md-6 text-md-right">
                <p><strong>Kelas :</strong> {{$assignment->mahasiswa->kelas}}</p><br>
                <p><strong>Email :</strong> {{$assignment->mahasiswa->email}}</p><br>
            </div>
        </div>
    </div>
</div>
<div class="card card-primary">
    <div class="card-header">
        <h4 class="float-left">Grade Assignment</h4>
        
    </div>
    @if(session('status'))
        <div class="col-12">         
            <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
        </div>
    @endif
    <div class="card-body">
        <form method="POST" action="{{route('admin.tasks.assignments.grade', $assignment->id)}}" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h3>{{ $assignment->task->title }}</h3>
            {!! $assignment->task->desc !!}
            <hr>
            <div class="row">
                <div class="form-group col-12 mt-10">
                    <label for="answer"  class="text-primary">Answer :</label>
                    @if($assignment->answer == null)
                    
                    <div class="alert alert-danger"><p>Jawaban belum diisi</p></div>
                    @else
                    {!! $assignment->answer !!}
                    @endif
                </div>
            </div>
            <hr>
            
            <div class="row mt-10">
                <div class="form-group col-12 mt-10">
                    <label for="grade" class="">Grade</label>
                    <input id="grade" type="number" class="form-control" name="grade" value="{{$assignment->grade}}" {{ $assignment->answer === null ? 'disabled' : '' }}>
                </div>
                @error('grade')
                    <div class="col-12">         
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    </div>
                @enderror
            </div>
            
            <div class="form-group">
                <button {{ $assignment->answer === null ? 'disabled' : '' }} type="submit" class="btn btn-primary btn-lg btn-block" >
                    Submit Grade
                </button>
            </div>
        </form>
    </div>
</div>
@stop