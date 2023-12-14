<?php

namespace App\Http\Controllers\NormalPanel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NormalController extends Controller
{
    //
    public function index(){
        return view('normal.normal_home');
    }
}
