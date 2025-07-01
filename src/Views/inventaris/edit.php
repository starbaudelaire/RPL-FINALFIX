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

<style>
.form-wrapper{padding:20px}.form-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}.form-header h1{margin:0;font-size:24px}.form-card{background-color:white;padding:30px;border-radius:8px;box-shadow:0 2px 5px rgba(0,0,0,.1)}.form-group{margin-bottom:20px}.form-group label{display:block;margin-bottom:8px;font-weight:bold}.form-group input,.form-group select,.form-group textarea{width:100%;padding:12px;border:1px solid #ccc;border-radius:5px;box-sizing:border-box;font-size:16px}.form-actions{text-align:right;margin-top:30px}.btn{text-decoration:none;padding:12px 25px;border-radius:5px;color:white;display:inline-block;border:none;cursor:pointer;font-size:16px;font-weight:bold}.btn-primary{background-color:#007bff}.btn-back{background-color:#6c757d;padding:10px 20px;font-size:14px}
</style>