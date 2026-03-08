
<div class="bg-bank-navy min-h-screen flex flex-col items-center justify-center text-white overflow-hidden relative">
    
    <!-- Background Decoration -->
    <div class="absolute top-0 left-0 w-full h-2 bg-gradient-to-r from-transparent via-bank-gold to-transparent opacity-50"></div>
    <div class="absolute -bottom-20 -right-20 w-96 h-96 bg-bank-gold/5 rounded-full blur-3xl"></div>
    <div class="absolute -top-20 -left-20 w-96 h-96 bg-white/5 rounded-full blur-3xl"></div>

    <!-- Main Content -->
    <div class="z-10 text-center max-w-sm w-full px-6">
        
        <!-- Image/Icon Section -->
        <!-- 
             NOTE: If you have a 3D "toy" illustration, replace the <div> below with your <img> tag.
             Example: <img src="images/3d-character.png" class="w-40 h-40 mx-auto mb-8 animate-bounce">
        -->
        <div class="mb-10 relative inline-block">
            <div class="absolute inset-0 bg-bank-gold rounded-full opacity-20 animate-ping"></div>
            <div class="relative bg-white/10 backdrop-blur-sm border border-white/10 rounded-full p-8 h-32 w-32 flex items-center justify-center mx-auto shadow-2xl">
                <i class="fa-solid fa-shield-halved text-5xl text-bank-gold animate-pulse-slow"></i>
            </div>
        </div>

        <!-- Text -->
        <h2 class="text-3xl font-bold mb-3 tracking-tight">Welcome Back</h2>
        <p class="text-bank-gray text-sm mb-8 leading-relaxed">
            We are securely establishing your session and preparing your personalized dashboard.
        </p>

        <!-- Progress Bar Container -->
        <div class="w-full bg-black/20 rounded-full h-1.5 mb-2 overflow-hidden backdrop-blur-sm border border-white/5">
            <div id="progress-bar" class="bg-bank-gold h-1.5 rounded-full transition-all duration-300 ease-out" style="width: 0%"></div>
        </div>
        
        <!-- Status Text -->
        <div class="flex justify-between text-xs text-bank-gray font-medium uppercase tracking-wider">
            <span id="status-text">Authenticating...</span>
            <span id="percentage">0%</span>
        </div>
    </div>

    <script>
        // Simulation Logic
        document.addEventListener('DOMContentLoaded', () => {
            const progressBar = document.getElementById('progress-bar');
            const percentage = document.getElementById('percentage');
            const statusText = document.getElementById('status-text');
            let width = 0;

            const interval = setInterval(() => {
                if (width >= 100) {
                    clearInterval(interval);
                    statusText.innerText = "Complete";
                    // Redirect to dashboard
                    setTimeout(() => {
                        window.location.href = '{{route("user.dashboard")}}'; // Change this to your actual dashboard file
                    }, 500);
                } else {
                    width += Math.random() * 5; // Random increment for realism
                    if (width > 100) width = 100;
                    
                    progressBar.style.width = width + '%';
                    percentage.innerText = Math.round(width) + '%';

                    if (width > 30 && width < 60) statusText.innerText = "Loading Accounts...";
                    if (width > 60 && width < 90) statusText.innerText = "Decrypting Data...";
                    if (width > 90) statusText.innerText = "Finalizing...";
                }
            }, 100); // Speed of loading
        });
    </script>
</div>

