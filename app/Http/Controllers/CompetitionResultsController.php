<?php

namespace App\Http\Controllers;

use App\Models\competition_results;
use App\Models\competition_program;
use App\Models\competition_list;
use App\Models\tournament_in_team;
use App\Http\Requests\Storecompetition_resultsRequest;
use App\Http\Requests\Updatecompetition_resultsRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\Log;

class CompetitionResultsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function minusScore($id)
    {
        try {
            $cp_ids = DB::table('tournament_in_teams')->where('t_id', $id)->pluck('cp_id')->last();
            $latest_tit_id = DB::table('tournament_in_teams')
                ->where('t_id', $id)
                ->where('cp_id', $cp_ids)
                ->orderBy('id', 'desc')
                ->pluck('id');
            $tit_ids = $latest_tit_id ? [$latest_tit_id] : [];
            $chk_team = DB::table('tournament_in_teams')
                ->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')
                ->join('competition_results', 'tournament_in_teams.id', '=', 'competition_results.tit_id')
                ->whereIn('tournament_in_teams.id', $tit_ids)
                ->where(function ($query) {
                    $query->where('competition_programs.round', 'R2')
                        ->orWhere('competition_programs.round', 'R3')
                        ->orWhere('competition_programs.round', 'R4')
                        ->orWhere('competition_programs.round', 'R5')
                        ->orWhere('competition_programs.round', 'R6');
                })
                ->where('score', '=', 0)
                ->get();
            if ($chk_team->isNotEmpty()) {
                $deleteRS = DB::table('competition_results')->whereIn('tit_id', $tit_ids)->delete();
                $deleteTIT = DB::table('tournament_in_teams')->whereIn('id', $tit_ids)->delete();
                $RS_Minus = DB::table('competition_results')
                    ->join('tournament_in_teams', 'competition_results.tit_id', '=', 'tournament_in_teams.id')
                    ->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')
                    ->where('t_id', $id)
                    ->where('score', '>', 0)
                    ->where(function ($query) {
                        $query->where('competition_programs.round', 'R6')
                            ->orWhere('competition_programs.round', 'R5')
                            ->orWhere('competition_programs.round', 'R4')
                            ->orWhere('competition_programs.round', 'R3')
                            ->orWhere('competition_programs.round', 'R2');
                    })
                    ->decrement('score', 1);
                return redirect()->back()->with(
                    'alert',
                    [
                        'icon' => 'info',
                        'title' => 'ลบคะแนนสำเร็จ',
                        'text' => 'การลบข้อมูลสำเร็จเรียบร้อย',
                    ]
                );
            } else {
                $RS_Minus = DB::table('competition_results')
                    ->join('tournament_in_teams', 'competition_results.tit_id', '=', 'tournament_in_teams.id')
                    ->whereIn('tit_id', $tit_ids)
                    ->where('score', '>', 0)
                    ->decrement('score', 1);
                return redirect()->back()->with(
                    'alert',
                    [
                        'icon' => 'info',
                        'title' => 'ลบคะแนนสำเร็จ',
                        'text' => 'การลบข้อมูลสำเร็จเรียบร้อย',
                    ]
                );
            }

            return redirect()->back()->with(
                'alert',
                [
                    'icon' => 'success',
                    'title' => 'ลบคะแนนสำเร็จ',
                    'text' => 'การลบข้อมูลสำเร็จเรียบร้อย',
                ]
            );
        } catch (Exception $e) {
            Log::error($e->getMessage());
            echo $e->getMessage();
        }
    }

    public function store($id)
    {
        try {
            $cp_ids = DB::table('tournament_in_teams')->where('t_id', $id)->pluck('cp_id')->last();
            $cl_round = DB::table('competition_programs')
                ->where('competition_programs.id', $cp_ids)
                ->join('competition_lists', 'competition_programs.cl_id', '=', 'competition_lists.id')
                ->pluck('cl_round')
                ->first();
            switch ($cl_round) {
                case '1':
                    $chk_score = DB::table('tournament_in_teams')
                        ->join('competition_results', 'tournament_in_teams.id', '=', 'competition_results.tit_id')
                        ->where('cp_id', $cp_ids)
                        ->where('score', '>=', 1)
                        ->get();
                    if ($chk_score->isEmpty()) {
                        $latest_tit_id = DB::table('tournament_in_teams')
                            ->where('t_id', $id)
                            ->orderBy('id', 'desc')
                            ->pluck('id')
                            ->first();
                        $tit_ids = $latest_tit_id ? [$latest_tit_id] : [];
                        $RS_Update = DB::table('competition_results')
                            ->whereIn('tit_id', $tit_ids)
                            ->where('score', '<', 1)
                            ->increment('score', 1);

                        $updated_results = DB::table('competition_results')
                            ->whereIn('tit_id', $tit_ids)
                            ->where('score', 1)
                            ->get();

                        if ($updated_results->isNotEmpty()) {
                            $cp_ids = DB::table('tournament_in_teams')
                                ->where('t_id', $id)
                                ->pluck('cp_id')
                                ->toArray();
                            $cl_idFK = DB::table('competition_programs')
                                ->whereIn('id', $cp_ids)
                                ->pluck('cl_id')
                                ->first();
                            $last_match = DB::table('competition_programs')
                                ->where('cl_id', $cl_idFK)
                                ->pluck('matches')
                                ->last();
                            if ($last_match !== null) {
                                $new_match = $last_match + 1;
                            } else {
                                $new_match = 1;
                            }
                            $competition_ID = DB::table('competition_programs')->where('id', $cp_ids)->pluck('cl_id')->first();
                            $cp_id_joins = DB::table('tournament_in_teams')->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->where('cl_id', $competition_ID)->pluck('cp_id')->toArray();
                            $cp_id_counts = array_count_values($cp_id_joins);
                            $last_cp_id_count = end($cp_id_counts);
                            $team_amount = DB::table('competition_lists')->where('id', $competition_ID)->pluck('competition_amount')->first();
                            if ($last_cp_id_count != 2) {
                                $cp_idLast = end($cp_id_joins);
                            } else {
                                $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                                $cp_id = IdGenerator::generate($config_cp_id);
                                $chk_round = DB::Table('competition_programs')->join('tournament_in_teams', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->where('tournament_in_teams.t_id', $id)->pluck('round')->last();
                                switch ($team_amount) {
                                    case '8':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;

                                    case '16':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            case 'R5':
                                                $next_round = 'R6';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;
                                    case '32':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            case 'R5':
                                                $next_round = 'R6';
                                                break;
                                            case 'R6':
                                                $next_round = 'R7';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;
                                    default:
                                        return redirect()->back()->with(
                                            'alert',
                                            [
                                                'icon' => 'error',
                                                'title' => 'ERROR',
                                                'text' => 'มีข้อผิดพลาดกรุณาลองใหม่อีกครั้ง',
                                            ]
                                        );
                                        break;
                                }
                            }
                            $t_id = DB::table('tournament_in_teams')->where('t_id', $id)->pluck('t_id')->first();
                            $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                            $tit_id = IdGenerator::generate($config_tit_id);
                            $tournament_in_team = tournament_in_team::insert([
                                'id' => $tit_id,
                                't_id' => $t_id,
                                'cp_id' => $cp_idLast
                            ]);
                            $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                            $rs_id = IdGenerator::generate($config_RS);
                            $result = competition_results::insert([
                                'id' => $rs_id,
                                'score' => 0,
                                'tit_id' => $tit_id,
                            ]);
                        }
                        $chk_T_id = DB::table('tournament_in_teams')
                            ->where('t_id', $id)
                            ->where('cp_id', $cp_idLast)
                            ->count();
                        if ($chk_T_id >= 2) {
                            $last_result = DB::table('competition_results')->where('tit_id', $tit_id)->pluck('id')->last();
                            $last_tit = DB::table('tournament_in_teams')->where('cp_id', $cp_idLast)->pluck('id')->last();
                            $delete_result = DB::table('competition_results')->where('id', $last_result)->delete();
                            $delete_tit = DB::table('tournament_in_teams')->where('id', $last_tit)->delete();
                            $RS_Minus = DB::table('competition_results')
                                ->join('tournament_in_teams', 'competition_results.tit_id', '=', 'tournament_in_teams.id')
                                ->where('t_id', $id)
                                ->where('score', '>', 0)
                                // ->decrement('score', 1)
                                ->get();
                            // dd($RS_Minus);
                            return redirect()->back()->with(
                                'alert',
                                [
                                    'icon' => 'error',
                                    'title' => 'ไม่สามารถเพิ่มคะแนนได้',
                                    'text' => 'เนื่องจากเป็นทีมเดียวกัน',
                                ]
                            );
                        } else {
                            return redirect()->back()->with(
                                'alert',
                                [
                                    'icon' => 'info',
                                    'title' => 'Your success message',
                                    'text' => 'เพิ่มคะแนนสําเร็จ',
                                ]
                            );
                        }
                        break;
                    } else {
                        return redirect()->back()->with(
                            'alert',
                            [
                                'icon' => 'error',
                                'title' => 'ไม่สามารถเพิ่มคะแนนได้',
                                'text' => 'เนื่องจากได้มีทีมผ่านเข้ารอบไปแล้ว',
                            ]
                        );
                    }

                case '3':
                    $chk_score = DB::table('tournament_in_teams')
                        ->join('competition_results', 'tournament_in_teams.id', '=', 'competition_results.tit_id')
                        ->where('cp_id', $cp_ids)
                        ->where('score', '>=', 2)
                        ->get();
                    if ($chk_score->isEmpty()) {
                        $latest_tit_id = DB::table('tournament_in_teams')
                            ->where('t_id', $id)
                            ->orderBy('id', 'desc')
                            ->pluck('id')
                            ->first();
                        $tit_ids = $latest_tit_id ? [$latest_tit_id] : [];
                        $RS_Update = DB::table('competition_results')
                            ->whereIn('tit_id', $tit_ids)
                            ->where('score', '<', 2)
                            ->increment('score', 1);

                        $updated_results = DB::table('competition_results')
                            ->whereIn('tit_id', $tit_ids)
                            ->where('score', 2)
                            ->get();

                        if ($updated_results->isNotEmpty()) {
                            $cp_ids = DB::table('tournament_in_teams')
                                ->where('t_id', $id)
                                ->pluck('cp_id')
                                ->toArray();
                            $cl_idFK = DB::table('competition_programs')
                                ->whereIn('id', $cp_ids)
                                ->pluck('cl_id')
                                ->first();
                            $last_match = DB::table('competition_programs')
                                ->where('cl_id', $cl_idFK)
                                ->orderByDesc('matches')
                                ->pluck('matches')
                                ->first();
                            if ($last_match !== null) {
                                $new_match = $last_match + 1;
                            } else {
                                $new_match = 1;
                            }
                            $competition_ID = DB::table('competition_programs')->where('id', $cp_ids)->pluck('cl_id')->first();
                            $cp_id_joins = DB::table('tournament_in_teams')->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->where('cl_id', $competition_ID)->pluck('cp_id')->toArray();
                            $cp_id_counts = array_count_values($cp_id_joins);
                            $last_cp_id_count = end($cp_id_counts);
                            $team_amount = DB::table('competition_lists')->where('id', $competition_ID)->pluck('competition_amount')->first();
                            if ($last_cp_id_count != 2) {
                                $cp_idLast = end($cp_id_joins);
                            } else {
                                $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                                $cp_id = IdGenerator::generate($config_cp_id);
                                $chk_round = DB::Table('competition_programs')->join('tournament_in_teams', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->where('tournament_in_teams.t_id', $id)->pluck('round')->last();
                                switch ($team_amount) {
                                    case '8':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;

                                    case '16':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            case 'R5':
                                                $next_round = 'R6';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;
                                    case '32':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            case 'R5':
                                                $next_round = 'R6';
                                                break;
                                            case 'R6':
                                                $next_round = 'R7';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;
                                    default:
                                        return redirect()->back()->with(
                                            'alert',
                                            [
                                                'icon' => 'error',
                                                'title' => 'ERROR',
                                                'text' => 'มีข้อผิดพลาดกรุณาลองใหม่อีกครั้ง',
                                            ]
                                        );
                                        break;
                                }
                            }
                            $t_id = DB::table('tournament_in_teams')->where('t_id', $id)->pluck('t_id')->first();
                            $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                            $tit_id = IdGenerator::generate($config_tit_id);
                            $tournament_in_team = tournament_in_team::insert([
                                'id' => $tit_id,
                                't_id' => $t_id,
                                'cp_id' => $cp_idLast
                            ]);
                            $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                            $rs_id = IdGenerator::generate($config_RS);
                            $result = competition_results::insert([
                                'id' => $rs_id,
                                'score' => 0,
                                'tit_id' => $tit_id,
                            ]);
                        }

                        return redirect()->back()->with(
                            'alert',
                            [
                                'icon' => 'info',
                                'title' => 'Your success message',
                                'text' => 'เพิ่มคะแนนสําเร็จ',
                            ]
                        );
                        break;
                    } else {
                        return redirect()->back()->with(
                            'alert',
                            [
                                'icon' => 'error',
                                'title' => 'ไม่สามารถเพิ่มคะแนนได้',
                                'text' => 'เนื่องจากได้มีทีมผ่านเข้ารอบไปแล้ว',

                            ]
                        );
                    }

                case '5':
                    $chk_score = DB::table('tournament_in_teams')
                        ->join('competition_results', 'tournament_in_teams.id', '=', 'competition_results.tit_id')
                        ->where('cp_id', $cp_ids)
                        ->where('score', '>=', 3)
                        ->get();
                    if ($chk_score->isEmpty()) {
                        $latest_tit_id = DB::table('tournament_in_teams')
                            ->where('t_id', $id)
                            ->orderBy('id', 'desc')
                            ->pluck('id')
                            ->first();
                        $tit_ids = $latest_tit_id ? [$latest_tit_id] : [];
                        $RS_Update = DB::table('competition_results')
                            ->whereIn('tit_id', $tit_ids)
                            ->where('score', '<', 3)
                            ->increment('score', 1);

                        $updated_results = DB::table('competition_results')
                            ->whereIn('tit_id', $tit_ids)
                            ->where('score', 3)
                            ->get();

                        if ($updated_results->isNotEmpty()) {
                            $cp_ids = DB::table('tournament_in_teams')
                                ->where('t_id', $id)
                                ->pluck('cp_id')
                                ->toArray();
                            $cl_idFK = DB::table('competition_programs')
                                ->whereIn('id', $cp_ids)
                                ->pluck('cl_id')
                                ->first();
                            $last_match = DB::table('competition_programs')
                                ->where('cl_id', $cl_idFK)
                                ->orderByDesc('matches')
                                ->pluck('matches')
                                ->first();
                            if ($last_match !== null) {
                                $new_match = $last_match + 1;
                            } else {
                                $new_match = 1;
                            }
                            $competition_ID = DB::table('competition_programs')->where('id', $cp_ids)->pluck('cl_id')->first();
                            $cp_id_joins = DB::table('tournament_in_teams')->join('competition_programs', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->where('cl_id', $competition_ID)->pluck('cp_id')->toArray();
                            $cp_id_counts = array_count_values($cp_id_joins);
                            $last_cp_id_count = end($cp_id_counts);
                            $team_amount = DB::table('competition_lists')->where('id', $competition_ID)->pluck('competition_amount')->first();
                            if ($last_cp_id_count != 2) {
                                $cp_idLast = end($cp_id_joins);
                            } else {
                                $config_cp_id = ['table' => 'competition_programs', 'length' => 8, 'prefix' => 'RM-'];
                                $cp_id = IdGenerator::generate($config_cp_id);
                                $chk_round = DB::Table('competition_programs')->join('tournament_in_teams', 'tournament_in_teams.cp_id', '=', 'competition_programs.id')->where('tournament_in_teams.t_id', $id)->pluck('round')->last();
                                switch ($team_amount) {
                                    case '8':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;

                                    case '16':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            case 'R5':
                                                $next_round = 'R6';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;
                                    case '32':
                                        switch ($chk_round) {
                                            case 'R1':
                                                $next_round = 'R2';
                                                break;
                                            case 'R2':
                                                $next_round = 'R3';
                                                break;
                                            case 'R3':
                                                $next_round = 'R4';
                                                break;
                                            case 'R4':
                                                $next_round = 'R5';
                                                break;
                                            case 'R5':
                                                $next_round = 'R6';
                                                break;
                                            case 'R6':
                                                $next_round = 'R7';
                                                break;
                                            default:
                                                return redirect()->back()->with(
                                                    'alert',
                                                    [
                                                        'icon' => 'error',
                                                        'title' => 'ERROR',
                                                        'text' => 'เกิดข้อผิดพลาด',
                                                        'confirmButtonText' => 'ตกลง'
                                                    ]
                                                );
                                                break;
                                        }
                                        $competition_program = competition_program::insert([
                                            'id' => $cp_id,
                                            'round' => $next_round,
                                            'matches' => $new_match,
                                            'match_date' => Carbon::now()->toDateString(),
                                            'match_time' => Carbon::now()->toTimeString(),
                                            'cl_id' => $cl_idFK
                                        ]);
                                        $cp_idLast = $cp_id;
                                        break;
                                    default:
                                        return redirect()->back()->with(
                                            'alert',
                                            [
                                                'icon' => 'error',
                                                'title' => 'ERROR',
                                                'text' => 'มีข้อผิดพลาดกรุณาลองใหม่อีกครั้ง',
                                            ]
                                        );
                                        break;
                                }
                            }
                            $t_id = DB::table('tournament_in_teams')->where('t_id', $id)->pluck('t_id')->first();
                            $config_tit_id = ['table' => 'tournament_in_teams', 'length' => 8, 'prefix' => 'TIT-'];
                            $tit_id = IdGenerator::generate($config_tit_id);
                            $tournament_in_team = tournament_in_team::insert([
                                'id' => $tit_id,
                                't_id' => $t_id,
                                'cp_id' => $cp_idLast
                            ]);
                            $config_RS = ['table' => 'competition_results', 'length' => 8, 'prefix' => 'RS-'];
                            $rs_id = IdGenerator::generate($config_RS);
                            $result = competition_results::insert([
                                'id' => $rs_id,
                                'score' => 0,
                                'tit_id' => $tit_id,
                            ]);
                        }

                        return redirect()->back()->with(
                            'alert',
                            [
                                'icon' => 'info',
                                'title' => 'Your success message',
                                'text' => 'เพิ่มคะแนนสําเร็จ',
                            ]
                        );
                        break;
                    } else {
                        return redirect()->back()->with(
                            'alert',
                            [
                                'icon' => 'error',
                                'title' => 'ไม่สามารถเพิ่มคะแนนได้',
                                'text' => 'เนื่องจากได้มีทีมผ่านเข้ารอบไปแล้ว',

                            ]
                        );
                    }
                default:
                    return redirect()->back()->with(
                        'alert',
                        [
                            'icon' => 'error',
                            'title' => 'ERROR',
                            'text' => 'มีข้อผิดพลาดกรุณาลองใหม่อีกครั้ง',
                        ]
                    );
                    break;
            }
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(competition_results $competition_results)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(competition_results $competition_results)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecompetition_resultsRequest $request, competition_results $competition_results)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(competition_results $competition_results)
    {
        //
    }
}
