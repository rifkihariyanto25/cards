<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Homepage</title>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />


</head>
<body class="relative bg-white overflow-x-hidden">

 <!-- WRAPPER UNTUK NAVBAR + HERO + STATS -->
<section class="relative isolate overflow-hidden">

  <!-- Background Blur terbatas -->
 <div class="absolute inset-0 z-0 pointer-events-none overflow-hidden">
    <div class="absolute w-[1000px] h-[1000px] bg-[url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRVrqaoPodHiB1EZtnHHHOKA-89ZoAUhrXRqg&s')] bg-cover bg-center opacity-40 blur-3xl"
         style="top: 0px; left: 50%; transform: translateX(-50%);">
    </div>
</div>
  <!-- Hero + Stats Content -->
  <div class="relative z-10">

<!-- Navigation -->
  <nav 
        id="navbar"
        class="fixed top-4 left-4 right-4 z-[200] bg-white/95 backdrop-blur-md shadow-lg px-6 py-3 rounded-full transition-all duration-300">
  <!-- Isi navbar -->
    <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
        <img src="../img/logo cards.png" alt="Logo" class="h-5 w-8">
        <span class="text-xl font-semibold text-cyan-700"></span>
        </div>

        <!-- Hamburger Button (Mobile) -->
        <button class="md:hidden focus:outline-none" onclick="toggleMenu()">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round"
            d="M4 6h16M4 12h16M4 18h16" />
        </svg>
        </button>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-8 items-center font-medium">
        <a href="index.html" class="hover:text-cyan-700 transition-colors">Home</a>
         <a href="flexy.html" class="hover:text-cyan-700 transition-colors">Flexy</a>
       
        <!-- Wrapper Produk -->
        <div class="relative" id="product-dropdown-wrapper">
        <!-- Tombol Produk -->
        <button onclick="toggleDropdown()" class="flex items-center hover:text-cyan-700 focus:outline-none transition-colors">
            Products
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2"
            viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
        </button>

        <!-- Dropdown Menu -->
        <div id="product-dropdown" class="absolute hidden bg-white shadow-lg rounded mt-2 py-2 w-44 z-[110]">
            <a href="Edu.html" class="block px-4 py-2 hover:bg-gray-100 transition-colors">Edu</a>
            <a href="parents.html" class="block px-4 py-2 hover:bg-gray-100 transition-colors">Parents</a>
            <a href="school.html" class="block px-4 py-2 hover:bg-gray-100 transition-colors">School</a>
            <a href="canteen.html" class="block px-4 py-2 hover:bg-gray-100 transition-colors">Canteen</a>
        </div>
        </div>
        <a href="about.html" class="hover:text-cyan-700 transition-colors">About</a>
        <a href="contact.html" class="hover:text-cyan-700 transition-colors">Contact</a>
        </div>
    </div>
    </nav>

 <!-- MOBILE MENU  -->
    <div id="mobile-menu" class="md:hidden hidden fixed top-20 left-0 right-0 bg-white/95 backdrop-blur-md shadow-lg mx-4 rounded-lg z-[90] py-3">
      <div class="flex flex-col space-y-4 px-6 font-medium">
        <a href="index.html" class="text-cyan-700 hover:text-cyan-900 transition-colors">Home</a>
         <a href="flexy.html" class="text-cyan-700 hover:text-cyan-900 transition-colors">Flexy</a>

        <!-- Products dropdown -->
        <div class="relative">
            <button onclick="toggleMobileDropdown()" class="flex items-center text-cyan-700 hover:text-cyan-900 transition-colors">
            Products
            <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7" />
            </svg>
            </button>

            <!-- DROPDOWN yang menutupi elemen lain -->
            <div id="mobile-product-dropdown" class="hidden mt-2 bg-white shadow rounded w-full text-left z-[100]">
            <a href="Edu.html" class="block px-4 py-2 hover:bg-gray-100 text-cyan-700 transition-colors">Edu</a>
            <a href="parents.html" class="block px-4 py-2 hover:bg-gray-100 text-cyan-700 transition-colors">Parents</a>
            <a href="school.html" class="block px-4 py-2 hover:bg-gray-100 text-cyan-700 transition-colors">School</a>
            <a href="canteen.html" class="block px-4 py-2 hover:bg-gray-100 text-cyan-700 transition-colors">Canteen</a>
            </div>
        </div>
        <a href="about.html" class="text-cyan-700 hover:text-cyan-900 transition-colors">About</a>
        <a href="contact.html" class="text-cyan-700 hover:text-cyan-900 transition-colors">Contact</a>
      </div>
    </div>

<!-- Hero Section -->
    <section class="relative py-12 px-4 md:px-20 mt-20">
    <div class="flex flex-col-reverse md:flex-row items-center justify-between gap-8 relative z-10">
        <!-- Text content -->
        <div class="md:w-1/2">
        <div class="px-4 md:px-0">
            <h1 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4 leading-snug mt-8" style="font-size: {{ $heroData->title_font_size ?? '2rem' }}">
  {!! nl2br(e($heroData->title)) !!}
</h1>
            <p class="text-gray-700 mb-6 leading-relaxed" style="font-size: {{ $heroData->subtitle_font_size ?? '1rem' }}">
  {{ $heroData->subtitle }}
</p>
        </div>

        <!-- CTA buttons -->
        <div class="mt-20 overflow-x-auto whitespace-nowrap pb-2">
            <div class="inline-flex gap-4 items-center px-2">
            <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-full transition shrink-0">
                Selengkapnya
            </a>
            <a href="#" class="bg-cyan-900 hover:bg-cyan-800 text-white font-semibold px-6 py-3 rounded-full flex items-center gap-2 transition shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round"
                    d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                Jadwalkan Demo
            </a>
            </div>
        </div>
        </div>

        <!-- Image -->
        <div class="md:w-1/2 relative">
        <div class="bg-cyan-900 rounded-t-[40px] rounded-b-none p-2 w-full max-w-sm mx-auto relative">
           <img src="{{ $heroData->cover_image ? asset('storage/' . $heroData->cover_image) : asset('img/gambar1.png') }}" alt="Hero Image" class="object-cover w-full h-auto rounded-t-[40px] rounded-b-none" />
            <div class="absolute top-0 left-0 right-0 bottom-0 border-4 border-yellow-300 rounded-t-[40px] rounded-b-none pointer-events-none"></div>
        </div>
        </div>

        <!-- Floating decorative shapes -->
        <div class="absolute top-1/2 right-10 w-6 h-6 border-2 border-yellow-400 rotate-45 rounded-sm"></div>
        <div class="absolute -top-5 right-8 w-7 h-7 border-2 border-yellow-400 rotate-45 rounded-sm"></div>
    </div>
    </section>

<!-- Floating Stats Box -->
    <div class="relative -mt-5 p-2 z-20"> 
    <div class="container mx-auto px-10">
        <div class="bg-white shadow-lg rounded-xl py-8 px-6 w-full max-w-screen-lg mx-auto text-gray-800 transition-all duration-300 hover:shadow-xl hover:-translate-y-2">
        <div class="flex flex-col md:flex-row justify-around text-center">
            <div class="mb-4 md:mb-0 flex items-center justify-center">
            <p class="text-xl">Sejak 2019 Melayani</p>
            </div>
            <div class="flex justify-around gap-6">
            <div>
                <p class="text-2xl font-bold text-cyan-900">359</p>
                <p class="text-sm">Lembaga</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-cyan-900">109</p>
                <p class="text-sm">Kab/Kota</p>
            </div>
            <div>
                <p class="text-2xl font-bold text-cyan-900">24</p>
                <p class="text-sm">Provinsi</p>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>

<!-- Bergelombang -->
    <section class=" pt-28 pb-16 px-4 py-20 bg-white mb-20">
    <div class="text-center mb-16">
        <p class="text-cyan-700 font-semibold text-lg">— Kenalan dengan CARDS —</p>
        <h2 class="text-3xl md:text-3xl mb-12 font-bold">
        Satu <span class="text-cyan-700">Platform</span> untuk Semua Kebutuhan <span class="text-cyan-700">Sekolah</span>
        </h2>
    </div>

    <div class="relative max-w-7xl mx-auto px-4">
        <!-- SVG Garis Bergelombang -->
        <svg viewBox="0 0 1200 100" class="hidden md:block w-full h-32 text-gray-200 absolute top-1 left-0 z-0">
        <path fill="none" stroke="currentColor" stroke-width="3"
            d="M 0 80 Q 300 0 600 80 T 1200 80" />
        </svg>

        <!-- Items -->
        <div class="relative z-10 grid grid-cols-2 sm:grid-cols-2 md:grid-cols-4 gap-y-16 md:gap-y-0 justify-items-center mt-28">
        
        <!-- Item 1 - Bawah -->
        <div class="flex flex-col items-center text-center w-4/5 md:w-full md:translate-y-[36px]">
            <div class="bg-white shadow-lg rounded-full p-4 mb-3">
            <img src="https://img.icons8.com/ios-filled/50/228be6/monitor.png" alt="Admin" class="w-8 h-8" />
            </div>
            <p class="font-semibold leading-tight">Pelayanan Administrasi<br>Secara Digital</p>
        </div>

        <!-- Item 2 - Atas -->
        <div class="flex flex-col items-center text-center w-4/5 md:w-full md:-translate-y-[20px]">
            <div class="bg-white shadow-lg rounded-full p-4 mb-3">
            <img src="https://img.icons8.com/ios-filled/50/228be6/qr-code.png" alt="Transaksi" class="w-8 h-8" />
            </div>
            <p class="font-semibold leading-tight">Berbagai Pilihan<br>Metode Transaksi</p>
        </div>

        <!-- Item 3 - Bawah -->
        <div class="flex flex-col items-center text-center w-4/5 md:w-full md:translate-y-[36px]">
            <div class="bg-white shadow-lg rounded-full p-4 mb-3">
            <img src="https://img.icons8.com/ios-filled/50/228be6/document.png" alt="Akademik" class="w-8 h-8" />
            </div>
            <p class="font-semibold leading-tight">Akses Informasi Akademik<br>Lebih Mudah</p>
        </div>

        <!-- Item 4 - Atas -->
        <div class="flex flex-col items-center text-center w-4/5 md:w-full md:-translate-y-[12px]">
            <div class="bg-white shadow-lg rounded-full p-4 mb-3">
            <img src="https://img.icons8.com/ios-filled/50/228be6/security-shield-green.png" alt="Keamanan" class="w-8 h-8" />
            </div>
            <p class="font-semibold leading-tight">Keamanan Data<br>Terjamin Aman</p>
        </div>
        </div>
    </div>
    </section>

<!-- Dipercaya ++ -->
    <section class="bg-cyan-700 py-10">
    <div class="max-w-7xl mx-auto px-4 text-center">

        <!-- Judul -->
        <h2 class="text-white text-lg sm:text-xl md:text-2xl font-medium mb-10 leading-relaxed">
        Dipercaya <span class="text-orange-400 font-bold">300+</span> Lembaga pendidikan dan 
        <span class="text-orange-400 font-bold">130,000+</span> Siswa
        </h2>

        <!-- Scroll Container -->
        <div class="overflow-x-auto">
        <div class="flex flex-wrap justify-center gap-6 lg:gap-8 min-w-full lg:min-w-0">
            
            <!-- Logo Items -->
            @forelse($mitras as $mitra)
                <img src="{{ $mitra->logo ? asset('storage/' . $mitra->logo) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoh2BJppxcWR0_uR_A40oHqbgK9bUxd1iI7Q&s' }}" 
                alt="{{ $mitra->nama }}" class="bg-white rounded-xl p-2 w-20 h-20 object-contain shadow-md" />
            @empty
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSoh2BJppxcWR0_uR_A40oHqbgK9bUxd1iI7Q&s" alt="Logo Default"
                class="bg-white rounded-xl p-2 w-20 h-20 object-contain shadow-md" />
            @endforelse
        </div>
        </div> 
    </div>
    </section>

    
<!-- Carousel - Produk kami -->
<section class="bg-white text-center pb-28 relative">
  <div class="h-20"></div>
  <h2 class="text-2xl md:text-3xl font-bold text-cyan-500 mb-8">Solusi Digital Unggulan dari CARDS</h2>

  <div class="relative max-w-6xl mx-auto px-4">
    <!-- Carousel -->
    <div id="produkCarousel" class="flex space-x-6 overflow-x-auto scroll-smooth snap-x snap-mandatory pb-4" onscroll="handleScroll()">
      
      <!-- Slides -->
      @forelse($products as $index => $product)
      <div class="flex-shrink-0 w-[300px] md:w-[360px] snap-start" data-index="{{ $index }}">
        <div class="relative bg-[#007F9E] rounded-2xl shadow-xl text-white overflow-hidden group hover:-translate-y-2 transition duration-300">
          <div class="flex items-center justify-center w-full h-60">
            <img src="{{ $product->gambar ? asset('storage/' . $product->gambar) : '../img/p-1.png' }}" alt="{{ $product->nama }}" class="object-contain max-h-full" />
          </div>
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition duration-500 flex items-center justify-center">
            <div class="text-center opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
              <h3 class="text-lg font-semibold mb-3">{{ $product->nama }}</h3>
              <a href="{{ $product->link ?? '#' }}" class="bg-orange-500 hover:bg-orange-600 text-white text-sm py-2 px-4 rounded-full transition">Selengkapnya ›</a>
            </div>
          </div>
        </div>
      </div>
      @empty
      <div class="flex-shrink-0 w-[300px] md:w-[360px] snap-start" data-index="0">
        <div class="relative bg-[#007F9E] rounded-2xl shadow-xl text-white overflow-hidden group hover:-translate-y-2 transition duration-300">
          <div class="flex items-center justify-center w-full h-60">
            <img src="../img/p-1.png" alt="Cards Parent" class="object-contain max-h-full" />
          </div>
          <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-60 transition duration-500 flex items-center justify-center">
            <div class="text-center opacity-0 translate-y-4 group-hover:opacity-100 group-hover:translate-y-0 transition-all duration-500">
              <h3 class="text-lg font-semibold mb-3">Cards Parent</h3>
              <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white text-sm py-2 px-4 rounded-full transition">Selengkapnya ›</a>
            </div>
          </div>
        </div>
      </div>
      @endforelse

    </div>

    <!-- Pagination Dots -->
    <div id="paginationDots" class="flex justify-center mt-6 gap-2">
      <span class="dot w-3 h-3 rounded-full bg-black inline-block"></span>
      <span class="dot w-3 h-3 rounded-full bg-gray-400 inline-block"></span>
      <span class="dot w-3 h-3 rounded-full bg-gray-400 inline-block"></span>
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
    <div class="max-w-4xl mx-auto px-4">
        <div class="swiper mySwiperTesti relative">
        <div class="swiper-wrapper">

            @forelse($testimonies as $testimoni)
            <!-- Slide -->
            <div class="swiper-slide bg-white text-gray-800 rounded-xl p-6 md:p-10 flex flex-col md:flex-row items-center gap-6 shadow-lg">
            <!-- Foto -->
            <div class="flex-shrink-0">
                <img src="{{ $testimoni->foto ? asset('storage/' . $testimoni->foto) : 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBXixafqdNLVEfd3rh13dHkGlLEFAufANTxQ&s' }}" alt="{{ $testimoni->nama }}" class="w-32 h-40 rounded-lg object-cover mx-auto" />
            </div>
            
            <!-- Konten -->
            <div class="text-left">
                <div class="flex justify-center md:justify-end mb-2">
                <span class="bg-cyan-100 text-cyan-800 text-xs px-3 py-1 rounded-full">Pengguna Cards Edu</span>
                </div>
                <p class="text-sm md:text-base mb-4 leading-relaxed relative">
                <span class="text-3xl text-cyan-600 font-serif absolute -top-3 left-0">"</span>
                {{ $testimoni->komentar }}
                <span class="text-3xl text-cyan-600 font-serif align-text-top">"</span>
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
                <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQBXixafqdNLVEfd3rh13dHkGlLEFAufANTxQ&s" alt="Ibu Mega" class="w-32 h-40 rounded-lg object-cover mx-auto" />
            </div>
            
            <!-- Konten -->
            <div class="text-left">
                <div class="flex justify-center md:justify-end mb-2">
                <span class="bg-cyan-100 text-cyan-800 text-xs px-3 py-1 rounded-full">Pengguna Cards Edu</span>
                </div>
                <p class="text-sm md:text-base mb-4 leading-relaxed relative">
                <span class="text-3xl text-cyan-600 font-serif absolute -top-3 left-0">"</span>
                Aplikasi ini sangat terpercaya dan kompeten! Kami telah bekerja sama dengan berbagai pihak yang puas dengan layanan yang diberikan. Benar-benar solusi yang bisa diandalkan!
                <span class="text-3xl text-cyan-600 font-serif align-text-top">"</span>
                </p>
                <p class="text-cyan-700 font-semibold">Ibu Mega</p>
                <p class="text-sm text-gray-500">Guru SMP 1 Bojong</p>
            </div>
            </div>
            @endforelse

        </div>

        <!-- Navigasi Panah -->
        <div class="absolute top-1/2 -left-1 z-10 transform -translate-y-1/2">
            <div class="swiper-button-prev-testimoni bg-white text-cyan-700 hover:bg-cyan-100 w-10 h-10 rounded-md shadow flex items-center justify-center cursor-pointer">
            &#8592;
            </div>
        </div>
        <div class="absolute top-1/2 -right-1 z-10 transform -translate-y-1/2">
            <div class="swiper-button-next-testimoni bg-white text-cyan-700 hover:bg-cyan-100 w-10 h-10 rounded-md shadow flex items-center justify-center cursor-pointer">
            &#8594;
            </div>
        </div>
        </div>
    </div>
    </section>

 <!-- SECTION: FAQ -->
    <section class="bg-white py-16 px-4">
    <div class="max-w-7xl mx-auto grid md:grid-cols-2 gap-10 items-start">

        <!-- Kiri: Judul & Intro -->
        <div>
        <h2 class="text-3xl font-bold text-black mb-4">FAQ</h2>
        <p class="text-gray-700 leading-relaxed text-sm md:text-base">
            Kami paham, sebelum sekolah Anda beralih ke sistem digital, pasti banyak hal yang ingin ditanyakan. Karena itu, kami sudah merangkum pertanyaan-pertanyaan yang paling sering muncul dari sekolah-sekolah lain yang juga sedang berproses menuju digitalisasi.  Kalau ada hal yang belum terjawab di sini, jangan ragu untuk menghubungi tim support kami. Kami siap bantu dengan senang hati dan tanpa ribet.
        </p>
        </div>

        <!-- Kanan: Daftar Pertanyaan -->
        <div class="space-y-6">
        <!-- Item 1 -->
        <div>
            <h3 class="font-semibold text-black mb-1">Kalau sekolah saya masih pakai sistem manual, bisa pindah ke CARDS langsung gak?</h3>
            <p class="text-gray-700 text-sm md:text-base">
            Bisa banget! Justru CARDS dibuat bantu sekolah yang masih serba manual biar lebih simpel. Tim kami bakal bantu proses transisinya step by step, termasuk migrasi data dan pelatihan admin.
            </p>
        </div>

        <!-- Item 2 -->
        <div>
            <h3 class="font-semibold text-black mb-1">Guru atau staf gaptek bisa pakai juga?</h3>
            <p class="text-gray-700 text-sm md:text-base">
            Bisa dong. CARDS itu user-friendly, tampilannya bersih, dan gampang dipahami bahkan buat yang belum terbiasa pakai teknologi.
            </p>
        </div>

        <!-- Item 3 -->
        <div>
            <h3 class="font-semibold text-black mb-1">Nanti kalau ada kendala teknis, siapa yang bantu?</h3>
            <p class="text-gray-700 text-sm md:text-base">
            Tenang, tim support kami standby. Sekolah bisa hubungi kami lewat WhatsApp, email, atau tiket support. Kami juga punya dokumentasi dan video tutorial kalau kamu butuh belajar mandiri.
        </div>

        <!-- Item 4 -->
        <div>
            <h3 class="font-semibold text-black mb-1">Sekolah saya udah pakai sistem lain, bisa pindah ke CARDS?</h3>
            <p class="text-gray-700 text-sm md:text-base">
            Bisa. Kami bantu proses migrasinya, termasuk penyesuaian data yang udah ada sebelumnya. Jadi sekolah gak harus mulai dari nol.
            </p>
        </div>
        </div>
    </div>
    </section>

 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007696" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,192C1120,213,1280,203,1360,197.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>

<!-- FOOTER SECTION -->
    <footer class="bg-[#007696] text-white">
    <!-- Footer Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:justify-between gap-10">
        
        <!-- Logo -->
        <div class="md:w-1/4 flex justify-center md:justify-start">
            <img src="../img/footer logo.png" alt="Cards Edu Logo" class="h-12 w-auto">
            <!-- Ganti src dengan logo asli -->
        </div>

        <!-- Navigation Links -->
        <div class="grid grid-cols-3 sm:grid-cols-2 md:grid-cols-3 gap-8 text-sm md:w-3/4 text-center md:text-left">
            <!-- Homepage Links -->
            <div>
            <h4 class="font-semibold mb-2">Homepage</h4>
            <ul class="space-y-1">
                <li><a href="#" class="hover:underline">Advertisement</a></li>
                <li><a href="#" class="hover:underline">Car</a></li>
                <li><a href="#" class="hover:underline">Helpdesk</a></li>
            </ul>
            </div>
            <!-- Contact Links -->
            <div>
            <h4 class="font-semibold mb-2">Contact</h4>
            <ul class="space-y-1">
                <li><a href="#" class="hover:underline">Booking</a></li>
                <li><a href="#" class="hover:underline">FAQ</a></li>
                <li><a href="#" class="hover:underline">Contact Us</a></li>
            </ul>
            </div>
            <!-- Footer Links -->
            <div>
            <h4 class="font-semibold mb-2">Footer</h4>
            <ul class="space-y-1">
                <li><a href="#" class="hover:underline">Terms of Service</a></li>
                <li><a href="#" class="hover:underline">Privacy Policy</a></li>
                <li><a href="#" class="hover:underline">About Us</a></li>
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
            <a href="#" aria-label="Facebook" class="hover:text-gray-300"><i class="fab fa-facebook-f"></i></a>
            <a href="#" aria-label="Instagram" class="hover:text-gray-300"><i class="fab fa-instagram"></i></a>
            <a href="#" aria-label="Email" class="hover:text-gray-300"><i class="fas fa-envelope"></i></a>
            <a href="#" aria-label="LinkedIn" class="hover:text-gray-300"><i class="fab fa-linkedin-in"></i></a>
            <a href="#" aria-label="YouTube" class="hover:text-gray-300"><i class="fab fa-youtube"></i></a>
        </div>
        </div>
    </div>
    </footer>
  <!-- Swiper JS -->
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>


<script>
  // Testimonial Swiper
   const swiperTesti = new Swiper('.mySwiperTesti', {
    loop: true,
    slidesPerView: 1,
    spaceBetween: 20,
    navigation: {
      nextEl: '.swiper-button-next-testimoni',
      prevEl: '.swiper-button-prev-testimoni',
    },
    breakpoints: {
      768: {
        slidesPerView: 1,
      },
    },
  });

  //dropdown
    function toggleDropdown() {
    const dropdown = document.getElementById('product-dropdown');
    dropdown.classList.toggle('hidden');
    }


    function toggleMobileDropdown() {
        const dropdown = document.getElementById('mobile-product-dropdown');
        dropdown.classList.toggle('hidden');
    }

    // tombol Humburger (navbar)
    function toggleMenu() {
    const menu = document.getElementById("mobile-menu");
    menu.classList.toggle("hidden"); 
    }

    const swiper = new Swiper(".mySwiper", {
    slidesPerView: 1.2,          
    spaceBetween: 20,          
    centeredSlides: true,       
    loop: true,                

    breakpoints: {
        768: {
        slidesPerView: 2.5,   
        },
        1024: {
        slidesPerView: 3.2,     
        },
    },

    pagination: {
        el: ".swiper-pagination",
        clickable: true,        
    },
    });

//titik3
  const carousel = document.getElementById('produkCarousel');
  const slides = carousel.querySelectorAll('[data-index]');
  const dots = document.querySelectorAll('#paginationDots .dot');

  function handleScroll() {
    let closestIndex = 0;
    let closestDistance = Infinity;

    slides.forEach((slide, index) => {
      const rect = slide.getBoundingClientRect();
      const center = rect.left + rect.width / 2;
      const containerCenter = window.innerWidth / 2;
      const distance = Math.abs(containerCenter - center);

      if (distance < closestDistance) {
        closestDistance = distance;
        closestIndex = index;
      }
    });

    // Update dot styles
    dots.forEach((dot, index) => {
      if (index === closestIndex) {
        dot.classList.remove('bg-gray-400');
        dot.classList.add('bg-black');
      } else {
        dot.classList.add('bg-gray-400');
        dot.classList.remove('bg-black');
      }
    });
  }

  // Initial check on page load
  window.addEventListener('load', handleScroll);
    // Geser Testimoni
     
</script>

</body>
</html>