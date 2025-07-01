<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Admin Panel' ?> | Masjid Nurul Taqwa</title>
    <style>
        :root {
            --sidebar-width: 250px;
            --header-height: 60px;
            --transition-speed: 0.3s;
        }
        body {
            font-family: sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            overflow-x: hidden;
        }
        .app-container {
            display: flex;
        }
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1001;
            background-color: #28a745;
            color: white;
            padding: 20px;
            box-sizing: border-box;
            transition: left var(--transition-speed) ease;
        }
        .sidebar h1 { font-size: 24px; margin-bottom: 30px; }
        .sidebar h1 a { color: white; text-decoration: none; }
        .sidebar-nav ul { list-style: none; padding: 0; }
        .sidebar-nav li a { color: rgba(255, 255, 255, 0.8); text-decoration: none; display: block; padding: 12px; border-radius: 5px; margin-bottom: 5px; }
        .sidebar-nav li a:hover, .sidebar-nav li a.active { background-color: rgba(255, 255, 255, 0.2); color: white; }
        
        .content-wrapper {
            flex-grow: 1;
            margin-left: var(--sidebar-width);
            transition: margin-left var(--transition-speed) ease;
        }
        .sticky-header-wrapper {
            height: var(--header-height);
            display: flex;
            align-items: center;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 0 20px;
            position: sticky;
            top: 0;
            z-index: 999;
        }
        .main-content {
            padding: 20px;
        }
        .app-footer { text-align: center; padding: 20px; color: #888; font-size: 14px; }
        
        body.sidebar-collapsed .sidebar {
            left: calc(-1 * var(--sidebar-width));
        }
        body.sidebar-collapsed .content-wrapper {
            margin-left: 0;
        }
        
        .user-panel {
            width: 100%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .header-left { display: flex; align-items: center; }
        #sidebar-toggle { background: none; border: none; cursor: pointer; padding: 0 15px 0 0; }
        #sidebar-toggle svg { stroke: #333; }
        .role-badge { background-color: #e2e3e5; color: #495057; padding: 3px 8px; border-radius: 4px; font-size: 12px; margin-left: 8px; }
        .btn-logout { background: none; border: 1px solid #dc3545; color: #dc3545; padding: 5px 10px; cursor: pointer; border-radius: 4px; font-weight: bold; }
    </style>
</head>

<body>
    <div class="app-container">
        
        <aside class="sidebar">
            <h1><a href="<?= base_url('dashboard') ?>">Masjid Nurul Taqwa</a></h1>
            
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="<?= base_url('dashboard') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'dashboard') ? 'active' : '' ?>">Beranda</a></li>
                    
                    <?php if (isAdmin() || isSekben()): ?>
                        <li><a href="<?= base_url('keuangan') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'keuangan') ? 'active' : '' ?>">Laporan Keuangan</a></li>
                    <?php endif; ?>

                    <?php if (isAdmin() || isRumahTangga()): ?>
                        <li><a href="<?= base_url('inventaris') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'inventaris') ? 'active' : '' ?>">Daftar Inventaris</a></li>
                        <li><a href="<?= base_url('admin/peminjaman') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'peminjaman') ? 'active' : '' ?>">Manajemen Peminjaman</a></li>
                    <?php endif; ?>
                    
                    <?php if (isAdmin() || isSekben() || isRumahTangga()): ?>
                        <li><a href="<?= base_url('jadwal') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'jadwal') ? 'active' : '' ?>">Jadwal Kajian</a></li>
                    <?php endif; ?>
                </ul>
            </nav>
        </aside>

        <div class="content-wrapper">
            
            <header class="sticky-header-wrapper">
                <?php require_once BASE_PATH . '/src/Views/partials/user_panel.php'; ?>
            </header>
            
            <main class="main-content">
                <?= $content ?? '' ?>
            </main>

            <footer class="app-footer">
                <p>&copy; <?= date('Y') ?> - Masjid Nurul Taqwa UPN "Veteran" Yogyakarta</p>
            </footer>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('sidebar-toggle');
            if (toggleButton) {
                const body = document.body;
                if (localStorage.getItem('sidebarState') === 'collapsed') {
                    body.classList.add('sidebar-collapsed');
                }
                toggleButton.addEventListener('click', function() {
                    body.classList.toggle('sidebar-collapsed');
                    if (body.classList.contains('sidebar-collapsed')) {
                        localStorage.setItem('sidebarState', 'collapsed');
                    } else {
                        localStorage.setItem('sidebarState', 'expanded');
                    }
                });
            }
        });
    </script>
</body>
</html>