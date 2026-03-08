<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Notification extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

     protected $guarded = [];

    
     // this tell laravel this notification belongs to any model
     public function notifiable(){
        return $this->morphTo();
     }

     
}
