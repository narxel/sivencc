<?php
// Menghubungkan ke database (ganti dengan informasi koneksi yang sesuai)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sivencc";
$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Memeriksa apakah parameter id ada dalam URL
if (!isset($_GET['id'])) {
    echo "ID tidak ditemukan.";
    exit;
}

// Mendapatkan ID dari parameter URL
$id = $_GET['id'];

// Memeriksa apakah form telah disubmit
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mengambil data yang diperbarui dari form
    $namaunit = $_POST['namaunit'];
    $jenisunit = $_POST['jenisunit'];
    $stts = $_POST['stts'];
    $merk = $_POST['merk'];
    $sn = $_POST['sn'];
    $ket = $_POST['ket'];
    $hargasewa = $_POST['hargasewa'];
    $tanggalmasuk = $_POST['tanggalmasuk'];

    // Query untuk memperbarui data di tabel stock
    $sql = "UPDATE stock SET namaunit='$namaunit', jenisunit='$jenisunit', stts='$stts', merk='$merk', sn='$sn', ket='$ket', hargasewa='$hargasewa', tanggalmasuk='$tanggalmasuk' WHERE id='$id'";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil diperbarui.";
    } else {
        echo "Terjadi kesalahan saat memperbarui data: " . $conn->error;
    }
}

// Query untuk mendapatkan data dengan ID yang sesuai
$sql = "SELECT * FROM stock WHERE id='$id'";
$result = $conn->query($sql);

// Memeriksa apakah data ditemukan
if ($result->num_rows === 1) {
    $row = $result->fetch_assoc();
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <title>Edit Data</title>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    </head>
    <body>
        <div class="container">
            <h2>Edit Data</h2>
            <form method="POST" action="">
                <div class="form-group">
                    <label for="namaunit">Nama Unit:</label>
                    <input type="text" class="form-control" id="namaunit" name="namaunit" value="<?php echo $row['namaunit']; ?>">
                </div>
                <div class="form-group">
                    <label for="jenisunit">Jenis Unit:</label>
                    <input type="text" class="form-control" id="jenisunit" name="jenisunit" value="<?php echo $row['jenisunit']; ?>">
                </div>
                <div class="form-group">
                    <label for="stts">Status:</label>
                    <input type="text" class="form-control" id="stts" name="stts" value="<?php echo $row['stts']; ?>">
                </div>
                <div class="form-group">
                    <label for="merk">Merk:</label>
                    <input type="text" class="form-control" id="merk" name="merk" value="<?php echo $row['merk']; ?>">
                </div>
                <div class="form-group">
                    <label for="sn">Serial Number:</label>
                    <input type="text" class="form-control" id="sn" name="sn" value="<?php echo $row['sn']; ?>">
                </div>
                <div class="form-group">
                    <label for="ket">Keterangan:</label>
                    <input type="text" class="form-control" id="ket" name="ket" value="<?php echo $row['ket']; ?>">
                </div>
                <div class="form-group">
                    <label for="hargasewa">Harga Sewa:</label>
                    <input type="text" class="form-control" id="hargasewa" name="hargasewa" value="<?php echo $row['hargasewa']; ?>">
                </div>
                <div class="form-group">
                    <label for="tanggalmasuk">Tanggal Masuk:</label>
                    <input type="date" class="form-control" id="tanggalmasuk" name="tanggalmasuk" value="<?php echo $row['tanggalmasuk']; ?>">
                </div>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </form>
        </div>
    </body>
    </html>
    <?php
} else {
    echo "Data tidak ditemukan.";
}

// Menutup koneksi
$conn->close();
?>
