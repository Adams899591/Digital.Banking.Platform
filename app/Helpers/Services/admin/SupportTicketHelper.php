<?php
namespace App\Helpers\Services\admin;


use App\Models\SupportTicket;


class SupportTicketHelper {

   // this helper class is responsible for handling the logic related to fetching support tickets based on the selected filters (status, category, priority) and search query. It provides a method called handlesFilteredSupportTicket that takes in the filter parameters and returns the filtered support tickets accordingly.
  public function handlesFilteredSupportTicket($status,$category,$priority,$search){
    
        if ($status) {  // fetch user based on the selected status
            return SupportTicket::where("status", $status)->with("user")->latest()->paginate(3);

        }elseif ($category) {  // fetch user based on the selected category
            return  SupportTicket::where("category", $category)->with("user")->latest()->paginate(3);  

        }elseif ($priority) { // fetch user based on the selected priority
            return  SupportTicket::where("priority", $priority)->with("user")->latest()->paginate(3);     
         
        }elseif($search){  // fetch user based on the search query

           return SupportTicket::where(function($q) use($search) {
                            $q->where('status', 'like', '%' . $search . '%')
                            ->orWhere('category', 'like', '%' . $search . '%')
                            ->orWhere('priority', 'like', '%' . $search . '%');
                        })->with("user")->latest()->paginate(3);

        } else { // show all users if no filter is selected

            return SupportTicket::with("user")->latest()->paginate(3);
        }
  }
      
}