<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class TwitchController extends Controller
{
    public function getStreams()
    {
        $client = new Client();

        $response = $client->post('https://id.twitch.tv/oauth2/token', [
            'form_params' => [
                'client_id' => 'o820icjbnsjeaakmqhbd9b8ixhyjy5',
                'client_secret' => 'qramblbghvadqjqwvzhm8ivhwed36r',
                'grant_type' => 'client_credentials'
            ]
        ]);

        $accessToken = json_decode($response->getBody()->getContents(), true)['access_token'];

        $response = $client->get('https://api.twitch.tv/helix/streams?user_login=peetchie', [
            'headers' => [
                'Authorization' => 'Bearer ' . $accessToken,
                'Client-ID' => 'o820icjbnsjeaakmqhbd9b8ixhyjy5'
            ]
        ]);

                // แปลงข้อมูล JSON ใน response เป็น array
                $data = json_decode($response->getBody()->getContents(), true);
                // dd($data);
                // ส่งข้อมูลสตรีมกลับไปยัง view
                return view('streams', ['streams' => $data['data']]);
    }
}
