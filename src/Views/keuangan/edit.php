<div class="form-wrapper">
    <div class="form-header">
        <h1>Form Edit Transaksi</h1>
        <a href="<?= base_url('keuangan') ?>" class="btn btn-back">Kembali ke Laporan</a>
    </div>

    <form class="form-card" action="<?= base_url('keuangan/update') ?>" method="POST">
        <input type="hidden" name="id" value="<?= htmlspecialchars($transaksi['id']) ?>">
        <div class="form-group">
            <label for="deskripsi">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" value="<?= htmlspecialchars($transaksi['deskripsi']) ?>" required>
        </div>
        <div class="form-group">
            <label for="tanggal">Tanggal</label>
            <input type="date" id="tanggal" name="tanggal" value="<?= htmlspecialchars($transaksi['tanggal']) ?>" required>
        </div>
        <div class="form-group">
            <label for="jumlah">Jumlah (Rp)</label>
            <input type="number" id="jumlah" name="jumlah" value="<?= htmlspecialchars($transaksi['jumlah']) ?>" required>
        </div>
        <div class="form-group">
            <label for="jenis">Jenis Transaksi</label>
            <select id="jenis" name="jenis" required>
                <option value="pemasukan" <?= $transaksi['jenis'] == 'pemasukan' ? 'selected' : '' ?>>Pemasukan</option>
                <option value="pengeluaran" <?= $transaksi['jenis'] == 'pengeluaran' ? 'selected' : '' ?>>Pengeluaran</option>
            </select>
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">Update Transaksi</button>
        </div>
    </form>
</div>

<style>
.form-wrapper{padding:20px}.form-header{display:flex;justify-content:space-between;align-items:center;margin-bottom:20px}.form-header h1{margin:0;font-size:24px}.form-card{background-color:white;padding:30px;border-radius:8px;box-shadow:0 2px 5px rgba(0,0,0,.1)}.form-group{margin-bottom:20px}.form-group label{display:block;margin-bottom:8px;font-weight:bold}.form-group input,.form-group select,.form-group textarea{width:100%;padding:12px;border:1px solid #ccc;border-radius:5px;box-sizing:border-box;font-size:16px}.form-actions{text-align:right;margin-top:30px}.btn{text-decoration:none;padding:12px 25px;border-radius:5px;color:white;display:inline-block;border:none;cursor:pointer;font-size:16px;font-weight:bold}.btn-primary{background-color:#007bff}.btn-back{background-color:#6c757d;padding:10px 20px;font-size:14px}
</style>