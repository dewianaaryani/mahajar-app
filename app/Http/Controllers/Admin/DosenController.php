<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dosen = User::where('type','=', '1')->paginate(5);
        
        return view('admin.dosen.index', compact('dosen'))
            ->with('i', (request()->input('page', 1) -1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.dosen.create');
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
            'name' => 'required',
            'nomorInduk' => 'required',
            'email' => 'required'
        ]);
        $dataRequest =  $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'nomorInduk' => $dataRequest['nomorInduk'],
            'type' => "1",
            'email' => $dataRequest['email'],
            'password' => bcrypt($dataRequest['password']),
        ];
        User::create($data);
        return redirect()->route('admin.dosen.index')->with('success', 'success added data!');
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
    public function edit(User $dosen)
    {
        return view('admin.dosen.edit', compact('dosen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $dosen)
    {
        $request->validate([
            'name' => 'required',            
            'email' => 'required',
            'nomorInduk' => 'required',
            'password' => 'required',
        ]);
        $dataRequest =  $request->all();
        $data = [
            'name' => $dataRequest['name'],
            'email' => $dataRequest['email'],
            'nomorInduk' => $dataRequest['nomorInduk'],
            'password' => bcrypt($dataRequest['password']),           
            'type' => "1",            
        ];
        $dosen->update($data); 
        return redirect()->route('admin.dosen.index')->with('success', 'User updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $dosen)
    {
        $dosen->delete();
        return redirect()->route('admin.dosen.index')
            ->with('success', 'User deleted successfully!');
    }
}
