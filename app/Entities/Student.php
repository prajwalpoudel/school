<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use SoftDeletes;

    protected $fillable = ['section_id','house_id'];
    public $appends = ['full_name'];

    /**
     * @return BelongsTo
     */
    public  function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * @return HasOne
     */
    public  function detail() {
        return $this->hasOne(StudentDetail::class);
    }

    /**
     * @return BelongsTo
     */
    public  function section() {
        return $this->belongsTo(Section::class);
    }

    /**
     * @return MorphMany
     */
    public function issuedBooks() {
        return $this->morphMany(IssuedBook::class, 'issuable');
    }

    /**
     * @return mixed
     */
    public function getFullNameAttribute() {
        return $this->user->full_name;
    }
    /**
     * @return belongsTo
     */
    public function house() {
        return $this->belongsTo(House::class);
    }
    public  function parents() {
        return $this->belongsToMany(Guardian::class,'parent_students','student_id','parent_id');
    }
}
