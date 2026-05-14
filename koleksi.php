<?php

session_start();

include 'koneksi.php';

if(!isset($_SESSION['login'])){
    header("Location: login.php");
}

$data = mysqli_query($conn,
"SELECT * FROM buku");

?>

<!DOCTYPE html>
<html>
<head>

<title>Koleksi Buku</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="d-flex justify-content-between mb-3">

<h2>Koleksi Buku</h2>

<div>

<a href="tambah_buku.php"
class="btn btn-primary">

+ Tambah Buku

</a>

<a href="peminjaman.php"
class="btn btn-success">

Peminjaman

</a>

<a href="logout.php"
class="btn btn-danger">

Logout

</a>

</div>

</div>

<table class="table table-bordered table-striped table-hover bg-white">

<tr class="table-primary">

<th>ID</th>
<th>Kode Buku</th>
<th>Judul</th>
<th>Pengarang</th>
<th>Kategori</th>
<th>Stok</th>
<th>Status</th>
<th>Aksi</th>

</tr>

<?php while($d = mysqli_fetch_array($data)){ ?>

<tr>

<td>
<?php echo $d['id']; ?>
</td>

<td>
<?php echo $d['kode_buku']; ?>
</td>

<td>
<?php echo $d['judul']; ?>
</td>

<td>
<?php echo $d['pengarang']; ?>
</td>

<td>
<?php echo $d['kategori']; ?>
</td>

<td>
<?php echo $d['stok']; ?>
</td>

<td>

<?php

if($d['stok'] == 0){

echo "<span class='badge bg-danger'>
Habis
</span>";

}
elseif($d['stok'] <= 5){

echo "<span class='badge bg-warning'>
Menipis
</span>";

}
else{

echo "<span class='badge bg-success'>
Tersedia
</span>";

}

?>

</td>

<td>

<a
href="edit_buku.php?id=<?php echo $d['id']; ?>"
class="btn btn-warning btn-sm">

Edit

</a>

<a
href="hapus_buku.php?id=<?php echo $d['id']; ?>"
class="btn btn-danger btn-sm">

Hapus

</a>

</td>

</tr>

<?php } ?>

</table>

</div>

</body>
</html>