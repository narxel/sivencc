<?php
session_start();

// Konstanta koneksi database
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'sivencc');

// Membuat koneksi ke database
$conn = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if(isset($_POST['input'])){
    $namaunit = $_POST['namaunit'];
    $jenisunit = $_POST['jenisunit'];
    $stts = $_POST['stts'];
    $merk = $_POST['merk'];
    $sn = $_POST['sn'];
    $ket = $_POST['ket'];
    $hargasewa = $_POST['hargasewa'];
    $tanggalmasuk = $_POST['tanggalmasuk'];

    $addtotable = mysqli_query($conn, "insert into stock (namaunit, jenisunit, stts, merk, sn, ket, hargasewa, tanggalmasuk) VALUES ('$namaunit', '$jenisunit', '$stts', '$merk', '$sn', '$ket', '$hargasewa', '$tanggalmasuk')");
    if($addtotable){
        header('location:index.php');
    } else {
        echo 'gagal';
        header('location:index.php');
    }
}
?>
