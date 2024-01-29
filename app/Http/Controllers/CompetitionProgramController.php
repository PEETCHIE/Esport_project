<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\competition_program;
use App\Http\Requests\Storecompetition_programRequest;
use App\Http\Requests\Updatecompetition_programRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;

class CompetitionProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('competition_program');
    }

    public function randomTeam($id){
        $count = DB::table('teams')->WHERE('cl_id',$id)
        ->join('competition_lists', 'teams.cl_id', '=', 'competition_lists.id')
        ->groupBy('teams.cl_id')
        ->select(DB::raw('COUNT(*) as count'))
        ->count();
        // dd($count_clid);
        $teams = Team::where('cl_id', $id)->pluck('t_name','id')->toArray();  
        $randomTeams = collect($teams)->shuffle();
        $pairs = [];

        if ($count % 2 == 0) {
            while ($randomTeams->isNotEmpty()) {
                $team1 = $randomTeams->shift();
                $team2 = $randomTeams->shift();

                $team1Id = array_search($team1, $teams);
                $team2Id = array_search($team2, $teams);
                        
                $pairs[] = [
                    'team1_id' => $team1Id,
                    'team1_name' => $team1,
                    'team2_id' => $team2Id,
                    'team2_name' => $team2,
                    'cl_id' => $id,
                ];
            }
            // dd($pairs);
            // DB::table('competition_schedules')->insert($pairs);
            $detail = DB::table('competition_schedules')->get();
            return view('normal.competition_schedule', compact('detail'));
        } else {
            $teamOne = $randomTeams->pop();
            $teamOneId = array_search($teamOne, $teams);

            $pairs[] = [
                'team1_id' => $teamOneId,
                'team1_name' => $teamOne,
                'team2_id' => null,
                'team2_name' => null,
                'cl_id' => $id,
            ];
            
            while ($randomTeams->isNotEmpty()) {
                $team1 = $randomTeams->shift();
                $team2 = $randomTeams->shift();

                $team1Id = array_search($team1, $teams);
                $team2Id = array_search($team2, $teams);
                            
                $pairs[] = [
                    'team1_id' => $team1Id,
                    'team1_name' => $team1,
                    'team2_id' => $team2Id,
                    'team2_name' => $team2,
                    'cl_id' => $id,
                ];
            }
        }
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
    public function store(Storecompetition_programRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(competition_program $competition_program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(competition_program $competition_program)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecompetition_programRequest $request, competition_program $competition_program)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(competition_program $competition_program)
    {
        //
    }
}
