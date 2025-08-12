<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards Admin - Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        .bg-cards-teal {
            background-color: #00718f;
        }
        .text-cards-teal {
            color: #00718f;
        }
        .bg-cards-orange {
            background-color: #F08519;
        }
        .hover-cards-orange:hover {
            background-color: #E66A00;
        }
        .sidebar-item {
            transition: all 0.3s ease;
        }
        .sidebar-item:hover {
            background-color: rgba(255, 255, 255, 0.1);
        }
        .sidebar-item.active {
            background-color: rgba(255, 255, 255, 0.2);
        }
        .dropdown-arrow {
            transition: transform 0.3s ease;
        }
        .dropdown-arrow.rotate {
            transform: rotate(180deg);
        }
        
    </style>
</head>
<body class="bg-gray-100 min-h-screen">
   <div class="flex">
       <!-- Sidebar -->
        <div class="w-80 bg-cards-teal min-h-screen">
            <!-- Logo -->
            <div class="p-6 border-b border-teal-600">
                <div class="flex items-center">
                    <img src="{{ asset('logoCards.png') }}" alt="Cards Logo" class="w-25 h-25">
                </div>
            </div>

            <!-- Admin Section -->
            <div class="px-6 py-4 border-b border-teal-600">
                <h2 class="text-white text-lg font-semibold">Admin</h2>
            </div>

            <!-- Navigation Menu -->
            <nav class="py-6">
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('admin.dashboard') }}" 
                           class="flex items-center px-6 py-3 text-white sidebar-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                            <div class="w-7 h-7 mr-4">
                                <img src="{{ asset('logoDash.png') }}" alt="Cards Logo" class="w-25 h-25">
                            </div>
                            <span class="text-lg">Dashboard</span>
                        </a>
                    </li>

                    <!-- Home Page -->
                    <li>
                        <div class="flex items-center px-6 py-3 text-white sidebar-item cursor-pointer" 
                             onclick="toggleDropdown('homepage-dropdown')">
                             <div class="w-7 h-7 mr-4">
                                <img src="{{ asset('logoHome.png') }}" alt="Cards Logo" class="w-25 h-25">
                            </div>
                            <span class="text-lg flex-1">Home Page</span>
                            <svg class="w-4 h-4 dropdown-arrow {{ request()->routeIs('admin.homepage.*') ? 'rotate' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="homepage-dropdown" class="{{ request()->routeIs('admin.homepage.*') ? '' : 'hidden' }} ml-12 mt-2 space-y-1">
                            <li><a href="{{ route('admin.homepage.hero') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.homepage.hero') ? 'bg-cyan-800' : '' }}">Hero Section</a></li>
                            <li><a href="{{ route('admin.homepage.about') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.homepage.about') ? 'bg-cyan-800' : '' }}">About Section</a></li>
                            <li><a href="{{ route('admin.homepage.mitra') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.homepage.mitra') ? 'bg-cyan-800' : '' }}">Mitra Section</a></li>
                            <li><a href="{{ route('admin.homepage.product') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.homepage.product') ? 'bg-cyan-800' : '' }}">Product Section</a></li>
                             <li><a href="{{ route('admin.homepage.testimoni') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.homepage.testimoni') ? 'bg-cyan-800' : '' }}">Testimoni Section</a></li>
                        </ul>
                    </li>

                    <!-- Edu -->
                    <li>
                        <div class="flex items-center px-6 py-3 text-white sidebar-item cursor-pointer" 
                            onclick="toggleDropdown('edu-dropdown')">
                            <div class="w-7 h-7 mr-4">
                                <img src="{{ asset('logoEdu.png') }}" alt="Cards Logo" class="w-25 h-25">
                            </div>
                            <span class="text-lg flex-1">Edu</span>
                            <svg class="w-4 h-4 dropdown-arrow {{ request()->routeIs('admin.edu.*') ? 'rotate' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="edu-dropdown" class="{{ request()->routeIs('admin.edu.*') ? '' : 'hidden' }} ml-12 mt-2 space-y-1">
                            <li><a href="{{ route('admin.edu.hero') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.edu.hero') ? 'bg-cyan-800' : '' }}">Hero Section</a></li>
                            <li><a href="{{ route('admin.edu.about') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.edu.about') ? 'bg-cyan-800' : '' }}">About Section</a></li>
                            <li><a href="{{ route('admin.edu.features') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.edu.features') ? 'bg-cyan-800' : '' }}">Features Section</a></li>
                            <li><a href="{{ route('admin.edu.download') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.edu.download') ? 'bg-cyan-800' : '' }}">Download Section</a></li>
                        </ul>
                    </li>

                    <!-- Canteen -->
                    <li>
                        <div class="flex items-center px-6 py-3 text-white sidebar-item cursor-pointer" 
                            onclick="toggleDropdown('canteen-dropdown')">
                            <div class="w-7 h-7 mr-4">
                                <img src="{{ asset('logoCanteen.png') }}" alt="Cards Logo" class="w-25 h-25">
                            </div>
                            <span class="text-lg flex-1">Canteen</span>
                            <svg class="w-4 h-4 dropdown-arrow {{ request()->routeIs('admin.canteen.*') ? 'rotate' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="canteen-dropdown" class="{{ request()->routeIs('admin.canteen.*') ? '' : 'hidden' }} ml-12 mt-2 space-y-1">
                            <li><a href="{{ route('admin.canteen.hero') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.canteen.hero') ? 'bg-cyan-800' : '' }}">Hero Section</a></li>
                            <li><a href="{{ route('admin.canteen.about') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.canteen.about') ? 'bg-cyan-800' : '' }}">About Section</a></li>
                            <li><a href="{{ route('admin.canteen.features') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.canteen.features') ? 'bg-cyan-800' : '' }}">Features Section</a></li>
                        </ul>
                    </li>

                    <!-- School -->
                    <li>
                        <div class="flex items-center px-6 py-3 text-white sidebar-item cursor-pointer" 
                            onclick="toggleDropdown('school-dropdown')">
                            <div class="w-7 h-7 mr-4">
                                <img src="{{ asset('logoSchool.png') }}" alt="Cards Logo" class="w-25 h-25">
                            </div>
                            <span class="text-lg flex-1">School</span>
                            <svg class="w-4 h-4 dropdown-arrow {{ request()->routeIs('admin.school.*') ? 'rotate' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="school-dropdown" class="{{ request()->routeIs('admin.school.*') ? '' : 'hidden' }} ml-12 mt-2 space-y-1">
                            <li><a href="{{ route('admin.school.hero') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.school.hero') ? 'bg-cyan-800' : '' }}">Hero Section</a></li>
                            <li><a href="{{ route('admin.school.about') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.school.about') ? 'bg-cyan-800' : '' }}">About Section</a></li>
                            <li><a href="{{ route('admin.school.features') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.school.features') ? 'bg-cyan-800' : '' }}">Features Section</a></li>
                            <li><a href="{{ route('admin.school.download') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.school.download') ? 'bg-cyan-800' : '' }}">Download Section</a></li>
                        </ul>
                    </li>

                    <!-- Parents -->
                    <li>
                        <div class="flex items-center px-6 py-3 text-white sidebar-item cursor-pointer" 
                            onclick="toggleDropdown('parents-dropdown')">
                            <div class="w-7 h-7 mr-4">
                                <img src="{{ asset('logoParent.png') }}" alt="Cards Logo" class="w-25 h-25">
                            </div>
                            <span class="text-lg flex-1">Parents</span>
                            <svg class="w-4 h-4 dropdown-arrow {{ request()->routeIs('admin.parents.*') ? 'rotate' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="parents-dropdown" class="{{ request()->routeIs('admin.parents.*') ? '' : 'hidden' }} ml-12 mt-2 space-y-1">
                            <li><a href="{{ route('admin.parents.hero') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.parents.hero') ? 'bg-cyan-800' : '' }}">Hero Section</a></li>
                            <li><a href="{{ route('admin.parents.about') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.parents.about') ? 'bg-cyan-800' : '' }}">About Section</a></li>
                            <li><a href="{{ route('admin.parents.features') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.parents.features') ? 'bg-cyan-800' : '' }}">Features Section</a></li>
                            <li><a href="{{ route('admin.parents.download') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.parents.download') ? 'bg-cyan-800' : '' }}">Download Section</a></li>
                        </ul>
                    </li>

                    <!-- FlexyCazh -->
                    <li>
                        <div class="flex items-center px-6 py-3 text-white sidebar-item cursor-pointer" 
                            onclick="toggleDropdown('flexycazh-dropdown')">
                            <div class="w-7 h-7 mr-4">
                                <img src="{{ asset('logoFlexy.png') }}" alt="Cards Logo" class="w-25 h-25">
                            </div>
                            <span class="text-lg flex-1">FlexyCazh</span>
                            <svg class="w-4 h-4 dropdown-arrow {{ request()->routeIs('admin.flexycazh.*') ? 'rotate' : '' }}" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="flexycazh-dropdown" class="{{ request()->routeIs('admin.flexycazh.*') ? '' : 'hidden' }} ml-12 mt-2 space-y-1">
                            <li><a href="{{ route('admin.flexycazh.hero') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.flexycazh.hero') ? 'bg-cyan-800' : '' }}">Hero Section</a></li>
                            <li><a href="{{ route('admin.flexycazh.features') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.flexycazh.features') ? 'bg-cyan-800' : '' }}">Features Section</a></li>
                            <li><a href="{{ route('admin.flexycazh.tutorial') }}" class="block px-4 py-2 text-white text-sm hover:bg-cyan-800 rounded {{ request()->routeIs('admin.flexycazh.tutorial') ? 'bg-cyan-800' : '' }}">Tutorial Section</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>

        <!-- Main Content -->
        <div class="flex-1">
            <!-- Header -->
            <div class="bg-white shadow-sm border-b border-gray-200 px-6 py-4">
                <div class="flex items-center justify-between">
                    <h1 class="text-xl font-semibold text-cards-teal">@yield('page-title', 'Home Page - Content Management')</h1>
                    <!-- Logout Button -->
                    <form method="POST" action="{{ route('admin.logout') }}">
                        @csrf
                        <button type="submit" 
                                class="bg-cards-teal hover:bg-cyan-800 text-white px-6 py-2 rounded-full transition-colors duration-200">
                            Logout
                        </button>
                    </form>
                </div>
            </div>

           <!-- Main Content Area -->
        <main class="flex-1 p-8">
            <div class="bg-white rounded-lg shadow-sm">
                <!-- Hero Section Header -->
                <div class="px-6 py-4 border-b border-gray-200">
                    <h2 class="text-lg font-semibold text-cyan-600">Hero Section</h2>
                </div>

                <!-- List Pengajuan FlexyCazh Section -->
                <div class="px-6 py-4">
                    <!-- Section Header with Green Background -->
                    <div class="bg-teal-700 text-white px-4 py-3 rounded-t-lg flex items-center">
                        <span class="mr-2">📋</span>
                        <span class="font-medium">List Pengajuan FlexyCazh</span>
                    </div>

                    <!-- Table Container -->
                    <div class="border border-gray-200 rounded-b-lg overflow-hidden">
                        <!-- Table Header -->
                        <div class="bg-blue-50 border-b border-gray-200">
                            <div class="grid grid-cols-7 gap-4 px-4 py-3 text-sm font-medium text-gray-700">
                                <div class="text-center">No.</div>
                                <div>Nama Partner</div>
                                <div class="text-center">Jenis Partner</div>
                                <div>Nama PIC</div>
                                <div class="text-center">No. HP PIC</div>
                                <div>Kebutuhan</div>
                                <div>Kebutuhan Pendanaan</div>
                                <div class="text-center">Tenor</div>
                            </div>
                        </div>

                        <!-- Table Body -->
                        <div class="divide-y divide-gray-200">
                            <!-- Row 1 -->
                            <div class="grid grid-cols-7 gap-4 px-4 py-4 text-sm hover:bg-gray-50">
                                <div class="text-center font-medium">1.</div>
                                <div class="text-gray-900">Toyota Xpander</div>
                                <div class="text-center">1</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-900">085291888881</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                            </div>

                            <!-- Row 2 -->
                            <div class="grid grid-cols-7 gap-4 px-4 py-4 text-sm hover:bg-gray-50">
                                <div class="text-center font-medium">2.</div>
                                <div class="text-gray-900">Toyota Alphard</div>
                                <div class="text-center">1</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                            </div>

                            <!-- Row 3 -->
                            <div class="grid grid-cols-7 gap-4 px-4 py-4 text-sm hover:bg-gray-50">
                                <div class="text-center font-medium">3.</div>
                                <div class="text-gray-900">Daihatsu Ayla</div>
                                <div class="text-center">4</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                            </div>

                            <!-- Row 4 -->
                            <div class="grid grid-cols-7 gap-4 px-4 py-4 text-sm hover:bg-gray-50">
                                <div class="text-center font-medium">4.</div>
                                <div class="text-gray-900">Daihatsu Xenia</div>
                                <div class="text-center">3</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                            </div>

                            <!-- Row 5 -->
                            <div class="grid grid-cols-7 gap-4 px-4 py-4 text-sm hover:bg-gray-50">
                                <div class="text-center font-medium">5.</div>
                                <div class="text-gray-900">Hyundai Palisade</div>
                                <div class="text-center">1</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-gray-500">-</div>
                                <div class="text-center text-gray-500">-</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>


    <script>
        function toggleDropdown(dropdownId) {
            const dropdown = document.getElementById(dropdownId);
            const arrow = dropdown.previousElementSibling.querySelector('.dropdown-arrow');
            
            if (dropdown.classList.contains('hidden')) {
                dropdown.classList.remove('hidden');
                arrow.classList.add('rotate');
            } else {
                dropdown.classList.add('hidden');
                arrow.classList.remove('rotate');
            }
        }

          // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = document.querySelectorAll('[id$="-dropdown"]');
            const sidebar = document.getElementById('sidebar');
            const mainContent = document.querySelector('.main-content');
            

            const isClickInsideSidebar = sidebar && sidebar.contains(event.target);
            const isClickInsideMainContent = mainContent && mainContent.contains(event.target);
        
    
        dropdowns.forEach(dropdown => {
            const toggleButton = dropdown.previousElementSibling;
            const isClickOnToggle = toggleButton && toggleButton.contains(event.target);
            const isClickOnDropdownItem = dropdown.contains(event.target);
            
        
            if (!isClickOnToggle && !isClickOnDropdownItem && !isClickInsideMainContent) {
                if (!isClickInsideSidebar || (!toggleButton.contains(event.target) && !dropdown.contains(event.target))) {
                    dropdown.classList.add('hidden');
                    dropdown.previousElementSibling.querySelector('.dropdown-arrow').classList.remove('rotate');
                }
            }
        });
    });
    </script>
</body>
</html>