<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edu</title>
  <script src="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.js"></script>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
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
        <img src="{{ asset('storage/edu/logo-cards.png') }}" alt="Logo" class="h-5 w-8">
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


 <!-- SECTION HERO -->
<section class="bg-cyan-800 py-20">
    <div class="max-w-7xl mx-auto px-4 py-16 mb-16 flex flex-col lg:flex-row items-center gap-10">
        
        <!-- Mobile Title (shown only on mobile) -->
        <div class="w-full lg:hidden text-white text-center mb-6">
            <h1 class="text-4xl font-bold">{{ $heroData->title ?? 'Cards Edu' }}</h1>
        </div>

        <!-- Gambar Siswa -->
        <div class="w-full lg:w-3/5 flex lg:pl-10 justify-center order-2 lg:order-none">
            <div class="bg-[#0f7c96] p-5 rounded-[3rem] w-full max-w-md">
                <img src="{{ asset('storage/' . ($heroData->cover_image ?? 'edu/hero/IMG EDU.png')) }}" 
                    alt="Gambar Siswa" 
                    class="w-full aspect-[4/3] rounded-full object-cover" />
            </div>
        </div>
      
        <!-- Teks -->
        <div class="w-full lg:w-2/5 text-white text-center lg:text-left space-y-6 order-3 lg:order-none">
            <!-- Desktop Title (hidden on mobile) -->
            <h1 class="hidden lg:block text-4xl lg:text-5xl font-bold">{{ $heroData->title ?? 'Cards Edu' }}</h1>
            <p class="text-lg leading-relaxed">
                {!! $heroData->subtitle ?? 'Transformasi sekolah jadi digital? Bisa!<br />Dengan Cards Edu, absensi, tugas, dan rapor jadi lebih cepat, rapi, dan terpantau!' !!}
            </p>
            <div class="flex flex-col sm:flex-row justify-center lg:justify-start gap-4 pt-4">
                <a href="#" class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-full font-medium text-sm transition">
                    Selengkapnya
                </a>
                <a href="#" class="bg-orange-500 justify-center hover:bg-orange-600 text-white px-6 py-3 rounded-full font-medium text-sm flex items-center gap-2 transition">
                    <span class="material-icons text-base"></span>
                    Download Sekarang
                </a>
            </div>
        </div>
    </div>
</section>

<section class="bg-[#e1f5fb] py-20 px-4">

  <div class="max-w-7xl mx-auto">

    <!-- MOBILE VERSION  -->
    <div class="block lg:hidden space-y-10 text-center">

      <!-- JUDUL -->
      <div>
        <h2 class="text-3xl font-bold text-cyan-800 mb-4">
          Apa itu Cards Edu?
        </h2>
        <p class="text-base text-gray-700">
          Cards Edu adalah solusi digital inovatif untuk dunia pendidikan.
        </p>
      </div>
    

      <!-- KETERANGAN -->
      <div class="text-base text-gray-800 leading-relaxed text-justify px-2">
        <p>
          {!! $aboutData->subtitle ?? 'Cards Edu adalah produk dari <strong>PT CAZH Teknologi Inovasi</strong> yang dirancang untuk mendigitalisasi sistem pembelajaran dan administrasi sekolah. Aplikasi ini mengelola jadwal, kehadiran, tugas, nilai, dan rapor akademik siswa secara terintegrasi.' !!}
        </p>
        <p class="mt-4">
          Cards Edu juga terhubung dengan layanan lain seperti <em>Cards School</em>, <em>Cards Canteen</em>, dan <em>Cards Parent</em> untuk menciptakan 
          ekosistem digital pendidikan yang menyeluruh dan terintegrasi.
        </p>
      </div>

    </div>

    <!-- DESKTOP (grid 2 kolom) -->
    <div class="hidden lg:grid grid-cols-2 gap-12 items-center">
      
      <!-- KONTEN KIRI -->
      <div class="flex justify-end">
        <div class="max-w-lg space-y-6 text-left">
          <h2 class="text-4xl font-bold text-cyan-800">
            {{ $aboutData->title ?? 'Apa itu Cards Edu?' }}
          </h2>
          <p class="text-lg text-gray-800 leading-relaxed">
            {!! $aboutData->subtitle ?? 'Cards Edu adalah produk dari PT CAZH Teknologi Inovasi yang dirancang untuk mendigitalisasi sistem pembelajaran dan administrasi sekolah. Aplikasi ini mengelola jadwal, kehadiran, tugas, nilai, dan rapor akademik siswa secara terintegrasi. Terhubung juga dengan Cards School, Cards Canteen, dan Cards Parent, untuk ekosistem digital pendidikan yang lengkap.' !!}
          </p>
        </div>
      </div>

      <!-- GAMBAR KANAN -->
      <div class="flex justify-start">
        <div class="bg-orange-500 p-2 rounded-[3rem] w-full max-w-md">
          <img src="{{ asset('storage/' . ($aboutData->cover_image ?? 'edu/about/Img About edu.png')) }}"
               alt="Siswa menggunakan laptop"
               class="rounded-[2.5rem] object-cover w-full h-auto" />
        </div>
      </div>

    </div>

  </div>

</section>



<!-- SECTION FITUR -->
    <section class="bg-cyan-800 pt-20 md:pt-28 pb-36 md:pb-44 px-4 sm:px-6 lg:px-8 relative overflow-hidden" aria-label="Fitur Cards Edu">
    <div class="max-w-7xl mx-auto text-center text-white mb-12">
        <h2 class="text-3xl md:text-4xl font-bold">Fitur Fitur Cards Edu</h2>
    </div>

    <!-- Grid Fitur -->
    <div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-6 md:gap-8 justify-items-center mb-20">
        @forelse($features as $feature)
        <article class="bg-white text-gray-800 rounded-xl shadow-md p-6 w-full max-w-xs text-center space-y-3 transition duration-300 transform hover:scale-105">
            @if($feature->gambar)
            <img src="{{ asset('storage/' . $feature->gambar) }}" alt="{{ $feature->nama }}" class="mx-auto w-14 h-14">
            @else
            <img src="https://img.icons8.com/emoji/96/calendar-emoji.png" alt="{{ $feature->nama }}" class="mx-auto w-14 h-14">
            @endif
            <h3 class="font-semibold text-lg">{{ $feature->nama }}</h3>
            <p class="text-sm">{{ $feature->deskripsi }}</p>
        </article>
        @empty
        <!-- Card Default -->
        <article class="bg-white text-gray-800 rounded-xl shadow-md p-6 w-full max-w-xs text-center space-y-3 transition duration-300 transform hover:scale-105">
            <img src="https://img.icons8.com/emoji/96/calendar-emoji.png" alt="Ikon Jadwal Otomatis" class="mx-auto w-14 h-14">
            <h3 class="font-semibold text-lg">Jadwal Otomatis</h3>
            <p class="text-sm">Siswa dan guru dapat melihat jadwal harian langsung dari aplikasi.</p>
        </article>
        
        <!-- Card Default 2 -->
        <article class="bg-white text-gray-800 rounded-xl shadow-md p-6 w-full max-w-xs text-center space-y-3 transition duration-300 transform hover:scale-105">
            <img src="https://img.icons8.com/emoji/96/calendar-emoji.png" alt="Ikon Jadwal Otomatis" class="mx-auto w-14 h-14">
            <h3 class="font-semibold text-lg">Absensi Digital</h3>
            <p class="text-sm">Absensi siswa dan guru tercatat secara digital dan dapat dipantau secara real-time.</p>
        </article>
        
        <!-- Card Default 3 -->
        <article class="bg-white text-gray-800 rounded-xl shadow-md p-6 w-full max-w-xs text-center space-y-3 transition duration-300 transform hover:scale-105">
            <img src="https://img.icons8.com/emoji/96/calendar-emoji.png" alt="Ikon Jadwal Otomatis" class="mx-auto w-14 h-14">
            <h3 class="font-semibold text-lg">Rapor Digital</h3>
            <p class="text-sm">Rapor siswa dapat diakses secara digital oleh guru, siswa, dan orang tua.</p>
        </article>
        @endforelse

    
    <!-- SVG Wave -->
    <div class="absolute bottom-0 left-0 w-full">
        <svg class="block w-full h-32 md:h-40" viewBox="0 0 1440 320" preserveAspectRatio="none">
        <path fill="#ffffff" d="M0,160L80,186.7C160,213,320,267,480,250.7C640,235,800,149,960,144C1120,139,1280,213,1360,250.7L1440,288L1440,320L0,320Z"></path>
        </svg>
    </div>
    </section>

<!-- SECTION ACT -->
<section class="bg-white py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto flex flex-col md:flex-row items-center justify-between gap-10">

        <!-- Mobile Title (shown only on mobile) -->
        <div class="w-full md:hidden text-center text-cyan-800 mb-6">
            <h2 class="text-2xl sm:text-3xl font-bold">
                Download Aplikasi Cards Edu
            </h2>
        </div>

        <!-- Gambar Aplikasi -->
        <div class="w-full lg:w-3/5 flex lg:pl-10 justify-center order-2 md:order-none">
            <div class="bg-orange-500 p-5 rounded-[3rem] w-full max-w-md">
                <img src="{{ asset('storage/edu/download.png') }}" 
                    alt="Gambar Siswa" 
                    class="w-full aspect-[4/3] rounded-full object-cover" />
            </div>
        </div>

        <!-- Konten Teks -->
        <div class="md:w-1/2 w-full text-center md:text-left order-3 md:order-none">
            <!-- Desktop Title (hidden on mobile) -->
            <h2 class="hidden md:block text-2xl sm:text-3xl font-bold text-cyan-800 mb-4">
                Download Aplikasi <br class="md:hidden">Cards Edu
            </h2>
            <p class="text-gray-700 text-base sm:text-lg mb-6">
                Mulai perjalanan belajar digital Anda sekarang! Download aplikasi Cards Edu dan rasakan pengalaman belajar yang tak terlupakan. Tersedia untuk berbagai platform dengan fitur lengkap dan interface yang user-friendly.
            </p>
            
            <!-- Tombol App Store -->
            <div class="flex flex-wrap justify-center md:justify-start gap-4">
                <a href="#" target="_blank">
                    <img src="{{ asset('storage/edu/app-store.png') }}" alt="Download di App Store" class="h-12 w-auto">
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
    <footer class="bg-[#007696] text-white">
    <!-- Footer Main Content -->
    <div class="max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8">
        <div class="flex flex-col md:flex-row md:justify-between gap-10">
        
        <!-- Logo -->
        <div class="md:w-1/4 flex justify-center md:justify-start">
            <img src="{{ asset('storage/edu/footer-logo.png') }}" alt="Cards Edu Logo" class="h-12 w-auto">
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