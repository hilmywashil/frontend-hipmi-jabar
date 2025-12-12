@extends('layouts.app')

@section('title', 'Organisasi - HIPMI Jawa Barat')

@section('content')
    <section class="page-banner">
        <h1>Struktur Organisasi</h1>
        <p>Struktur Organisasi BPD HIPMI Jawa Barat</p>
    </section>
    <section class="organisasi">
        <div class="organisasi-layout1">
            <div class="green-accent" style="align-self: center;"></div>
            <h2 class="org-heading">Ketua Umum</h2>
            <a href="{{ route('e-katalog.detail') }}">
                <div class="organisasi-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                        <p>Jabatan Pengurus</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="organisasi-layout1">
            <div class="green-accent" style="align-self: center; background-color: #4287f5"></div>
            <h2 class="org-heading">Wakil Ketua Umum</h2>
            <a href="{{ route('e-katalog.detail') }}">
                <div class="organisasi-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                        <p>Jabatan Pengurus</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="organisasi-layout2">
            <div class="green-accent" style="align-self: center; background-color: #ec1846"></div>
            <h2 class="org-heading">Ketua Bidang - Bidang</h2>
            <div class="organisasi-layout2-content">
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="organisasi-layout1">
            <div class="green-accent" style="align-self: center;"></div>
            <h2 class="org-heading">Sekretaris Umum</h2>
            <a href="{{ route('e-katalog.detail') }}">
                <div class="organisasi-card">
                    <img src="{{ asset('images/photo.jpg') }}">
                    <div class="container">
                        <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                        <p>Jabatan Pengurus</p>
                    </div>
                </div>
            </a>
        </div>
        <div class="organisasi-layout2">
            <div class="green-accent" style="align-self: center; background-color: #4287f5"></div>
            <h2 class="org-heading">Wakil Sekretaris Umum</h2>
            <div class="organisasi-layout2-content">
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
                <a href="{{ route('e-katalog.detail') }}">
                    <div class="organisasi-card">
                        <img src="{{ asset('images/photo.jpg') }}">
                        <div class="container">
                            <h4><b>{{ Str::limit('Nama Pengurus', 20, '...') }}</b></h4>
                            <p>Jabatan Pengurus</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>

    </section>
@endsection