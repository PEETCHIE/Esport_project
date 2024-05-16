<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\contestant;
use App\Models\competition_list;
use App\Http\Requests\StoreteamRequest;
use App\Http\Requests\UpdateteamRequest;
use App\Http\Requests\StorecontestantRequest;
use App\Http\Requests\UpdatecontestantRequest;
use Carbon\Carbon;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use function Laravel\Prompts\select;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $currentDate = Carbon::now();
        $competition_lists = DB::table('competition_lists')->WHERE('opening_date', '<', $currentDate)->WHERE('competition_end_date', '>', $currentDate)->get();
        if ($competition_lists == null) {
            $id = $competition_lists->first()->id;
            $count_clid = DB::table('teams')->WHERE('cl_id', $id)->join('competition_lists', 'teams.cl_id', '=', 'competition_lists.id')->groupBy('teams.cl_id')->select(DB::raw('COUNT(*) as count'))->count();
            $competition_amount = DB::table('competition_lists')->WHERE('id', $id)->value('competition_amount');
            $competitionAmountInt = (int) $competition_amount;
        }
        return view('normal.grid_competition_list', compact('competition_lists', 'currentDate'));
    }

    public function detailShow($id)
    {
        //
        $competition_list = DB::table('competition_lists')->WHERE('id', $id)->first();
        $count_clid = DB::table('teams')->WHERE('cl_id', $id)->join('competition_lists', 'teams.cl_id', '=', 'competition_lists.id')->groupBy('teams.cl_id')->select(DB::raw('COUNT(*) as count'))->count();
        $competition_amount = DB::table('competition_lists')->WHERE('id', $id)->value('competition_amount');
        $competitionAmountInt = (int) $competition_amount;

        return view('normal.competition_detail', compact('competition_list', 'count_clid', 'competitionAmountInt', ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        // return view('normal.contestants_create', compact('competition_list'));
    }

    public function createTeam($id)
    {
        //
        $competition_list = DB::table('competition_lists')->WHERE('id', $id)->pluck('amount_contestant')->first();
        $competition_list2 = DB::table('competition_lists')->WHERE('id', $id)->pluck('id')->first();
        return view('normal.contestants_create', compact('competition_list', 'competition_list2'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeData(StoreteamRequest $request, StorecontestantRequest $request1, $id)
    {
        //
        try {
            $competition_list = DB::table('competition_lists')->WHERE('id', $id)->pluck('id')->first();
            $amount_contestant = DB::table('competition_lists')->WHERE('id', $id)->pluck('amount_contestant')->first();

            $count_clid = DB::table('teams')->WHERE('cl_id', $id)->join('competition_lists', 'teams.cl_id', '=', 'competition_lists.id')->groupBy('teams.cl_id')->select(DB::raw('COUNT(*) as count'))->count();
            $competition_amount = DB::table('competition_lists')->WHERE('id', $id)->value('competition_amount');
            $competitionAmountInt = (int) $competition_amount;
            $config_team = ['table' => 'teams', 'length' => 8, 'prefix' => 'TEAM-'];
            $team_id = IdGenerator::generate($config_team);
            if ($count_clid < $competitionAmountInt) {
                $filename = '';
                if ($request->hasFile('logo')) {
                    $filename = $request->getSchemeAndHttpHost() . '/asset/img_logo/' . time() . '.' . $request->logo->extension();
                    $request->logo->move(public_path('/asset/img_logo'), $filename);
                }
                $teams = team::insert([
                    'id' => $team_id,
                    't_name' => $request->t_name,
                    'logo' => $filename,
                    't_date' => Carbon::now(),
                    'cl_id' =>  $competition_list,
                ]);
                switch ($amount_contestant) {
                    case ('1'):
                        $config_contestant = ['table' => 'contestants', 'length' => 8, 'prefix' => 'CON-'];
                        $new_cont_id = IdGenerator::generate($config_contestant);
                        $contesttantInsert1 = contestant::insert([
                            'id' => $new_cont_id,
                            'c_name' => $request1->c_name1,
                            'c_inGameName' => $request1->c_inGameName1,
                            'c_email' => $request1->c_email1,
                            'c_tel' => $request1->c_tel1,
                            't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                        ]);
                        return redirect()->route('contestants.index')->with('alert', [
                            'icon' => 'success',
                            'title' => 'ลงทะเบียนสำเร็จ',
                            'text' => 'ลงทะเบียนเรียบร้อยแล้ว',
                            'confirmButtonText' => 'OK',
                        ]);
                        break;

                    case ('2'):
                        for ($i = 0; $i < 2; $i++) {
                            $config_contestant = ['table' => 'contestants', 'length' => 8, 'prefix' => 'CON-'];
                            $new_cont_id = IdGenerator::generate($config_contestant); // สร้าง ID ใหม่ทุกครั้งก่อนที่จะ insert
                            $contesttantInsert = contestant::insert([
                                'id' => $new_cont_id,
                                'c_name' => $request->input('c_name' . $i),
                                'c_inGameName' => $request->input('c_inGameName' . $i),
                                'c_email' => $request->input('c_email' . $i),
                                'c_tel' => $request->input('c_tel' . $i),
                                't_id' => $team_id
                            ]);
                        }
                        return redirect()->route('contestants.index')->with('alert', [
                            'icon' => 'success',
                            'title' => 'ลงทะเบียนสำเร็จ',
                            'text' => 'ลงทะเบียนเรียบร้อยแล้ว',
                            'confirmButtonText' => 'OK',
                        ]);
                        break;

                    case ('3'):
                        for ($i = 0; $i < 3; $i++) {
                            $config_contestant = ['table' => 'contestants', 'length' => 8, 'prefix' => 'CON-'];
                            $new_cont_id = IdGenerator::generate($config_contestant); // สร้าง ID ใหม่ทุกครั้งก่อนที่จะ insert
                            $contesttantInsert = contestant::insert([
                                'id' => $new_cont_id,
                                'c_name' => $request->input('c_name' . $i),
                                'c_inGameName' => $request->input('c_inGameName' . $i),
                                'c_email' => $request->input('c_email' . $i),
                                'c_tel' => $request->input('c_tel' . $i),
                                't_id' => $team_id
                            ]);
                        }
                        return redirect()->route('contestants.index')->with('alert', [
                            'icon' => 'success',
                            'title' => 'ลงทะเบียนสำเร็จ',
                            'text' => 'ลงทะเบียนเรียบร้อยแล้ว',
                            'confirmButtonText' => 'OK',
                        ]);
                        return redirect()->route('contestants.index')->with('alert', [
                            'icon' => 'success',
                            'title' => 'ลงทะเบียนสำเร็จ',
                            'text' => 'ลงทะเบียนเรียบร้อยแล้ว',
                            'confirmButtonText' => 'OK',
                        ]);
                        break;
                    case ('4'):
                        for ($i = 0; $i < 4; $i++) {
                            $config_contestant = ['table' => 'contestants', 'length' => 8, 'prefix' => 'CON-'];
                            $new_cont_id = IdGenerator::generate($config_contestant);
                            $contesttantInsert = contestant::insert([
                                'id' => $new_cont_id,
                                'c_name' => $request->input('c_name' . $i),
                                'c_inGameName' => $request->input('c_inGameName' . $i),
                                'c_email' => $request->input('c_email' . $i),
                                'c_tel' => $request->input('c_tel' . $i),
                                't_id' => $team_id
                            ]);
                        }
                        return redirect()->route('contestants.index')->with('alert', [
                            'icon' => 'success',
                            'title' => 'ลงทะเบียนสำเร็จ',
                            'text' => 'ลงทะเบียนเรียบร้อยแล้ว',
                            'confirmButtonText' => 'OK',
                        ]);

                        break;
                    case ('5'):
                        for ($i = 1; $i <= 5; $i++) {
                            $config_contestant = ['table' => 'contestants', 'length' => 8, 'prefix' => 'CON-'];
                            $new_cont_id = IdGenerator::generate($config_contestant);
                            $contestantInsert = Contestant::insert([
                                'id' => $new_cont_id,
                                'c_name' => $request->input('c_name' . $i),
                                'c_inGameName' => $request->input('c_inGameName' . $i),
                                'c_email' => $request->input('c_email' . $i),
                                'c_tel' => $request->input('c_tel' . $i),
                                't_id' => $team_id
                            ]);
                        }
                        return redirect()->route('contestants.index')->with('alert', [
                            'icon' => 'success',
                            'title' => 'ลงทะเบียนสำเร็จ',
                            'text' => 'ลงทะเบียนเรียบร้อยแล้ว',
                            'confirmButtonText' => 'OK',
                        ]);
                        break;
                }
            } else {
                return redirect()->route('contestants.index')->with('status', 'MAXIMUM TEAM');
            }
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(team $team)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(team $team)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateteamRequest $request, team $team)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(team $team)
    {
        //
    }
}
