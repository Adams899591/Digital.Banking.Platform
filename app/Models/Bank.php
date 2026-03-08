<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Bank extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

     protected $guarded = [];


    // public function user(){
    //     return $this->belongsTo(User::class, "user_id");
    // }
}
