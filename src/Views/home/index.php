<header class="hero-section">
    <div class="container">
        <div class="hero-card">
            <div class="hero-text">
                <p class="greeting">Assalamu'alaikum</p>
                <h1 class="mosque-name">Masjid Nurul Taqwa</h1>
                <p class="mosque-address">Jl. Pintu Selatan UPN, Ngropoh, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281</p>
            </div>
            <div class="hero-map">
                <a href="https://maps.app.goo.gl/omrdJvLGdRAPnmdf9" target="_blank" title="Lihat di Google Maps">
                    <img src="https://www.gstatic.com/images/branding/product/2x/maps_96dp.png" alt="Google Maps">
                </a>
            </div>
        </div>
    </div>
</header>

<div class="container page-section">

    <div class="section-card">
        <h2 class="section-title">Konten Dakwah Pilihan</h2>
        <div class="slider-container">
            <div class="slider-wrapper">
                <?php
                // Daftar ID video dari link YouTube
                $video_ids = ['izYUMrsvVDQ', 'sX-kePnlgy4', 'vhrdYTP4AiY'];
                foreach ($video_ids as $id):
                ?>
                    <div class="video-slide">
                        <a href="https://www.youtube.com/watch?v=r5yQgkgBlqc<?= $id ?>" target="_blank" class="video-thumbnail">
                            <img src="https://img.youtube.com/vi/<?= $id ?>/hqdefault.jpg" alt="Video Dakwah">
                            <div class="play-icon">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"></path></svg>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <button class="slider-btn prev-btn">❮</button>
            <button class="slider-btn next-btn">❯</button>
        </div>
    </div>

</div>

<section class="info-card-section">
    <div class="container">
        <div class="info-card-grid">

            <div class="info-card">
                <div class="info-card-header">
                    <h2>Jadwal Terkini</h2>
                    <a href="<?= base_url('jadwal-kegiatan') ?>">Lihat Detail →</a>
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
                    <a href="<?= base_url('laporan-keuangan') ?>">Lihat Detail →</a>
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
                    <a href="<?= base_url('pinjam') ?>" class="btn-peminjaman">Ajukan →</a>
                </div>
                <div class="info-card-body">
                     <p class="placeholder-text">Klik "Ajukan" untuk meminjam barang dan fasilitas masjid yang tersedia.</p>
                </div>
            </div>

        </div>
    </div>
</section>

<div class="container page-section">
    <div class="section-card about-card">
        
        <div class="about-text">
            <h2 class="section-title">Tentang Website</h2>
            <p>
                Website Masjid Nurul Taqwa merupakan sebuah platform yang dirancang untuk memberikan sistem informasi keuangan kas masjid yang transparan dan efisien. Website ini bertujuan untuk memudahkan pengelolaan dan pelaporan keuangan masjid, sehingga setiap transaksi dapat dicatat dengan baik dan dapat diakses oleh pengurus masjid dan jamaah.
            </p>
        </div>

        <div class="about-image">
            <img src="<?= base_url('assets/masjidnurultaqwa.png') ?>" alt="Foto Masjid Nurul Taqwa">
        </div>

    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const sliderWrapper = document.querySelector('.slider-wrapper');
    if (!sliderWrapper) return;
    
    const prevBtn = document.querySelector('.prev-btn');
    const nextBtn = document.querySelector('.next-btn');
    let currentIndex = 0;
    const slides = document.querySelectorAll('.video-slide');
    const totalSlides = slides.length;

    function goToSlide(index) {
        if (totalSlides === 0) return;
        if (index < 0) {
            index = totalSlides - 1;
        } else if (index >= totalSlides) {
            index = 0;
        }
        sliderWrapper.style.transform = `translateX(-${index * 100}%)`;
        currentIndex = index;
    }

    prevBtn.addEventListener('click', () => {
        goToSlide(currentIndex - 1);
    });

    nextBtn.addEventListener('click', () => {
        goToSlide(currentIndex + 1);
    });
});
</script>