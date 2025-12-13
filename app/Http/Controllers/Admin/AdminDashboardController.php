<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Katalog;
use App\Models\Organisasi;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminDashboardController extends Controller
{
    public function index(): View
    {
        $admin = Auth::guard('admin')->user();
        
        // Admin Statistics
        $totalAdmins = Admin::count();
        $adminsBPC = Admin::where('category', 'bpc')->count();
        $adminsBPD = Admin::where('category', 'bpd')->count();
        $recentAdmins = Admin::latest()->take(5)->get();
        
        // Katalog Statistics
        $totalKatalog = Katalog::where('is_active', true)->count();
        $totalKatalogInactive = Katalog::where('is_active', false)->count();
        $recentKatalogs = Katalog::where('is_active', true)->latest()->take(5)->get();
        
        // Organisasi Statistics
        $totalOrganisasi = Organisasi::where('aktif', true)->count();
        $organisasiByKategori = [
            'ketua_umum' => Organisasi::aktif()->kategori('ketua_umum')->count(),
            'wakil_ketua_umum' => Organisasi::aktif()->kategori('wakil_ketua_umum')->count(),
            'ketua_bidang' => Organisasi::aktif()->kategori('ketua_bidang')->count(),
            'sekretaris_umum' => Organisasi::aktif()->kategori('sekretaris_umum')->count(),
            'wakil_sekretaris_umum' => Organisasi::aktif()->kategori('wakil_sekretaris_umum')->count(),
        ];
        $recentOrganisasi = Organisasi::aktif()->ordered()->take(5)->get();
        
        return view('admin.dashboard', compact(
            'admin',
            'totalAdmins',
            'adminsBPC',
            'adminsBPD',
            'recentAdmins',
            'totalKatalog',
            'totalKatalogInactive',
            'recentKatalogs',
            'totalOrganisasi',
            'organisasiByKategori',
            'recentOrganisasi'
        ));
    }
    
    public function infoAdmin(): View
    {
        $admin = Auth::guard('admin')->user();
        $admins = Admin::latest()->paginate(10);
        
        return view('admin.info-admin', compact('admin', 'admins'));
    }
    
    public function createAdmin(): View
    {
        $admin = Auth::guard('admin')->user();
        return view('admin.create-admin', compact('admin'));
    }
    
    public function storeAdmin(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8|confirmed',
            'category' => 'required|in:bpc,bpd',
        ]);

        Admin::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'password' => Hash::make($validated['password']),
            'category' => $validated['category'],
        ]);

        return redirect()->route('admin.info-admin')->with('success', 'Admin berhasil ditambahkan!');
    }
    
    public function editAdmin(Admin $admin): View
    {
        $currentAdmin = Auth::guard('admin')->user();
        return view('admin.edit-admin', compact('admin', 'currentAdmin'));
    }
    
    public function updateAdmin(Request $request, Admin $admin)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:admins,username,' . $admin->id,
            'email' => 'required|string|email|max:255|unique:admins,email,' . $admin->id,
            'password' => 'nullable|string|min:8|confirmed',
            'category' => 'required|in:bpc,bpd',
        ]);

        $admin->update([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'email' => $validated['email'],
            'category' => $validated['category'],
        ]);

        if ($request->filled('password')) {
            $admin->update(['password' => Hash::make($validated['password'])]);
        }

        return redirect()->route('admin.info-admin')->with('success', 'Admin berhasil diupdate!');
    }
    
    public function deleteAdmin(Admin $admin)
    {
        $admin->delete();
        return redirect()->route('admin.info-admin')->with('success', 'Admin berhasil dihapus!');
    }
}