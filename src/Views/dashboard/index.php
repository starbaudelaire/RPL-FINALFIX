<div class="card">
    <div class="card-header">
        <h3 class="card-title">Beranda Pengurus</h3>
    </div>
    <div class="card-body">
        <p>Pilih menu di samping atau gunakan shortcut di bawah ini untuk navigasi cepat.</p>
        
        <div class="shortcut-container">

            <?php if (isAdmin() || isSekben()): ?>
                <a href="<?= base_url('keuangan') ?>" class="shortcut-card">
                    <div class="shortcut-icon bg-green">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 18.75a60.07 60.07 0 0115.797 2.101c.727.198 1.453-.342 1.453-1.096V18.75M3.75 4.5v.75A.75.75 0 013 6h-.75m0 0v-.375c0-.621.504-1.125 1.125-1.125H20.25M2.25 6v9m18-10.5v.75c0 .414.336.75.75.75h.75m-1.5-1.5h.375c.621 0 1.125.504 1.125 1.125v9.75c0 .621-.504 1.125-1.125 1.125h-.375m1.5-1.5H21a.75.75 0 00-.75.75v.75m0 0H3.75m0 0h-.375a1.125 1.125 0 01-1.125-1.125V15m1.5 1.5v-.75A.75.75 0 003 15h-.75M15 10.5a3 3 0 11-6 0 3 3 0 016 0z" /></svg>
                    </div>
                    <h4>Laporan Keuangan</h4>
                </a>
            <?php endif; ?>

            <?php if (isAdmin() || isRumahTangga()): ?>
                <a href="<?= base_url('inventaris') ?>" class="shortcut-card">
                    <div class="shortcut-icon bg-blue">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M20.25 7.5l-.625 10.632a2.25 2.25 0 01-2.247 2.118H6.622a2.25 2.25 0 01-2.247-2.118L3.75 7.5M10 11.25h4M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125z" /></svg>
                    </div>
                    <h4>Daftar Inventaris</h4>
                </a>
            <?php endif; ?>

            <?php if (isAdmin() || isRumahTangga()): ?>
                <a href="<?= base_url('admin/peminjaman') ?>" class="shortcut-card">
                    <div class="shortcut-icon bg-yellow">
                         <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 10.5V6a3.75 3.75 0 10-7.5 0v4.5m11.356-1.993l1.263 12c.07.658-.463 1.243-1.117 1.243H4.25a1.125 1.125 0 01-1.12-1.243l1.264-12A1.125 1.125 0 015.513 7.5h12.974c.576 0 1.059.435 1.116 1.007zM8.25 10.5a2.25 2.25 0 00-2.25 2.25v.75a2.25 2.25 0 002.25 2.25h7.5a2.25 2.25 0 002.25-2.25v-.75a2.25 2.25 0 00-2.25-2.25H8.25z" /></svg>
                    </div>
                    <h4>Manajemen Peminjaman</h4>
                </a>
            <?php endif; ?>

            <?php if (isAdmin() || isSekben() || isRumahTangga()): ?>
                <a href="<?= base_url('jadwal') ?>" class="shortcut-card">
                    <div class="shortcut-icon bg-red">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0H21m-9-7.5h.008v.008H12v-.008z" /></svg>
                    </div>
                    <h4>Jadwal Kajian</h4>
                </a>
            <?php endif; ?>
            
        </div>
    </div>
</div>

<style>
.card { background-color: white; border-radius: 8px; box-shadow: 0 2px 4px rgba(0,0,0,0.1); margin: 20px; }
.card-header { padding: 15px 20px; border-bottom: 1px solid #f2f2f2; }
.card-title { margin: 0; font-size: 18px; }
.card-body { padding: 20px; }
.shortcut-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    margin-top: 20px;
    flex-wrap: wrap;
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
    border-color: #aaa;
}
.shortcut-icon {
    width: 80px;
    height: 80px;
    margin-bottom: 15px;
    border-radius: 12px;
    display: flex;
    align-items: center;
    justify-content: center;
}
.shortcut-icon svg {
    width: 48px;
    height: 48px;
    stroke-width: 1.5;
    color: white;
}
.shortcut-card h4 {
    margin: 0;
    font-size: 16px;
    text-align: center;
}
.bg-green { background-color: #28a745; }
.bg-blue { background-color: #007bff; }
.bg-yellow { background-color: #ffc107; }
.bg-red { background-color: #dc3545; }
</style>