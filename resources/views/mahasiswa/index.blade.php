<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Data Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">

                @if (session('success'))
                    <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-4">
                    <a href="{{ route('mahasiswa.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                        + Tambah Mahasiswa
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 text-sm">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-4 py-2 text-left">NIM</th>
                                <th class="px-4 py-2 text-left">Nama</th>
                                <th class="px-4 py-2 text-left">Program Studi</th>
                                <th class="px-4 py-2 text-left">No. HP</th>
                                <th class="px-4 py-2 text-left">Email</th>
                                <th class="px-4 py-2 text-left">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-200">
                            @forelse ($mahasiswas as $mhs)
                                <tr>
                                    <td class="px-4 py-2">{{ $mhs->nim }}</td>
                                    <td class="px-4 py-2">{{ $mhs->nama }}</td>
                                    <td class="px-4 py-2">{{ $mhs->program_studi }}</td>
                                    <td class="px-4 py-2">{{ $mhs->no_hp }}</td>
                                    <td class="px-4 py-2">{{ $mhs->email }}</td>
                                    <td class="px-4 py-2 space-x-2 whitespace-nowrap">
                                        <a href="{{ route('mahasiswa.show', $mhs) }}"
                                           class="text-blue-600 hover:underline">Detail</a>
                                        <a href="{{ route('mahasiswa.edit', $mhs) }}"
                                           class="text-yellow-600 hover:underline">Edit</a>
                                        <form action="{{ route('mahasiswa.destroy', $mhs) }}" method="POST"
                                              class="inline" onsubmit="return confirm('Yakin hapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:underline">Hapus</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-4 py-4 text-center text-gray-500">
                                        Belum ada data mahasiswa.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $mahasiswas->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>