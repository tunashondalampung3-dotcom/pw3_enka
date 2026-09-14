<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 space-y-3">
                <p><span class="font-semibold">NIM:</span> {{ $mahasiswa->nim }}</p>
                <p><span class="font-semibold">Nama:</span> {{ $mahasiswa->nama }}</p>
                <p><span class="font-semibold">Tempat, Tanggal Lahir:</span>
                    {{ $mahasiswa->tempat_lahir }}, {{ $mahasiswa->tanggal_lahir->format('d-m-Y') }}
                </p>
                <p><span class="font-semibold">Jenis Kelamin:</span> {{ $mahasiswa->jenis_kelamin }}</p>
                <p><span class="font-semibold">Alamat:</span> {{ $mahasiswa->alamat }}</p>
                <p><span class="font-semibold">Program Studi:</span> {{ $mahasiswa->program_studi }}</p>
                <p><span class="font-semibold">No. HP:</span> {{ $mahasiswa->no_hp }}</p>
                <p><span class="font-semibold">Email:</span> {{ $mahasiswa->email }}</p>

                <div class="pt-4">
                    <a href="{{ route('mahasiswa.index') }}" class="px-4 py-2 bg-gray-200 rounded-md">Kembali</a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>