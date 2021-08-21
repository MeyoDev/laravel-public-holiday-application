<?php

namespace App\Http\Controllers;

use App\Console\Commands\RequestHolidays;
use App\Models\PulicHoliday;
use Illuminate\Http\Request;

class PublicHolidayController extends Controller
{
    /**
     *
     * @param  int  $year
     * @return \Illuminate\View\View
     */
    public function getHolidays(int $year)
    {
        $request = new RequestHolidays();
        $response = $request->handle($year);

        $holidays = json_decode($response->getBody()->getContents(), true);

        $this->saveHolidays($holidays);

        return view('holidays', [
            'public_holidays' => $holidays
        ]);
    }

    /**
     *
     * @param  array  $publicHolidays
     * @return void
     */
    private function saveHolidays(array $publicHolidays) : void
    {
        foreach($publicHolidays as $holiday){
            PulicHoliday::insertOrIgnore([
                'ph_name' => $holiday["name"][0]["text"],
                'ph_day' => $holiday["date"]["day"],
                'ph_month' => $holiday["date"]["month"],
                'ph_year' => $holiday["date"]["year"],
                'ph_day_of_week' => $holiday["date"]["dayOfWeek"]
            ]);
        }
    }
}
