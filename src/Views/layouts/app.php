<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'SIMasjid' ?></title>
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
        }

        .app-container {
            display: flex;
        }

        /* == STYLE UNTUK SIDEBAR (BAGIAN IJO-IJO) == */
        .sidebar {
            width: var(--sidebar-width);
            height: 100vh; /* Tinggi 100% viewport */
            position: fixed; /* Kunci #1: Bikin dia nempel */
            top: 0;
            left: 0;
            z-index: 1001; /* Biar di lapisan paling atas */
            background-color: #28a745;
            color: white;
            padding: 20px;
            box-sizing: border-box;
            transition: left var(--transition-speed) ease; /* Animasi buka-tutup */
        }
        .sidebar h1 { font-size: 24px; margin-bottom: 30px; }
        .sidebar h1 a { color: white; text-decoration: none; }
        .sidebar-nav ul { list-style: none; padding: 0; }
        .sidebar-nav li a { color: rgba(255, 255, 255, 0.8); text-decoration: none; display: block; padding: 12px; border-radius: 5px; margin-bottom: 5px; }
        .sidebar-nav li a:hover, .sidebar-nav li a.active { background-color: rgba(255, 255, 255, 0.2); color: white; }

        /* == STYLE UNTUK KONTEN UTAMA == */
        .content-wrapper {
            flex-grow: 1;
            margin-left: var(--sidebar-width); /* Kunci #2: Kasih ruang kosong seukuran sidebar */
            transition: margin-left var(--transition-speed) ease; /* Animasi geser */
        }
        .sticky-header-wrapper {
            height: var(--header-height); /* Tinggi header disamain */
            display: flex;
            align-items: center;
            background-color: white;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 0 20px;
        }
        .main-content {
            padding: 20px;
        }
        .app-footer { text-align: center; padding: 20px; color: #888; font-size: 14px; }
        
        /* == KONDISI KETIKA SIDEBAR DISEMBUNYIKAN == */
        body.sidebar-collapsed .sidebar {
            left: calc(-1 * var(--sidebar-width)); /* Geser sidebar ke kiri sampai hilang */
        }
        body.sidebar-collapsed .content-wrapper {
            margin-left: 0; /* Konten utama jadi full-width */
        }

        /* == STYLE UNTUK PANEL USER DI HEADER ATAS == */
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
            <h1><a href="<?= base_url('dashboard') ?>">MasjidKu</a></h1>
            <nav class="sidebar-nav">
                <ul>
                    <li><a href="<?= base_url('dashboard') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'dashboard') ? 'active' : '' ?>">Beranda</a></li>
                    <li><a href="<?= base_url('keuangan') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'keuangan') ? 'active' : '' ?>">Laporan Keuangan</a></li>
                    <li><a href="<?= base_url('inventaris') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'inventaris') ? 'active' : '' ?>">Daftar Inventaris</a></li>
                    <li><a href="<?= base_url('admin/peminjaman') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'peminjaman') ? 'active' : '' ?>">Manajemen Peminjaman</a></li>
                    <li><a href="<?= base_url('jadwal') ?>" class="<?= str_contains($_SERVER['REQUEST_URI'], 'jadwal') ? 'active' : '' ?>">Jadwal Kajian</a></li>
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
                <p>&copy; <?= date('Y') ?> - Sistem Informasi Masjid</p>
            </footer>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const toggleButton = document.getElementById('sidebar-toggle');
            const body = document.body;

            // Cek di localStorage apa status terakhir sidebar (biar inget pilihan user)
            if (localStorage.getItem('sidebarState') === 'collapsed') {
                body.classList.add('sidebar-collapsed');
            }

            // Tambahin event listener ke tombol
            toggleButton.addEventListener('click', function() {
                body.classList.toggle('sidebar-collapsed');

                // Simpen status pilihan user ke localStorage
                if (body.classList.contains('sidebar-collapsed')) {
                    localStorage.setItem('sidebarState', 'collapsed');
                } else {
                    localStorage.setItem('sidebarState', 'expanded');
                }
            });
        });
    </script>
</body>
</html>