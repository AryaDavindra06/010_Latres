<?php

include 'koneksi.php';

$data = mysqli_query($conn,
"SELECT * FROM peminjaman");

?>

<!DOCTYPE html>
<html>
<head>

<title>Data Peminjaman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="d-flex justify-content-between mb-3">

<h2>Database Peminjaman</h2>

<a href="koleksi.php"
class="btn btn-success">

Kembali

</a>

</div>

<a href="tambah_peminjaman.php"
class="btn btn-primary mb-3">

+ Catat Peminjaman

</a>

<table class="table table-bordered table-striped bg-white">

<tr class="table-primary">

<th>No</th>
<th>Kode Peminjaman</th>
<th>Nama Peminjam</th>
<th>Judul Buku</th>
<th>Tanggal Pinjam</th>
<th>Tanggal Kembali</th>
<th>Status</th>

</tr>

<?php while($d = mysqli_fetch_array($data)){ ?>

<tr>

<td><?php echo $d['id']; ?></td>

<td><?php echo $d['kode_pinjam']; ?></td>

<td><?php echo $d['nama_peminjam']; ?></td>

<td><?php echo $d['judul_buku']; ?></td>

<td><?php echo $d['tanggal_pinjam']; ?></td>

<td><?php echo $d['tanggal_kembali']; ?></td>

<td>

<?php

$status = $d['status_pinjam'];

if($status == "Dipinjam"){

echo "<span class='badge bg-warning'>
Dipinjam
</span>";

}
elseif($status == "Terlambat"){

echo "<span class='badge bg-danger'>
Terlambat
</span>";

}
else{

echo "<span class='badge bg-success'>
Dikembalikan
</span>";

}

?>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>