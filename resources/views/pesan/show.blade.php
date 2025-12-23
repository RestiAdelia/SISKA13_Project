<x-app-layout>
    <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Detail Pesan Masuk') }}
            </h2>
        </div>
    </x-slot>

    <div class="p-6 bg-gray-50 min-h-screen">

        <div class="max-w-3xl mx-auto bg-white rounded-xl shadow-md p-8">

            <h2 class="text-2xl font-bold text-center mb-6 border-b-2 border-pink-600 pb-3">
                Detail Pesan Masuk
            </h2>

            <div class="space-y-5 text-gray-700">

                <div>
                    <p class="font-semibold text-gray-800">Nama</p>
                    <p class="mt-1 text-gray-600">{{ $contact->name }}</p>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">Email</p>
                    <p class="mt-1 text-gray-600">{{ $contact->email }}</p>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">Tanggal</p>
                    <p class="mt-1 text-gray-600">
                        {{ $contact->created_at->translatedFormat('d F Y H:i') }}
                    </p>
                </div>

                <div>
                    <p class="font-semibold text-gray-800">Pesan</p>
                    <p
                        class="mt-2 whitespace-pre-line bg-gray-50 p-4 rounded-lg border border-gray-200 text-gray-700 leading-relaxed">
                        {{ $contact->message }}
                    </p>
                </div>

            </div>

            <div class="mt-8 flex justify-between items-center gap-3">
                <a href="{{ route('pesan.index') }}"
                    class="px-5 py-2.5 bg-gray-500 hover:bg-gray-600 text-white rounded-lg font-medium transition">
                    Kembali
                </a>

                <form action="{{ route('pesan.destroy', $contact) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Hapus pesan ini?')"
                        class="px-5 py-2.5 bg-red-500 hover:bg-red-600 text-white rounded-lg font-medium transition">
                        Hapus Pesan
                    </button>
                </form>
            </div>

        </div>

    </div>
</x-app-layout>
