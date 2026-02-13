<?php
include 'koneksi.php';

$nis = $_POST['nis'];
$nama = $_POST['nama'];
$kelas = $_POST['kelas'];
$jurusan = $_POST['jurusan'];

$query = "INSERT INTO siswa (nis, nama, kelas, jurusan) 
          VALUES ('$nis', '$nama', '$kelas', '$jurusan')";
$hasil = mysqli_query($koneksi, $query);

// if ($hasil) {
//     echo "Data siswa berhasil disimpan! <br>";
//     echo "<a href='index.php'>Kembali</a>";
// } else {
//     echo "Gagal menyimpan data: " . mysqli_error($koneksi);
// }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Status Penyimpanan</title>
    <link rel="stylesheet" href="style.css"> </head>
<body>
    <div class="table-container" style="max-width: 500px; text-align: center; margin-top: 100px;">
        <?php if ($hasil): ?>
            <h2 style="color: #2e7d32;">✨ Berhasil!</h2>
            <p>Data siswa <strong><?php echo htmlspecialchars($nama); ?></strong> berhasil disimpan ke sistem.</p>
            <br>
            <button onclick="window.location.href='index.php'">Kembali ke Dashboard</button>
        <?php else: ?>
            <h2 style="color: var(--magenta);">❌ Gagal</h2>
            <p>Terjadi kesalahan saat menyimpan data: <br> 
               <span style="color: red; font-size: 0.8rem;"><?php echo mysqli_error($koneksi); ?></span>
            </p>
            <br>
            <button onclick="window.history.back()">Coba Lagi</button>
        <?php endif; ?>
    </div>

    <script>
        // Efek transisi halus saat masuk halaman
        document.body.style.opacity = "0";
        window.onload = function() {
            document.body.style.transition = "opacity 0.8s ease-in-out";
            document.body.style.opacity = "1";
        };
    </script>
</body>
</html>
