    
<!-- Scrollable Content -->
<main class="flex-1 overflow-y-auto p-8 bg-gray-50">
    
    <!-- Header -->
    <div class="mb-8 flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-bank-navy">Profile & Security</h1>
            <p class="text-gray-500 text-sm mt-1">Manage your personal information and account security settings.</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        
        <!-- Left Column: Profile Picture --> 
        <div class="lg:col-span-1">
           <livewire:user.includes.profile.profile-picture>
        </div>

        <!-- Right Column: Details & Security -->
        <div class="lg:col-span-2 space-y-8">
            
            <!-- Personal Information Form -->
            <livewire:user.includes.profile.personal-information>

            <!-- Security Section -->
            <livewire:user.includes.profile.security-section>
  
        </div>
 </main>
     
