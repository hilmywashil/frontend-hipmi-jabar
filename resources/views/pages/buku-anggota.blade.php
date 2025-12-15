@extends ('layouts.app')

@section('title', 'Buku Informasi Anggota - HIPMI Jawa Barat')

@section('content')
    <section class="page-banner">
        <h1>Buku Informasi Anggota</h1>
        <p>Berisi informasi mengenai anggota kami</p>
    </section>

    <section class="search-katalog">
        <form action="{{ route('e-katalog') }}" method="GET" class="search-box">
            <input type="text" name="search" placeholder="Cari Anggota..." value="{{ request('search') }}">
            <button type="submit" style="background: none; border: none; cursor: pointer;">
            </button>
        </form>
    </section>


    <section class="buku-informasi-anggota">

        <div class="buku-filter">

        </div>

        <div class="buku-informasi-anggota-content">

            <a href="{{ route('detail-buku') }}">
                <div class="buku-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>Nama Anggota</b></h4>
                        <p>Jabatan Anggota</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('detail-buku') }}">
                <div class="buku-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>Nama Anggota</b></h4>
                        <p>Jabatan Anggota</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('detail-buku') }}">
                <div class="buku-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>Nama Anggota</b></h4>
                        <p>Jabatan Anggota</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('detail-buku') }}">
                <div class="buku-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>Nama Anggota</b></h4>
                        <p>Jabatan Anggota</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('detail-buku') }}">
                <div class="buku-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>Nama Anggota</b></h4>
                        <p>Jabatan Anggota</p>
                    </div>
                </div>
            </a>
            <a href="{{ route('detail-buku') }}">
                <div class="buku-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>Nama Anggota</b></h4>
                        <p>Jabatan Anggota</p>
                    </div>
                </div>
            </a>
        </div>

    </section>
@endsection