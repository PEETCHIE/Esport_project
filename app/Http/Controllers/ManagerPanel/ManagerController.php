<?php

namespace App\Http\Controllers\ManagerPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Exception;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

class ManagerController extends Controller
{
    //
    public function index()
    {
        try {
            $currentDate = Carbon::now();
            $today = $currentDate->format('Y-m-d');
            $endDate = DB::table('competition_lists')->pluck('end_date')->first();
            $not_endDate = DB::table('competition_lists')->pluck('end_date')->first();
            $count_end = DB::table('competition_lists')->where('competition_end_date', '<=', $today)->count();
            $count_not_end = DB::table('competition_lists')->where('competition_end_date', '>', $today)->count();
            $tm_id = DB::table('tournament_managers')->where('user_id', Auth()->id())->pluck('id')->first();
            $dataList = DB::table('competition_lists')->where('tm_id', $tm_id)->paginate(10);
            $list_cl_id = DB::table('competition_lists')->where('tm_id', $tm_id)->pluck('id')->toArray();
            $count_teams = DB::table('teams')
                ->select('cl_id', DB::raw('count(*) as team_count'))
                ->whereIn('cl_id', $list_cl_id)
                ->groupBy('cl_id')
                ->get();
            $count_competition_lists = DB::table('competition_lists')->where('tm_id', $tm_id)->count();

            return view('manager.manager_home', compact('count_teams', 'count_competition_lists', 'count_end', 'count_not_end','dataList'));
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
        }
    }
}
