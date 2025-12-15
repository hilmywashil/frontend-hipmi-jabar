<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AnggotaManagementController extends Controller
{
    // Tampilkan semua anggota
    public function index(Request $request)
    {
        $admin = Auth::guard('admin')->user();
        
        // Cek akses: hanya BPC yang bisa akses
        if ($admin->category !== 'bpc') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini. Hanya BPC yang dapat mengelola anggota.');
        }
        
        $status = $request->get('status', 'all');
        
        // Query anggota berdasarkan domisili admin BPC
        $query = Anggota::query()->where('domisili', $admin->domisili);
        
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        
        $anggota = $query->with('approvedBy')->latest()->paginate(15);
        
        // Statistics berdasarkan domisili
        $stats = [
            'total' => Anggota::where('domisili', $admin->domisili)->count(),
            'pending' => Anggota::where('domisili', $admin->domisili)->where('status', 'pending')->count(),
            'approved' => Anggota::where('domisili', $admin->domisili)->where('status', 'approved')->count(),
            'rejected' => Anggota::where('domisili', $admin->domisili)->where('status', 'rejected')->count(),
        ];
        
        return view('admin.anggota.index', compact('anggota', 'stats', 'status'));
    }

    // Detail anggota
    public function show(Anggota $anggota)
    {
        $admin = Auth::guard('admin')->user();
        
        // Cek akses
        if ($admin->category !== 'bpc') {
            abort(403, 'Anda tidak memiliki akses ke halaman ini.');
        }
        
        // Cek apakah anggota sesuai domisili
        if ($admin->domisili !== $anggota->domisili) {
            abort(403, 'Anda tidak memiliki akses untuk melihat anggota dari domisili ini.');
        }
        
        $anggota->load('approvedBy');
        return view('admin.anggota.show', compact('anggota'));
    }

    // Approve anggota
    public function approve(Anggota $anggota)
    {
        $admin = Auth::guard('admin')->user();
        
        // Validasi akses
        if ($admin->category !== 'bpc') {
            return back()->with('error', 'Anda tidak memiliki akses untuk approve anggota.');
        }
        
        if ($admin->domisili !== $anggota->domisili) {
            return back()->with('error', 'Anda hanya dapat approve anggota dari domisili ' . $admin->domisili);
        }
        
        $anggota->approve($admin->id);
        
        return redirect()->back()->with('success', 'Anggota berhasil disetujui.');
    }

    // Reject anggota
    public function reject(Request $request, Anggota $anggota)
    {
        $admin = Auth::guard('admin')->user();
        
        // Validasi akses
        if ($admin->category !== 'bpc') {
            return back()->with('error', 'Anda tidak memiliki akses untuk reject anggota.');
        }
        
        if ($admin->domisili !== $anggota->domisili) {
            return back()->with('error', 'Anda hanya dapat reject anggota dari domisili ' . $admin->domisili);
        }
        
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);
        
        $anggota->reject($request->rejection_reason, $admin->id);
        
        return redirect()->back()->with('success', 'Anggota berhasil ditolak.');
    }

    // Delete anggota
    public function destroy(Anggota $anggota)
    {
        $admin = Auth::guard('admin')->user();
        
        // Validasi akses
        if ($admin->category !== 'bpc') {
            return back()->with('error', 'Anda tidak memiliki akses untuk menghapus anggota.');
        }
        
        if ($admin->domisili !== $anggota->domisili) {
            return back()->with('error', 'Anda hanya dapat menghapus anggota dari domisili ' . $admin->domisili);
        }
        
        // Hapus file-file terkait
        \Storage::disk('public')->delete([
            $anggota->foto_ktp,
            $anggota->foto_diri,
            $anggota->profile_perusahaan,
            $anggota->logo_perusahaan,
        ]);
        
        $anggota->delete();
        
        return redirect()->route('admin.anggota.index')->with('success', 'Data anggota berhasil dihapus.');
    }
}