<x-app-layout>

<div class="max-w-md mx-auto bg-white shadow-xl rounded-2xl p-8 mt-10 border border-gray-100">
    <h2 class="text-3xl font-extrabold text-[#560029] text-center mb-8 flex items-center justify-center">
        <i class="fas fa-paper-plane mr-3"></i>
        {{-- Mengubah font dan warna header --}}
        Kirim OTP ke Email
    </h2>

    {{-- Status jika sukses kirim OTP --}}
    @if (session('status'))
        <div class="bg-green-50 border border-green-200 text-green-700 p-4 rounded-xl mb-6 text-sm font-medium shadow-sm">
            <i class="fas fa-check-circle mr-2"></i> {{ session('status') }}
        </div>
    @endif

    {{-- Jika ada error --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm font-medium shadow-sm">
            <i class="fas fa-times-circle mr-2"></i> {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.sendOtp') }}" method="POST">
        @csrf

        <p class="text-gray-600 text-base mb-6 text-center">
            Tekan tombol di bawah untuk mengirimkan **kode OTP** ke alamat email Anda yang terdaftar.
        </p>

        <button type="submit"
            class="w-full bg-[#560029] hover:bg-[#3f0020] text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-[#560029]/40 transition duration-300 transform hover:scale-[1.01] flex items-center justify-center">
            <i class="fas fa-envelope mr-2"></i>
            Kirim Kode OTP
        </button>
    </form>
    
    {{-- Tombol kembali opsional --}}
    <div class="mt-6 text-center">
        <a href="{{ route('profile.show') }}" class="text-gray-500 hover:text-gray-700 text-sm underline transition duration-200">
            Kembali ke profile
        </a>
    </div>
</div>

</x-app-layout>