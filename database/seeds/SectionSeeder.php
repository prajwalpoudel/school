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
                'display_name' => 'A',
            ],
            [
                'grade_id' => 1,
                'name' => 'B',
                'display_name' => 'B',
            ],
            [
                'grade_id' => 2,
                'name' => 'A',
                'display_name' => 'A',
            ],
            [
                'grade_id' => 2,
                'name' => 'B',
                'display_name' => 'B',
            ],
            [
                'grade_id' => 3,
                'name' => 'A',
                'display_name' => 'A',
            ],
            [
                'grade_id' => 3,
                'name' => 'B',
                'display_name' => 'B',
            ]
        ];

        foreach ($sections as $section) {
            $this->sectionService->updateOrCreate(['name' => $section['name'], 'display_name' => $section['display_name']], $section);
        }
    }
}
