<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Kategori
        </h2>
    </x-slot>

    <div class="w-full mx-auto py-6 sm:px-6 lg:px-8">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('categories.print') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700">
                <i class="bi bi-file-earmark-pdf me-2"></i> Cetak PDF
            </a>
            <h1 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                Daftar Kategori
            </h1>
            <a href="{{ route('categories.create') }}"
                class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
                <i class="bi bi-plus-circle me-2"></i> Tambah Kategori
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
                    @forelse ($categories as $index => $category)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900">{{ $category->name }}</td>
                            <td class="px-6 py-4 text-sm text-gray-900 flex gap-2">
                                <a href="{{ route('categories.show', $category->id) }}"
                                    class="text-blue-600 hover:text-blue-800" title="Detail">
                                    <i class="bi bi-eye"></i>
                                </a>
                                <a href="{{ route('categories.edit', $category->id) }}"
                                    class="text-yellow-600 hover:text-yellow-800" title="Edit">
                                    <i class="bi bi-pencil-square"></i>
                                </a>
                                <button type="button" onclick="deleteCategory({{ $category->id }})"
                                    class="text-red-600 hover:text-red-800" title="Hapus">
                                    <i class="bi bi-trash"></i>
                                </button>
                                <form id="delete-form-{{ $category->id }}"
                                    action="{{ route('categories.destroy', $category->id) }}" method="POST"
                                    style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="3" class="px-6 py-4 text-center text-gray-500">Tidak ada kategori tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <script>
        function deleteCategory(categoryId) {
            Swal.fire({
                title: 'Yakin ingin menghapus kategori ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + categoryId).submit();
                }
            });
        }

        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif
    </script>
</x-app-layout>
