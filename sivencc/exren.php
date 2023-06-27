<?php
    require 'function.php';
    require 'cek.php';
?>
<html>
<head>
  <title>Unduh Laporan Inventory</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.5/css/buttons.dataTables.min.css">
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
  <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
</head>

<body>
<div class="container">
			<h2>Sistem Inventory</h2>
			<h4>Chef Camera</h4>
				<div class="data-tables datatable-dark">
					
                <table id="tabelku" class="table">
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
                                        </tr>
                                    </thead>
                                    <tbody>
<?php

// Query untuk mengambil data dari tabel stock
$sql = "SELECT id, jenisunit, namaunit, stts, merk, sn, ket, hargasewa, tanggalmasuk FROM stock WHERE stts = 'Rental' OR stts = 'Jual / Rental'";
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
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='8'>Tidak ada data yang ditemukan.</td></tr>";
}

?>
                                </tbody>
                                    <tfoot>
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
                                        </tr>
                                    </tfoot>
                                </table>
					
				</div>
</div>
	
<script>
$(document).ready(function() {
    $('#tabelku').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy','csv','excel', 'pdf', 'print'
        ]
    } );
} );

</script>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

	

</body>

</html>