@extends ('layouts.app')

@section('title', 'Informasi Kegiatan - HIPMI Jawa Barat')

@section('content')
    <section class="page-banner">
        <h1>Informasi Kegiatan BPD</h1>
        <p>Anggota & Pengurus HIPMI Jawa Barat</p>
    </section>

    <section class="search-katalog">
        <form action="{{ route('e-katalog') }}" method="GET" class="search-box">
            <input type="text" name="search" placeholder="Cari nama perusahaan atau bidang..."
                value="{{ request('search') }}">
            <button type="submit" style="background: none; border: none; cursor: pointer;">
            </button>
        </form>
    </section>
@endsection