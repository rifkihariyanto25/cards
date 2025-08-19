<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>flexy</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <!-- Navigation -->
  <nav 
        id="navbar"
        class="fixed top-4 left-4 right-4 z-[200] bg-white/95 backdrop-blur-md shadow-lg px-6 py-3 rounded-full transition-all duration-300">
  <!-- Isi navbar -->
    <div class="flex items-center justify-between">
        <!-- Logo -->
        <div class="flex items-center space-x-2">
        <img src="{{ asset('logoCards.png') }}" alt="Logo" class="h-5 w-8">
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
        <a href="{{ route('homepage') }}" class="hover:text-cyan-700 transition-colors">Home</a>
         <a href="{{ route('flexy') }}" class="hover:text-cyan-700 transition-colors">Flexy</a>
       
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

            <!-- DROPDOWN yang menutupi elemen lain -->
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
<section class="relative bg-[#007696] pt-0 pb-32 px-6 sm:px-10 lg:px-20 overflow-hidden">
  <!-- Konten -->
  <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-center gap-10 mt-[180px]">
    <!-- Konten Kiri -->
    <div class="text-white">
      <h2 class="text-2xl sm:text-3xl font-bold leading-snug">
        FlexyCazh: Solusi Pembiayaan Digital untuk Arus Kas Sekolah
      </h2>
      <p class="text-base sm:text-lg text-white/90 mt-4 leading-relaxed">
        Dapatkan pendanaan cepat untuk tagihan dan kebutuhan operasional sekolah, tanpa beban bunga tinggi, melalui platform fleksibel yang terintegrasi dengan sistem CARDS
      </p>
    </div>

    <!-- Gambar Kanan -->
    <div class="relative">
      <div class="rounded-xl overflow-hidden border-4 border-[#f7931e] shadow-lg w-full max-w-md mx-auto">
        <img
          src="{{ asset('logoFlexy.png') }}" 
          alt="FlexyCazh"
          class="w-full h-auto object-cover"
        />
      </div>

      <!-- Ornamen Kotak -->
      <div class="absolute top-[-20px] right-[-20px] w-6 h-6 sm:w-8 sm:h-8 border-4 border-[#f7931e] rotate-45"></div>
      <div class="absolute bottom-[-20px] left-[-20px] w-6 h-6 sm:w-8 sm:h-8 border-4 border-[#f7931e] rotate-45"></div>
      <div class="absolute bottom-[10%] right-[-10px] w-5 h-5 border-2 border-[#00bcd4] rotate-45 hidden sm:block"></div>
    </div>
  </div>

  <!-- SVG Gelombang -->
  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320" class="absolute bottom-0 left-0 w-full">
    <path fill="#0082A5" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,192C1120,213,1280,203,1360,197.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
  </svg>
</section>


 <!-- SECTION FITUR -->
<section class="bg-white py-12 px-4 md:px-8 lg:px-16">
  <div class="text-center mb-10">
    <h2 class="text-2xl md:text-3xl font-semibold text-gray-900">
      Fitur Unggulan <span class="text-[#00718F]">FlexyCazh</span>
    </h2>
    <p class="mt-2 text-gray-600">Pembiayaan Cerdas yang Dirancang untuk Kebutuhan Bisnis Anda</p>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-6">
    <!-- Item -->
    <div class="bg-cyan-50 rounded-xl p-6 text-center shadow-sm">
      <div class="mb-4 flex items-center justify-center">
        <div class="w-12 h-12 rounded-full bg-[#00718F] text-white flex items-center justify-center text-xl">
          💸
        </div>
      </div>
      <h3 class="text-lg font-semibold text-sky-800 mb-2">Pendanaan Instan</h3>
      <p class="text-sm text-gray-700">Ajukan pendanaan faktur atau tagihan dengan mudah, proses cepat, dana langsung cair</p>
    </div>

    <!-- Item -->
    <div class="bg-cyan-50 rounded-xl p-6 text-center shadow-sm">
      <div class="mb-4 flex items-center justify-center">
        <div class="w-12 h-12 rounded-full bg-[#00718F] text-white flex items-center justify-center text-xl">
          📉
        </div>
      </div>
      <h3 class="text-lg font-semibold text-sky-800 mb-2">Bunga Bersahabat</h3>
      <p class="text-sm text-gray-700">Skema suku bunga kompetitif yang ringan untuk membantu arus kas tanpa tekanan keuangan</p>
    </div>

    <!-- Item -->
    <div class="bg-cyan-50 rounded-xl p-6 text-center shadow-sm">
      <div class="mb-4 flex items-center justify-center">
        <div class="w-12 h-12 rounded-full bg-[#00718F] text-white flex items-center justify-center text-xl">
          🗓️
        </div>
      </div>
      <h3 class="text-lg font-semibold text-sky-800 mb-2">Tenor Fleksibel</h3>
      <p class="text-sm text-gray-700">Pilih periode cicilan sesuai kebutuhan, dari jangka pendek hingga menengah</p>
    </div>

    <!-- Item -->
    <div class="bg-cyan-50 rounded-xl p-6 text-center shadow-sm">
      <div class="mb-4 flex items-center justify-center">
        <div class="w-12 h-12 rounded-full bg-[#00718F] text-white flex items-center justify-center text-xl">
          🔗
        </div>
      </div>
      <h3 class="text-lg font-semibold text-sky-800 mb-2">Integrasi Mulus</h3>
      <p class="text-sm text-gray-700">Terhubung langsung dengan dashboard keuangan CARDS, memudahkan monitoring dan laporan</p>
    </div>

    <!-- Item -->
    <div class="bg-cyan-50 rounded-xl p-6 text-center shadow-sm">
      <div class="mb-4 flex items-center justify-center">
        <div class="w-12 h-12 rounded-full bg-[#00718F] text-white flex items-center justify-center text-xl">
          🔍
        </div>
      </div>
      <h3 class="text-lg font-semibold text-sky-800 mb-2">Transparansi Total</h3>
      <p class="text-sm text-gray-700">Semua transaksi dan status pendanaan tercatat jelas dalam satu platform</p>
    </div>
   
    
</section>


<!-- SECTION LANGKAH LANGKAH -->

<section class="bg-[#025968] text-white py-16 px-4 md:px-10 lg:px-20">
  <div class="text-center mb-12">
    <h2 class="text-2xl md:text-3xl font-semibold relative inline-block">
      <span class="before:absolute before:left-[-60px] before:top-1/2 before:w-10 before:h-[2px] before:bg-white before:translate-y-[-50%] after:absolute after:right-[-60px] after:top-1/2 after:w-10 after:h-[2px] after:bg-white after:translate-y-[-50%]">
        Cara Mudah Mendapatkan <span class="text-[#73E2FF] font-bold">Flexycazh</span>
      </span>
    </h2>
  </div>

  <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-10">
    <!-- Step 1 -->
    <div class="text-center sm:text-left">
      <div class="text-5xl font-extrabold text-white/80 mb-4">#1</div>
      <h3 class="text-lg font-bold text-[#73E2FF] mb-2">Mulai dengan Menjadi Partner Resmi CARDS</h3>
      <p class="text-white/80 text-sm leading-relaxed">
        Menyediakan layanan paket pemeriksaan kesehatan berkala (Medical Check Up) yang komprehensif dan akurat dengan didukung oleh dokter dan tenaga medis yang kompeten serta layanan penunjang medis yang lengkap.
      </p>
    </div>

    <!-- Step 2 -->
    <div class="text-center sm:text-left">
      <div class="text-5xl font-extrabold text-white/80 mb-4">#2</div>
      <h3 class="text-lg font-bold text-[#73E2FF] mb-2">Bangun Reputasi Lewat Transaksi Selama 3 Bulan</h3>
      <p class="text-white/80 text-sm leading-relaxed">
        Untuk memastikan kredibilitas dan kelayakan pengajuan, Flexycazh hanya tersedia bagi partner yang telah aktif melakukan transaksi online minimal selama 3 bulan. Catatan transaksi ini akan menjadi acuan dalam menentukan limit pembiayaan Anda. Semakin konsisten Anda bertransaksi, semakin besar peluang mendapatkan limit Flexycazh yang optimal.
      </p>
    </div>

    <!-- Step 3 -->
    <div class="text-center sm:text-left">
      <div class="text-5xl font-extrabold text-white/80 mb-4">#3</div>
      <h3 class="text-lg font-bold text-[#73E2FF] mb-2">Ajukan Flexycazh, Nikmati Kemudahan Pembiayaan</h3>
      <p class="text-white/80 text-sm leading-relaxed">
        Setelah memenuhi kriteria, Anda dapat langsung mengajukan Flexycazh melalui menu pengajuan yang tersedia. Pastikan seluruh data Anda akurat dan riwayat transaksi tercatat baik agar proses verifikasi berjalan cepat dan tanpa hambatan. Rasakan kemudahan pengelolaan keuangan usaha dengan akses pembiayaan yang fleksibel dan terintegrasi.
      </p>
    </div>
  </div>
</section>

<!-- SECTION Formulir -->
<section class="bg-[#60CEC9] px-6 md:px-10 rounded-2xl shadow-lg max-w-6xl mx-auto my-10">
  <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 items-center">
    
    <!-- Formulir -->
    <div class="order-1 lg:order-1">
      <!-- Judul -->
     <div class="flex flex-col items-center text-center pt-6 pb-4 md:pt-0 md:pb-0">
        <h2 class="text-2xl md:text-3xl font-bold text-gray-900 mb-1">
          Siap Ajukan <span class="text-[#FFFF]">FlexyCazh</span>?
        </h2>
        <p class="text-gray-700 mb-8">Lengkapi formulir ini, tim kami akan segera menghubungi Anda.</p>
      </div>
      
      <!-- Form -->
      <form action="{{ route('flexy.pengajuan') }}" method="POST" class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @csrf
        
        @if(session('success'))
        <div class="col-span-2 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
          <span class="block sm:inline">{{ session('success') }}</span>
        </div>
        @endif
        
        @if(session('error'))
        <div class="col-span-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <span class="block sm:inline">{{ session('error') }}</span>
        </div>
        @endif
        
        @if ($errors->any())
        <div class="col-span-2 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
        
        <!-- Kolom Kiri -->
        <div class="flex flex-col gap-4">
          <div>
            <label class="block text-sm text-gray-800 mb-1">Nama Partner</label>
            <input type="text" name="nama_partner" value="{{ old('nama_partner') }}" class="w-full px-4 py-2 rounded-md border border-gray-300" required />
          </div>
          <div>
            <label class="block text-sm text-gray-800 mb-1">Jenis Partner</label>
            <select name="jenis_partner" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
              <option value="" selected disabled>Pilih Jenis Partner...</option>
              <option value="Sekolah" {{ old('jenis_partner') == 'Sekolah' ? 'selected' : '' }}>Sekolah</option>
              <option value="Klinik" {{ old('jenis_partner') == 'Klinik' ? 'selected' : '' }}>Klinik</option>
              <option value="Perusahaan" {{ old('jenis_partner') == 'Perusahaan' ? 'selected' : '' }}>Perusahaan</option>
            </select>
          </div>
          <div>
            <label class="block text-sm text-gray-800 mb-1">Nama PIC</label>
            <input type="text" name="nama_pic" value="{{ old('nama_pic') }}" class="w-full px-4 py-2 rounded-md border border-gray-300" required />
          </div>
          <div>
            <label class="block text-sm text-gray-800 mb-1">Nomor HP PIC</label>
            <input type="text" name="nomor_hp_pic" value="{{ old('nomor_hp_pic') }}" class="w-full px-4 py-2 rounded-md border border-gray-300" required />
          </div>
        </div>

        <!-- Kolom Kanan -->
        <div class="flex flex-col gap-4">
          <div>
            <label class="block text-sm text-gray-800 mb-1">Kebutuhan</label>
            <select name="kebutuhan" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
              <option value="" selected disabled>Pilih Kebutuhan...</option>
              <option value="Kebutuhan Pendanaan" {{ old('kebutuhan') == 'Kebutuhan Pendanaan' ? 'selected' : '' }}>Kebutuhan Pendanaan</option>
            </select>
          </div>
          <div>
            <label class="block text-sm text-gray-800 mb-1">Nominal</label>
            <input type="number" name="nominal" value="{{ old('nominal') }}" placeholder="0" class="w-full px-4 py-2 rounded-md border border-gray-300" required />
          </div>
          <div>
            <label class="block text-sm text-gray-800 mb-1">Tenor</label>
            <select name="tenor" class="w-full px-4 py-2 rounded-md border border-gray-300" required>
              <option value="" selected disabled>Pilih Tenor...</option>
              <option value="3 Bulan" {{ old('tenor') == '3 Bulan' ? 'selected' : '' }}>3 Bulan</option>
              <option value="6 Bulan" {{ old('tenor') == '6 Bulan' ? 'selected' : '' }}>6 Bulan</option>
              <option value="12 Bulan" {{ old('tenor') == '12 Bulan' ? 'selected' : '' }}>12 Bulan</option>
            </select>
          </div>
          <div class="flex items-end mt-4 h-full">
            <button type="submit" class="w-full bg-orange-500 text-white py-2 rounded-md hover:bg-orange-600 transition-all">
              Kirim
            </button>
          </div>
        </div>
      </form>
    </div>

    <!-- Gambar -->
    <div class="hidden lg:block order-10 lg:order-10">
      <img src="/Users/fendhi/Downloads/image 42.png" alt="Marketing Woman" class="w-[240px] md:w-[300px] lg:w-[320px] mx-auto mt-10 lg:mt-0">
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


    <script>
// fungsi dropdown 
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
</script>
    
</body>
</html>