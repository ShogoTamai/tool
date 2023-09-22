<?php

namespace App\Http\Controllers;

use Google_Client;
use Google_Service_Calendar;
use Google_Service_Calendar_Event;
use Illuminate\Http\Request;
use App\Http\Requests\CalendarRequest;
use App\Models\Company;
use App\Models\Calendar;
use Illuminate\Support\Facades\Auth;

class ApiController extends Controller
{
    public function create(Company $company){
        return view("calendar.create")->with(["company"=>$company]);
    }
    public function store(CalendarRequest $request, Calendar $calendar)
    {
        $client = $this->getClient();
        $service = new Google_Service_Calendar($client);

        $calendarId = env('GOOGLE_CALENDAR_ID');
        
        $data = $request['calendar'];
        $company = Company::find($data['companyId']);
        $calendar->fill($data);
        $calendar->summary = $company->name;
        $calendar->user_id = Auth::id();
        $calendar->save();
        $company->update(["calendar_id"=>$calendar->id]);

        $event = new Google_Service_Calendar_Event(array(
            //タイトル
            'summary' => $company->name,
            'start' => array(
                // 開始日時
                'date' => $data['start'],
            ),
            'end' => array(
                // 終了日時
                 'date' => date('Y-m-d', strtotime($data['end']. ' + 1 days')),
            )
        ));

        $event = $service->events->insert($calendarId, $event);
        return redirect('/');
    }

    private function getClient()
    {
        $client = new Google_Client();

        //アプリケーション名
        $client->setApplicationName('GoogleCalendarAPIのテスト');
        //権限の指定
        $client->setScopes(Google_Service_Calendar::CALENDAR_EVENTS);
        //JSONファイルの指定
        $client->setAuthConfig(storage_path('app/api-key/jhmt-399405-098941565ab6.json'));

        return $client;
    }
}
