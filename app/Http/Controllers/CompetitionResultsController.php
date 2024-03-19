<?php

namespace App\Http\Controllers;

use App\Models\competition_results;
use App\Http\Requests\Storecompetition_resultsRequest;
use App\Http\Requests\Updatecompetition_resultsRequest;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;

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
    public function store($id)
    {
        //
        $tit_ids = DB::table('tournament_in_teams')->where('t_id', $id)->pluck('id')->toArray();
        $RS_Update = DB::table('competition_results')
            ->whereIn('tit_id', $tit_ids)
            ->increment('score', 1);

        return redirect()->back();
        // dd($RS_Update);
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
