<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>CARDS - Digital School Solutions</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Moved Swiper JS to the head to ensure it loads before the initialization script that uses it -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <style>
        /* Use a modern, readable font */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        
        * {
            font-family: 'Inter', sans-serif;
        }

        body {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }
        
        /* Smooth scrolling for anchor links */
        html {
            scroll-behavior: smooth;
        }

        /* Glassmorphism effect for the navbar */
        .glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }
        
        /* Style for navbar when user scrolls down */
        .navbar-scroll {
            background: rgba(255, 255, 255, 0.98);
            backdrop-filter: blur(20px);
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            box-shadow: 0 4px 12px rgba(0,0,0,0.05);
        }

        /* Enhanced Marquee Animation for partner logos */
        .marquee-container {
            overflow: hidden;
        }

        .marquee-content {
            display: flex;
            animation: marquee 40s linear infinite;
            width: max-content;
        }

        .marquee-content:hover {
            animation-play-state: paused;
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Smooth Accordion transition for FAQ section */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.4s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .accordion-content.open {
            max-height: 300px; /* Adjust if content is taller */
        }

        /* Custom gradient backgrounds */
        .gradient-bg {
            background: linear-gradient(135deg, #0891b2 0%, #164e63 100%);
        }

        .gradient-card {
            background: linear-gradient(145deg, #ffffff 0%, #f8fafc 100%);
        }

        /* Enhanced hover effects for cards */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.15);
        }

        /* Custom swiper navigation arrows */
        .swiper-button-next,
        .swiper-button-prev {
            color: #0891b2 !important;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            width: 44px !important;
            height: 44px !important;
            margin-top: -22px !important;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            transition: all 0.3s ease;
        }

        .swiper-button-next:hover,
        .swiper-button-prev:hover {
            background: white;
            transform: scale(1.1);
        }

        /* Fade-in animation for sections on scroll */
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.6s ease-out;
        }
    </style>
</head>
<body class="bg-white overflow-x-hidden">

    <!-- Navigation -->
    <nav id="navbar" class="fixed top-4 left-4 right-4 z-50 glass rounded-2xl px-6 py-3 transition-all duration-300">
        <div class="flex items-center justify-between max-w-7xl mx-auto">
            <!-- Logo -->
            <div class="flex items-center space-x-3">
                <img src="{{ asset('storage/assets/logo cards.png') }}" alt="Logo" class="h-8 w-auto">
                <span class="text-xl font-bold text-gray-800"></span>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex space-x-8 items-center">
                <a href="{{ route('homepage') }}" class="text-gray-700 hover:text-cyan-600 transition-colors font-medium">Home</a>
                <a href="{{ route('flexy') }}" class="text-gray-700 hover:text-cyan-600 transition-colors font-medium">Flexy</a>
                
                <!-- Products Dropdown -->
                <div class="relative group">
                    <button class="flex items-center text-gray-700 hover:text-cyan-600 transition-colors font-medium">
                        Products
                        <i class="fas fa-chevron-down ml-1 text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                    </button>
                    <div class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-48 glass rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
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
                <a href="{{ route('edu') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors pl-4">- Edu</a>
                <a href="{{ route('parents') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors pl-4">- Parents</a>
                <a href="{{ route('school') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors pl-4">- School</a>
                <a href="{{ route('canteen') }}" class="block text-gray-700 hover:text-cyan-600 transition-colors pl-4">- Canteen</a>
                <a href="#about" class="block text-gray-700 hover:text-cyan-600 transition-colors">About</a>
                <a href="#contact" class="block text-gray-700 hover:text-cyan-600 transition-colors">Contact</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="home" class="pt-32 pb-20 px-4 min-h-screen flex items-center relative overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-cyan-50 via-blue-50 to-indigo-100 opacity-50 z-0"></div>
        <div class="container mx-auto max-w-7xl relative z-10">
            <div class="grid md:grid-cols-2 gap-12 items-center">
                <!-- Text Content -->
                <div class="animate-fade-in-up">
                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-6 leading-tight" style="font-size: {{ $heroData->title_font_size ?? '3rem' }}">
                        {!! nl2br(e($heroData->title)) !!}
                    </h1>
                    <p class="text-lg text-gray-600 mb-8 leading-relaxed max-w-lg" style="font-size: {{ $heroData->subtitle_font_size ?? '1.125rem' }}">
                        {{ $heroData->subtitle }}
                    </p>
                    <div class="flex flex-wrap gap-4">
                        <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white px-8 py-3 rounded-full font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                            Selengkapnya
                        </a>
                        <a href="#" class="bg-cyan-900 hover:bg-cyan-800 text-white px-8 py-3 rounded-full font-semibold hover:shadow-xl transition-all duration-300 transform hover:-translate-y-1 flex items-center">
                            <i class="far fa-calendar-alt mr-2"></i>
                            Jadwalkan Demo
                        </a>
                    </div>
                </div>

                <!-- Hero Image -->
                <div class="relative animate-fade-in-up" style="animation-delay: 0.2s;">
                    <div class="relative bg-gradient-to-br from-cyan-600 to-blue-700 rounded-3xl p-4 transform rotate-3 hover:rotate-1 transition-all duration-500 shadow-2xl">
                        <img src="{{ $heroData->cover_image ? asset('storage/' . $heroData->cover_image) : 'https://placehold.co/600x400/007696/FFFFFF?text=Hero+Image' }}" 
                             alt="Hero Image" 
                             class="w-full h-auto object-cover rounded-2xl">
                        <div class="absolute inset-0 border-4 border-yellow-300 rounded-3xl pointer-events-none opacity-70"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Stats Section -->
    <section class="px-4 -mt-20 md:-mt-16 relative z-20">
        <div class="container mx-auto max-w-6xl">
            <div class="glass rounded-2xl p-8 shadow-xl hover-lift">
                <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center items-center">
                    <div class="col-span-2 md:col-span-1 text-lg md:text-xl font-medium text-cyan-900 md:border-r md:border-gray-200">
                        Sejak 2019 Melayani
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-4xl font-bold text-cyan-600 mb-1">359+</div>
                        <div class="text-gray-600">Lembaga</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-4xl font-bold text-cyan-600 mb-1">109+</div>
                        <div class="text-gray-600">Kab/Kota</div>
                    </div>
                    <div class="flex flex-col items-center">
                        <div class="text-4xl font-bold text-cyan-600 mb-1">24+</div>
                        <div class="text-gray-600">Provinsi</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 px-4">
        <div class="container mx-auto max-w-7xl">
            <div class="text-center mb-16">
                <div class="inline-block px-4 py-2 bg-orange-100 text-orange-600 rounded-full text-sm font-semibold mb-4">
                    — Kenalan dengan CARDS —
                </div>
                <h2 class="text-4xl md:text-5xl font-bold text-gray-900">
                    Satu <span class="text-cyan-600">Platform</span> untuk Semua Kebutuhan <span class="text-cyan-600">Sekolah</span>
                </h2>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                <!-- Feature 1 -->
                <div class="gradient-card p-8 rounded-2xl shadow-lg hover-lift border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-blue-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-file-invoice text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Pelayanan Administrasi Digital</h3>
                    <p class="text-gray-600 leading-relaxed">Automasi proses administrasi sekolah, dari pendaftaran hingga laporan keuangan.</p>
                </div>

                <!-- Feature 2 -->
                <div class="gradient-card p-8 rounded-2xl shadow-lg hover-lift border border-gray-100 mt-0 md:mt-12">
                    <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-indigo-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-qrcode text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Pilihan Transaksi Beragam</h3>
                    <p class="text-gray-600 leading-relaxed">Tersedia berbagai metode pembayaran digital yang mudah dan aman untuk semua transaksi.</p>
                </div>

                <!-- Feature 3 -->
                <div class="gradient-card p-8 rounded-2xl shadow-lg hover-lift border border-gray-100">
                    <div class="w-16 h-16 bg-gradient-to-br from-teal-500 to-green-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Akses Informasi Akademik</h3>
                    <p class="text-gray-600 leading-relaxed">Pantau kemajuan akademik siswa secara real-time dan terorganisir.</p>
                </div>

                <!-- Feature 4 -->
                <div class="gradient-card p-8 rounded-2xl shadow-lg hover-lift border border-gray-100 mt-0 md:mt-12">
                    <div class="w-16 h-16 bg-gradient-to-br from-yellow-500 to-orange-500 rounded-2xl flex items-center justify-center mb-6 shadow-lg">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Keamanan Data Terjamin</h3>
                    <p class="text-gray-600 leading-relaxed">Sistem keamanan canggih untuk melindungi semua data sekolah, guru, dan siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Trusted Partners -->
    <section class="gradient-bg py-16">
        <div class="container mx-auto max-w-7xl px-4 text-center">
            <h2 class="text-white text-2xl md:text-3xl font-bold mb-4">
                Dipercaya <span class="text-orange-400">300+</span> Lembaga pendidikan
            </h2>
            <p class="text-cyan-100 text-lg mb-12">
                dan <span class="text-orange-400 font-bold">130,000+</span> Siswa di seluruh Indonesia
            </p>

            <div class="marquee-container">
                <div class="marquee-content">
                    <!-- Logos will be duplicated for seamless animation -->
                    @forelse($mitras as $mitra)
                        <div class="bg-white rounded-xl p-3 w-32 h-24 flex items-center justify-center shadow-md mx-4 flex-shrink-0 hover-lift">
                            <img src="{{ $mitra->logo ? asset('storage/' . $mitra->logo) : 'https://placehold.co/100x80/e2e8f0/94a3b8?text=Mitra' }}" 
                                 alt="{{ $mitra->nama }}" class="max-w-full max-h-full object-contain" />
                        </div>
                    @empty
                        <div class="bg-white rounded-xl p-3 w-32 h-24 flex items-center justify-center shadow-md mx-4 flex-shrink-0">
                            <p class="text-gray-500 text-sm">Mitra Logo</p>
                        </div>
                    @endforelse
                    
                    <!-- Duplicate set for smooth loop -->
                     @forelse($mitras as $mitra)
                        <div class="bg-white rounded-xl p-3 w-32 h-24 flex items-center justify-center shadow-md mx-4 flex-shrink-0 hover-lift">
                            <img src="{{ $mitra->logo ? asset('storage/' . $mitra->logo) : 'https://placehold.co/100x80/e2e8f0/94a3b8?text=Mitra' }}" 
                                 alt="{{ $mitra->nama }}" class="max-w-full max-h-full object-contain" />
                        </div>
                    @empty
                        <div class="bg-white rounded-xl p-3 w-32 h-24 flex items-center justify-center shadow-md mx-4 flex-shrink-0">
                            <p class="text-gray-500 text-sm">Mitra Logo</p>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Products Section -->
    <section id="products" class="py-20 px-4 bg-gray-50">
        <div class="container mx-auto max-w-7xl">
            <div class="text-center mb-16">
                <h2 class="text-4xl font-bold text-cyan-600 mb-4">Solusi Digital Unggulan dari CARDS</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Temukan rangkaian produk teknologi pendidikan kami yang komprehensif</p>
            </div>

            <div class="swiper productSwiper">
                <div class="swiper-wrapper">
                    @forelse($products as $product)
                    <div class="swiper-slide p-2">
                        <div class="relative bg-[#007F9E] rounded-2xl shadow-xl text-white overflow-hidden group hover-lift h-64">
                            <div class="flex items-center justify-center w-full h-full p-4">
                                <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : 'https://placehold.co/360x240/007F9E/FFFFFF?text=Product+Image' }}" alt="{{ $product->nama }}" class="object-contain max-h-full" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition duration-500 flex items-center justify-center">
                                <div class="text-center opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500 p-4">
                                    <h3 class="text-xl font-semibold mb-3">{{ $product->nama }}</h3>
                                    <a href="{{ $product->link ?? '#' }}" class="bg-orange-500 hover:bg-orange-600 text-white text-sm py-2 px-4 rounded-full transition">Selengkapnya ›</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- Default Slides if no products -->
                    <div class="swiper-slide p-2"><div class="bg-gray-200 rounded-2xl h-64 flex items-center justify-center"><p>Product 1</p></div></div>
                    <div class="swiper-slide p-2"><div class="bg-gray-200 rounded-2xl h-64 flex items-center justify-center"><p>Product 2</p></div></div>
                    <div class="swiper-slide p-2"><div class="bg-gray-200 rounded-2xl h-64 flex items-center justify-center"><p>Product 3</p></div></div>
                    @endforelse
                </div>
                <div class="swiper-pagination mt-8"></div>
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="gradient-bg py-20">
        <div class="container mx-auto max-w-5xl px-4">
            <div class="text-center mb-16">
                <div class="inline-flex items-center px-4 py-2 bg-white bg-opacity-20 text-white rounded-full text-sm font-medium mb-6">
                    — Pengalaman Mereka Bersama CARDS —
                </div>
                <h2 class="text-3xl md:text-4xl font-bold text-white">
                    Dipercaya Sejak 2019 oleh Sekolah di Seluruh Indonesia
                </h2>
            </div>

            <div class="swiper testimonialsSwiper">
                <div class="swiper-wrapper">
                    @forelse($testimonies as $testimoni)
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl p-8 md:p-10 shadow-xl">
                            <div class="flex flex-col md:flex-row items-center text-center md:text-left gap-8">
                                <div class="flex-shrink-0">
                                    <img src="{{ $testimoni->foto ? asset('storage/' . $testimoni->foto) : 'https://placehold.co/128x128/D1D5DB/1F2937?text=Profile' }}" 
                                         alt="{{ $testimoni->nama }}" 
                                         class="w-24 h-24 rounded-full object-cover shadow-md">
                                </div>
                                <div>
                                    <div class="mb-4">
                                        <span class="bg-cyan-100 text-cyan-800 px-3 py-1 rounded-full text-xs font-medium">Pengguna Cards Edu</span>
                                    </div>
                                    <blockquote class="text-gray-700 text-lg mb-6 italic leading-relaxed relative px-5">
                                        <i class="fas fa-quote-left text-cyan-200 text-2xl absolute -top-2 left-0"></i>
                                        {{ $testimoni->komentar }}
                                    </blockquote>
                                    <div>
                                        <div class="font-bold text-cyan-700">{{ $testimoni->nama }}</div>
                                        <div class="text-gray-500 text-sm">{{ $testimoni->profesi }}</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <!-- Default Testimonial -->
                    <div class="swiper-slide">
                        <div class="bg-white rounded-2xl p-8 md:p-10 shadow-xl"><p class="text-center">No testimonials available yet.</p></div>
                    </div>
                    @endforelse
                </div>
                
                <!-- Navigation -->
                <div class="swiper-button-prev"></div>
                <div class="swiper-button-next"></div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section id="about" class="py-20 px-4 bg-white">
        <div class="container mx-auto max-w-7xl">
            <div class="grid md:grid-cols-2 gap-16 items-start">
                <!-- Left Content -->
                <div>
                    <h2 class="text-4xl md:text-5xl font-bold text-gray-900 mb-6">
                        Frequently Asked <span class="text-cyan-600">Questions</span>
                    </h2>
                    <p class="text-lg text-gray-600 leading-relaxed">
                        Kami paham, sebelum sekolah Anda beralih ke sistem digital, pasti banyak hal yang ingin ditanyakan. Kalau ada yang belum terjawab, jangan ragu hubungi tim support kami.
                    </p>
                </div>

                <!-- FAQ Items -->
                <div class="space-y-4">
                    <!-- FAQ 1 -->
                    <div class="gradient-card rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                        <button class="w-full p-6 text-left flex justify-between items-center" onclick="toggleAccordion('faq1')">
                            <h3 class="font-bold text-gray-900 text-lg pr-4">Kalau sekolah saya masih pakai sistem manual, bisa pindah ke CARDS langsung gak?</h3>
                            <i id="faq1-icon" class="fas fa-plus text-cyan-600 transition-transform duration-300"></i>
                        </button>
                        <div id="faq1" class="accordion-content">
                            <div class="px-6 pb-6 border-t border-gray-100 pt-4">
                                <p class="text-gray-600 leading-relaxed">Bisa banget! Tim kami bantu proses transisi step by step, termasuk migrasi data & pelatihan admin.</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 2 -->
                    <div class="gradient-card rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                        <button class="w-full p-6 text-left flex justify-between items-center" onclick="toggleAccordion('faq2')">
                            <h3 class="font-bold text-gray-900 text-lg pr-4">Guru atau staf gaptek bisa pakai juga?</h3>
                            <i id="faq2-icon" class="fas fa-plus text-cyan-600 transition-transform duration-300"></i>
                        </button>
                        <div id="faq2" class="accordion-content">
                            <div class="px-6 pb-6 border-t border-gray-100 pt-4">
                                <p class="text-gray-600 leading-relaxed">Bisa dong. CARDS user-friendly, tampilannya simpel, mudah dipahami bahkan buat pemula.</p>
                            </div>
                        </div>
                    </div>

                    <!-- FAQ 3 -->
                    <div class="gradient-card rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                        <button class="w-full p-6 text-left flex justify-between items-center" onclick="toggleAccordion('faq3')">
                            <h3 class="font-bold text-gray-900 text-lg pr-4">Nanti kalau ada kendala teknis, siapa yang bantu?</h3>
                            <i id="faq3-icon" class="fas fa-plus text-cyan-600 transition-transform duration-300"></i>
                        </button>
                        <div id="faq3" class="accordion-content">
                            <div class="px-6 pb-6 border-t border-gray-100 pt-4">
                                <p class="text-gray-600 leading-relaxed">Tenang, tim support kami selalu siap bantu, baik via chat, telpon, atau remote langsung.</p>
                            </div>
                        </div>
                    </div>

                      <!-- FAQ 4 -->
                    <div class="gradient-card rounded-xl shadow-lg overflow-hidden transition-all duration-300 hover:shadow-xl">
                        <button class="w-full p-6 text-left flex justify-between items-center" onclick="toggleAccordion('faq4')">
                            <h3 class="font-bold text-gray-900 text-lg pr-4">Sekolah saya udah pakai sistem lain, bisa pindah ke CARDS?</h3>
                            <i id="faq2-icon" class="fas fa-plus text-cyan-600 transition-transform duration-300"></i>
                        </button>
                        <div id="faq4" class="accordion-content">
                            <div class="px-6 pb-6 border-t border-gray-100 pt-4">
                                <p class="text-gray-600 leading-relaxed">Bisa. Kami bantu proses migrasinya, termasuk penyesuaian data yang udah ada sebelumnya. Jadi sekolah gak harus mulai dari nol.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-900 text-white">
        <div class="container mx-auto max-w-7xl px-4 py-16">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-8 mb-12">
                <!-- Company Info -->
                <div class="col-span-2 md:col-span-1">
                    <div class="flex items-center space-x-3 mb-6">
                        <img src="{{ asset('storage/assets/logo cards.png') }}" alt="Logo" class="h-8 w-auto filter brightness-0 invert">
                        <span class="text-2xl font-bold">CARDS</span>
                    </div>
                    <p class="text-gray-400 mb-6 leading-relaxed">Transforming education through innovative digital solutions.</p>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-cyan-600 transition-colors"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-cyan-600 transition-colors"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-cyan-600 transition-colors"><i class="fab fa-linkedin-in"></i></a>
                        <a href="#" class="w-10 h-10 bg-gray-800 rounded-full flex items-center justify-center hover:bg-cyan-600 transition-colors"><i class="fab fa-youtube"></i></a>
                    </div>
                </div>

                <!-- Homepage Links -->
                <div>
                    <h4 class="font-bold text-lg mb-6 text-orange-400">Homepage</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Advertisement</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Car</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Helpdesk</a></li>
                    </ul>
                </div>

                <!-- Contact Links -->
                <div>
                    <h4 class="font-bold text-lg mb-6 text-orange-400">Contact</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Booking</a></li>
                        <li><a href="#about" class="text-gray-400 hover:text-white transition-colors">FAQ</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Legal Links -->
                <div>
                    <h4 class="font-bold text-lg mb-6 text-orange-400">Legal</h4>
                    <ul class="space-y-3">
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Terms of Service</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">Privacy Policy</a></li>
                        <li><a href="#" class="text-gray-400 hover:text-white transition-colors">About Us</a></li>
                    </ul>
                </div>
            </div>

            <!-- Bottom Bar -->
            <div class="border-t border-gray-800 pt-8 text-center md:text-left">
                <p class="text-gray-400 text-sm">© {{ date('Y') }} CAZH. All rights reserved.</p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Initialize Swiper for Products
            const productSwiper = new Swiper('.productSwiper', {
                loop: true,
                spaceBetween: 20,
                autoplay: {
                    delay: 4000,
                    disableOnInteraction: false,
                },
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: { slidesPerView: 1 },
                    768: { slidesPerView: 2 },
                    1024: { slidesPerView: 3 },
                }
            });

            // Initialize Swiper for Testimonials
            const testimonialsSwiper = new Swiper('.testimonialsSwiper', {
                loop: true,
                spaceBetween: 30,
                centeredSlides: true,
                autoplay: {
                    delay: 6000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next',
                    prevEl: '.swiper-button-prev',
                },
                slidesPerView: 1,
            });

            // Navbar scroll effect
            window.addEventListener('scroll', () => {
                const navbar = document.getElementById('navbar');
                if (window.scrollY > 50) {
                    navbar.classList.add('navbar-scroll');
                } else {
                    navbar.classList.remove('navbar-scroll');
                }
            });

            // Add loading animations on scroll
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in-up');
                    }
                });
            }, { threshold: 0.1 });

            document.querySelectorAll('section').forEach(section => {
                observer.observe(section);
            });
        });

        // Mobile menu toggle
        function toggleMobileMenu() {
            const menu = document.getElementById('mobile-menu');
            const line1 = document.getElementById('line1');
            const line2 = document.getElementById('line2');
            const line3 = document.getElementById('line3');
            
            menu.classList.toggle('hidden');
            
            if (menu.classList.contains('hidden')) {
                line1.style.transform = 'rotate(0) translate(0, 0)';
                line2.style.opacity = '1';
                line3.style.transform = 'rotate(0) translate(0, 0)';
            } else {
                line1.style.transform = 'rotate(45deg) translate(4px, 4px)';
                line2.style.opacity = '0';
                line3.style.transform = 'rotate(-45deg) translate(4px, -4px)';
            }
        }

        // Enhanced accordion functionality
        function toggleAccordion(id) {
            const content = document.getElementById(id);
            const icon = document.getElementById(id + '-icon');
            
            // Close all other accordions
            document.querySelectorAll('.accordion-content').forEach(item => {
                if (item.id !== id && item.classList.contains('open')) {
                    item.classList.remove('open');
                    const otherIcon = document.getElementById(item.id + '-icon');
                    otherIcon.classList.remove('fa-minus', 'rotate-180');
                    otherIcon.classList.add('fa-plus');
                }
            });
            
            // Toggle current accordion
            content.classList.toggle('open');
            if (content.classList.contains('open')) {
                icon.classList.remove('fa-plus');
                icon.classList.add('fa-minus', 'rotate-180');
            } else {
                icon.classList.remove('fa-minus', 'rotate-180');
                icon.classList.add('fa-plus');
            }
        }
    </script>
</body>
</html>
