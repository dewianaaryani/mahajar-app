<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\Task;

class AssignmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // $tasks = Task::with('assignments')->findOrFail($id)->paginate(10);
        $tasks = Task::where('id', $id)
                ->with(['assignments' => function ($query) use ($id) {
                    $query->where('task_id', $id);
                }])
                ->paginate(10);
        return view('admin.assignments.index', compact('tasks'))
            ->with('i', (request()->input('page', 1) -1)*5);
        

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $assignment = Assignment::findOrFail($id); // Fetch the assignment details
        return view('admin.assignments.show', compact('assignment'));
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
        return redirect()->route('admin.tasks.assignment', $assignment->task_id)->with('success', 'Grade successfully updated!');
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
