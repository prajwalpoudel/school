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
                'name' => '1',
                'display_name' => 'One',
            ],
            [
                'name' => '2',
                'display_name' => 'Two',
            ],
            [
            'name' => '3',
            'display_name' => 'Three',
            ]
        ];

        foreach ($grades as $grade) {
            $this->gradeService->updateOrCreate(['name' => $grade['name'], 'display_name' => $grade['display_name']], $grade);
        }
    }
}
