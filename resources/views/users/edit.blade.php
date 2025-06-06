<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Edit Pengguna
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <form method="POST" action="{{ route('users.update', $user->id) }}">
                @csrf
                @method('PUT')

                <div class="mb-4">
                    <label for="name" class="block font-medium">Nama</label>
                    <input type="text" name="name" id="name" class="w-full border rounded p-2"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="email" class="block font-medium">Email</label>
                    <input type="email" name="email" id="email" class="w-full border rounded p-2"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password" class="block font-medium">Password Baru (opsional)</label>
                    <input type="password" name="password" id="password" class="w-full border rounded p-2">
                    @error('password')
                        <div class="text-red-600">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="block font-medium">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="w-full border rounded p-2">
                </div>

                <button type="submit"
                    class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Perbarui</button>
                <a href="{{ route('users.index') }}" class="ml-2 text-gray-600 hover:underline">Batal</a>
            </form>
        </div>
    </div>
</x-app-layout>
