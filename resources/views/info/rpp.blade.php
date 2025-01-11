<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi RPLP UPPD Kota Semarang 1</title>
    @vite('resources/css/app.css')
</head>

<body class="flex justify-center items-center h-screen relative">
    <!-- Background Image -->
    <div class="absolute inset-0 bg-cover bg-center"
        style="background-image: url('{{ asset('image/kotalama.png') }}'); opacity: 0.8; z-index: -1;"></div>

    <div
        class="w-full max-w-4xl border-black border-2 rounded-md hover:shadow-[8px_8px_0px_rgba(0,0,0,1)] bg-white p-6 relative z-10">
        <h1 class="text-2xl font-bold text-center mb-4">Informasi RPLP UPPD Kota Semarang 1</h1>
        <p class="text-sm text-gray-700 mb-4">
            encana Penggunaan Lainnya Pendapatan (RPLP) adalah salah satu dokumen
            yang menyusun perencanaan terkait dengan penggunaan dana yang diperoleh
            oleh UPPD Kota Semarang 1, terutama yang berkaitan dengan pajak
            kendaraan bermotor. RPLP bertujuan untuk memastikan bahwa seluruh
            pendapatan yang diterima oleh UPPD digunakan secara efisien, transparan,
            dan sesuai dengan peraturan yang berlaku.
        </p>
        <p class="text-sm text-gray-700 mb-4">
            Dalam RPLP, direncanakan alokasi dana untuk berbagai kebutuhan
            operasional UPPD, termasuk pengembangan layanan publik, pemeliharaan
            fasilitas, dan peningkatan sistem administrasi pajak kendaraan bermotor.
            RPLP juga menjadi acuan dalam pengelolaan dan pertanggungjawaban
            keuangan yang harus dilakukan oleh UPPD untuk memastikan pelayanan yang
            optimal kepada masyarakat.
        </p>
        <p class="text-xs text-gray-500 text-center">
            Untuk informasi lebih lanjut, hubungi <a
                href="https://website.bapenda.jatengprov.go.id/uppd-kota-semarang-i" target="_blank"
                class="text-blue-500">layanan pelanggan UPPD Kota Semarang 1</a>.
        </p>
    </div>

    <button
        class="fixed top-4 left-4 h-12 border-black border-2 p-2.5 bg-pink-400 hover:bg-pink-500 hover:shadow-[2px_2px_0px_rgba(0,0,0,1)] active:bg-pink-700 rounded-md font-bold"
        onclick="goBack()">
        Kembali
    </button>

    <script src="js/script.js"></script>

</body>

</html>
