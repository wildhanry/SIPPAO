<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title>SIPPAO</title>
</head>

<body class="bg-gray-50 text-gray-800 font-sans">
    <!-- Header -->
    <header x-data="{ open: false }"
        class="sticky top-0 z-50 flex flex-wrap justify-between items-center h-auto px-6 py-4 bg-white shadow-lg">
        <!-- Logo -->
        <div class="flex items-center space-x-4">
            <img src="{{ asset('image/logo.png') }}" alt="Logo"
                class="w-14 h-14 border-black border-2 object-contain rounded-full">
            <div class="text-2xl font-bold text-gray-800">SIPPAO</div>
        </div>

        <!-- Hamburger Menu -->
        <button @click="open = !open" class="md:hidden">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                    stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>

        <!-- Desktop Menu -->
        <nav class="hidden md:flex md:space-x-6">
            @auth
                @if (Auth::user()->usertype == 'admin')
                    <a href="{{ route('admin.dashboard') }}"
                        class="text-gray-700 font-semibold hover:text-blue-500">Dashboard</a>
                @elseif (Auth::user()->usertype == 'user')
                    <a href="{{ route('dashboard') }}" class="text-gray-700 font-semibold hover:text-blue-500">Dashboard</a>
                @endif
                <form action="{{ route('logout') }}" method="POST" class="inline">
                    @csrf
                    <button type="submit" class="text-gray-700 font-semibold hover:text-red-500">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-700 font-semibold hover:text-blue-500">Login</a>
                <a href="{{ route('register') }}" class="text-gray-700 font-semibold hover:text-blue-500">Register</a>
            @endauth
        </nav>

        <!-- Mobile Menu -->
        <div :class="{ 'block': open, 'hidden': !open }" class="hidden md:hidden w-full mt-4">
            <nav class="flex flex-col space-y-4">
                @auth
                    @if (Auth::user()->usertype == 'admin')
                        <a href="{{ route('admin.dashboard') }}"
                            class="text-gray-700 font-semibold hover:text-blue-500">Dashboard</a>
                    @elseif (Auth::user()->usertype == 'user')
                        <a href="{{ route('dashboard') }}"
                            class="text-gray-700 font-semibold hover:text-blue-500">Dashboard</a>
                    @endif
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-700 font-semibold hover:text-red-500">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="text-gray-700 font-semibold hover:text-blue-500">Login</a>
                    <a href="{{ route('register') }}" class="text-gray-700 font-semibold hover:text-blue-500">Register</a>
                @endauth
            </nav>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="bg-pink-300 w-full snap-start snap-always shrink-0">
        <div class="px-5 md:px-24 h-full py-48 2xl:p-32">
            <div class="text-center py-16 bg-white border-4 border-black mx-4 mt-0 relative transform -translate-y-6">
                <h1 class="text-2xl sm:text-4xl md:text-5xl font-extrabold uppercase mb-4">Selamat Datang Di SIPPAO</h1>
                <p class="text-sm sm:text-base md:text-lg text-gray-600 mb-6">
                    SIPPAO adalah Sistem Informasi Perencanaan dan Pengelolaan Anggaran Operasional.
                </p>
                <div class="flex flex-wrap justify-center space-x-4">
                    <a href="#info"
                        class="text-sm sm:text-base h-10 sm:h-12 border-black border-2 px-3 py-2 bg-yellow-200 rounded-md hover:bg-yellow-300 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)]">
                        Explore
                    </a>
                    <a href="{{ route('login') }}"
                        class="text-sm sm:text-base h-10 sm:h-12 border-black border-2 px-3 py-2 bg-sky-500 rounded-md hover:bg-sky-600 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)]">
                        Get Started
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Info Section -->
    <section id="info" class="bg-yellow-200 w-full snap-start snap-always shrink-0">
        <div class="px-5 md:px-24 h-full py-20 2xl:p-32">
            <h2 class="text-4xl sm:text-5xl md:text-6xl mb-12 font-bold">
                Informasi
            </h2>
            <div class="flex flex-wrap justify-center gap-6">
                <div
                    class="w-full sm:w-80 h-full border-black border-2 rounded-md hover:shadow-[8px_8px_0px_rgba(0,0,0,1)] bg-white">
                    <a href="/tu" class="block cursor-pointer">
                        <figure class="w-full h-40 sm:h-1/2 border-black border-b-2">
                            <img src="{{ asset('image/tu.jpg') }}" alt="thumbnail"
                                class="w-full h-full object-cover" />
                        </figure>
                        <div class="px-6 py-5 text-left h-full">
                            <h1 class="text-lg font-extrabold mb-4">TU</h1>
                            <p class="text-xs mb-4">Informasi terkait Tata Usaha (TU).</p>
                            <strong>Read More</strong>
                        </div>
                    </a>
                </div>

                <div
                    class="w-full sm:w-80 h-full border-black border-2 rounded-md hover:shadow-[8px_8px_0px_rgba(0,0,0,1)] bg-white">
                    <a href="/tu" class="block cursor-pointer">
                        <figure class="w-full h-40 sm:h-1/2 border-black border-b-2">
                            <img src="{{ asset('image/rpp.jpg') }}" alt="thumbnail"
                                class="w-full h-full object-cover" />
                        </figure>
                        <div class="px-6 py-5 text-left h-full">
                            <h1 class="text-lg font-extrabold mb-4">RPP</h1>
                            <p class="text-xs mb-4"> Informasi terkait Rencana Penggunaan Pendapatan (RPP).</p>
                            <strong>Read More</strong>
                        </div>
                    </a>
                </div>

                <div
                    class="w-full sm:w-80 h-full border-black border-2 rounded-md hover:shadow-[8px_8px_0px_rgba(0,0,0,1)] bg-white">
                    <a href="/tu" class="block cursor-pointer">
                        <figure class="w-full h-40 sm:h-1/2 border-black border-b-2">
                            <img src="{{ asset('image/pkb.jpg') }}" alt="thumbnail"
                                class="w-full h-full object-cover" />
                        </figure>
                        <div class="px-6 py-5 text-left h-full">
                            <h1 class="text-lg font-extrabold mb-4">PKB</h1>
                            <p class="text-xs mb-4">Informasi terkait Pajak Kendaraan Bermotor (PKB).</p>
                            <strong>Read More</strong>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </section>

    <!-- Chat Bubble -->
    <div id="chat-bubble"
        class="fixed bottom-10 right-6 bg-blue-500 text-white p-3 rounded-full cursor-pointer shadow-lg">
        💬
    </div>

    <!-- Chat Window -->
    <div id="chat-window"
        class="hidden fixed bottom-20 right-6 w-80 bg-white border border-gray-300 rounded-lg shadow-lg">
        <div class="p-4 border-b border-gray-300 bg-gray-100">
            <h2 class="text-lg font-semibold">Chatbot</h2>
        </div>
        <div id="chat-content" class="p-4 h-64 overflow-y-auto">
            <p class="text-sm text-gray-500">Tanya sesuatu untuk memulai...</p>
        </div>
        <div class="p-4 border-t border-gray-300">
            <textarea id="chat-input" rows="2" class="w-full p-2 border rounded-md resize-none"
                placeholder="Ketik pesan..."></textarea>
            <button id="send-btn"
                class="mt-2 w-full bg-blue-500 text-white py-2 rounded-md hover:bg-blue-600">Kirim</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="text-center p-4 bg-white border-t-2 border-black">
        <p>&copy; <span id="year"></span> SIPPAO. All rights reserved.</p>
    </footer>

    <script src="{{ asset('js/script.js') }}"></script>
</body>

</html>
