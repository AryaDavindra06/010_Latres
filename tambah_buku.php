<?php
include 'koneksi.php';

if(isset($_POST['simpan'])){

    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    mysqli_query($conn,
    "INSERT INTO buku VALUES(
    '',
    '$kode',
    '$judul',
    '$pengarang',
    '$kategori',
    '$stok'
    )");

    header("Location: koleksi.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Buku</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4 shadow">

<h2 class="mb-4">Tambah Buku</h2>

<form method="POST">

<input type="text"
name="kode"
placeholder="Kode Buku"
class="form-control mb-3">

<input type="text"
name="judul"
placeholder="Judul Buku"
class="form-control mb-3">

<input type="text"
name="pengarang"
placeholder="Pengarang"
class="form-control mb-3">

<input type="text"
name="kategori"
placeholder="Kategori"
class="form-control mb-3">

<input type="number"
name="stok"
placeholder="Stok"
class="form-control mb-3">

<button
type="submit"
name="simpan"
class="btn btn-primary">

Simpan

</button>

</form>

</div>

</div>

</body>
</html>