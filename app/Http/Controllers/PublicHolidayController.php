<?php

namespace App\Http\Controllers;

use App\Services\PublicHolidayService;

class PublicHolidayController extends Controller
{
    /** @var PublicHolidayService */
    private $publicHolidayService;

    public function __construct(PublicHolidayService $publicHolidayService)
    {
        $this->publicHolidayService = $publicHolidayService;
    }

    /**
     *
     * @param int $year
     * @return \Illuminate\View\View
     */
    public function getHolidays(int $year)
    {
        $holidays = $this->publicHolidayService->requestHolidays($year);

        return view('holidays', [
            'public_holidays' => $holidays
        ]);
    }
}
