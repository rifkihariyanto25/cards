<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>canteen</title>
    <script src="https://cdn.tailwindcss.com"></script>
     <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" />

</head>
<body class=" ">

     <!-- WRAPPER UNTUK NAVBAR + HERO + STATS -->
<section class="relative isolate overflow-hidden ">
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

 <!-- MOBILE MENU -->
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
<section class="relative bg-[#007696] pt-0 pb-20 px-6 sm:px-10 lg:px-20 overflow-hidden">
  <!-- Konten -->
  <div class="relative z-10 max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 items-center gap-10 mt-[180px]">
    <!-- Konten Kiri -->
    <div class="text-white">
      <h2 class="text-2xl sm:text-3xl font-bold leading-snug" style="font-size: {{ $hero->title_font_size ?? '24px' }}">
        {{ $hero->title ?? 'Uang Saku Digital: Solusi Cashless yang Aman & Terkontrol untuk Transaksi Kantin.' }}
      </h2>
      <p class="text-base sm:text-lg text-white/90 mt-4 leading-relaxed" style="font-size: {{ $hero->subtitle_font_size ?? '16px' }}">
        {{ $hero->subtitle ?? 'Terhubung dengan akun orang tua, semua transaksi terpantau real-time & bebas dari risiko kehilangan uang tunai.' }}
      </p>
      <a
        href="#demo"
        class="inline-flex items-center gap-2 mt-6 px-5 py-3 bg-[#f7931e] hover:bg-[#db7a00] text-white rounded-full text-sm font-semibold transition"
      >
        <i class="far fa-calendar-alt"></i> Jadwalkan Demo
      </a>
    </div>

    <!-- Gambar Kanan -->
    <div class="relative">
      <div class="rounded-xl overflow-hidden border-4 border-[#f7931e] shadow-lg w-full max-w-md mx-auto">
        <img
          src="{{ isset($hero->cover_image) && $hero->cover_image ? asset('storage/' . $hero->cover_image) : '../img/hero_canteen.png' }}" 
          alt="Foto siswa di kantin"
          class="h-5 w-8"
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


<!-- apa itu canteen -->
<section class="px-6 sm:px-10 lg:px-20 py-16 bg-white">
  <div class="max-w-7xl mx-auto">
    <!-- Judul Mobile (hanya muncul di mobile) -->
    <h2 class="md:hidden text-2xl sm:text-3xl font-semibold text-[#007696] mb-6 text-center" style="font-size: {{ $about->title_font_size ?? '24px' }}">
      {{ $about->title ?? 'Apa itu Cards E-Canteen?' }}
    </h2>

    <div class="flex flex-col md:grid md:grid-cols-2 gap-10 items-center">
      <!-- Konten Kiri (Desktop) -->
      <div class="order-2 md:order-1">
        <!-- Judul Desktop (hidden di mobile) -->
        <h2 class="hidden md:block text-2xl sm:text-3xl font-semibold text-[#007696] mb-4" style="font-size: {{ $about->title_font_size ?? '24px' }}">
          {{ $about->title ?? 'Apa itu Cards E-Canteen?' }}
        </h2>
        <p class="text-base sm:text-lg text-gray-700 leading-relaxed" style="font-size: {{ $about->subtitle_font_size ?? '16px' }}">
          {{ $about->subtitle ?? 'E-Canteen adalah solusi kantin digital dari CARDS yang dirancang untuk mempermudah transaksi di lingkungan sekolah, kampus, atau institusi. Dengan sistem ini, proses jual beli di kantin menjadi lebih cepat, aman, dan tanpa uang tunai, sehingga membantu membentuk budaya cashless sekaligus mendukung efisiensi operasional.' }}
        </p>
      </div>

      <!-- Gambar Kanan -->
      <div class="order-1 md:order-2 flex justify-center">
        <div class="relative w-[360px] h-[300px] sm:w-[420px] sm:h-[320px]">
          <!-- Background Oval -->
          <div class="absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 
                      w-[280px] h-[200px] sm:w-[340px] sm:h-[240px]
                      bg-[#f7931e] rounded-full shadow-xl z-0 overflow-hidden">
            <!-- Gambar HP -->
            <img 
  src="{{ isset($about->cover_image) && $about->cover_image ? asset('storage/' . $about->cover_image) : '../img/apait_canteen.png' }}" 
  alt="Mockup E-Canteen" 
  class="absolute left-1/2 top-1/2 translate-x-[-70px] -translate-y-[140px]
         w-[250px] h-auto object-contain z-10
         scale-105 
         transition-all duration-500 ease-in-out"
/>

          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- SVG Atas: Tampil hanya di desktop -->
<svg
  viewBox="0 0 1440 80"
  class="hidden md:block w-full h-auto mb-4"
  preserveAspectRatio="none"
>
  <polygon points="0,0 1440,0 1280,80 160,80" fill="#007696" />
</svg>

<svg
  viewBox="0 0 1440 80"
  class="hidden md:block w-full h-[50px] -mt-[1px]"
  preserveAspectRatio="none"
>
  <polygon points="160,0 1280,0 1160,50 280,50" fill="#007696" />
</svg>

<!-- SVG Tampil hanya di mobile -->

  <polygon points="160,0 1280,0 1160,50 280,50" fill="#007696" />
</svg>

  <polygon points="160,0 1280,0 1160,50 280,50" fill="#007696" />
</svg>

 <div class="flex flex-col items-center md:hidden">
    <svg viewBox="0 0 1440 100" class="w-full h-[60px]">
        <polygon points="0,0 60,60 1380,60 1440,0" fill="#007F9E" />
    </svg>
    <svg viewBox="0 0 960 30" class="w-4/5 h-[30px] mt-[-6px]">
        <polygon points="0,0 40,30 920,30 960,0" fill="#007F9E" />
    </svg>
</div>

<!-- Fitur canteen -->
<section class="px-6 md:px-20 py-32 bg-white text-center">
  <h2 class="text-2xl md:text-3xl font-semibold mb-4">
    Solusi <span class="text-[#007F9E] font-bold">Kantin</span> Masa Kini: Tanpa Tunai, Penuh <span class="text-[#007F9E] font-bold">Kendali</span>
  </h2>
  <p class="text-gray-700 text-base md:text-lg max-w-2xl mx-auto mb-10">
    Satu sentuhan di kantin, transaksi langsung tercatat. Uang saku tersimpan aman dalam kartu atau gelang, dan bisa dipantau orang tua kapan saja.
  </p>

  <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-10">
    <!-- Produk 1 -->
    <div class="flex flex-col items-center">
      <div class="bg-[#9DE1E4] rounded-xl p-6 shadow-md">
        <img src="../img/produk1.png" alt="Kartu QR Code" class="w-full max-w-[280px]">
      </div>
      <p class="font-semibold text-black mt-4">Kartu Siswa Berbasis QR Code</p>
    </div>

    <!-- Produk 2 -->
    <div class="flex flex-col items-center">
      <div class="bg-[#9DE1E4] rounded-xl p-6 shadow-md">
        <img src="../img/produk2.png" alt="Kartu RFID" class="w-full max-w-[280px]">
      </div>
      <p class="font-semibold text-black mt-4">Kartu Siswa Berbasis RFID</p>
    </div>

    <!-- Produk 3 -->
    <div class="flex flex-col items-center">
      <div class="bg-[#9DE1E4] rounded-xl p-6 shadow-md">
        <img src="../img/produk3.png" alt="Gelang RFID" class="w-full max-w-[280px]">
      </div>
      <p class="font-semibold text-black mt-4">Gelang Siswa Berbasis RFID</p>
    </div>
  </div>
</section>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#007696" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,192C1120,213,1280,203,1360,197.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path></svg>

<!-- FOOTER SECTION -->
<footer class="bg-[#007696]  text-white">
  <!-- Footer Main Content -->
  <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6  lg:px-8">
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

  <!-- Divider -->
  <hr class="border-t border-white opacity-20 my-4">

  <!-- Footer Bottom Bar -->
  <div class="bg-[#0289a4] text-sm">
    <div class="max-w-7xl mx-auto px-4 py-4 flex flex-col sm:flex-row items-center justify-between gap-4 text-center sm:text-left">
      <p>© 2025 CAZH. All rights reserved.</p>
      <div class="flex gap-4 text-white text-lg">
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