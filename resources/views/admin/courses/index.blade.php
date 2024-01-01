@extends('admin.layout.app')
@section('title','Course')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Course Table</h4>
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
                    <a href="{{ route('admin.courses.create') }}" class="btn btn-primary">Add</a>          
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
                        <th>Name</th>
                        <th>Dosen</th>
                        <th>Kelas</th>
                        <th>Action</th>
                        </tr>
                        @foreach($courses as $course)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $course -> name}}</td>
                            <td>{{ $course -> dosen -> name}}</td>
                            <td>{{ $course -> kelas}}</td>                                                                    
                            <td>
                              <form action="{{route('admin.courses.destroy', $course->id)}}" method="post">
                                <a href="{{route('admin.courses.edit', $course->id)}}" class="btn btn-warning">Edit</a>
                                <a href="{{route('admin.viewTask', $course->id)}}" class="btn btn-primary">View Task</a>                            
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
              {{ $courses->links() }}   
            </div>
@stop