<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['depName', 'numberOfTeachers'];

    //user-deparmtent relation
    public function teachers()
    {
        return $this->hasMany(User::class)->where('is_admin', false);
    }
}
