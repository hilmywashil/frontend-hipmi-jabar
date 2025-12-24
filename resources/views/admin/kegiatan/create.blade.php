{{-- resources/views/admin/kegiatan/create.blade.php --}}
@extends('admin.layouts.admin-layout')

@section('title', 'Tambah Kegiatan')
@section('page-title', 'Tambah Kegiatan')

@php
$activeMenu = 'kegiatan';
@endphp

@push('styles')
<style>
    .form-container {
        background: white;
        border-radius: 12px;
        padding: 2rem;
        box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
        max-width: 900px;
    }

    .form-group {
        margin-bottom: 1.5rem;
    }

    .form-label {
        display: block;
        font-weight: 600;
        color: #374151;
        margin-bottom: 0.5rem;
        font-size: 0.875rem;
    }

    .required {
        color: #dc2626;
    }

    .form-input,
    .form-textarea,
    .form-select {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #d1d5db;
        border-radius: 8px;
        font-size: 0.9375rem;
        transition: all 0.2s;
        font-family: 'Montserrat', sans-serif;
    }

    .form-input:focus,
    .form-textarea:focus,
    .form-select:focus {
        outline: none;
        border-color: #0a2540;
        box-shadow: 0 0 0 3px rgba(10, 37, 64, 0.1);
    }

    .form-textarea {
        min-height: 200px;
        resize: vertical;
    }

    .form-help {
        font-size: 0.8125rem;
        color: #6b7280;
        margin-top: 0.375rem;
    }

    .error-message {
        color: #dc2626;
        font-size: 0.8125rem;
        margin-top: 0.375rem;
    }

    .image-preview {
        margin-top: 1rem;
        display: none;
    }

    .image-preview img {
        max-width: 300px;
        border-radius: 8px;
        border: 2px solid #e5e7eb;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 0.5rem;
        margin-top: 0.5rem;
    }

    .checkbox-group input[type="checkbox"] {
        width: 18px;
        height: 18px;
        cursor: pointer;
    }

    .checkbox-group label {
        cursor: pointer;
        user-select: none;
        font-weight: 500;
        color: #374151;
    }

    .form-actions {
        display: flex;
        gap: 1rem;
        margin-top: 2rem;
        padding-top: 2rem;
        border-top: 1px solid #e5e7eb;
    }

    .btn-submit,
    .btn-cancel {
        padding: 0.75rem 2rem;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.3s;
        text-decoration: none;
        display: inline-block;
        text-align: center;
        font-family: 'Montserrat', sans-serif;
        border: none;
    }

    .btn-submit {
        background: #0a2540;
        color: white;
    }

    .btn-submit:hover {
        background: #ffd700;
        color: #0a2540;
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(255, 215, 0, 0.4);
    }

    .btn-cancel {
        background: #f3f4f6;
        color: #374151;
    }

    .btn-cancel:hover {
        background: #e5e7eb;
    }

    .back-link {
        display: inline-flex;
        align-items: center;
        gap: 0.5rem;
        color: #6b7280;
        text-decoration: none;
        margin-bottom: 1.5rem;
        font-weight: 500;
        transition: color 0.2s;
    }

    .back-link:hover {
        color: #0a2540;
    }

    @media (max-width: 1024px) {
        .form-container {
            padding: 1.5rem;
        }

        .form-actions {
            flex-direction: column;
        }

        .btn-submit,
        .btn-cancel {
            width: 100%;
        }
    }
</style>
@endpush

@section('content')
<a href="{{ route('admin.kegiatan.index') }}" class="back-link">
    <svg viewBox="0 0 24 24" width="20" height="20" style="stroke: currentColor; fill: none; stroke-width: 2;">
        <line x1="19" y1="12" x2="5" y2="12" />
        <polyline points="12 19 5 12 12 5" />
    </svg>
    Kembali ke Daftar Kegiatan
</a>

<div class="form-container">
    <form action="{{ route('admin.kegiatan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label class="form-label">
                Judul Kegiatan <span class="required">*</span>
            </label>
            <input type="text" name="judul" class="form-input" value="{{ old('judul') }}" required
                placeholder="Masukkan judul kegiatan">
            @error('judul')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <div class="form-help">Judul akan otomatis dijadikan URL (slug)</div>
        </div>

        <div class="form-group">
            <label class="form-label">
                Bidang <span class="required">*</span>
            </label>
            <select name="bidang" class="form-select" required>
                <option value="">Pilih Bidang</option>
                <option value="Bidang 1" {{ old('bidang') == 'Bidang 1' ? 'selected' : '' }}>Bidang 1</option>
                <option value="Bidang 2" {{ old('bidang') == 'Bidang 2' ? 'selected' : '' }}>Bidang 2</option>
                <option value="Bidang 3" {{ old('bidang') == 'Bidang 3' ? 'selected' : '' }}>Bidang 3</option>
                <option value="Bidang 4" {{ old('bidang') == 'Bidang 4' ? 'selected' : '' }}>Bidang 4</option>
                <option value="Bidang 5" {{ old('bidang') == 'Bidang 5' ? 'selected' : '' }}>Bidang 5</option>
                <option value="Bidang 6" {{ old('bidang') == 'Bidang 6' ? 'selected' : '' }}>Bidang 6</option>
                <option value="Bidang 7" {{ old('bidang') == 'Bidang 7' ? 'selected' : '' }}>Bidang 7</option>
                <option value="Bidang 8" {{ old('bidang') == 'Bidang 8' ? 'selected' : '' }}>Bidang 8</option>
                <option value="Bidang 9" {{ old('bidang') == 'Bidang 9' ? 'selected' : '' }}>Bidang 9</option>
                <option value="Bidang 10" {{ old('bidang') == 'Bidang 10' ? 'selected' : '' }}>Bidang 10</option>
            </select>
            @error('bidang')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <div class="form-help">Pilih bidang kegiatan BPD</div>
        </div>

        <div class="form-group">
            <label class="form-label">
                Konten Kegiatan <span class="required">*</span>
            </label>
            <textarea name="konten" class="form-textarea" required
                placeholder="Tulis konten kegiatan lengkap...">{{ old('konten') }}</textarea>
            @error('konten')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">
                Gambar Utama <span class="required">*</span>
            </label>
            <input type="file" name="gambar" class="form-input" accept="image/jpeg,image/jpg,image/png" required
                onchange="previewImage(event)">
            @error('gambar')
            <div class="error-message">{{ $message }}</div>
            @enderror
            <div class="form-help">Format: JPG, JPEG, PNG. Maksimal 2MB</div>
            <div class="image-preview" id="imagePreview">
                <img src="" alt="Preview" id="previewImg">
            </div>
        </div>

        <div class="form-group">
            <label class="form-label">
                Tanggal Publish <span class="required">*</span>
            </label>
            <input type="date" name="tanggal_publish" class="form-input" value="{{ old('tanggal_publish', date('Y-m-d')) }}"
                required>
            @error('tanggal_publish')
            <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Pengaturan Kegiatan</label>

            <div class="checkbox-group">
                <input type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active">Aktifkan Kegiatan (tampil di halaman publik)</label>
            </div>

            <div class="checkbox-group">
                <input type="checkbox" name="is_populer" id="is_populer" value="1" {{ old('is_populer') ? 'checked' : '' }}>
                <label for="is_populer">Tandai sebagai Kegiatan Populer</label>
            </div>
        </div>

        <div class="form-actions">
            <button type="submit" class="btn-submit">Simpan Kegiatan</button>
            <a href="{{ route('admin.kegiatan.index') }}" class="btn-cancel">Batal</a>
        </div>
    </form>
</div>

@push('scripts')
<script>
    function previewImage(event) {
        const preview = document.getElementById('imagePreview');
        const previewImg = document.getElementById('previewImg');
        const file = event.target.files[0];

        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                previewImg.src = e.target.result;
                preview.style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    }
</script>
@endpush
@endsection