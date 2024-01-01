@extends('dosen.layouts.app')
@section('title','View Task')
@section('backItem')
    href="{{route('dosen.viewAssignments', $assignment->task_id)}}"
@endsection
@section('content')
    <div class="main-content" style="">
        <h1 style="color: #002C6E; margin-bottom: 50px; text-align: center;">Assignment From #{{$assignment->id}}</h1>
        @if($message = Session::get('success'))
            <div class="alert alert-success alert-dismissible show fade">
            <div class="alert-body">
                <button class="close" data-dismiss="alert">
                <span>&times;</span>
                </button>
                {{ $message }}
            </div>
            </div>                    
        @endif
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
                <form method="POST" action="{{route('dosen.grade', $assignment->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h3>{{ $assignment->task->title }}</h3>
                    {!! $assignment->task->desc !!}
                    <hr>
                    <div class="row">
                        <div class="form-group col-12 mt-10">
                            <h3>Answer : <br></h3>
                            @if($assignment->answer == null)
                    
                                <div class="alert alert-danger"><p>Jawaban belum diisi</p></div>
                            @else
                                {!! $assignment->answer !!}
                            @endif
                        </div>
                    </div>
                    <hr>
                    <div class="row mt-3">
                        <div class="form-group col-12 mt-10">
                            <label for="grade" class="">Grade</label>
                            @if($assignment->answer == null)
                                <input id="grade" placeholder="isi grade" type="number" class="form-control" name="grade" value="{{$assignment->grade}}" disabled>
                            @else
                                <input id="grade" placeholder="isi grade" type="number" class="form-control" name="grade" value="{{$assignment->grade}}">
                            @endif
                            
                        </div>
                        @error('grade')
                            <div class="col-12">         
                                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            </div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg btn-block">
                            Submit Grade
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection