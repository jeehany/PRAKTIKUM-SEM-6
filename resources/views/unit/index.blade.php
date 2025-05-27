<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Daftar Unit</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-xl font-bold text-gray-800">Unit</h1>
            <a href="{{ route('units.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                <i class="bi bi-plus-circle mr-2"></i>Tambah Unit
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse ($units as $index => $unit)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $unit->name }}</td>
                            <td class="px-6 py-4 flex gap-2">
                                <a href="{{ route('units.show', $unit->id) }}" title="Detail"
                                    class="text-yellow-600 hover:text-yellow-800">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('units.edit', $unit->id) }}" title="Edit"
                                    class="text-blue-600 hover:text-blue-800">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <form action="{{ route('units.destroy', $unit->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus unit ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" title="Hapus">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="text-center text-gray-500 px-6 py-4">Tidak ada data unit.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $units->links() }}
        </div>
    </div>
</x-app-layout>
