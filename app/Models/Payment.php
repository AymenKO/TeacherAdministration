<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'paymentDate', 'sender_id', 'receiver_id', 'amount', 'paymentType', 'paymentDescription'
    ];

    //many-to-one relationshi with sender (User)
    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    //many-to-one relation with receiver (User)
    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
