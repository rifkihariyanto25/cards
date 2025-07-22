<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cards Admin - Login</title>
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
        .shadow-cards {
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }
        .input-focus:focus {
            outline: none;
            border-color: #1B7A7A;
            box-shadow: 0 0 0 3px rgba(27, 122, 122, 0.1);
        }
    </style>
</head>
<body class="bg-cards-teal min-h-screen flex items-center justify-center">
    <!-- Main Container -->
    <div class="w-full max-w-md">

    <!-- Logo di pojok kiri atas -->
        <div class="absolute top-6 left-6 flex items-center space-x-2">
            <img src="{{ asset('logoCards.png') }}" alt="Cards Logo" class="w-125 h-120 object-contain">
        </div>
        <!-- Logo -->
        <div class="flex justify-start mb-6">
            <div class="flex items-center">
                <span class="text-white text-2xl font-bold">Cards</span>
                <span class="text-white text-sm font-normal ml-1">ADMIN</span>
            </div>
        </div>

        <!-- Login Form -->
        <div class="bg-white rounded-3xl p-8 shadow-cards">
            <h1 class="text-cards-teal text-2xl font-semibold mb-8">Selamat Datang</h1>
            
            <form method="POST" action="{{ route('admin.login') }}">
                @csrf
                
                <!-- Username Field -->
                <div class="mb-6">
                    <input 
                        type="text" 
                        name="username" 
                        id="username"
                        placeholder="Username"
                        class="w-full px-4 py-4 bg-gray-100 border border-gray-200 rounded-xl text-gray-700 placeholder-gray-500 input-focus transition-all duration-200"
                        value="{{ old('username') }}"
                        required
                    >
                    @error('username')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Password Field -->
                <div class="mb-8">
                    <input 
                        type="password" 
                        name="password" 
                        id="password"
                        placeholder="Password"
                        class="w-full px-4 py-4 bg-gray-100 border border-gray-200 rounded-xl text-gray-700 placeholder-gray-500 input-focus transition-all duration-200"
                        required
                    >
                    @error('password')
                        <span class="text-red-500 text-sm mt-1">{{ $message }}</span>
                    @enderror
                </div>

                <!-- Login Button -->
                <button 
                    type="submit" 
                    class="w-full bg-cards-orange hover-cards-orange text-white font-semibold py-4 rounded-xl transition-all duration-200 transform hover:scale-105 focus:outline-none focus:ring-4 focus:ring-orange-200"
                >
                    LOGIN
                </button>
            </form>

            <!-- Error Messages -->
            @if (session('error'))
                <div class="mt-4 p-3 bg-red-100 border border-red-300 text-red-700 rounded-lg">
                    {{ session('error') }}
                </div>
            @endif
        </div>
    </div>
</body>
</html>