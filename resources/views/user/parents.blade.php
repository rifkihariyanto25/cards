<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards Parents - Pantau Perkembangan Anak dengan Mudah</title>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        'inter': ['Inter', 'sans-serif'],
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slide-up': 'slideUp 0.8s ease-out forwards',
                        'fade-in': 'fadeIn 1s ease-out forwards',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' },
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 5px #f7931e, 0 0 10px #f7931e, 0 0 15px #f7931e' },
                            '100%': { boxShadow: '0 0 20px #f7931e, 0 0 30px #f7931e, 0 0 40px #f7931e' },
                        },
                        slideUp: {
                            '0%': { opacity: '0', transform: 'translateY(30px)' },
                            '100%': { opacity: '1', transform: 'translateY(0)' },
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' },
                        }
                    },
                }
            }
        }
    </script>
    <style>
        body { font-family: 'Inter', sans-serif; }
        .glass {
            background: rgba(255, 255, 255, 0.25);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
        }
        .hover-lift { transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1); }
        .hover-lift:hover { transform: translateY(-8px); }
        .gradient-text {
            background: linear-gradient(135deg, #007696 0%, #f7931e 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        .feature-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(0, 118, 150, 0.1);
            backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .feature-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 118, 150, 0.15);
            border-color: rgba(247, 147, 30, 0.3);
        }
        .feature-card::after {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #007696, #f7931e);
            border-radius: 12px 12px 0 0;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .feature-card:hover::after { opacity: 1; }
        .reveal { opacity: 0; transform: translateY(50px); transition: all 0.8s ease; }
        .reveal.active { opacity: 1; transform: translateY(0); }
        .gradient-text-white {
            background: linear-gradient(135deg, #ffffff 0%, #f0f9ff 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>
</head>
<body class="font-inter antialiased bg-white">
    <div class="scroll-indicator"></div>
    
    <x-user.navbar />
    
    <section class="relative bg-gradient-to-br from-[#007696] via-[#0289a4] to-[#007696] pt-32 pb-20 px-6 sm:px-10 lg:px-20 overflow-hidden min-h-screen flex items-center">
        <div class="floating-elements">
            <div class="floating-circle" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-circle" style="top: 60%; right: 15%; animation-delay: 2s;"></div>
            <div class="floating-circle" style="top: 80%; left: 20%; animation-delay: 4s;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
            <div class="text-white animate-slide-up text-center lg:text-left">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 rounded-full text-sm font-medium mb-6 backdrop-blur-sm">
                    <i class="fas fa-child mr-2 text-[#f7931e]"></i>
                    Untuk Orang Tua Hebat
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6">
                    <span class="gradient-text-white">{{ $heroData->title ?? 'Cards Parents' }}</span>
                </h1>
                
                <p class="text-xl text-white/80 mb-8 leading-relaxed max-w-lg mx-auto lg:mx-0">
                    {!! $heroData->subtitle ?? 'Transformasi sekolah jadi digital? Bisa! Dengan Cards Parents, kelola uang saku anak, tagihan sekolah, dan rapor jadi lebih cepat, rapi, dan terpantau!' !!}
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#features" class="group inline-flex items-center justify-center px-8 py-4 bg-[#f7931e] hover:bg-[#db7a00] text-white rounded-2xl font-semibold transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <i class="far fa-star mr-3 group-hover:scale-110 transition-transform"></i>
                        Selengkapnya
                    </a>
                    <a href="#demo" class="group inline-flex items-center justify-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white rounded-2xl font-semibold transition-all duration-300 backdrop-blur-sm border border-white/20">
                        <i class="fas fa-calendar-alt mr-3 group-hover:scale-110 transition-transform"></i>
                        Jadwalkan Demo
                    </a>
                </div>
            </div>

            <div class="order-1 lg:order-2 flex justify-center">
                <div class="relative w-[400px] h-[350px] animate-fade-in">
                    <div class="absolute inset-0 bg-[#f7931e] rounded-full blur-3xl opacity-20 animate-glow"></div>
                    
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[240px] bg-gradient-to-r from-[#f7931e] to-[#ff6b35] rounded-[3rem] shadow-2xl z-0 transform rotate-[-12deg] hover:rotate-[-8deg] transition-transform duration-500"></div>
                    
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 hover-lift">
                        <img src="{{ asset('storage/' . ($heroData->cover_image ?? 'parents/hero/parents_hero.png')) }}" alt="Cards Parents Mockup" class="w-[280px] h-auto object-contain rounded-3xl shadow-2xl animate-float">
                    </div>
                </div>
            </div>
        </div>
        
        <div class="absolute bottom-0 left-0 w-full">
            <svg viewBox="0 0 1440 120" class="w-full h-auto">
                <path fill="#ffffff" fill-opacity="1" d="M0,64L48,69.3C96,75,192,85,288,80C384,75,480,53,576,48C672,43,768,53,864,64C960,75,1056,85,1152,80C1248,75,1344,53,1392,42.7L1440,32L1440,120L1392,120C1344,120,1248,120,1152,120C1056,120,960,120,864,120C768,120,672,120,576,120C480,120,384,120,288,120C192,120,96,120,48,120L0,120Z"></path>
            </svg>
        </div>
    </section>

    <section class="py-24 px-4 bg-white">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-20 items-center">
            <div class="flex justify-center">
                <div class="relative w-[400px] h-[350px]">
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[240px] bg-gradient-to-r from-[#007696] to-[#0289a4] rounded-[3rem] shadow-2xl z-0 transform rotate-[12deg]"></div>
                    
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10">
                        <img src="{{ asset('storage/' . ($aboutData->cover_image ?? 'parents/about/apaitu_parents.png')) }}" alt="Tentang Cards Parents" class="w-[280px] h-auto object-contain rounded-3xl shadow-2xl hover-lift">
                    </div>
                </div>
            </div>

            <div class="space-y-8 text-center lg:text-left">
                <div class="space-y-6">
                    <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-full text-sm font-medium text-[#007696]">
                        <i class="fas fa-info-circle mr-2"></i>
                        Solusi Modern
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold gradient-text leading-tight">
                        {{ $aboutData->title ?? 'Apa Itu Cards Parents?' }}
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed">
                        {!! $aboutData->subtitle ?? 'Sistem ini menyajikan solusi modern yang menyederhanakan peran orang tua. Dengan menggabungkan berbagai fungsi seperti manajemen keuangan, pemantauan pendidikan, dan juga yang lainnya dalam satu dasbor yang mudah diakses.' !!}
                    </p>
                </div>
                
                <div class="grid grid-cols-2 gap-6">
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#007696] mb-2">Real-time</div>
                        <div class="text-gray-600">Monitoring Anak</div>
                    </div>
                    <div class="text-center">
                        <div class="text-3xl font-bold text-[#f7931e] mb-2">Praktis</div>
                        <div class="text-gray-600">Pembayaran Digital</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-24 px-4 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 space-y-6">
                <div class="inline-flex items-center px-4 py-2 bg-white rounded-full text-sm font-medium text-[#007696] shadow-sm">
                    <i class="fas fa-star mr-2"></i>
                    Fitur Unggulan
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold gradient-text">
                    Fitur-fitur Cards Parents
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Semua yang Anda butuhkan untuk mendukung pendidikan anak dalam satu genggaman.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @forelse($features ?? [] as $feature)
                <article class="feature-card rounded-2xl p-8 text-center hover-lift shadow-lg hover:shadow-xl transition-all duration-300 reveal">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#007696] to-[#f7931e] rounded-2xl flex items-center justify-center mx-auto mb-6">
                        @if(isset($feature->gambar) && $feature->gambar)
                        <img src="{{ asset('storage/' . $feature->gambar) }}" alt="Ikon {{ $feature->nama }}" class="w-8 h-8">
                        @else
                        <i class="fas fa-star text-white text-xl"></i>
                        @endif
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $feature->nama }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $feature->deskripsi }}</p>
                </article>
                @empty
                <article class="feature-card rounded-2xl p-8 text-center hover-lift shadow-lg hover:shadow-xl transition-all duration-300 reveal">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#007696] to-[#f7931e] rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-calendar-check text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Jadwal Otomatis</h3>
                    <p class="text-gray-600 leading-relaxed">Lihat jadwal pelajaran dan kegiatan anak secara real-time langsung dari aplikasi.</p>
                </article>
                <article class="feature-card rounded-2xl p-8 text-center hover-lift shadow-lg hover:shadow-xl transition-all duration-300 reveal">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#007696] to-[#f7931e] rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-wallet text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Pembayaran Digital</h3>
                    <p class="text-gray-600 leading-relaxed">Kelola pembayaran sekolah dan top-up uang saku anak dengan mudah dan aman.</p>
                </article>
                <article class="feature-card rounded-2xl p-8 text-center hover-lift shadow-lg hover:shadow-xl transition-all duration-300 reveal">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#007696] to-[#f7931e] rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <i class="fas fa-book-open text-white text-xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Rapor Online</h3>
                    <p class="text-gray-600 leading-relaxed">Pantau perkembangan akademik anak kapan saja melalui rapor digital yang detail.</p>
                </article>
                @endforelse
            </div>
        </div>
    </section>

    <section class="py-24 px-4 bg-white">
        <div class="max-w-7xl mx-auto">
            <div class="flex flex-col lg:flex-row items-center gap-16">
                <div class="w-full lg:w-1/2 flex justify-center order-2 lg:order-1">
                    <div class="relative">
                        <div class="absolute inset-0 bg-gradient-to-r from-[#007696] to-[#f7931e] rounded-[4rem] blur-3xl opacity-20"></div>
                        <div class="relative bg-gradient-to-br from-[#f7931e] to-[#ff6b35] p-8 rounded-[4rem] shadow-2xl max-w-md">
                            <div class="bg-white rounded-[3rem] p-6 shadow-xl">
                                <div class="aspect-square bg-gradient-to-br from-gray-50 to-gray-100 rounded-[2rem] flex items-center justify-center">
                                    <i class="fas fa-download text-6xl text-[#007696]"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-1/2 text-center lg:text-left order-1 lg:order-2 space-y-8">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-full text-sm font-medium text-[#007696]">
                            <i class="fas fa-mobile-alt mr-2"></i>
                            Tersedia di Semua Platform
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold gradient-text leading-tight">
                            Download Aplikasi<br class="hidden lg:block">Cards Parents
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                            Mulai perjalanan digital Anda sebagai orang tua! Download aplikasi Cards Parents untuk pengalaman memantau pendidikan anak yang tak terlupakan.
                        </p>
                    </div>
                    <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                        <a href="#" class="group inline-flex items-center justify-center px-6 py-4 bg-black text-white rounded-2xl hover:bg-gray-800 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <i class="fab fa-apple text-2xl group-hover:scale-110 transition-transform"></i>
                                <div class="text-left">
                                    <div class="text-xs opacity-80">Download on the</div>
                                    <div class="font-bold">App Store</div>
                                </div>
                            </div>
                        </a>
                        <a href="#" class="group inline-flex items-center justify-center px-6 py-4 bg-green-600 text-white rounded-2xl hover:bg-green-700 transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                            <div class="flex items-center space-x-3">
                                <i class="fab fa-google-play text-2xl group-hover:scale-110 transition-transform"></i>
                                <div class="text-left">
                                    <div class="text-xs opacity-80">Get it on</div>
                                    <div class="font-bold">Google Play</div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <x-user.footer />
    
    <script>
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
            const icon = document.querySelector('#mobile-product-dropdown-button i');
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Mobile menu toggle
        function toggleMenu() {
            const menu = document.getElementById("mobile-menu");
            const mobileProductDropdown = document.getElementById("mobile-product-dropdown");
            const line1 = document.getElementById("line1");
            const line2 = document.getElementById("line2");
            const line3 = document.getElementById("line3");
            
            menu.classList.toggle("hidden");
            
            // Animate hamburger to X
            if (!menu.classList.contains("hidden")) {
                line1.classList.add("rotate-45", "translate-y-1.5");
                line2.classList.add("opacity-0");
                line3.classList.add("-rotate-45", "-translate-y-1.5");
            } else {
                line1.classList.remove("rotate-45", "translate-y-1.5");
                line2.classList.remove("opacity-0");
                line3.classList.remove("-rotate-45", "-translate-y-1.5");
                
                // Hide mobile product dropdown when closing menu
                if (mobileProductDropdown) {
                    mobileProductDropdown.classList.add("hidden");
                    const icon = document.querySelector('#mobile-product-dropdown-button i');
                    if (icon) icon.classList.remove('rotate-180');
                }
            }
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdownWrapper = document.getElementById('product-dropdown-wrapper');
            const dropdown = document.getElementById('product-dropdown');
            if (dropdown && dropdownWrapper && !dropdownWrapper.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
            
            // Close mobile menu when clicking outside
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileMenuButton = document.querySelector('[onclick="toggleMenu()"]');
            if (mobileMenu && !mobileMenu.classList.contains('hidden') && 
                !mobileMenu.contains(event.target) && 
                !mobileMenuButton.contains(event.target)) {
                toggleMenu();
            }
        });

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
        
        // Intersection Observer for animations
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, { threshold: 0.1, rootMargin: '0px 0px -50px 0px' });

        // Observe elements for animation
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.reveal').forEach(el => {
                observer.observe(el);
            });
        });
    </script>
</body>
</html>