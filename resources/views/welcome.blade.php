<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Calisfun - Selamat Datang!</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600&display=swap" rel="stylesheet" />
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.11.1/gsap.min.js"></script>
    <style>
        /* Custom scrollbars */
        ::-webkit-scrollbar {
            width: 8px;
        }
        ::-webkit-scrollbar-thumb {
            background-color: #4c9aff;
            border-radius: 4px;
        }

        /* Hover Effect */
        .hover-scale:hover {
            transform: scale(1.05);
            transition: transform 0.3s ease-in-out;
        }

        /* Animation for Hero Text */
        .hero-text {
            opacity: 0;
            transform: translateY(50px);
        }

        /* Background Color */
        body {
            background: linear-gradient(to right, #4c9aff, #5a8fe6); /* Biru gradien */
        }

        /* Animated Button */
        .hover-btn:hover {
            background-color: #ffcc00;
            transform: scale(1.05);
        }

        /* Custom Font for Child-like Vibe */
        .font-custom {
            font-family: 'Nunito', sans-serif;
        }

        /* SVG Styling */
        .icon-svg {
            height: 50px;
            width: 50px;
            fill: #f1c40f;
        }

        /* Sticky button fix */
        .sticky-btn {
            position: sticky;
            top: 0;
            z-index: 20;
        }

        /* Parallax Effect */
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-size: cover;
        }

        /* Smooth Scroll */
        html {
            scroll-behavior: smooth;
        }
    </style>
</head>
<body class="font-custom">

    <!-- Navbar -->
    <header class="w-full fixed top-0 left-0 z-10 p-6 bg-white shadow-md">
        <div class="max-w-7xl mx-auto flex justify-between items-center">
            <div class="text-3xl font-bold text-blue-600">
                <img src="{{ asset('assets/calisfun_logo.png') }}" alt="Logo Calisfun" width="125">
            </div>
            <nav class="space-x-4 text-lg">
                <a href="{{ route('login') }}" class="hover-btn px-6 py-3 rounded-full text-blue-600 font-semibold">Log in</a>
                <a href="{{ route('register') }}" class="hover-btn px-6 py-3 rounded-full text-blue-600 font-semibold">Register</a>
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="flex flex-col justify-center items-center h-screen bg-gradient-to-r from-blue-600 to-blue-700 relative parallax" style="background-image: url('https://via.placeholder.com/1500x1000');">
        <div class="absolute inset-0 bg-black opacity-40"></div>
        <div class="relative z-10 text-center p-6 hero-text">
            <h1 class="text-6xl font-extrabold text-white mb-6 leading-tight">Membantu Anak Belajar<br>Dengan Cara Menyenangkan!</h1>
            <p class="text-xl text-white mb-6">
                Calisfun adalah platform edukasi interaktif yang membuat belajar menjadi hal yang menyenangkan.
            </p>
            <a href="#features" class="bg-yellow-600 text-white py-3 px-8 rounded-full text-lg font-semibold hover:bg-yellow-500 hover:scale-105 transition-all duration-300 ease-in-out sticky-btn">
                Jelajahi Fitur Kami
            </a>
        </div>
    </section>

    <!-- Features Section -->
    <section id="features" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto text-center">
            <h2 class="text-4xl font-semibold mb-10 text-blue-700">Fitur Unggulan Calisfun</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                <!-- Feature 1 -->
                <div class="bg-yellow-100 p-8 rounded-xl shadow-lg hover:shadow-2xl hover-scale">
                    <div class="text-3xl mb-4 text-blue-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" viewBox="0 0 24 24"><path d="M12 2a10 10 0 1010 10A10 10 0 0012 2zm0 18a8 8 0 118-8 8 8 0 01-8 8z"/><path d="M12 6a1 1 0 11-1 1 1 1 0 011-1zM12 9a1 1 0 11-1 1 1 1 0 011-1zM12 12a1 1 0 11-1 1 1 1 0 011-1zM12 15a1 1 0 11-1 1 1 1 0 011-1zM12 18a1 1 0 11-1 1 1 1 0 011-1z"/></svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Hemat Waktu</h3>
                    <p class="text-lg text-gray-700">Bantu anak-anak belajar dengan efisien tanpa menghabiskan banyak waktu.</p>
                </div>
                <!-- Feature 2 -->
                <div class="bg-yellow-100 p-8 rounded-xl shadow-lg hover:shadow-2xl hover-scale">
                    <div class="text-3xl mb-4 text-purple-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" viewBox="0 0 24 24"><path d="M21 19a1 1 0 01-1 1h-4v-2h4a1 1 0 011 1zm-6 3h-5v-4h5zm0-6h-5V8h5zM5 7v4h5V7zm9 0h-5v4h5zM4 18h5v-4H4z"/></svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Kolaborasi Bersama Orang Tua</h3>
                    <p class="text-lg text-gray-700">Berbagi progress anak dengan orang tua untuk mendukung keberhasilan pembelajaran.</p>
                </div>
                <!-- Feature 3 -->
                <div class="bg-yellow-100 p-8 rounded-xl shadow-lg hover:shadow-2xl hover-scale">
                    <div class="text-3xl mb-4 text-green-600">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon-svg" viewBox="0 0 24 24"><path d="M7 4V3h10v1zm6 5H8V8h4zm0 5H8v-1h4zm0 5H8v-1h4zm3 5h-1V3h1z"/></svg>
                    </div>
                    <h3 class="text-2xl font-semibold mb-4">Fleksibel dan Dinamis</h3>
                    <p class="text-lg text-gray-700">Metode belajar yang dapat disesuaikan sesuai kebutuhan anak-anak.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer id="contact" class="bg-gray-800 text-white py-8">
        <div class="max-w-7xl mx-auto text-center">
            <p>&copy; 2025 Calisfun. Semua hak cipta dilindungi.</p>
        </div>
    </footer>

    <script>
        // GSAP Scroll Animation for Hero Text
        gsap.to('.hero-text', {
            opacity: 1,
            transform: 'translateY(0)',
            duration: 1,
            delay: 0.5,
            ease: 'power2.out',
        });
    </script>
</body>
</html>
