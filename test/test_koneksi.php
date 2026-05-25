<?php
$host       = "localhost:3307";
$user       = "root";
$pass       = "";
$db         = "peminjaman_db";

$koneksi    = mysqli_connect($host,$user,$pass,$db);
if(!$koneksi){
    die("Gagal terkoneksi");
}