<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Pengguna
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="flex justify-between items-center mb-6">
            <a href="{{ route('users.print') }}"
                class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700">
                <i class="bi bi-file-earmark-pdf me-2"></i> Cetak PDF
            </a>
            <h1 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                Daftar Pengguna
            </h1>
            <a href="{{ route('categories.create') }}"
                class="inline-flex items-center px-4 py-2 bg-green-600 text-white text-sm font-medium rounded hover:bg-green-700">
                <i class="bi bi-grid me-2"></i> Export Excel
            </a>
        </div>

        @if (session('success'))
            <div class="mb-4 text-green-600">{{ session('success') }}</div>
        @endif

        <div class="bg-white shadow-md rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $user)
                        <tr>
                            <td class="text-sm px-4 py-2">{{ $loop->iteration }}</td>
                            <td class="text-sm px-4 py-2">{{ $user->name }}</td>
                            <td class="text-sm px-4 py-2">{{ $user->email }}</td>
                            <td class="text-sm px-4 py-2 space-x-2 text-left">
                                <a href="{{ route('users.show', $user->id) }}" class="text-blue-600 hover:underline"><i
                                        class="bi bi-eye"></i></a>
                                <a href="{{ route('users.edit', $user->id) }}"
                                    class="text-yellow-600 hover:underline"><i class="bi bi-pencil-square"></i></a>
                                <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                    class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:underline"><i
                                            class="bi bi-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="text-center py-2">Belum ada pengguna.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $users->links() }}
        </div>
    </div>
</x-app-layout>
