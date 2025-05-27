<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Tambah Customer</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6">
        <form action="{{ route('customers.store') }}" method="POST" class="bg-white p-6 rounded shadow">
            @csrf
            <div class="mb-4">
                <label class="block mb-1">NIK</label>
                <input type="text" name="nik" class="w-full border rounded px-3 py-2" value="{{ old('nik') }}" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Nama</label>
                <input type="text" name="name" class="w-full border rounded px-3 py-2" value="{{ old('name') }}" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Telepon</label>
                <input type="text" name="phone" class="w-full border rounded px-3 py-2" value="{{ old('phone') }}" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Email</label>
                <input type="email" name="email" class="w-full border rounded px-3 py-2" value="{{ old('email') }}" required>
            </div>
            <div class="mb-4">
                <label class="block mb-1">Alamat</label>
                <textarea name="address" class="w-full border rounded px-3 py-2" required>{{ old('address') }}</textarea>
            </div>
            <div class="flex justify-end gap-2">
                <a href="{{ route('customers.index') }}"
                    class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded hover:bg-gray-300">
                    <i class="bi bi-arrow-left me-2"></i> Batal
                </a>
                <button type="submit" 
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700"> 
                    <i class="bi bi-save me-2"></i>Simpan
                </button>
            </div>
        </form>
    </div>
</x-app-layout>
