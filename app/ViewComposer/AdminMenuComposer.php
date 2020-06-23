<?php


namespace App\ViewComposer;


use App\School\Constants\MenuGroupConstant;
use App\Services\General\MenuGroupService;
use Illuminate\View\View;

class AdminMenuComposer
{
    /**
     * @var MenuGroupService
     */
    private $menuGroupService;

    /**
     * AdminMenuComposer constructor.
     * @param MenuGroupService $menuGroupService
     */
    public function __construct(MenuGroupService $menuGroupService)
    {
        $this->menuGroupService = $menuGroupService;
    }

    /**
     * @param View $view
     */
    public function compose(View $view) {
        $header_menus = $this->menuGroupService->getMenuGroupMenus(MenuGroupConstant::ADMIN_HEADER_ID);
        $sidebar_menus = $this->menuGroupService->getMenuGroupMenus(MenuGroupConstant::ADMIN_SIDEBAR_ID);
        $footer_menus = $this->menuGroupService->getMenuGroupMenus(MenuGroupConstant::ADMIN_FOOTER_ID);

        $view->with(compact('header_menus', 'sidebar_menus', 'footer_menus'));

    }
}
