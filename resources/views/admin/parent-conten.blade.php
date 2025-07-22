<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Cards Admin - Parents Content Management')</title>
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
        .section-card {
            background: white;
            border-radius: 12px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }
        .status-badge {
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        .status-active {
            background-color: #D1FAE5;
            color: #065F46;
        }
        .btn-primary {
            background-color: #00718f;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.2s;
        }
        .btn-primary:hover {
            background-color: #0F5F5F;
        }
        .btn-secondary {
            background-color: #F3F4F6;
            color: #6B7280;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.2s;
        }
        .btn-secondary:hover {
            background-color: #E5E7EB;
        }
        .input-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 14px;
            transition: all 0.2s;
        }
        .input-field:focus {
            outline: none;
            border-color: #00718f;
            box-shadow: 0 0 0 3px rgba(27, 122, 122, 0.1);
        }
        .textarea-field {
            width: 100%;
            padding: 12px;
            border: 1px solid #D1D5DB;
            border-radius: 8px;
            font-size: 14px;
            resize: vertical;
            min-height: 100px;
            transition: all 0.2s;
        }
        .textarea-field:focus {
            outline: none;
            border-color: #00718f;
            box-shadow: 0 0 0 3px rgba(27, 122, 122, 0.1);
        }
        .image-upload-area {
            border: 2px dashed #D1D5DB;
            border-radius: 8px;
            padding: 40px;
            text-align: center;
            transition: all 0.2s;
            cursor: pointer;
        }
        .image-upload-area:hover {
            border-color: #00718f;
            background-color: #F8FFFE;
        }
        .color-picker {
            width: 60px;
            height: 40px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .table-responsive {
            overflow-x: auto;
        }
        .table-custom {
            width: 100%;
            border-collapse: collapse;
        }
        .table-custom th,
        .table-custom td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #E5E7EB;
        }
        .table-custom th {
            background-color: #F9FAFB;
            font-weight: 600;
            color: #374151;
        }
        .table-custom tr:hover {
            background-color: #F9FAFB;
        }
        .action-btn {
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            margin-right: 4px;
            text-decoration: none;
            display: inline-block;
            transition: all 0.2s;
        }
        .action-btn-edit {
            background-color: #3B82F6;
            color: white;
        }
        .action-btn-edit:hover {
            background-color: #2563EB;
        }
        .action-btn-delete {
            background-color: #EF4444;
            color: white;
        }
        .action-btn-delete:hover {
            background-color: #DC2626;
        }
        .btn-add {
            background-color: #00718f;
            color: white;
            padding: 10px 20px;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-add:hover {
            background-color: #0F5F5F;
        }
        .btn-back {
            background-color: #6B7280;
            color: white;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            transition: all 0.2s;
            text-decoration: none;
            display: inline-block;
        }
        .btn-back:hover {
            background-color: #4B5563;
        }
    </style>
    @yield('extra-css')
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
                            <div class="w-6 h-6 bg-white rounded mr-4"></div>
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
                            <svg class="w-4 h-4 dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="edu-dropdown" class="hidden ml-12 mt-2 space-y-1">
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
                            <svg class="w-4 h-4 dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="canteen-dropdown" class="hidden ml-12 mt-2 space-y-1">
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
                            <svg class="w-4 h-4 dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="school-dropdown" class="hidden ml-12 mt-2 space-y-1">
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
                            <svg class="w-4 h-4 dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="parents-dropdown" class="hidden ml-12 mt-2 space-y-1">
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
                            <svg class="w-4 h-4 dropdown-arrow" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        <ul id="flexycazh-dropdown" class="hidden ml-12 mt-2 space-y-1">
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
                    <h1 class="text-xl font-semibold text-cards-teal">@yield('page-title', 'Cards Parents - Content Management')</h1>
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

            <!-- Content Area -->
            <div class="p-6">
                @yield('content')
            </div>
        </div>
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
            dropdowns.forEach(dropdown => {
                if (!dropdown.contains(event.target) && !dropdown.previousElementSibling.contains(event.target)) {
                    dropdown.classList.add('hidden');
                    dropdown.previousElementSibling.querySelector('.dropdown-arrow').classList.remove('rotate');
                }
            });
        });

        // Image upload preview functionality
        function setupImageUpload(inputId, previewContainer) {
            const input = document.getElementById(inputId);
            if (input) {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        const reader = new FileReader();
                        reader.onload = function(e) {
                            previewContainer.innerHTML = `<img src="${e.target.result}" alt="Preview" class="max-w-full max-h-32 rounded-lg">`;
                        };
                        reader.readAsDataURL(file);
                    }
                });
            }
        }

        // Form submission handlers
        document.addEventListener('DOMContentLoaded', function() {
            // Setup image upload previews
            const imageInputs = document.querySelectorAll('input[type="file"]');
            imageInputs.forEach(input => {
                const container = input.closest('.image-upload-area');
                if (container) {
                    setupImageUpload(input.id, container);
                }
            });

            // Form submission handlers
            document.querySelectorAll('.btn-primary').forEach(button => {
                button.addEventListener('click', function(e) {
                    if (this.type !== 'submit') {
                        e.preventDefault();
                        // Add your form submission logic here
                        console.log('Form submitted');
                        
                        // Show success message
                        showSuccessMessage('Changes saved successfully!');
                    }
                });
            });
        });

        // Show success message
        function showSuccessMessage(message) {
            const successMessage = document.createElement('div');
            successMessage.className = 'fixed top-4 right-4 bg-green-500 text-white px-6 py-3 rounded-lg shadow-lg z-50';
            successMessage.textContent = message;
            document.body.appendChild(successMessage);
            
            setTimeout(() => {
                successMessage.remove();
            }, 3000);
        }

        // Confirm delete
        function confirmDelete(message = 'Are you sure you want to delete this item?') {
            return confirm(message);
        }
    </script>
    @yield('extra-js')
</body>
</html>