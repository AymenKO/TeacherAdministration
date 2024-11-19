<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'last_login_at',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    //user-deparmtent relation
    public function department()
    {
        return $this->belongsTo(Department::class);
    }

    //user-course relation
    public function courses()
    {
        return $this->belongsToMany(Course::class, 'user_courses', 'teacher_id', 'course_id')
        ->withPivot('hours_per_week', 'hours_taught')
        ->withTimestamps()
        ->where('is_admin', false);
    }
    //many-to-many relationship with chats
    public function chats()
    {
        return $this->belongsToMany(Chat::class, 'users_chats', 'user1_id', 'chat_id')
                    ->using(User::class)
                    ->withPivot('content', 'message_sent_date')
                    ->withTimestamps();
    }

    //one-to-many relation with payments as sender
    public function sentPayments()
    {
        return $this->hasMany(Payment::class, 'sender_id');
    }

    // one-to-many relation with payments as receiver
    public function receivedPayments()
    {
        return $this->hasMany(Payment::class, 'receiver_id');
    }

    //one-to-many relation with leaves as a teacher
    public function leaves()
    {
        return $this->hasMany(Leave::class, 'teacher_id');
    }
}
