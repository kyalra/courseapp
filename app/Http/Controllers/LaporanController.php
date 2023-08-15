<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\Transaksi;
use App\Models\DetailTransaksi;
use Illuminate\Support\Facades\DB;
use App\Models\Instructor;
use Illuminate\Http\Request;
use Carbon\Carbon;


class LaporanController extends Controller
{
    public function index(Request $request)
    {
        $data = DB::table('detail_transactions')
            ->join('transactions', 'detail_transactions.trans_id', '=', 'transactions.id')
            ->join('courses', 'detail_transactions.course_id', '=', 'courses.id')
            ->join('instructors', 'detail_transactions.instructor_id', '=', 'instructors.id')
            ->select('detail_transactions.*', 'courses.course_name as course_name', 'instructors.instructor_name as instructor_name', 'courses.days as course_days', 'transactions.member as member', 'transactions.trans_code as code_transaksi', 'transactions.cust_name as name', 'transactions.total as harga_total');
        if (isset($request->member) && $request->member != '')
            $data = $data->where('member', '=', $request->member);

        if (isset($request->instruktur) && $request->instruktur != '')
            $data = $data->where('detail_transactions.instructor_id', '=', $request->instruktur);

        if (isset($request->course) && $request->course != '')
            $data = $data->where('detail_transactions.course_id', '=', $request->course);
        // dd($request);

        $data = $data->get();
        $instruktur = Instructor::get();
        $course = Course::get();

        // dd($data);
        return view('laporan.index', compact('data', 'instruktur', 'course'));
    }

    public function grafik(Request $request)
    {

        // $startDate = Carbon::now()->subMonth();
        // $endDate = Carbon::now();

        // if ($request->has('start_date') && $request->has('end_date')) {
        //     $startDate = Carbon::parse($request->input('start_date'));
        //     $endDate = Carbon::parse($request->input('end_date'));
        // }

        // $data = DB::table('detail_transactions')
        //     ->join('transactions', 'detail_transactions.trans_id', '=', 'transactions.id')
        //     ->join('courses', 'detail_transactions.course_id', '=', 'courses.id')
        //     ->join('instructors', 'detail_transactions.instructor_id', '=', 'instructors.id')
        //     ->select('detail_transactions.*', 'courses.course_name as course_name', 'instructors.instructor_name as instructor_name', 'courses.days as course_days', 'transactions.member as member','transactions.trans_code as code_transaksi','transactions.cust_name as name','transactions.total as harga_total','transactions.trans_date as trans_date')
        //     ->whereBetween('transactions.trans_date', [$startDate, $endDate])
        //     ->get();

        // // dd($data);

        // $transaksi = Transaksi::all();

        // Group transactions by year and month and count them
        $monthlyTransactionCounts = Transaksi::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, COUNT(*) as count')
            ->groupBy('year', 'month')
            ->orderBy('year', 'asc') // Specify 'asc' for ascending order
            ->orderBy('month', 'asc') // Specify 'asc' for ascending order
            ->get();

        $monthlyTransactionSum = Transaksi::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(subtotal) as sum_sub_total')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();
        $monthlyDiskonSum = Transaksi::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(discount) as sum_diskon')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();
        $monthlyTotalSum = Transaksi::selectRaw('YEAR(created_at) as year, MONTH(created_at) as month, SUM(total) as sum_total')
        ->groupBy('year', 'month')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get();

        // dd($monthlyTransactionSum);
        // Transform the data for use in the view
        $transaksi = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $subtotal = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $diskon = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        $total = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];
        foreach ($monthlyTransactionCounts as $key => $monthlyCount) {
            $transaksi[$monthlyCount->month - 1] = $monthlyCount->count;
            $subtotal[$monthlyCount->month - 1] = $monthlyTransactionSum[$key]->sum_sub_total;
            $diskon[$monthlyCount->month - 1] = $monthlyDiskonSum[$key]->sum_diskon;
            $total[$monthlyCount->month - 1] = $monthlyTotalSum[$key]->sum_total;
        }


        return view('laporan.grafik', compact('transaksi','subtotal','diskon','total'));
    }
}
