<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;

class AnggotaManagementController extends Controller
{
    // Tampilkan semua anggota
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');
        
        $query = Anggota::with('approvedBy')->latest();
        
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        
        $anggota = $query->paginate(15);
        
        $stats = [
            'total' => Anggota::count(),
            'pending' => Anggota::pending()->count(),
            'approved' => Anggota::approved()->count(),
            'rejected' => Anggota::rejected()->count(),
        ];
        
        return view('admin.anggota.index', compact('anggota', 'stats', 'status'));
    }

    // Detail anggota
    public function show(Anggota $anggota)
    {
        $anggota->load('approvedBy');
        return view('admin.anggota.show', compact('anggota'));
    }

    // Approve anggota
    public function approve(Anggota $anggota)
    {
        $anggota->approve(auth()->guard('admin')->id());
        
        return redirect()->back()->with('success', 'Anggota berhasil disetujui.');
    }

    // Reject anggota
    public function reject(Request $request, Anggota $anggota)
    {
        $request->validate([
            'rejection_reason' => 'required|string|max:500',
        ]);
        
        $anggota->reject($request->rejection_reason, auth()->guard('admin')->id());
        
        return redirect()->back()->with('success', 'Anggota berhasil ditolak.');
    }

    // Delete anggota
    public function destroy(Anggota $anggota)
    {
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