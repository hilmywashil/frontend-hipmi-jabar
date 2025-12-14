<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class AnggotaController extends Controller
{
    public function store(Request $request)
    {
        // Validasi
        $validator = Validator::make($request->all(), [
            // Data Pribadi
            'nama_usaha' => 'required|string|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan', // DIPERBAIKI: huruf kapital
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:255',
            'nomor_telepon' => 'required|string|max:20',
            'domisili' => 'required|string|max:255',
            'alamat_domisili' => 'required|string',
            'kode_pos' => 'required|string|max:10',
            'email' => 'required|email|max:255',
            'nomor_ktp' => 'required|string|size:16',
            'foto_ktp' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'foto_diri' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            
            // Profile Perusahaan
            'nama_usaha_perusahaan' => 'required|string|max:255',
            'legalitas_usaha' => 'required|in:PT,CV,PT Perorangan',
            'jabatan_usaha' => 'required|string|max:255',
            'alamat_kantor' => 'required|string',
            'bidang_usaha' => 'required|string',
            'brand_usaha' => 'required|string|max:255',
            'jumlah_karyawan' => 'required|integer|min:0',
            'nomor_ktp_perusahaan' => 'required|string|size:16',
            'usia_perusahaan' => 'required|string',
            'omset_perusahaan' => 'required|string',
            'npwp_perusahaan' => 'required|string|max:255',
            'no_nota_pendirian' => 'required|string|max:255',
            'profile_perusahaan' => 'required|mimes:pdf|max:5120',
            'logo_perusahaan' => 'required|image|mimes:jpeg,jpg,png|max:2048',
            
            // Organisasi
            'sfc_hipmi' => 'required|string|max:255',
            'referensi_hipmi' => 'required|in:Ya,Tidak',
            'organisasi_lain' => 'required|in:Ya,Tidak',
            'pernyataan' => 'required|accepted', // DIPERBAIKI: gunakan accepted
        ], [
            'required' => ':attribute wajib diisi.',
            'email' => 'Format email tidak valid.',
            'image' => ':attribute harus berupa gambar.',
            'mimes' => ':attribute harus berformat :values.',
            'max' => ':attribute maksimal :max KB.',
            'size' => ':attribute harus :size karakter.',
            'integer' => ':attribute harus berupa angka.',
            'in' => ':attribute tidak valid.',
            'accepted' => 'Anda harus menyetujui pernyataan ini.',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Upload foto KTP
            $fotoKtpPath = $request->file('foto_ktp')->store('anggota/ktp', 'public');
            
            // Upload foto diri
            $fotoDiriPath = $request->file('foto_diri')->store('anggota/foto', 'public');
            
            // Upload profile perusahaan (PDF)
            $profilePath = $request->file('profile_perusahaan')->store('anggota/profile', 'public');
            
            // Upload logo perusahaan
            $logoPath = $request->file('logo_perusahaan')->store('anggota/logo', 'public');

            // Simpan data ke database
            Anggota::create([
                // Data Pribadi
                'nama_usaha' => $request->nama_usaha,
                'jenis_kelamin' => $request->jenis_kelamin,
                'tempat_lahir' => $request->tempat_lahir,
                'tanggal_lahir' => $request->tanggal_lahir,
                'agama' => $request->agama,
                'nomor_telepon' => $request->nomor_telepon,
                'domisili' => $request->domisili,
                'alamat_domisili' => $request->alamat_domisili,
                'kode_pos' => $request->kode_pos,
                'email' => $request->email,
                'nomor_ktp' => $request->nomor_ktp,
                'foto_ktp' => $fotoKtpPath,
                'foto_diri' => $fotoDiriPath,
                
                // Profile Perusahaan
                'nama_usaha_perusahaan' => $request->nama_usaha_perusahaan,
                'legalitas_usaha' => $request->legalitas_usaha,
                'jabatan_usaha' => $request->jabatan_usaha,
                'alamat_kantor' => $request->alamat_kantor,
                'bidang_usaha' => $request->bidang_usaha,
                'brand_usaha' => $request->brand_usaha,
                'jumlah_karyawan' => $request->jumlah_karyawan,
                'nomor_ktp_perusahaan' => $request->nomor_ktp_perusahaan,
                'usia_perusahaan' => $request->usia_perusahaan,
                'omset_perusahaan' => $request->omset_perusahaan,
                'npwp_perusahaan' => $request->npwp_perusahaan,
                'no_nota_pendirian' => $request->no_nota_pendirian,
                'profile_perusahaan' => $profilePath,
                'logo_perusahaan' => $logoPath,
                
                // Organisasi
                'sfc_hipmi' => $request->sfc_hipmi,
                'referensi_hipmi' => $request->referensi_hipmi,
                'organisasi_lain' => $request->organisasi_lain,
                
                // Status default pending
                'status' => 'pending',
            ]);

            return redirect()->route('jadi-anggota')
                ->with('success', 'Pendaftaran berhasil! Data Anda akan segera diverifikasi oleh admin.');

        } catch (\Exception $e) {
            // Hapus file yang sudah diupload jika ada error
            if (isset($fotoKtpPath)) Storage::disk('public')->delete($fotoKtpPath);
            if (isset($fotoDiriPath)) Storage::disk('public')->delete($fotoDiriPath);
            if (isset($profilePath)) Storage::disk('public')->delete($profilePath);
            if (isset($logoPath)) Storage::disk('public')->delete($logoPath);

            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }
}