<div class="form-wrapper">
    <div class="form-header">
        <h1>Form Edit Inventaris</h1>
        <a href="<?= base_url('inventaris') ?>" class="btn btn-back">Kembali ke Daftar</a>
    </div>

    <form class="form-card" action="<?= base_url('inventaris/update') ?>" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($item['id']) ?>">

        <div class="form-group">
            <label for="nama_barang">Nama Barang</label>
            <input type="text" id="nama_barang" name="nama_barang" value="<?= htmlspecialchars($item['nama_barang']) ?>" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah</label>
            <input type="number" id="jumlah" name="jumlah" value="<?= htmlspecialchars($item['jumlah']) ?>" required>
        </div>
        <div class="form-group">
            <label for="kondisi">Kondisi</label>
            <select id="kondisi" name="kondisi">
                <option value="Baik" <?= $item['kondisi'] == 'Baik' ? 'selected' : '' ?>>Baik</option>
                <option value="Rusak Ringan" <?= $item['kondisi'] == 'Rusak Ringan' ? 'selected' : '' ?>>Rusak Ringan</option>
                <option value="Rusak Berat" <?= $item['kondisi'] == 'Rusak Berat' ? 'selected' : '' ?>>Rusak Berat</option>
            </select>
        </div>
        <div class="form-group">
            <label for="tanggal_pengadaan">Tanggal Pengadaan</label>
            <input type="date" id="tanggal_pengadaan" name="tanggal_pengadaan" value="<?= htmlspecialchars($item['tanggal_pengadaan']) ?>">
        </div>
        <div class="form-group">
            <label for="foto_url">URL Gambar Barang (Opsional)</label>
            <input type="url" id="foto_url" name="foto_url" value="<?= htmlspecialchars($item['foto_url'] ?? '') ?>" placeholder="https://.../gambar.jpg">
        </div>
        <div class="form-group">
            <label for="keterangan">Keterangan</label>
            <textarea id="keterangan" name="keterangan" rows="3"><?= htmlspecialchars($item['keterangan']) ?></textarea>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Inventaris</button>
        </div>
    </form>
</div>