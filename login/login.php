<?php
include 'd:/xampp/htdocs/website-peminjaman-ruangan/test/test_koneksi.php';
session_start();
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $username=$_POST["username"];
    $password=$_POST["password"];
    $sql="select * from login where username= '".$username."' AND password= '".$password."'";
    $result=mysqli_query($koneksi,$sql);
    $row=mysqli_fetch_array($result);
    if($row["usertype"]== "user"){
        $_SESSION["username"]=$username;
        header("location:/website-peminjaman-ruangan/user/beranda.php");
    }
    elseif($row["usertype"]== "admin"){
        $_SESSION["username"]=$username;
        header("location:/website-peminjaman-ruangan/admin/halaman.php");
    }
    else{echo "username atau password salah";}
}
?>

<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh">
        <form class="border shadow p-3 rounded"
            action="#"
            method="post"
            style="width: 450px;">
            <h1 class="text-center p-3">LOGIN</h1>
            <?php if (isset($_GET['error'])) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_GET['error'] ?>
                </div>
            <?php } ?>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password">
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>