<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    

    protected $fillable = ['groupName'];

    //many-to-many relationship with courses
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'groups_courses', 'group_id', 'course_id')->withTimestamps();
    }
}
