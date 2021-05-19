<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matrial extends Model
{
    use HasFactory;
    public function category()
    {
        return $this->belongsToMany('App\Models\Category','catId', 'catId');
    }
    public function users()
    {
        return $this->belongsToMany('App\Models\User');
    }
    protected $fillable = ['term','cat_name','name'];
}
