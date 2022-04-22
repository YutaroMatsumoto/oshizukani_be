<?php

namespace App\Http\Controllers;

use Google_Client;
// Google_Clientの利用は以下のようにも書ける
// use Google\Client;
// use Google\Client as Google_Client2;
use Google\Service\Calendar;

class GoogleCalenderApiController extends Controller
{
    public function confirmIsMtg()
    {
        $isNowMtg = false;

        $client = new Google_Client();
        $jsonPath = resource_path('googleApi/vernal-house-337101-f094a285d305.json');
        
        $client->setApplicationName('カレンダー操作テスト イベントの取得');

        $client->setScopes(Calendar::CALENDAR_READONLY);
        $client->setAuthConfig($jsonPath);
        $service = new Calendar($client);
        
        $calendarId = "5s483a3k7fucdcrha95laivuvs@group.calendar.google.com";

        // 今の日時（日時まで取得する）
        // -1分しないと終了時間ちょうどの日時の時に会議の予定が取れない
        $today = date('Y-m-d H:i:00', strtotime('-1 min'));

        // 明日の日付
        $tomorrow = date('Y-m-d', strtotime('+1 day'));

        $optionParams = array(
            'maxResults' => 10,
            'orderBy' => 'startTime',
            'singleEvents' => true,
            'timeMin' => date('c', strtotime($today)),  // ISO8601 フォーマット日付
            'timeMax' => date('c', strtotime($tomorrow)) // ISO8601 フォーマット日付
        );

        $results = $service->events->listEvents($calendarId, $optionParams);
        $events = $results->getItems();

        if ($events) {
            // eventがある場合、event[0]のstart（today > event[0]->start）が今の時間よりも前なら今は会議中となる
            $firstEventDate = date('Y-m-d H:i:s', strtotime($events[0]->start->dateTime));
            if(strtotime($today) > strtotime($firstEventDate)) {
                $isNowMtg = true;
            }
        }

        return $isNowMtg ? 'true' : 'false';
    }
}
