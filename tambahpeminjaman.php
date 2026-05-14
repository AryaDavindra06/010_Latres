<?php

include 'koneksi.php';

$buku = mysqli_query($conn,
"SELECT * FROM buku WHERE stok > 0");

if(isset($_POST['simpan'])){

    $kode = $_POST['kode'];
    $nama = $_POST['nama'];
    $judul = $_POST['judul'];
    $tglpinjam = $_POST['tglpinjam'];
    $tglkembali = $_POST['tglkembali'];

    mysqli_query($conn,

    "INSERT INTO peminjaman VALUES(

    '',
    '$kode',
    '$nama',
    '$judul',
    '$tglpinjam',
    '$tglkembali',
    'Dipinjam'

    )"

    );

    mysqli_query($conn,

    "UPDATE buku
    SET stok = stok-1
    WHERE judul='$judul'"

    );

    header("Location: peminjaman.php");
}

?>

<!DOCTYPE html>
<html>
<head>

<title>Tambah Peminjaman</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body class="bg-light">

<div class="container mt-5">

<div class="card shadow p-4">

<h2 class="mb-4">

Form Data Peminjaman

</h2>

<form method="POST">

<label>
Kode Peminjaman
</label>

<input
type="text"
name="kode"
class="form-control mb-3"
required>

<label>
Nama Peminjam
</label>

<input
type="text"
name="nama"
class="form-control mb-3"
required>

<label>
Pilih Buku
</label>

<select
name="judul"
class="form-control mb-3">

<?php while($b = mysqli_fetch_array($buku)){ ?>

<option>

<?php echo $b['judul']; ?>

</option>

<?php } ?>

</select>

<label>
Tanggal Pinjam
</label>

<input
type="date"
name="tglpinjam"
class="form-control mb-3"
required>

<label>
Tanggal Kembali
</label>

<input
type="date"
name="tglkembali"
class="form-control mb-3"
required>

<button
type="submit"
name="simpan"
class="btn btn-primary">

Simpan

</button>

<a href="peminjaman.php"
class="btn btn-secondary">

Kembali

</a>

</form>

</div>

</div>

</body>
</html>