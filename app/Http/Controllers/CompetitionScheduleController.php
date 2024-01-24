<?php

namespace App\Http\Controllers;

use App\Models\Competition_schedule;
use App\Http\Requests\StoreCompetition_scheduleRequest;
use App\Http\Requests\UpdateCompetition_scheduleRequest;
use App\Models\team;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;




class CompetitionScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        //
        $count= DB::table('teams')->WHERE('cl_id',$id)
            ->join('competition_lists', 'teams.cl_id', '=', 'competition_lists.id')
            ->groupBy('teams.cl_id')
            ->select(DB::raw('COUNT(*) as count'))
            ->count();
        // dd($count_clid);

        
        if($count % 2 == 0){
            $teams = DB::table('teams')->select('id','t_name')->WHERE('cl_id',$id)->get();
            $teamRand = DB::table('teams')->select('id','t_name')->WHERE('cl_id',$id)->inRandomOrder()->get();
            $shuffleData = $teamRand->chunk(2);

            $pairsArray = $shuffleData->map(function ($shuffleData) {
                return $shuffleData->toArray();
            })->toArray();
            
            
            
            return view('normal.competition_schedule', compact('pairsArray'));
        }else{
            $teamRand = DB::table('teams')->select('id','t_name')->WHERE('cl_id',$id)->inRandomOrder()->get();
            $shuffleData = $teamRand->chunk(2);
            return view('normal.competition_schedule', compact('shuffleData'));
        }
        // 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCompetition_scheduleRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Competition_schedule $competition_schedule)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Competition_schedule $competition_schedule)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCompetition_scheduleRequest $request, Competition_schedule $competition_schedule)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Competition_schedule $competition_schedule)
    {
        //
    }
}
