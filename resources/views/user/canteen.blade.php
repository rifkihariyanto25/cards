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
<!-- Include Navbar Component -->
    <x-user.navbar />

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

<!-- Include Footer Component -->
    <x-user.footer />



    
</body>


</html>