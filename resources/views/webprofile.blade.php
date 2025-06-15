<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><title>Profil | SIAM Al-Mu'min</title></title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <!-- Header -->
    <header class="bg-blue-50 text-black py-3 text-center">
    <img src="{{ asset('assets/images/logos/logo.png') }}" alt="Logo Madrasah" class="w-16 mx-auto mb-2">
    <h1 class="text-2xl font-bold mb-1">Madrasah Diniyah Takmiliyah Al-Mu'min</h1>
    <p class="text-sm max-w-xl mx-auto">
        Membentuk Siswa kreatif, inovatif, disiplin, berakhlaq mulia didasari Iman dan Taqwa
    </p>
    <div class="mt-2 space-x-2">
        <a href="{{ route('login') }}" class="inline-block bg-white text-purple-800 px-4 py-2 rounded-full shadow hover:bg-gray-200">
            Login
        </a>
    </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        <!-- Tentang Kami -->
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Tentang Kami</h2>
            {{-- <p>Madrasah Diniyah Takmiliyah Al-Mu'min berdiri sejak tahun ... dengan tujuan ...</p> --}}
            <p> Madrasah Diniyah/Pesantren Al-Mu’min merupakan lembaga pendidikan swasta yang didirikan 
                pada bulan Oktober tahun 2010 dan berlokasi di Kp. Patrol No. 051 RT 02/04 Ds. Sukamukti Kec. Katapang 
                Kab. Bandung. Lembaga ini berada di bawah naungan Yayasan Sugih Al-Mu’min Pinayungan dan dipimpin 
                oleh Bapak Agus Ansori, S.Ag., S.Kom.Yang menjadi alasan dibangunnya madrasah ini karena belum tersedianya 
                lembaga pendidikan keagamaan yang terjangkau di wilayah tersebut, padahal kebutuhan masyarakat terhadap pendidikan 
                agama cukup tinggi. Madrasah ini bermula dari inisiatif Bapak Agus Ansori, S.Ag., S.Kom dengan menggunakan rumah tinggal 
                milik pendiri sebagai tempat belajar, serta menerima peserta didik dari lingkungan sekitar. Jumlah santri awal sebanyak 15
                orang dengan sistem pembelajaran klasikal. Mayoritas peserta didik berasal dari keluarga dengan kondisi ekonomi menengah ke
                bawah. Oleh karena itu, sejak awal berdiri, Madrasah Al-Mu’min menetapkan kebijakan biaya pendidikan yang sangat terjangkau. 
                Bahkan untuk siswa tertentu yang kurang mampu, biaya pendaftaran dan daftar ulang dapat digratiskan sepenuhnya. Prinsip ini 
                diterapkan agar pendidikan agama dapat diakses oleh seluruh lapisan masyarakat tanpa memberatkan secara finansial. </p>
        </section>
        
        <!-- Visi Misi -->
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Visi & Misi</h2>
            <p><strong>Visi:</strong></p>
            <p>“Membentuk Siswa kreatif, inovatif, disiplin, berakhlaq mulia didasari Iman dan Taqwa”</p>
            <p><strong>Misi:</strong></p>
            <ul>
                <li>- Menyelenggarakan kegiatan pendidikan Agama Islam yang berkesinambungan</li>
                <li>- Menyelenggarakan kegiatan minat dan bakat siswa dalam memahami Agama Islam</li>
                <li>- Meningkatkan kwalitas pendidikan Agama yang selaras dengan minat siswa dan kondisi</li>
            </ul>
        </section>

        <!-- Pendaftaran PPDB -->
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Pendaftaran PPDB</h2>
            <p>Silakan klik tombol di bawah ini untuk melakukan pendaftaran secara online:</p>
            <div class="mt-4 flex flex-col sm:flex-row gap-2">
                <a href="{{ url('/register') }}" class="bg-purple-800 text-white px-4 py-2 rounded-full shadow hover:bg-purple-900 text-center">Daftar PPDB</a>
            </div>
        </section>

        <!-- Kebijakan Akademik -->
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Kebijakan Madrasah</h2>
            <p><strong>Prosedur dan Aturan atau Tata Tertib di Madrasah:</strong></p>
            
            <ol class="list-decimal list-inside space-y-1">
                <li>Daftar wajib oleh orang tua dengan mengisi formulir pendaftaran dan formulir Biodata siswa</li>
                <li>Siswa wajib mengenakan pakaian seragam keatas putih ke bawah hitam/Batik</li>
                <li>Siswa wajib membawa alat sholat untuk siswa yang masuk ada waktu sholatnya</li>
                <li>Siswa wajib membawa alat tulis masing-masing (buku menggunakan sampul).</li>
                <li>Siswa yang tidak hadir belajar wajib ada pemberitahuan dari orang tua/ Wali melalui datang ke madrasah, telepon, SMS, medsos atau surat.</li>
                <li>Jika siswa tidak ada pemberitahuan tidak hadir 7 hari dalam satu bulan dinyatakan mengundurkan diri.</li>
                <li>Siswa harus mengikuti aturan Madrasah, jika melanggar sebanyak tujuh kali dinyatakan mengundurkan diri.</li>
                <li>Jika siswa berkali kali mengundurkan diri lalu daftar lagi sesuai prosedur dibatasi 3 kali daftar secara GRATIS, dan ke 4 kali daftar harus membayar uang pangkal dan infaq bulanan.</li>
                <li>Biaya Pendaftaran Awal Tahun (Jumlahnya ditetapkan kondisional).</li>
                <li>Biaya kegiatan belajar GRATIS.</li>
                <li>Madrasah menerima infaq dan shodaqoh secara sukarela.</li>
                <li>Untuk keperluan sarana Madrasah akan ada pungutan secara gotong royong dari orang tuas siswa dengan pemberitahuan dan kesepakatan terlebih dahulu.</li>
            </ol>
        </section>

        <!-- Donasi -->
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Donasi</h2>
            <p>Bagi yang ingin berdonasi, silakan transfer ke rekening berikut:</p>
            <p><strong>Bank BRI</strong> - 1234-5678-9101 a.n Madrasah Diniyah Takmiliyah Al-Mu'min</p>
        </section>

        <!-- Galeri -->
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Galeri</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                <img src="/assets/images/gallery/gallery1.jpg" alt="Foto Kegiatan 1" class="rounded shadow">
                <img src="/assets/images/gallery/gallery2.jpg" alt="Foto Kegiatan 2" class="rounded shadow">
                <img src="/assets/images/gallery/gallery3.jpg" alt="Foto Kegiatan 3" class="rounded shadow">
                <img src="/assets/images/gallery/gallery4.jpg" alt="Foto Kegiatan 4" class="rounded shadow">
                <img src="/assets/images/gallery/gallery5.jpg" alt="Foto Kegiatan 5" class="rounded shadow">
                <img src="/assets/images/gallery/gallery6.jpg" alt="Foto Kegiatan 6" class="rounded shadow">
            </div>
        </section>

        <!-- Informasi Kontak -->
        <section class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-2xl font-semibold mb-4">Informasi Kontak</h2>
            <p><strong>Alamat:</strong> Kp. Patrol No. 051 RT 02/04 Ds. Sukamukti Kec. Katapang Kab. Bandung 40921 Jawa Barat.</p>
            <p><strong>Telepon:</strong> 0812-3456-7890</p>
            <p><strong>Email:</strong> info@mdtalmu.com</p>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-800 text-white text-center py-4">
        &copy; 2025 Madrasah Diniyah Takmiliyah Al-Mu'min. All rights reserved.
    </footer>
</body>
</html>