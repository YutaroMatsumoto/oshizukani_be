<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service;
use Google_Service_Calendar;
use Illuminate\Http\Request;


class HelloController extends Controller
{
    //
    public function hello()
    {
        logger('あいうえお');
        $client = new Google_Client();
        // $json = file_get_contents();
        $jsonPath = resource_path('googleApi/vernal-house-337101-f094a285d305.json');
        logger($jsonPath);
        $client->setApplicationName('カレンダー操作テスト イベントの取得');

        $client->setScopes(Google_Service_Calendar::CALENDAR_READONLY);

        $client->setAuthConfig($jsonPath);
        // $service = new Google_Service_Calendar();
        return view('welcome');
    }
}
