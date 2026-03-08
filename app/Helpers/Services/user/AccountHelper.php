<?php
namespace App\Helpers\Services\user;

use Illuminate\Support\Facades\Auth;

class AccountHelper {


//   // this function Add up the user account premier_balance and goal_balance
  public function totalAccountsBalance() {

          if (!empty(Auth::user()->bankAccount->premier_balance)) { // run olny if  premier_balance is not empty
                    $premier  = (float) Auth::user()->bankAccount->premier_balance ;
                    $goal  = (float) Auth::user()->bankAccount->goal_balance ;
                    $total =  $premier + $goal;
                    return $total;
          }
  }



      
}