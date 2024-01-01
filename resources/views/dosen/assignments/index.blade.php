@extends('dosen.layouts.app')
@section('title','View Task')
@section('backItem')
    href="{{route('dosen.viewTask', $assignments->first()->task->course_id)}}"
@endsection
@section('content')
    <div class="main-content" style="">
        <h1 style="color: #002C6E; margin-bottom: 50px; text-align: center;">Task From Course {{$assignments->first()->task->course->name}}</h1>

            <div class="row mt-3">
                <div class="col-3">
                    <label for="title" style="color: #002C6E; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word; display: inline-block; vertical-align: middle;">Title : </label>
                </div>
                <div class="col-9">
                    <label for="" style="width: 100%;height: 60px;  color: #002C6E; font-size: 30px; font-family: Poppins; font-weight: 400; padding-left: 10px">{{$assignments->first()->task->title}}</label>           
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    <label for="desc" style="color: #002C6E; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word; display: inline-block; vertical-align: middle;">Desc : </label>
                </div>
                <div class="col-9">
                    <label for="" style="width: 100%;height: 60px;  color: #002C6E; font-size: 30px; font-family: Poppins; font-weight: 400; padding-left: 10px">{!!$assignments->first()->task->desc!!}</label>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-3">
                    <label for="overdue" style="color: #002C6E; font-size: 40px; font-family: Poppins; font-weight: 400; word-wrap: break-word; display: inline-block; vertical-align: middle;">Overdue : </label>
                </div>
                <div class="col-9">
                    <label for="" style="width: 100%;height: 60px;  color: #002C6E; font-size: 30px; font-family: Poppins; font-weight: 400; padding-left: 10px">{{$assignments->first()->task->overdue}}</label>
                </div>
            </div>
            <hr>
    
            <div class="table-responsive">
                <table class="table">
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Grade</th>
                    <th>Action</th>
                </tr>
                @foreach($assignments as $assignment)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $assignment -> mahasiswa->name}}</td>           
                        @if ($assignment -> answer != null)
                            @if ($assignment -> grade != null)
                                <td>{{ $assignment -> grade}}</td>        
                            @else
                                <td><span class="btn btn-danger">Belum dinilai</span></td>  
                            @endif   
                        @else
                                <td><span class="btn btn-secondary">Belum diisi</span></td>  
                        @endif                                                                             
                        <td>
                            <a href="{{route('dosen.showAssignment', $assignment->id)}}" class="btn btn-primary">View</a>  
                        </td>
                    </tr>      
                @endforeach                                                                
                </table>                                                                 
            </div>
    </div>
@endsection