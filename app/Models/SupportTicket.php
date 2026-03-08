<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SupportTicket extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

     protected $guarded = [];

     // ============ RELATIONSHIPS =============
     
      // a user has many notifications
     public function user(){
          return $this->belongsTo(User::class);
     }

     
   
}
