<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lecture extends Model
{
    use HasFactory;
   protected $fillable = ['links','title','user_id','matrial_id'];
   public function matrial(){
       return $this->belongsTo(Matrial::class);
   }

}
