<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">Detail Customer</h2>
    </x-slot>

    <div class="max-w-2xl mx-auto py-6 bg-white p-6 rounded shadow">
        <div class="mb-4"><strong>NIK:</strong> {{ $customer->nik }}</div>
        <div class="mb-4"><strong>Nama:</strong> {{ $customer->name }}</div>
        <div class="mb-4"><strong>Email:</strong> {{ $customer->email }}</div>
        <div class="mb-4"><strong>Telepon:</strong> {{ $customer->phone }}</div>
        <div class="mb-4"><strong>Alamat:</strong> {{ $customer->address }}</div>
        <div class="mt-4">
            <a href="{{ route('customers.index') }}" class="text-blue-600 hover:underline">← Kembali ke daftar</a>
        </div>
    </div>
</x-app-layout>
