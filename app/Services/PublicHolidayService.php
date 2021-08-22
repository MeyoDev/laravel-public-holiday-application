<?php

namespace App\Services;

use App\Console\Commands\RequestHolidays;
use App\Models\PublicHoliday;
use Carbon\Carbon;

class PublicHolidayService
{
    /**
     *
     * @param  int  $year
     * @return array
     */
    public function requestHolidays(int $year) : array
    {

        $holidays = $this->getHolidaysFromDBbyYear($year);

        if (empty($holidays)) {
            $request = new RequestHolidays();
            $response = $request->handle($year);

            $holidays = json_decode($response->getBody()->getContents(), true);

            if (!array_key_exists("error", $holidays)) {
                $this->saveHolidays($holidays);

                $holidays = $this->getHolidaysFromDBbyYear($year);
            }
        }

        return $holidays;
    }

    /**
     *
     * @param  int  $year
     * @return array
     */
    public function getHolidaysByYear(int $year) : array
    {
        return $this->getHolidaysFromDBbyYear($year);
    }

    /**
     *
     * @param  int  $year
     * @return array
     */
    private function getHolidaysFromDBbyYear(int $year) : array
    {
        return PublicHoliday::select('ph_name', 'ph_day', 'ph_month', 'ph_year', 'ph_day_of_week')
                ->where('ph_year', $year)
                ->get()
                ->toArray();
    }

    /**
     *
     * @param  array  $publicHolidays
     * @return void
     */
    private function saveHolidays(array $publicHolidays) : void
    {
        foreach($publicHolidays as $holiday){
            $uniqueIdentifierHash = md5(json_encode($holiday["date"]));

            PublicHoliday::insertOrIgnore([
                'ph_name' => $holiday["name"][0]["text"],
                'ph_day' => $holiday["date"]["day"],
                'ph_month' => $holiday["date"]["month"],
                'ph_year' => $holiday["date"]["year"],
                'ph_day_of_week' => $this->getWeekDay($holiday["date"]["dayOfWeek"]),
                'ph_hash' => $uniqueIdentifierHash,
                'created_at' => Carbon::now()
            ]);
        }
    }

    /**
     *
     * @param  int  $day
     * @return string
     */
    private function getWeekDay(int $day) : string
    {
        $weekdays = [
            'Monday',
            'Tuesday',
            'Wednesday',
            'Thursday',
            'Friday',
            'Saturday',
            'Sunday'
        ];

        return $weekdays[$day - 1];
    }
}
