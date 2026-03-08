<?php
namespace App\Helpers\Services\user;

use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

class StatementHelper {

  // this function haldles Transactions Sent And Receive By Login User
  public function haldlesTransactionsSentAndReceiveByAuth_User($limit, $selectedData = null){
    
     // Here you can implement the logic to filter transactions based on the selected date range
     switch($selectedData){
       case "7":
        $dateRange = now()->subDays(7);
        break;
        case "30":
          $dateRange = now()->subDays(30);
          break;
          case "60":
            $dateRange = now()->subDays(60);
            break;
        default:
            $dateRange = null;
     }
       
//  dd($selectedData);

     if ($selectedData != null) {
     
          return  Transaction::where(function($query) {
                  $query->where("sender_id", Auth::id())->where("transaction_type", "Debit")
                        ->orWhere(function($query) {
                            $query->where("receiver_id", Auth::id())->where("transaction_type", "Credit");
                        });
              })->where('created_at', '>=', $dateRange)->latest()->take($limit)->get();
       
     }elseif($selectedData == null){
      
       return    Transaction::where("sender_id",Auth::id())->where("transaction_type", "Debit")
                                      ->orWhere(function($query){
                                                  $query->where("receiver_id",Auth::id())->where("transaction_type", "Credit");
                                       })->latest()->take($limit)->get();
     
    }else{
      
      return "no datafound";
    }

 


      
}
}