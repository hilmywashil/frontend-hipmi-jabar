<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class KegiatanController extends Controller
{
    // Daftar kegiatan
    public function index(Request $request)
    {
        $query = Kegiatan::query()->orderBy('tanggal_publish', 'desc');

        // Filter berdasarkan bidang
        if ($request->filled('bidang')) {
            $query->where('bidang', $request->bidang);
        }

        // Search
        if ($request->filled('search')) {
            $query->where('judul', 'like', '%' . $request->search . '%');
        }

        $kegiatan = $query->paginate(10);

        return view('admin.kegiatan.index', compact('kegiatan'));
    }

    // Form tambah kegiatan
    public function create()
    {
        return view('admin.kegiatan.create');
    }

    // Simpan kegiatan baru
    public function store(Request $request)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'tanggal_publish' => 'required|date',
            'bidang' => 'required|string',
            'is_active' => 'boolean',
            'is_populer' => 'boolean',
        ]);

        // Upload gambar
        if ($request->hasFile('gambar')) {
            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('kegiatan', $filename, 'public');
            $validated['gambar'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['is_populer'] = $request->has('is_populer');

        Kegiatan::create($validated);

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil ditambahkan!');
    }

    // Form edit kegiatan
    public function edit(Kegiatan $kegiatan)
    {
        return view('admin.kegiatan.edit', compact('kegiatan'));
    }

    // Update kegiatan
    public function update(Request $request, Kegiatan $kegiatan)
    {
        $validated = $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'tanggal_publish' => 'required|date',
            'bidang' => 'required|string',
            'is_active' => 'boolean',
            'is_populer' => 'boolean',
        ]);

        // Upload gambar baru jika ada
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama
            if ($kegiatan->gambar && Storage::disk('public')->exists($kegiatan->gambar)) {
                Storage::disk('public')->delete($kegiatan->gambar);
            }

            $file = $request->file('gambar');
            $filename = time() . '_' . Str::slug($request->judul) . '.' . $file->getClientOriginalExtension();
            $path = $file->storeAs('kegiatan', $filename, 'public');
            $validated['gambar'] = $path;
        }

        $validated['is_active'] = $request->has('is_active');
        $validated['is_populer'] = $request->has('is_populer');

        $kegiatan->update($validated);

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil diperbarui!');
    }

    // Hapus kegiatan
    public function destroy(Kegiatan $kegiatan)
    {
        // Hapus gambar
        if ($kegiatan->gambar && Storage::disk('public')->exists($kegiatan->gambar)) {
            Storage::disk('public')->delete($kegiatan->gambar);
        }

        $kegiatan->delete();

        return redirect()->route('admin.kegiatan.index')
            ->with('success', 'Kegiatan berhasil dihapus!');
    }
}