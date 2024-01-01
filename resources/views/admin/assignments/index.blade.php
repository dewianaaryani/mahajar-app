@extends('admin.layout.app')
@section('title','Assignments' )
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.courses.index')}}">Course</a></div>    
    <div class="breadcrumb-item active"><a href="{{route('admin.viewTask', $tasks->first()->id)}}">Task</a></div>    
    <div class="breadcrumb-item">Assignment</div>
@stop
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Assignment Table</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>         
                  </div>
                  <div class="card-body p-0">
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
                    @foreach($tasks as $task)
                        @if($task->assignments->count() > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                <tr>
                                    <th>No</th>
                                    <th>Name</th>
                                    <th>Grade</th>
                                    <th>Action</th>
                                </tr>
                                @foreach($task->assignments as $assignment)
                                    <tr>
                                    <td>{{ ++$i }}</td>
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
                                        <a href="{{route('admin.tasks.assignments.view', $assignment->id)}}" class="btn btn-primary">View</a>  
                                    </td>
                                    </tr>      
                                @endforeach                                                                
                                </table>                                                                 
                            </div>
                        @endif
                    @endforeach

                </div>
              </div>
              {{ $tasks->links() }}   
            </div>
@stop