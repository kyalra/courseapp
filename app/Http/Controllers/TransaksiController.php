<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Transaksi;
use Illuminate\Support\Str;
use Carbon\Carbon;
use App\Models\DetailTransaksi;

use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    public function index()
    {
        $data = DB::table('qualifications')
        ->join('courses', 'qualifications.course_id', '=', 'courses.id')
        ->join('instructors', 'qualifications.instructor_id', '=', 'instructors.id')
        ->select(
            'qualifications.*', 
            'courses.course_name as course_name', 
            'instructors.instructor_name as instructor_name', 
            'courses.days as course_days', 
            'courses.price as course_price', 
            'courses.IsActive as course_active'
        )
        ->whereIn('qualifications.id', function($query) {
            $query->select(DB::raw('MAX(qualifications.id)'))
                  ->from('qualifications')
                  ->join('courses', 'qualifications.course_id', '=', 'courses.id')
                  ->groupBy('courses.course_name');
        })
        ->get();
        $instructor_ready = DB::table('qualifications')
        ->join('courses', 'qualifications.course_id', '=', 'courses.id')
        ->join('instructors', 'qualifications.instructor_id', '=', 'instructors.id')
        ->select('qualifications.*', 'courses.course_name as course_name', 'instructors.instructor_name as instructor_name', 'courses.days as course_days', 'courses.price as course_price', 'courses.IsActive as course_active')
        ->get();
        

        // $course = Course::all();
        // $instructor = Instructor::all();


        // dd($data);
        return view('transaksi.index', compact('data','instructor_ready'));
    }

    public function beli(Request $request)
    {
       
        $request->validate([
            'course_id' => 'required',
            'instructor_id' => 'required',
            'member' => 'required',
            'startdate' => 'required',
            'price' => 'required'
        ]);
       
        $transactionCode = Str::random(10 - strlen('TX') - strlen(''));
        $transactionDate = Carbon::now();
        $member = ['silver' => 5, 'gold' => 10, 'platinum' => 15,'notmember' =>0];

        $data = new Transaksi();
        $data->trans_code = $transactionCode;
        $data->trans_date = $transactionDate;
        $data->cust_name = $request->user()->name;
        $data->member = $request->input('member');
        $data->subtotal = $request->input('price');
        $data->discount = $member[$data->member]/100* $data->subtotal;
        $data->total = $data->subtotal-$data->discount;
        $data->save();

        $detail = new DetailTransaksi();
        $detail->trans_id = $data->id;
        $detail->course_id = $request->input('course_id');
        $detail->instructor_id = $request->input('instructor_id');
        $detail->startdate = $request->input('startdate');
        $detail->price = $data->subtotal;
        $detail->discount = $data->discount;
        $detail->save();

        // dd($data,$detail);
        

        return redirect()->route('transaksi.index')->with('success', 'Berhasil Membeli course');

    }
}
