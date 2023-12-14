<?php

namespace App\Http\Controllers;

use App\Models\tournament_manager;
use App\Http\Requests\Storetournament_managerRequest;
use App\Http\Requests\Updatetournament_managerRequest;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
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
            'agency' => $request->agency,
            'agency_tel' => $request->agency_tel,
            'agency_email' => $request->agency_email,
            'manager_name' => $request->manager_name,
            'manager_tel' => $request->manager_tel,
            'manager_email' => $request->manager_email,
            'coordinator_name' => $request->coordinator_name,
            'coordinator_tel' => $request->coordinator_tel,
            'coordinator_email' => $request->coordinator_email,
            'coordinator_line' => $request->coordinator_line,
            'tm_date' => $request->date,
            'coordinator_address' => $request->coordinator_address,
            'permission' => 0,
            'user_id' => auth()->id()
        ]);

        return view('/managerRegister/alert')->with('status','ลงทะเบียนสำเร็จ');
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
