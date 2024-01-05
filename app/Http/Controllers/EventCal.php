<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;

class EventCal extends Controller
{
    public function calendar(Request $request)
    {

        $dateStart = Carbon::create(2024, 4, 5, 17, 0, 0, 'Australia/Adelaide')->setTimezone('UTC');
        $dateEnd = Carbon::create(2024, 4, 5, 23, 0, 0, 'Australia/Adelaide')->setTimezone('UTC');

        $event = Event::create()
            ->name("Andrew & Negin's Wedding")
            ->addressName('Beach Road Wines')
            ->address('309 Seaview Road, McLaren Vale SA 5171')
            ->startsAt($dateStart)
            ->endsAt($dateEnd);

        $cal = Calendar::create("Andrew & Negin's Wedding")
            ->event($event)->get();

        // Modify file response
        return response($cal, 200, [
            'Content-Type' => 'text/calendar',
            'Content-Disposition' => 'inline; filename="wedding-invite.ics"',
            'charset' => 'utf-8',
            'Pragma' => 'public',
            'Cache-Control' => 'max-age=1',
            'Expires' => '0',
        ]);
    }

}
