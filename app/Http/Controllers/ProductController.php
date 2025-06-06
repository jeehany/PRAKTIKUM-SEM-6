<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    // Tampilkan daftar produk
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('product.index', compact('products'));
    }

    // Tampilkan form tambah produk
    public function create()
    {
        return view('product.create');
    }

    // Simpan produk baru
    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        $image = $request->file('image');
        $image->storeAs('products', $image->hashName(), 'public');

        Product::create([
            'image' => $image->hashName(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')->with(['success' => 'Produk berhasil disimpan!']);
    }

    // Tampilkan detail produk (opsional)
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.show', compact('product'));
    }

    // Tampilkan form edit produk
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('product.edit', compact('product'));
    }

    // Update produk
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
            'title' => 'required',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'stock' => 'required|numeric',
        ]);

        // Jika ada file gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama
            if ($product->image) {
                Storage::disk('public')->delete('products/' . $product->image);
            }

            $image = $request->file('image');
            $image->storeAs('products', $image->hashName(), 'public');
            $product->image = $image->hashName();
        }

        // Update data lainnya
        $product->update([
            'image' => $product->image,
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'stock' => $request->stock,
        ]);

        return redirect()->route('products.index')->with(['success' => 'Produk berhasil diperbarui!']);
    }

    // Hapus produk
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);

        // Hapus file gambar jika ada
        if ($product->image) {
            Storage::disk('public')->delete('products/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with(['success' => 'Produk berhasil dihapus!']);
    }

    public function exportPdf()
    {
        $products = Product::all();
        $pdf = Pdf::loadView('product.print', compact('products'));
        return $pdf->stream('daftar-produk.pdf');
    }
}
