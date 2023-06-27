<!DOCTYPE html>
<html>
<head>
    <title>Tabel Data Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Tabel Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Jenis</th>
                    <th>Nama Unit</th>
                    <th>Status</th>
                    <th>Merk</th>
                    <th>Serial Number</th>
                    <th>Keterangan</th>
                    <th>Harga Sewa</th>
                    <th>Tanggal Masuk</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
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

                // Query untuk mengambil data dari tabel stock
                $sql = "SELECT id, jenisunit, namaunit, stts, merk, sn, ket, hargasewa, tanggalmasuk FROM stock";
                $result = $conn->query($sql);

                // Menampilkan data
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id"] . "</td>";
                        echo "<td>" . $row["jenisunit"] . "</td>";
                        echo "<td>" . $row["namaunit"] . "</td>";
                        echo "<td>" . $row["stts"] . "</td>";
                        echo "<td>" . $row["merk"] . "</td>";
                        echo "<td>" . $row["sn"] . "</td>";
                        echo "<td>" . $row["ket"] . "</td>";
                        echo "<td>" . $row["hargasewa"] . "</td>";
                        echo "<td>" . $row["tanggalmasuk"] . "</td>";
                        echo "<td>";
                        echo "<button type='button' class='btn btn-primary' data-bs-toggle='modal' data-bs-target='#editModal" . $row["id"] . "'>Edit</button>";
                        echo "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='9'>Tidak ada data yang ditemukan.</td></tr>";
                }

                // Menutup koneksi
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>

    <?php
    // Menghubungkan ke database (ganti dengan informasi koneksi yang sesuai)
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Memeriksa koneksi
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }

    // Query untuk mengambil data dari tabel stock (kembali digunakan untuk modal)
    $result = $conn->query($sql);

    // Menampilkan modal untuk setiap baris data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='modal fade' id='editModal" . $row["id"] . "' tabindex='-1' aria-labelledby='editModalLabel" . $row["id"] . "' aria-hidden='true'>";
            echo "<div class='modal-dialog'>";
            echo "<div class='modal-content'>";
            echo "<div class='modal-header'>";
            echo "<h5 class='modal-title' id='editModalLabel" . $row["id"] . "'>Edit Data</h5>";
            echo "<button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>";
            echo "</div>";
            echo "<div class='modal-body'>";
            // Form edit data
            echo "<form method='POST' action='edit_data.php'>"; // Ganti 'edit_data.php' dengan file yang sesuai untuk memproses edit data
            echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
            // Tambahkan input fields untuk kolom lainnya
            echo "<div class='mb-3'>";
            echo "<label for='jenisunit" . $row["id"] . "' class='form-label'>Jenis</label>";
            echo "<input type='text' class='form-control' id='jenisunit" . $row["id"] . "' name='jenisunit' value='" . $row["jenisunit"] . "'>";
            echo "</div>";
            // Tambahkan input fields lainnya sesuai dengan kolom tabel yang ada
            echo "<button type='submit' class='btn btn-primary'>Simpan</button>";
            echo "</form>";
            echo "</div>";
            echo "<div class='modal-footer'>";
            echo "<button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Tutup</button>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
        }
    }

    // Menutup koneksi
    $conn->close();
    ?>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
