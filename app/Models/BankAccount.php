<?php

namespace App\Models;

use App\Models\RecentBeneficiaries;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BankAccount extends Model
{
     /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

     protected $guarded = [];


    // ============ RELATIONSHIPS =============

    // a record on this table belong to a specific User
    public function user(){
       return $this->belongsTo(User::class);
    }

    
}
