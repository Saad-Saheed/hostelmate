<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'admin_id'];

    public function students()
    {
        return $this->hasMany(User::class);
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }
}
