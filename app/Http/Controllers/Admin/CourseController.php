<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Course;
use App\Models\User;
class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $courses = Course::latest()->paginate(5);
        
        return view('admin.courses.index', compact('courses'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $dosen = User::where('type', 1)->get();
        return view('admin.courses.create', compact('dosen'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'kelas' => 'required',
            'name' => 'required'
        ]);
        $dataRequest =  $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'user_id' => $dataRequest['user_id'],
            'kelas' => $dataRequest['kelas'],
        ];
        Course::create($data);
        return redirect()->route('admin.courses.index')->with('success', 'success added data!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {

        $dosen = User::where('type', 1)->get();
        return view('admin.courses.edit', compact('course', 'dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $request->validate([
            'user_id' => 'required',
            'kelas' => 'required',
            'name' => 'required'
        ]);
        $dataRequest =  $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'user_id' => $dataRequest['user_id'],
            'kelas' => $dataRequest['kelas'],     
        ];
        $course->update($data); 
        return redirect()->route('admin.courses.index')->with('success', 'Course updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        $course->delete();
        return redirect()->route('admin.courses.index')
            ->with('success', 'Course deleted successfully!');
    }
}
