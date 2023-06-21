<!DOCTYPE html>
<html>
<head>
    <title>Tabel Data Bootstrap</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2>Tabel Data</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
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
                $sql = "SELECT namaunit, jenisunit, stts, merk, sn, ket, hargasewa, tanggalmasuk FROM stock";
                $result = $conn->query($sql);

                // Menampilkan data
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["namaunit"] . "</td>";
                        echo "<td>" . $row["jenisunit"] . "</td>";
                        echo "<td>" . $row["stts"] . "</td>";
                        echo "<td>" . $row["merk"] . "</td>";
                        echo "<td>" . $row["sn"] . "</td>";
                        echo "<td>" . $row["ket"] . "</td>";
                        echo "<td>" . $row["hargasewa"] . "</td>";
                        echo "<td>" . $row["tanggalmasuk"] . "</td>";
                        echo "<td>
                                <a href='edit.php?id=" . $row["id"] . "'>Edit</a> |
                                <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
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
</body>
</html>
