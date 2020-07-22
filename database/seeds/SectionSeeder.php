<?php

use App\Services\General\SectionService;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * @var SectionService
     */
    private $sectionService;

    /**
     * SectionSeeder constructor.
     * @param SectionService $sectionService
     */
    public function __construct(SectionService $sectionService)
    {
        $this->sectionService = $sectionService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $sections = [
            [
                'grade_id' => 1,
                'name' => 'A',
            ],
            [
                'grade_id' => 1,
                'name' => 'B',
            ],
            [
                'grade_id' => 2,
                'name' => 'A',
            ],
            [
                'grade_id' => 2,
                'name' => 'B',
            ],
            [
                'grade_id' => 3,
                'name' => 'A',
            ],
            [
                'grade_id' => 3,
                'name' => 'B',
            ],
            [
                'grade_id' => 4,
                'name' => 'A',
            ],
            [
                'grade_id' => 4,
                'name' => 'B',
            ],
            [
                'grade_id' => 5,
                'name' => 'A',
            ],
            [
                'grade_id' => 5,
                'name' => 'B',
            ],
            [
                'grade_id' => 6,
                'name' => 'A',
            ],
            [
                'grade_id' => 6,
                'name' => 'B',
            ],
            [
                'grade_id' => 7,
                'name' => 'A',
            ],
            [
                'grade_id' => 7,
                'name' => 'B',
            ],
            [
                'grade_id' => 8,
                'name' => 'A',
            ],
            [
                'grade_id' => 8,
                'name' => 'B',
            ],
            [
                'grade_id' => 9,
                'name' => 'A',
            ],
            [
                'grade_id' => 9,
                'name' => 'B',
            ],
            [
                'grade_id' => 10,
                'name' => 'A',
            ],
            [
                'grade_id' => 10,
                'name' => 'B',
            ],
            [
                'grade_id' => 11,
                'name' => 'A',
            ],
            [
                'grade_id' => 11,
                'name' => 'B',
            ],
            [
                'grade_id' => 12,
                'name' => 'A',
            ],
            [
                'grade_id' => 12,
                'name' => 'B',
            ]
        ];

        foreach ($sections as $section) {
            $this->sectionService->updateOrCreate(['name' => $section['name'], 'grade_id' => $section['grade_id']], $section);
        }
    }
}
