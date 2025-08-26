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

        /* Warna Utama yang Diperbarui */
        :root {
            --primary: #00718F;
            --primary-light: #0082A5; /* Warna gradasi yang baru */
            --primary-dark: #005F73;
        }
        
        .gradient-bg {
            background: linear-gradient(135deg, var(--primary) 0%, var(--primary-light) 100%);
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
            box-shadow: 0 0 20px rgba(0, 113, 143, 0.4);
        }
        
        .animated-gradient {
            background: linear-gradient(-45deg, var(--primary), var(--primary-light), #00b8c5, #00d4d9);
            background-size: 400% 400%;
            animation: gradient 15s ease infinite;
        }
        
        @keyframes gradient {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }
        
        .contact-hero {
            background: linear-gradient(135deg, var(--primary-dark) 0%, var(--primary) 50%, var(--primary-light) 100%);
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
<body class="bg-gradient-to-br from-[#E6F4F6] via-[#F0FBFD] to-[#CDEDEF] min-h-screen">

    <section class="relative isolate overflow-hidden">
        <div class="relative z-10">

            <!-- Include Navbar Component -->
            <x-user.navbar />

            <!-- Hero Section -->
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
                            Hubungi Kami 
                            <span class="text-white drop-shadow-lg">
                                
                            </span>
                        </h1>
                        
                        <p class="text-xl sm:text-2xl leading-relaxed text-white/90 max-w-2xl mx-auto">
                            Masih bingung soal fitur, ingin coba demo, atau tertarik kerja sama dengan CARDS? Tenang, tim kami siap membantu menemukan solusi terbaik sesuai kebutuhan sekolah Anda.
                            <br class="hidden sm:block">
                        </p>
                        
                        <div class="flex flex-col sm:flex-row gap-4 justify-center pt-8">
                            <a href="#contact-info" class="bg-white text-[var(--primary)] font-semibold px-8 py-4 rounded-full hover:bg-white/90 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1">
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
            </section>

            <!-- Contact Information Section -->
            <section id="contact-info" class="bg-gradient-to-br from-[#E6F4F6] via-[#F0FBFD] to-[#CDEDEF] py-32 px-4 sm:px-6 lg:px-8">
                <div class="max-w-7xl mx-auto">
                    
                    <!-- Section Header -->
                    <div class="text-center mb-16">
                        <h2 class="text-4xl font-bold text-gray-900 mb-4">
                            Tunggu Apa Lagi?
                            <span class="bg-gradient-to-r from-[var(--primary)] to-[var(--primary-light)] bg-clip-text text-transparent">
                                
                            </span>
                        </h2>
                        <p class="text-xl text-gray-600 max-w-2xl mx-auto">
                           Digitalisasi sekolah Anda sekarang juga bersama Cards. Lebih efisien, lebih mudah, dan semuanya dari satu platform.
                        </p>
                    </div>

                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-start">

                        <!-- Contact Cards -->
                        <div class="space-y-8">
                            
                            <!-- Company Info Card -->
                            <div class="modern-card rounded-3xl p-8 card-hover">
                                <div class="flex items-start space-x-4">
                                    <div class="flex-shrink-0">
                                        <div class="w-16 h-16 bg-gradient-to-r from-[var(--primary)] to-[var(--primary-light)] rounded-2xl flex items-center justify-center shadow-lg">
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
                                        <a href="mailto:admin@cazh.id" class="text-lg text-[var(--primary)] hover:text-[var(--primary-light)] transition-colors font-medium">
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
                                        class="bg-gradient-to-r from-[var(--primary)] to-[var(--primary-light)] text-white font-semibold px-6 py-4 rounded-2xl hover:from-[var(--primary-dark)] hover:to-[var(--primary)] transition-all duration-300 shadow-lg hover:shadow-xl transform hover:-translate-y-1 text-center">
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
                                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3956.3758238879923!2d109.2581984!3d-7.423594400000001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e655f63e94f62b5%3A0xf911bc8997b8952a!2sCAZH!5e0!3m2!1sen!2sid!4v1756246660520!5m2!1sen!2sid" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
                                        class="inline-flex items-center text-[var(--primary)] hover:text-[var(--primary-light)] font-semibold text-lg transition-colors">
                                        <i class="fas fa-map-marker-alt text-red-500 mr-2"></i>
                                        Lihat Rute di Google Maps
                                        <i class="fas fa-arrow-right ml-2 transition-transform duration-300 hover:translate-x-1"></i>
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

        // Smooth scrolling
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
            
            if (!event.target.closest('#product-dropdown-wrapper')) {
                productDropdown.classList.add('hidden');
            }
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

        window.addEventListener('load', function() {
            const mapContainer = document.querySelector('iframe');
            if (mapContainer) {
                mapContainer.addEventListener('load', function() {
                    this.style.opacity = '1';
                });
            }
        });
    </script>

    <x-user.footer />
</body>
</html>
