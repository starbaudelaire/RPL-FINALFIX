<header class="hero-section">
    <div class="container">
        <p class="greeting">Assalamu'alaikum</p>
        <h1 class="mosque-name">MASJID NURUTTAQWA</h1>
    </div>
</header>

<div class="container page-section">

    <div class="section-card">
        <h2 class="section-title">Konten Dakwah Pilihan</h2>
        <div class="video-wrapper">
            <iframe src="https://www.youtube.com/embed/dQw4w9WgXcQ" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </div>

    <section class="info-card-section">
            <div class="container">
                
                <div class="info-card-grid">

                    <div class="info-card">
                        <div class="info-card-header">
                            <h2>Jadwal Terkini</h2>
                            <a href="<?= base_url('jadwal-kegiatan') ?>">Lihat Detail &rarr;</a>
                        </div>
                        <div class="info-card-body">
                            <?php if (!empty($jadwal_publik)): ?>
                                <div class="data-summary">
                                    <?php $first_event = $jadwal_publik[0]; ?>
                                    <div class="summary-item">
                                        <h3>Kajian Berikutnya</h3>
                                        <p><?= htmlspecialchars($first_event['judul_kajian']) ?></p>
                                    </div>
                                    <div class="summary-item">
                                        <h3>Hari</h3>
                                        <p><?= date('l, d M', strtotime($first_event['waktu_kajian'])) ?></p>
                                    </div>
                                </div>
                            <?php else: ?>
                                <p class="placeholder-text">Belum ada jadwal kegiatan yang akan datang.</p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-card-header">
                            <h2>Keuangan Terkini</h2>
                            <a href="<?= base_url('laporan-keuangan') ?>">Lihat Detail &rarr;</a>
                        </div>
                        <div class="info-card-body">
                             <?php if (!empty($transaksi_publik)): ?>
                                 <div class="data-summary">
                                    <div class="summary-item">
                                        <h3>Pemasukan</h3>
                                        <p style="color: var(--primary-green);">Rp <?= number_format(array_sum(array_column(array_filter($transaksi_publik, fn($t) => $t['jenis'] == 'pemasukan'), 'jumlah')), 0, ',', '.') ?></p>
                                    </div>
                                    <div class="summary-item">
                                        <h3>Pengeluaran</h3>
                                        <p style="color: #dc3545;">Rp <?= number_format(array_sum(array_column(array_filter($transaksi_publik, fn($t) => $t['jenis'] == 'pengeluaran'), 'jumlah')), 0, ',', '.') ?></p>
                                    </div>
                                </div>
                             <?php else: ?>
                                <p class="placeholder-text">Data keuangan belum tersedia.</p>
                             <?php endif; ?>
                        </div>
                    </div>

                    <div class="info-card">
                        <div class="info-card-header">
                            <h2>Peminjaman</h2>
                            <a href="<?= base_url('pinjam') ?>" class="btn-peminjaman">Ajukan &rarr;</a>
                        </div>
                        <div class="info-card-body">
                             <p class="placeholder-text">Klik "Ajukan" untuk meminjam barang dan fasilitas masjid yang tersedia.</p>
                        </div>
                    </div>
                
                </div> </div>
        </section>

    <div class="section-card">
        <h2 class="section-title">Sekilas Sejarah Masjid Nuruttaqwa</h2>
        <div class="about-section-content">
            <p>
                Website Masjid Nuruttaqwa merupakan sebuah platform yang dirancang untuk memberikan sistem informasi keuangan kas masjid yang transparan dan efisien. Website ini bertujuan untuk memudahkan pengelolaan dan pelaporan keuangan masjid, sehingga setiap transaksi dapat dicatat dengan baik dan dapat diakses oleh pengurus masjid dan jamaah.
            </p>
        </div>
    </div>

</div>