<?php
namespace App\Services\General\Calendar;
use App\Entities\CalendarGroup;
use App\Services\BaseService;

class GroupService extends BaseService
{
    public function model()
    {
        return CalendarGroup::class;
    }

}
