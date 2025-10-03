<x-app-layout>
    <div class="p-6 bg-white rounded-lg shadow">
        <h1 class="text-2xl font-bold mb-4">Profil Sekolah</h1>

        <p><strong>Nama Sekolah:</strong> {{ $data['nama'] }}</p>
        <p><strong>Alamat:</strong> {{ $data['alamat'] }}</p>
        <p><strong>Telepon:</strong> {{ $data['telepon'] }}</p>
        <p><strong>Email:</strong> {{ $data['email'] }}</p>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Visi</h2>
            <p class="italic text-gray-700">{{ $data['visi'] }}</p>
        </div>

        <div class="mt-6">
            <h2 class="text-xl font-semibold">Misi</h2>
            <ul class="list-disc list-inside">
                @foreach ($data['misi'] as $misi)
                    <li>{{ $misi }}</li>
                @endforeach
            </ul>
        </div>
    </div>
</x-app-layout>
