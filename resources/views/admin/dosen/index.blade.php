@extends('admin.layout.app')
@section('title','Dosen')
@section('main-content')
<div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Dosen Table</h4>
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
                    <a href="{{ route('admin.dosen.create') }}" class="btn btn-primary">Add</a>          
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
                        <th>Nidn</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Action</th>
                        </tr>
                        @foreach($dosen as $d)
                          <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $d -> nomorInduk}}</td>
                            <td>{{ $d -> name}}</td>
                            <td>{{ $d -> email}}</td>                                                                    
                            <td>
                              <form action="{{route('admin.dosen.destroy', $d->id)}}" method="post">
                                <a href="{{route('admin.dosen.edit', $d->id)}}" class="btn btn-warning">Edit</a>                            
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
              {{ $dosen->links() }}   
            </div>
@stop