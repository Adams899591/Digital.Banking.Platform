<?php

namespace App\Livewire\User\Includes\Profile;

// use Storage;
use App\Models\User;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;


class ProfilePicture extends Component
{
    use WithFileUploads;
    
    public $photo;

    // this update the user profile photo
    public function updateProfilePhoto(){
     
        $this->validate([
            "photo" => ["required","image"]
        ]);
        
         $user = User::findOrFail(Auth::id());
         
         $this->authorize("userUpdate", $user); // Ensure the user is updating their own record

         // delete the old photo from storage if it exists
         if($user->profile_picture){
            Storage::disk("public")->delete($user->profile_picture);
         }
         // store the photo in the public storage and get the path
         $path = $this->photo->store("photo", "public");
         
         $user->profile_picture = $path;
         $user->save();

        return redirect()->back()->with("success", "profile updated successfully!");
 
    }

    public function render()
    {
        
        return view('livewire.user.includes.profile.profile-picture');
    }
}
