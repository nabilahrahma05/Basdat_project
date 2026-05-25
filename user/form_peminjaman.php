<?php include("header.php") ?>
<?php
include 'd:/xampp/htdocs/website-peminjaman-ruangan/test/test_koneksi.php';

// Inisialisasi variabel
$NIM = $Nama_Lengkap = $No_Telp = $Kelas  = $Tanggal_Peminjaman = $Kode_Ruangan = $Kegiatan = $Dosen_Pengampu = $Waktu_mulai = $Waktu_selesai = "";
$sukses = $error = "";

// Operasi kirim data
if (isset($_POST['Kirim'])) {
    $NIM = $_POST['NIM'];
    $Nama_Lengkap = $_POST['Nama_Lengkap'];
    $No_Telp = $_POST['No_Telp'];
    $Kelas = $_POST['Kelas'];
    $Tanggal_Peminjaman = $_POST['Tanggal_Peminjaman'];
    $Kode_Ruangan = $_POST['Kode_Ruangan'];
    $Kegiatan = $_POST['Kegiatan'];
    $Dosen_Pengampu = $_POST['Dosen_Pengampu'];
    $Waktu_mulai = $_POST['Waktu_mulai'];
    $Waktu_selesai = $_POST['Waktu_selesai'];

    if ($NIM && $Nama_Lengkap && $No_Telp && $Kelas && $Tanggal_Peminjaman && $Kode_Ruangan && $Kegiatan && $Dosen_Pengampu && $Waktu_mulai && $Waktu_selesai) {
        $sql1 = "INSERT INTO Form_Peminjaman (NIM, Nama_Lengkap, No_Telp, Kelas,  Tanggal_Peminjaman, Kode_Ruangan, Kegiatan, Dosen_Pengampu, Waktu_mulai, Waktu_selesai) VALUES ('$NIM', '$Nama_Lengkap', '$No_Telp', '$Kelas', '$Tanggal_Peminjaman', '$Kode_Ruangan', '$Kegiatan', '$Dosen_Pengampu', '$Waktu_mulai', '$Waktu_selesai')";
        $q1 = mysqli_query($koneksi, $sql1);
        if ($q1) {
            $sukses = "Data berhasil terkirim";
        } else {
            $error = "Gagal menyimpan data";
        }
    } else {
        $error = "Harap isi semua data";
    }
}
?>

<div class="container mt-5">
    <h1 class="mb-4">Form Peminjaman</h1>
    <div class="p-3 text-warning-emphasis bg-warning-subtle border border-warning-subtle rounded-3">
        Harap mengisi dengan benar karena form tidak dapat diedit
    </div>
    <?php if ($error) { ?>
        <div class="alert alert-danger"> <?php echo $error; ?> </div>
        <?php header("refresh:3;url=peminjaman_terjadwal.php");
    } ?>

    <?php if ($sukses) { ?>
        <div class="alert alert-success"> <?php echo $sukses; ?> </div>
        <?php header("refresh:3;url=peminjaman_terjadwal.php");
    } ?>

    <form action="" method="POST" class="shadow p-4 rounded bg-light">
        <div class="mb-3">
            <label for="NIM" class="form-label">NIM</label>
            <input type="text" class="form-control" id="NIM" name="NIM" value="<?php echo $NIM; ?>">
        </div>

        <div class="mb-3">
            <label for="Nama_Lengkap" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="Nama_Lengkap" name="Nama_Lengkap"
                value="<?php echo $Nama_Lengkap; ?>">
        </div>

        <div class="mb-3">
            <label for="No_Telp" class="form-label">No. Telepon</label>
            <input type="text" class="form-control" id="No_Telp" name="No_Telp" value="<?php echo $No_Telp; ?>">
        </div>

        <div class="mb-3">
            <label for="Kelas" class="form-label">Kelas (contoh: STAT23A)</label>
            <input type="text" class="form-control" id="Kelas" name="Kelas" value="<?php echo $Kelas; ?>">
        </div>

        <div class="mb-3">
            <label for="Tanggal_Peminjaman" class="form-label">Tanggal Peminjaman</label>
            <input type="date" class="form-control" id="Tanggal_Peminjaman" name="Tanggal_Peminjaman"
                value="<?php echo $Tanggal_Peminjaman; ?>">
        </div>
        <div class="mb-3">
            <label for="Kode_Ruangan" class="form-label">Kode Ruangan</label>
            <select id="Kode_Ruangan" class="form-select" name="Kode_Ruangan">
                <option value="---" <?php if ($Kode_Ruangan == '---')
                    echo 'selected'; ?>>---</option>
                <?php
                $query = mysqli_query($koneksi, "SELECT Kode_Ruangan FROM daftar_ruangan") or die(mysqli_error($koneksi));
                while ($data = mysqli_fetch_array($query)) {
                    $selected = ($Kode_Ruangan == $data['Kode_Ruangan']) ? 'selected' : '';
                    echo "<option value='{$data['Kode_Ruangan']}' {$selected}>{$data['Kode_Ruangan']}</option>";
                }
                ?>

            </select>
        </div>

        <div class="mb-3">
            <label for="Kegiatan" class="form-label">Kegiatan</label>
            <input type="text" class="form-control" id="Kegiatan" name="Kegiatan" value="<?php echo $Kegiatan; ?>">
        </div>
        <div class="mb-3">
            <label for="Dosen_Pengampu" class="form-label">Dosen Pengampu</label>
            <input type="text" class="form-control" id="Dosen_Pengampu" name="Dosen_Pengampu"
                value="<?php echo $Dosen_Pengampu; ?>">
        </div>

        <div class="mb-3">
            <label for="Waktu_mulai" class="form-label">Waktu Mulai</label>
            <input type="time" class="form-control" id="Waktu_mulai" name="Waktu_mulai"
                value="<?php echo $Waktu_mulai; ?>">
        </div>

        <div class="mb-3">
            <label for="Waktu_selesai" class="form-label">Waktu Selesai</label>
            <input type="time" class="form-control" id="Waktu_selesai" name="Waktu_selesai"
                value="<?php echo $Waktu_selesai; ?>">
        </div>

        <button type="submit" name="Kirim" class="btn btn-primary">Kirim</button>
    </form>
</div>

<?php include("footer.php") ?>