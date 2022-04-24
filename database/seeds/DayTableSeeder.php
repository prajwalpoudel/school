<?php

use App\Services\General\DayService;
use Illuminate\Database\Seeder;

class DayTableSeeder extends Seeder
{
    /**
     * @var DayService
     */
    private $dayService;

    /**
     * DayTableSeeder constructor.
     * @param DayService $dayService
     */
    public function __construct(DayService $dayService)
    {
        $this->dayService = $dayService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $days = [
            [
                'name' => 'Sunday'
            ],
            [
                'name' => 'Monday'
            ],
            [
                'name' => 'Tuesday'
            ],
            [
                'name' => 'Wednesday'
            ],
            [
                'name' => 'Thursday'
            ],
            [
                'name' => 'Friday'
            ],
            [
                'name' => 'Satday'
            ]
        ];

        foreach ($days as $day) {
            $this->dayService->updateOrCreate(['name' => $day['name']], $day);
        }
    }
}
