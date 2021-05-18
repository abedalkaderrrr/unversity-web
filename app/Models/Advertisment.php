<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Advertisment extends Model
{
    use HasFactory;

    protected $fillable =['title','content','slice','period'];
    protected $dates = ['period','updated_at','created_at'];
}
