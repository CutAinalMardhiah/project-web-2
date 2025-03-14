<?php
// Simulasi data layanan yang sudah dipesan sebelumnya
$orders = [
    [
        'title' => 'Grooming - Paket Basic',
        'date' => 'Selasa, 6 Feb 2025',
        'time' => '14:00 - 15:00',
        'status' => 'Diterima',
        'price' => 'Rp 60.000',
        'code' => 'Q2R5',
        'pet' => 'Milo - Kucing Persia'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Paws</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    <div class="banner-container">
      <img src="./image/logooo.png" alt="Pet Banner" class="banner-image" />
    </div>
    <nav>
        <a href="dashboard.php">Beranda</a>
        <a href="layanan.php">Layanan</a>
        <a href="booking.php">Booking</a>
        <a href="akun.php">Akun</a>
    </nav>
    <button class="login-button" onclick="window.location.href='login.html'">
      Login
    </button>
    <div class="container">
      <h3>Welcome to Happy Paws</h3>
      <p>Setiap hewan memiliki kebutuhan unik, itulah mengapa Happy Paws hadir 
        untuk memberikan pengalaman perawatan yang menyenangkan dan bebas stres bagi hewan kesayangan Anda.</p>
      </div>
    <div class="center-content">
      <a href="layanan.php" class="section-title">Layanan</a>
    </div>
    <div class="cards">
        <div class="card">
            <a href="layanan.php">
            <img src="./image/grooming.png" alt="Grooming">
            <h5>Grooming</h5>
        </div>
        <div class="card">
            <a href="layanan.php">
            <img src="./image/penitipan.png" alt="Penitipan">
            <h5>Penitipan</h5>
        </div>
        <div class="card">
            <a href="layanan.php">
            <img src="./image/antar.png" alt="Antar Jemput">
            <h5>Antar Jemput</h5>
        </div>
    </div>

    <button class="btn-order" onclick="window.location.href='layanan.php'">Pesan Sekarang</button>

    <div class="container-pesanan">
        <?php foreach ($orders as $order) : ?>
            <div class="order-box">
                <h3><?= $order['title']; ?></h3>
                <p><?= $order['date']; ?> | <?= $order['time']; ?></p>
                <p>Status: <?= $order['status']; ?></p>
                <p><strong><?= $order['price']; ?></strong> - <?= $order['code']; ?></p>
                <p><?= $order['pet']; ?></p>
                <button class="btn-order" onclick="window.location.href='layanan.php'">Pesan Ulang</button>
            </div>
        <?php endforeach; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <footer>
      <p>&copy; 2025 HappyPaws Indo. All Rights Reserved.</p>
    </footer>
</body>
</html>
