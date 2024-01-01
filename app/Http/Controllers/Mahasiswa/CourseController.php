<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Task;
use App\Models\Assignment;
use Auth;
use App\Models\User as Mahasiswa;

class CourseController extends Controller
{
    public function assignmentSubmit(Request $request, $task){
        $assignment = Assignment::find($task);
        $request->validate([
            'answer' => 'required',
        ]);
        $assignment->answer = $request->input('answer');

        $assignment->save(); // Save the updated grade
        return redirect()->back()->with('success', 'Answer successfully uploaded!');
    }
    public function viewCourse($course){
        $tasks = Task::where('course_id', $course)->get();
        $tasksCount = $tasks->count();
        return view('mahasiswa.viewCourse', compact('tasks', 'tasksCount'));
    }
    public function viewTask($task){
        $task = Task::find($task);
        $user = Auth::user()->id;       
        if ($task) {
            $assignment = Assignment::where('task_id', $task->id)
                                ->where('mahasiswa_id', $user)
                                ->first();

            
            // Check if an assignment exists for the given task and user
            if ($assignment) {
                // Assignment found
                // You can work with $assignment here
            } else {
                // Assignment not found for the given task and user
            }
        } else {
            // Task not found with the given ID
        }
        
        return view('mahasiswa.viewTask', compact('task', 'assignment'));
    }
}
