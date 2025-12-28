<x-app-layout>
     <x-slot name="header">
        <div class="text-left">
            <h2 class="font-bold text-xl text-black leading-tight">
                {{ __('Edit Profile') }}
            </h2>

        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

            {{-- Update Profile --}}
            <div class="p-6 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                @include('profile.partials.update-profile-information-form')
            </div>

           


        </div>
    </div>
</x-app-layout>
