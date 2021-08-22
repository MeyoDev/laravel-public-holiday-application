<?php

namespace App\Exceptions;

use Exception;

class PublicHolidayExceptionHandler extends Exception
{
    /**
     *
     * @param string $message
     * @return \Illuminate\View\View
     */
    public static function badRequest($message)
    {
        return view('errors.400', ['error_message' => $message]);
    }
}
