<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use App\Models\YoutubeChannel;
use Google\Service\YouTube\Resource\Youtube;

class TwitchController extends Controller
{
    public function getStreams()
    {
        try {
            $id = Auth()->id();
            $tm_id = DB::table('tournament_managers')->where('user_id', $id)->pluck("id")->first();
            $credentials = DB::table('stream_twitch_api')->where('tm_id', $tm_id)->get();
            $streamsData = [];
            foreach ($credentials as $credential) {
                $twitchClientId = $credential->twitch_client_id;
                $twitchClientSecret = $credential->twitch_client_secret;
                $twitchUsernames = explode(',', $credential->twitch_username);
                if (is_array($twitchUsernames)) {
                    foreach ($twitchUsernames as $username) {
                        $client = new Client();
                        $response = $client->post('https://id.twitch.tv/oauth2/token', [
                            'form_params' => [
                                'client_id' => $twitchClientId,
                                'client_secret' => $twitchClientSecret,
                                'grant_type' => 'client_credentials',
                            ]
                        ]);
                        $accessToken = json_decode($response->getBody()->getContents(), true)['access_token'];

                        $response = $client->get('https://api.twitch.tv/helix/streams?user_login=' . $username, [
                            'headers' => [
                                'Authorization' => 'Bearer ' . $accessToken,
                                'Client-ID' => $twitchClientId,
                            ]
                        ]);

                        // แปลงข้อมูล JSON ใน response เป็น array
                        $data = json_decode($response->getBody()->getContents(), true);
                        $streamsData[$username] = $data['data'];
                    }
                } else {
                    dd('Error: $twitchUsernames is not an array.');
                }
            }
            return view('streams', compact('streamsData'));
        } catch (\Exception $e) {
            Log::debug($e->getMessage());
            echo $e->getMessage();
        }
    }

    public function formTwitch()
    {
        return view('manager.livestream_form');
    }

    public function storeTwitchAPI(Request $request)
    {
        try {
            $id = Auth()->id();
            $tm_id = DB::table('tournament_managers')->where('user_id', $id)->pluck('id')->first();
            if ($request->isMethod('post')) {
                $config_LST_ID = ['table' => 'stream_twitch_api', 'length' => 8, 'prefix' => 'LST-'];
                $lst_id = IdGenerator::generate($config_LST_ID);

                DB::table('stream_twitch_api')->insert([
                    'id' => $lst_id,
                    'platform_name' => 'TWITCH',
                    'twitch_client_id' => $request->twitch_clientId,
                    'twitch_client_secret' => $request->twitch_clientSecret,
                    'twitch_username' => $request->twitch_username,
                    'tm_id' => $tm_id
                ]);

                return redirect()->route('manager.home')->with('alert', [
                    'icon' => 'success',
                    'title' => 'Success!!',
                    'text' => 'บันทึกข้อมูลสำเร็จ',
                ]);
            } else {
                return back()->with('alert', [
                    'icon' => 'error',
                    'title' => 'Failed!!',
                    'text' => 'ไม่สามารถบันทึกข้อมูลได้',
                ]);
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('alert', [
                'icon' => 'error',
                'title' => 'Failed!!',
                'text' => $e->getMessage(),
            ]);
        }
    }

    public function formYoutube()
    {
        return view('manager.livestream_yt_form');
    }

    public function storeYoutubeAPI(Request $request)
    {

        try {
            $request->validate([
                'channel_name' => 'required',
                'channel_id' => 'required|unique:stream_youtube_api',
                'api_key' => 'required|unique:stream_youtube_api',
            ]);

            $config_LSY_ID = ['table' => 'stream_youtube_api', 'length' => 8, 'prefix' => 'LSY-'];
            $lsy_id = IdGenerator::generate($config_LSY_ID);

            DB::table('stream_youtube_api')->insert([
                'id' => $lsy_id,
                'channel_name' => $request->channel_name,
                'channel_id' => $request->channel_id,
                'api_key' => $request->api_key,
            ]);

            return redirect()->route('manager.home')->with('alert', [
                'icon' => 'success',
                'title' => 'Success!!',
                'text' => 'บันทึกข้อมูลสำเร็จ',
            ]);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            return back()->with('alert', [
                'icon' => 'error',
                'title' => 'Failed!!',
                'text' => $e->getMessage(),
            ]);
        }
    }

    public function fetechStreamYoutube()
    {
        try {
            $yt_streams = DB::table('stream_youtube_api')->get();
            return view('yt_stream', compact('yt_streams'));
        } catch (\Exception $e) {
            Log::error($e->getMessage());
            echo $e->getMessage();
        }
    }
}
