<?php

namespace App\Http\Controllers;

use App\Exceptions\PublicHolidayExceptionHandler;
use App\Services\PublicHolidayService;
use Carbon\Carbon;

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
        $response = $this->publicHolidayService->requestHolidays($year);

        if (array_key_exists("error", $response)){
            return PublicHolidayExceptionHandler::badRequest($response["error"]);
        }

        return view('holidays', [
            'public_holidays' => $response,
            'year' => $year
        ]);
    }
}
