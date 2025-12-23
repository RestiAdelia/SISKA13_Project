<x-app-layout>
    <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Detail Tugas') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

                {{-- KOLOM KIRI: Konten Utama (Deskripsi & Lampiran) --}}
                <div class="lg:col-span-2 space-y-6">

                    {{-- Kartu Deskripsi --}}
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-gray-50/50 px-6 py-4 border-b border-gray-100 flex items-center gap-3">
                            <div
                                class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center">
                                <i class="fa-solid fa-align-left text-lg"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-gray-800">{{ $tugas->judul }}</h3>
                                <p class="text-xs text-gray-500">Diposting pada
                                    {{ $tugas->created_at->translatedFormat('d F Y') }}</p>
                            </div>
                        </div>
                        <div class="p-6">
                            <div class="prose max-w-none text-gray-700 leading-relaxed whitespace-pre-line">
                                {!! nl2br(e($tugas->deskripsi)) !!}
                            </div>
                        </div>
                    </div>

                    {{-- Kartu Lampiran (PREVIEW LOGIC) --}}
                    @if ($tugas->file_lampiran)
                        @php
                            $fileUrl = asset('storage/' . $tugas->file_lampiran);
                            $extension = strtolower(pathinfo($tugas->file_lampiran, PATHINFO_EXTENSION));
                            $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                            $isPdf = $extension === 'pdf';
                        @endphp

                        <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                            <div class="bg-gray-50/50 px-6 py-4 border-b border-gray-100 flex items-center gap-2">
                                <i class="fa-solid fa-paperclip text-gray-400"></i>
                                <h3 class="font-semibold text-gray-800">Lampiran Tugas</h3>
                            </div>

                            <div class="p-6">
                                {{-- 1. Jika GAMBAR --}}
                                @if ($isImage)
                                    <div class="border rounded-lg p-2 bg-gray-50 text-center">
                                        <img src="{{ $fileUrl }}" alt="Lampiran"
                                            class="max-h-[500px] mx-auto rounded shadow-sm">
                                        <div class="mt-3 flex justify-center">
                                            <a href="{{ $fileUrl }}" target="_blank"
                                                class="text-sm text-blue-600 hover:underline">
                                                <i class="fa-solid fa-maximize mr-1"></i> Lihat Ukuran Penuh
                                            </a>
                                        </div>
                                    </div>

                                    {{-- 2. Jika PDF --}}
                                @elseif($isPdf)
                                    <div class="border rounded-lg overflow-hidden shadow-sm">
                                        <iframe src="{{ $fileUrl }}" class="w-full h-[600px]" frameborder="0">
                                            Browser Anda tidak mendukung preview PDF.
                                            <a href="{{ $fileUrl }}">Download PDF</a>
                                            </i></iframe>
                                    </div>
                                    <div class="mt-2 text-right">
                                        <a href="{{ $fileUrl }}" target="_blank"
                                            class="text-sm text-[#560029] hover:underline font-medium">
                                            <i class="fa-solid fa-up-right-from-square mr-1"></i> Buka di Tab Baru
                                        </a>
                                    </div>

                                    {{-- 3. File Lain (Word, Excel, Zip, dll) --}}
                                @else
                                    <div
                                        class="flex items-center p-4 border border-gray-200 rounded-lg bg-gray-50 hover:bg-gray-100 transition">
                                        <div
                                            class="w-12 h-12 rounded-lg bg-[#560029]/10 text-[#560029] flex items-center justify-center text-2xl mr-4">
                                            <i class="fa-regular fa-file-lines"></i>
                                        </div>
                                        <div class="flex-1">
                                            <h4 class="font-bold text-gray-800">File Dokumen</h4>
                                            <p class="text-xs text-gray-500 uppercase">{{ $extension }} File</p>
                                        </div>
                                        <a href="{{ $fileUrl }}" download
                                            class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition shadow text-sm font-medium">
                                            <i class="fa-solid fa-download mr-1"></i> Download
                                        </a>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>


                {{-- KOLOM KANAN: Sidebar Informasi --}}
                <div class="space-y-6">

                    {{-- Kartu Info Detail --}}
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden">
                        <div class="bg-[#560029] px-6 py-4 text-white">
                            <h3 class="font-bold text-lg"><i class="fa-solid fa-circle-info mr-2"></i> Informasi Tugas
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">

                            {{-- Kelas --}}
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold tracking-wide mb-1">Target Kelas</p>
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-chalkboard text-[#560029]"></i>
                                    <span
                                        class="text-gray-800 font-medium">{{ $tugas->kelas->nama_kelas ?? '-' }}</span>
                                </div>
                            </div>
                            <hr class="border-gray-100">

                            {{-- Mapel --}}
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold tracking-wide mb-1">Mata Pelajaran
                                </p>
                                <div class="flex items-center gap-2">
                                    <i class="fa-solid fa-book-open text-[#560029]"></i>
                                    <span class="text-gray-800 font-medium">{{ $tugas->mata_pelajaran }}</span>
                                </div>
                            </div>
                            <hr class="border-gray-100">

                            {{-- Deadline --}}
                            <div>
                                <p class="text-xs text-gray-500 uppercase font-bold tracking-wide mb-1">Tenggat Waktu
                                </p>
                                <div class="flex items-start gap-2">
                                    <i class="fa-regular fa-calendar-xmark text-red-500 mt-1"></i>
                                    <div>
                                        <p class="text-gray-800 font-bold text-lg">
                                            {{ \Carbon\Carbon::parse($tugas->deadline)->format('d M Y') }}
                                        </p>
                                        <p class="text-sm text-gray-500">
                                            Pukul {{ \Carbon\Carbon::parse($tugas->deadline)->format('H:i') }} WIB
                                        </p>
                                    </div>
                                </div>
                                {{-- Countdown Badge --}}
                                <div class="mt-2">
                                    @if (\Carbon\Carbon::now()->greaterThan($tugas->deadline))
                                        <span
                                            class="block w-full text-center px-3 py-1 bg-red-100 text-red-700 text-xs font-bold rounded-md border border-red-200">
                                            <i class="fa-solid fa-triangle-exclamation"></i> Sudah Berakhir
                                        </span>
                                    @else
                                        <span
                                            class="block w-full text-center px-3 py-1 bg-green-100 text-green-700 text-xs font-bold rounded-md border border-green-200">
                                            <i class="fa-solid fa-clock"></i> Masih Aktif
                                        </span>
                                    @endif
                                </div>
                            </div>

                        </div>
                    </div>

                    {{-- Kartu Aksi --}}
                     @if(Auth::user()->role !== 'orangtua')
                    <div class="bg-white rounded-xl shadow-lg border border-gray-100 p-6">
                        <h4 class="font-bold text-gray-800 mb-4">Aksi Admin</h4>
                        <div class="flex justify-center items-center gap-3">

                            {{-- Tombol Edit --}}

                            <a href="{{ route('tugas.edit', $tugas->id) }}"
                                class="flex items-center justify-center w-8 h-8 bg-amber-500 text-white rounded-lg hover:bg-amber-600 transition shadow-sm">
                                <i class="fa-solid fa-pen-to-square"></i>
                            </a>

                            {{-- Tombol Hapus --}}
                            <form action="{{ route('tugas.destroy', $tugas->id) }}" method="POST" class="delete-form">
                                @csrf
                                @method('DELETE')
                                <button type="button"
                                    class="btn-delete flex items-center justify-center w-8 h-8 bg-red-600 text-white rounded-lg hover:bg-red-700 transition shadow-sm">
                                    <i class="fa-solid fa-trash-can"></i>
                                </button>
                            </form>
                            @endif

                            {{-- Tombol Kembali --}}
                            <a href="{{ route('tugas.index') }}"
                                class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300 transition shadow-sm">
                                <i class="fa-solid fa-arrow-left"></i>
                            </a>

                        </div>

                    </div>

                </div>
            </div>

        </div>
    </div>

    {{-- Script SweetAlert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</x-app-layout>
