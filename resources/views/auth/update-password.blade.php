<x-app-layout>

@section('content')
<div class="max-w-lg mx-auto bg-white shadow-lg rounded-xl p-6 mt-8">
    <h2 class="text-2xl font-bold text-center text-[#7e0713] mb-6">
        Ubah Password
    </h2>

    {{-- Status berhasil --}}
    @if (session('status'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
            {{ session('status') }}
        </div>
    @endif

    {{-- Error validasi --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-sm">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('password.updatePassword') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Password Baru</label>
            <input type="password" name="password"
                class="border border-gray-300 rounded-lg p-2 w-full focus:ring focus:ring-purple-300 focus:border-purple-500"
                required>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-medium">Konfirmasi Password</label>
            <input type="password" name="password_confirmation"
                class="border border-gray-300 rounded-lg p-2 w-full focus:ring focus:ring-purple-300 focus:border-purple-500"
                required>
        </div>

        <button type="submit"
            class="w-full bg-[#931313] hover:bg-[#5e1b08] text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
            Simpan Password
        </button>
    </form>
</div>
</x-app-layout>
