<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Database\Eloquent\Relations\Pivot;

class HostelCategory extends Model
{
    protected $fillable = [
        'name',
        'description',
        'facilities',
        'amount',
        'address',
        'total_bed_per_room',
        'gender',
        'status'
    ];

    public function facilities() : Attribute
    {
        return Attribute::make(
            get: fn ($value) => json_decode($value),
        );
    }

    public function photos()
    {
        return $this->morphMany(Photo::class, 'imageable');
    }

    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    public function hostels()
    {
        return $this->hasMany(Hostel::class);
    }

}
