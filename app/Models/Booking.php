<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    public function room()
    {
        return $this->belongsTo('App\Models\Room');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
    public function category()
    {
        return $this->belongsTo('App\Models\Category');
    }
    public function matrial()
    {
        return $this->belongsTo('App\Models\Matrial');
    }



    protected $fillable = ['user_id','category_id','room_id','lecture','day','matrial_id'];
}
