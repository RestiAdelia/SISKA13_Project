<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="h-screen bg-gray-100 font-sans flex">

    <!-- Sidebar -->
    <aside class="h-screen bg-pink-600 group fixed transition-all duration-300 w-16 hover:w-64">
        <div class="flex items-center px-3 py-4 space-x-3">
            <!-- Logo -->
            <img src="logo.png" alt="Logo" class="w-8 h-8">
            <!-- Nama sekolah -->
            <span class="hidden group-hover:inline text-white font-bold">SISKA13</span>
        </div>

        <nav class="flex flex-col h-full space-y-2 px-2 py-4 text-white">
            <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-pink-700">
                <span>🏠</span>
                <span class="hidden group-hover:inline">Dashboard</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-pink-700">
                <span>👨‍🎓</span>
                <span class="hidden group-hover:inline">Data Siswa</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-pink-700">
                <span>👩‍🏫</span>
                <span class="hidden group-hover:inline">Data Guru</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-pink-700">
                <span>📚</span>
                <span class="hidden group-hover:inline">Mata Pelajaran</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-pink-700">
                <span>📅</span>
                <span class="hidden group-hover:inline">Jadwal</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-pink-700">
                <span>📝</span>
                <span class="hidden group-hover:inline">Nilai</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-pink-700">
                <span>📢</span>
                <span class="hidden group-hover:inline">Pengumuman</span>
            </a>
            <a href="#" class="flex items-center space-x-3 px-3 py-2 rounded-md hover:bg-pink-700">
                <span>⚙️</span>
                <span class="hidden group-hover:inline">Pengaturan</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col transition-all duration-300" id="mainContent" style="margin-left: 4rem;">
        <!-- Header -->
        <header class="flex items-center justify-between bg-white px-6 py-3 shadow">
            <h1 class="font-bold text-lg">Dashboard</h1>
            <div class="flex items-center space-x-4">
                <!-- Search -->
                <div>
                    <input type="text" placeholder="Cari data..."
                        class="px-3 py-2 border rounded-md w-64 focus:outline-none focus:ring focus:ring-pink-300">
                </div>
                <!-- User -->
                <div class="flex items-center space-x-2">
                    <img src="https://via.placeholder.com/35" class="h-9 w-9 rounded-full border" alt="User">
                    <div>
                        <p class="text-sm font-semibold">Admin Sekolah</p>
                        <p class="text-xs text-gray-500">Super Admin</p>
                    </div>
                </div>
            </div>
        </header>

        <!-- Content -->
         <main class="flex-1 p-6 overflow-y-auto">
            <!-- Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Jumlah Siswa</p>
                        <h2 class="text-2xl font-bold text-pink-600">1,250</h2>
                    </div>
                    <span class="text-3xl">👨‍🎓</span>
                </div>
                <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Jumlah Guru</p>
                        <h2 class="text-2xl font-bold text-pink-600">85</h2>
                    </div>
                    <span class="text-3xl">👩‍🏫</span>
                </div>
                <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Mata Pelajaran</p>
                        <h2 class="text-2xl font-bold text-pink-600">42</h2>
                    </div>
                    <span class="text-3xl">📚</span>
                </div>
                <div class="bg-white rounded-lg shadow p-4 flex items-center justify-between">
                    <div>
                        <p class="text-sm text-gray-500">Pengumuman</p>
                        <h2 class="text-2xl font-bold text-pink-600">7</h2>
                    </div>
                    <span class="text-3xl">📢</span>
                </div>
            </div>

            <!-- Tabel Data -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                <!-- Tabel Siswa -->
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-lg font-semibold">Data Siswa Baru</h2>
                        <a href="#" class="text-sm text-pink-600">Lihat semua →</a>
                    </div>
                    <table class="w-full text-sm text-left">
                        <thead>
                            <tr class="border-b">
                                <th class="py-2">Nama</th>
                                <th>Kelas</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr class="border-b">
                                <td>Andi Saputra</td>
                                <td>X IPA 1</td>
                                <td><span class="text-green-600">Aktif</span></td>
                            </tr>
                            <tr class="border-b">
                                <td>Siti Aisyah</td>
                                <td>X IPA 2</td>
                                <td><span class="text-green-600">Aktif</span></td>
                            </tr>
                            <tr>
                                <td>Budi Santoso</td>
                                <td>XI IPS 1</td>
                                <td><span class="text-yellow-600">Baru</span></td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pengumuman -->
                <div class="bg-white rounded-lg shadow p-4">
                    <div class="flex justify-between items-center mb-3">
                        <h2 class="text-lg font-semibold">Pengumuman Terbaru</h2>
                        <a href="#" class="text-sm text-pink-600">Lihat semua →</a>
                    </div>
                    <ul class="space-y-3 text-sm">
                        <li>
                            <p class="font-medium">Ujian Tengah Semester</p>
                            <p class="text-gray-500">Dilaksanakan mulai 10 Oktober</p>
                        </li>
                        <li>
                            <p class="font-medium">Penerimaan Raport</p>
                            <p class="text-gray-500">Tanggal 25 Desember</p>
                        </li>
                        <li>
                            <p class="font-medium">Lomba Sains</p>
                            <p class="text-gray-500">Pendaftaran dibuka minggu depan</p>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </div>

    <!-- Script untuk geser konten saat sidebar hover -->
    <script>
        const sidebar = document.querySelector('aside');
        const main = document.getElementById('mainContent');

        sidebar.addEventListener('mouseenter', () => {
            main.style.marginLeft = '16rem'; // sidebar melebar
        });

        sidebar.addEventListener('mouseleave', () => {
            main.style.marginLeft = '4rem'; // sidebar kecil
        });
    </script>

</body>

</html>
