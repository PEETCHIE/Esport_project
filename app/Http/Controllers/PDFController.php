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
    public function generatePDF()
    {

        $tm_id = DB::table('tournament_managers')->where('user_id', Auth()->id())->pluck('id')->first();
        $data = DB::table('competition_lists')->where('tm_id', $tm_id)->get();
        $email = DB::table('tournament_managers')->where('user_id', Auth()->id())->pluck('email')->first();
        $tel = DB::table('tournament_managers')->where('user_id', Auth()->id())->pluck('tel')->first();
        $today = Carbon::now();

        $cl_id = DB::table('competition_lists')->where('tm_id', $tm_id)->pluck('id')->toArray();
        $count_teams = DB::table('teams')
        ->select('cl_id', DB::raw('count(*) as team_count'))
        ->whereIn('cl_id', $cl_id)
        ->groupBy('cl_id')
        ->get();

        $pdf = PDF::loadView('manager.pdf', compact('data', 'today', 'email', 'tel', 'count_teams'));
        return $pdf->stream('REPORTED.pdf');
    }
}
