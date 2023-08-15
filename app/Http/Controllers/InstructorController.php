<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Instructor;


class InstructorController extends Controller
{
    public function index()
    {
        $data = Instructor::all();
        // dd($course);
        return view('instructor.index', compact('data'));
    }
    public function view($id)
    {
        $data = Instructor::find($id);
        return view('instructor.view', ['data' => $data]);
    }
    public function create()
    {
        return view('instructor.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'instructor_name' => 'required',
            'age' => 'required',
            'jenis_kelamin' => 'required',
            'exp_year' => 'required',
            'exp_desc' => 'required',
        ]);

        // dd($data);
        // dd($request->all());
        Instructor::create($data);

        return redirect()->route('instructor.index')->with('success', 'Data Instructor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = Instructor::findOrFail($id);
        return view('instructor.edit' , compact('data'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'instructor_name' => 'required',
            'age' => 'required',
            'jenis_kelamin' => 'required',
            'exp_year' => 'required',
            'exp_desc' => 'required',
        ]);
        // dd($data);

        Instructor::where('id',$id)->update($data);

        return redirect()->route('instructor.index')->with('success', 'Data Instructor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Instructor::findOrFail($id);
        $data->where('id',$data->id)->delete();

        return redirect()->route('instructor.index')->with('success', 'Data Instructor berhasil dihapus.');
    }
}
