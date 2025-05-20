<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Detail Produk
        </h2>
    </x-slot>

    <div class="mx-auto py-6 sm:px-6 lg:px-8">
        <div class="mb-6">
            <a href="{{ route('products.index') }}"
                class="inline-flex items-center px-4 py-2 bg-gray-200 text-gray-800 text-sm font-medium rounded hover:bg-gray-300">
                <i class="bi bi-arrow-left me-2"></i> Kembali ke Daftar Produk
            </a>
        </div>

        <div class="bg-white shadow-md rounded-lg p-6">
            <div class="flex flex-col md:flex-row gap-6">
                <div class="md:w-1/3">
                    @if ($product->image)
                        <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->title }}"
                            class="w-full h-auto rounded object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-100 flex items-center justify-center rounded">
                            <span class="text-gray-400 italic text-sm">Tidak ada gambar</span>
                        </div>
                    @endif
                </div>
                <div class="md:w-2/3">
                    <h1 class="text-2xl font-bold text-gray-800 mb-2">{{ $product->title }}</h1>
                    <p class="text-sm text-gray-600 mb-4">{{ $product->description }}</p>
                    <div class="mb-2">
                        <span class="font-semibold text-gray-700">Harga:</span>
                        <span class="text-gray-900">Rp{{ number_format($product->price, 0, ',', '.') }}</span>
                    </div>
                    <div class="mb-2">
                        <span class="font-semibold text-gray-700">Stok:</span>
                        <span class="text-gray-900">{{ $product->stock }}</span>
                    </div>
                    <div class="mt-6 flex gap-3">
                        <a href="{{ route('products.edit', $product->id) }}"
                            class="inline-flex items-center px-4 py-2 bg-blue-600 text-white text-sm font-medium rounded hover:bg-blue-700">
                            <i class="bi bi-pencil-square me-2"></i> Edit Produk
                        </a>
                        <button type="button" onclick="deleteProduct({{ $product->id }})"
                            class="inline-flex items-center px-4 py-2 bg-red-600 text-white text-sm font-medium rounded hover:bg-red-700">
                            <i class="bi bi-trash me-2"></i> Hapus Produk
                        </button>
                        <form id="delete-form-{{ $product->id }}"
                            action="{{ route('products.destroy', $product->id) }}" method="POST"
                            style="display: none;">
                            @csrf
                            @method('DELETE')
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function deleteProduct(productId) {
            Swal.fire({
                title: 'Yakin ingin menghapus produk ini?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Hapus',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + productId).submit();
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
