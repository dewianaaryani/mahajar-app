@extends('admin.layout.app')
@section('title','Task')
@section('breadcrumb')
    <div class="breadcrumb-item active"><a href="{{route('admin.courses.index')}}">Courses</a></div>    
    <div class="breadcrumb-item">Task</div>
@stop
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Task Table From Course {{$course->name}}</h4>
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
                    <a href="{{ route('admin.addTask', $course) }}" class="btn btn-primary">Add</a>          
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
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                        <th>No</th>
                        <th>Title</th>
                        <th>Action</th>
                        </tr>
                        @foreach($tasks as $task)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $task -> title }}</td>
                            <td>
                              <form action="{{route('admin.deleteTask', $task->id)}}" method="post">                           
                                <a href="{{route('admin.tasks.assignment', $task->id)}}" class="btn btn-primary">View</a>                            
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                              </form>
                            </td>                                            
                          </tr>      
                        @endforeach                                                                
                      </table>                                                                 
                  </div>
                </div>
              </div>
              {{ $tasks->links() }}   
            </div>
@stop