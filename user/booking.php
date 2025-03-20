<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php"); // Redirect ke login jika belum login
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Hewan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="banner-container">
      <img src="./image/logooo.png" alt="Pet Banner" class="banner-image" />
    </div>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="layanan.php">Layanan</a>
        <a href="booking.php">Booking</a>
        <a href="akun.php">Akun</a>
    </nav>
    <button class="login-button"><a href="logout.php">Logout</a>
    </button>

<script>
  function logout() {
    localStorage.removeItem("user");
    alert("Logged out successfully!");
    window.location.href = "index.php";
  }
</script>

    </button>
<div class="container-booking">
    <h3>Pilih Bulan</h3>
    <select id="monthSelector" class="form-control" onchange="changeMonth()">
        <option value="1">Januari</option>
        <option value="2">Febuari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
    </select>

    <h3 class="mt-3">Pilih Tanggal</h3>
    <div class="date-buttons" id="dateButtons"></div>

    <h5 class="mt-3">Minggu Selanjutnya</h5>
    <button class="btn-primary" onclick="nextWeek()">Tampilkan Minggu Selanjutnya</button>

    <form action="booking.php" method="POST">
        <input type="hidden" id="selected_date" name="booking_date">
        
        <label for="booking_time" class="mt-3">Pilih Jam Booking:</label>
        <input type="time" id="booking_time" name="booking_time" required class="form-control">
        
        <h5 class="mt-3">Data Pelanggan</h5>
        <label>Nama Pemilik</label>
        <input type="text" class="form-control" name="owner_name" required>

        <label>No. HP</label>
        <input type="text" class="form-control" name="phone" required>

        <label>Jenis Hewan</label>
        <input type="text" class="form-control" name="pet_type" required>

        <!-- Total Hewan -->
        <label class="mt-3">Total Hewan</label>
        <select name="total_pets" class="form-control">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
        </select>
        <!-- Catatan -->
        <label class="mt-3">Catatan</label>
        <input type="text" name="note" class="form-control">

        <!-- Umur -->
        <label class="mt-3">Umur (bulan)</label>
        <input type="number" name="age" class="form-control" min="0">

        <!-- Pilihan Paket -->
        <h5 class="mt-3">Pilih Paket</h5>
        <div>
            <button type="button" class="package-btn" onclick="selectPackage('Basic - 59k')">Paket Basic - 59k</button>
            <button type="button" class="package-btn" onclick="selectPackage('Kutu - Jamur - 70k')">Paket Kutu - Jamur - 70k</button>
            <button type="button" class="package-btn" onclick="selectPackage('Full - 86k')">Paket Full - 86k</button>
        </div>
        <input type="hidden" id="selected_package" name="package">

        <!-- Tambahan Opsional -->
        <h5 class="mt-3">Tambahan Opsional</h5>
        <input type="checkbox" name="extra_trim" value="1"> Potong kuku + amplas mencegah cakaran tajam | +10k <br>
        <input type="checkbox" name="extra_vitamin" value="1"> Vitamin untuk kesehatan kulit & bulu | +30k <br>

        <!-- Alamat -->
        <label class="mt-3">Alamat</label>
        <input type="text" name="address" required class="form-control">

        <!-- Antar - Jemput -->
        <input type="checkbox" name="pickup_service" value="1" class="mt-2"> Antar - Jemput

        <!-- Tombol Submit -->
        <button type="submit" class="booking-button2 mt-3">Selesaikan Pemesanan</button>
    </form>
</div>

<script>
    function selectPackage(packageName) {
        document.getElementById("selected_package").value = packageName;
        alert("Paket dipilih: " + packageName);
    }

    let selectedMonth = 3;
    let startDate = new Date();

    function changeMonth() {
        selectedMonth = parseInt(document.getElementById("monthSelector").value);
        startDate = new Date(new Date().getFullYear(), selectedMonth - 1, 1);
        generateDates();
    }

    function generateDates() {
        let dateButtons = document.getElementById("dateButtons");
        dateButtons.innerHTML = "";
        
        let weekDates = getWeekDates(startDate);
        for (let date of weekDates) {
            let btn = document.createElement("button");
            btn.innerText = date;
            btn.onclick = function () { selectDate(date); };
            dateButtons.appendChild(btn);
        }
    }

    function nextWeek() {
        startDate.setDate(startDate.getDate() + 7);
        generateDates();
    }

    function selectDate(date) {
        document.getElementById("selected_date").value = date;
        alert("Tanggal dipilih: " + date);
    }

    function getWeekDates(startDate) {
        let dates = [];
        for (let i = 0; i < 7; i++) {
            let date = new Date(startDate);
            date.setDate(startDate.getDate() + i);
            dates.push(date.getDate() + " " + getMonthName(selectedMonth));
        }
        return dates;
    }

    function getMonthName(month) {
        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        return monthNames[month - 1];
    }

    window.onload = generateDates;
</script>
<footer>
      <p>&copy; 2025 HappyPaws Indo. All Rights Reserved.</p>
    </footer>
</body>
</html>
