<?php

namespace App\Http\Controllers;

use App\Models\competition_results;
use App\Http\Requests\Storecompetition_resultsRequest;
use App\Http\Requests\Updatecompetition_resultsRequest;

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
    public function store(Storecompetition_resultsRequest $request)
    {
        //
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
