<?php

namespace App\Models;

use App\Models\Bank;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

     protected $guarded = []; 


   // ============ RELATIONSHIPS =============

   //a transaction belongs to a sender which is a user
    public function sender(){
        return $this->belongsTo(User::class, "sender_id");
     }

   // a transaction belongs to a receiver which is a user
    public function receiver(){
        return $this->belongsTo(User::class, "receiver_id");
     }

     // a transaction belongs to a bank
      public function bank(){
        return $this->belongsTo(Bank::class, "receiver_bank_id");
      }

      // public function user(){
      //    return $this->belongsTo(User::class);
      // }

      
}
