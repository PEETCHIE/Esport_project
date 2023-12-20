<?php

namespace App\Http\Controllers;

use App\Models\tournament_manager;
use App\Http\Requests\Storetournament_managerRequest;
use App\Http\Requests\Updatetournament_managerRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class TournamentManagerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('managerRegister.tournament_manager');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('managerRegister.tournament_manager');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Storetournament_managerRequest $request)
    {
        //
        $config = ['table'=>'tournament_managers', 'length'=>8, 'prefix'=>'TMG-'];
        $id = IdGenerator::generate($config);
        $managerRegister = tournament_manager::insert([
            'id' => $id,
            'coordinator_name' => $request->coordinator_name,
            'organization_name' => $request->organization_name,
            'organization_detail' => $request->organization_detail,
            'coordinator_detail' => $request->coordinator_detail,
            'date' => Carbon::now(),
            'email' => $request->email,
            'tel' => $request->tel,
            'permission' => 0,
            'user_id' => auth()->id()
        ]);

        return back()->with('status','ลงทะเบียนสำเร็จ');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
        $list_tmg = DB::table('tournament_managers')->get();
        return view('/admin/list_tmg', compact('list_tmg'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(tournament_manager $tournament_manager)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update_confirm($id)
    {
        //
        $update = DB::table('tournament_managers')->WHERE('id',$id)->update(['permission' => '1']);
        $list_manager = DB::table('tournament_managers')->GET()->WHERE('id',$id);
        foreach ($list_manager as $list_managers) {
            $list_user = DB::table('users')->GET()->WHERE('id',$list_managers->user_id);
            $sql = DB::table('users')->WHERE('id',$list_managers->user_id)->update(['role' => 'manager']);
        };
        return redirect()->route('list_tmg')->with('success', 'UPDATE COMPLETE.');
    }

    public function update_cancel($id)
    {
        //
        $update = DB::table('tournament_managers')->WHERE('id',$id)->update(['permission' => '2']);
        $list_manager = DB::table('tournament_managers')->GET()->WHERE('id',$id);
        foreach ($list_manager as $list_managers) {
            $list_user = DB::table('users')->GET()->WHERE('id',$list_managers->user_id);
            $sql = DB::table('users')->WHERE('id',$list_managers->user_id)->update(['role' => 'normal']);
        };
        return redirect()->route('list_tmg')->with('success', 'UPDATE COMPLETE.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(tournament_manager $tournament_manager)
    {
        //
    }
}
