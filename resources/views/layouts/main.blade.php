<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100 font-sans">

    <!-- Navbar -->
    <nav class="flex items-center justify-between bg-white shadow px-6 py-3">
        <!-- Left: Logo -->
        <div class="flex items-center space-x-3">
            <img src="https://via.placeholder.com/30" class="h-8 w-8 rounded" alt="Logo Sekolah">
            <span class="font-bold text-lg">SMA Negeri 1</span>
        </div>

        <div class="absolute left-64">
            <input type="text" placeholder="Search..."
                class="px-3 py-2 border rounded-md w-64 focus:outline-none focus:ring focus:ring-blue-300">
        </div>
        <!-- Right: User -->
        <div class="flex items-center space-x-4">
            <span class="hidden sm:inline text-sm text-gray-600">Administrator</span>
            <img src="https://via.placeholder.com/35" class="h-9 w-9 rounded-full border" alt="User">
        </div>
    </nav>

    <!-- Main Layout -->
    <div class="flex h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md p-4 space-y-4">
            <ul class="space-y-2">
                <li><a href="#"
                        class="flex items-center px-3 py-2 rounded-md bg-blue-50 text-blue-600 font-semibold">🏠
                        Dashboard</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-100">👨‍🎓 Data
                        Siswa</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-100">👩‍🏫 Data
                        Guru</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-100">📚 Mata
                        Pelajaran</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-100">📅 Jadwal</a>
                </li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-100">📝 Nilai</a></li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-100">📢 Pengumuman</a>
                </li>
                <li><a href="#" class="flex items-center px-3 py-2 rounded-md hover:bg-blue-100">⚙️ Pengaturan</a>
                </li>
            </ul>


        </aside>

        <!-- Content -->
        <main class="flex-1 p-6 overflow-y-auto">
            <h1 class="text-2xl font-bold mb-4">Dashboard Admin</h1>

            <!-- Cards Statistik -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-sm text-gray-500">Total Siswa</p>
                    <h2 class="text-2xl font-bold text-blue-600">1,250</h2>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-sm text-gray-500">Total Guru</p>
                    <h2 class="text-2xl font-bold text-green-600">85</h2>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-sm text-gray-500">Mata Pelajaran</p>
                    <h2 class="text-2xl font-bold text-yellow-600">42</h2>
                </div>
                <div class="bg-white rounded-lg shadow p-4">
                    <p class="text-sm text-gray-500">Pengumuman</p>
                    <h2 class="text-2xl font-bold text-red-600">7</h2>
                </div>
            </div>

            <!-- Konten Utama -->
            <div class="bg-white rounded-lg shadow p-6">
                <h2 class="text-lg font-semibold mb-2">Selamat Datang, Admin!</h2>
                <p class="text-gray-500">Gunakan panel ini untuk mengelola data sekolah seperti siswa, guru, jadwal, dan
                    nilai.</p>
            </div>
        </main>
    </div>

</body>

</html>
```
