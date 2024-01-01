<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Course;

class CourseController extends Controller
{
    private $courses;

    public function __construct()
    {
        // Fetch the courses data and assign it to the $courses variable
        if (Auth::check()) {
            // Fetch the courses data and assign it to the $courses variable
            $this->courses = Course::where('user_id', Auth::user()->id)->all();
        } else {
            // Handle the case where there is no authenticated user
            // For example, set $this->courses to an empty array or handle it according to your application logic
            $this->courses = [];
        }
    }
    public function create(){
       
        return view('dosen.courses.create');
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required',
            'kelas' => 'required'
        ]);
        $dataRequest = $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'kelas' => $dataRequest['kelas'],
            'user_id' => Auth::user()->id,
        ];
        Course::create($data);
        return redirect()->route('dosen.home')->with('success', 'success added data!');
    }
}
