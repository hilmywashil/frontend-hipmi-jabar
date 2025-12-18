<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AnggotaManagementController extends Controller
{
    // Method yang sudah ada untuk verifikasi (hanya untuk menu Dashboard)
    public function index(Request $request)
    {
        $admin = auth()->guard('admin')->user();
        $status = $request->get('status', 'pending');
        $domisili = $request->get('domisili', 'all');
        
        $query = Anggota::query();
        
        // TAMBAHKAN HANDLER UNTUK SUPER_ADMIN
        if ($admin->category === 'super_admin') {
            // Super Admin bisa lihat semua anggota dengan filter domisili
            if ($domisili !== 'all') {
                $query->where('domisili', $domisili);
            }
            
            if ($domisili === 'all') {
                $stats = [
                    'total' => Anggota::count(),
                    'pending' => Anggota::where('status', 'pending')->count(),
                    'approved' => Anggota::where('status', 'approved')->count(),
                    'rejected' => Anggota::where('status', 'rejected')->count(),
                ];
            } else {
                $stats = [
                    'total' => Anggota::where('domisili', $domisili)->count(),
                    'pending' => Anggota::where('domisili', $domisili)->where('status', 'pending')->count(),
                    'approved' => Anggota::where('domisili', $domisili)->where('status', 'approved')->count(),
                    'rejected' => Anggota::where('domisili', $domisili)->where('status', 'rejected')->count(),
                ];
            }
            
            $domisiliList = \App\Models\Admin::where('category', 'bpc')
                ->whereNotNull('domisili')
                ->orderBy('domisili')
                ->pluck('domisili')
                ->unique()
                ->values();
                
        } elseif ($admin->category === 'bpc') {
            $query->where('domisili', $admin->domisili);
            
            $stats = [
                'total' => Anggota::where('domisili', $admin->domisili)->count(),
                'pending' => Anggota::where('domisili', $admin->domisili)->where('status', 'pending')->count(),
                'approved' => Anggota::where('domisili', $admin->domisili)->where('status', 'approved')->count(),
                'rejected' => Anggota::where('domisili', $admin->domisili)->where('status', 'rejected')->count(),
            ];
            
            $domisiliList = null;
            
        } elseif ($admin->category === 'bpd') {
            if ($domisili !== 'all') {
                $query->where('domisili', $domisili);
            }
            
            if ($domisili === 'all') {
                $stats = [
                    'total' => Anggota::count(),
                    'pending' => Anggota::where('status', 'pending')->count(),
                    'approved' => Anggota::where('status', 'approved')->count(),
                    'rejected' => Anggota::where('status', 'rejected')->count(),
                ];
            } else {
                $stats = [
                    'total' => Anggota::where('domisili', $domisili)->count(),
                    'pending' => Anggota::where('domisili', $domisili)->where('status', 'pending')->count(),
                    'approved' => Anggota::where('domisili', $domisili)->where('status', 'approved')->count(),
                    'rejected' => Anggota::where('domisili', $domisili)->where('status', 'rejected')->count(),
                ];
            }
            
            $domisiliList = \App\Models\Admin::where('category', 'bpc')
                ->whereNotNull('domisili')
                ->orderBy('domisili')
                ->pluck('domisili')
                ->unique()
                ->values();
        }
        
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        
        $anggota = $query->latest()->paginate(15)->appends([
            'status' => $status,
            'domisili' => $domisili
        ]);
        
        return view('admin.anggota.index', compact(
            'anggota',
            'stats',
            'status',
            'domisili',
            'domisiliList'
        ));
    }

    // Method baru untuk list semua anggota (read-only)
    public function listAll(Request $request)
    {
        $admin = auth()->guard('admin')->user();
        $status = $request->get('status', 'all');
        $domisili = $request->get('domisili', 'all');
        
        $query = Anggota::query();
        
        // Filter berdasarkan kategori admin
        if ($admin->category === 'super_admin') {
            // Super Admin bisa lihat semua anggota dengan filter domisili
            if ($domisili !== 'all') {
                $query->where('domisili', $domisili);
            }
            
            if ($domisili === 'all') {
                $stats = [
                    'total' => Anggota::count(),
                    'pending' => Anggota::where('status', 'pending')->count(),
                    'approved' => Anggota::where('status', 'approved')->count(),
                    'rejected' => Anggota::where('status', 'rejected')->count(),
                ];
            } else {
                $stats = [
                    'total' => Anggota::where('domisili', $domisili)->count(),
                    'pending' => Anggota::where('domisili', $domisili)->where('status', 'pending')->count(),
                    'approved' => Anggota::where('domisili', $domisili)->where('status', 'approved')->count(),
                    'rejected' => Anggota::where('domisili', $domisili)->where('status', 'rejected')->count(),
                ];
            }
            
            // List domisili untuk dropdown
            $domisiliList = \App\Models\Admin::where('category', 'bpc')
                ->whereNotNull('domisili')
                ->orderBy('domisili')
                ->pluck('domisili')
                ->unique()
                ->values();
                
        } elseif ($admin->category === 'bpc') {
            // BPC hanya bisa lihat anggota di domisilinya
            $query->where('domisili', $admin->domisili);
            
            $stats = [
                'total' => Anggota::where('domisili', $admin->domisili)->count(),
                'pending' => Anggota::where('domisili', $admin->domisili)->where('status', 'pending')->count(),
                'approved' => Anggota::where('domisili', $admin->domisili)->where('status', 'approved')->count(),
                'rejected' => Anggota::where('domisili', $admin->domisili)->where('status', 'rejected')->count(),
            ];
            
            $domisiliList = null;
            
        } elseif ($admin->category === 'bpd') {
            // BPD bisa lihat semua anggota dengan filter domisili
            if ($domisili !== 'all') {
                $query->where('domisili', $domisili);
            }
            
            if ($domisili === 'all') {
                $stats = [
                    'total' => Anggota::count(),
                    'pending' => Anggota::where('status', 'pending')->count(),
                    'approved' => Anggota::where('status', 'approved')->count(),
                    'rejected' => Anggota::where('status', 'rejected')->count(),
                ];
            } else {
                $stats = [
                    'total' => Anggota::where('domisili', $domisili)->count(),
                    'pending' => Anggota::where('domisili', $domisili)->where('status', 'pending')->count(),
                    'approved' => Anggota::where('domisili', $domisili)->where('status', 'approved')->count(),
                    'rejected' => Anggota::where('domisili', $domisili)->where('status', 'rejected')->count(),
                ];
            }
            
            // List domisili untuk dropdown
            $domisiliList = \App\Models\Admin::where('category', 'bpc')
                ->whereNotNull('domisili')
                ->orderBy('domisili')
                ->pluck('domisili')
                ->unique()
                ->values();
        }
        
        // Filter berdasarkan status
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        
        // Get data dengan pagination
        $anggota = $query->latest()->paginate(15)->appends([
            'status' => $status,
            'domisili' => $domisili
        ]);
        
        return view('admin.anggota.list', compact(
            'anggota',
            'stats',
            'status',
            'domisili',
            'domisiliList'
        ));
    }

    // Method untuk show detail read-only
    public function showReadOnly(Anggota $anggota)
    {
        $admin = auth()->guard('admin')->user();
        
        // BPC hanya bisa lihat anggota di domisilinya
        if ($admin->category === 'bpc' && $anggota->domisili !== $admin->domisili) {
            abort(403, 'Anda tidak memiliki akses ke data anggota ini.');
        }
        
        return view('admin.anggota.show', compact('anggota'));
    }

    // Method yang sudah ada (untuk verifikasi)
    public function show(Anggota $anggota)
    {
        $admin = auth()->guard('admin')->user();
        
        if ($admin->category === 'bpc' && $anggota->domisili !== $admin->domisili) {
            abort(403, 'Anda tidak memiliki akses ke data anggota ini.');
        }
        
        return view('admin.anggota.show', compact('anggota'));
    }

    public function approve(Anggota $anggota)
    {
        $admin = auth()->guard('admin')->user();
        
        if ($admin->category === 'bpc' && $anggota->domisili !== $admin->domisili) {
            abort(403, 'Anda tidak memiliki akses untuk verifikasi anggota ini.');
        }
        
        // Gunakan method approve() dari Model
        $anggota->approve($admin->id);
        
        return redirect()->route('admin.anggota.index')
            ->with('success', 'Anggota berhasil disetujui!');
    }

    public function reject(Request $request, Anggota $anggota)
    {
        $admin = auth()->guard('admin')->user();
        
        if ($admin->category === 'bpc' && $anggota->domisili !== $admin->domisili) {
            abort(403, 'Anda tidak memiliki akses untuk verifikasi anggota ini.');
        }
        
        $request->validate([
            'alasan_penolakan' => 'required|string|max:500'
        ]);
        
        // Gunakan method reject() dari Model
        $anggota->reject($request->alasan_penolakan, $admin->id);
        
        return redirect()->route('admin.anggota.index')
            ->with('success', 'Anggota berhasil ditolak!');
    }

    public function destroy(Anggota $anggota)
    {
        $admin = auth()->guard('admin')->user();
        
        if ($admin->category === 'bpc' && $anggota->domisili !== $admin->domisili) {
            abort(403, 'Anda tidak memiliki akses untuk menghapus anggota ini.');
        }
        
        // Hapus file-file terkait
        if ($anggota->foto_ktp) Storage::disk('public')->delete($anggota->foto_ktp);
        if ($anggota->foto_diri) Storage::disk('public')->delete($anggota->foto_diri);
        if ($anggota->profile_perusahaan) Storage::disk('public')->delete($anggota->profile_perusahaan);
        if ($anggota->logo_perusahaan) Storage::disk('public')->delete($anggota->logo_perusahaan);
        
        $anggota->delete();
        
        return redirect()->route('admin.anggota.index')
            ->with('success', 'Data anggota berhasil dihapus!');
    }
    // NEW METHOD: Promote anggota menjadi admin (hanya Super Admin)
    public function promoteToAdmin(Anggota $anggota)
    {
        $admin = auth()->guard('admin')->user();
        
        // Hanya Super Admin yang bisa promote
        if (!$admin->isSuperAdmin()) {
            abort(403, 'Anda tidak memiliki akses untuk melakukan aksi ini.');
        }
        
        // Anggota harus sudah approved
        if ($anggota->status !== 'approved') {
            return redirect()->back()->with('error', 'Hanya anggota yang sudah disetujui yang bisa dipromosikan menjadi admin.');
        }
        
        // List domisili untuk dropdown
        $domisiliList = Admin::where('category', 'bpc')
            ->whereNotNull('domisili')
            ->orderBy('domisili')
            ->pluck('domisili')
            ->unique()
            ->values();
        
        return view('admin.anggota.promote', compact('anggota', 'domisiliList'));
    }

    // NEW METHOD: Store promoted admin
    public function storePromotedAdmin(Request $request, Anggota $anggota)
    {
        $admin = auth()->guard('admin')->user();
        
        // Hanya Super Admin yang bisa promote
        if (!$admin->isSuperAdmin()) {
            abort(403, 'Anda tidak memiliki akses untuk melakukan aksi ini.');
        }
        
        // Anggota harus sudah approved
        if ($anggota->status !== 'approved') {
            return redirect()->back()->with('error', 'Hanya anggota yang sudah disetujui yang bisa dipromosikan menjadi admin.');
        }
        
        $validated = $request->validate([
            'username' => 'required|string|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'category' => 'required|in:bpc,bpd',
            'domisili' => 'required_if:category,bpc|nullable|string|max:255',
        ], [
            'domisili.required_if' => 'Domisili wajib diisi untuk BPC.',
        ]);

        // Create admin dari data anggota
        Admin::create([
            'name' => $anggota->nama_usaha,
            'username' => $validated['username'],
            'email' => $anggota->email,
            'password' => Hash::make($validated['password']),
            'category' => $validated['category'],
            'domisili' => $validated['category'] === 'bpc' ? $validated['domisili'] : null,
        ]);

        return redirect()->route('admin.anggota.list')
            ->with('success', "Anggota {$anggota->nama_usaha} berhasil dipromosikan menjadi admin!");
    }
}