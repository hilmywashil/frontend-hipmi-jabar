{{-- resources/views/pages/details/kegiatan-detail.blade.php --}}
@extends ('layouts.app')

@section('title', $kegiatan->judul . ' - Kegiatan HIPMI Jawa Barat')

@section('content')

    <section class="page-banner">
        <h1>{{ $kegiatan->judul }}</h1>
        <p>{{ $kegiatan->tanggal_publish->format('d F Y') }}</p>
    </section>

    <section class="detail-berita">
        <div class="detail-berita-content">
            <img src="{{ asset('storage/' . $kegiatan->gambar) }}" alt="{{ $kegiatan->judul }}">
            
            {{-- Tampilkan konten dengan format paragraf --}}
            <p>{!! nl2br(e($kegiatan->konten)) !!}</p>
        </div>
        
        <div class="berita-detail-right">
            <h1 class="berita-badge">Kegiatan Lainnya</h1>
            
            @forelse($kegiatanLainnya as $item)
            <div class="berita-detail-right-item">
                <a href="{{ route('detail-kegiatan', $item->slug) }}" class="berita-detail-right-item-image">
                    <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}">
                </a>
                <div class="berita-detail-right-item-content">
                    <div>
                        <h3>{{ $item->judul }}</h3>
                        <p class="berita-home-date">{{ $item->tanggal_publish->format('F d, Y') }}</p>
                        <p>{{ Str::limit($item->konten, 100, '...') }}</p>
                    </div>
                </div>
            </div>
            @empty
            <p style="text-align: center; color: #6b7280; padding: 1rem;">Belum ada kegiatan lainnya</p>
            @endforelse
        </div>
    </section>
@endsection