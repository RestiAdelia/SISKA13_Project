<x-app-layout>

@section('content')
<div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 mt-10">
    <h2 class="text-2xl font-bold text-center text-green-600 mb-6">
        Verifikasi OTP
    </h2>

    {{-- Status jika sukses kirim OTP --}}
    @if (session('status'))
        <div class="bg-blue-100 text-blue-700 p-3 rounded mb-4 text-sm">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('password.verifyOtp') }}" method="POST">
        @csrf

        <div class="mb-4">
            <label for="otp" class="block text-gray-700 font-medium mb-1">
                Masukkan Kode OTP
            </label>
            <input type="text" name="otp" id="otp"
                class="border border-gray-300 rounded-lg p-2 w-full focus:border-green-500 focus:ring focus:ring-green-300"
                placeholder="Contoh: 123456" required>

            @error('otp')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
            Verifikasi OTP
        </button>
    </form>
</div>
</x-app-layout>
