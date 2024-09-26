<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;
    protected $fillable = ['courseName', 'courseDescription', 'Credit'];

    //many-to-many relationship with groups
    public function groups()
    {
        return $this->belongsToMany(Group::class, 'groups_courses', 'course_id', 'group_id')->withTimestamps();
    }

    //user-course relation
    public function teacher()
    {
        return $this->belongsToMany(User::class, 'user_courses', 'course_id', 'teacher_id')
                    ->withPivot('hours_per_week', 'hours_taught')
                    ->withTimestamps()
                    ->where('is_admin', false);
    }

    //grades-course relation
    public function grades()
    {
        return $this->hasMany(Grade::class);
    }
}
