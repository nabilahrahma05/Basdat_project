<?php include("header.php") ?>
<div class="welcome-section">
    <h2>Daftar Properti</h2>
</div>
<table class="table">
    <tr>
        <th>#</th>
        <th>Properti</th>
        <th>Jumlah</th>
    </tr>
    <?php
    include 'd:/xampp/htdocs/website-peminjaman-ruangan/test/test_koneksi.php';
    $ambildata = mysqli_query($koneksi, "select * from daftar_properti");
    while ($tampil = mysqli_fetch_array($ambildata)) {
        echo "
        <tr>
            <td>$tampil[id]</td>
            <td>$tampil[Properti]</td>
            <td>$tampil[Jumlah]</td>
        </tr>";
    }
    ?>
</table>
<?php include("footer.php") ?>