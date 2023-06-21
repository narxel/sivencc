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

// Query untuk menghapus data dari tabel stock
$sql = "DELETE FROM stock WHERE id='$id'";

if ($conn->query($sql) === TRUE) {
    echo "Data berhasil dihapus.";
} else {
    echo "Terjadi kesalahan saat menghapus data: " . $conn->error;
}

// Menutup koneksi
$conn->close();
?>
