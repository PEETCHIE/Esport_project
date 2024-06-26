<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\competition_program;
use App\Models\competition_list;
use App\Models\tournament_in_team;
use App\Models\competition_results;
use App\Http\Requests\Storecompetition_programRequest;
use App\Http\Requests\Updatecompetition_programRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Session;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

use function PHPSTORM_META\type;

class CompetitionProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($id)
    {
        try {
            $chk_bucket = DB::table('competition_programs')->WHERE('cl_id', $id)->get();
            if ($chk_bucket->count() == 0) {
                $currentDate = Carbon::now();
                $competition_list = competition_list::find($id);
                $expiryDate = Carbon::parse($competition_list->end_date);
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
                            $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                            $rs_id = IdGenerator::generate($config_RS);
                            $result = competition_results::insert([
                                'id' => $rs_id,
                                'score' => 0,
                                'tit_id' => $tit_id,
                            ]);
                        }
                        return redirect()->route('managers_competition.index')->with('alert', [
                            'icon' => 'success',
                            'title' => 'จัดตารางการแข่งขันเรียบร้อย',
                            'text' => 'หากคุณจัดตารางการแข่งขันแล้วจะไม่สามารถจัดได้อีกครั้ง',
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
                            $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                            $rs_id = IdGenerator::generate($config_RS);
                            $result = competition_results::insert([
                                'id' => $rs_id,
                                'score' => 0,
                                'tit_id' => $tit_id,
                            ]);
                        }

                        $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                        $tit_id = IdGenerator::generate($config_tit_id);
                        $tournament_in_team = tournament_in_team::insert([
                            'id' => $tit_id,
                            't_id' => $teamOneId,
                            'cp_id' => $cp_id[$i + 1]
                        ]);
                        $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                        $rs_id = IdGenerator::generate($config_RS);
                        $result = competition_results::insert([
                            'id' => $rs_id,
                            'score' => 0,
                            'tit_id' => $tit_id,
                        ]);

                        return redirect()->route('managers_competition.index')->with('alert', [
                            'icon' => 'success',
                            'title' => 'จัดตารางการแข่งขันเรียบร้อย',
                            'text' => 'หากคุณจัดตารางการแข่งขันแล้วจะไม่สามารถจัดได้อีกครั้ง',
                        ]);
                    }
                } else {
                    return redirect()->route('managers_competition.index')->with('alert', [
                        'icon' => 'error',
                        'title' => 'ไม่สามารถจัดตารางการแข่งขันได้',
                        'text' => 'ไม่สามารถดูได้ เนื่องจากยังไม่ทราบจำนวนทีมที่แน่นอนในการจัดตารางการแข่งขัน',
                    ]);
                }
            } else {
                return redirect()->route('managers_competition.index')->with('alert', [
                    'icon' => 'error',
                    'title' => 'ไม่สามารถจัดตารางการแข่งขันได้',
                    'text' => 'ไม่สามารถสร้างได้ เนื่องจากได้ทำการสร้างตารางการแข่งขันไปเรียบร้อยแล้ว',
                ]);
            }
        } catch (Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
        }
    }
    public function showProgram($id)
    {
        try {
            $programs = DB::table('competition_programs')
                ->where('cl_id', $id)
                ->pluck('id')
                ->toArray();
            if (count($programs) > 0) {
                $buckets = [];
                foreach ($programs as $program) {
                    $bucket = DB::table('tournament_in_teams')
                        ->where('cp_id', $program)
                        ->join('teams', 'tournament_in_teams.t_id', '=', 'teams.id')
                        ->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')
                        ->join('competition_results', 'competition_results.tit_id', '=', 'tournament_in_teams.id')
                        ->join('competition_lists', 'competition_programs.cl_id', '=', 'competition_lists.id')
                        ->select('t_name', 'logo', 'matches', 'round', 'cp_id', 't_id', 'score', 'link', 'match_date', 'match_time', 'competition_amount', 'cl_round')
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
                $tt = DB::table('tournament_in_teams')->pluck('cp_id')->toArray();
                foreach ($buckets as $bucket) {
                    foreach ($bucket as $innerBucket) {
                        foreach ($innerBucket as $item) {
                            if (in_array($item->cp_id, $tt)) {
                                $teamsWithSameCpId[$item->cp_id][] = [
                                    'id' => $item->t_id,
                                    'name' => $item->t_name,
                                    'logo' => $item->logo,
                                    'score' => $item->score,
                                    'link' => $item->link,
                                    'match_date' => $item->match_date,
                                    'match_time' => $item->match_time,
                                    'competition_amount' => $item->competition_amount,
                                    'cl_round' => $item->cl_round
                                ];
                            }
                        }
                    }
                }
                return view('manager.competition_program', compact('buckets'));
            } else {
                return redirect()->route('managers_competition.index')->with('alert', [
                    'icon' => 'info',
                    'title' => 'ยังไม่สามารถเข้าดูตารางได้',
                    'text' => 'โปรดสร้างตารางการแข่งขันก่อน',
                ]);
            }
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
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
            'match_date' => $request->match_date,
            'match_time' => $request->match_time,
            'link' => $request->link,
        ]);
        return back()->with('alert', [
            'icon' => 'success',
            'title' => 'อัพเดตเรียบร้อย!',
            'text' => 'คุณอัพเดตลิงก์วันและเวลาแล้ว!',
            'confirmButtonText' => 'OK',
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(competition_program $competition_program)
    {
        //
    }

    public function randomizeBlindR3($cp_id)
    {
        try {
            $cl_id = DB::table('competition_programs')->WHERE('id', $cp_id)->pluck('cl_id')->first();
            $chk_scrap_teams = DB::table('tournament_in_teams')->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->WHERE('competition_programs.cl_id', $cl_id)->WHERE('competition_programs.round', 'R2')->count();
            if ($chk_scrap_teams != 1) {
                if ($chk_scrap_teams % 2 != 0) {
                    $tit_id = DB::table('tournament_in_teams')->JOIN('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->WHERE('competition_programs.round', 'R2')->WHERE('competition_programs.cl_id', $cl_id)->pluck('tournament_in_teams.id')->toArray();
                    $scrap_teams = DB::table('tournament_in_teams')
                        ->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')
                        ->join('teams', 'tournament_in_teams.t_id', '=', 'teams.id')
                        ->WHERE('competition_programs.cl_id', $cl_id)
                        ->WHERE('competition_programs.round', 'R2')
                        ->pluck('teams.t_name', 'teams.id')
                        ->toArray();
                    $reResult = DB::table('competition_results')
                        ->whereIn('tit_id', $tit_id)
                        ->delete();
                    $reTournament_in_teams = DB::table('tournament_in_teams')
                        ->whereIn('id', $tit_id)
                        ->delete();
                    $reCompetition_programs = DB::table('competition_programs')
                        ->where('round', 'R2')
                        ->WHERE('cl_id', $cl_id)
                        ->delete();
                    $half_scrap_teams = $chk_scrap_teams / 2;
                    $competition_programs = DB::table('competition_programs')->WHERE('cl_id', $cl_id)->count();
                    $random_scrap_teamsTeams = collect($scrap_teams)->shuffle();
                    $teamOne = $random_scrap_teamsTeams->pop();
                    $teamOneId = array_search($teamOne, $scrap_teams);
                    for ($i = 1; $i <=  $half_scrap_teams;) {
                        $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                        $new_cp_id = IdGenerator::generate($config_cp_id);
                        $competition_program = competition_program::insert([
                            'id' => $new_cp_id,
                            'round' => 'R2',
                            'matches' => $competition_programs + $i++,
                            'match_date' => Carbon::now()->toDateString(),
                            'match_time' =>  Carbon::now()->toTimeString(),
                            'cl_id' => $cl_id
                        ]);
                    }
                    $x = 0;
                    $cp_id_r2 = DB::table('competition_programs')->WHERE('cl_id', $cl_id)->where('round', 'R2')->pluck('id')->toArray();
                    while ($random_scrap_teamsTeams->isNotEmpty()) {
                        $cp_id_count = DB::table('tournament_in_teams')
                            ->where('cp_id', $cp_id_r2[$x])
                            ->count();
                        if ($cp_id_count >= 2) {
                            $x++;
                        }
                        $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                        $tit_id = IdGenerator::generate($config_tit_id);
                        $t_name = $random_scrap_teamsTeams->shift();
                        $t_Id = array_search($t_name, $scrap_teams);
                        $tournament_in_team = tournament_in_team::insert([
                            'id' => $tit_id,
                            't_id' => $t_Id,
                            'cp_id' => $cp_id_r2[$x],
                        ]);
                        $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                        $rs_id = IdGenerator::generate($config_RS);
                        $result = competition_results::insert([
                            'id' => $rs_id,
                            'score' => 0,
                            'tit_id' => $tit_id,
                        ]);
                    }
                    // dd($x);
                    $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                    $cp_id = IdGenerator::generate($config_cp_id);
                    $competition_program = competition_program::insert([
                        'id' => $cp_id,
                        'round' => 'R3',
                        'matches' => $competition_programs + $i,
                        'match_date' => Carbon::now()->toDateString(),
                        'match_time' =>  Carbon::now()->toTimeString(),
                        'cl_id' => $cl_id
                    ]);

                    $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                    $tit_id = IdGenerator::generate($config_tit_id);
                    $tournament_in_team = tournament_in_team::insert([
                        'id' => $tit_id,
                        't_id' => $teamOneId,
                        'cp_id' => $cp_id
                    ]);
                    $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                    $rs_id = IdGenerator::generate($config_RS);
                    $result = competition_results::insert([
                        'id' => $rs_id,
                        'score' => 0,
                        'tit_id' => $tit_id,
                    ]);
                    return back()->with('alert', [
                        'icon' => 'success',
                        'title' => 'สุ่มสำเร็จ',
                        'text' => 'คุณสุ่มทีมเรียบร้อยแล้ว',
                        'confirmButtonText' => 'OK',
                    ]);
                } else {
                    return back()->with('alert', [
                        'icon' => 'error',
                        'title' => 'ไม่สามารถสุ่มทีมได้',
                        'text' => 'เนื่องจากไม่ได้มีทีมที่ไม่มีคู่ในการแข่งขัน',
                        'confirmButtonText' => 'OK',
                    ]);
                }
            } else {
                return back()->with('alert', [
                    'icon' => 'error',
                    'title' => 'ไม่สามารถสุ่มทีมได้',
                    'text' => 'เนื่องจากมีเพียงแค่ทีมเดียว',
                    'confirmButtonText' => 'OK',
                ]);
            }
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
        }
    }
    public function randomizeBlindR4($cp_id)
    {
        try {
            $cl_id = DB::table('competition_programs')->WHERE('id', $cp_id)->pluck('cl_id')->first();
            $chk_scrap_teams = DB::table('tournament_in_teams')->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->WHERE('competition_programs.cl_id', $cl_id)->WHERE('competition_programs.round', 'R3')->count();
            if ($chk_scrap_teams != 1) {
                if ($chk_scrap_teams % 2 != 0) {
                    $tit_id = DB::table('tournament_in_teams')->JOIN('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->WHERE('competition_programs.round', 'R2')->WHERE('competition_programs.cl_id', $cl_id)->pluck('tournament_in_teams.id')->toArray();
                    $scrap_teams = DB::table('tournament_in_teams')
                        ->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')
                        ->join('teams', 'tournament_in_teams.t_id', '=', 'teams.id')
                        ->WHERE('competition_programs.cl_id', $cl_id)
                        ->WHERE('competition_programs.round', 'R3')
                        ->pluck('teams.t_name', 'teams.id')
                        ->toArray();
                    $reResult = DB::table('competition_results')
                        ->whereIn('tit_id', $tit_id)
                        ->delete();
                    $reTournament_in_teams = DB::table('tournament_in_teams')
                        ->whereIn('id', $tit_id)
                        ->delete();
                    $reCompetition_programs = DB::table('competition_programs')
                        ->where('round', 'R3')
                        ->where('cl_id', $cl_id)
                        ->delete();
                    $half_scrap_teams = $chk_scrap_teams / 2;
                    $competition_programs = DB::table('competition_programs')->WHERE('cl_id', $cl_id)->count();
                    $random_scrap_teamsTeams = collect($scrap_teams)->shuffle();
                    $teamOne = $random_scrap_teamsTeams->pop();
                    $teamOneId = array_search($teamOne, $scrap_teams);
                    for ($i = 1; $i <=  $half_scrap_teams;) {
                        $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                        $new_cp_id = IdGenerator::generate($config_cp_id);
                        $competition_program = competition_program::insert([
                            'id' => $new_cp_id,
                            'round' => 'R3',
                            'matches' => $competition_programs + $i++,
                            'match_date' => Carbon::now()->toDateString(),
                            'match_time' =>  Carbon::now()->toTimeString(),
                            'cl_id' => $cl_id
                        ]);
                    }
                    $x = 0;
                    $cp_id_r3 = DB::table('competition_programs')->WHERE('cl_id', $cl_id)->where('round', 'R3')->pluck('id')->toArray();
                    while ($random_scrap_teamsTeams->isNotEmpty()) {

                        $cp_id_count = DB::table('tournament_in_teams')
                            ->where('cp_id', $cp_id_r3[$x])
                            ->count();
                        if ($cp_id_count >= 2) {
                            $x++;
                        }
                        $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                        $tit_id = IdGenerator::generate($config_tit_id);
                        $t_name = $random_scrap_teamsTeams->shift();
                        $t_Id = array_search($t_name, $scrap_teams);
                        $tournament_in_team = tournament_in_team::insert([
                            'id' => $tit_id,
                            't_id' => $t_Id,
                            'cp_id' => $cp_id_r3[$x],
                        ]);
                        $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                        $rs_id = IdGenerator::generate($config_RS);
                        $result = competition_results::insert([
                            'id' => $rs_id,
                            'score' => 0,
                            'tit_id' => $tit_id,
                        ]);
                    }

                    $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                    $cp_id = IdGenerator::generate($config_cp_id);
                    $competition_program = competition_program::insert([
                        'id' => $cp_id,
                        'round' => 'R4',
                        'matches' => $competition_programs + $i,
                        'match_date' => Carbon::now()->toDateString(),
                        'match_time' =>  Carbon::now()->toTimeString(),
                        'cl_id' => $cl_id
                    ]);

                    $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                    $tit_id = IdGenerator::generate($config_tit_id);
                    $tournament_in_team = tournament_in_team::insert([
                        'id' => $tit_id,
                        't_id' => $teamOneId,
                        'cp_id' => $cp_id
                    ]);
                    $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                    $rs_id = IdGenerator::generate($config_RS);
                    $result = competition_results::insert([
                        'id' => $rs_id,
                        'score' => 0,
                        'tit_id' => $tit_id,
                    ]);
                    return back()->with('alert', [
                        'icon' => 'success',
                        'title' => 'สุ่มสำเร็จ',
                        'text' => 'คุณสุ่มทีมเรียบร้อยแล้ว',
                        'confirmButtonText' => 'OK',
                    ]);
                } else {
                    return back()->with('alert', [
                        'icon' => 'error',
                        'title' => 'ไม่สามารถสุ่มทีมได้',
                        'text' => 'เนื่องจากไม่ได้มีทีมที่ไม่มีคู่ในการแข่งขัน',
                        'confirmButtonText' => 'OK',
                    ]);
                }
            } else {
                return back()->with('alert', [
                    'icon' => 'error',
                    'title' => 'ไม่สามารถสุ่มทีมได้',
                    'text' => 'เนื่องจากมีเพียงแค่ทีมเดียว',
                    'confirmButtonText' => 'OK',
                ]);
            }
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
        }
    }

    public function randomizeBlindR5($cp_id)
    {
        try {
            $cl_id = DB::table('competition_programs')->WHERE('id', $cp_id)->pluck('cl_id')->first();
            $chk_scrap_teams = DB::table('tournament_in_teams')->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->WHERE('competition_programs.cl_id', $cl_id)->WHERE('competition_programs.round', 'R4')->count();
            if ($chk_scrap_teams != 1) {
                if ($chk_scrap_teams % 2 != 0) {
                    $tit_id = DB::table('tournament_in_teams')->JOIN('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->WHERE('competition_programs.round', 'R2')->WHERE('competition_programs.cl_id', $cl_id)->pluck('tournament_in_teams.id')->toArray();
                    $scrap_teams = DB::table('tournament_in_teams')
                        ->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')
                        ->join('teams', 'tournament_in_teams.t_id', '=', 'teams.id')
                        ->WHERE('competition_programs.cl_id', $cl_id)
                        ->WHERE('competition_programs.round', 'R4')
                        ->pluck('teams.t_name', 'teams.id')
                        ->toArray();
                    $reResult = DB::table('competition_results')
                        ->whereIn('tit_id', $tit_id)
                        ->delete();
                    $reTournament_in_teams = DB::table('tournament_in_teams')
                        ->whereIn('id', $tit_id)
                        ->delete();
                    $reCompetition_programs = DB::table('competition_programs')
                        ->where('round', 'R4')
                        ->WHERE('cl_id', $cl_id)
                        ->delete();
                    $half_scrap_teams = $chk_scrap_teams / 2;
                    $competition_programs = DB::table('competition_programs')->WHERE('cl_id', $cl_id)->count();
                    $random_scrap_teamsTeams = collect($scrap_teams)->shuffle();
                    $teamOne = $random_scrap_teamsTeams->pop();
                    $teamOneId = array_search($teamOne, $scrap_teams);
                    for ($i = 1; $i <=  $half_scrap_teams;) {
                        $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                        $new_cp_id = IdGenerator::generate($config_cp_id);
                        $competition_program = competition_program::insert([
                            'id' => $new_cp_id,
                            'round' => 'R4',
                            'matches' => $competition_programs + $i++,
                            'match_date' => Carbon::now()->toDateString(),
                            'match_time' =>  Carbon::now()->toTimeString(),
                            'cl_id' => $cl_id
                        ]);
                    }
                    $x = 0;
                    $cp_id_r4 = DB::table('competition_programs')->WHERE('cl_id', $cl_id)->where('round', 'R4')->pluck('id')->toArray();
                    while ($random_scrap_teamsTeams->isNotEmpty()) {

                        $cp_id_count = DB::table('tournament_in_teams')
                            ->where('cp_id', $cp_id_r4[$x])
                            ->count();
                        if ($cp_id_count >= 2) {
                            $x++;
                        }
                        $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                        $tit_id = IdGenerator::generate($config_tit_id);
                        $t_name = $random_scrap_teamsTeams->shift();
                        $t_Id = array_search($t_name, $scrap_teams);
                        $tournament_in_team = tournament_in_team::insert([
                            'id' => $tit_id,
                            't_id' => $t_Id,
                            'cp_id' => $cp_id_r4[$x],
                        ]);
                        $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                        $rs_id = IdGenerator::generate($config_RS);
                        $result = competition_results::insert([
                            'id' => $rs_id,
                            'score' => 0,
                            'tit_id' => $tit_id,
                        ]);
                    }

                    $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                    $cp_id = IdGenerator::generate($config_cp_id);
                    $competition_program = competition_program::insert([
                        'id' => $cp_id,
                        'round' => 'R5',
                        'matches' => $competition_programs + $i,
                        'match_date' => Carbon::now()->toDateString(),
                        'match_time' =>  Carbon::now()->toTimeString(),
                        'cl_id' => $cl_id
                    ]);

                    $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                    $tit_id = IdGenerator::generate($config_tit_id);
                    $tournament_in_team = tournament_in_team::insert([
                        'id' => $tit_id,
                        't_id' => $teamOneId,
                        'cp_id' => $cp_id
                    ]);
                    $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                    $rs_id = IdGenerator::generate($config_RS);
                    $result = competition_results::insert([
                        'id' => $rs_id,
                        'score' => 0,
                        'tit_id' => $tit_id,
                    ]);
                    return back()->with('alert', [
                        'icon' => 'success',
                        'title' => 'สุ่มสำเร็จ',
                        'text' => 'คุณสุ่มทีมเรียบร้อยแล้ว',
                        'confirmButtonText' => 'OK',
                    ]);
                } else {
                    return back()->with('alert', [
                        'icon' => 'error',
                        'title' => 'ไม่สามารถสุ่มทีมได้',
                        'text' => 'เนื่องจากไม่ได้มีทีมที่ไม่มีคู่ในการแข่งขัน',
                        'confirmButtonText' => 'OK',
                    ]);
                }
            } else {
                return back()->with('alert', [
                    'icon' => 'error',
                    'title' => 'ไม่สามารถสุ่มทีมได้',
                    'text' => 'เนื่องจากมีเพียงแค่ทีมเดียว',
                    'confirmButtonText' => 'OK',
                ]);
            }
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
        }
    }
}
