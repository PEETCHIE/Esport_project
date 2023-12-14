<?php

namespace App\Http\Controllers;

use App\Models\contestant;
use App\Http\Requests\StorecontestantRequest;
use App\Http\Requests\UpdatecontestantRequest;

class ContestantController extends Controller
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
