<?php

use App\Services\General\GradeService;
use Illuminate\Database\Seeder;

class GradeSeeder extends Seeder
{
    /**
     * @var GradeService
     */
    private $gradeService;

    /**
     * GradeSeeder constructor.
     * @param GradeService $gradeService
     */
    public function __construct(GradeService $gradeService)
    {
        $this->gradeService = $gradeService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $grades = [
            [
                'name' => 'Nursery',
                'display_name' => 'Nursery',
            ],
            [
                'name' => 'KG',
                'display_name' => 'KG',
            ],
            [
                'name' => 'One',
                'display_name' => 'One',
            ],
            [
                'name' => 'Two',
                'display_name' => 'Two',
            ],
            [
                'name' => 'Three',
                'display_name' => 'Three',
            ],
            [
                'name' => 'Four',
                'display_name' => 'Four',
            ],
            [
                'name' => 'Five',
                'display_name' => 'Five',
            ],
            [
                'name' => 'Six',
                'display_name' => 'Six',
            ],
            [
                'name' => 'Seven',
                'display_name' => 'Seven',
            ],
            [
                'name' => 'Eight',
                'display_name' => 'Eight',
            ],
            [
                'name' => 'Nine',
                'display_name' => 'Nine',
            ],
            [
                'name' => 'Ten',
                'display_name' => 'Ten',
            ]
        ];

        foreach ($grades as $grade) {
            $this->gradeService->updateOrCreate(['name' => $grade['name'], 'display_name' => $grade['display_name']], $grade);
        }
    }
}
