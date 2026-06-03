<?php

namespace App\Livewire\User\Includes\Profile;

// use Storage;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;


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

        // ===================================================================
                    //         // Using the Storage facade directly ensures the file is placed in the 'ai_chat' directory.
                    // // Specifying 'public' visibility ensures the file is accessible via the public URL.
                    // $path = Storage::disk('s3')->putFile('profile_image', $this->photo, 'public');


                    // // Only attempt to generate a URL if the path was successfully created
                    // if ($path) {
                        
                        
                    //     Log::info('Supabase Upload Successful', ['generated_path' => $path]);
                    //     $mediaUrl = Storage::disk('s3')->url($path);
                    //     if (!$mediaUrl) {
                    //         Log::warning('Upload succeeded but Storage::url() returned empty string.');
                    //     }
                        
                    // } else {
                    //     Log::error('Supabase Upload Failed: Storage::putFile returned false. Check your S3 credentials and endpoint.');
                    // }
        // =========================================================================




         $user->profile_picture = $path;
         $user->save();

        return redirect()->back()->with("success", "profile updated successfully!");
 
    }

    public function render()
    {
        
        return view('livewire.user.includes.profile.profile-picture');
    }
}
