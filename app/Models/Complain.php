<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Complain extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'user_id',
        'is_read'
    ];

    public function student()
    {
        return $this->belongsTo(User::class);
    }
}
