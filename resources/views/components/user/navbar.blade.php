<!-- Navigation -->
<nav id="navbar" class="fixed top-4 left-4 right-4 z-50 bg-white shadow-md rounded-2xl px-6 py-3 transition-all duration-300">
    <div class="flex items-center justify-between max-w-7xl mx-auto">
        <!-- Logo -->
        <div class="flex items-center space-x-3">
            <img src="{{ asset('storage/assets/logoCards.png') }}" alt="Logo" class="h-8 w-auto">
            <span class="text-xl font-bold text-gray-800"></span>
        </div>

        <!-- Desktop Menu -->
        <div class="hidden md:flex space-x-8 items-center">
            <a href="{{ route('user.homepage') }}" 
               class="@if($currentRoute === 'user.homepage') text-cyan-600 @else text-gray-700 hover:text-cyan-600 @endif transition-colors font-medium">
               Home
            </a>
            <a href="{{ route('user.flexy') }}" 
               class="@if($currentRoute === 'user.flexy') text-cyan-600 @else text-gray-700 hover:text-cyan-600 @endif transition-colors font-medium">
               Flexy
            </a>
            
            <!-- Products Dropdown -->
            <div class="relative group" id="product-dropdown-wrapper">
                <button class="flex items-center text-gray-700 hover:text-cyan-600 transition-colors font-medium">
                    Products
                    <i class="fas fa-chevron-down ml-1 text-xs group-hover:rotate-180 transition-transform duration-300"></i>
                </button>
                <div id="product-dropdown" class="absolute top-full left-1/2 -translate-x-1/2 mt-2 w-48 bg-white rounded-xl shadow-xl opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-300 transform translate-y-2 group-hover:translate-y-0">
                    <div class="p-2">
                        <a href="{{ route('user.edu') }}" 
                           class="@if($currentRoute === 'user.edu') text-cyan-600 bg-cyan-50 @else text-gray-700 hover:text-cyan-600 @endif block px-4 py-3 hover:bg-cyan-50 rounded-lg transition-colors">
                           Edu
                        </a>
                        <a href="{{ route('user.parents') }}" 
                           class="@if($currentRoute === 'user.parents') text-cyan-600 bg-cyan-50 @else text-gray-700 hover:text-cyan-600 @endif block px-4 py-3 hover:bg-cyan-50 rounded-lg transition-colors">
                           Parents
                        </a>
                        <a href="{{ route('user.school') }}" 
                           class="@if($currentRoute === 'user.school') text-cyan-600 bg-cyan-50 @else text-gray-700 hover:text-cyan-600 @endif block px-4 py-3 hover:bg-cyan-50 rounded-lg transition-colors">
                           School
                        </a>
                        <a href="{{ route('user.canteen') }}" 
                           class="@if($currentRoute === 'user.canteen') text-cyan-600 bg-cyan-50 @else text-gray-700 hover:text-cyan-600 @endif block px-4 py-3 hover:bg-cyan-50 rounded-lg transition-colors">
                           Canteen
                        </a>
                    </div>
                </div>
            </div>
            
            <a href="#about" class="text-gray-700 hover:text-cyan-600 transition-colors font-medium">About</a>
            <a href="{{ route('user.contact') }}" 
               class="@if($currentRoute === 'user.contact') text-cyan-600 bg-cyan-50 @else text-gray-700 hover:text-cyan-600 @endif block px-4 py-3 hover:bg-cyan-50 rounded-lg transition-colors">
               Contact
            </a>
        </div>

        <!-- Mobile menu button -->
        <button class="md:hidden p-2" onclick="toggleMenu()">
            <div class="w-6 h-6 flex flex-col justify-center items-center space-y-1">
                <div class="h-0.5 w-6 bg-gray-700 transition-all duration-300" id="line1"></div>
                <div class="h-0.5 w-6 bg-gray-700 transition-all duration-300" id="line2"></div>
                <div class="h-0.5 w-6 bg-gray-700 transition-all duration-300" id="line3"></div>
            </div>
        </button>
    </div>

    <!-- Mobile Menu -->
    <div id="mobile-menu" class="md:hidden mt-4 p-4 bg-white shadow-md rounded-xl hidden">
        <div class="space-y-4">
            <a href="{{ route('user.homepage') }}" 
               class="@if($currentRoute === 'user.homepage') text-cyan-600 @else text-gray-700 hover:text-cyan-600 @endif block transition-colors">
               Home
            </a>
            <a href="{{ route('user.flexy') }}" 
               class="@if($currentRoute === 'user.flexy') text-cyan-600 @else text-gray-700 hover:text-cyan-600 @endif block transition-colors">
               Flexy
            </a>
            
            <!-- Mobile Products Dropdown Button -->
            <div class="block">
                <button onclick="toggleMobileProductDropdown()" id="mobile-product-dropdown-button" class="flex items-center w-full text-left text-gray-700 hover:text-cyan-600 transition-colors">
                    Products
                    <i id="mobile-dropdown-icon" class="fas fa-chevron-down ml-2 text-xs transition-transform duration-300"></i>
                </button>
                
                <!-- Mobile Products Dropdown Menu -->
                <div id="mobile-product-dropdown" class="pl-4 mt-2 hidden">
                    <a href="{{ route('user.edu') }}" 
                       class="@if($currentRoute === 'user.edu') text-cyan-600 @else text-gray-700 hover:text-cyan-600 @endif block transition-colors py-2">
                       - Edu
                    </a>
                    <a href="{{ route('user.parents') }}" 
                       class="@if($currentRoute === 'user.parents') text-cyan-600 @else text-gray-700 hover:text-cyan-600 @endif block transition-colors py-2">
                       - Parents
                    </a>
                    <a href="{{ route('user.school') }}" 
                       class="@if($currentRoute === 'user.school') text-cyan-600 @else text-gray-700 hover:text-cyan-600 @endif block transition-colors py-2">
                       - School
                    </a>
                    <a href="{{ route('user.canteen') }}" 
                       class="@if($currentRoute === 'user.canteen') text-cyan-600 @else text-gray-700 hover:text-cyan-600 @endif block transition-colors py-2">
                       - Canteen
                    </a>
                </div>
            </div>
            
            <a href="#about" class="block text-gray-700 hover:text-cyan-600 transition-colors">About</a>
           <a href="{{ route('user.contact') }}" 
               class="@if($currentRoute === 'user.contact') text-cyan-600 bg-cyan-50 @else text-gray-700 hover:text-cyan-600 @endif block px-4 py-3 hover:bg-cyan-50 rounded-lg transition-colors">
               Contact
            </a>
        </div>
    </div>
</nav>

<script>
function toggleMenu() {
    const mobileMenu = document.getElementById('mobile-menu');
    const line1 = document.getElementById('line1');
    const line2 = document.getElementById('line2');
    const line3 = document.getElementById('line3');
    
    // Toggle mobile menu visibility
    mobileMenu.classList.toggle('hidden');
    
    // Animate hamburger lines to X
    if (mobileMenu.classList.contains('hidden')) {
        // Return to hamburger
        line1.style.transform = 'rotate(0deg) translateY(0px)';
        line2.style.opacity = '1';
        line3.style.transform = 'rotate(0deg) translateY(0px)';
    } else {
        // Transform to X
        line1.style.transform = 'rotate(45deg) translateY(6px)';
        line2.style.opacity = '0';
        line3.style.transform = 'rotate(-45deg) translateY(-6px)';
    }
}

function toggleMobileProductDropdown() {
    const dropdown = document.getElementById('mobile-product-dropdown');
    const icon = document.getElementById('mobile-dropdown-icon');
    
    dropdown.classList.toggle('hidden');
    
    if (dropdown.classList.contains('hidden')) {
        icon.style.transform = 'rotate(0deg)';
    } else {
        icon.style.transform = 'rotate(180deg)';
    }
}
</script>