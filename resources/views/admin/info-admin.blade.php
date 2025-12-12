<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Info Admin - HIPMI Jawa Barat</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Montserrat', sans-serif;
            background: #f5f7fa;
            display: flex;
            min-height: 100vh;
        }

        /* Reuse all sidebar styles from dashboard */
        .sidebar {
            width: 280px;
            background: #0a2540;
            display: flex;
            flex-direction: column;
            position: fixed;
            height: 100vh;
            z-index: 100;
        }

        .sidebar-header {
            padding: 2rem 1.5rem;
            border-bottom: 1px solid rgba(255,255,255,0.1);
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .brand-logo {
            width: 50px;
            height: 50px;
            background: #ffd700;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .brand-text {
            color: white;
        }

        .brand-title {
            font-size: 1.125rem;
            font-weight: 700;
        }

        .brand-subtitle {
            font-size: 0.75rem;
            color: #ffd700;
            font-weight: 600;
        }

        .sidebar-menu {
            flex: 1;
            padding: 1.5rem 0;
            overflow-y: auto;
        }

        .menu-section {
            margin-bottom: 2rem;
        }

        .menu-label {
            padding: 0 1.5rem;
            font-size: 0.75rem;
            font-weight: 700;
            color: rgba(255,255,255,0.5);
            text-transform: uppercase;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
        }

        .menu-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.875rem 1.5rem;
            color: rgba(255,255,255,0.7);
            text-decoration: none;
            transition: all 0.2s;
            border-left: 3px solid transparent;
            font-size: 0.9375rem;
            cursor: pointer;
        }

        .menu-item:hover {
            background: rgba(255,255,255,0.05);
            color: white;
            border-left-color: #ffd700;
        }

        .menu-item.active {
            background: rgba(255,215,0,0.1);
            color: white;
            border-left-color: #ffd700;
            font-weight: 600;
        }

        .menu-item svg {
            width: 20px;
            height: 20px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        .menu-dropdown {
            position: relative;
        }

        .menu-item.has-dropdown {
            justify-content: space-between;
        }

        .dropdown-icon {
            width: 16px;
            height: 16px;
            transition: transform 0.3s ease;
        }

        .menu-item.has-dropdown.active .dropdown-icon {
            transform: rotate(180deg);
        }

        .submenu {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            background: rgba(0,0,0,0.2);
        }

        .submenu.active {
            max-height: 300px;
        }

        .submenu-item {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 0.75rem 1.5rem 0.75rem 3.5rem;
            color: rgba(255,255,255,0.6);
            text-decoration: none;
            transition: all 0.2s;
            font-size: 0.875rem;
            border-left: 3px solid transparent;
        }

        .submenu-item:hover {
            background: rgba(255,255,255,0.05);
            color: white;
            border-left-color: #ffd700;
        }

        .submenu-item.active {
            background: rgba(255,215,0,0.1);
            color: white;
            border-left-color: #ffd700;
            font-weight: 600;
        }

        .submenu-item svg {
            width: 16px;
            height: 16px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        .sidebar-footer {
            padding: 1.5rem;
            border-top: 1px solid rgba(255,255,255,0.1);
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 1rem;
            padding: 1rem;
            background: rgba(255,255,255,0.05);
            border-radius: 8px;
        }

        .user-avatar {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #ffd700;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0a2540;
            font-weight: 700;
            font-size: 1.125rem;
        }

        .user-details {
            flex: 1;
            min-width: 0;
        }

        .user-name {
            font-size: 0.875rem;
            font-weight: 600;
            color: white;
        }

        .user-role {
            font-size: 0.75rem;
            color: #ffd700;
            font-weight: 600;
        }

        .main-content {
            flex: 1;
            margin-left: 280px;
            display: flex;
            flex-direction: column;
        }

        .topbar {
            background: white;
            padding: 1.25rem 2rem;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .topbar-left h2 {
            font-size: 1.75rem;
            color: #0a2540;
            margin-bottom: 0.25rem;
            font-weight: 700;
        }

        .topbar-subtitle {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .topbar-actions {
            display: flex;
            gap: 1rem;
            align-items: center;
        }

        .icon-btn {
            width: 42px;
            height: 42px;
            border-radius: 8px;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: all 0.2s;
        }

        .icon-btn:hover {
            background: #e5e7eb;
        }

        .icon-btn svg {
            width: 20px;
            height: 20px;
            stroke: #374151;
            fill: none;
            stroke-width: 2;
        }

        .logout-btn {
            background: #dc2626;
            color: white;
            border: none;
            padding: 0.625rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s;
            font-family: 'Montserrat', sans-serif;
        }

        .logout-btn:hover {
            background: #b91c1c;
        }

        .content {
            padding: 2rem;
            flex: 1;
        }

        .page-header {
            background: white;
            padding: 2rem;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .page-title {
            font-size: 1.75rem;
            font-weight: 700;
            color: #0a2540;
            margin-bottom: 0.5rem;
        }

        .page-desc {
            color: #6b7280;
            font-size: 0.9375rem;
        }

        .btn-primary {
            background: #0a2540;
            color: white;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 8px;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 600;
            transition: all 0.2s;
            font-family: 'Montserrat', sans-serif;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-primary:hover {
            background: #ffd700;
            color: #0a2540;
        }

        .btn-primary svg {
            width: 18px;
            height: 18px;
            stroke: currentColor;
            fill: none;
            stroke-width: 2;
        }

        .admin-table-container {
            background: white;
            border-radius: 12px;
            box-shadow: 0 1px 3px rgba(0,0,0,0.1);
            overflow: hidden;
        }

        .table-header {
            padding: 1.5rem 2rem;
            border-bottom: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .table-title {
            font-size: 1.125rem;
            font-weight: 700;
            color: #0a2540;
        }

        .search-box {
            position: relative;
        }

        .search-input {
            padding: 0.625rem 1rem 0.625rem 2.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 8px;
            font-size: 0.875rem;
            width: 300px;
            font-family: 'Montserrat', sans-serif;
        }

        .search-input:focus {
            outline: none;
            border-color: #ffd700;
        }

        .search-icon {
            position: absolute;
            left: 0.75rem;
            top: 50%;
            transform: translateY(-50%);
            width: 18px;
            height: 18px;
            stroke: #6b7280;
        }

        .admin-table {
            width: 100%;
            border-collapse: collapse;
        }

        .admin-table thead {
            background: #f9fafb;
        }

        .admin-table th {
            padding: 1rem 2rem;
            text-align: left;
            font-size: 0.75rem;
            font-weight: 700;
            color: #6b7280;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .admin-table td {
            padding: 1.25rem 2rem;
            border-top: 1px solid #e5e7eb;
        }

        .admin-table tbody tr {
            transition: background 0.2s;
        }

        .admin-table tbody tr:hover {
            background: #f9fafb;
        }

        .admin-cell {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .admin-avatar-table {
            width: 45px;
            height: 45px;
            border-radius: 50%;
            background: #ffd700;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #0a2540;
            font-weight: 700;
            font-size: 1rem;
            flex-shrink: 0;
        }

        .admin-details {
            flex: 1;
            min-width: 0;
        }

        .admin-name-table {
            font-weight: 600;
            color: #0a2540;
            font-size: 0.9375rem;
            margin-bottom: 0.25rem;
        }

        .admin-email-table {
            font-size: 0.8125rem;
            color: #6b7280;
        }

        .badge {
            padding: 0.375rem 0.875rem;
            border-radius: 6px;
            font-size: 0.75rem;
            font-weight: 700;
            letter-spacing: 0.5px;
        }

        .badge-bpc {
            background: #ffd700;
            color: #0a2540;
        }

        .badge-bpd {
            background: #3b82f6;
            color: white;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .btn-edit {
            padding: 0.5rem 0.875rem;
            background: #f3f4f6;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8125rem;
            font-weight: 600;
            color: #374151;
            transition: all 0.2s;
            font-family: 'Montserrat', sans-serif;
        }

        .btn-edit:hover {
            background: #e5e7eb;
        }

        .btn-delete {
            padding: 0.5rem 0.875rem;
            background: #fef2f2;
            border: 1px solid #fecaca;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.8125rem;
            font-weight: 600;
            color: #dc2626;
            transition: all 0.2s;
            font-family: 'Montserrat', sans-serif;
        }

        .btn-delete:hover {
            background: #fee2e2;
        }

        .pagination {
            padding: 1.5rem 2rem;
            border-top: 1px solid #e5e7eb;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .pagination-info {
            font-size: 0.875rem;
            color: #6b7280;
        }

        .pagination-buttons {
            display: flex;
            gap: 0.5rem;
        }

        .pagination-btn {
            padding: 0.5rem 1rem;
            background: white;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.875rem;
            font-weight: 600;
            color: #374151;
            transition: all 0.2s;
            font-family: 'Montserrat', sans-serif;
        }

        .pagination-btn:hover:not(:disabled) {
            background: #f3f4f6;
        }

        .pagination-btn:disabled {
            opacity: 0.5;
            cursor: not-allowed;
        }

        .pagination-btn.active {
            background: #0a2540;
            color: white;
            border-color: #0a2540;
        }

        @media (max-width: 768px) {
            .main-content {
                margin-left: 0;
            }

            .content {
                padding: 1rem;
            }

            .page-header {
                flex-direction: column;
                gap: 1rem;
                align-items: flex-start;
            }

            .search-input {
                width: 100%;
            }

            .admin-table-container {
                overflow-x: auto;
            }

            .admin-table {
                min-width: 600px;
            }
        }
    </style>
</head>
<body>
    <!-- Reuse sidebar from dashboard -->
    <div class="sidebar">
        <div class="sidebar-header">
            <div class="brand">
                <div class="brand-logo">
                    <svg viewBox="0 0 100 100" width="35" height="35">
                        <circle cx="50" cy="35" r="15" fill="#0a2540"/>
                        <path d="M 30 55 Q 50 45 70 55 L 70 70 Q 50 80 30 70 Z" fill="#0a2540"/>
                    </svg>
                </div>
                <div class="brand-text">
                    <div class="brand-title">HIPMI</div>
                    <div class="brand-subtitle">JAWA BARAT</div>
                </div>
            </div>
        </div>

        <div class="sidebar-menu">
            <div class="menu-section">
                <div class="menu-label">Menu Utama</div>
                
                <div class="menu-dropdown">
                    <div class="menu-item has-dropdown active" onclick="toggleDropdown(this)">
                        <div style="display: flex; align-items: center; gap: 1rem; flex: 1;">
                            <svg viewBox="0 0 24 24">
                                <rect x="3" y="3" width="7" height="7" rx="1"/>
                                <rect x="14" y="3" width="7" height="7" rx="1"/>
                                <rect x="3" y="14" width="7" height="7" rx="1"/>
                                <rect x="14" y="14" width="7" height="7" rx="1"/>
                            </svg>
                            <span>Dashboard</span>
                        </div>
                        <svg class="dropdown-icon" viewBox="0 0 24 24">
                            <polyline points="6 9 12 15 18 9"/>
                        </svg>
                    </div>
                    <div class="submenu active">
                        <a href="{{ route('admin.dashboard') }}" class="submenu-item">
                            <svg viewBox="0 0 24 24">
                                <polyline points="9 11 12 14 22 4"/>
                                <path d="M21 12v7a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h11"/>
                            </svg>
                            <span>Overview</span>
                        </a>
                        <a href="{{ route('admin.info-admin') }}" class="submenu-item active">
                            <svg viewBox="0 0 24 24">
                                <path d="M16 21v-2a4 4 0 0 0-4-4H6a4 4 0 0 0-4 4v2"/>
                                <circle cx="9" cy="7" r="4"/>
                                <line x1="19" y1="8" x2="19" y2="14"/>
                                <line x1="22" y1="11" x2="16" y2="11"/>
                            </svg>
                            <span>Info Admin</span>
                        </a>
                    </div>
                </div>

                <a href="#" class="menu-item">
                    <svg viewBox="0 0 24 24">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"/>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"/>
                    </svg>
                    <span>Editor</span>
                </a>
                <a href="#" class="menu-item">
                    <svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                    <span>Anggota</span>
                </a>
                <a href="#" class="menu-item">
                    <svg viewBox="0 0 24 24">
                        <circle cx="12" cy="12" r="3"/>
                        <path d="M12 1v6m0 6v6m-9-9h6m6 0h6"/>
                    </svg>
                    <span>Pengaturan</span>
                </a>
            </div>

            <div class="menu-section">
                <div class="menu-label">Halaman Website</div>
                <a href="{{ route('home') }}" class="menu-item" target="_blank">
                    <svg viewBox="0 0 24 24">
                        <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
                        <polyline points="9 22 9 12 15 12 15 22"/>
                    </svg>
                    <span>Beranda</span>
                </a>
                <a href="{{ route('organisasi') }}" class="menu-item" target="_blank">
                    <svg viewBox="0 0 24 24">
                        <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
                        <circle cx="9" cy="7" r="4"/>
                        <path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
                        <path d="M16 3.13a4 4 0 0 1 0 7.75"/>
                    </svg>
                    <span>Organisasi</span>
                </a>
                <a href="{{ route('e-katalog') }}" class="menu-item" target="_blank">
                    <svg viewBox="0 0 24 24">
                        <path d="M2 3h6a4 4 0 0 1 4 4v14a3 3 0 0 0-3-3H2z"/>
                        <path d="M22 3h-6a4 4 0 0 0-4 4v14a3 3 0 0 1 3-3h7z"/>
                    </svg>
                    <span>E-Katalog</span>
                </a>
                <a href="{{ route('berita') }}" class="menu-item" target="_blank">
                    <svg viewBox="0 0 24 24">
                        <path d="M13 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V9z"/>
                        <polyline points="13 2 13 9 20 9"/>
                    </svg>
                    <span>Berita</span>
                </a>
                <a href="{{ route('umkm') }}" class="menu-item" target="_blank">
                    <svg viewBox="0 0 24 24">
                        <path d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z"/>
                        <polyline points="3.27 6.96 12 12.01 20.73 6.96"/>
                        <line x1="12" y1="22.08" x2="12" y2="12"/>
                    </svg>
                    <span>UMKM</span>
                </a>
            </div>
        </div>

        <div class="sidebar-footer">
            <div class="user-profile">
                <div class="user-avatar">{{ strtoupper(substr($admin->name, 0, 2)) }}</div>
                <div class="user-details">
                    <div class="user-name">{{ $admin->name }}</div>
                    <div class="user-role">{{ strtoupper($admin->category) }}</div>
                </div>
            </div>
        </div>
    </div>

    <div class="main-content">
        <div class="topbar">
            <div class="topbar-left">
                <h2>Info Admin</h2>
                <div class="topbar-subtitle">Kelola Akun Administrator</div>
            </div>
            <div class="topbar-actions">
                <button class="icon-btn">
                    <svg viewBox="0 0 24 24">
                        <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"/>
                        <polyline points="22,6 12,13 2,6"/>
                    </svg>
                </button>
                <button class="icon-btn">
                    <svg viewBox="0 0 24 24">
                        <path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/>
                        <path d="M13.73 21a2 2 0 0 1-3.46 0"/>
                    </svg>
                </button>
                <form action="{{ route('admin.logout') }}" method="post" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn">Logout</button>
                </form>
            </div>
        </div>

        <div class="content">
            <div class="page-header">
                <div>
                    <h1 class="page-title">Manajemen Admin</h1>
                    <p class="page-desc">Kelola seluruh akun administrator HIPMI Jawa Barat</p>
                </div>
                <a href="{{ route('admin.create-admin') }}" class="btn-primary">
    <svg viewBox="0 0 24 24">
        <line x1="12" y1="5" x2="12" y2="19"/>
        <line x1="5" y1="12" x2="19" y2="12"/>
    </svg>
    Tambah Admin Baru
</a>
            </div>

            <div class="admin-table-container">
                <div class="table-header">
                    <h3 class="table-title">Daftar Admin ({{ $admins->total() }})</h3>
                    <div class="search-box">
                        <svg class="search-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                            <circle cx="11" cy="11" r="8"/>
                            <path d="m21 21-4.35-4.35"/>
                        </svg>
                        <input type="text" class="search-input" placeholder="Cari admin...">
                    </div>
                </div>

                <table class="admin-table">
                    <thead>
                        <tr>
                            <th>Admin</th>
                            <th>Username</th>
                            <th>Kategori</th>
                            <th>Terdaftar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($admins as $adminItem)
                        <tr>
                            <td>
                                <div class="admin-cell">
                                    <div class="admin-avatar-table">{{ strtoupper(substr($adminItem->name, 0, 2)) }}</div>
                                    <div class="admin-details">
                                        <div class="admin-name-table">{{ $adminItem->name }}</div>
                                        <div class="admin-email-table">{{ $adminItem->email }}</div>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $adminItem->username }}</td>
                            <td>
                                <span class="badge badge-{{ $adminItem->category }}">
                                    {{ strtoupper($adminItem->category) }}
                                </span>
                            </td>
                            <td>{{ $adminItem->created_at->format('d M Y') }}</td>
                            <td>
                                <div class="action-buttons">
                                    <button class="btn-edit">Edit</button>
                                    <button class="btn-delete">Hapus</button>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="pagination">
                    <div class="pagination-info">
                        Menampilkan {{ $admins->firstItem() }} - {{ $admins->lastItem() }} dari {{ $admins->total() }} admin
                    </div>
                    <div class="pagination-buttons">
                        <button class="pagination-btn" {{ $admins->onFirstPage() ? 'disabled' : '' }}>
                            Previous
                        </button>
                        
                        @foreach($admins->getUrlRange(1, $admins->lastPage()) as $page => $url)
                            <button class="pagination-btn {{ $page == $admins->currentPage() ? 'active' : '' }}">
                                {{ $page }}
                            </button>
                        @endforeach
                        
                        <button class="pagination-btn" {{ !$admins->hasMorePages() ? 'disabled' : '' }}>
                            Next
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function toggleDropdown(element) {
            element.classList.toggle('active');
            const submenu = element.nextElementSibling;
            submenu.classList.toggle('active');
        }
    </script>
</body>
</html>