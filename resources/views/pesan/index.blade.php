<x-app-layout>
    @include('components.alert-success')

    <x-slot name="header">
        <h2 class="font-bold text-3xl text-[var(--dark2)] leading-tight">
            {{ __('Pesan Masuk') }}
        </h2>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen" x-data="{ search: '', expandedId: null }">

        {{-- Judul --}}
        <div class="text-center mb-10">
            <h2 class="font-bold text-3xl text-black border-b-2 border-pink-600 pb-3 w-1/2 mx-auto">
                Data Pesan Masuk
            </h2>
        </div>

        {{-- Search --}}
        <div class="flex justify-between items-center mb-6">
            <div class="flex-1 max-w-md">
                <input type="text" x-model="search" placeholder="🔍 Cari nama / email..."
                    class="w-full border border-gray-300 rounded-lg px-4 py-2
                    focus:ring-2 focus:ring-blue-500 focus:outline-none text-gray-700">
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto bg-white rounded-xl shadow-md">
            <table class="w-full border border-gray-200 text-sm text-gray-700">
                <thead class="bg-gray-100 text-gray-800 font-semibold">
                    <tr>
                        <th class="px-4 py-2 border">No</th>
                        <th class="px-4 py-2 border">Nama</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Pesan</th>
                        <th class="px-4 py-2 border">Tanggal</th>
                        <th class="px-4 py-2 border">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($contacts as $index => $item)
                        <tr class="border hover:bg-gray-50 text-center"
                            x-show="
                                '{{ strtolower($item->name) }}'.includes(search.toLowerCase()) ||
                                '{{ strtolower($item->email) }}'.includes(search.toLowerCase())
                            ">
                            <td class="px-4 py-2">{{ $index + 1 }}</td>
                            <td class="px-4 py-2 font-medium">{{ $item->name }}</td>
                            <td class="px-4 py-2">{{ $item->email }}</td>
                            <td class="px-4 py-2 text-left max-w-xs">
                                <div class="relative">
                                    <p class="text-gray-700"
                                        :class="expandedId !== {{ $item->id }} ? 'line-clamp-2' : ''">
                                        {{ $item->message }}
                                    </p>
                                    @if (strlen($item->message) > 100)
                                        <button
                                            @click="expandedId = expandedId === {{ $item->id }} ? null : {{ $item->id }}"
                                            class="text-blue-600 hover:text-blue-800 text-xs mt-1 font-medium">
                                            <span x-show="expandedId !== {{ $item->id }}">Selengkapnya</span>
                                            <span x-show="expandedId === {{ $item->id }}">Sembunyikan</span>
                                        </button>
                                    @endif
                                </div>
                            </td>
                            <td class="px-4 py-2">
                                {{ $item->created_at->translatedFormat('d F Y') }}
                            </td>
                            <td class="px-4 py-2">
                                <div class="flex justify-center gap-2">
                                    {{-- Detail --}}
                                    <a href="{{ route('pesan.show', $item) }}"
                                        class="px-3 py-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-xs font-medium flex items-center gap-1"
                                        title="Lihat detail">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                            viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                        </svg>
                                        Detail
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('pesan.destroy', $item) }}" method="POST"
                                        class="delete-form inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus pesan ini?')"
                                            class="px-3 py-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-xs font-medium flex items-center gap-1"
                                            title="Hapus pesan">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none"
                                                viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                            </svg>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center text-gray-500 py-4">
                                Tidak ada pesan masuk
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        @if ($contacts->hasPages())
            <div class="p-6 border-t bg-gray-50 flex justify-center">
                {{ $contacts->links() }}
            </div>
        @endif

    </div>

    <style>
        .line-clamp-2 {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }
    </style>

    <script src="//unpkg.com/alpinejs" defer></script>
</x-app-layout>
