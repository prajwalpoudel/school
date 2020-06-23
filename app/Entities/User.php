<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class User extends Model
{
    use SoftDeletes;
    use Notifiable;

    protected $fillable = ['first_name', 'last_name', 'email', 'password', 'role_id'];

    /**
     * @return BelongsTo
     */
    public function role() {
        return $this->belongsTo(Role::class);
    }

    /**
     * @return HasOne
     */
    public function detail() {
        return $this->hasOne(UserDetail::class);
    }

    /**
     * @return HasOne
     */
    public function student() {
        return $this->hasOne(Student::class);
    }

    /**
     * @return HasOne
     */
    public function teacher() {
        return $this->hasOne(Teacher::class);
    }

    /**
     * @return HasOne
     */
    public function guardian() {
        return $this->hasOne(Guardian::class);
    }

    /**
     * @return HasOne
     */
    public function school() {
        return $this->hasOne(School::class);
    }

    /**
     * @return HasOne
     */
    public function accountant() {
        return $this->hasOne(Accountant::class);
    }

    /**
     * @return HasOne
     */
    public function librarian() {
        return $this->hasOne(Librarian::class);
    }
}
