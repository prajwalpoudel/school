<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\SoftDeletes;

class Grade extends Model
{
    use SoftDeletes;
    protected $fillable = ['name', 'display_name'];

    /**
     * @return HasMany
     */
    public function sections() {
        return $this->hasMany(Section::class);
    }

    /**
     * @return HasManyThrough
     */
    public function students() {
        return $this->hasManyThrough(Student::class, Section::class, 'grade_id', 'section_id', 'id', 'id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNumberOfSections($query) {
        return $query->withCount(['sections as section_count']);
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNumberOfStudents($query) {
        return $query->withCount(['students as student_count']);
    }

    /**
     * @return HasMany
     */
    public function subjects() {
        return $this->hasMany(Subject::class);
    }
}
