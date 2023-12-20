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
        return view('normal.grid_teamlist', compact('team_lists'));
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
