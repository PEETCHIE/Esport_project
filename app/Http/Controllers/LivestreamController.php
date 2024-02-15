<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livestream;
use Google_Client;
use Google_Service_YouTube;
use Google_Service_YouTube_LiveBroadcast;
use Google_Service_YouTube_LiveBroadcastSnippet;
use Google_Service_YouTube_LiveBroadcastStatus;



class LivestreamController extends Controller
{
    //
    public function index()
    {
        return view('manager.livestream');
    }

    public function show(Request $request)
    {
        $youtubeLink = $request->input('youtube_link');
        return view('manager.livestream', compact('youtubeLink'));
    }
}
