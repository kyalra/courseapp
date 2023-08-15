<?php

namespace App\Http\Controllers;
use App\Models\Qualification;
use App\Models\Course;
use Illuminate\Support\Facades\DB;
use App\Models\Instructor;


use Illuminate\Http\Request;

class QualificationController extends Controller
{
    public function index()
    {
        $data = DB::table('qualifications')
        ->join('courses', 'qualifications.course_id', '=', 'courses.id')
        ->join('instructors', 'qualifications.instructor_id', '=', 'instructors.id')
        ->select('qualifications.*', 'courses.course_name as course_name', 'instructors.instructor_name as instructor_name', 'courses.days as course_days', 'courses.price as course_price', 'courses.IsActive as course_active')
        ->get();

        $course = Course::all();
        $instructor = Instructor::all();


        // dd($data);
        return view('qualification.index', compact('data','course','instructor'));
    }
    public function view($id)
    {   
        $data = DB::table('qualifications')
        ->join('courses', 'qualifications.course_id', '=', 'courses.id')
        ->join('instructors', 'qualifications.instructor_id', '=', 'instructors.id')
        ->select('qualifications.*', 'courses.course_name as course_name', 'instructors.instructor_name as instructor_name')
        ->where('qualifications.id','=',$id)
        ->get();
        // $data = Instructor::find($id);
        // dd($data);
        return view('qualification.view', ['data' => $data[0]]);
    }
    public function create()
    {
        $course = Course::all();
        $instructor = Instructor::all();
        return view('qualification.create',compact('course','instructor'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'course_id' => 'required',
            'instructor_id' => 'required',
        ]);
        
        // dd($data);
        // dd($request->all());
        Qualification::create($data);

        return redirect()->route('qualification.index')->with('success', 'Data Instructor berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $data = DB::table('qualifications')
        ->join('courses', 'qualifications.course_id', '=', 'courses.id')
        ->join('instructors', 'qualifications.instructor_id', '=', 'instructors.id')
        ->select('qualifications.*', 'courses.course_name as course_name', 'instructors.instructor_name as instructor_name')
        ->where('qualifications.id','=',$id)
        ->first();

        $course = Course::all();
        $instructor = Instructor::all();
        // $data = Qualification::findOrFail($id);
        // dd($data);
        return view('qualification.edit' , compact('data','course','instructor'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->validate([
            'course_id' => 'required',
            'instructor_id' => 'required',
        ]);
        // dd($data);

        Qualification::where('id',$id)->update($data);

        return redirect()->route('qualification.index')->with('success', 'Data Instructor berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $data = Qualification::findOrFail($id);
        $data->where('id',$data->id)->delete();
// dd($data);
        return redirect()->route('qualification.index')->with('success', 'Data Instructor berhasil dihapus.');
    }
}
