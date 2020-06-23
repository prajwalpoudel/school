<?php

namespace App\Services\General\Library;

use App\Entities\BookCategory;
use App\Services\BaseService;

class CategoryService extends BaseService
{
    public function model()
    {
        return BookCategory::class;
    }
}
