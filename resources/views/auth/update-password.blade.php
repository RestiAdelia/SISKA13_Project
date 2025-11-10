<x-app-layout>

<div class="max-w-lg mx-auto bg-white shadow-xl rounded-2xl p-8 mt-10 border border-gray-100">
    <h2 class="text-3xl font-extrabold text-[#560029] text-center mb-8 flex items-center justify-center">
        <i class="fas fa-lock mr-3"></i>
        Ubah Password
    </h2>

    {{-- Status berhasil --}}
    @if (session('status'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-xl mb-6 text-sm font-medium shadow-sm">
            <i class="fas fa-check-circle mr-2"></i> {{ session('status') }}
        </div>
    @endif

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm font-medium shadow-sm">
            <ul class="list-disc list-inside">
                <p class="font-bold mb-1">Terjadi Kesalahan:</p>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.updatePassword') }}" method="POST">
        @csrf

        {{-- Password Baru --}}
        <div class="mb-5">
            <label class="block text-gray-700 font-medium mb-1">Password Baru</label>
            <input type="password" name="password"
                {{-- Input field disesuaikan untuk fokus netral dan rounded-xl --}}
                class="block w-full border-gray-300 rounded-xl p-3 shadow-sm focus:ring-0 focus:border-gray-500 transition duration-200"
                required>
            {{-- Catatan: Error individu dihapus karena sudah ditangani oleh $errors->any() di atas --}}
        </div>

        {{-- Konfirmasi Password --}}
        <div class="mb-8">
            <label class="block text-gray-700 font-medium mb-1">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                {{-- Input field disesuaikan untuk fokus netral dan rounded-xl --}}
                class="block w-full border-gray-300 rounded-xl p-3 shadow-sm focus:ring-0 focus:border-gray-500 transition duration-200"
                required>
        </div>

        {{-- Tombol Submit --}}
        <button type="submit"
            {{-- Tombol diseragamkan menggunakan warna aksen kustom (#560029) dan style yang konsisten --}}
            class="w-full bg-[#560029] hover:bg-[#3f0020] text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-[#560029]/40 transition duration-300 transform hover:scale-[1.01] flex items-center justify-center">
            <i class="fas fa-save mr-2"></i>
            Simpan Password Baru
        </button>
    </form>
</div>

</x-app-layout>