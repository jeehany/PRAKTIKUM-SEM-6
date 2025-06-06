<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Daftar Pengguna
        </h2>
    </x-slot>

    <div class="mx-auto sm:px-6 lg:px-8 mt-4">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6">
            <div class="flex justify-between items-center mb-6">

                <a href="{{ route('users.print') }}" target="_blank"
                    class="mb-4 inline-block bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900">
                    Cetak PDF
                </a>
                <h1 class="text-2xl font-bold text-gray-800 flex items-center gap-2">
                    <i class="bi bi-person me-1"></i> Daftar Pengguna
                </h1>
                <a href="{{ route('users.exportExcel') }}"
                    class="mb-4 inline-block bg-green-700 text-white px-4 py-2 rounded hover:bg-green-900">
                    Export Excel
                </a>

            </div>

            @if (session('success'))
                <div class="mb-4 text-green-600">{{ session('success') }}</div>
            @endif

            <div class="overflow-x-auto">
                <table class="min-w-full bg-white border border-gray-200">
                    <thead>
                        <tr>
                            <th class="border px-4 py-2">No</th>
                            <th class="border px-4 py-2">Nama</th>
                            <th class="border px-4 py-2">Email</th>
                            <th class="border px-4 py-2">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                <td class="border px-4 py-2">{{ $loop->iteration }}</td>
                                <td class="border px-4 py-2">{{ $user->name }}</td>
                                <td class="border px-4 py-2">{{ $user->email }}</td>
                                <td class="border px-4 py-2 space-x-2 text-center">
                                    <a href="{{ route('users.show', $user->id) }}"
                                        class="text-blue-600 hover:underline">Lihat</a>
                                    <a href="{{ route('users.edit', $user->id) }}"
                                        class="text-yellow-600 hover:underline">Edit</a>
                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                        class="inline-block" onsubmit="return confirm('Yakin ingin menghapus?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:underline">Hapus</button>
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
    </div>
</x-app-layout>
