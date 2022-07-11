<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hostel extends Model
{
    use HasFactory;

    protected $fillable = [
        'hostel_category_id',
        'block_name',
        'room_no',
        'total_bed',
        'status'
    ];

    public function hostelCategory()
    {
        return $this->belongsTo(HostelCategory::class);
    }

    public function hostelAssigns()
    {
        return $this->hasMany(HostelAssign::class);
    }

    public function student()
    {
        return $this->belongsTo(User::class);
    }

}
