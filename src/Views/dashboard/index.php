<div class="card">
    <div class="card-header">
        <h3 class="card-title">Beranda Pengurus</h3>
    </div>
    <div class="card-body">
        <p>Pilih menu di samping atau gunakan shortcut di bawah ini untuk navigasi cepat.</p>
        
        <div class="shortcut-container">
            <a href="<?= base_url('keuangan') ?>" class="shortcut-card">
                <img src="https://img.icons8.com/plasticine/100/000000/money-circulation.png" alt="Keuangan">
                <h4>Laporan Keuangan</h4>
            </a>
            <a href="<?= base_url('admin/peminjaman') ?>" class="shortcut-card">
                <img src="https://img.icons8.com/plasticine/100/000000/add-shopping-cart.png" alt="Peminjaman">
                <h4>Manajemen Peminjaman</h4>
            </a>
            <a href="<?= base_url('jadwal') ?>" class="shortcut-card">
                <img src="https://img.icons8.com/plasticine/100/000000/overtime.png" alt="Jadwal">
                <h4>Jadwal Kajian</h4>
            </a>
        </div>
    </div>
</div>

<style>
.shortcut-container {
    display: flex;
    justify-content: space-around;
    flex-wrap: wrap;
    margin-top: 20px;
}
.shortcut-card {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    width: 200px;
    padding: 20px;
    border: 1px solid #ddd;
    border-radius: 8px;
    text-decoration: none;
    color: #333;
    transition: all 0.2s ease-in-out;
}
.shortcut-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 4px 10px rgba(0,0,0,0.1);
}
.shortcut-card img {
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
}
.shortcut-card h4 {
    margin: 0;
    font-size: 16px;
}
.card { background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin: 20px; }
.card-header { padding: 15px 20px; border-bottom: 1px solid #f2f2f2; }
.card-title { margin: 0; font-size: 18px; }
.card-body { padding: 20px; }
</style>