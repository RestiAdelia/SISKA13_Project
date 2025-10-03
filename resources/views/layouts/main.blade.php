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
    <aside class="w-64 h-screen bg-[#560029] text-white">
        <div class="px-6 py-4 text-2xl font-bold">SISKA13</div>
        <nav class="flex-1 px-4 space-y-2">
            <a href="#" class="flex items-center px-3 py-2 rounded-md bg-white/20">🏠 Dashboard</a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-white/20">👨‍🎓 Data Siswa</a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-white/20">👩‍🏫 Data Guru</a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-white/20">📚 Mata Pelajaran</a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-white/20">📅 Jadwal</a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-white/20">📝 Nilai</a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-white/20">📢 Pengumuman</a>
            <a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-white/20">⚙️ Pengaturan</a>
        </nav>
    </aside>


    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
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

</body>

</html>
