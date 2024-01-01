<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Course;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
class HomeController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function adminHome()
    {
        return view('admin.layout.app');
    }
    public function dosenHome()
    {
        $imageFiles = File::files('assets/external/dashimg/course'); 
        $randomIndex = array_rand($imageFiles);
        $randomImage = $imageFiles[$randomIndex];
        $courses = Course::where('user_id', Auth::user()->id)->get();
        
        $coursesCount = $courses->count();
        
  
        return view('dosen.dashboard', compact('courses', 'coursesCount','randomImage','imageFiles'));
    }
    public function mahasiswaHome(){
        $imageFiles = File::files('assets/external/dashimg/course'); 
        $randomIndex = array_rand($imageFiles);
        $randomImage = $imageFiles[$randomIndex];

        $courses = Course::where('kelas', Auth::user()->kelas)->get();
        // dd($courses);
        $coursesCount = $courses->count();
        return view('mahasiswa.dashboard', compact('courses', 'coursesCount','randomImage','imageFiles'));
    }
    
}
