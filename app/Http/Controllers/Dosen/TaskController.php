<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Assignment;
use App\Models\Task;
use App\Models\Course;
use App\Models\User as Mahasiswa;
use Illuminate\Support\Carbon;
class TaskController extends Controller
{
    public function index($course){
        $tasks = Task::where('course_id', $course)->get();
        
        $tasksCount = $tasks->count();
        return view('dosen.tasks.index', compact('tasks','tasksCount', 'course'));
    }
    public function create($id){
        $course = Course::find($id);
        return view('dosen.tasks.create', compact('course'));
    }
    public function store(Request $request, $id){
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
        return redirect()->route('dosen.viewTask', $course->id)->with('success', 'success added data!');
    }
}
