<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Customer</h2>
    </x-slot>

    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 py-6">
        <div class="flex justify-between items-center mb-4">
            <h1 class="text-2xl font-bold">Daftar Customer</h1>
            <a href="{{ route('customers.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Tambah Customer
            </a>
        </div>

        <div class="bg-white shadow rounded-lg overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">No</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">NIK</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Nama</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Email</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Telepon</th>
                        <th class="px-6 py-3 text-left text-sm font-medium text-gray-700">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @foreach ($customers as $index => $customer)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4">{{ $index + $customers->firstItem() }}</td>
                            <td class="px-6 py-4">{{ $customer->nik }}</td>
                            <td class="px-6 py-4">{{ $customer->name }}</td>
                            <td class="px-6 py-4">{{ $customer->email }}</td>
                            <td class="px-6 py-4">{{ $customer->phone }}</td>
                            <td class="px-6 py-4 flex space-x-2">
                                <a href="{{ route('customers.show', $customer->id) }}"
                                    class="text-blue-600 hover:underline">Lihat</a>
                                <a href="{{ route('customers.edit', $customer->id) }}"
                                    class="text-yellow-600 hover:underline">Edit</a>
                                <form action="{{ route('customers.destroy', $customer->id) }}" method="POST"
                                    onsubmit="return confirm('Yakin ingin menghapus?')">
                                    @csrf @method('DELETE')
                                    <button class="text-red-600 hover:underline">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-4">
            {{ $customers->links() }}
        </div>
    </div>
</x-app-layout>
