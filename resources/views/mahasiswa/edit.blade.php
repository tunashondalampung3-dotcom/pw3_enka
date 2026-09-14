<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Mahasiswa
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
                <form action="{{ route('mahasiswa.update', $mahasiswa) }}" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')
                    @include('mahasiswa._form')

                    <div class="flex justify-end space-x-2">
                        <a href="{{ route('mahasiswa.index') }}"
                           class="px-4 py-2 bg-gray-200 rounded-md">Batal</a>
                        <button type="submit"
                                class="px-4 py-2 bg-gray-800 text-white rounded-md hover:bg-gray-700">
                            Update
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>