<?php 
include 'koneksi.php';

$nis = $_GET['nis'];
$data = mysqli_query($koneksi, "SELECT * FROM siswa WHERE nis='$nis'");
$row = mysqli_fetch_assoc($data);

if (isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    $jurusan = $_POST['jurusan'];

    mysqli_query($koneksi, "UPDATE siswa SET nama='$nama', kelas='$kelas', jurusan='$jurusan' WHERE nis='$nis'");

    header("Location: index.php");
    
} ?>

<head>
    <meta charset="UTF-8">
    <title>Edit Data</title>
    <link rel="stylesheet" href="styles.css">
</head>

<script>
    document.querySelectorAll('form').forEach(form => {
        form.addEventListener('submit', function() {
            const btn = this.querySelector('button');
            btn.style.opacity = '0.7';
            btn.innerText = 'Mohon Tunggu...';
        });
    });

    // Menghilangkan pesan sukses otomatis setelah 3 detik
    const alertBox = document.querySelector('.alert');
    if(alertBox) {
        setTimeout(() => {
            alertBox.style.display = 'none';
        }, 3000);
    }
</script>

<head>
    <meta charset="UTF-8">
    <title>Edit Data Siswa</title>
    <link rel="stylesheet" href="style.css"> </head>

<div class="form-container">
    <form method="POST">
        <h2>Edit Data Siswa</h2>
        
        <label>Nama</label>
        <input type="text" name="nama" value="<?php echo $row['nama']; ?>" required>

        <label>Kelas</label>
        <input type="text" name="kelas" value="<?php echo $row['kelas']; ?>" required>

        <label>Jurusan</label>
        <input type="text" name="jurusan" value="<?php echo $row['jurusan']; ?>" required>

        <button type="submit" name="submit">Update Data</button>
        <p style="text-align: center;"><a href="index.php" style="color: var(--magenta); text-decoration: none; font-size: 0.8rem;">← Kembali</a></p>
    </form>
</div>