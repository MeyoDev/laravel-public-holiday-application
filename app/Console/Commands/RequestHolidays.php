<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;

class RequestHolidays extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'api:public_holidays';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Request public holidays from kayaposoft api';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     *
     * @param int $year
     * @return object;
     */
    public function handle(int $year) :object
    {
        return Http::get(env("KAYAPOSOFT_API"), [
            'action' => 'getHolidaysForYear',
            'year' => $year,
            'country' => 'zaf',
            'holidayType' => 'public_holiday'
        ]);
    }
}
