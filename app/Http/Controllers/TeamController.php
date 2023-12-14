<?php

namespace App\Http\Controllers;

use App\Models\team;
use App\Models\contestant;
use App\Http\Requests\StoreteamRequest;
use App\Http\Requests\UpdateteamRequest;
use App\Http\Requests\StorecontestantRequest;
use App\Http\Requests\UpdatecontestantRequest;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $competition_lists = DB::table('competition_lists')->get();
        // dd($competition_lists);
        return view('normal.grid_competition_list', compact('competition_lists'));
    }

    public function detailShow($id)
    {
        //
        $competition_list = DB::table('competition_lists')->WHERE('id', $id)->first();
        // dd($competition_list);
        return view('normal.competition_detail', compact('competition_list'));
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
        // dd($competition_list);
        $competition_list2 = DB::table('competition_lists')->WHERE('id', $id)->pluck('id')->first();
        // dd($competition_list2);
        return view('normal.contestants_create', compact('competition_list', 'competition_list2'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function storeData(StoreteamRequest $request ,StorecontestantRequest $request1, $id)
    {
        //
        $competition_list = DB::table('competition_lists')->WHERE('id', $id)->pluck('id')->first();
        $amount_contestant = DB::table('competition_lists')->WHERE('id', $id)->pluck('amount_contestant')->first();

        $teams = team::insert([
            't_name' => $request->t_name,
            // 'logo' => $request->logo,
            't_date' => Carbon::now(),
            'cl_id' =>  $competition_list,
        ]);


        switch($amount_contestant){
            case('1'):
                $contesttantInsert1 = contestant::insert([
                    'c_name' => $request1->c_name1,
                    'c_inGameName' => $request1->c_inGameName1,
                    'c_email' => $request1->c_email1,
                    'c_tel' => $request1->c_tel1,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
                // dd($contesttantInsert1);
            break;

            case('2'):
                $contesttantInsert1 = contestant::insert([
                    'c_name' => $request1->c_name1,
                    'c_inGameName' => $request1->c_inGameName1,
                    'c_email' => $request1->c_email1,
                    'c_tel' => $request1->c_tel1,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert2 = contestant::insert([
                    'c_name' => $request1->c_name2,
                    'c_inGameName' => $request1->c_inGameName2,
                    'c_email' => $request1->c_email2,
                    'c_tel' => $request1->c_tel2,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
                // dd($contesttantInsert1, $contesttantINsert2);
            break;
            case('3'):
                $contesttantInsert1 = contestant::insert([
                    'c_name' => $request1->c_name1,
                    'c_inGameName' => $request1->c_inGameName1,
                    'c_email' => $request1->c_email1,
                    'c_tel' => $request1->c_tel1,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert2 = contestant::insert([
                    'c_name' => $request1->c_name2,
                    'c_inGameName' => $request1->c_inGameName2,
                    'c_email' => $request1->c_email2,
                    'c_tel' => $request1->c_tel2,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert3 = contestant::insert([
                    'c_name' => $request1->c_name3,
                    'c_inGameName' => $request1->c_inGameName3,
                    'c_email' => $request1->c_email3,
                    'c_tel' => $request1->c_tel3,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
                // dd($contesttantInsert1, $contesttantINsert2, $contesttantINsert3);
            break;
            case('4'):
                $contesttantInsert1 = contestant::insert([
                    'c_name' => $request1->c_name1,
                    'c_inGameName' => $request1->c_inGameName1,
                    'c_email' => $request1->c_email1,
                    'c_tel' => $request1->c_tel1,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert2 = contestant::insert([
                    'c_name' => $request1->c_name2,
                    'c_inGameName' => $request1->c_inGameName2,
                    'c_email' => $request1->c_email2,
                    'c_tel' => $request1->c_tel2,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert3 = contestant::insert([
                    'c_name' => $request1->c_name3,
                    'c_inGameName' => $request1->c_inGameName3,
                    'c_email' => $request1->c_email3,
                    'c_tel' => $request1->c_tel3,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert4 = contestant::insert([
                    'c_name' => $request1->c_name4,
                    'c_inGameName' => $request1->c_inGameName4,
                    'c_email' => $request1->c_email4,
                    'c_tel' => $request1->c_tel4,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
                // dd($contesttantInsert1, $contesttantINsert2, $contesttantINsert3, $contesttantINsert4);
            break;
            case('5'):
                $contesttantInsert1 = contestant::insert([
                    'c_name' => $request1->c_name1,
                    'c_inGameName' => $request1->c_inGameName1,
                    'c_email' => $request1->c_email1,
                    'c_tel' => $request1->c_tel1,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert2 = contestant::insert([
                    'c_name' => $request1->c_name2,
                    'c_inGameName' => $request1->c_inGameName2,
                    'c_email' => $request1->c_email2,
                    'c_tel' => $request1->c_tel2,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert3 = contestant::insert([
                    'c_name' => $request1->c_name3,
                    'c_inGameName' => $request1->c_inGameName3,
                    'c_email' => $request1->c_email3,
                    'c_tel' => $request1->c_tel3,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert4 = contestant::insert([
                    'c_name' => $request1->c_name4,
                    'c_inGameName' => $request1->c_inGameName4,
                    'c_email' => $request1->c_email4,
                    'c_tel' => $request1->c_tel4,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
        
                $contesttantINsert5 = contestant::insert([
                    'c_name' => $request1->c_name5,
                    'c_inGameName' => $request1->c_inGameName5,
                    'c_email' => $request1->c_email5,
                    'c_tel' => $request1->c_tel5,
                    't_id' => DB::table('teams')->orderBy('id', 'desc')->first()->id
                ]);
                // dd($contesttantInsert1, $contesttantINsert2, $contesttantINsert3, $contesttantINsert4, $contesttantINsert5);
            break;    
        }


        
        return redirect()->route('contestants.index')->with('status', 'Insert Complete');
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
