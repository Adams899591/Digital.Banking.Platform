<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable; // Use Authenticatable instead of Model for authentication so as to use built-in authentication features instead of implementing them manually.
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Admin extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $guarded = [];
}
