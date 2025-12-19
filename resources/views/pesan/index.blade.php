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
                                        class="px-3 py-1.5 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition text-xs font-medium"
                                        title="Lihat detail">
                                        Detail
                                    </a>

                                    {{-- Hapus --}}
                                    <form action="{{ route('pesan.destroy', $item) }}" method="POST"
                                        class="delete-form inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Hapus pesan ini?')"
                                            class="px-3 py-1.5 bg-red-500 text-white rounded-lg hover:bg-red-600 transition text-xs font-medium"
                                            title="Hapus pesan">
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
