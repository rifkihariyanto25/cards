<!DOCTYPE html>
<html lang="en">
<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parents</title>
    <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <section class="relative isolate overflow-hidden">
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
        <a href="/about.html" class="text-cyan-700 hover:text-cyan-900 transition-colors">About</a>
        <a href="contact.html" class="text-cyan-700 hover:text-cyan-900 transition-colors">Contact</a>
      </div>
    </div>

 <!-- SECTION HERO CARDS PARENTS (Mobile-first layout) -->
<section class="bg-[#007696] py-52 px-4 sm:px-6 lg:px-8">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12">
    
    <!-- Judul untuk mobile (muncul hanya di mobile) -->
    <div class="w-full lg:hidden text-center text-white order-1">
      <h2 class="text-3xl sm:text-4xl font-bold mb-4">{{ $heroData->title ?? 'Cards Parents' }}</h2>
    </div>

    <!-- Gambar -->
    <div class="w-full lg:w-1/2 order-3 lg:order-none">
      <div class="bg-[#00627a] p-4 rounded-2xl w-full max-w-md mx-auto lg:mx-0">
          <img 
          src="{{ asset('storage/' . ($heroData->cover_image ?? 'parents/hero/parents_hero.png')) }}" 
          alt="Cards Parents Mockup"
          class="rounded-lg w-full h-auto 
                  shadow-[15px_-15px_80px_(0,0,0,0.4)] 
                  transform translate-x-4 -translate-y-4 scale-105 
                  transition-all duration-500 ease-in-out"
          >
      </div>
    </div>

    <!-- Konten Teks + Tombol -->
    <div class="w-full lg:w-1/2 text-center lg:text-left text-white order-4 lg:order-none">
      <!-- Judul untuk desktop (tersembunyi di mobile) -->
      <h2 class="hidden lg:block text-3xl sm:text-4xl font-bold mt-8 lg:mt-0 mb-4">{{ $heroData->title ?? 'Cards Parents' }}</h2>
      <p class="text-base sm:text-lg mb-8">
        {!! $heroData->subtitle ?? 'Transformasi sekolah jadi digital? Bisa! Dengan Cards Parents, kelola uang saku anak, tagihan sekolah, dan rapor jadi lebih cepat, rapi, dan terpantau!' !!}
      </p>

      <!-- Tombol CTA -->
      <div class="flex flex-col sm:flex-row gap-4 justify-center lg:justify-start">
        <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-full text-sm sm:text-base transition">
          Selengkapnya
        </a>
        <a href="#" class="bg-orange-500 justify-center hover:bg-orange-600 text-white font-semibold px-6 py-3 rounded-full text-sm sm:text-base transition inline-flex items-center gap-2">
          <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 4h10M5 11h14M5 15h14M5 19h14" />
          </svg>
          Jadwalkan Demo
        </a>
      </div>
    </div>
  </div>
</section>

<!-- SECTION: Apa Itu Cards Parents -->
<section class="py-24 px-4 sm:px-6 lg:px-8 bg-white">
  <div class="max-w-7xl mx-auto flex flex-col lg:flex-row items-center gap-12">
    
    <!-- Gambar  -->
        <div class="w-full lg:w-1/2 order-1 lg:order-none">
    <div class="bg-[#00627a] p-4 rounded-2xl w-full max-w-md mx-auto lg:mx-0">
        <img 
        src="{{ asset('storage/' . ($aboutData->cover_image ?? 'parents/about/apaitu_parents.png')) }}" 
        alt="Cards Parents Mockup"
        class="rounded-lg w-full h-auto 
                shadow-[15px_-15px_80px_(0,0,0,0.4)] 
                transform translate-x-4 -translate-y-4 scale-105 
                transition-all duration-500 ease-in-out"
        >
    </div>
    </div>


    <!-- Teks Kanan -->
    <div class="w-full lg:w-1/2 text-center lg:text-left">
      <h2 class="text-2xl sm:text-3xl font-bold text-gray-800 mb-4">{{ $aboutData->title ?? 'Apa Itu Cards Parents ?' }}</h2>
      <p class="text-gray-700 text-base sm:text-lg leading-relaxed">
        {!! $aboutData->subtitle ?? 'Sistem ini menyajikan solusi modern yang menyederhanakan peran orang tua. Dengan menggabungkan berbagai fungsi seperti manajemen keuangan, pemantauan pendidikan, dan juga yang lainnya dalam satu dasbor yang mudah diakses.' !!}
      </p>
    </div>

  </div>
</section>


 <!-- atas -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#007696" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,192C1120,213,1280,203,1360,197.3L1440,192L1440,320L1360,320C1280,320,1120,320,960,320C800,320,640,320,480,320C320,320,160,320,80,320L0,320Z"></path>
</svg>

<!-- SECTION FITUR -->
<section class="bg-[#007696] pt-4 md:pt-28 pb-36 md:pb-44 px-4 sm:px-6 lg:px-8 relative overflow-hidden" aria-label="Fitur Cards Edu">
  <div class="max-w-7xl mx-auto text-center text-white mb-12">
    <h2 class="text-3xl md:text-4xl font-bold">Fitur Fitur Cards Parents</h2>
  </div>

  <!-- Grid Fitur Responsive -->
  <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6 md:gap-8 justify-items-center">
    
    @forelse($features ?? [] as $feature)
    <!-- Feature Card -->
    <article class="bg-white text-gray-800 rounded-xl shadow-md p-6 w-full max-w-xs text-center space-y-3 transition duration-300 transform hover:scale-105">
      @if(isset($feature->gambar) && $feature->gambar)
        <img src="{{ asset('storage/' . $feature->gambar) }}" alt="{{ $feature->nama }}" class="mx-auto w-14 h-14 object-cover">
      @else
        <div class="w-14 h-14 bg-gray-200 rounded-full mx-auto flex items-center justify-center">
          <svg class="w-8 h-8 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
          </svg>
        </div>
      @endif
      <h3 class="font-semibold text-lg">{{ $feature->nama }}</h3>
      <p class="text-sm">{{ $feature->deskripsi }}</p>
    </article>
    @empty
    <!-- Fallback Cards if no features in database -->
    <article class="bg-white text-gray-800 rounded-xl shadow-md p-6 w-full max-w-xs text-center space-y-3 transition duration-300 transform hover:scale-105">
      <img src="https://img.icons8.com/emoji/96/calendar-emoji.png" alt="Ikon Jadwal Otomatis" class="mx-auto w-14 h-14">
      <h3 class="font-semibold text-lg">Jadwal Otomatis</h3>
      <p class="text-sm">Siswa dan guru dapat melihat jadwal harian langsung dari aplikasi.</p>
    </article>
    
    <article class="bg-white text-gray-800 rounded-xl shadow-md p-6 w-full max-w-xs text-center space-y-3 transition duration-300 transform hover:scale-105">
      <img src="https://img.icons8.com/emoji/96/money-bag-emoji.png" alt="Ikon Pembayaran" class="mx-auto w-14 h-14">
      <h3 class="font-semibold text-lg">Pembayaran Digital</h3>
      <p class="text-sm">Kelola pembayaran sekolah dan uang saku anak dengan mudah.</p>
    </article>

    <article class="bg-white text-gray-800 rounded-xl shadow-md p-6 w-full max-w-xs text-center space-y-3 transition duration-300 transform hover:scale-105">
      <img src="https://img.icons8.com/emoji/96/notebook-with-decorative-cover.png" alt="Ikon Rapor" class="mx-auto w-14 h-14">
      <h3 class="font-semibold text-lg">Rapor Online</h3>
      <p class="text-sm">Pantau perkembangan akademik anak melalui rapor digital.</p>
    </article>
    @endforelse

  </div>
</section>


<!-- bawah -->
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#007696" fill-opacity="1" d="M0,96L80,90.7C160,85,320,75,480,96C640,117,800,171,960,192C1120,213,1280,203,1360,197.3L1440,192L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path>
</svg>


<!-- SECTION ACT -->
    <section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-10">

        <!-- Judul untuk mobile (muncul hanya di mobile) -->
        <div class="w-full md:hidden text-center text-cyan-800 mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold">
                Download Aplikasi Cards Parents
            </h2>
        </div>

        <!-- Gambar Aplikasi -->
        <div class="w-full lg:w-3/5 flex lg:pl-10 justify-center order-2 md:order-none">
            <div class="bg-orange-500 p-5 rounded-[3rem] w-full max-w-md">
                <img src="../img/download.png" 
                    alt="Gambar Siswa" 
                    class="w-full aspect-[4/3] rounded-full object-cover" />
            </div>
        </div>

        <!-- Konten Teks -->
        <div class="md:w-1/2 w-full text-center md:text-left order-3 md:order-none">
            <!-- Judul untuk desktop (tersembunyi di mobile) -->
            <h2 class="hidden md:block text-2xl sm:text-3xl font-bold text-cyan-800 mb-4">
                Download Aplikasi Cards Parents
            </h2>
            <p class="text-gray-700 text-base sm:text-lg mb-6">
                Mulai perjalanan belajar digital Anda sekarang! Download aplikasi Cards Parents dan rasakan pengalaman belajar yang tak terlupakan. Tersedia untuk berbagai platform dengan fitur lengkap dan interface yang user-friendly.
            </p>
            
            <!-- Tombol App Store -->
            <div class="flex flex-wrap justify-center md:justify-start gap-4">
                <a href="#" target="_blank">
                    <img src="../img/App Store.png" alt="Download di App Store" class="h-12 w-auto">
                </a>
                <a href="#" target="_blank">
                    <img src="https://upload.wikimedia.org/wikipedia/commons/7/78/Google_Play_Store_badge_EN.svg" alt="Download di Google Play" class="h-12 w-auto">
                </a>
            </div>
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