<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;

    protected $fillable = ['DS', 'TP', 'Exam', 'course_id', 'student_id'];


    //one-to-many relation with courses
    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
