<?php

namespace App\Livewire\User;

// use App\Helpers\Services\user\DashboardHelper;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\BankAccount;
use Illuminate\Support\Facades\Auth;
use App\Helpers\Services\user\DashboardHelper;


class Dashboard extends Component
{

    public $readyToLoad = false; // Flag to control when to load the data
 
    // Method to set the flag to true, allowing the data to load
    public function loadPage()
    {
        $this->readyToLoad = true;
    }



    public function render(DashboardHelper $dashboardHelper)
    {
        // calculate total Accounts Balance    
        $total = $dashboardHelper->totalAccountsBalance();
        

        if (!$this->readyToLoad) {  // Check if the data is ready to load, if not, return a view with a loading state

               return view('livewire.user.dashboard', [ "total" => $total])->layout("layouts.user.app");

        }else { // If the data is ready, return the view with the actual content

             return view('livewire.user.dashboard', [ "total" => $total])->layout("layouts.user.app");
        }

              
    }
}
