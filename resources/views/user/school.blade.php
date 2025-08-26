<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards School - Modern Digital School Management</title>
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
    
    <nav id="navbar" class="fixed top-4 left-4 right-4 z-[200] glass shadow-xl px-8 py-4 rounded-2xl transition-all duration-500 hover:shadow-2xl">
        <div class="flex items-center justify-between">
            <a href="index.html" class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-gradient-to-r from-[#007696] to-[#f7931e] rounded-xl flex items-center justify-center">
                    <i class="fas fa-graduation-cap text-white text-lg"></i>
                </div>
                <span class="text-xl font-bold gradient-text">Cards School</span>
            </a>

            <button class="md:hidden focus:outline-none hover:scale-110 transition-transform" onclick="toggleMenu()">
                <div class="w-6 h-6 flex flex-col justify-between">
                    <span class="w-full h-0.5 bg-gray-800 rounded transition-all"></span>
                    <span class="w-full h-0.5 bg-gray-800 rounded transition-all"></span>
                    <span class="w-full h-0.5 bg-gray-800 rounded transition-all"></span>
                </div>
            </button>

            <div class="hidden md:flex space-x-8 items-center font-medium">
                <a href="index.html" class="hover:text-[#007696] transition-all duration-300 relative group">
                    Home
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#007696] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="flexy.html" class="hover:text-[#007696] transition-all duration-300 relative group">
                    Flexy
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#007696] transition-all duration-300 group-hover:w-full"></span>
                </a>
                
                <div class="relative" id="product-dropdown-wrapper">
                    <button onclick="toggleDropdown()" class="flex items-center hover:text-[#007696] focus:outline-none transition-all duration-300 group">
                        Products
                        <i class="fas fa-chevron-down ml-2 text-xs transition-transform group-hover:rotate-180"></i>
                    </button>
                    <div id="product-dropdown" class="absolute hidden glass rounded-2xl mt-4 py-3 w-48 z-[110] shadow-xl">
                        <a href="Edu.html" class="block px-6 py-3 hover:bg-white/20 transition-all duration-300 text-gray-700 hover:text-[#007696]">Edu</a>
                        <a href="parents.html" class="block px-6 py-3 hover:bg-white/20 transition-all duration-300 text-gray-700 hover:text-[#007696]">Parents</a>
                        <a href="school.html" class="block px-6 py-3 hover:bg-white/20 transition-all duration-300 text-gray-700 hover:text-[#007696]">School</a>
                        <a href="canteen.html" class="block px-6 py-3 hover:bg-white/20 transition-all duration-300 text-gray-700 hover:text-[#007696]">Canteen</a>
                    </div>
                </div>
                
                <a href="about.html" class="hover:text-[#007696] transition-all duration-300 relative group">
                    About
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#007696] transition-all duration-300 group-hover:w-full"></span>
                </a>
                <a href="contact.html" class="hover:text-[#007696] transition-all duration-300 relative group">
                    Contact
                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-[#007696] transition-all duration-300 group-hover:w-full"></span>
                </a>
            </div>
        </div>
    </nav>

    <div id="mobile-menu" class="md:hidden hidden fixed top-24 left-4 right-4 glass shadow-xl rounded-2xl z-[90] py-6">
        <div class="flex flex-col space-y-4 px-6 font-medium">
            <a href="index.html" class="text-[#007696] hover:text-[#f7931e] transition-colors py-2">Home</a>
            <a href="flexy.html" class="text-[#007696] hover:text-[#f7931e] transition-colors py-2">Flexy</a>
            
            <div class="relative">
                <button onclick="toggleMobileDropdown()" class="flex items-center text-[#007696] hover:text-[#f7931e] transition-colors py-2 w-full">
                    Products
                    <i class="fas fa-chevron-down ml-2 text-xs"></i>
                </button>
                <div id="mobile-product-dropdown" class="hidden ml-4 mt-2 space-y-2">
                    <a href="Edu.html" class="block py-2 text-gray-600 hover:text-[#007696] transition-colors">Edu</a>
                    <a href="parents.html" class="block py-2 text-gray-600 hover:text-[#007696] transition-colors">Parents</a>
                    <a href="school.html" class="block py-2 text-gray-600 hover:text-[#007696] transition-colors">School</a>
                    <a href="canteen.html" class="block py-2 text-gray-600 hover:text-[#007696] transition-colors">Canteen</a>
                </div>
            </div>
            
            <a href="about.html" class="text-[#007696] hover:text-[#f7931e] transition-colors py-2">About</a>
            <a href="contact.html" class="text-[#007696] hover:text-[#f7931e] transition-colors py-2">Contact</a>
        </div>
    </div>
    
    <section class="relative bg-gradient-to-br from-[#007696] via-[#0289a4] to-[#007696] pt-32 pb-20 px-6 sm:px-10 lg:px-20 overflow-hidden min-h-screen flex items-center">
        <div class="floating-elements">
            <div class="floating-circle" style="top: 20%; left: 10%; animation-delay: 0s;"></div>
            <div class="floating-circle" style="top: 60%; right: 15%; animation-delay: 2s;"></div>
            <div class="floating-circle" style="top: 80%; left: 20%; animation-delay: 4s;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-center gap-16">
            <div class="text-white animate-slide-up">
                <div class="inline-flex items-center px-4 py-2 bg-white/20 rounded-full text-sm font-medium mb-6 backdrop-blur-sm">
                    <i class="fas fa-sparkles mr-2 text-[#f7931e]"></i>
                    Solusi Digital Terdepan
                </div>
                
                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-bold leading-tight mb-6" style="font-size: {{ $heroData->title_font_size ?? '36px' }}">
                    <span class="gradient-text-white">{{ $heroData->title ?? 'Uang Saku Digital yang Aman & Terkontrol' }}</span>
                </h1>
                
                <p class="text-xl text-white/80 mb-8 leading-relaxed max-w-lg" style="font-size: {{ $heroData->subtitle_font_size ?? '18px' }}">
                    {{ $heroData->subtitle ?? 'Terhubung dengan akun orang tua, semua transaksi terpantau real-time & bebas dari risiko kehilangan uang tunai.' }}
                </p>
                
                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="#demo" class="group inline-flex items-center justify-center px-8 py-4 bg-[#f7931e] hover:bg-[#db7a00] text-white rounded-2xl font-semibold transition-all duration-300 hover:shadow-xl hover:-translate-y-1">
                        <i class="far fa-calendar-alt mr-3 group-hover:scale-110 transition-transform"></i>
                        Jadwalkan Demo
                    </a>
                    <a href="#features" class="group inline-flex items-center justify-center px-8 py-4 bg-white/10 hover:bg-white/20 text-white rounded-2xl font-semibold transition-all duration-300 backdrop-blur-sm border border-white/20">
                        <i class="fas fa-play mr-3 group-hover:scale-110 transition-transform"></i>
                        Lihat Fitur
                    </a>
                </div>
            </div>

            <div class="order-1 lg:order-2 flex justify-center">
                <div class="relative w-[400px] h-[350px] animate-fade-in">
                    <div class="absolute inset-0 bg-[#f7931e] rounded-full blur-3xl opacity-20 animate-glow"></div>
                    
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[240px] bg-gradient-to-r from-[#f7931e] to-[#ff6b35] rounded-[3rem] shadow-2xl z-0 transform rotate-[-12deg] hover:rotate-[-8deg] transition-transform duration-500"></div>
                    
                    <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10 hover-lift">
                        <img src="{{ asset('storage/' . ($heroData->cover_image ?? '../img/hero_school.png')) }}" alt="Mockup School" class="w-[280px] h-auto object-contain rounded-3xl shadow-2xl animate-float">
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
        <div class="max-w-7xl mx-auto">
            <div class="block lg:hidden space-y-12 text-center">
                <div class="space-y-6">
                    <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-full text-sm font-medium text-[#007696]">
                        <i class="fas fa-school mr-2"></i>
                        Platform Digital Sekolah
                    </div>
                    <h2 class="text-3xl sm:text-4xl font-bold gradient-text" style="font-size: {{ $aboutData->title_font_size ?? '30px' }}">
                        {{ $aboutData->title ?? 'Apa itu Cards School?' }}
                    </h2>
                    <p class="text-gray-600 text-lg leading-relaxed max-w-2xl mx-auto">
                        {{ $aboutData->subtitle ?? 'Cards adalah solusi digital inovatif untuk dunia pendidikan.' }}
                    </p>
                </div>
                
                <div class="prose prose-lg mx-auto text-gray-700">
                    <p class="text-justify" style="font-size: {{ $aboutData->subtitle_font_size ?? '16px' }}">
                        Cards School adalah platform digital yang dirancang untuk mempermudah pengelolaan kegiatan sekolah secara menyeluruh. Mulai dari absensi, manajemen nilai, komunikasi orang tua-guru, hingga pelaporan rapor—semua bisa dilakukan secara cepat, praktis, dan efisien dalam satu aplikasi.
                    </p>
                </div>
            </div>

            <div class="hidden lg:grid grid-cols-2 gap-20 items-center">
                <div class="space-y-8">
                    <div class="space-y-6">
                        <div class="inline-flex items-center px-4 py-2 bg-gray-100 rounded-full text-sm font-medium text-[#007696]">
                            <i class="fas fa-school mr-2"></i>
                            Platform Digital Sekolah
                        </div>
                        <h2 class="text-4xl lg:text-5xl font-bold gradient-text leading-tight" style="font-size: {{ $aboutData->title_font_size ?? '36px' }}">
                            {{ $aboutData->title ?? 'Apa itu Cards School?' }}
                        </h2>
                        <p class="text-xl text-gray-600 leading-relaxed" style="font-size: {{ $aboutData->subtitle_font_size ?? '20px' }}">
                            {{ $aboutData->subtitle ?? 'Cards School adalah platform digital yang dirancang untuk mempermudah pengelolaan kegiatan sekolah secara menyeluruh. Mulai dari absensi, manajemen nilai, komunikasi orang tua-guru, hingga pelaporan rapor—semua bisa dilakukan secara cepat, praktis, dan efisien dalam satu aplikasi.' }}
                        </p>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-6">
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#007696] mb-2">100+</div>
                            <div class="text-gray-600">Sekolah Mitra</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold text-[#f7931e] mb-2">50K+</div>
                            <div class="text-gray-600">Pengguna Aktif</div>
                        </div>
                    </div>
                </div>

                <div class="flex justify-center">
                    <div class="relative w-[400px] h-[350px]">
                        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-[320px] h-[240px] bg-gradient-to-r from-[#f7931e] to-[#ff6b35] rounded-[3rem] shadow-2xl z-0 transform rotate-[12deg]"></div>
                        
                        <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 z-10">
                            <img src="{{ asset('storage/' . ($aboutData->cover_image ?? '../img/apaitu_school.png')) }}" alt="Mockup E-Canteen" class="w-[280px] h-auto object-contain rounded-3xl shadow-2xl hover-lift">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-20 px-4 bg-gradient-to-r from-[#007696] to-[#0289a4] relative overflow-hidden">
        <div class="max-w-7xl mx-auto text-center text-white relative z-10">
            <div class="space-y-6 mb-16">
                <div class="modern-badge inline-flex items-center px-4 py-2 rounded-full text-sm font-medium text-white">
                    <i class="fas fa-chart-line mr-2"></i>
                    Statistik Terpercaya
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold">
                    Dipercaya Oleh Ribuan Sekolah
                </h2>
                <p class="text-xl text-white/80 max-w-3xl mx-auto">
                    Bergabunglah dengan komunitas pendidik yang telah merasakan transformasi digital bersama Cards School.
                </p>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-8">
                <div class="stat-counter group">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 hover:bg-white/20 transition-all duration-300">
                        <div class="text-4xl lg:text-5xl font-bold mb-3 group-hover:scale-110 transition-transform" id="counter-1">0</div>
                        <div class="text-white/80 text-lg">Sekolah Aktif</div>
                        <div class="progress-bar h-2 mt-4">
                            <div class="progress-fill" data-width="85%"></div>
                        </div>
                    </div>
                </div>
                <div class="stat-counter group">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 hover:bg-white/20 transition-all duration-300">
                        <div class="text-4xl lg:text-5xl font-bold mb-3 group-hover:scale-110 transition-transform" id="counter-2">0</div>
                        <div class="text-white/80 text-lg">Siswa Terdaftar</div>
                        <div class="progress-bar h-2 mt-4">
                            <div class="progress-fill" data-width="92%"></div>
                        </div>
                    </div>
                </div>
                <div class="stat-counter group">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 hover:bg-white/20 transition-all duration-300">
                        <div class="text-4xl lg:text-5xl font-bold mb-3 group-hover:scale-110 transition-transform" id="counter-3">0</div>
                        <div class="text-white/80 text-lg">Guru Aktif</div>
                        <div class="progress-bar h-2 mt-4">
                            <div class="progress-fill" data-width="78%"></div>
                        </div>
                    </div>
                </div>
                <div class="stat-counter group">
                    <div class="bg-white/10 backdrop-blur-md rounded-2xl p-8 hover:bg-white/20 transition-all duration-300">
                        <div class="text-4xl lg:text-5xl font-bold mb-3 group-hover:scale-110 transition-transform" id="counter-4">0</div>
                        <div class="text-white/80 text-lg">Rating Kepuasan</div>
                        <div class="progress-bar h-2 mt-4">
                            <div class="progress-fill" data-width="96%"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <div class="section-divider mx-auto max-w-4xl"></div>

    <section id="features" class="py-24 px-4 bg-gradient-to-b from-gray-50 to-white">
        <div class="max-w-7xl mx-auto">
            <div class="text-center mb-16 space-y-6">
                <div class="inline-flex items-center px-4 py-2 bg-white rounded-full text-sm font-medium text-[#007696] shadow-sm">
                    <i class="fas fa-star mr-2"></i>
                    Fitur Unggulan
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold gradient-text">
                    Fitur Fitur Cards School
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Lengkapi pengalaman digital sekolah Anda dengan fitur-fitur canggih yang dirancang khusus untuk efisiensi dan kemudahan.
                </p>
            </div>
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($features as $feature)
                @if($feature->status == 'active')
                <article class="feature-card rounded-2xl p-8 text-center hover-lift shadow-lg hover:shadow-xl transition-all duration-300 reveal">
                    <div class="w-16 h-16 bg-gradient-to-r from-[#007696] to-[#f7931e] rounded-2xl flex items-center justify-center mx-auto mb-6">
                        <img src="{{ asset('storage/' . ($feature->gambar ?? 'img/icons8-feature.png')) }}" alt="Ikon {{ $feature->nama }}" class="w-8 h-8">
                    </div>
                    <h3 class="text-xl font-bold text-gray-800 mb-4">{{ $feature->nama }}</h3>
                    <p class="text-gray-600 leading-relaxed">{{ $feature->deskripsi }}</p>
                </article>
                @endif
                @endforeach
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
                                <img src="{{ asset('storage/' . ($heroData->cover_image ?? '../img/download.png')) }}" alt="Gambar Siswa" class="w-full aspect-square object-cover rounded-[2rem]"/>
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
                            Download Aplikasi
                            <br class="hidden lg:block">Cards School
                        </h2>
                        
                        <p class="text-xl text-gray-600 leading-relaxed max-w-2xl">
                            Mulai perjalanan digital sekolah Anda sekarang! Download aplikasi Cards School dan rasakan pengalaman manajemen sekolah yang tak terlupakan dengan interface yang modern dan user-friendly.
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

        function toggleMobileDropdown() {
            const dropdown = document.getElementById('mobile-product-dropdown');
            dropdown.classList.toggle('hidden');
        }

        // Mobile menu toggle
        function toggleMenu() {
            const menu = document.getElementById("mobile-menu");
            menu.classList.toggle("hidden");
        }

        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = ['product-dropdown', 'mobile-product-dropdown'];
            const buttons = ['product-dropdown-wrapper'];
            
            dropdowns.forEach(dropdownId => {
                const dropdown = document.getElementById(dropdownId);
                const buttonWrapper = document.getElementById('product-dropdown-wrapper');
                
                if (dropdown && buttonWrapper) {
                    const isClickInsideDropdown = dropdown.contains(event.target);
                    const isClickOnButton = buttonWrapper.contains(event.target);
                    
                    if (!isClickInsideDropdown && !isClickOnButton) {
                        dropdown.classList.add('hidden');
                    }
                }
            });
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

        // Counter Animation
        function animateCounter(elementId, targetValue, duration = 2000) {
            const element = document.getElementById(elementId);
            const startValue = 0;
            const increment = targetValue / (duration / 16);
            let currentValue = startValue;

            const updateCounter = () => {
                if (currentValue < targetValue) {
                    currentValue += increment;
                    element.textContent = Math.floor(currentValue);
                    requestAnimationFrame(updateCounter);
                } else {
                    element.textContent = targetValue;
                }
            };
            updateCounter();
        }

        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('active');
                }
            });
        }, observerOptions);

        // Observe elements for animation
        document.querySelectorAll('.feature-card, .stat-counter, .testimonial-card').forEach(card => {
            observer.observe(card);
        });

        // Initialize advanced features
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading animation class
            document.body.classList.add('loaded');
            
            // Add reveal class to elements that should animate on scroll
            document.querySelectorAll('.feature-card, .testimonial-card').forEach(el => {
                el.classList.add('reveal');
            });
            
            // Trigger stats counter animation when section is in view
            const statsSection = document.querySelector('.stat-counter');
            if (statsSection) {
                const statsObserver = new IntersectionObserver((entries) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            animateCounter('counter-1', 500);
                            animateCounter('counter-2', 50000);
                            animateCounter('counter-3', 2500);
                            animateCounter('counter-4', 4.8);
                            document.querySelectorAll('.progress-fill').forEach(bar => {
                                bar.style.width = bar.getAttribute('data-width');
                            });
                            statsObserver.unobserve(entry.target); // Stop observing after animation
                        }
                    });
                }, { threshold: 0.5 });
                statsObserver.observe(statsSection);
            }
        });
    </script>
</body>
</html>