<?php

namespace App\Http\Controllers;

use App\Models\competition_list;
use App\Models\team;
use App\Http\Requests\Storecompetition_listRequest;
use App\Http\Requests\Updatecompetition_listRequest;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\chunk;
use Illuminate\Support\Facades\Storage;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Carbon\Carbon;
use RealRashid\SweetAlert\Facades\Alert;

class CompetitionListController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $id = Auth()->id();
        $tm_id = DB::table('tournament_managers')->where('user_id', $id)->pluck('id')->first();
        $list_competitions = DB::table('competition_lists')->get()->WHERE('tm_id', $tm_id);
        $currentDate = Carbon::now();

        return view('manager.competition_table', compact('list_competitions','currentDate'));
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
        $id = Auth()->id();
        $tm_id = DB::table('tournament_managers')->where('user_id', $id)->pluck('id')->first();
        // dd($tm_id);
        $filename = '';
        if($request->hasFile('cl_img')){
            $filename = $request->getSchemeAndHttpHost(). '/asset/img/' . time() . '.' . $request->cl_img->extension();
            $request->cl_img->move(public_path('/asset/img'), $filename);
        } 
        // dd($filename);
        $config_competition_list = ['table'=>'competition_lists', 'length'=>8, 'prefix'=>'CPL-'];
        $competition_list_id = IdGenerator::generate($config_competition_list);
        // dd($competition_list_id );
        $competition_store = competition_list::insert([
            'id' => $competition_list_id,
            'competition_name' => $request->competition_name,
            'opening_date' => $request->opening_date,
            'end_date' => $request->end_date,
            'game_name' => $request->game_name,
            'start_date' => $request->start_date,
            'competition_end_date' => $request->competition_end_date,
            'competition_amount' => $request->competition_amount,
            'competition_rule' => $request->competition_rule,
            'competition_type' => '1',
            'cl_round' => $request->cl_round,
            'amount_contestant' => $request->amount_contestant,
            'cl_img' => $filename,
            'tm_id' => $tm_id, 
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
        $currentDate = Carbon::now();
        $date = competition_list::find($id);
        $expiryDate = Carbon::parse($date->opening_date);
        // dd($expiryDate);
        if($currentDate > $expiryDate){
            return redirect()->route('managers_competition.index')->with('status', 'ไม่สามารถแก้ไขข้อมูลได้');
        }else{
            // dd($currentDate);
            $filename = '';
            if($request->hasFile('cl_img')){
                $filename = $request->getSchemeAndHttpHost(). '/asset/img/' . time() . '.' . $request->cl_img->extension();
                $request->cl_img->move(public_path('/asset/img'), $filename);
            } 
            $data = DB::table('competition_lists')->WHERE('id', $id)->update([
                'competition_name'=> $request->competition_name,
                'opening_date'=> $request->opening_date,
                'end_date'=> $request->end_date,
                'game_name'=> $request->game_name,
                'start_date'=> $request->start_date,
                'competition_end_date'=> $request->competition_end_date,
                'competition_amount'=> $request->competition_amount,
                'competition_rule'=> $request->competition_rule,
                'competition_type'=> '1',
                'cl_round'=> $request->cl_round,
                'amount_contestant' => $request->amount_contestant,
                'cl_img' => $filename,
            ]);
            // dd($data);
            return redirect()->route('managers_competition.index')->with('status', 'แก้ไขรายการแข่งเรียบร้อย');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        //
        
        $cl_id = DB::table('teams')->WHERE('cl_id', $id)->get('cl_id')->first();
        // dd($cl_id);
        if ($cl_id) {
            // Alert::error('Message','ไม่สามารถลบข้อมูลได้เนื่องจากมีทีมเข้าร่วใการแข่งขันแล้ว');
            return redirect()->route('managers_competition.index')->with('alert', [
                'icon' => 'error',
                'title' => 'ไม่สามารถลบข้อมูลได้',
                'text' => 'คุณไม่สามารถลบข้อมูลได้เนื่องจากมีทีมเข้าแข่งขันแล้ว',
            ]);;
        } else {
            $destroy = DB::table('competition_lists')->WHERE('id', $id)->delete();
            // Alert::success('Message','ลบรายการแข่งเรียบร้อย');
            return redirect()->route('managers_competition.index')->with('alert', [
                'icon' => 'success',
                'title' => 'ลบรายการแข่งขันเรียบร้อย',
                'text' =>  'รายการแข่งขันถูกลบเรียบร้อย',
            ]);
        }
        
    }
}
