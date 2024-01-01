<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Task;
class AssignmentController extends Controller
{
    public function index($id){
        $task = Task::find($id);
        $assignments = Assignment::where('task_id', $id)->get();
        return view('dosen.assignments.index', compact('assignments'));
    }
    public function show($id){
        $assignment = Assignment::find($id);
        return view('dosen.assignments.show', compact('assignment'));
    }
    public function grade(Request $request, $id){
        $assignment = Assignment::find($id);
        $request->validate([
            'grade' => 'required',
        ]);
        $assignment->timestamps = false;
        $assignment->grade = $request->input('grade');

        $assignment->save(); // Save the updated grade
        $assignment->timestamps = true;
        return redirect()->route('dosen.showAssignment', $assignment->id)->with('success', 'Grade successfully updated!');
    }
}
