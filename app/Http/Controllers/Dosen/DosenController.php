<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Task;


class DosenController extends Controller
{
    private $courses;

    public function __construct()
    {
        // Fetch the courses data and assign it to the $courses variable
        $this->$courses = Course::where('user_id', Auth::user()->id)->get(); // Logic to retrieve courses, for example: Course::all();
    }

    public function viewTask($course){
        $tasks = Task::where('course_id', $course)->get();
        return view('dosen.tasks.index', compact('tasks'));
    }
    
}
