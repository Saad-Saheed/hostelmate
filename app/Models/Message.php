<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

    protected $fillable = [
        'subject',
        'message',
        'admin_id',
        'is_read'
    ];

    public function admin()
    {
        return $this->belongsTo(User::class);
    }
}
