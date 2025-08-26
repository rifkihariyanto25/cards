<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FlexyCazh - Solusi Pembiayaan Digital</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap');
        body { font-family: 'Inter', sans-serif; }
        
        /* Custom animations */
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }
        
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-fadeInUp { animation: fadeInUp 0.8s ease-out forwards; }
        .animate-slideIn { animation: slideIn 0.6s ease-out forwards; }
        
        /* Glass morphism effect */
        .glass {
            backdrop-filter: blur(16px) saturate(180%);
            background: rgba(255, 255, 255, 0.95);
            border: 1px solid rgba(255, 255, 255, 0.125);
        }
        
        /* Gradient backgrounds */
        .gradient-bg {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        }
        
        .gradient-cyan {
            background: linear-gradient(135deg, #00718F 0%, #60CEC9 100%);
        }
        
        /* Custom scrollbar */
        ::-webkit-scrollbar { width: 8px; }
        ::-webkit-scrollbar-track { background: #f1f1f1; }
        ::-webkit-scrollbar-thumb { background: #00718F; border-radius: 4px; }
    </style>
</head>
<body class="bg-gray-50">
    <!-- Navigation -->
    <!-- Include Navbar Component -->
    <x-user.navbar />

    <section id="home" class="relative min-h-screen flex items-center justify-center gradient-cyan overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="absolute top-20 left-10 w-72 h-72 bg-white/10 rounded-full blur-3xl animate-float"></div>
            <div class="absolute bottom-20 right-10 w-96 h-96 bg-blue-400/10 rounded-full blur-3xl animate-float" style="animation-delay: -3s;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 py-32">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="text-white space-y-8 animate-fadeInUp">
                    <div class="space-y-6">
                        <div class="inline-flex items-center bg-white/20 backdrop-blur-sm rounded-full px-4 py-2 text-sm font-medium">
                            <i class="fas fa-star text-yellow-300 mr-2"></i>
                            Trusted Financial Solution
                        </div>
                        <h1 class="text-5xl lg:text-7xl font-bold leading-tight">
                            FlexyCazh
                            <span class="block text-3xl lg:text-4xl font-normal text-white/90 mt-4">
                                Solusi Pembiayaan Digital untuk Sekolah
                            </span>
                        </h1>
                        <p class="text-xl text-white/90 leading-relaxed max-w-2xl">
                            Dapatkan pendanaan cepat untuk kebutuhan operasional sekolah dengan bunga kompetitif dan proses yang mudah melalui platform terintegrasi CARDS.
                        </p>
                    </div>
                    
                    <div class="flex flex-col sm:flex-row gap-4">
                        <a href="#contact" class="inline-flex items-center justify-center bg-white text-cyan-600 px-8 py-4 rounded-2xl font-semibold hover:bg-gray-100 transition-all duration-300 transform hover:scale-105 hover:shadow-xl">
                            <i class="fas fa-rocket mr-3"></i>
                            Mulai Sekarang
                        </a>
                        <a href="#features" class="inline-flex items-center justify-center border-2 border-white text-white px-8 py-4 rounded-2xl font-semibold hover:bg-white hover:text-cyan-600 transition-all duration-300">
                            <i class="fas fa-play mr-3"></i>
                            Pelajari Lebih Lanjut
                        </a>
                    </div>

                    <div class="grid grid-cols-3 gap-8 pt-8">
                        <div class="text-center">
                            <div class="text-3xl font-bold">500+</div>
                            <div class="text-white/80 text-sm">Partner Aktif</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">24 Jam</div>
                            <div class="text-white/80 text-sm">Pencairan Dana</div>
                        </div>
                        <div class="text-center">
                            <div class="text-3xl font-bold">99.9%</div>
                            <div class="text-white/80 text-sm">Uptime</div>
                        </div>
                    </div>
                </div>

                <div class="relative animate-fadeInUp" style="animation-delay: 0.3s;">
                    <div class="relative">
                        <div class="bg-white/20 backdrop-blur-sm rounded-3xl p-8 border border-white/30 shadow-2xl">
                            <div class="bg-white rounded-2xl p-6 shadow-xl">
                                <div class="flex items-center justify-between mb-6">
                                    <div class="flex items-center space-x-3">
                                        <div class="w-8 h-8 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-coins text-white text-sm"></i>
                                        </div>
                                        <span class="font-bold text-gray-800">FlexyCazh</span>
                                    </div>
                                    <div class="flex space-x-1">
                                        <div class="w-3 h-3 bg-red-400 rounded-full"></div>
                                        <div class="w-3 h-3 bg-yellow-400 rounded-full"></div>
                                        <div class="w-3 h-3 bg-green-400 rounded-full"></div>
                                    </div>
                                </div>
                                
                                <div class="space-y-4">
                                    <div class="bg-gradient-to-r from-cyan-50 to-blue-50 p-4 rounded-xl">
                                        <div class="flex justify-between items-center mb-2">
                                            <span class="text-gray-600 text-sm">Available Credit</span>
                                            <i class="fas fa-arrow-up text-green-500"></i>
                                        </div>
                                        <div class="text-2xl font-bold text-gray-800">Rp 500,000,000</div>
                                    </div>
                                    
                                    <div class="grid grid-cols-2 gap-3">
                                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                                            <div class="text-lg font-semibold text-gray-800">3-12</div>
                                            <div class="text-xs text-gray-600">Bulan Tenor</div>
                                        </div>
                                        <div class="bg-gray-50 p-3 rounded-lg text-center">
                                            <div class="text-lg font-semibold text-gray-800">0.8%</div>
                                            <div class="text-xs text-gray-600">Bunga/Bulan</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="absolute -top-6 -right-6 w-16 h-16 bg-yellow-400 rounded-2xl flex items-center justify-center shadow-xl animate-float">
                            <i class="fas fa-bolt text-white text-xl"></i>
                        </div>
                        <div class="absolute -bottom-6 -left-6 w-16 h-16 bg-green-400 rounded-2xl flex items-center justify-center shadow-xl animate-float" style="animation-delay: -2s;">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="features" class="py-32 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <div class="inline-flex items-center bg-cyan-50 text-cyan-600 px-4 py-2 rounded-full text-sm font-medium mb-6">
                    <i class="fas fa-gem mr-2"></i>
                    Premium Features
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-gray-900 mb-6">
                    Fitur Unggulan <span class="text-cyan-600">FlexyCazh</span>
                </h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                    Solusi pembiayaan yang dirancang khusus untuk memenuhi kebutuhan finansial sekolah dan institusi pendidikan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-cyan-200 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-cyan-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-bolt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Pendanaan Instan</h3>
                    <p class="text-gray-600 leading-relaxed">Proses pengajuan yang simpel dengan pencairan dana dalam 24 jam setelah persetujuan.</p>
                    <div class="mt-6 text-cyan-600 font-medium flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-cyan-200 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-green-500 to-emerald-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-percentage text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Bunga Kompetitif</h3>
                    <p class="text-gray-600 leading-relaxed">Suku bunga mulai dari 0.8% per bulan dengan perhitungan yang transparan dan kompetitif.</p>
                    <div class="mt-6 text-cyan-600 font-medium flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-cyan-200 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-purple-500 to-pink-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-calendar-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Tenor Fleksibel</h3>
                    <p class="text-gray-600 leading-relaxed">Pilih tenor pembayaran dari 3-12 bulan sesuai dengan kemampuan cash flow sekolah.</p>
                    <div class="mt-6 text-cyan-600 font-medium flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-cyan-200 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-link text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Integrasi Seamless</h3>
                    <p class="text-gray-600 leading-relaxed">Terintegrasi langsung dengan sistem CARDS untuk monitoring dan pelaporan yang real-time.</p>
                    <div class="mt-6 text-cyan-600 font-medium flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-cyan-200 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-teal-500 to-cyan-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-shield-alt text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Keamanan Terjamin</h3>
                    <p class="text-gray-600 leading-relaxed">Sistem keamanan berlapis dengan enkripsi end-to-end untuk melindungi data finansial.</p>
                    <div class="mt-6 text-cyan-600 font-medium flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>

                <div class="group bg-white p-8 rounded-3xl shadow-lg hover:shadow-2xl transition-all duration-500 border border-gray-100 hover:border-cyan-200 hover:-translate-y-2">
                    <div class="w-16 h-16 bg-gradient-to-r from-indigo-500 to-blue-600 rounded-2xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas fa-chart-line text-white text-2xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">Analytics Dashboard</h3>
                    <p class="text-gray-600 leading-relaxed">Dashboard komprehensif untuk tracking status pengajuan, pembayaran, dan laporan keuangan.</p>
                    <div class="mt-6 text-cyan-600 font-medium flex items-center group-hover:translate-x-2 transition-transform duration-300">
                        Learn more <i class="fas fa-arrow-right ml-2"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="process" class="py-32 gradient-cyan">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-20">
                <div class="inline-flex items-center bg-white/20 backdrop-blur-sm text-white px-4 py-2 rounded-full text-sm font-medium mb-6">
                    <i class="fas fa-route mr-2"></i>
                    Simple Process
                </div>
                <h2 class="text-4xl lg:text-5xl font-bold text-white mb-6">
                    Cara Mudah Mendapatkan <span class="text-yellow-300">FlexyCazh</span>
                </h2>
                <p class="text-xl text-white/90 max-w-3xl mx-auto">
                    Tiga langkah mudah untuk mendapatkan pembiayaan yang Anda butuhkan
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="relative group">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-500">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-3xl font-bold text-cyan-600">1</span>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4">Menjadi Partner CARDS</h3>
                            <p class="text-white/80 leading-relaxed">
                                Daftarkan sekolah Anda sebagai partner resmi CARDS untuk mengakses berbagai layanan digital pendidikan.
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:block absolute top-1/2 -right-4 w-8 h-0.5 bg-white/30"></div>
                </div>

                <div class="relative group">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-500">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-3xl font-bold text-cyan-600">2</span>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4">Bangun Track Record</h3>
                            <p class="text-white/80 leading-relaxed">
                                Lakukan transaksi minimal 3 bulan untuk membangun reputasi dan riwayat keuangan yang baik.
                            </p>
                        </div>
                    </div>
                    <div class="hidden md:block absolute top-1/2 -right-4 w-8 h-0.5 bg-white/30"></div>
                </div>

                <div class="relative group">
                    <div class="bg-white/10 backdrop-blur-sm rounded-3xl p-8 border border-white/20 hover:bg-white/20 transition-all duration-500">
                        <div class="text-center">
                            <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform duration-300">
                                <span class="text-3xl font-bold text-cyan-600">3</span>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4">Ajukan FlexyCazh</h3>
                            <p class="text-white/80 leading-relaxed">
                                Ajukan permohonan pembiayaan melalui form online dan nikmati kemudahan akses dana.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="py-32 bg-gradient-to-br from-gray-50 to-white">
        <div class="max-w-6xl mx-auto px-6">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
                <div class="order-2 lg:order-1">
                    <div class="bg-white rounded-3xl shadow-2xl p-10 border border-gray-100">
                        <div class="text-center mb-8">
                            <div class="inline-flex items-center bg-cyan-50 text-cyan-600 px-4 py-2 rounded-full text-sm font-medium mb-4">
                                <i class="fas fa-paper-plane mr-2"></i>
                                Quick Application
                            </div>
                            <h2 class="text-3xl font-bold text-gray-900 mb-3">
                                Ajukan <span class="text-cyan-600">FlexyCazh</span>
                            </h2>
                            <p class="text-gray-600">Lengkapi formulir ini dan tim kami akan menghubungi Anda dalam 24 jam</p>
                        </div>

                        <form class="space-y-6" onsubmit="handleFormSubmit(event)">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        <i class="fas fa-school mr-2 text-cyan-500"></i>Nama Partner
                                    </label>
                                    <input 
                                        type="text" 
                                        name="nama_partner" 
                                        required 
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50 transition-all duration-300 bg-gray-50 focus:bg-white"
                                        placeholder="Contoh: SD Negeri 1 Jakarta"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        <i class="fas fa-building mr-2 text-cyan-500"></i>Jenis Partner
                                    </label>
                                    <select 
                                        name="jenis_partner" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50 transition-all duration-300 bg-gray-50 focus:bg-white"
                                    >
                                        <option value="">Pilih Jenis Partner</option>
                                        <option value="Sekolah">Sekolah</option>
                                        <option value="Klinik">Klinik</option>
                                        <option value="Perusahaan">Perusahaan</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        <i class="fas fa-user mr-2 text-cyan-500"></i>Nama PIC
                                    </label>
                                    <input 
                                        type="text" 
                                        name="nama_pic" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50 transition-all duration-300 bg-gray-50 focus:bg-white"
                                        placeholder="Nama Penanggung Jawab"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        <i class="fas fa-phone mr-2 text-cyan-500"></i>Nomor HP PIC
                                    </label>
                                    <input 
                                        type="tel" 
                                        name="no_hp_pic" required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50 transition-all duration-300 bg-gray-50 focus:bg-white"
                                        placeholder="08xxxxxxxxxx"
                                        pattern="[0-9]{10,13}"
                                    />
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        <i class="fas fa-clipboard-list mr-2 text-cyan-500"></i>Kebutuhan
                                    </label>
                                    <select 
                                        name="kebutuhan" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50 transition-all duration-300 bg-gray-50 focus:bg-white"
                                    >
                                        <option value="">Pilih Kebutuhan</option>
                                        <option value="Kebutuhan Pendanaan">Kebutuhan Pendanaan</option>
                                        <option value="Modal Kerja">Modal Kerja</option>
                                        <option value="Operasional Sekolah">Operasional Sekolah</option>
                                        <option value="Renovasi Fasilitas">Renovasi Fasilitas</option>
                                    </select>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        <i class="fas fa-money-bill-wave mr-2 text-cyan-500"></i>Nominal (Rp)
                                    </label>
                                    <input 
                                        type="text" name="kebutuhan_pendanaan" required
                                        min="1000000"
                                        max="1000000000"
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50 transition-all duration-300 bg-gray-50 focus:bg-white"
                                        placeholder="50000000"
                                        onkeyup="formatCurrency(this); calculateInstallment()"
                                    />
                                    <p class="text-xs text-gray-500">Minimum Rp 1.000.000 - Maximum Rp 1.000.000.000</p>
                                </div>

                                <div class="space-y-2">
                                    <label class="block text-sm font-semibold text-gray-700">
                                        <i class="fas fa-calendar-check mr-2 text-cyan-500"></i>Tenor
                                    </label>
                                    <select 
                                        name="tenor" 
                                        required
                                        class="w-full px-4 py-3 rounded-xl border border-gray-200 focus:border-cyan-500 focus:ring-4 focus:ring-cyan-50 transition-all duration-300 bg-gray-50 focus:bg-white"
                                        onchange="calculateInstallment()"
                                    >
                                        <option value="">Pilih Tenor</option>
                                        <option value="3 Bulan">3 Bulan</option>
                                        <option value="6 Bulan">6 Bulan</option>
                                        <option value="12 Bulan">12 Bulan</option>
                                    </select>
                                </div>
                            </div>

                            <div id="estimation-card" class="hidden bg-gradient-to-r from-cyan-50 to-blue-50 rounded-2xl p-6 border border-cyan-100">
                                <h4 class="font-semibold text-gray-800 mb-3 flex items-center">
                                    <i class="fas fa-calculator mr-2 text-cyan-500"></i>
                                    Estimasi Cicilan
                                </h4>
                                <div class="grid grid-cols-2 gap-4">
                                    <div>
                                        <p class="text-sm text-gray-600">Cicilan per Bulan</p>
                                        <p id="monthly-payment" class="text-2xl font-bold text-cyan-600">-</p>
                                    </div>
                                    <div>
                                        <p class="text-sm text-gray-600">Total Bunga</p>
                                        <p id="total-interest" class="text-lg font-semibold text-gray-800">-</p>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-3">*Estimasi berdasarkan suku bunga 0.8% per bulan</p>
                            </div>

                            <div class="pt-4">
                                <button 
                                    type="submit"
                                    class="w-full bg-gradient-to-r from-cyan-500 to-blue-600 text-white py-4 rounded-2xl font-semibold hover:shadow-2xl transition-all duration-300 transform hover:scale-[1.02] flex items-center justify-center"
                                    id="submit-btn"
                                >
                                    <i class="fas fa-paper-plane mr-3"></i>
                                    <span>Kirim Pengajuan</span>
                                </button>
                            </div>

                            <div class="text-center">
                                <p class="text-sm text-gray-500">
                                    Dengan mengirim formulir ini, Anda menyetujui 
                                    <a href="#" class="text-cyan-600 hover:underline">Syarat & Ketentuan</a> 
                                    dan 
                                    <a href="#" class="text-cyan-600 hover:underline">Kebijakan Privasi</a>
                                </p>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="order-1 lg:order-2">
                    <div class="relative">
                        <div class="bg-gradient-to-br from-cyan-100 to-blue-100 rounded-3xl p-8 text-center">
                            <div class="w-64 h-64 mx-auto bg-white rounded-3xl shadow-2xl flex items-center justify-center mb-8">
                                <div class="text-center">
                                    <i class="fas fa-handshake text-6xl text-cyan-500 mb-4"></i>
                                    <h3 class="text-xl font-bold text-gray-800">Partnership</h3>
                                    <p class="text-gray-600">Trusted Financial Solution</p>
                                </div>
                            </div>
                            
                            <div class="space-y-4">
                                <div class="flex items-center justify-center space-x-3 bg-white/50 rounded-full px-6 py-3">
                                    <i class="fas fa-check-circle text-green-500"></i>
                                    <span class="font-medium text-gray-700">Proses Cepat 24 Jam</span>
                                </div>
                                <div class="flex items-center justify-center space-x-3 bg-white/50 rounded-full px-6 py-3">
                                    <i class="fas fa-check-circle text-green-500"></i>
                                    <span class="font-medium text-gray-700">Bunga Kompetitif 0.8%</span>
                                </div>
                                <div class="flex items-center justify-center space-x-3 bg-white/50 rounded-full px-6 py-3">
                                    <i class="fas fa-check-circle text-green-500"></i>
                                    <span class="font-medium text-gray-700">Tanpa Jaminan Fisik</span>
                                </div>
                            </div>
                        </div>

                        <div class="absolute -top-4 -left-4 w-16 h-16 bg-yellow-400 rounded-2xl flex items-center justify-center shadow-xl animate-float">
                            <i class="fas fa-star text-white text-xl"></i>
                        </div>
                        <div class="absolute -bottom-4 -right-4 w-16 h-16 bg-green-400 rounded-2xl flex items-center justify-center shadow-xl animate-float" style="animation-delay: -2s;">
                            <i class="fas fa-shield-alt text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div id="success-modal" class="hidden fixed inset-0 bg-black/50 backdrop-blur-sm z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-3xl p-8 max-w-md w-full mx-4 text-center transform scale-95 opacity-0 transition-all duration-300" id="modal-content">
            <div class="w-20 h-20 bg-green-100 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-check text-3xl text-green-500"></i>
            </div>
            <h3 class="text-2xl font-bold text-gray-900 mb-4">Pengajuan Berhasil!</h3>
            <p class="text-gray-600 mb-8">Terima kasih atas pengajuan Anda. Tim kami akan menghubungi Anda dalam 24 jam ke depan.</p>
            <button onclick="closeModal()" class="bg-gradient-to-r from-cyan-500 to-blue-600 text-white px-8 py-3 rounded-2xl hover:shadow-lg transition-all duration-300">
                Tutup
            </button>
        </div>
    </div>

     <!-- Include Footer Component -->
    <x-user.footer />

    <script>
        // Mobile Menu Toggle
        function toggleMenu() {
            const menu = document.getElementById('mobile-menu');
            const line1 = document.getElementById('line1');
            const line2 = document.getElementById('line2');
            const line3 = document.getElementById('line3');
            
            menu.classList.toggle('hidden');
            
            // Animate hamburger to X
            if (!menu.classList.contains('hidden')) {
                line1.classList.add('rotate-45', 'translate-y-1.5');
                line2.classList.add('opacity-0');
                line3.classList.add('-rotate-45', '-translate-y-1.5');
                
                // Hide mobile product dropdown when closing menu
                const mobileProductDropdown = document.getElementById('mobile-product-dropdown');
                if (mobileProductDropdown) {
                    mobileProductDropdown.classList.add('hidden');
                }
                
                // Reset icon rotation
                const mobileDropdownIcon = document.getElementById('mobile-dropdown-icon');
                if (mobileDropdownIcon) {
                    mobileDropdownIcon.classList.remove('rotate-180');
                }
            } else {
                line1.classList.remove('rotate-45', 'translate-y-1.5');
                line2.classList.remove('opacity-0');
                line3.classList.remove('-rotate-45', '-translate-y-1.5');
            }
        }
        
        // Mobile Product Dropdown Toggle
        function toggleMobileProductDropdown() {
            const dropdown = document.getElementById('mobile-product-dropdown');
            const icon = document.getElementById('mobile-dropdown-icon');
            
            dropdown.classList.toggle('hidden');
            icon.classList.toggle('rotate-180');
        }

        // Currency Formatting
        function formatCurrency(input) {
            let value = input.value.replace(/\D/g, '');
            // Simpan nilai angka murni ke dalam data-attribute
            input.dataset.value = value; 
            if (value) {
                input.value = new Intl.NumberFormat('id-ID').format(value);
            }
        }

        // Calculate Installment
        function calculateInstallment() {
            // DIUBAH: Menggunakan selector yang sudah diperbaiki
            const nominalInput = document.querySelector('input[name="kebutuhan_pendanaan"]');
            const nominal = nominalInput.dataset.value || nominalInput.value.replace(/\D/g, ''); // Ambil nilai murni
            const tenor = document.querySelector('select[name="tenor"]').value;
            
            if (nominal && tenor) {
                const principal = parseInt(nominal);
                const months = parseInt(tenor.split(' ')[0]);
                const monthlyRate = 0.008; // 0.8% per month
                
                // Calculate monthly payment
                const monthlyPayment = principal * (monthlyRate * Math.pow(1 + monthlyRate, months)) / (Math.pow(1 + monthlyRate, months) - 1);
                const totalInterest = (monthlyPayment * months) - principal;
                
                document.getElementById('monthly-payment').textContent = 'Rp ' + Math.round(monthlyPayment).toLocaleString('id-ID');
                document.getElementById('total-interest').textContent = 'Rp ' + Math.round(totalInterest).toLocaleString('id-ID');
                document.getElementById('estimation-card').classList.remove('hidden');
            }
        }

        // Form Submission Handler
        function handleFormSubmit(event) {
            event.preventDefault();
            
            const submitBtn = document.getElementById('submit-btn');
            const originalContent = submitBtn.innerHTML;
            const form = event.target;
            
            // Show loading state
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-3"></i>Mengirim...';
            submitBtn.disabled = true;
            
            // Mengumpulkan data form
            const formData = new FormData(form);
            
            // Mengambil nilai angka murni dari input nominal dan menimpanya di FormData
            const nominalInput = form.querySelector('[name="kebutuhan_pendanaan"]');
            const rawNominal = nominalInput.dataset.value || nominalInput.value.replace(/\D/g, '');
            formData.set('kebutuhan_pendanaan', rawNominal);

            // (Opsional) Tampilkan data yang akan dikirim di console
            console.log('Data yang akan dikirim:');
            for (let [key, value] of formData.entries()) {
                console.log(key, value);
            }

            // Simulate API call (Ganti bagian ini dengan fetch() untuk mengirim ke backend)
            setTimeout(() => {
                showSuccessModal();
                submitBtn.innerHTML = originalContent;
                submitBtn.disabled = false;
                form.reset();
                document.getElementById('estimation-card').classList.add('hidden');
            }, 2000);
        }

        // Show Success Modal
        function showSuccessModal() {
            const modal = document.getElementById('success-modal');
            const modalContent = document.getElementById('modal-content');
            
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalContent.classList.remove('scale-95', 'opacity-0');
                modalContent.classList.add('scale-100', 'opacity-100');
            }, 10);
        }

        // Close Modal
        function closeModal() {
            const modal = document.getElementById('success-modal');
            const modalContent = document.getElementById('modal-content');
            
            modalContent.classList.remove('scale-100', 'opacity-100');
            modalContent.classList.add('scale-95', 'opacity-0');
            
            setTimeout(() => {
                modal.classList.add('hidden');
            }, 300);
        }

        // Close modal when clicking outside
        document.getElementById('success-modal').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Smooth Scrolling
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar Scroll Effect
        window.addEventListener('scroll', function() {
            const navbar = document.getElementById('navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('bg-white/95');
                navbar.classList.remove('glass');
            } else {
                navbar.classList.remove('bg-white/95');
                navbar.classList.add('glass');
            }
        });
        
        // Dropdown functions
        function toggleDropdown() {
            const dropdown = document.getElementById('product-dropdown');
            dropdown.classList.toggle('hidden');
        }
        
        // Close dropdowns when clicking outside
        document.addEventListener('click', function(event) {
            const dropdowns = ['product-dropdown', 'mobile-product-dropdown'];
            const buttons = ['product-dropdown-wrapper', 'mobile-product-dropdown-button'];
            
            dropdowns.forEach(dropdownId => {
                const dropdown = document.getElementById(dropdownId);
                const isClickInsideDropdown = dropdown && dropdown.contains(event.target);
                
                let isClickOnButton = false;
                buttons.forEach(buttonId => {
                    const button = document.getElementById(buttonId);
                    if (button && button.contains(event.target)) {
                        isClickOnButton = true;
                    }
                });
                
                if (dropdown && !isClickInsideDropdown && !isClickOnButton) {
                    dropdown.classList.add('hidden');
                    
                    // Reset icon rotation for mobile
                    if (dropdownId === 'mobile-product-dropdown') {
                        const icon = document.getElementById('mobile-dropdown-icon');
                        if (icon) icon.classList.remove('rotate-180');
                    }
                }
            });
        });

        // Add scroll-triggered animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver(function(entries) {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-fadeInUp');
                }
            });
        }, observerOptions);

        // Observe all sections
        document.querySelectorAll('section').forEach(section => {
            observer.observe(section);
        });
    </script>
</body>
</html>