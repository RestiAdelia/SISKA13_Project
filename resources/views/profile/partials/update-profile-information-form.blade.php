<section>
    <form method="post" action="{{ route('profile.update') }}" enctype="multipart/form-data">
        @csrf
        @method('patch')

        {{-- Header --}}
        <header class="mb-8 border-b pb-4 text-center md:text-left">
            <h2 class="text-2xl font-semibold text-gray-900 dark:text-gray-100">
                {{ __('Edit Profile') }}
            </h2>
            <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                {{ __('Perbarui informasi akun dan email Anda di bawah ini.') }}
            </p>
        </header>

        {{-- Grid dua kolom: Foto kiri, form kanan --}}
        <div class="grid grid-cols-1 md:grid-cols-2 gap-10 items-center justify-center">
            {{-- FOTO PROFIL --}}
            <div class="flex flex-col items-center justify-center w-full">
                <div class="relative w-150 h-150 md:w-80 md:h-80 flex justify-center items-center">
                    <img id="preview-image"
                        src="{{ Auth::user()->profile_photo_url ?? 'https://via.placeholder.com/200' }}"
                        alt="Foto Profil"
                        class="w-full h-full object-cover border-4 border-gray-300 dark:border-gray-700 shadow-lg rounded-2xl transition-transform duration-300 hover:scale-105 hover:shadow-2xl">

                    <label for="photo"
                        class="absolute bottom-3 right-3 bg-pink-600 hover:bg-pink-700 text-white p-4 rounded-xl cursor-pointer shadow-md transition">
                        <i class="fa-solid fa-camera text-xl"></i>
                    </label>

                    <input id="photo" name="photo" type="file" class="hidden" accept="image/*"
                        onchange="previewImage(event)">
                </div>

                <x-input-error class="mt-4 text-center" :messages="$errors->get('photo')" />
            </div>

            {{-- FORM DATA DIRI --}}
            <div class="space-y-6 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
                {{-- Nama --}}
                <div>
                    <x-input-label for="name" :value="__('Nama')" />
                    <x-text-input id="name" name="name" type="text"
                        class="mt-2 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error class="mt-2" :messages="$errors->get('name')" />
                </div>

                {{-- Email --}}
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email"
                        class="mt-2 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error class="mt-2" :messages="$errors->get('email')" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                        <div class="mt-2">
                            <p class="text-sm text-gray-700 dark:text-gray-300">
                                {{ __('Email kamu belum diverifikasi.') }}
                                <button form="send-verification"
                                    class="underline text-sm text-pink-600 hover:text-pink-700 dark:text-pink-400 dark:hover:text-pink-500">
                                    {{ __('Kirim ulang verifikasi') }}
                                </button>
                            </p>
                            @if (session('status') === 'verification-link-sent')
                                <p class="mt-2 text-sm text-green-600 dark:text-green-400 font-medium">
                                    {{ __('Link verifikasi baru telah dikirim ke email kamu.') }}
                                </p>
                            @endif
                        </div>
                    @endif
                </div>

                {{-- Alamat --}}
                <div>
                    <x-input-label for="alamat" :value="__('Alamat')" />
                    <x-text-input id="alamat" name="alamat" type="text"
                        class="mt-2 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg"
                        :value="old('alamat', $user->alamat ?? '')" autocomplete="street-address" />
                    <x-input-error class="mt-2" :messages="$errors->get('alamat')" />
                </div>

                {{-- Telepon --}}
                <div>
                    <x-input-label for="telepon" :value="__('No Telepon')" />
                    <x-text-input id="telepon" name="telepon" type="text"
                        class="mt-2 block w-full border-gray-300 dark:border-gray-600 dark:bg-gray-900 dark:text-white rounded-lg"
                        :value="old('telepon', $user->telepon ?? '')" autocomplete="tel" />
                    <x-input-error class="mt-2" :messages="$errors->get('telepon')" />
                </div>

                {{-- Tombol --}}
                <div class="flex justify-end gap-4 pt-6 border-t mt-6">
                    <a href="{{ route('dashboard') }}"
                        class="bg-yellow-400 hover:bg-yellow-500 text-white font-semibold px-6 py-2.5 rounded-lg shadow transition">
                        Cancel
                    </a>

                    <button type="submit"
                        class="bg-[#820642] hover:bg-[#b94e81] text-white font-semibold px-6 py-2.5 rounded-lg shadow transition">
                        <i class="fa-solid fa-floppy-disk mr-2"></i> Save
                    </button>
                </div>

                {{-- Tombol Ganti Password via OTP --}}
                <div class="flex justify-end mt-4">
                    <a href="{{ route('password.requestOtpForm') }}"
                        class="bg-pink-600 hover:bg-pink-700 text-white font-semibold px-6 py-2.5 rounded-lg shadow transition">
                        <i class="fa-solid fa-key mr-2"></i> Ganti Password (Verifikasi Email)
                    </a>
                </div>
            </div>
        </div>
    </form>

    {{-- Preview Foto JS --}}
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                document.getElementById('preview-image').src = reader.result;
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</section>
