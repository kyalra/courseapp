<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Course;

class CourseController extends Controller
{
    public function index()
    {
        $course = Course::all();
        // dd($course);
        return view('course.index', compact('course'));
    }
    public function view($id)
    {
        $course = Course::find($id);
        return view('course.view', ['course' => $course]);
    }
    public function create()
    {
        return view('course.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_name' => 'required',
            'price' => 'required',
            'days' => 'required',
            'IsCertificate' => 'required',
            'IsActive' => 'required',
        ]);

        // dd($data);
        // dd($request->all());
        Course::create($data);

        return redirect()->route('course.index')->with('success', 'Data Course berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $course = Course::findOrFail($id);
        return view('course.edit' , compact('course'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'course_name' => 'required',
            'price' => 'required',
            'days' => 'required',
            'IsCertificate' => 'required',
            'IsActive' => 'required',
        ]);

        Course::where('id',$id)->update($data);

        return redirect()->route('course.index')->with('success', 'Data Course berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $course = Course::findOrFail($id);
        $course->where('id',$course->id)->delete();

        return redirect()->route('course.index')->with('success', 'Data Course berhasil dihapus.');
    }
}
