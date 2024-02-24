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
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;

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
        if ($currentDate > $expiryDate) {
            $count = DB::table('teams')->WHERE('cl_id', $id)
                ->join('competition_lists', 'teams.cl_id', '=', 'competition_lists.id')
                ->groupBy('teams.cl_id')
                ->select(DB::raw('COUNT(*) as count'))
                ->count();

            $half_countAmount = $count / 2;
            $competition_list_id = $id;
            if ($count % 2 == 0) {
                for ($i = 1; $i <= $half_countAmount; $i++) {
                    $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                    $cp_id = IdGenerator::generate($config_cp_id);
                    $competition_program = competition_program::insert([
                        'id' => $cp_id,
                        'round' => 'R1',
                        'matches' => $i,
                        'match_date' => Carbon::now()->toDateString(),
                        'match_time' =>  Carbon::now()->toTimeString(),
                        'cl_id' => $competition_list_id
                    ]);
                }
            } else {
                $mod_half =  $half_countAmount % 2;
                for ($i = 1; $i <= $half_countAmount; $i++) {
                    $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                    $cp_id = IdGenerator::generate($config_cp_id);
                    $competition_program = competition_program::insert([
                        'id' => $cp_id,
                        'round' => 'R1',
                        'matches' => $i,
                        'match_date' => Carbon::now()->toDateString(),
                        'match_time' =>  Carbon::now()->toTimeString(),
                        'cl_id' => $competition_list_id
                    ]);
                }
                $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                $cp_id = IdGenerator::generate($config_cp_id);
                $competition_program = competition_program::insert([
                    'id' => $cp_id,
                    'round' => 'R2',
                    'matches' => $half_countAmount + 0.5,
                    'match_date' => Carbon::now()->toDateString(),
                    'match_time' =>  Carbon::now()->toTimeString(),
                    'cl_id' => $competition_list_id
                ]);
            }
            // dd($competition_program);


            // dd($count);  
            $teams = Team::where('cl_id', $id)->pluck('t_name', 'id')->toArray();
            $randomTeams = collect($teams)->shuffle();
            $pairs = [];
            $i = 0;
            $cp_id = DB::table('competition_programs')->WHERE('cl_id', $id)->pluck('id')->toArray();
            

            if ($count % 2 == 0) {
                while ($randomTeams->isNotEmpty()) {
                    $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                    $tit_id = IdGenerator::generate($config_tit_id);

                    $t_name = $randomTeams->shift();
                    $t_Id = array_search($t_name, $teams);
                    $cp_id_count = DB::table('tournament_in_teams')
                        ->where('cp_id', $cp_id[$i])
                        ->count();
                    if ($cp_id_count >= 2) {
                        $i++;
                    }
                    $tournament_in_team = tournament_in_team::insert([
                        'id' => $tit_id,
                        't_id' => $t_Id,
                        'cp_id' => $cp_id[$i]
                    ]);
                }
                return redirect()->route('managers_competition.index')->with('alert', [
                    'icon' => 'success',
                    'title' => 'Your success message',
                    'text' => 'SUCCESS',
                ]);
            } else {

                $teamOne = $randomTeams->pop();
                $teamOneId = array_search($teamOne, $teams);

                while ($randomTeams->isNotEmpty()) {
                    $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                    $tit_id = IdGenerator::generate($config_tit_id);

                    $t_name = $randomTeams->shift();
                    $t_Id = array_search($t_name, $teams);

                    $cp_id_count = DB::table('tournament_in_teams')
                        ->where('cp_id', $cp_id[$i])
                        ->count();

                    if ($cp_id_count >= 2) {
                        $i++;
                    }
                    $tournament_in_team = tournament_in_team::insert([
                        'id' => $tit_id,
                        't_id' => $t_Id,
                        'cp_id' => $cp_id[$i]
                    ]);
                }
                
                $config_tit_id = ['table'=>'tournament_in_teams', 'length'=>8, 'prefix'=>'TIT-'];
                $tit_id = IdGenerator::generate($config_tit_id);
                $tournament_in_team = tournament_in_team::insert([
                    'id' => $tit_id,
                    't_id' => $teamOneId,
                    'cp_id' => $cp_id[$i + 1]
                ]);

                return redirect()->route('managers_competition.index')->with('alert', [
                    'icon' => 'success',
                    'title' => 'Your success message',
                    'text' => 'SUCCESS',
                ]);
            }
        } else {
            return redirect()->route('managers_competition.index')->with('alert', [
                'icon' => 'info',
                'title' => 'Your success message',
                'text' => 'ไม่สามารถดูได้ เนื่องจากยังไม่ทราบจำนวนทีมที่แน่นอนในการจัดตารางการแข่งขัน',
            ]);
        }
    }

    public function showProgram($id)
    {
        $programs = DB::table('competition_programs')
            ->where('cl_id', $id)
            ->pluck('id')
            ->toArray();

        $buckets = [];

        foreach ($programs as $program) {
            $bucket = DB::table('tournament_in_teams')
                ->where('cp_id', $program)
                ->join('teams', 'tournament_in_teams.t_id', '=', 'teams.id')
                ->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')
                ->select('t_name', 'logo', 'matches', 'round', 'cp_id', 't_id')
                ->get();

            // แยกข้อมูลตาม R1 และ R2
            $r1_bucket = [];
            $r2_bucket = [];
            $r3_bucket = [];
            $r4_bucket = [];

            foreach ($bucket as $item) {
                if ($item->round == 'R1') {
                    $r1_bucket[] = $item;
                } else if ($item->round == 'R2') {
                    $r2_bucket[] = $item;
                } else if ($item->round == 'R3') {
                    $r3_bucket[] = $item;
                } else if ($item->round == 'R4') {
                    $r4_bucket[] = $item;
                }
            }
            $buckets[] = [
                'R1' => $r1_bucket,
                'R2' => $r2_bucket,
                'R3' => $r3_bucket,
                'R4' => $r4_bucket
            ];
        }
        // $teamsWithSameCpId = [];
        // $tt = DB::table('tournament_in_teams')->pluck('cp_id')->toArray();
        // foreach ($buckets as $bucket) {
        //     foreach ($bucket as $innerBucket) {
        //         foreach ($innerBucket as $item) {
        //             $teamsWithSameCpId[$item->cp_id][] = $item;
        //             // if(in_array($item->cp_id, $tt)){
        //             //     $teamsWithSameCpId[$item->cp_id][] = [
        //             //         'name' => $item->t_name,
        //             //         'logo' => $item->logo,
        //             //     ];
        //             // } 
        //         }
        //     }
        // }
        return view('manager.competition_program', compact('buckets'));
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
    public function edit($id)
    {
        //
        $cp_edit = DB::table('competition_programs')->WHERE('id', $id)->first();
        
        // dd($cp_edit); 
        return view('manager.competition_program_edit', compact('cp_edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecompetition_programRequest $request, competition_program $competition_program, $id)
    {
        
        $data = DB::table('competition_programs')->WHERE('id', $id)->update([
            'match_date'=> $request->match_date,
            'match_time'=> $request->match_time,
            'link' => $request->link,
        ]);
         
        // dd($result);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(competition_program $competition_program)
    {
        //
    }
}
