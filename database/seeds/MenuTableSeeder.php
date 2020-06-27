<?php

use App\School\Constants\MenuGroupConstant;
use App\Services\General\MenuService;
use Illuminate\Database\Seeder;

class MenuTableSeeder extends Seeder
{
    /**
     * @var MenuService
     */
    private $menuService;

    /**
     * MenuTableSeeder constructor.
     * @param MenuService $menuService
     */
    public function __construct(MenuService $menuService)
    {
        $this->menuService = $menuService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $menus = [
            [
                'name' => 'Dashboard',
                'slug' => 'dashboard',
                'order' => 1,
                'status' => true,
                'route' => 'admin.student.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Grade',
                'slug' => 'grade',
                'order' => 2,
                'status' => true,
                'route' => 'admin.grade.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Section',
                'slug' => 'section',
                'order' => 3,
                'status' => true,
                'route' => 'admin.section.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Email Template',
                'slug' => 'email_template',
                'order' => 4,
                'status' => true,
                'route' => 'admin.email_template.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Student',
                'slug' => 'student',
                'order' => 5,
                'status' => true,
                'route' => 'admin.student.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Discount Package',
                'slug' => 'discount_package',
                'order' => 6,
                'status' => true,
                'route' => 'admin.discount_package.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],


            [
                'name' => 'Fees',
                'slug' => 'fees',
                'order' => 7,
                'status' => true,
                'route' => 'admin.fee.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Fee Category',
                'slug' => 'fee_category',
                'order' => 2,
                'status' => true,
                'route' => 'admin.fee_category.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => 7,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Fee',
                'slug' => 'fee',
                'order' => 1,
                'status' => true,
                'route' => 'admin.fee.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => 7,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Installment',
                'slug' => 'installment',
                'order' => 8,
                'status' => true,
                'route' => 'admin.installment.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],

            [
                'name' => 'Library',
                'slug' => 'library',
                'order' => 8,
                'status' => true,
                'route' => 'admin.library1.category.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Category',
                'slug' => 'library_category',
                'order' => 1,
                'status' => true,
                'route' => 'admin.library.category.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => 11,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Book',
                'slug' => 'book',
                'order' => 2,
                'status' => true,
                'route' => 'admin.library.book.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => 11,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Issue Book',
                'slug' => 'issue_book',
                'order' => 3,
                'status' => true,
                'route' => 'admin.library.issued.books.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => 11,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],
            [
                'name' => 'Canteen',
                'slug' => 'canteen',
                'order' => 9,
                'status' => true,
                'route' => 'admin.canteen.index',
                'icon' => 'm-menu__link-icon flaticon-line-graph',
                'parent_id' => null,
                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
                'related_route' => null
            ],

//            [
//                'name' => 'Test',
//                'slug' => 'student',
//                'order' => 2,
//                'status' => true,
//                'route' => 'menu',
//                'icon' => 'm-menu__link-icon flaticon-line-graph',
//                'parent_id' => null,
//                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
//                'related_route' => 'menu'
//            ],
//            [
//                'name' => 'List',
//                'slug' => 'list',
//                'order' => 1,
//                'status' => true,
//                'route' => 'menu',
//                'icon' => 'm-menu__link-icon flaticon-line-graph',
//                'parent_id' => 4,
//                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
//                'related_route' => null
//            ],
//            [
//                'name' => 'Edit',
//                'slug' => 'edit',
//                'order' => 2,
//                'status' => true,
//                'route' => 'menu',
//                'icon' => 'm-menu__link-icon flaticon-line-graph',
//                'parent_id' => 4,
//                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
//                'related_route' => 'admin.student.create'
//            ],
//            [
//                'name' => 'Create',
//                'slug' => 'create',
//                'order' => 2,
//                'status' => true,
//                'route' => 'menu',
//                'icon' => 'm-menu__link-icon flaticon-line-graph',
//                'parent_id' => 6,
//                'menu_group_id' => MenuGroupConstant::ADMIN_SIDEBAR_ID,
//                'related_route' => null
//            ],
        ];

        foreach ($menus as $menu) {
            $this->menuService->updateOrCreate(['slug' => $menu['slug'], 'parent_id' => $menu['parent_id']], $menu);
        }
    }
}
