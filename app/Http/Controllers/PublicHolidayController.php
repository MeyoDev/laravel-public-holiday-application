<?php

namespace App\Http\Controllers;

use App\Exceptions\PublicHolidayExceptionHandler;
use App\Services\PublicHolidayService;
use Barryvdh\DomPDF\Facade as PDF;

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

    /**
     *
     * @param int $year
     * @return \Illuminate\View\View
     */
    public function downloadHolidaysPDF(int $year)
    {
        $response = $this->publicHolidayService->getHolidaysByYear($year);

        if (empty($response)) {
            $message = "Public holiday data unavailable for your request";

            return PublicHolidayExceptionHandler::badRequest($message);
        }


        $pdf = PDF::loadView('pdf.holidays', [
            'public_holidays' => $response,
            'year' => $year
        ]);

        return $pdf->download('public_holidays_' . $year . '.pdf');
    }
}
