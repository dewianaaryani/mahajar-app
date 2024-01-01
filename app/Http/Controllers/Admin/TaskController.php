<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Task;
use App\Models\Course;
use App\Models\Assignment;
use App\Models\User as Mahasiswa;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use App\Events\TaskCreated;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
    }
    public function viewTask($id){
        $course = Course::find($id);
        $tasks = Task::where('course_id', $course->id)->latest()->paginate(5);
        
        return view('admin.tasks.index', compact('tasks', 'course'))
            ->with('i', (request()->input('page', 1) -1)*5);
        
    }
    public function addTask($id){
        $course = Course::find($id);
        return view('admin.tasks.create', compact('course'));
    }
    public function storeTask(Request $request, $id)
    {
        $course = Course::find($id);
        $request->validate([
            'title' => 'required',
            'desc' => 'required',
            'overdue' => ['required', 'date_format:Y-m-d\TH:i', function ($attribute, $value, $fail) {
                $inputDateTime = Carbon::createFromFormat('Y-m-d\TH:i', $value);
                if ($inputDateTime <= Carbon::now()) {
                    $fail('The '.$attribute.' must be a datetime after the current time.');
                }
            }],
        ]);
        $dataRequest =  $request->all();
        $data = [
            'title' => $dataRequest['title'],
            'desc' => $dataRequest['desc'],
            'overdue' => $dataRequest['overdue'],
            'course_id' => $course->id,
        ];
        $task = Task::create($data); 
        $mahasiswa = Mahasiswa::where('kelas', $course->kelas)->get();
        
        foreach ($mahasiswa as $mhs) {
            Assignment::create([
                'mahasiswa_id' => $mhs->id,
                'task_id' => $task->id,
            ]);
        }
        
        return redirect()->route('admin.viewTask', $course->id)->with('success', 'Success: Data added!');
    }

    public function deleteTask($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();

        return redirect()->back()->with('success', 'Task deleted successfully!');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function create()
    {
        
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
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function show(Task $task)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function edit(Task $task)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Task $task)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy(Task $task)
    {

    }
}
