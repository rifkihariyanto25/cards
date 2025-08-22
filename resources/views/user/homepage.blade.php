<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Homepage</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <!-- Font Awesome for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        /* Modern font for better readability */
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap');
        body {
            font-family: 'Inter', sans-serif;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Pure CSS Marquee Animation */
        .marquee-container {
            overflow: hidden;
        }

        .marquee-content {
            display: flex;
            animation: marquee 30s linear infinite;
            width: max-content;
        }

        .marquee-content:hover {
            animation-play-state: paused;
        }

        .marquee-content div {
            flex-shrink: 0;
            margin: 0 1rem;
        }

        @keyframes marquee {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }

        /* Custom Accordion Styling for smooth transition */
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.5s ease-out;
        }
        .accordion-content.open {
            max-height: 200px; /* Adjust as needed for content height */
            transition: max-height 0.5s ease-in;
        }

        /* Swiper custom navigation arrows */
        .swiper-button-next-testimoni,
        .swiper-button-prev-testimoni {
            color: #008080 !important; /* Custom color for arrows */
        }
    </style>
</head>
<body class="relative bg-white overflow-x-hidden">

    <!-- WRAPPER UNTUK NAVBAR + HERO + STATS -->
    <section class="relative isolate overflow-hidden">
        <!-- Background Blur effect -->
        <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
            <div class="absolute w-full h-full bg-cyan-100 opacity-30 top-0 left-0"></div>
        </div>
        <!-- Hero + Stats Content -->
        <div class="relative z-10">

            <!-- Navigation -->
            <nav id="navbar" class="fixed top-4 left-4 right-4 z-[200] bg-white/95 backdrop-blur-md shadow-lg px-6 py-3 rounded-full transition-all duration-300">
                <!-- Isi navbar -->
                <div class="flex items-center justify-between">
                    <!-- Logo -->
                    <div class="flex items-center space-x-2">
                        <img src="{{ asset('logoCards.png') }}" alt="Logo" class="h-5 w-8">
                        <span class="text-xl font-semibold text-cyan-700"></span>
                    </div>

                    <!-- Hamburger Button (Mobile) -->
                    <button class="md:hidden focus:outline-none" onclick="toggleMenu()">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>

                    <!-- Desktop Menu -->
                    <div class="hidden md:flex space-x-8 items-center font-medium">
                        <a href="{{ route('homepage') }}" class="hover:text-cyan-700 transition-colors">Home</a>
                        <a href="{{ route('flexy') }}" class="hover:text-cyan-700 transition-colors">Flexy</a>

                        <!-- Wrapper Produk -->
                        <div class="relative" id="product-dropdown-wrapper">
                            <!-- Tombol Produk -->
                            <button onclick="toggleDropdown()" class="flex items-center hover:text-cyan-700 focus:outline-none transition-colors">
                                Products
                                <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                                </svg>
                            </button>

                            <!-- Dropdown Menu -->
                            <div id="product-dropdown" class="absolute hidden bg-white shadow-lg rounded mt-2 py-2 w-44 z-[110]">
                                <a href="{{ route('edu') }}" class="block px-4 py-2 hover:bg-gray-100 transition-colors">Edu</a>
                                <a href="{{ route('parents') }}" class="block px-4 py-2 hover:bg-gray-100 transition-colors">Parents</a>
                                <a href="{{ route('school') }}" class="block px-4 py-2 hover:bg-gray-100 transition-colors">School</a>
                                <a href="{{ route('canteen') }}" class="block px-4 py-2 hover:bg-gray-100 transition-colors">Canteen</a>
                            </div>
                        </div>
                        <a href="{{ route('homepage') }}#about" class="hover:text-cyan-700 transition-colors">About</a>
                        <a href="{{ route('homepage') }}#contact" class="hover:text-cyan-700 transition-colors">Contact</a>
                    </div>
                </div>
            </nav>

            <!-- MOBILE MENU -->
            <div id="mobile-menu" class="md:hidden hidden fixed top-20 left-0 right-0 bg-white/95 backdrop-blur-md shadow-lg mx-4 rounded-lg z-[90] py-3">
                <div class="flex flex-col space-y-4 px-6 font-medium">
                    <a href="{{ route('homepage') }}" class="text-cyan-700 hover:text-cyan-900 transition-colors">Home</a>
                    <a href="{{ route('flexy') }}" class="text-cyan-700 hover:text-cyan-900 transition-colors">Flexy</a>
                    <!-- Products dropdown -->
                    <div class="relative">
                        <button onclick="toggleMobileDropdown()" class="flex items-center text-cyan-700 hover:text-cyan-900 transition-colors">
                            Products
                            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
                            </svg>
                        </button>
                        <!-- DROPDOWN -->
                        <div id="mobile-product-dropdown" class="hidden mt-2 bg-white shadow rounded w-full text-left z-[100]">
                            <a href="{{ route('edu') }}" class="block px-4 py-2 hover:bg-gray-100 text-cyan-700 transition-colors">Edu</a>
                            <a href="{{ route('parents') }}" class="block px-4 py-2 hover:bg-gray-100 text-cyan-700 transition-colors">Parents</a>
                            <a href="{{ route('school') }}" class="block px-4 py-2 hover:bg-gray-100 text-cyan-700 transition-colors">School</a>
                            <a href="{{ route('canteen') }}" class="block px-4 py-2 hover:bg-gray-100 text-cyan-700 transition-colors">Canteen</a>
                        </div>
                    </div>
                    <a href="{{ route('homepage') }}#about" class="text-cyan-700 hover:text-cyan-900 transition-colors">About</a>
                    <a href="{{ route('homepage') }}#contact" class="text-cyan-700 hover:text-cyan-900 transition-colors">Contact</a>
                </div>
            </div>

            <!-- Hero Section -->
            <section class="relative py-12 px-4 md:px-20 mt-20">
                <div class="container mx-auto flex flex-col-reverse md:flex-row items-center justify-between gap-8 relative z-10">
                    <!-- Text content -->
                    <div class="md:w-1/2">
                        <div class="px-4 md:px-0">
                            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 leading-tight" style="font-size: {{ $heroData->title_font_size ?? '2.5rem' }}">
                                {!! nl2br(e($heroData->title)) !!}
                            </h1>
                            <p class="text-lg text-gray-700 mb-6 leading-relaxed" style="font-size: {{ $heroData->subtitle_font_size ?? '1rem' }}">
                                {{ $heroData->subtitle }}
                            </p>
                        </div>
                        <!-- CTA buttons -->
                        <div class="mt-8 flex flex-wrap gap-4 px-4 md:px-0">
                            <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-full transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                Selengkapnya
                            </a>
                            <a href="#" class="bg-cyan-900 hover:bg-cyan-800 text-white font-semibold px-6 py-3 rounded-full flex items-center gap-2 transition-all duration-300 shadow-md hover:shadow-lg transform hover:-translate-y-1">
                                <i class="far fa-calendar-alt"></i>
                                Jadwalkan Demo
                            </a>
                        </div>
                    </div>

                    <!-- Image -->
                    <div class="md:w-1/2 relative">
                        <div class="bg-cyan-900 rounded-3xl p-3 w-full max-w-lg mx-auto relative transform rotate-3 hover:rotate-0 transition-transform duration-500 shadow-2xl">
                            <img src="{{ $heroData->cover_image ? asset('storage/' . $heroData->cover_image) : 'https://placehold.co/600x400/007696/FFFFFF?text=Hero+Image' }}" alt="Hero Image" class="object-cover w-full h-auto rounded-3xl" />
                            <div class="absolute inset-0 border-4 border-yellow-300 rounded-3xl pointer-events-none"></div>
                        </div>
                    </div>
                </div>
            </section>

            <!-- Floating Stats Box -->
            <div class="relative -mt-10 p-4 z-20">
                <div class="container mx-auto px-4 sm:px-10">
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 bg-white shadow-xl rounded-2xl py-8 px-6 w-full max-w-screen-xl mx-auto text-gray-800 transition-all duration-300 hover:shadow-2xl hover:-translate-y-2">
                        <div class="col-span-1 md:col-span-1 flex items-center justify-center border-b md:border-b-0 md:border-r border-gray-200 pb-4 md:pb-0 md:pr-4">
                            <p class="text-lg md:text-xl font-medium text-cyan-900">Sejak 2019 Melayani</p>
                        </div>
                        <div class="flex flex-col items-center justify-center transform transition-transform duration-300 hover:scale-105">
                            <p class="text-3xl font-bold text-cyan-900">359+</p>
                            <p class="text-sm text-gray-600">Lembaga</p>
                        </div>
                        <div class="flex flex-col items-center justify-center transform transition-transform duration-300 hover:scale-105">
                            <p class="text-3xl font-bold text-cyan-900">109+</p>
                            <p class="text-sm text-gray-600">Kab/Kota</p>
                        </div>
                        <div class="flex flex-col items-center justify-center transform transition-transform duration-300 hover:scale-105">
                            <p class="text-3xl font-bold text-cyan-900">24+</p>
                            <p class="text-sm text-gray-600">Provinsi</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Kenalan dengan CARDS -->
    <section class="pt-28 pb-16 px-4 py-20 bg-white mb-20">
        <div class="text-center mb-16">
            <p class="text-orange-500 font-semibold text-lg">— Kenalan dengan CARDS —</p>
            <h2 class="text-3xl md:text-4xl mt-2 font-bold text-gray-900">
                Satu <span class="text-cyan-700">Platform</span> untuk Semua Kebutuhan <span class="text-cyan-700">Sekolah</span>
            </h2>
        </div>

        <div class="relative max-w-7xl mx-auto px-4">
            <!-- Items - Modern, staggered layout with gradients -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Item 1 -->
                <div class="relative bg-white p-6 rounded-2xl shadow-lg border border-gray-200 transform transition-transform duration-300 hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-cyan-500 to-blue-500 rounded-full w-16 h-16 flex items-center justify-center text-white text-3xl mb-4 shadow-md">
                        <i class="fas fa-file-invoice"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Pelayanan Administrasi Digital</h3>
                    <p class="text-gray-600 text-sm">Automasi proses administrasi sekolah, dari pendaftaran hingga laporan keuangan.</p>
                </div>

                <!-- Item 2 -->
                <div class="relative bg-white p-6 rounded-2xl shadow-lg border border-gray-200 mt-0 lg:mt-12 transform transition-transform duration-300 hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-purple-500 to-indigo-500 rounded-full w-16 h-16 flex items-center justify-center text-white text-3xl mb-4 shadow-md">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Pilihan Transaksi Beragam</h3>
                    <p class="text-gray-600 text-sm">Tersedia berbagai metode pembayaran digital yang mudah dan aman untuk semua transaksi.</p>
                </div>

                <!-- Item 3 -->
                <div class="relative bg-white p-6 rounded-2xl shadow-lg border border-gray-200 transform transition-transform duration-300 hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-teal-500 to-green-500 rounded-full w-16 h-16 flex items-center justify-center text-white text-3xl mb-4 shadow-md">
                        <i class="fas fa-chart-line"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Akses Informasi Akademik</h3>
                    <p class="text-gray-600 text-sm">Pantau kemajuan akademik siswa secara real-time dan terorganisir.</p>
                </div>

                <!-- Item 4 -->
                <div class="relative bg-white p-6 rounded-2xl shadow-lg border border-gray-200 mt-0 lg:mt-12 transform transition-transform duration-300 hover:-translate-y-2">
                    <div class="bg-gradient-to-br from-yellow-500 to-orange-500 rounded-full w-16 h-16 flex items-center justify-center text-white text-3xl mb-4 shadow-md">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="font-semibold text-lg mb-2">Keamanan Data Terjamin</h3>
                    <p class="text-gray-600 text-sm">Sistem keamanan canggih untuk melindungi semua data sekolah, guru, dan siswa.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Dipercaya -->
    <section class="bg-cyan-700 py-10">
        <div class="max-w-7xl mx-auto px-4 text-center">
            <!-- Judul -->
            <h2 class="text-white text-xl sm:text-2xl md:text-3xl font-medium mb-10 leading-relaxed">
                Dipercaya <span class="text-orange-400 font-bold">300+</span> Lembaga pendidikan dan 
                <span class="text-orange-400 font-bold">130,000+</span> Siswa
            </h2>

            <!-- Marquee Container -->
            <div class="marquee-container overflow-hidden">
                <div class="marquee-content inline-flex items-center">
                    <!-- Logo Items First Set -->
                    @forelse($mitras as $mitra)
                        <div class="bg-white rounded-xl p-3 w-28 h-28 flex items-center justify-center shadow-md shrink-0 transition-transform duration-300 hover:scale-110">
                            <img src="{{ $mitra->logo ? asset('storage/' . $mitra->logo) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoh2BJppxcWR0_uR_A40oHqbgK9bUxd1iI7Q&s' }}" 
                            alt="{{ $mitra->nama }}" class="max-w-full max-h-full object-contain" />
                        </div>
                    @empty
                        <div class="bg-white rounded-xl p-3 w-28 h-28 flex items-center justify-center shadow-md shrink-0">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoh2BJppxcWR0_uR_A40oHqbgK9bUxd1iI7Q&s" alt="Logo Default"
                            class="max-w-full max-h-full object-contain" />
                        </div>
                    @endforelse
                    
                    <!-- Duplicate logos for seamless animation -->
                    @forelse($mitras as $mitra)
                        <div class="bg-white rounded-xl p-3 w-28 h-28 flex items-center justify-center shadow-md shrink-0 transition-transform duration-300 hover:scale-110">
                            <img src="{{ $mitra->logo ? asset('storage/' . $mitra->logo) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoh2BJppxcWR0_uR_A40oHqbgK9bUxd1iI7Q&s' }}" 
                            alt="{{ $mitra->nama }}" class="max-w-full max-h-full object-contain" />
                        </div>
                    @empty
                        <div class="bg-white rounded-xl p-3 w-28 h-28 flex items-center justify-center shadow-md shrink-0">
                            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoh2BJppxcWR0_uR_A40oHqbgK9bUxd1iI7Q&s" alt="Logo Default"
                            class="max-w-full max-h-full object-contain" />
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </section>

    <!-- Carousel - Produk kami -->
    <section class="bg-white text-center py-20 relative">
        <h2 class="text-2xl md:text-3xl font-bold text-cyan-500 mb-8">Solusi Digital Unggulan dari CARDS</h2>
        <div class="relative max-w-6xl mx-auto px-4">
            <!-- Swiper -->
            <div class="swiper mySwiperProd">
                <div class="swiper-wrapper">
                    <!-- Slides -->
                    @forelse($products as $index => $product)
                    <div class="swiper-slide">
                        <div class="relative bg-[#007F9E] rounded-2xl shadow-xl text-white overflow-hidden group">
                            <div class="flex items-center justify-center w-full h-60 p-4">
                                <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : 'https://placehold.co/360x240/007F9E/FFFFFF?text=Product+Image' }}" alt="{{ $product->nama }}" class="object-contain max-h-full" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition duration-500 flex items-center justify-center">
                                <div class="text-center opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                    <h3 class="text-xl font-semibold mb-3">{{ $product->nama }}</h3>
                                    <a href="{{ $product->link ?? '#' }}" class="bg-orange-500 hover:bg-orange-600 text-white text-sm py-2 px-4 rounded-full transition">Selengkapnya ›</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="swiper-slide">
                        <div class="relative bg-[#007F9E] rounded-2xl shadow-xl text-white overflow-hidden group">
                            <div class="flex items-center justify-center w-full h-60 p-4">
                                <img src="https://placehold.co/360x240/007F9E/FFFFFF?text=Cards+Parent" alt="Cards Parent" class="object-contain max-h-full" />
                            </div>
                            <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition duration-500 flex items-center justify-center">
                                <div class="text-center opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
                                    <h3 class="text-xl font-semibold mb-3">Cards Parent</h3>
                                    <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white text-sm py-2 px-4 rounded-full transition">Selengkapnya ›</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Add Pagination -->
                <div class="swiper-pagination mt-6"></div>
            </div>
        </div>
    </section>

    <!-- Testimoni Pengalaman Bersama CARDS -->
    <section class="bg-cyan-800 text-white pt-20 py-20">
        <div class="max-w-5xl mx-auto px-4 text-center mb-10">
            <p class="text-white font-semibold text-lg mb-2">— Pengalaman Mereka Bersama CARDS —</p>
            <h2 class="text-base md:text-lg text-cyan-50 font-light">
                Dipercaya sejak 2019 oleh sekolah & pesantren di seluruh penjuru Indonesia.
            </h2>
        </div>

        <!-- Testimonial Swiper -->
        <div class="max-w-4xl mx-auto px-4 relative">
            <div class="swiper mySwiperTesti">
                <div class="swiper-wrapper">
                    @forelse($testimonies as $testimoni)
                    <!-- Slide -->
                    <div class="swiper-slide bg-white text-gray-800 rounded-xl p-6 md:p-10 flex flex-col md:flex-row items-center gap-6 shadow-lg">
                        <!-- Foto -->
                        <div class="flex-shrink-0">
                            <img src="{{ $testimoni->foto ? asset('storage/' . $testimoni->foto) : 'https://placehold.co/128x160/D1D5DB/1F2937?text=Profile' }}" alt="{{ $testimoni->nama }}" class="w-32 h-40 rounded-lg object-cover mx-auto" />
                        </div>
                        <!-- Konten -->
                        <div class="text-left">
                            <div class="flex justify-center md:justify-start mb-2">
                                <span class="bg-cyan-100 text-cyan-800 text-xs px-3 py-1 rounded-full">Pengguna Cards Edu</span>
                            </div>
                            <p class="text-sm md:text-base mb-4 leading-relaxed relative">
                                <i class="fas fa-quote-left text-cyan-600 text-2xl absolute -top-2 -left-4 opacity-50"></i>
                                {{ $testimoni->komentar }}
                                <i class="fas fa-quote-right text-cyan-600 text-2xl absolute bottom-0 right-0 opacity-50"></i>
                            </p>
                            <p class="text-cyan-700 font-semibold">{{ $testimoni->nama }}</p>
                            <p class="text-sm text-gray-500">{{ $testimoni->profesi }}</p>
                        </div>
                    </div>
                    @empty
                    <!-- Default Slide -->
                    <div class="swiper-slide bg-white text-gray-800 rounded-xl p-6 md:p-10 flex flex-col md:flex-row items-center gap-6 shadow-lg">
                        <!-- Foto -->
                        <div class="flex-shrink-0">
                            <img src="https://placehold.co/128x160/D1D5DB/1F2937?text=Profile" alt="Ibu Mega" class="w-32 h-40 rounded-lg object-cover mx-auto" />
                        </div>
                        <!-- Konten -->
                        <div class="text-left">
                            <div class="flex justify-center md:justify-start mb-2">
                                <span class="bg-cyan-100 text-cyan-800 text-xs px-3 py-1 rounded-full">Pengguna Cards Edu</span>
                            </div>
                            <p class="text-sm md:text-base mb-4 leading-relaxed relative">
                                <i class="fas fa-quote-left text-cyan-600 text-2xl absolute -top-2 -left-4 opacity-50"></i>
                                Aplikasi ini sangat terpercaya dan kompeten! Kami telah bekerja sama dengan berbagai pihak yang puas dengan layanan yang diberikan. Benar-benar solusi yang bisa diandalkan!
                                <i class="fas fa-quote-right text-cyan-600 text-2xl absolute bottom-0 right-0 opacity-50"></i>
                            </p>
                            <p class="text-cyan-700 font-semibold">Ibu Mega</p>
                            <p class="text-sm text-gray-500">Guru SMP 1 Bojong</p>
                        </div>
                    </div>
                    @endforelse
                </div>

                <!-- Navigasi Panah -->
                <div class="swiper-button-prev swiper-button-prev-testimoni custom-arrow-prev z-10"></div>
                <div class="swiper-button-next swiper-button-next-testimoni custom-arrow-next z-10"></div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section class="bg-white py-16 px-4">
        <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-10 items-start">
            <!-- Left Side -->
            <div>
                <h2 class="text-4xl font-extrabold text-black mb-4">FAQ</h2>
                <p class="text-gray-700 leading-relaxed text-sm md:text-base">
                    Kami paham, sebelum sekolah Anda beralih ke sistem digital, pasti banyak hal yang ingin ditanyakan. 
                    Karena itu, kami sudah merangkum pertanyaan yang paling sering muncul. Kalau ada yang belum terjawab, 
                    jangan ragu hubungi tim support kami.
                </p>
            </div>

            <!-- Right Side -->
            <div class="space-y-6">
                <!-- Item 1 -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-md cursor-pointer transition hover:shadow-lg" onclick="toggleAccordion('faq1', 'icon-faq1')">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-black text-lg">
                            Kalau sekolah saya masih pakai sistem manual, bisa pindah ke CARDS langsung gak?
                        </h3>
                        <i id="icon-faq1" class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </div>
                    <div id="faq1" class="accordion-content">
                        <p class="text-gray-700 text-sm md:text-base mt-4 pt-4 border-t border-gray-200">
                            Bisa banget! Tim kami bantu proses transisi step by step, termasuk migrasi data & pelatihan admin.
                        </p>
                    </div>
                </div>

                <!-- Item 2 -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-md cursor-pointer transition hover:shadow-lg" onclick="toggleAccordion('faq2', 'icon-faq2')">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-black text-lg">
                            Guru atau staf gaptek bisa pakai juga?
                        </h3>
                        <i id="icon-faq2" class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </div>
                    <div id="faq2" class="accordion-content">
                        <p class="text-gray-700 text-sm md:text-base mt-4 pt-4 border-t border-gray-200">
                            Bisa dong. CARDS user-friendly, tampilannya simpel, mudah dipahami bahkan buat pemula.
                        </p>
                    </div>
                </div>

                <!-- Item 3 -->
                <div class="bg-gray-50 rounded-lg p-6 shadow-md cursor-pointer transition hover:shadow-lg" onclick="toggleAccordion('faq3', 'icon-faq3')">
                    <div class="flex justify-between items-center">
                        <h3 class="font-bold text-black text-lg">
                            Nanti kalau ada kendala teknis, siapa yang bantu?
                        </h3>
                        <i id="icon-faq3" class="fas fa-chevron-down text-gray-500 transition-transform duration-300"></i>
                    </div>
                    <div id="faq3" class="accordion-content">
                        <p class="text-gray-700 text-sm md:text-base mt-4 pt-4 border-t border-gray-200">
                            Tenang, tim support kami selalu siap bantu, baik via chat, telpon, atau remote langsung.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Waves SVG -->
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007696" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,192C1120,213,1280,203,1360,197.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>

    <!-- FOOTER SECTION -->
    <footer class="bg-[#007696] text-white">
        <!-- Footer Main Content -->
        <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:justify-between gap-10">
                <!-- Logo -->
                <div class="md:w-1/4 flex justify-center md:justify-start mb-6 md:mb-0">
                    <img src="https://placehold.co/120x48/007696/FFFFFF?text=Cards+Logo" alt="Cards Edu Logo" class="h-12 w-auto">
                </div>
                <!-- Navigation Links -->
                <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-3 gap-8 text-sm md:w-3/4 text-center md:text-left">
                    <!-- Homepage Links -->
                    <div>
                        <h4 class="font-semibold mb-2 text-orange-400">Homepage</h4>
                        <ul class="space-y-1">
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">Advertisement</a></li>
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">Car</a></li>
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">Helpdesk</a></li>
                        </ul>
                    </div>
                    <!-- Contact Links -->
                    <div>
                        <h4 class="font-semibold mb-2 text-orange-400">Contact</h4>
                        <ul class="space-y-1">
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">Booking</a></li>
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">FAQ</a></li>
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">Contact Us</a></li>
                        </ul>
                    </div>
                    <!-- Footer Links -->
                    <div>
                        <h4 class="font-semibold mb-2 text-orange-400">Footer</h4>
                        <ul class="space-y-1">
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">Terms of Service</a></li>
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">Privacy Policy</a></li>
                            <li><a href="#" class="hover:underline hover:text-orange-200 transition-colors">About Us</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer Bottom Bar -->
        <div class="bg-[#0289a4] text-sm">
            <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col sm:flex-row items-center justify-between gap-4">
                <p class="text-center sm:text-left">© 2025 CAZH. All rights reserved.</p>
                <div class="flex gap-4 justify-center sm:justify-end text-white text-lg">
                    <a href="#" aria-label="Facebook" class="hover:text-gray-300 transition-colors"><i class="fab fa-facebook-f"></i></a>
                    <a href="#" aria-label="Instagram" class="hover:text-gray-300 transition-colors"><i class="fab fa-instagram"></i></a>
                    <a href="#" aria-label="Email" class="hover:text-gray-300 transition-colors"><i class="fas fa-envelope"></i></a>
                    <a href="#" aria-label="LinkedIn" class="hover:text-gray-300 transition-colors"><i class="fab fa-linkedin-in"></i></a>
                    <a href="#" aria-label="YouTube" class="hover:text-gray-300 transition-colors"><i class="fab fa-youtube"></i></a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script>
        // Swiper initialization for Testimonials
        document.addEventListener('DOMContentLoaded', () => {
            const testimoniSwiper = new Swiper('.mySwiperTesti', {
                loop: true,
                slidesPerView: 1,
                spaceBetween: 30,
                autoplay: {
                    delay: 5000,
                    disableOnInteraction: false,
                },
                navigation: {
                    nextEl: '.swiper-button-next-testimoni',
                    prevEl: '.swiper-button-prev-testimoni',
                },
                breakpoints: {
                    768: {
                        slidesPerView: 1.5,
                        centeredSlides: true,
                    },
                },
            });

            // Swiper initialization for Products
            const produkSwiper = new Swiper('.mySwiperProd', {
                loop: true,
                spaceBetween: 20,
                pagination: {
                    el: '.swiper-pagination',
                    clickable: true,
                },
                breakpoints: {
                    640: {
                        slidesPerView: 1,
                    },
                    768: {
                        slidesPerView: 2,
                    },
                    1024: {
                        slidesPerView: 3,
                    },
                }
            });
        });

        // Toggle dropdowns
        function toggleDropdown() {
            const dropdown = document.getElementById('product-dropdown');
            dropdown.classList.toggle('hidden');
        }

        function toggleMobileDropdown() {
            const dropdown = document.getElementById('mobile-product-dropdown');
            dropdown.classList.toggle('hidden');
        }

        // Toggle Hamburger menu
        function toggleMenu() {
            const menu = document.getElementById("mobile-menu");
            menu.classList.toggle("hidden");
        }

        // Accordion functionality with improved transitions
        function toggleAccordion(id, iconId) {
            const content = document.getElementById(id);
            const icon = document.getElementById(iconId);
            content.classList.toggle('open');
            icon.classList.toggle('rotate-180');
        }
    </script>
</body>
</html>
