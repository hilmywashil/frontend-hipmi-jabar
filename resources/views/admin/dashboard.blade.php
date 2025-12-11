<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - HIPMI Jawa Barat</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, sans-serif;
            background: #f5f5f5;
        }

        .navbar {
            background: #fff;
            padding: 1rem 2rem;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .navbar-brand {
            font-size: 1.5rem;
            font-weight: 600;
            color: #333;
        }

        .navbar-user {
            display: flex;
            align-items: center;
            gap: 1rem;
        }

        .user-info {
            text-align: right;
        }

        .user-name {
            font-weight: 600;
            color: #333;
        }

        .user-category {
            font-size: 0.875rem;
            color: #666;
            text-transform: uppercase;
        }

        .logout-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 0.5rem 1.5rem;
            border-radius: 6px;
            cursor: pointer;
            font-size: 0.875rem;
            transition: background 0.2s;
        }

        .logout-btn:hover {
            background: #c82333;
        }

        .container {
            max-width: 1200px;
            margin: 2rem auto;
            padding: 0 2rem;
        }

        .welcome-card {
            background: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            margin-bottom: 2rem;
        }

        .welcome-title {
            font-size: 2rem;
            color: #333;
            margin-bottom: 0.5rem;
        }

        .welcome-subtitle {
            color: #666;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-top: 2rem;
        }

        .stat-card {
            background: white;
            padding: 1.5rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .stat-label {
            color: #666;
            font-size: 0.875rem;
            margin-bottom: 0.5rem;
        }

        .stat-value {
            font-size: 2rem;
            font-weight: 600;
            color: #333;
        }

        .category-badge {
            display: inline-block;
            padding: 0.25rem 0.75rem;
            border-radius: 12px;
            font-size: 0.875rem;
            font-weight: 600;
            margin-top: 0.5rem;
        }

        .badge-bpc {
            background: #e3f2fd;
            color: #1976d2;
        }

        .badge-bpd {
            background: #f3e5f5;
            color: #7b1fa2;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="navbar-brand">
            HIPMI Jawa Barat
        </div>
        <div class="navbar-user">
            <div class="user-info">
                <div class="user-name">{{ $admin->name }}</div>
                <div class="user-category">{{ strtoupper($admin->category) }}</div>
            </div>
            <form action="{{ route('admin.logout') }}" method="post">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </nav>

    <div class="container">
        <div class="welcome-card">
            <h1 class="welcome-title">Selamat Datang, {{ $admin->name }}</h1>
            <p class="welcome-subtitle">Dashboard Admin HIPMI Jawa Barat</p>
            <span class="category-badge badge-{{ $admin->category }}">
                {{ strtoupper($admin->category) }}
            </span>
        </div>

        <div class="stats-grid">
            <div class="stat-card">
                <div class="stat-label">Total Anggota</div>
                <div class="stat-value">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Event</div>
                <div class="stat-value">0</div>
            </div>
            <div class="stat-card">
                <div class="stat-label">Total Berita</div>
                <div class="stat-value">0</div>
            </div>
        </div>
    </div>
</body>
</html>