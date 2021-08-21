<?php

namespace Tests\Feature;

use App\Console\Commands\RequestHolidays;
use Tests\TestCase;

use function PHPUnit\Framework\assertEquals;
use function PHPUnit\Framework\assertNotNull;

class RequestHolidaysTest extends TestCase
{
    /**
     *
     * @return void
     */
    public function test_shouldReturnStatus200_and_shouldHaveDataStructure()
    {
        $request = new RequestHolidays();

        $response = $request->handle(2021);

        assertEquals(json_decode($response->getStatusCode()), 200);
    }

    /**
     *
     * @return void
     */
    public function test_shouldNotReturnNull()
    {
        $request = new RequestHolidays();

        $response = $request->handle(2021);

        assertNotNull($response);
    }
}
