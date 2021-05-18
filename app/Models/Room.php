<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'capacity'
    ];
    public function bookings()
    {
        return $this->hasMany('App\Models\Booking');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
}
