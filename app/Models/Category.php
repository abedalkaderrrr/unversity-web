<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name','year','section','catId'];
    public function users()
    {
        return $this->hasMany('App\Models\User');
    }
    public function matrials()
    {
        return $this->hasMany('App\Models\Matrial','catId', 'catId');
    }
}
