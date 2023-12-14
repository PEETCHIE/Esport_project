<?php

namespace App\Http\Controllers\ManagerPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ManagerController extends Controller
{
    //
    public function index(){
        return view('manager.manager_home');
    }
}
