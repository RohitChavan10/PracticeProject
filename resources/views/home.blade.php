<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShipX | Shipping & Logistics</title>
    @vite('resources/css/app.css')
</head>
<body class="antialiased bg-gray-50 text-gray-900">

    <!-- Navbar -->
    <header class="absolute top-0 left-0 w-full z-20 bg-transparent">
        <div class="max-w-7xl mx-auto px-6 py-4 flex justify-between items-center">
            <div class="text-2xl font-bold text-white">ShipX</div>
            <nav class="hidden md:flex space-x-8 text-white font-medium">
                <a href="#" class="hover:text-blue-400">Home</a>
                <a href="#" class="hover:text-blue-400">About</a>
                <a href="#" class="hover:text-blue-400">Solutions</a>
                <a href="#" class="hover:text-blue-400">Blog</a>
            </nav>
            <a href="#" class="hidden md:inline-block bg-blue-600 text-white px-5 py-2 rounded-full font-semibold hover:bg-blue-700 transition">
                Get Started →
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section 
        class="relative h-screen flex flex-col justify-center items-center text-center bg-cover bg-center"
        style="background-image: url('{{ asset('images/hero.jpg') }}');"
    >
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>
        
        <div class="relative z-10 max-w-3xl px-6">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white leading-tight">
                STAY AHEAD <br> IN SHIPPING AND LOGISTICS
            </h1>
            <p class="mt-6 text-lg text-gray-200">
                Discover key insights and trends to enhance your shipping strategies and stay competitive.
            </p>

            <div class="mt-8 flex justify-center space-x-4">
                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition">
                    Contact us
                </a>
                <a href="#" class="bg-white hover:bg-gray-100 text-blue-600 px-6 py-3 rounded-full font-semibold transition">
                    ▶ Play video
                </a>
            </div>
        </div>

        <!-- Brand Logos -->
        <div class="absolute bottom-10 w-full flex justify-center space-x-6 opacity-90">
            <img src="{{ asset('images/logo1.png') }}" alt="Tata" class="h-8 grayscale hover:grayscale-0 transition">
            <img src="{{ asset('images/logo2.png') }}" alt="Lego" class="h-8 grayscale hover:grayscale-0 transition">
            <img src="{{ asset('images/logo3.png') }}" alt="Myntra" class="h-8 grayscale hover:grayscale-0 transition">
            <img src="{{ asset('images/logo4.png') }}" alt="H&M" class="h-8 grayscale hover:grayscale-0 transition">
            <img src="{{ asset('images/logo5.png') }}" alt="Adidas" class="h-8 grayscale hover:grayscale-0 transition">
        </div>
    </section>

    <!-- Features Section -->
    <section class="py-20 bg-white text-center">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-900">
                Built For Global Shipping
            </h2>
            <p class="mt-4 text-gray-600 max-w-2xl mx-auto">
                ShipX delivers smart and efficient logistics solutions to simplify global shipping for businesses.
            </p>

            <div class="mt-10 flex justify-center">
                <a href="#" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-full font-semibold transition">
                    Explore →
                </a>
            </div>
        </div>
    </section>

</body>
</html>
