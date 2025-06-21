<header class="site-header">
    <div class="container">
        <div class="header-top">
            <div style="width: 80px;"></div> 

            <div class="header-brand">
                <a href="<?= base_url('/') ?>" style="text-decoration: none;">
                    <img src="<?= base_url('assets/Nuruttaqwa1.png') ?>" alt="Logo Masjid Nuruttaqwa">
                    <h1>Masjid Nuruttaqwa</h1>
                </a>
            </div>
            
            <div class="header-action">
                <a href="<?= base_url('login') ?>" class="text-login">Login</a>
            </div>
        </div>
    </div>
    <nav class="header-nav">
        <div class="container">
             <div class="nav-links">
                <a href="<?= base_url('/') ?>">Beranda</a>
                <a href="<?= base_url('laporan-keuangan') ?>">Keuangan</a>
                <a href="<?= base_url('jadwal-kegiatan') ?>">Kegiatan</a>
                <a href="<?= base_url('pinjam') ?>">Peminjaman</a>
            </div>
        </div>
    </nav>
</header>