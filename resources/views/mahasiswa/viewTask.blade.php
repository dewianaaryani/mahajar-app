@extends('dosen.layouts.app')
@section('title','View Task')
@section('backItem')
    href="{{route('mahasiswa.viewCourse', $assignment->task->course->id)}}"
@endsection
@section('content')
    <div class="main-content" style="">
        <h1 style="color: #002C6E; margin-bottom: 10px; text-align: center;">{{$assignment->task->course->name}}</h1>
        <h1 style="color: #002C6E; margin-bottom: 50px; text-align: center;">{{$assignment->task->title}}</h1>
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="float-left">Submission status</h4>        
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6">
                        <p>
                            <strong>Submission status :</strong>
                            @if ($assignment->answer == null)
                                No Attempt
                            @else
                                <span class="alert alert-success">Submitted for grading</span>
                            @endif
                        </p>
                        <br>
                        <p>
                            <strong>Grading :</strong>
                            @if ($assignment->grade == null)
                                Not graded yet
                            @else
                                {{$assignment->grade}}
                            @endif
                        </p>
                    </div>
                    <div class="col-md-6 text-md-right">
                        <p>
                            <strong>Due Date :</strong>
                            @php
                                $currentTime = \Carbon\Carbon::now();
                                $overdueTime = \Carbon\Carbon::parse($assignment->task->overdue);
                                $submissionTime = \Carbon\Carbon::parse($assignment->updated_at);
                            @endphp
                            @if ($overdueTime->isPast())
                                <span class="alert alert-danger">Overdue</span>
                            @else
                                {{ $overdueTime }}
                            @endif
                        </p>
                        <br>
                        <p>
                            <strong>Time Remaining  :</strong>
                            @php
                                
                                 if ($overdueTime->isPast() && $submissionTime == \Carbon\Carbon::parse($assignment->created_at)) {
                                    // If overdue and not submitted
                                    echo '<span class="alert alert-danger">Assignment is overdue and not submitted</span>';
                                } else {
                                    // Calculate time remaining
                                    $timeRemaining = $overdueTime->diff($currentTime)->format('%d days, %h hours, %i minutes');

                                    if ($submissionTime !== null && $submissionTime != \Carbon\Carbon::parse($assignment->created_at)) {
                                        // If assignment was submitted and not the same as created_at
                                        $submissionDiff = $submissionTime->diff($overdueTime);
                                        if ($submissionTime->lte($overdueTime)) {
                                            echo "Assignment was submitted " . $submissionDiff->format('%d days, %h hours, %i minutes') . " early";
                                        } else {
                                            echo "Assignment was submitted " . $submissionDiff->format('%d days, %h hours, %i minutes') . " late";
                                        }
                                    } else {
                                        // If assignment is not yet overdue and not submitted (same as created_at)
                                        echo "Time remaining: $timeRemaining";
                                    }
                                }
                            @endphp
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card card-primary">
            <div class="card-header">
                <h4 class="float-left">Assignment</h4>
                
            </div>
            @if(session('status'))
                <div class="col-12">         
                    <div class="alert alert-danger mt-1 mb-1">{{session('status')}}</div>
                </div>
            @endif
            <div class="card-body">
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
                <form method="POST" action="{{route('mahasiswa.assignmentSubmit', $assignment->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    {!! $assignment->task->desc !!}
                    <hr>
                    <div class="row">
                        <div class="form-group col-12 mt-10">
                            <h5 class="mb-2">Answer : <br></h5>
                            @if($assignment->answer == null)
                                @if ($overdueTime->isPast() && $submissionTime == \Carbon\Carbon::parse($assignment->created_at)) 
                                    <div class="alert alert-danger"><p>Could not submitted answer because the time is overdue</p></div>
                                @else
                                    <textarea id="summernote" name="answer" ></textarea>    
                                @endif
                            @else
                                {!! $assignment->answer !!}
                            @endif
                        </div>
                    </div>
                    <hr>
                   
                    <div class="form-group">
                        @if($assignment->answer == null)
                            @if ($overdueTime->isPast() && $submissionTime == \Carbon\Carbon::parse($assignment->created_at)) 
                                
                            @else
                                <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Submit Answer
                                </button>
                            @endif
                        @endif
                        
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection