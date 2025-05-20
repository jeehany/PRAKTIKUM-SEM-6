<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Unit</h2>
    </x-slot>

    <div class="max-w-xl mx-auto mt-6 bg-white p-6 shadow rounded-lg">
        <form action="{{ route('units.update', $unit->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label for="name" class="block text-gray-700 font-medium mb-2">Nama</label>
                <input type="text" name="name" id="name"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200"
                    value="{{ old('name', $unit->name) }}" required>
                @error('name')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="mb-4">
                <label for="description" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
                <textarea name="description" id="description" rows="4"
                    class="w-full border-gray-300 rounded-lg shadow-sm focus:ring focus:ring-blue-200">{{ old('description', $unit->description) }}</textarea>
                @error('description')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end">
                <a href="{{ route('units.index') }}"
                    class="bg-gray-200 text-gray-700 px-4 py-2 rounded mr-2">Batal</a>
                <button type="submit"
                    class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </div>
</x-app-layout>
