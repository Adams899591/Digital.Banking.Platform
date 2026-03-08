<?php

namespace App\Livewire\User;

use Livewire\Component;
use App\Helpers\Services\user\StatementHelper;

class Statements extends Component 
{

    public $readyToLoad = false; // Flag to control when to load the data
    // public $limit = 2; // items per load
    public $transactions;
    // public $selectedData;

    // Method to set the flag to true, allowing the data to load
    public function loadPage()
    {
        $this->readyToLoad = true;
    }
// ==================================================================

 // This method will be called when the user clicks the load more button
//    public function loadMore(){
//        $this->limit += 2; // load 2 more each click
//    }

    // public function filterTransactionByDate(StatementHelper $statementHelper){
        
        // $this->transactions =   $statementHelper->haldlesTransactionsSentAndReceiveByAuth_User($this->limit, $this->selectedData);
        
    // }
// ========================================
    public function render()
    {
 
        // Check if the data is ready to load, if not, return a view with a loading state
        if (!$this->readyToLoad) {
             return view('livewire.user.statements' )->layout("layouts.user.app");
        }else { // If the data is ready, return the view with the actual content
            return view('livewire.user.statements')->layout("layouts.user.app");
        }

    }

    
}
