@extends('layouts.app')

@section('title', 'E-Katalog - HIPMI Jawa Barat')

@section('content')

    <section class="page-banner">
        <h1>E-Katalog</h1>
        <p>Anggota & Pengurus HIPMI Jawa Barat</p>
    </section>
    <section class="search-katalog">
        <div class="search-box">
            <input type="text" placeholder="Search...">
            <i class="fa fa-search"></i>
        </div>
    </section>

    <section class="e-katalog-content">

        <!-- Looping dari sini cuy -->
        <a href="{{ route('e-katalog.detail') }}">
            <div class="katalog-card">
                <img src="{{ asset('images/hipmi-logo.png') }}">
                <div class="container">
                    <h4><b>{{ Str::limit('Nama Perusahaan', 20, '...') }}</b></h4>
                    <p>Bidang Perusahaan</p>
                </div>
            </div>
        </a>
        <a href="{{ route('e-katalog.detail') }}">
            <div class="katalog-card">
                <img src="{{ asset('images/hipmi-logo.png') }}">
                <div class="container">
                    <h4><b>{{ Str::limit('Nama Perusahaan', 20, '...') }}</b></h4>
                    <p>Bidang Perusahaan</p>
                </div>
            </div>
        </a>
    </section>
@endsection