<?php
namespace App\Helpers\Services\admin;

use App\Models\BankAccount;
use Illuminate\Support\Facades\Auth;

class AccManagementHelper {



  public function handlesFilteredAccounts($value,$search,$date){

         if ($value) {
                 return    BankAccount::where("status", "=", $value )->with("user")->latest()->paginate(3); // fetch all accounts with their associated user data, ordered by latest created
        }elseif($search){  // fetch account based on the input search

                    return  BankAccount::where(function($q) use ($search){
                                        $q->where('status', 'like', '%' . $search . '%')
                                        ->orWhere('account_type', 'like', '%' . $search . '%')
                                        ->orWhere('premier_balance', 'like', '%' . $search . '%');
                                    })->with("user")->latest()->paginate(3);

        }elseif ($date) {
                   return  BankAccount::whereDate("created_at", "<", $date)->with("user")->latest()->paginate(3); // fetch all accounts with their associated user data, ordered by latest created
        }
        else{
                  return   BankAccount::with("user")->latest()->paginate(3); // fetch all account with their associated user data, ordered by latest created
        }
  }
      
}