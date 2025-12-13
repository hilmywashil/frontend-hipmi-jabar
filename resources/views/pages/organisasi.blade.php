@extends('layouts.app')

@section('title', 'Organisasi - HIPMI Jawa Barat')

@section('content')
    <section class="page-banner">
        <h1>Struktur Organisasi</h1>
        <p>Struktur Organisasi BPD HIPMI Jawa Barat</p>
    </section>
    <section class="organisasi">
        {{-- Ketua Umum --}}
        @php
            $ketuaUmum = \App\Models\Organisasi::aktif()->kategori('ketua_umum')->ordered()->first();
        @endphp
        @if($ketuaUmum)
            <div class="organisasi-layout1">
                <div class="green-accent" style="align-self: center;"></div>
                <h2 class="org-heading">Ketua Umum</h2>
                <div class="organisasi-card" onclick="showModal('{{ addslashes($ketuaUmum->nama) }}', '{{ addslashes($ketuaUmum->jabatan) }}', '{{ $ketuaUmum->kategori_label }}', '{{ $ketuaUmum->foto_url }}')">
                    <img src="{{ $ketuaUmum->foto_url }}" alt="{{ $ketuaUmum->nama }}">
                    <div class="container">
                        <h4><b>{{ Str::limit($ketuaUmum->nama, 20, '...') }}</b></h4>
                        <p>{{ $ketuaUmum->jabatan }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Wakil Ketua Umum --}}
        @php
            $wakilKetuaUmum = \App\Models\Organisasi::aktif()->kategori('wakil_ketua_umum')->ordered()->get();
        @endphp
        @if($wakilKetuaUmum->count() > 0)
            <div class="organisasi-layout1">
                <div class="green-accent" style="align-self: center; background-color: #4287f5"></div>
                <h2 class="org-heading">Wakil Ketua Umum</h2>
                @foreach($wakilKetuaUmum as $wakil)
                    <div class="organisasi-card" onclick="showModal('{{ addslashes($wakil->nama) }}', '{{ addslashes($wakil->jabatan) }}', '{{ $wakil->kategori_label }}', '{{ $wakil->foto_url }}')">
                        <img src="{{ $wakil->foto_url }}" alt="{{ $wakil->nama }}">
                        <div class="container">
                            <h4><b>{{ Str::limit($wakil->nama, 20, '...') }}</b></h4>
                            <p>{{ $wakil->jabatan }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        {{-- Ketua Bidang --}}
        @php
            $ketuaBidang = \App\Models\Organisasi::aktif()->kategori('ketua_bidang')->ordered()->get();
        @endphp
        @if($ketuaBidang->count() > 0)
            <div class="organisasi-layout2">
                <div class="green-accent" style="align-self: center; background-color: #ec1846"></div>
                <h2 class="org-heading">Ketua Bidang - Bidang</h2>
                <div class="organisasi-layout2-content">
                    @foreach($ketuaBidang as $bidang)
                        <div class="organisasi-card" onclick="showModal('{{ addslashes($bidang->nama) }}', '{{ addslashes($bidang->jabatan) }}', '{{ $bidang->kategori_label }}', '{{ $bidang->foto_url }}')">
                            <img src="{{ $bidang->foto_url }}" alt="{{ $bidang->nama }}">
                            <div class="container">
                                <h4><b>{{ Str::limit($bidang->nama, 20, '...') }}</b></h4>
                                <p>{{ $bidang->jabatan }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- Sekretaris Umum --}}
        @php
            $sekretarisUmum = \App\Models\Organisasi::aktif()->kategori('sekretaris_umum')->ordered()->first();
        @endphp
        @if($sekretarisUmum)
            <div class="organisasi-layout1">
                <div class="green-accent" style="align-self: center;"></div>
                <h2 class="org-heading">Sekretaris Umum</h2>
                <div class="organisasi-card" onclick="showModal('{{ addslashes($sekretarisUmum->nama) }}', '{{ addslashes($sekretarisUmum->jabatan) }}', '{{ $sekretarisUmum->kategori_label }}', '{{ $sekretarisUmum->foto_url }}')">
                    <img src="{{ $sekretarisUmum->foto_url }}" alt="{{ $sekretarisUmum->nama }}">
                    <div class="container">
                        <h4><b>{{ Str::limit($sekretarisUmum->nama, 20, '...') }}</b></h4>
                        <p>{{ $sekretarisUmum->jabatan }}</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Wakil Sekretaris Umum --}}
        @php
            $wakilSekretarisUmum = \App\Models\Organisasi::aktif()->kategori('wakil_sekretaris_umum')->ordered()->get();
        @endphp
        @if($wakilSekretarisUmum->count() > 0)
            <div class="organisasi-layout2">
                <div class="green-accent" style="align-self: center; background-color: #4287f5"></div>
                <h2 class="org-heading">Wakil Sekretaris Umum</h2>
                <div class="organisasi-layout2-content">
                    @foreach($wakilSekretarisUmum as $wakilSekretaris)
                        <div class="organisasi-card" onclick="showModal('{{ addslashes($wakilSekretaris->nama) }}', '{{ addslashes($wakilSekretaris->jabatan) }}', '{{ $wakilSekretaris->kategori_label }}', '{{ $wakilSekretaris->foto_url }}')">
                            <img src="{{ $wakilSekretaris->foto_url }}" alt="{{ $wakilSekretaris->nama }}">
                            <div class="container">
                                <h4><b>{{ Str::limit($wakilSekretaris->nama, 20, '...') }}</b></h4>
                                <p>{{ $wakilSekretaris->jabatan }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </section>

    {{-- Modal Popup --}}
    <div class="modal-overlay" id="modalOverlay" onclick="closeModal(event)">
        <div class="modal-content" onclick="event.stopPropagation()">
            <button class="modal-close" onclick="closeModal()">
                <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                    <line x1="18" y1="6" x2="6" y2="18"></line>
                    <line x1="6" y1="6" x2="18" y2="18"></line>
                </svg>
            </button>
            
            {{-- Header dengan Logo --}}
            <div class="modal-header">
                <div class="modal-header-content">
                    <img src="{{ asset('images/hipmi-logo.png') }}" alt="HIPMI Logo" class="modal-logo">
                    <div class="modal-header-text">
                        <div class="modal-org-name">HIPMI</div>
                        <div class="modal-org-region">JAWA BARAT</div>
                    </div>
                </div>
            </div>

            {{-- Diagonal Split Design --}}
            <div class="modal-photo-container">
                <div class="modal-diagonal-bg"></div>
                <div class="modal-photo-circle">
                    <img id="modalPhoto" class="modal-photo" src="" alt="">
                </div>
            </div>

            {{-- Body Content --}}
            <div class="modal-body">
                <h2 id="modalNama" class="modal-nama"></h2>
                <p id="modalJabatan" class="modal-jabatan"></p>
            </div>
        </div>
    </div>

    <style>
        /* Modal Styles */
        .modal-overlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.7);
            z-index: 9999;
            align-items: center;
            justify-content: center;
            padding: 1rem;
            backdrop-filter: blur(4px);
        }

        .modal-overlay.active {
            display: flex;
        }

        .modal-content {
            background: white;
            border-radius: 20px;
            max-width: 450px;
            width: 100%;
            max-height: 90vh;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: modalSlideUp 0.3s ease;
            position: relative;
        }

        @keyframes modalSlideUp {
            from {
                opacity: 0;
                transform: translateY(50px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .modal-close {
            position: absolute;
            top: 1rem;
            right: 1rem;
            background: rgba(255, 255, 255, 0.9);
            border: none;
            width: 36px;
            height: 36px;
            border-radius: 50%;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
            z-index: 10;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.15);
        }

        .modal-close:hover {
            background: white;
            transform: rotate(90deg);
        }

        .modal-close svg {
            width: 20px;
            height: 20px;
            stroke: #04293B;
        }

        /* Header with Logo */
        .modal-header {
            background: #04293B;
            padding: 1.5rem;
            position: relative;
            z-index: 2;
        }

        .modal-header-content {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .modal-logo {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }

        .modal-header-text {
            display: flex;
            flex-direction: column;
        }

        .modal-org-name {
            color: white;
            font-size: 1.5rem;
            font-weight: 700;
            line-height: 1;
            letter-spacing: 1px;
        }

        .modal-org-region {
            color: #FDB515;
            font-size: 0.875rem;
            font-weight: 600;
            letter-spacing: 2px;
            margin-top: 0.25rem;
        }

        /* Photo Container with Diagonal Design */
        .modal-photo-container {
            position: relative;
            height: 400px;
            background: linear-gradient(135deg, #04293B 0%, #04293B 50%, white 50%, white 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .modal-diagonal-bg {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, #04293B 0%, #04293B 48%, white 52%, white 100%);
        }

        .modal-diagonal-bg::before {
            content: '';
            position: absolute;
            bottom: 0;
            right: 0;
            width: 150px;
            height: 100px;
            background: linear-gradient(135deg, transparent 0%, transparent 50%, #6DBAED 50%, #6DBAED 100%);
        }

        .modal-diagonal-bg::after {
            content: '';
            position: absolute;
            bottom: 30px;
            right: 30px;
            width: 100px;
            height: 70px;
            background: linear-gradient(135deg, transparent 0%, transparent 50%, #6DBAED 50%, #6DBAED 100%);
            opacity: 0.7;
        }

        .modal-photo-circle {
            position: relative;
            z-index: 1;
            width: 220px;
            height: 220px;
            border-radius: 50%;
            border: 6px solid #6DBAED;
            overflow: hidden;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
        }

        .modal-photo {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        /* Body Content */
        .modal-body {
            padding: 2rem;
            text-align: center;
            background: white;
        }

        .modal-nama {
            font-size: 1.75rem;
            font-weight: 700;
            color: #04293B;
            margin-bottom: 0.5rem;
            line-height: 1.3;
        }

        .modal-jabatan {
            font-size: 1rem;
            color: #6b7280;
            font-weight: 500;
            line-height: 1.5;
        }

        @media (max-width: 768px) {
            .modal-content {
                margin: 1rem;
                max-width: 100%;
            }

            .modal-header {
                padding: 1.25rem;
            }

            .modal-logo {
                width: 50px;
                height: 50px;
            }

            .modal-org-name {
                font-size: 1.25rem;
            }

            .modal-org-region {
                font-size: 0.75rem;
            }

            .modal-photo-container {
                height: 350px;
            }

            .modal-photo-circle {
                width: 180px;
                height: 180px;
                border-width: 5px;
            }

            .modal-body {
                padding: 1.5rem;
            }

            .modal-nama {
                font-size: 1.5rem;
            }

            .modal-jabatan {
                font-size: 0.9375rem;
            }
        }

        @media (max-width: 480px) {
            .modal-photo-container {
                height: 300px;
            }

            .modal-photo-circle {
                width: 160px;
                height: 160px;
            }
        }
    </style>

    <script>
        function showModal(nama, jabatan, kategori, foto) {
            document.getElementById('modalPhoto').src = foto;
            document.getElementById('modalNama').textContent = nama;
            document.getElementById('modalJabatan').textContent = jabatan;
            document.getElementById('modalOverlay').classList.add('active');
            document.body.style.overflow = 'hidden';
        }

        function closeModal(event) {
            if (event && event.target !== document.getElementById('modalOverlay')) {
                return;
            }
            document.getElementById('modalOverlay').classList.remove('active');
            document.body.style.overflow = 'auto';
        }

        // Close modal with ESC key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    </script>
@endsection