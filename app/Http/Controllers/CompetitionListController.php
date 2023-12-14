<?php

namespace App\Http\Controllers;

use App\Models\competition_list;
use App\Http\Requests\Storecompetition_listRequest;
use App\Http\Requests\Updatecompetition_listRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\chunk;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Str;

class CompetitionListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $list_competitions = DB::table('competition_lists')->get();
        // collect($list_competitions)->chunk(2);
        return view('manager.competition_table', compact('list_competitions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('manager.competition_create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storecompetition_listRequest $request)
    {
        //
        // $name = $request->file('cl_img')->getClientOriginalExtension();
        // $newName = $request->competition_name.'.'.$name;
        
        // dd($newName);

        $competition_store = competition_list::insert([
            'competition_name' => $request->competition_name,
            'opening_date' => $request->opening_date,
            'end_date' => $request->end_date,
            'game_name' => $request->game_name,
            'start_date' => $request->start_date,
            'competition_end_date' => $request->competition_end_date,
            'competition_amount' => $request->competition_amount,
            'competition_rule' => $request->competition_rule,
            'competition_type' => $request->competition_type,
            'cl_round' => $request->cl_round,
            'amount_contestant' => $request->amount_contestant,
            // 'cl_img' => $newName,
        ]);
        // dd($competition_store);
       return redirect()->route('managers_competition.index')->with('status', 'เพิ่มรายการแข่งเรียบร้อย');
    }

    /**
     * Display the specified resource.
     */
    public function show(competition_list $competition_list)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        //
        $competition_list = DB::table('competition_lists')->WHERE('id', $id)->first();
        // dd($competition_list);
        return  view('manager/competition_edit', compact('competition_list'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Updatecompetition_listRequest $request, competition_list $competition_list, $id)
    {
        //
        $data = DB::table('competition_lists')->WHERE('id', $id)->update([
            'competition_name'=> $request->competition_name,
            'opening_date'=> $request->opening_date,
            'end_date'=> $request->end_date,
            'game_name'=> $request->game_name,
            'start_date'=> $request->start_date,
            'competition_end_date'=> $request->competition_end_date,
            'competition_amount'=> $request->competition_amount,
            'competition_rule'=> $request->competition_rule,
            'competition_type'=> $request->competition_type,
            'cl_round'=> $request->cl_round,
            'amount_contestant' => $request->amount_contestant,
        ]);
        // dd($data);
        return redirect()->route('managers_competition.index')->with('status', 'แก้ไขรายการแข่งเรียบร้อย');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        $destroy = DB::table('competition_lists')->WHERE('id', $id)->delete();
        // dd($destroy);
        return redirect()->route('managers_competition.index')->with('status', 'ลบรายการแข่งเรียบร้อย');
    }
}
