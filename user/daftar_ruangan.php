<?php include("header.php") ?>
<div class="welcome-section">
    <h2>Daftar Ruangan</h2>
</div>
<table class="table">
    <tr>
        <th>#</th>
        <th>Kode Ruangan</th>
        <th>Tipe</th>
        <th>Fasilitas</th>
    </tr>
    <?php
    include 'd:/xampp/htdocs/website-peminjaman-ruangan/test/test_koneksi.php';
    $no=1;
    $ambildata = mysqli_query($koneksi, "select Kode_Ruangan, Tipe, Fasilitas from daftar_ruangan order by Kode_Ruangan asc");
    while ($tampil = mysqli_fetch_array($ambildata)) {
        echo "
        <tr>
            <td>$no</td>
            <td>$tampil[Kode_Ruangan]</td>
            <td>$tampil[Tipe]</td>
            <td>$tampil[Fasilitas]</td>
        </tr>";
        $no++;
    }
    ?>
</table>
<?php include("footer.php") ?>