<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards Canteen - Platform Kantin Digital</title>
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
        .product-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
            border: 1px solid rgba(0, 118, 150, 0.1);
            backdrop-filter: blur(20px);
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .product-card:hover {
            transform: translateY(-12px) scale(1.02);
            box-shadow: 0 25px 50px rgba(0, 118, 150, 0.15);
            border-color: rgba(247, 147, 30, 0.3);
        }
        .product-card::after {
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
        .product-card:hover::after { opacity: 1; }
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
    
    <!-- Include Navbar Component -->
    <x-user.navbar />

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-[#007696] via-[#0289a4] to-[#007696] pt-32 pb-20 px-6 sm:px-10 lg:px-20 overflow-hidden min-h-screen flex items-center">
        <div class="floating-elements">
            <div class="floating-circle" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-circle" style="top: 60%; right: 15%; animation-delay: 2s;"></div>
            <div class="floating-circle" style="top: 80%; left: 20%; animation-delay: 4s;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
            <div class="text-white animate-slide-up text-center lg:text-left">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 rounded-full text-sm font-medium mb-6 backdrop-blur-sm">
                    <i class="fas fa-utensils mr-2 text-[#f7931e]"></i>
                    Kantin Digital Terdepan
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6" style="font-size: {{ $hero->title_font_size ?? '3rem' }}">
                    <span class="gradient-text-white">{{ $hero->title ?? 'Uang Saku Digital: Solusi Cashless yang Aman & Terkontrol untuk Transaksi Kantin.' }}</span>
                </h1>
                
                <p class="text-xl text-white/80 mb-8 leading-relaxed max-w-lg mx-auto lg:mx-0" style="font-size: {{ $hero->subtitle_font_size ?? '1.25rem' }}">
                    {{ $hero->subtitle ?? 'Terhubung dengan akun orang tua, semua transaksi terpantau real-time & bebas dari risiko kehilangan uang tunai.' }}
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
                    <a href="#demo" class="group inline-flex items-center justify-center px-8 py-4 bg-[#f7931e] hover:bg-[#db7a00] text-white rounded-2xl font-semibold transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <i class="far fa-calendar-alt mr-3 group-hover:scale-110 transition-transform"></i>
                        Jadwalkan Demo
                    </a>
                    <a href="#about" class="group inline-flex items-center justify-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white rounded-2xl font-semibold transition-all duration-300 backdrop-blur-sm border border-white/20">
                        <i class="fas fa-info-circle mr-3 group-hover:scale-110 transition-transform"></i>
                        Pelajari Lebih Lanjut
                    </a>
                </div>
            </div>

            <div class="order-1 lg:order-2 flex justify-center">
                <div class="relative w-[400px] h-[350px] animate-fade-in">
                    <div class="absolute inset-0 bg-[#f7931e] rounded-full blur-3xl opacity-20 animate-glow"></div>
                    
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[240px] bg-gradient-to-r from-[#f7931e] to-[#ff6b35] rounded-[3rem] shadow-2xl z-0 transform rotate-[-12deg] hover:rotate-[-8deg] transition-transform duration-500"></div>
                    
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 hover-lift">
                        <img src="{{ isset($hero->cover_image) && $hero->cover_image ? asset('storage/' . $hero->cover_image) : '../img/hero_canteen.png' }}" alt="Foto siswa di kantin" class="w-[280px] h-auto object-contain rounded-3xl shadow-2xl animate-float">
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

    <!-- About Section -->
    <section id="about" class="py-24 px-4 bg-white">
        <div class="max-w-7xl mx-auto grid lg:grid-cols-2 gap-20 items-center">
            <div class="flex justify-center order-2 lg:order-1">
                <div class="relative w-[400px] h-[350px]">
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[240px] bg-gradient-to-r from-[#f7931e] to-[#ff6b35] rounded-[3rem] shadow-2xl z-0 transform rotate-[12deg]"></div>
                    
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10">
                        <img src="{{ isset($about->cover_image) && $about->cover_image ? asset('storage/' . $about->cover_image) : '../img/apait_canteen.png' }}" alt="Mockup E-Canteen" class="w-[280px] h-auto object-contain rounded-3xl shadow-2xl hover-lift">
                    </div>
                </div>
            </div>

            <div class="space-y-8 text-center lg:text-left order-1 lg:order-2">
                <div class="space-y-6">
                    <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-full text-sm font-medium text-[#007696]">
                        <i class="fas fa-utensils mr-2"></i>
                        Solusi Kantin Digital
                    </div>
                    <h2 class="text-4xl lg:text-5xl font-bold gradient-text leading-tight" style="font-size: {{ $about->title_font_size ?? '3rem' }}">
                        {{ $about->title ?? 'Apa itu Cards E-Canteen?' }}
                    </h2>
                    <p class="text-xl text-gray-600 leading-relaxed" style="font-size: {{ $about->subtitle_font_size ?? '1.25rem' }}">
                        {{ $about->subtitle ?? 'E-Canteen adalah solusi kantin digital dari CARDS yang dirancang untuk mempermudah transaksi di lingkungan sekolah, kampus, atau institusi. Dengan sistem ini, proses jual beli di kantin menjadi lebih cepat, aman, dan tanpa uang tunai, sehingga membantu membentuk budaya cashless sekaligus mendukung efisiensi operasional.' }}
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-24 px-4 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 space-y-6">
                <div class="inline-flex items-center px-4 py-2 bg-white rounded-full text-sm font-medium text-[#007696] shadow-sm">
                    <i class="fas fa-star mr-2"></i>
                    Produk Unggulan
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold gradient-text">
                    Solusi <span class="text-[#007F9E] font-bold">Kantin</span> Masa Kini: Tanpa Tunai, Penuh <span class="text-[#007F9E] font-bold">Kendali</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Satu sentuhan di kantin, transaksi langsung tercatat. Uang saku tersimpan aman dalam kartu atau gelang, dan bisa dipantau orang tua kapan saja.
                </p>
            </div>
            
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Produk 1 -->
                <article class="product-card relative rounded-2xl p-8 text-center hover-lift shadow-lg hover:shadow-xl transition-all duration-300 reveal">
                    <div class="bg-[#9DE1E4] rounded-xl p-6 shadow-md mb-6">
                        <img src="../img/produk1.png" alt="Kartu QR Code" class="w-full max-w-[280px] mx-auto">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Kartu Siswa Berbasis QR Code</h3>
                    <p class="text-gray-600 leading-relaxed">Teknologi QR Code modern untuk transaksi cepat dan akurat di kantin sekolah.</p>
                </article>

                <!-- Produk 2 -->
                <article class="product-card relative rounded-2xl p-8 text-center hover-lift shadow-lg hover:shadow-xl transition-all duration-300 reveal">
                    <div class="bg-[#9DE1E4] rounded-xl p-6 shadow-md mb-6">
                        <img src="../img/produk2.png" alt="Kartu RFID" class="w-full max-w-[280px] mx-auto">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Kartu Siswa Berbasis RFID</h3>
                    <p class="text-gray-600 leading-relaxed">Kartu RFID yang praktis dan tahan lama untuk kemudahan transaksi harian.</p>
                </article>

                <!-- Produk 3 -->
                <article class="product-card relative rounded-2xl p-8 text-center hover-lift shadow-lg hover:shadow-xl transition-all duration-300 reveal">
                    <div class="bg-[#9DE1E4] rounded-xl p-6 shadow-md mb-6">
                        <img src="../img/produk3.png" alt="Gelang RFID" class="w-full max-w-[280px] mx-auto">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Gelang Siswa Berbasis RFID</h3>
                    <p class="text-gray-600 leading-relaxed">Gelang RFID yang stylish dan aman, tidak mudah hilang atau rusak.</p>
                </article>
            </div>
        </div>
    </section>

    <!-- CTA Section -->
    <section class="py-24 px-4 bg-gradient-to-br from-[#007696] to-[#0289a4] text-white">
        <div class="max-w-4xl mx-auto text-center space-y-8">
            <div class="space-y-6">
                <h2 class="text-4xl lg:text-5xl font-bold">
                    Siap Mengubah Kantin Anda?
                </h2>
                <p class="text-xl text-white/80 max-w-2xl mx-auto">
                    Bergabunglah dengan sekolah-sekolah terdepan yang telah menggunakan Cards E-Canteen untuk meningkatkan efisiensi dan keamanan transaksi kantin mereka.
                </p>
            </div>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="#demo" class="group inline-flex items-center justify-center px-8 py-4 bg-[#f7931e] hover:bg-[#db7a00] text-white rounded-2xl font-semibold transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                    <i class="fas fa-calendar-alt mr-3 group-hover:scale-110 transition-transform"></i>
                    Jadwalkan Demo Gratis
                </a>
                <a href="#contact" class="group inline-flex items-center justify-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white rounded-2xl font-semibold transition-all duration-300 backdrop-blur-sm border border-white/20">
                    <i class="fas fa-phone mr-3 group-hover:scale-110 transition-transform"></i>
                    Hubungi Kami
                </a>
            </div>
        </div>
    </section>

    <!-- Include Footer Component -->
    <x-user.footer />
    
    <script>
        // Mobile menu toggle
        function toggleMenu() {
            const menu = document.getElementById("mobile-menu");
            const mobileProductDropdown = document.getElementById("mobile-product-dropdown");
            menu.classList.toggle("hidden");
            if (mobileProductDropdown) {
                mobileProductDropdown.classList.add("hidden");
            }
        }

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

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdownWrapper = document.getElementById('product-dropdown-wrapper');
            const dropdown = document.getElementById('product-dropdown');
            const mobileMenu = document.getElementById('mobile-menu');
            const mobileProductDropdown = document.getElementById('mobile-product-dropdown');
            
            if (dropdown && !dropdownWrapper.contains(event.target)) {
                dropdown.classList.add('hidden');
            }
            
            if (mobileMenu && !event.target.closest('#mobile-menu') && !event.target.closest('button[onclick="toggleMenu()"]')) {
                mobileMenu.classList.add('hidden');
                mobileProductDropdown.classList.add('hidden');
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