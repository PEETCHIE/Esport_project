<?php

namespace App\Http\Controllers;

use App\Models\contestant;
use App\Models\team;
use App\Http\Requests\StorecontestantRequest;
use App\Http\Requests\UpdatecontestantRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ContestantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexID($id)
    {
        //
        $team_lists = DB::table('teams')->get()->WHERE('cl_id', $id);
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
                    ->join('competition_results', 'competition_results.tit_id', '=', 'tournament_in_teams.id')
                    ->select('t_name', 'logo', 'matches', 'round', 'cp_id', 't_id', 'score')
                    ->get();
                // dd($bucket);
                // แยกข้อมูลตาม R1 และ R2
                $r1_bucket = [];
                $r2_bucket = [];
                $r3_bucket = [];
                $r4_bucket = [];
                $r5_bucket = [];

                foreach ($bucket as $item) {
                    if ($item->round == 'R1') {
                        $r1_bucket[] = $item;
                    } else if ($item->round == 'R2') {
                        $r2_bucket[] = $item;
                    } else if ($item->round == 'R3') {
                        $r3_bucket[] = $item;
                    } else if ($item->round == 'R4') {
                        $r4_bucket[] = $item;
                    } else if ($item->round == 'R5') {
                        $r5_bucket[] = $item;
                    }
                }
                $buckets[] = [
                    'R1' => $r1_bucket,
                    'R2' => $r2_bucket,
                    'R3' => $r3_bucket,
                    'R4' => $r4_bucket,
                    'R5' => $r5_bucket
                ];
            }
            $teamsWithSameCpId = [];
            // $programWithSameId = [];
            $tt = DB::table('tournament_in_teams')->pluck('cp_id')->toArray();
            // dd($cp);
            foreach ($buckets as $bucket) {
                foreach ($bucket as $innerBucket) {
                    foreach ($innerBucket as $item) {
                        if (in_array($item->cp_id, $tt)) {
                            $teamsWithSameCpId[$item->cp_id][] = [
                                'id' => $item->t_id,
                                'name' => $item->t_name,
                                'logo' => $item->logo,
                                'score' => $item->score
                            ];
                        }
                    }
                }
            }
        return view('normal.grid_teamlist', compact('team_lists', 'buckets'));
    }

    public function detailTeamShow($id)
    {
        //
        $team_details = DB::table('contestants')->WHERE('t_id', $id)->get();
        // dd($team_detail);
        return view('normal.team_detail', compact('team_details'));
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
    public function store(StorecontestantRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(contestant $contestant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(contestant $contestant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatecontestantRequest $request, contestant $contestant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(contestant $contestant)
    {
        //
    }
}
