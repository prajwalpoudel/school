<?php

namespace App\Entities;

use App\Events\User\Admin\SectionPosted;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Section extends Model
{
    use SoftDeletes;

    protected $fillable = ['name', 'grade_id', 'teacher_id', 'captain_id', 'vice_captain_id'];
    protected $dispatchesEvents = [
        'created' => SectionPosted::class,
        'updated' => SectionPosted::class
    ];

    /**
     * @return belongsTo
     */
    public function grade() {
        return $this->belongsTo(Grade::class);
    }

    /**
     * @return HasMany
     */
    public function students() {
        return $this->hasMany(Student::class);
    }

    /**
     * @return HasOne
     */
    public function captain() {
        return $this->hasOne(Student::class, 'id', 'captain_id');
    }

    /**
     * @return HasOne
     */
    public function viceCaptain() {
        return $this->hasOne(Student::class, 'id', 'vice_captain_id');
    }

    /**
     * @return HasOne
     */
    public function sectionTeacher() {
        return $this->hasOne(Teacher::class, 'id', 'teacher_id');
    }

    /**
     * @param $query
     * @return mixed
     */
    public function scopeNumberOfStudents($query) {
        return $query->withCount(['students as student_count']);
    }
}
