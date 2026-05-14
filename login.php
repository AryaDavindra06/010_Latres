

<?php
session_start();
include 'koneksi.php';

$error = "";

if(isset($_POST['login'])){

    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($conn,
    "SELECT * FROM users
    WHERE username='$username'
    AND password='$password'");

    if(mysqli_num_rows($query) > 0){

        $_SESSION['login'] = true;

        header("Location: koleksi.php");

    }else{
        $error = "Username atau Password salah!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<title>Login</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<style>

body{
    background:#e3f2fd;
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
}

.card{
    width:350px;
}

</style>

</head>

<body>

<div class="card shadow p-4">

<h2 class="text-center mb-4">
Pustaka Digital
</h2>

<?php if($error != ""){ ?>

<div class="alert alert-danger">
<?php echo $error; ?>
</div>

<?php } ?>

<form method="POST">

<input
type="text"
name="username"
placeholder="Username"
class="form-control mb-3">

<input
type="password"
name="password"
placeholder="Password"
class="form-control mb-3">

<button
type="submit"
name="login"
class="btn btn-primary w-100">

Login

</button>

</form>

</div>

</body>
</html>