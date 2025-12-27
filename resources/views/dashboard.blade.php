<x-app-layout>
    <!-- Library Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <div class="min-h-screen flex flex-col md:flex-row bg-slate-50 font-sans">
        <!-- Main Content -->
        <main class="flex-1 p-6 md:p-10">

            <!-- HEADER SECTION -->
            <header class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-4">
                <div>
                    <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Halo, {{ $user->name }}!</h1>
                    <p class="text-slate-500 mt-1 flex items-center">
                        <span class="inline-block w-2 h-2 rounded-full bg-rose-800 animate-pulse mr-2"></span>
                        @if ($user->role == 'admin')
                            Administrator Sekolah
                        @else
                            Orang Tua Siswa &bull; <span
                                class="ml-1 font-semibold text-rose-900 underline decoration-rose-300">Kelas
                                {{ $data['nama_kelas'] ?? '-' }}</span>
                        @endif
                    </p>
                </div>
            </header>

            <!-- STATISTIC CARDS -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-4 mb-10">
                @if ($user->role == 'admin')
                    <!-- Card Siswa -->
                    <div
                        class="bg-white p-4 rounded-2xl shadow-sm border-l-4 border-rose-800 hover:shadow-md transition-all flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Siswa</p>
                            <p class="text-2xl font-black text-slate-800">{{ $data['count_siswa'] }}</p>
                        </div>
                        <div class="p-2 bg-rose-50 text-rose-800 rounded-lg"><i class="fas fa-user-graduate"></i></div>
                    </div>
                    <!-- Card Guru -->
                    <div
                        class="bg-white p-4 rounded-2xl shadow-sm border-l-4 border-rose-800 hover:shadow-md transition-all flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Guru & Staff</p>
                            <p class="text-2xl font-black text-slate-800">{{ $data['count_guru'] }}</p>
                        </div>
                        <div class="p-2 bg-rose-50 text-rose-800 rounded-lg"><i class="fas fa-chalkboard-teacher"></i>
                        </div>
                    </div>
                    <!-- Card Total Kelas -->
                    <div
                        class="bg-white p-4 rounded-2xl shadow-sm border-l-4 border-rose-800 hover:shadow-md transition-all flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Total Kelas</p>
                            <p class="text-2xl font-black text-slate-800">{{ $data['count_kelas'] ?? 0 }}</p>
                        </div>
                        <div class="p-2 bg-rose-50 text-rose-800 rounded-lg"><i class="fas fa-school"></i></div>
                    </div>
                    <!-- Card Kegiatan -->
                    <div
                        class="bg-white p-4 rounded-2xl shadow-sm border-l-4 border-rose-800 hover:shadow-md transition-all flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">Kegiatan</p>
                            <p class="text-2xl font-black text-slate-800">{{ $data['total_kegiatan'] ?? 0 }}</p>
                        </div>
                        <div class="p-2 bg-rose-50 text-rose-800 rounded-lg"><i class="fas fa-calendar-check"></i></div>
                    </div>
                    <!-- Card MoU -->
                    <div
                        class="bg-white p-4 rounded-2xl shadow-sm border-l-4 border-rose-900 hover:shadow-md transition-all flex items-center justify-between">
                        <div>
                            <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest">MoU</p>
                            <p class="text-2xl font-black text-slate-800">{{ $data['count_mou'] }}</p>
                        </div>
                        <div class="p-2 bg-rose-50 text-rose-900 rounded-lg"><i class="fas fa-handshake"></i></div>
                    </div>
                    <!-- Card Visi & Misi -->
                    <div class="bg-rose-900 p-4 rounded-2xl shadow-lg text-white flex items-center justify-between">
                        <div class="overflow-hidden">
                            <p
                                class="font-semibold text-rose-200 mb-2 text-xs flex items-center uppercase tracking-widest">
                                <i class="fas fa-shield-alt mr-2"></i> Akreditasi & Mutu
                            </p>

                            <p class="text-sm font-bold truncate">
                                {{ $data['last_update_visi_misi']
                                    ? \Carbon\Carbon::parse($data['last_update_visi_misi'])->translatedFormat('d M Y')
                                    : '-' }}
                            </p>
                        </div>

                        <div class="p-2 bg-white/20 rounded-lg flex items-center justify-center">
                            <i class="fas fa-clock text-white"></i>
                        </div>
                    </div>
                @else
                    <!-- TAMPILAN ORANG TUA STATS -->
                    <div class="lg:col-span-6 grid grid-cols-1 sm:grid-cols-4 gap-4">
                        <div
                            class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-rose-800 flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-slate-400 tracking-widest uppercase">Teman Sekelas</p>
                                <p class="text-3xl font-black text-slate-800">{{ $data['total_siswa_sekelas'] }}</p>
                            </div>
                            <div class="p-4 bg-rose-50 text-rose-800 rounded-xl"><i class="fas fa-users text-2xl"></i>
                            </div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-rose-800 flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-slate-400 tracking-widest uppercase">Kegiatan</p>
                                <p class="text-3xl font-black text-slate-800">{{ $data['total_kegiatan'] ?? 0 }}</p>
                            </div>
                            <div class="p-4 bg-rose-50 text-rose-800 rounded-xl"><i
                                    class="fas fa-calendar-day text-2xl"></i></div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-amber-500 flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-slate-400 tracking-widest uppercase">Kehadiran</p>
                                <p class="text-3xl font-black text-slate-800">{{ $data['persentase_hadir'] }}%</p>
                            </div>
                            <div class="p-4 bg-amber-50 text-amber-600 rounded-xl"><i
                                    class="fas fa-clipboard-check text-2xl"></i></div>
                        </div>
                        <div
                            class="bg-white p-6 rounded-2xl shadow-sm border-l-4 border-rose-900 flex items-center justify-between">
                            <div>
                                <p class="text-xs font-bold text-slate-400 tracking-widest uppercase">Tugas</p>
                                <p class="text-3xl font-black text-slate-800">{{ $data['tugas_mendatang'] }}</p>
                            </div>
                            <div class="p-4 bg-rose-50 text-rose-900 rounded-xl"><i class="fas fa-book text-2xl"></i>
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <!-- GRAFIK SECTION (ADMIN ONLY) -->
            @if ($user->role == 'admin')
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-10">
                    <!-- Chart Batang -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h2 class="font-bold text-slate-800 text-lg flex items-center mb-6">
                            <i class="fas fa-chart-bar mr-2 text-rose-800"></i> Sebaran Siswa Per Kelas
                        </h2>
                        <div class="h-[300px] w-full">
                            <canvas id="siswaChart"></canvas>
                        </div>
                    </div>
                    <!-- Chart Lingkaran -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                        <h2 class="font-bold text-slate-800 text-lg flex items-center mb-6">
                            <i class="fas fa-chart-pie mr-2 text-rose-700"></i> Proporsi Siswa
                        </h2>
                        <div class="h-[300px] w-full flex justify-center">
                            <canvas id="siswaPieChart"></canvas>
                        </div>
                    </div>
                </div>
            @endif

            <!-- MAIN CONTENT GRID -->
            <!-- SECTION: MATA PELAJARAN & TUGAS TERBARU (BERSAMPINGAN) -->
            @if ($user->role == 'orangtua')
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 mb-8 items-stretch">

                    <!-- KIRI: DAFTAR MATA PELAJARAN -->
                    <!-- KIRI: DAFTAR MATA PELAJARAN -->
                    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col">
                        <div class="flex items-center justify-between mb-6">
                            <h2 class="font-bold text-slate-800 text-lg flex items-center uppercase tracking-tight">
                                <span class="w-1.5 h-6 bg-rose-900 rounded-full mr-3"></span>
                                Mata Pelajaran Aktif
                            </h2>
                            <span
                                class="text-[10px] font-bold px-2 py-1 bg-rose-50 text-rose-900 rounded-md border border-rose-100 uppercase">
                                {{ count($data['mata_pelajaran']) }} Pelajaran
                            </span>
                        </div>

                        <!-- Grid 2 kolom agar Nama Pelajaran Luas -->
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            @forelse($data['mata_pelajaran'] as $mp)
                                @php
                                    // Menghapus karakter JSON jika ada
                                    $cleanMP = str_replace(['"', '[', ']', '\"'], '', $mp);
                                @endphp
                                <div class="group">
                                    <div
                                        class="flex items-center p-4 bg-slate-50 rounded-xl border border-slate-100 hover:border-rose-900/20 hover:bg-white hover:shadow-lg hover:shadow-rose-900/5 transition-all duration-300 h-full">
                                        <!-- Bagian Ikon -->
                                        <div
                                            class="w-10 h-10 shrink-0 bg-rose-900 text-white rounded-lg flex items-center justify-center shadow-md shadow-rose-200 group-hover:scale-110 transition-transform">
                                            <i class="fas fa-book text-xs"></i>
                                        </div>

                                        <!-- BAGIAN TEKS (INI YANG TADI HILANG) -->
                                        <div class="ml-4 overflow-hidden">
                                            <p
                                                class="font-bold text-slate-800 text-sm uppercase tracking-wide leading-tight break-words">
                                                {{ trim($cleanMP) }}
                                            </p>
                                            <p class="text-[9px] text-slate-400 mt-1 uppercase font-medium">Kurikulum
                                                Aktif</p>
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div
                                    class="col-span-full py-12 flex flex-col items-center justify-center bg-slate-50 rounded-3xl border-2 border-dashed border-slate-200">
                                    <i class="fas fa-layer-group text-slate-300 text-2xl mb-2"></i>
                                    <p class="text-slate-400 italic text-sm">Belum ada data mata pelajaran.</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                    <!-- KANAN: PENGINGAT TUGAS BARU -->
                    <div class="flex flex-col h-full">
                        @if ($data['tugas_terbaru'])
                            <div
                                class="bg-gradient-to-br from-rose-900 to-rose-950 p-8 rounded-2xl shadow-xl text-white relative overflow-hidden group h-full flex flex-col justify-center">
                                <!-- Hiasan Background -->
                                <div
                                    class="absolute -right-10 -bottom-10 w-48 h-48 bg-white opacity-5 rounded-full group-hover:scale-125 transition-transform duration-1000">
                                </div>
                                <div class="absolute -left-10 -top-10 w-32 h-32 bg-white opacity-5 rounded-full"></div>

                                <div class="relative z-10">
                                    <div class="flex items-center mb-6">
                                        <div class="p-3 bg-white/20 rounded-xl mr-4 backdrop-blur-sm shadow-inner">
                                            <i class="fas fa-bell text-2xl text-amber-400 animate-bounce"></i>
                                        </div>
                                        <h4 class="font-bold text-2xl tracking-tight">Pengingat Tugas Baru!</h4>
                                    </div>

                                    <div class="space-y-4 mb-8">
                                        <p class="text-rose-100 text-lg leading-relaxed">
                                            Anak Anda memiliki tugas baru pada mata pelajaran:
                                            <span
                                                class="block text-white font-black text-xl mt-1 underline decoration-amber-500 decoration-2">
                                                {{ $data['tugas_terbaru']->judul }}
                                            </span>
                                        </p>
                                        <p class="text-rose-200 text-sm italic">
                                            *Mohon dampingi anak untuk menyelesaikan sebelum batas waktu.
                                        </p>
                                    </div>

                                    <div class="flex flex-col sm:flex-row gap-4 items-center justify-between mt-auto">
                                        <div
                                            class="flex items-center text-sm font-bold bg-black/30 px-5 py-3 rounded-2xl border border-white/10 shadow-lg">
                                            <i class="fas fa-hourglass-half mr-3 text-amber-400"></i>
                                            Deadline:
                                            {{ \Carbon\Carbon::parse($data['tugas_terbaru']->deadline)->translatedFormat('d M Y, H:i') }}
                                        </div>
                                        <button onclick="window.location='{{ route('tugas.index') }}'"
                                            class="w-full sm:w-auto px-8 py-3 bg-white text-rose-950 rounded-2xl font-black text-sm hover:bg-rose-50 hover:scale-105 transition-all shadow-xl uppercase tracking-widest">
                                            Detail Tugas
                                        </button>

                                    </div>
                                </div>
                            </div>
                        @else
                            <!-- Tampilan jika tidak ada tugas -->
                            <div
                                class="bg-white p-8 rounded-2xl border border-dashed border-slate-200 flex flex-col items-center justify-center text-center h-full">
                                <div class="w-20 h-20 bg-slate-50 rounded-full flex items-center justify-center mb-4">
                                    <i class="fas fa-check-double text-slate-300 text-3xl"></i>
                                </div>
                                <h4 class="text-slate-800 font-bold text-lg">Semua Tugas Selesai</h4>
                                <p class="text-slate-400 text-sm mt-1">Belum ada tugas baru yang perlu dikerjakan.</p>
                            </div>
                        @endif
                    </div>

                </div>
            @endif
        </main>
    </div>

    <!-- SCRIPT CHART -->
    @if ($user->role == 'admin')
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const chartLabels = {!! json_encode($data['chart_labels']) !!};
                const chartData = {!! json_encode($data['chart_data']) !!};

                // Palet Maroon Natural (lebih kalem & natural)
                const maroonNaturalPalette = [
                    '#A56A6A', // Soft Maroon
                    '#B88989', // Dusty Pastel Red
                    '#9E6B6B', // Soft Wine
                    '#8C5F5F', // Muted Deep Rose
                    '#C7A3A3', // Light Muted Rose
                    '#B79A90', // Soft Warm Brown
                    '#A9A19E', // Soft Wood Grey
                ];


                // 1. Grafik Batang
                const ctxBar = document.getElementById('siswaChart').getContext('2d');
                new Chart(ctxBar, {
                    type: 'bar',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            label: 'Jumlah Siswa',
                            data: chartData,
                            backgroundColor: maroonNaturalPalette[0],
                            borderRadius: 5,
                            barThickness: 18,
                        }]

                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: {
                                display: false
                            }
                        },
                        scales: {
                            y: {
                                beginAtZero: true,
                                grid: {
                                    color: '#f1f5f9'
                                },
                                ticks: {
                                    stepSize: 1,
                                    color: '#94a3b8'
                                }
                            },
                            x: {
                                grid: {
                                    display: false
                                },
                                ticks: {
                                    color: '#64748b',
                                    font: {
                                        weight: 'bold',
                                        size: 10
                                    }
                                }
                            }
                        }
                    }
                });

                // 2. Grafik Lingkaran (Doughnut)
                const ctxPie = document.getElementById('siswaPieChart').getContext('2d');
                new Chart(ctxPie, {
                    type: 'doughnut',
                    data: {
                        labels: chartLabels,
                        datasets: [{
                            data: chartData,
                            backgroundColor: maroonNaturalPalette,
                            borderWidth: 3,
                            borderColor: '#ffffff',
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        cutout: '72%',
                        plugins: {
                            legend: {
                                position: 'bottom',
                                labels: {
                                    usePointStyle: true,
                                    padding: 15,
                                    font: {
                                        size: 10,
                                        weight: '500'
                                    },
                                    color: '#64748b'
                                }
                            }
                        }
                    }
                });
            });
        </script>
    @endif

</x-app-layout>
