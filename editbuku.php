<?php

include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_query($conn,
"SELECT * FROM buku WHERE id='$id'");

$d = mysqli_fetch_array($data);

if(isset($_POST['update'])){

    $kode = $_POST['kode'];
    $judul = $_POST['judul'];
    $pengarang = $_POST['pengarang'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];

    mysqli_query($conn,
    "UPDATE buku SET

    kode_buku='$kode',
    judul='$judul',
    pengarang='$pengarang',
    kategori='$kategori',
    stok='$stok'

    WHERE id='$id'
    ");

    header("Location: koleksi.php");
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Edit Buku</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card p-4 shadow">

<h2 class="mb-4">Edit Buku</h2>

<form method="POST">

<input type="text"
name="kode"
value="<?php echo $d['kode_buku']; ?>"
class="form-control mb-3">

<input type="text"
name="judul"
value="<?php echo $d['judul']; ?>"
class="form-control mb-3">

<input type="text"
name="pengarang"
value="<?php echo $d['pengarang']; ?>"
class="form-control mb-3">

<input type="text"
name="kategori"
value="<?php echo $d['kategori']; ?>"
class="form-control mb-3">

<input type="number"
name="stok"
value="<?php echo $d['stok']; ?>"
class="form-control mb-3">

<button
type="submit"
name="update"
class="btn btn-success">

Update

</button>

</form>

</div>

</div>

</body>
</html>