<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\competition_program;
use App\Models\competition_list;
use App\Models\tournament_in_team;
use App\Http\Requests\Storecompetition_programRequest;
use App\Http\Requests\Updatecompetition_programRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class CompetitionProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        $currentDate = Carbon::now();
        $competition_list = competition_list::find($id);
        $expiryDate = Carbon::parse($competition_list->end_date);
        // dd($currentDate);
        if($currentDate > $expiryDate){
            (int)$count_amount = DB::table('competition_lists')->WHERE('id', $id)->value('competition_amount');
            $half_countAmount = $count_amount / 2;
            $competition_list_id = DB::table('competition_lists')->WHERE('id', $id)->pluck('id')->first();

            if($count_amount % 2 == 0){
                for($i=1; $i<= $half_countAmount;){
                    // $competition_program = competition_program::insert([
                    //     'round' => 'R1',
                    //     'matches' => $i,
                    //     'match_date' => Carbon::now()->toDateString(),
                    //     'match_time' =>  Carbon::now()->toTimeString(),
                    //     'cl_id' => $competition_list_id
                    // ]);
                    $i += 1;
                }
            }else{
                // $mod_half =  $half_countAmount % 2;
                // for($i=1; $i<= $half_countAmount;){
                //     $competition_program = competition_program::insert([
                //         'round' => 'R1',
                //         'matches' => $i,
                //         'match_date' => Carbon::now()->toDateString(),
                //         'match_time' =>  Carbon::now()->toTimeString(),
                //         'cl_id' => $competition_list_id
                //     ]);
                //     $i += 1;  
                // }
                // $competition_program = competition_program::insert([
                //     'round' => 'R2',
                //     'matches' => $half_countAmount + 0.5,
                //     'match_date' => Carbon::now()->toDateString(),
                //     'match_time' =>  Carbon::now()->toTimeString(),
                //     'cl_id' => $competition_list_id
                // ]);
                
            }
            // dd($competition_program);
            
            $count = DB::table('teams')->WHERE('cl_id',$id)
            ->join('competition_lists', 'teams.cl_id', '=', 'competition_lists.id')
            ->groupBy('teams.cl_id')
            ->select(DB::raw('COUNT(*) as count'))
            ->count();
            // dd($count);  
            $teams = Team::where('cl_id', $id)->pluck('t_name','id')->toArray();  
            $randomTeams = collect($teams)->shuffle();
            $pairs = [];
            $i = 0;
            $cp_id = competition_program::WHERE('cl_id', $id)->pluck('id')->toArray();
            // dd($cp_id);
            if ($count % 2 == 0) {
                while ($randomTeams->isNotEmpty()) {
                    $t_name = $randomTeams->shift();
                    $t_Id = array_search($t_name, $teams);

                    $cp_id_count = DB::table('tournament_in_teams')
                        ->where('cp_id', $cp_id[$i])
                        ->count();
                    if ($cp_id_count >= 2) {
                        $i++;
                    }
                    $tournament_in_team = tournament_in_team::insert([
                        't_id' => $t_Id,
                        'cp_id' => $cp_id[$i]
                    ]);                    
                }
                return view('manager.competition_program', compact('pairs'));
            } else {
                $teamOne = $randomTeams->pop();
                $teamOneId = array_search($teamOne, $teams);

                while ($randomTeams->isNotEmpty()) {
                    $t_name = $randomTeams->shift();
                    $t_Id = array_search($t_name, $teams);

                    $cp_id_count = DB::table('tournament_in_teams')
                        ->where('cp_id', $cp_id[$i])
                        ->count();

                    if ($cp_id_count >= 2) {
                        $i++;
                    }
                    $tournament_in_team = tournament_in_team::insert([
                        't_id' => $t_Id,
                        'cp_id' => $cp_id[$i]
                    ]);                  
                }
                
                $tournament_in_team = tournament_in_team::insert([
                    't_id' => $teamOneId,
                    'cp_id' => $cp_id[$i]+1
                ]); 
                dd('Success Ngub');
                return view('manager.competition_program', compact('pairs'));
            }
        }else{
            return redirect()->route('managers_competition.index')->with('alert', [
                    'icon' => 'info',
                    'title' => 'Your success message',
                    'text' => 'ไม่สามารถดูได้ เนื่องจากยังไม่ทราบจำนวนทีมที่แน่นอนในการจัดตารางการแข่งขัน',
                ]);
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
