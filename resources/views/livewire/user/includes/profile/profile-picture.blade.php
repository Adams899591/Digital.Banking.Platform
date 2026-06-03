           <div class="bg-white rounded-xl shadow-md border border-gray-100 p-6 sticky top-8">
                <h3 class="font-bold text-bank-navy mb-6 text-base sm:text-lg">Profile Picture</h3> 
                
                <form wire:submit="updateProfilePhoto" class="flex flex-col items-center">
                    <!-- Profile Image Container -->
                    <div class="relative group cursor-pointer mb-6" x-data="{ hovering: false }" @mouseenter="hovering = true" @mouseleave="hovering = false">
                        <div class="w-40 h-40 rounded-full overflow-hidden border-4 border-gray-100 group-hover:border-bank-gold transition-all duration-300 shadow-sm">

                            {{--  check if profile picture is a URL or a local path, and display accordingly --}}
                            @if (Auth::user()->profile_picture && !Illuminate\Support\Str::startsWith(Auth::user()->profile_picture, 'http'))

                                    <img src="{{ asset("storage/". Auth::user()->profile_picture) }}" class="w-full h-full object-cover">

                            @else  {{-- show UI Avatar if no profile picture or if it's a URL --}}
                                    
                                <img src="{{Auth::user()->profile_picture ?? 'https://ui-avatars.com/api/?name=' . urlencode(Auth::user()->first_name . ' ' . Auth::user()->last_name) . '&background=c5a059&color=fff&size=128'}}" alt="Profile" class="w-full h-full object-cover">

                            @endif

                        </div>
                        
                        <!-- Overlay for upload -->
                        <label for="photo-upload" class="absolute inset-0 bg-bank-navy/60 rounded-full flex flex-col items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300 cursor-pointer text-white">
                            <i class="fa-solid fa-camera text-2xl mb-1"></i>
                            <span class="text-xs font-medium">Change Photo</span>
                        </label>
                        <input type="file" id="photo-upload" wire:model="photo" class="hidden" accept="image/*">
                    </div>

                    <div class="text-center mb-6">
                        <p class="text-sm font-semibold text-bank-navy">{{Auth::user()->first_name . ' ' . Auth::user()->last_name}}</p>
                        <p class="text-xs text-gray-400">Premium Member</p>
                    </div>


                                {{-- Show success message --}}
                               @if (session("success")) <span class="text-green-700 text-xs mt-1 font-bold">{{ session("success")}}</span>@endif
                                {{-- Show error message --}}
                                @error('photo') <span class="text-red-500 text-xs mt-1 font-bold">{{ $message }}</span> @enderror

                    <button type="submit" class="w-full py-2.5 px-4 bg-white border border-gray-200 text-gray-600 rounded-lg hover:border-bank-gold hover:text-bank-navy hover:bg-bank-gold/5 transition-all font-medium text-sm flex items-center justify-center gap-2 group">
                        <i class="fa-solid fa-upload text-gray-400 group-hover:text-bank-gold"></i>
                        <span>Upload New Photo</span>
                    </button>
                    
                    <p class="text-xs text-gray-400 mt-4 text-center">
                        Allowed formats: JPG, PNG.<br>Max size: 2MB.
                    </p>
                </form>
        </div>
