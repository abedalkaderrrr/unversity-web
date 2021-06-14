<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;
   protected  $fillable =['user_id','matrial_id','mark'];

   public function matrial(){
    return $this->belongsTo(Matrial::class);
}
}
