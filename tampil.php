<?php
include 'koneksi.php';
$query = "SELECT * FROM siswa";
$result = mysqli_query($koneksi, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="table-container">
    <h2>Data Siswa</h2>
    <table>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php while ($row = mysqli_fetch_assoc($result)) { ?>
        <tr>
            <td><?php echo $row['nis']; ?></td>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['kelas']; ?></td>
            <td><?php echo $row['jurusan']; ?></td>
            <td>
                <a href="edit.php?nis=<?php echo $row['nis']; ?>" class="btn-action edit">Edit</a> |
                <a href="delete.php?nis=<?php echo $row['nis']; ?>" class="btn-action delete"
                    onclick="return confirm('Hapus data ini?')">Hapus</a>
            </td>
        </tr> 
        <?php } ?>
    </table>
</div>
    <center>  
</body>
</html>

