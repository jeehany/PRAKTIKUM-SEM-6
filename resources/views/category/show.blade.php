<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Kategori</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 bg-white p-6 shadow rounded-lg">
        <div class="mb-4">
            <h3 class="text-lg font-semibold text-gray-800">Nama Kategori</h3>
            <p class="text-gray-700 mt-1">{{ $category->name }}</p>
        </div>

        <div class="flex justify-end">
            <a href="{{ route('categories.index') }}" class="bg-gray-200 text-gray-700 px-4 py-2 rounded">Kembali</a>
        </div>
    </div>
</x-app-layout>
