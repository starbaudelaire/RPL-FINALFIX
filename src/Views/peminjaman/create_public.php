<div class="container" style="padding-top: 40px; padding-bottom: 40px;">
    
    <h2 class="section-title" style="margin-top: 0; margin-bottom: 40px;">Formulir Peminjaman Inventaris</h2>

    <form action="<?= base_url('pinjam') ?>" method="POST">

        <div class="form-steps-grid">

            <div class="step-card">
                <h3 class="step-card-title">Langkah 1: Informasi Peminjam</h3>
                <div class="form-group">
                    <label for="nama_peminjam">Nama Lengkap</label>
                    <input type="text" id="nama_peminjam" name="nama_peminjam" required>
                </div>
                <div class="form-group">
                    <label for="instansi">Instansi / Organisasi</label>
                    <input type="text" id="instansi" name="instansi" required>
                </div>
                <div class="form-group">
                    <label for="wa_peminjam">Nomor WhatsApp Aktif</label>
                    <input type="tel" id="wa_peminjam" name="wa_peminjam" placeholder="Contoh: 08123456789" required>
                </div>
            </div>

            <div class="step-card">
                <h3 class="step-card-title">Langkah 2: Detail Peminjaman</h3>
                <div class="form-grid">
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Peminjaman</label>
                        <input type="date" id="tanggal_pinjam" name="tanggal_pinjam" required>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Pengembalian</label>
                        <input type="date" id="tanggal_kembali" name="tanggal_kembali" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="keperluan">Keperluan Peminjaman</label>
                    <textarea id="keperluan" name="keperluan" rows="3" required></textarea>
                </div>
                 <div class="form-group">
                    <label for="link_surat">Surat Resmi Pengajuan</label>
                    <input type="url" id="link_surat" name="link_surat" placeholder="https://docs.google.com/...">
                </div>
            </div>

        </div> <div class="step-card">
             <h3 class="step-card-title">Langkah 3: Pilih Barang</h3>
            <div class="item-selection-grid">
                <?php if (!empty($semua_barang)): ?>
                    <?php foreach($semua_barang as $barang): ?>
                        <label class="item-card" for="barang_<?= $barang['id'] ?>">
                            <img src="<?= htmlspecialchars($barang['foto_url'] ?? 'https://via.placeholder.com/300x200?text=No+Image') ?>" alt="<?= htmlspecialchars($barang['nama_barang']) ?>">
                            <div class="item-card-body">
                                <span><?= htmlspecialchars($barang['nama_barang']) ?></span>
                                <input type="checkbox" name="barang_ids[]" value="<?= $barang['id'] ?>" id="barang_<?= $barang['id'] ?>">
                            </div>
                        </label>
                    <?php endforeach; ?>
                <?php else: ?>
                     <p>Saat ini tidak ada barang yang tersedia untuk dipinjam.</p>
                <?php endif; ?>
            </div>
        </div>

        <div class="form-actions-center">
            <button type="submit" class="btn">Ajukan Peminjaman</button>
        </div>
    </form>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        document.querySelectorAll('.item-card').forEach(card => {
            const checkbox = card.querySelector('input[type="checkbox"]');
            
            function updateCardStyle() {
                if (checkbox.checked) {
                    card.classList.add('selected');
                } else {
                    card.classList.remove('selected');
                }
            }
            updateCardStyle();

            card.addEventListener('click', function(e) {
                if (e.target.type !== 'checkbox') {
                    checkbox.checked = !checkbox.checked;
                }
                updateCardStyle();
            });
        });
    });
</script>