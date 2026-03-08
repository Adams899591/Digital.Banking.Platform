<?php
namespace App\Helpers\Services\user;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class DashboardHelper {

 
  // this function Add up the user account premier_balance and goal_balance
  public function totalAccountsBalance() {

          if (!empty(Auth::user()->bankAccount->premier_balance)) { // run olny if  premier_balance is not empty
                    $premier  = (float) Auth::user()->bankAccount->premier_balance ;
                    $goal  = (float) Auth::user()->bankAccount->goal_balance ;
                    $total =  $premier + $goal;
                    return $total;
          }
  }

  // this function haldles Transactions Sent And Receive By Login User
  public function haldlesTransactionsSentAndReceiveByAuth_User(){

       return    Transaction::where("sender_id",Auth::id())->where("transaction_type", "Debit")
                                      ->orWhere(function($query){
                                                  $query->where("receiver_id",Auth::id())->where("transaction_type", "Credit");
                                       })->latest()->limit(3)->get();
  }


      
}