<?php

use App\Services\General\MenuGroupService;
use Illuminate\Database\Seeder;

class MenuGroupTableSeeder extends Seeder
{
    /**
     * @var MenuGroupService
     */
    private $menuGroupService;

    /**
     * MenuGroupTableSeeder constructor.
     * @param MenuGroupService $menuGroupService
     */
    public function __construct(MenuGroupService $menuGroupService)
    {
        $this->menuGroupService = $menuGroupService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $groups = [
            [
                'name' => 'Admin',
                'slug' => 'admin',
                'parent_id' => null
            ],
            [
                'name' => 'Header Menu',
                'slug' => 'header_menu',
                'parent_id' => 1
            ],
            [
                'name' => 'SideBar Menu',
                'slug' => 'sidebar_menu',
                'parent_id' => 1
            ],
            [
                'name' => 'Footer Menu',
                'slug' => 'footer_menu',
                'parent_id' => 1
            ]
        ];

        foreach ($groups as $group) {
            $this->menuGroupService->updateOrCreate(['slug' => $group['slug'], 'parent_id' => $group['parent_id']], $group);
        }
    }
}
