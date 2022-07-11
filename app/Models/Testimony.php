<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimony extends Model
{
    use HasFactory;
    protected $fillable =[
        'name',
        'occupation_id',
        'image',
        'comment'
    ];

    public function occupation()
    {
        return $this->belongsTo(Occupation::class);
    }
}
