<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;

class CmsPage extends Model
{
    protected $fillable = [
        'section_title',
        'slug',
        'title',
        'description',
        'properties',
        'featured_image',
        'featured_video',
        'parent_id'
    ];

    protected static function boot()
    {
        parent::boot();
        static::creating(function ($cmsPage) {
            $cmsPage->slug = 'aaa';
        });
    }
}
