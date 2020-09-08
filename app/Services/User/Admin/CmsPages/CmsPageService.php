<?php


namespace App\Services\User\Admin\CmsPages;


use App\Entities\CmsPage;
use App\Services\BaseService;

class CmsPageService extends BaseService
{
    public function model()
    {
        return CmsPage::class;
    }
}
