<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $title ?? 'Masjid Nuruttaqwa' ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&display=swap" rel="stylesheet">
</head>
<body>
    
    <?php require_once BASE_PATH . '/src/Views/partials/header_top.php'; ?>

    <?php require_once BASE_PATH . '/src/Views/partials/header_nav.php'; ?>

    <main class="main-content">
        <?= $content ?? '' ?>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>© <?= date('Y') ?> Masjid Nuruttaqwa. All Rights Reserved.</p>
        </div>
    </footer>

</body>
</html>