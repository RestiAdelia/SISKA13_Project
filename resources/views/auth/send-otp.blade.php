<x-app-layout>

@section('content')
<div class="max-w-md mx-auto bg-white shadow-lg rounded-xl p-6 mt-10">
    <h2 class="text-2xl font-bold text-center text-blue-600 mb-6">
        Kirim OTP ke Email
    </h2>

    {{-- Status jika sukses kirim OTP --}}
    @if (session('status'))
        <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-sm">
            {{ session('status') }}
        </div>
    @endif

    {{-- Jika ada error --}}
    @if ($errors->any())
        <div class="bg-red-100 text-red-600 p-3 rounded mb-4 text-sm">
            {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.sendOtp') }}" method="POST">
        @csrf

        <p class="text-gray-700 text-sm mb-4">
            Tekan tombol di bawah untuk mengirim kode OTP ke email kamu yang terdaftar.
        </p>

        <button type="submit"
            class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition duration-200">
            Kirim OTP ke Email
        </button>
    </form>
</div>
</x-app-layout>
