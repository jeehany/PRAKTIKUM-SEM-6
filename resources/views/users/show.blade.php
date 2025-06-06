<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Pengguna
        </h2>
    </x-slot>

    <div class="max-w-2xl mx-auto sm:px-6 lg:px-8 mt-6">
        <div class="bg-white shadow-sm sm:rounded-lg p-6">
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>

            <div class="mt-4">
                <a href="{{ route('users.index') }}" class="text-blue-600 hover:underline">Kembali</a>
            </div>
        </div>
    </div>
</x-app-layout>
