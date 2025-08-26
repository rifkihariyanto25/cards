<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact - CARDS</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        
        body {
            font-family: 'Inter', sans-serif;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            -webkit-backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        .floating-animation {
            animation: float 6s ease-in-out infinite;
        }
        
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        .card-hover {
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }
        
        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
        }
        
        .neon-glow {
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.3);
        }
        
        .animated-gradient {
            background: linear-gradient(-45deg, #667eea, #764ba2, #f093fb, #f5576c);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .contact-hero {
            background: linear-gradient(135deg, #1e3a8a 0%, #3b82f6 50%, #06b6d4 100%);
            position: relative;
            overflow: hidden;
        }
        
        .contact-hero::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255,255,255,0.1) 0%, transparent 70%);
            animation: rotate 20s linear infinite;
        }
        
        @keyframes rotate {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .modern-card {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }
        
        .pulse-icon {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 min-h-screen">

    <!-- WRAPPER UNTUK NAVBAR + HERO + STATS -->
    <section class="relative isolate overflow-hidden">
        <div class="relative z-10">

            <!-- Navigation - Modern Glass Design -->
            <nav id="navbar" class="fixed top-4 left-4 right-4 z-50 glass rounded-2xl px-6 py-3 transition-all duration-300">
                <div class="flex items-center justify-between max-w-7xl mx-auto">
                    <!-- Logo -->
                    <div class="flex items-center space-x-3">
                        <img src="{{ asset('storage/assets/logo cards.png') }}" alt="Logo" class="h-8 w-auto">
                        <span class="text-xl font-bold text-gray-800">CARDS</span>
                    </div>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex space-x-8 items-center">
                        <a href="{{ route('homepage') }}" class="text-gray-700 hover:text-cyan-600 transition-colors font-medium">Home</a>
                        <a href="{{ route('flexy') }}" class="text-gray-700 hover:text-cyan-600 transition-colors font-medium">Flexy</a>
                        
                        <!-- Products Dropdown -->
                        <div class="relative group" id="product-dropdown-wrapper">
                            <button class="flex items-center text-gray-700 hover:text-cyan-600 transition-colors font-medium">
                                Products
                                <i class="fas fa-chevron-down ml-1 text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                            </button>
                            <div id="product-dropdown" class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-48 glass rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                                <div class="p-2">
                                    <a href="{{ route('edu') }}" class="block px-4 py-3 text-gray-700 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg transition-colors">Edu</a>
                                    <a href="{{ route('parents') }}" class="block px-4 py-3 text-gray-700 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg transition-colors">Parents</a>
                                    <a href="{{ route('school') }}" class="block px-4 py-3 text-gray-700 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg transition-colors">School</a>
                                    <a href="{{ route('canteen') }}" class="block px-4 py-3 text-gray-700 hover:text-cyan-600 hover:bg-cyan-50 rounded-lg transition-colors">Canteen</a>
                                </div>
                            </div>
                        </div>
                        
                        <a href="#about" class="text-gray-700 hover:text-cyan-600 transition-colors font-medium">About</a>
                        <a href="#contact" class="text-gray-700 hover:text-cyan-600 transition-colors font-medium">Contact</a>
                    </div>

                    <!-- Mobile menu button -->
                    <button class="md:hidden p-2" onclick="toggleMobileMenu()">
                        <div class="w-6 h-6 flex flex-col justify-center items-center space-y-1">
                            <div class="h-0.5 w-6 bg-gray-700 transition-all duration-300" id="line1"></div>
                            <div class="h-0.5 w-6 bg-gray-700 transition-all duration-300" id="line2"></div>
                            <div class="h-0.5 w-6 bg-gray-700 transition-all duration-300" id="line3"></div>
                        </div>
                    </button>
                </div>

                <!-- Mobile Menu -->
                <div id="mobile-menu" class="md:hidden mt-4 p-4 glass rounded-xl hidden">
                    <div class="space-y-4">
                        <a href="{{ route('homepage') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors">Home</a>
                        <a href="{{ route('flexy') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors">Flexy</a>
                        <div class="mt-2">
                            <div class="flex items-center justify-between cursor-pointer" onclick="toggleMobileProductDropdown()">
                                <span class="block text-gray-700 hover:text-cyan-600 transition-colors">Products</span>
                                <i class="fas fa-chevron-down text-xs transition-transform duration-300" id="mobile-dropdown-icon"></i>
                            </div>
                            <div id="mobile-product-dropdown" class="hidden mt-2 pl-4 space-y-2">
                                <a href="{{ route('edu') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors pl-4">- Edu</a>
                                <a href="{{ route('parents') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors pl-4">- Parents</a>
                                <a href="{{ route('school') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors pl-4">- School</a>
                                <a href="{{ route('canteen') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors pl-4">- Canteen</a>
                            </div>
                        </div>
                        <a href="#about" class="block text-gray-700 hover:text-cyan-600 transition-colors">About</a>
                        <a href="#contact" class="block text-gray-700 hover:text-cyan-600 transition-colors">Contact</a>
                    </div>
                </div>
            </nav>

            <!-- Hero Section - Ultra Modern -->
            <section class="contact-hero text-white py-32 px-4 sm:px-6 lg:px-8 text-center relative">
                <div class="max-w-4xl mx-auto mt-20 relative z-10">
                    <!-- Floating Icons -->
                    <div class="absolute -top-10 -left-10 text-white/20 text-6xl floating-animation">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="absolute -top-5 -right-10 text-white/20 text-4xl floating-animation" style="animation-delay: -2s;">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="absolute top-20 left-5 text-white/20 text-5xl floating-animation" style="animation-delay: -4s;">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>

                    <div class="space-y-8">
                        <div class="pulse-icon">
                            <div class="inline-flex items-center justify-center w-20 h-20 bg-white/20 rounded-full mb-6">
                                <i class="fas fa-headset text-3xl text-white"></i>
                            </div>
                        </div>
                        
                        <h1 class="text-4xl sm:text-6xl font-bold mb-6 leading-tight">
                            Mari 
                            <span class="bg-gradient-to-r from-yellow-400 via-pink-500 to-purple-600 bg-clip-text text-transparent">
                                Terhubung
                            </span>
                        </h1>
                        
                        <p class="text-xl sm:text-2xl leading-relaxed text-white/90 max-w-2xl mx-auto">
                            Masih punya pertanyaan tentang fitur, demo, atau kerja sama dengan CARDS?
                            <br class="hidden sm:block">
                            <span class="font-semibold">Tim kami siap membantu Anda!</span>
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-8">
                            <a href="#contact-info" class="bg-white text-blue-600 font-semibold px-8 py-4 rounded-full hover:bg-white/90 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <i class="fas fa-arrow-down mr-2"></i>
                                Lihat Info Kontak
                            </a>
                            <a href="https://wa.me/62xxxxxxxxxx" target="_blank" class="bg-green-500 text-white font-semibold px-8 py-4 rounded-full hover:bg-green-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
                                <i class="fab fa-whatsapp mr-2"></i>
                                WhatsApp Langsung
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Decorative Elements -->
                <div class="absolute bottom-0 left-0 right-0">
                    <svg viewBox="0 0 1440 320" class="w-full h-auto">
                        <path fill="rgba(255,255,255,0.1)" d="M0,96L48,112C96,128,192,160,288,160C384,160,480,128,576,122.7C672,117,768,139,864,138.7C960,139,1056,117,1152,106.7C1248,96,1344,96,1392,96L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path>
                    </svg>
                </div>
            </section>

            <!-- Contact Information Section - Modern Cards -->
            <section id="contact-info" class="bg-gradient-to-br from-slate-50 via-blue-50 to-indigo-100 py-32 px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    
                    <!-- Section Header -->
                    <div class="text-center mb-16">
                        <h2 class="text-4xl font-bold text-gray-900 mb-4">
                            Hubungi
                            <span class="bg-gradient-to-r from-blue-600 to-purple-600 bg-clip-text text-transparent">
                                Tim Kami
                            </span>
                        </h2>
                        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                            Kami siap membantu menjawab semua pertanyaan dan memberikan solusi terbaik untuk kebutuhan digitalisasi sekolah Anda
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                        <!-- Contact Cards -->
                        <div class="space-y-8">
                            
                            <!-- Company Info Card -->
                            <div class="modern-card rounded-3xl p-8 card-hover">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gradient-to-r from-blue-500 to-purple-600 rounded-2xl flex items-center justify-center shadow-lg">
                                            <i class="fas fa-building text-white text-2xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-2xl font-bold text-gray-900 mb-3">PT Cazh Teknologi Inovasi</h3>
                                        <p class="text-gray-600 leading-relaxed text-lg">
                                            Ruko Graha Timur, Jl. Martadireja 1 No.Blok B2,<br>
                                            Kepetek, Mersi, Kec. Purwokerto Tim.,<br>
                                            Kabupaten Banyumas, Jawa Tengah 53111
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Email Card -->
                            <div class="modern-card rounded-3xl p-8 card-hover">
                                <div class="flex items-center space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-teal-600 rounded-2xl flex items-center justify-center shadow-lg">
                                            <i class="fas fa-envelope text-white text-2xl"></i>
                                        </div>
                                    </div>
                                    <div class="flex-1">
                                        <h3 class="text-xl font-semibold text-gray-900 mb-2">Email</h3>
                                        <a href="mailto:admin@cazh.id" class="text-lg text-blue-600 hover:text-blue-700 transition-colors font-medium">
                                            admin@cazh.id
                                        </a>
                                    </div>
                                </div>
                            </div>

                            <!-- Quick Actions -->
                            <div class="modern-card rounded-3xl p-8">
                                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Aksi Cepat</h3>
                                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                                    <a href="https://wa.me/62xxxxxxxxxx" target="_blank" 
                                       class="bg-gradient-to-r from-green-500 to-green-600 text-white font-semibold px-6 py-4 rounded-2xl hover:from-green-600 hover:to-green-700 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                                        <i class="fab fa-whatsapp text-xl mr-2"></i>
                                        WhatsApp
                                    </a>
                                    <a href="#demo" 
                                       class="bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold px-6 py-4 rounded-2xl hover:from-orange-600 hover:to-red-600 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
                                        <i class="fas fa-calendar text-xl mr-2"></i>
                                        Jadwalkan Demo
                                    </a>
                                </div>
                            </div>

                        </div>

                        <!-- Map and CTA Section -->
                        <div class="space-y-8">
                            
                            <!-- Interactive Map Card -->
                            <div class="modern-card rounded-3xl p-8 card-hover">
                                <h3 class="text-2xl font-bold text-gray-900 mb-6 text-center">Lokasi Kami</h3>
                                
                                <a 
                                    href="https://www.google.com/maps?q=Ruko+Graha+Timur,+Jl.+Martadireja+1+No.Blok+B2,+Kepetek,+Purwokerto+Tim,+Banyumas,+Jawa+Tengah+53111" 
                                    target="_blank" 
                                    rel="noopener noreferrer"
                                    class="block w-full h-80 rounded-2xl overflow-hidden shadow-xl hover:shadow-2xl transition-all duration-500 transform hover:scale-[1.02] group"
                                    aria-label="Lihat lokasi PT Cazh Teknologi Inovasi di Google Maps"
                                >
                                    <div class="relative w-full h-full">
                                        <iframe 
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3954.296291741962!2d109.2410102!3d-7.633294199999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e65412cf5ce3817%3A0x59f1fdc0d16fc916!2sPT%20Cazh%20Teknologi%20Inovasi!5e0!3m2!1sid!2sid!4v1721334066016!5m2!1sid!2sid" 
                                            width="100%" 
                                            height="100%" 
                                            style="border:0; pointer-events: none;" 
                                            allowfullscreen="" 
                                            loading="lazy" 
                                            referrerpolicy="no-referrer-when-downgrade"
                                            class="transition-all duration-500 group-hover:brightness-110"
                                        ></iframe>
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-end justify-center pb-6">
                                            <span class="text-white font-semibold text-lg bg-black/40 px-4 py-2 rounded-full backdrop-blur-sm">
                                                <i class="fas fa-external-link-alt mr-2"></i>
                                                Buka di Google Maps
                                            </span>
                                        </div>
                                    </div>
                                </a>

                                <div class="mt-6 text-center">
                                    <a href="https://www.google.com/maps?q=Ruko+Graha+Timur,+Jl.+Martadireja+1+No.Blok+B2,+Kepetek,+Purwokerto+Tim,+Banyumas,+Jawa+Tengah+53111" 
                                       target="_blank" 
                                       class="inline-flex items-center text-blue-600 hover:text-blue-700 font-semibold text-lg transition-colors">
                                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                        Lihat Rute di Google Maps
                                        <i class="fas fa-arrow-right ml-2 transition-transform duration-300 hover:translate-x-1"></i>
                                    </a>
                                </div>
                            </div>

                        </div>

                    </div>

                    <!-- Final CTA Section -->
                    <div class="mt-24">
                        <div class="modern-card rounded-3xl p-12 text-center animated-gradient">
                            <div class="max-w-3xl mx-auto">
                                <h3 class="text-4xl font-bold text-white mb-6">
                                    Siap Bertransformasi Digital?
                                </h3>
                                <p class="text-xl text-white/90 mb-8 leading-relaxed">
                                    Jadikan lingkungan sekolah Anda lebih modern dan efisien dengan teknologi CARDS. 
                                    Mari bersama menciptakan masa depan pendidikan yang lebih baik!
                                </p>
                                <div class="flex flex-col sm:flex-row justify-center gap-6">
                                    <a href="https://wa.me/62xxxxxxxxxx" target="_blank" 
                                       class="bg-white text-gray-900 font-bold px-8 py-4 rounded-full hover:bg-gray-100 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 text-lg">
                                        <i class="fab fa-whatsapp text-green-500 mr-3"></i>
                                        Mulai Konsultasi Gratis
                                    </a>
                                    <a href="#demo" 
                                       class="bg-transparent border-2 border-white text-white font-bold px-8 py-4 rounded-full hover:bg-white hover:text-gray-900 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:-translate-y-2 text-lg">
                                        <i class="fas fa-play-circle mr-3"></i>
                                        Request Demo
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </section>

        </div>
    </section>

    <script>
        // Mobile menu functions
        function toggleMobileMenu() {
            const menu = document.getElementById("mobile-menu");
            const line1 = document.getElementById("line1");
            const line2 = document.getElementById("line2");
            const line3 = document.getElementById("line3");
            
            menu.classList.toggle("hidden");
            
            // Animate hamburger to X
            if (!menu.classList.contains("hidden")) {
                line1.style.transform = "rotate(45deg) translate(5px, 5px)";
                line2.style.opacity = "0";
                line3.style.transform = "rotate(-45deg) translate(7px, -6px)";
            } else {
                line1.style.transform = "";
                line2.style.opacity = "";
                line3.style.transform = "";
            }
        }

        // Smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const productDropdown = document.getElementById('product-dropdown');
            const mobileProductDropdown = document.getElementById('mobile-product-dropdown');
            const mobileMenu = document.getElementById('mobile-menu');
            
            // Close desktop dropdown
            if (!event.target.closest('#product-dropdown-wrapper')) {
                productDropdown.classList.add('hidden');
            }
            
            // Close mobile dropdown and menu when clicking outside
            if (!event.target.closest('#mobile-menu') && !event.target.closest('button[onclick="toggleMenu()"]')) {
                mobileMenu.classList.add('hidden');
                mobileProductDropdown.classList.add('hidden');
            }
        });

        // Navbar scroll effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white/95');
                navbar.classList.remove('glass');
            } else {
                navbar.classList.remove('bg-white/95');
                navbar.classList.add('glass');
            }
        });

        // Dropdown functions
        function toggleDropdown() {
            const dropdown = document.getElementById('product-dropdown');
            dropdown.classList.toggle('hidden');
        }

        function toggleMobileProductDropdown() {
            const dropdown = document.getElementById('mobile-product-dropdown');
            const icon = document.getElementById('mobile-dropdown-icon');
            dropdown.classList.toggle('hidden');
            if (dropdown.classList.contains('hidden')) {
                icon.style.transform = '';
            } else {
                icon.style.transform = 'rotate(180deg)';
            }
        }

        // Add loading animation for map
        window.addEventListener('load', function() {
            const mapContainer = document.querySelector('iframe');
            if (mapContainer) {
                mapContainer.addEventListener('load', function() {
                    this.style.opacity = '1';
                });
            }
        });
    </script>

    <footer class="bg-gradient-to-br from-[#007696] to-[#0289a4] text-white">
        <svg class="w-full" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
            <path fill="#ffffff" fill-opacity="1" d="M0,224L48,202.7C96,181,192,139,288,138.7C384,139,480,181,576,208C672,235,768,245,864,224C960,203,1056,149,1152,122.7C1248,96,1344,96,1392,96L1440,96L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z"></path>
        </svg>

        <div class="max-w-7xl mx-auto px-4 py-16">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-12">
                <div class="lg:col-span-2 space-y-6">
                    <div class="flex items-center space-x-3">
                        <div class="w-12 h-12 bg-gradient-to-r from-white to-gray-100 rounded-xl flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-[#007696] text-xl"></i>
                        </div>
                        <span class="text-2xl font-bold">Cards School</span>
                    </div>
                    <p class="text-white/80 text-lg leading-relaxed max-w-md">
                        Platform digital terdepan untuk manajemen sekolah modern. Menghubungkan guru, siswa, dan orang tua dalam satu ekosistem pembelajaran yang terintegrasi.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-instagram"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-white/10 hover:bg-white/20 rounded-xl flex items-center justify-center transition-all duration-300 hover:scale-110">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                    </div>
                </div>

                <div class="space-y-6">
                    <h4 class="text-xl font-semibold">Quick Links</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-white/80 hover:text-white transition-colors hover:translate-x-1 inline-block">Home</a></li>
                        <li><a href="#" class="text-white/80 hover:text-white transition-colors hover:translate-x-1 inline-block">About Us</a></li>
                        <li><a href="#" class="text-white/80 hover:text-white transition-colors hover:translate-x-1 inline-block">Features</a></li>
                        <li><a href="#" class="text-white/80 hover:text-white transition-colors hover:translate-x-1 inline-block">Pricing</a></li>
                        <li><a href="#" class="text-white/80 hover:text-white transition-colors hover:translate-x-1 inline-block">Contact</a></li>
                    </ul>
                </div>

                <div class="space-y-6">
                    <h4 class="text-xl font-semibold">Contact Us</h4>
                    <div class="space-y-4">
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-envelope w-5"></i>
                            <span class="text-white/80">info@cardsschool.com</span>
                        </div>
                        <div class="flex items-center space-x-3">
                            <i class="fas fa-phone w-5"></i>
                            <span class="text-white/80">+62 123 456 7890</span>
                        </div>
                        <div class="flex items-start space-x-3">
                            <i class="fas fa-map-marker-alt w-5 mt-1"></i>
                            <span class="text-white/80">Jl. Pendidikan No. 123<br>Jakarta, Indonesia</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="border-t border-white/10">
            <div class="max-w-7xl mx-auto px-4 py-6 flex flex-col md:flex-row items-center justify-between gap-4">
                <p class="text-white/80 text-center md:text-left">
                    © 2025 Cards School by CAZH. All rights reserved.
                </p>
                <div class="flex space-x-6 text-sm">
                    <a href="#" class="text-white/80 hover:text-white transition-colors">Privacy Policy</a>
                    <a href="#" class="text-white/80 hover:text-white transition-colors">Terms of Service</a>
                    <a href="#" class="text-white/80 hover:text-white transition-colors">Support</a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>