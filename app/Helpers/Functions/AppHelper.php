<?php 

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;


// this function handles greeting 
if (function_exists("greeting")) {

        function greeting(): string{
            
            $hour = Carbon::now()->hour();

            if ($hour < 12) {
                return "Good Morning";
            }

            if ($hour < 17) {
                return "Good Afternoon";
            }

            return "Good Evening";
        }
};




 
