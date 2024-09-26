<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    use HasFactory;

    protected $fillable = [
        'leaveDate', 'leaveReason', 'leaveStatus', 'teacher_id'
    ];

    // Define the inverse of the one-to-many relationship with teacher (User)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }
}
