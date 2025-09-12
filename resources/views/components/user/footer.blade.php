<footer class="bg-gradient-to-br from-[#007696] to-[#0289a4] text-white">
    <svg class="w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
        <path fill="#ffffff" fill-opacity="1" d="M0,224L48,202.7C96,181,192,139,288,138.7C384,139,480,181,576,208C672,235,768,245,864,224C960,203,1056,149,1152,122.7C1248,96,1344,96,1392,96L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
    </svg>

    <div class="max-w-7xl mx-auto px-4 py-16">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
            <!-- Logo Section -->
            <div class="lg:col-span-2 space-y-6">
                <!-- Logo seperti di navbar -->
               <div class="flex items-center space-x-3 mb-6">
    <img src="{{ asset('logoCards.png') }}" alt="Logo" class="h-8 w-auto">


    <span class="text-2xl font-bold"></span>
</div>
                <p class="text-white/80 text-lg leading-relaxed max-w-md">
                    Solusi pembiayaan fleksibel untuk sekolah dan bisnis. Dapatkan modal kerja dan pembiayaan peralatan dengan proses yang cepat dan mudah.
                </p>
                <div class="flex space-x-4">
                    <a href="https://facebook.com/cazhteknova" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="https://www.instagram.com/cazhcards" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="https://www.linkedin.com/company/cazh-inovasion" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                        <i class="fab fa-linkedin-in"></i>
                    </a>
                </div>
            </div>

            <!-- Quick Links Section - Sesuai dengan navbar -->
            <div class="space-y-6">
                <h4 class="text-xl font-semibold">Quick Links</h4>
                <ul class="space-y-3">
                    <li><a href="{{ route('user.homepage') }}" class="text-white/80 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">Home</a></li>
                    <li><a href="{{ route('user.flexy') }}" class="text-white/80 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">Flexy</a></li>
                    <li><a href="#about" class="text-white/80 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">About</a></li>
                    <li><a href="{{ route('user.contact') }}" class="text-white/80 hover:text-white transition-all duration-300 hover:translate-x-1 inline-block">Contact</a></li>
                </ul>
                
            </div>

            <!-- Contact Section -->
            <div class="space-y-6">
                <h4 class="text-xl font-semibold">Contact Us</h4>
                <div class="space-y-4">
                    <div class="flex items-center space-x-3 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-envelope text-sm"></i>
                        </div>
                        <span class="text-white/80 hover:text-white transition-colors">info@cazh.com</span>
                    </div>
                    <div class="flex items-center space-x-3 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors">
                            <i class="fas fa-phone text-sm"></i>
                        </div>
                        <span class="text-white/80 hover:text-white transition-colors">+62 813</span>
                    </div>
                    <div class="flex items-start space-x-3 group">
                        <div class="w-8 h-8 bg-white/10 rounded-lg flex items-center justify-center group-hover:bg-white/20 transition-colors mt-1">
                            <i class="fas fa-map-marker-alt text-sm"></i>
                        </div>
                        <span class="text-white/80 hover:text-white transition-colors text-sm leading-relaxed">
                            Ruko Graha Timur, Jl. Martadireja 1 No.Blok B2, Kepetek, Mersi, Kec. Purwokerto Tim., Kabupaten Banyumas, Jawa Tengah 53111
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bottom Section -->
    <div class="border-t border-white/10">
        <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col md:flex-row items-center justify-between gap-4">
            <p class="text-white/80 text-center md:text-left">
                © 2025 FlexyCazh by CAZH. All rights reserved.
            </p>
            <div class="flex space-x-6 text-sm">
                <a href="#" class="text-white/80 hover:text-white transition-colors">Privacy Policy</a>
                <a href="#" class="text-white/80 hover:text-white transition-colors">Terms of Service</a>
                <a href="#" class="text-white/80 hover:text-white transition-colors">Support</a>
            </div>
        </div>
    </div>
</footer>