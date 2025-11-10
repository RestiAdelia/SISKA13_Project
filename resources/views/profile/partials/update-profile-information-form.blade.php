<section>
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Header Form --}}
        <header class="mb-8 border-b pb-4">
            <h2 class="text-3xl font-extrabold text-gray-900 flex items-center">
                <i class="fas fa-user-edit mr-3 text-[#560029]"></i>
                {{ __('Perbarui Profil') }}
            </h2>
            <p class="mt-2 text-base text-gray-600">
                {{ __('Perbarui informasi akun, email, dan detail kontak Anda.') }}
            </p>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-10">
            
            {{-- KOLOM KIRI: FOTO PROFIL (50%) --}}
            <div class="lg:col-span-1 flex flex-col items-center">
                {{-- PERUBAHAN DI SINI: w-48 h-48 diubah menjadi w-64 h-64 --}}
                <div class="relative w-64 h-64 mb-6"> 
                    <img id="preview-image"
                        src="{{ Auth::user()->profile_photo_url ?? 'https://via.placeholder.com/200' }}"
                        alt="Foto Profil"
                        class="w-full h-full object-cover border-4 border-[#560029] shadow-2xl rounded-2xl transition duration-300 transform hover:scale-105">
                    <label for="photo"
                        class="absolute bottom-0 right-0 bg-[#560029] hover:bg-[#3f0020] text-white p-3 rounded-full cursor-pointer shadow-lg transition duration-300 transform hover:scale-110">
                        <i class="fas fa-camera text-xl"></i>
                    </label>

                    <input id="photo" name="photo" type="file" class="hidden" accept="image/*"
                        onchange="previewImage(event)">
                </div>

                <x-input-error class="mt-4 text-center" :messages="$errors->get('photo')" />
                <p class="text-sm text-gray-500 mt-2">Format: JPG, PNG. Max: 2MB</p>
            </div>
            
            {{-- KOLOM KANAN: FORM DATA DIRI (50%) --}}
            <div class="lg:col-span-1 space-y-6"> 
                
                {{-- Nama --}}
                <div>
                    <x-input-label for="name" :value="__('Nama Lengkap')" />
                    <x-text-input id="name" name="name" type="text"
                        class="mt-1 block w-full rounded-xl border-gray-300 focus:border-gray-500 focus:ring-0 transition duration-300"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                {{-- Email --}}
                <div>
                    <x-input-label for="email" :value="__('Alamat Email')" />
                    <x-text-input id="email" name="email" type="email"
                        class="mt-1 block w-full rounded-xl border-gray-300 focus:border-gray-500 focus:ring-0 transition duration-300"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div class="mt-3 bg-red-50 border-l-4 border-red-500 p-3">
                            <p class="text-sm text-red-700 font-medium">
                                {{ __('Email kamu belum diverifikasi.') }}
                                <button form="send-verification"
                                    class="underline text-sm text-red-600 hover:text-red-700 font-semibold ml-1">
                                    {{ __('Kirim ulang verifikasi') }}
                                </button>
                            </p>
                        </div>
                    @endif
                </div>

                {{-- Alamat --}}
                <div>
                    <x-input-label for="alamat" :value="__('Alamat Lengkap')" />
                    <x-text-input id="alamat" name="alamat" type="text"
                        class="mt-1 block w-full rounded-xl border-gray-300 focus:border-gray-500 focus:ring-0 transition duration-300"
                        :value="old('alamat', $user->alamat ?? '')" autocomplete="street-address" />
                    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                </div>

                {{-- Telepon --}}
                <div>
                    <x-input-label for="telepon" :value="__('Nomor Telepon')" />
                    <x-text-input id="telepon" name="telepon" type="text"
                        class="mt-1 block w-full rounded-xl border-gray-300 focus:border-gray-500 focus:ring-0 transition duration-300"
                        :value="old('telepon', $user->telepon ?? '')" autocomplete="tel" />
                    <x-input-error class="mt-2" :messages="$errors->get('telepon')" />
                </div>
            </div>
        </div>
        
        {{-- Tombol Aksi --}}
        <div class="flex flex-col sm:flex-row justify-end gap-4 mt-10 pt-6 border-t border-gray-100">

            {{-- Ganti Password --}}
            <a href="{{ route('password.requestOtpForm') }}"
                class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold px-6 py-2.5 rounded-xl shadow-sm transition duration-300 flex items-center justify-center">
                <i class="fas fa-lock mr-2"></i> Ganti Password
            </a>
            
            {{-- Cancel --}}
            <a href="{{ route('dashboard') }}"
                class="border border-gray-300 text-gray-700 font-semibold px-6 py-2.5 rounded-xl hover:bg-gray-50 transition duration-300 flex items-center justify-center">
                Cancel
            </a>

            {{-- Save --}}
            <button type="submit"
                class="bg-[#560029] hover:bg-[#3f0020] text-white font-semibold px-6 py-2.5 rounded-xl shadow-lg shadow-[#560029]/30 transition duration-300 transform hover:scale-[1.02] flex items-center justify-center">
                <i class="fas fa-save mr-2"></i> Simpan Perubahan
            </button>
        </div>
    </form>

    {{-- Preview Foto JS --}}
    <script>
        function previewImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function() {
                    document.getElementById('preview-image').src = reader.result;
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</section>