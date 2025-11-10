<x-app-layout>

<div class="max-w-md mx-auto bg-white shadow-xl rounded-2xl p-8 mt-10 border border-gray-100">
    <h2 class="text-3xl font-extrabold text-[#560029] text-center mb-8 flex items-center justify-center">
        <i class="fas fa-mobile-alt mr-3"></i>
        Verifikasi OTP
    </h2>

    {{-- Status jika sukses kirim OTP --}}
    @if (session('status'))
        {{-- Status diseragamkan menggunakan style yang lebih halus (berwarna biru untuk notifikasi) --}}
        <div class="bg-blue-50 border border-blue-200 text-blue-700 p-4 rounded-xl mb-6 text-sm font-medium shadow-sm">
            <i class="fas fa-info-circle mr-2"></i> {{ session('status') }}
        </div>
    @endif
    
    {{-- Jika ada error validasi di form --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-xl mb-6 text-sm font-medium shadow-sm">
            <i class="fas fa-times-circle mr-2"></i> {{ $errors->first() }}
        </div>
    @endif

    <form action="{{ route('password.verifyOtp') }}" method="POST">
        @csrf

        <div class="mb-6">
            <label for="otp" class="block text-gray-700 font-medium mb-2 text-base">
                Masukkan Kode OTP
            </label>
            {{-- Input field disesuaikan untuk fokus netral dan rounded-xl --}}
            <input type="text" name="otp" id="otp"
                class="block w-full border-gray-300 rounded-xl p-3 shadow-sm focus:ring-0 focus:border-gray-500 transition duration-200 text-xl text-center tracking-widest"
                placeholder="Contoh: 123456" 
                maxlength="6"
                required>

            @error('otp')
                <p class="text-red-600 text-sm mt-2 font-medium">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit"
            {{-- Tombol diseragamkan menggunakan warna aksen kustom (#560029) --}}
            class="w-full bg-[#560029] hover:bg-[#3f0020] text-white font-bold py-3 px-4 rounded-xl shadow-lg shadow-[#560029]/40 transition duration-300 transform hover:scale-[1.01] flex items-center justify-center">
            <i class="fas fa-check-circle mr-2"></i>
            Verifikasi Kode
        </button>
    </form>
    
    {{-- Opsional: Link untuk mengirim ulang OTP --}}
    <div class="mt-6 text-center">
        <a href="{{ route('password.requestOtpForm') }}" class="text-gray-500 hover:text-[#560029] text-sm underline transition duration-200">
            Kirim Ulang Kode OTP?
        </a>
    </div>
</div>

</x-app-layout>