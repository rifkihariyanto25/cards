<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
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
            <img src="../img/footer logo.png" alt="Keamanan" class="w-8 h-8" />
            </div>
            <p class="font-semibold leading-tight">Keamanan Data<br>Terjamin Aman</p>
        </div>
        </div>
    </div>
    </section>




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