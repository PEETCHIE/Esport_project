<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class PDFController extends Controller
{
    //
    public function generatePDF(Request $request)
    {
        $currentDate = Carbon::now();
        $today = $currentDate->format('Y-m-d');
        $tm_id = DB::table('tournament_managers')->where('user_id', Auth()->id())->pluck('id')->first();
        $email = DB::table('tournament_managers')->where('user_id', Auth()->id())->pluck('email')->first();
        $tel = DB::table('tournament_managers')->where('user_id', Auth()->id())->pluck('tel')->first();
        $today = Carbon::now();
        $cl_id = DB::table('competition_lists')->where('tm_id', $tm_id)->pluck('id')->toArray();
        $count_teams = DB::table('teams')
            ->select('cl_id', DB::raw('count(*) as team_count'))
            ->whereIn('cl_id', $cl_id)
            ->groupBy('cl_id')
            ->get();

        $listType = $request->input('listType', 'all');

        switch ($listType) {
            case 'ongoing':
                $data = DB::table('competition_lists')->where('competition_end_date', '>', $today)->get();
                $title = 'รายการแข่งขันที่กำลังดำเนินการ';
                break;
            case 'ended':
                $data = DB::table('competition_lists')->where('competition_end_date', '<=', $today)->get();
                $title = 'รายการแข่งขันที่เสร็จสิ้นแล้ว';
                break;
            case 'all':
                $data = DB::table('competition_lists')->where('tm_id', $tm_id)->get();
                $title = 'รายการแข่งขันทั้งหมด';
            default:
                break;
        }

        $pdf = PDF::loadView('manager.pdf', compact('data', 'today', 'email', 'tel', 'count_teams', 'title'));
        return $pdf->stream('REPORTED.pdf');
    }
}
