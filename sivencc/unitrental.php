<?php
//IMPOR FILE
    require 'function.php';
    require 'cek.php';
?>
<!DOCTYPE html>
<html lang="id">
    <head>
        <!-- Set Karakter -->
        <meta charset="utf-8" />
        <!-- Untuk Edge -->
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- Setting tampilan di seluler -->
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <!-- Deskripsi buat SEO -->
        <meta name="description" content="Sistem inventory yang dirancang khusus untuk Chef Camera" />
        <!-- Author -->
        <meta name="author" content="Narendra Rivando Axel Syanjaya" />
        <!-- Nama Tab -->
        <title>Sistem Inventory Chef Camera</title>
        <!-- Impor File CSS -->
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Impor File Javascript -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
        <!--Tautan ke Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
        <!-- Tautan ke Cleave/Nominal Rupiah -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/cleave.js/1.6.0/cleave.min.js"></script> 
    </head>
    
    <body class="sb-nav-fixed">
        <nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
            <!-- Bar Kiri Atas-->
            <a class="navbar-brand ps-3" href="index.php">SIVENCC</a>
            <!-- Bar Kiri-->
            <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i class="fas fa-bars"></i></button>
            <!-- Pencarian-->
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Cari Unit..." aria-label="Cari Unit..." aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i class="fas fa-search"></i></button>
                </div>
            </form>
            <!-- Bar Kanan-->
            <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-user fa-fw"></i></a>
                    <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item" href="#!">Settings</a></li>
                        <li><a class="dropdown-item" href="#!">Activity Log</a></li>
                        <li><hr class="dropdown-divider" /></li>
                        <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- Navigasi Kiri-->
        <div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <!-- Menu--> 
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link" href="index.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>
                            <a class="nav-link" href="unitrental.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Unit Rental
                            </a>
                            <a class="nav-link" href="unitjual.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Unit Jual
                            </a>
                            <a class="nav-link" href="unitservice.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Unit Service
                            </a>
                            <div class="sb-sidenav-menu-heading">Download Laporan</div>
                            <a class="nav-link" href="unduh.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Unduh
                            </a>
                        </div>
                    </div>
                    <!-- Pojok Kiri Bawah -->
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>
            <!-- Jeneng Duwur -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">UNIT RENTAL</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">CHEF CAMERA</li>
                        </ol>
                        <!-- Tabel -->
                        <div class="card mb-4">
                            <!-- Kepala Tabel -->
                            <div class="card-header">
                                <i class="fas fa-table me-1"></i>
                                Unit Rental
                                <!-- Tombol Input Data -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#inputData">
                                INPUT
                                </button>
                            </div>
                            <!-- Body Tabel -->
                            <div class="card-body">
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
                                            <th>Aksi</th>
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
                                                echo "<td>
                                                                        <a href='edit.php?id=" . $row["id"] . "'>Edit</a> |
                                                                        <a href='delete.php?id=" . $row["id"] . "' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                                                                    </td>";
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
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Mark up Modal -->
                    <div class="modal fade" id="inputData">
                        <div class="modal-dialog">
                        <div class="modal-content">
    
                        <!-- Header modal -->
                                <div class="modal-header">
                                    <h4 class="modal-title">Input Unit Baru</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
      
                        <!-- Konten modal -->
                                <div class="modal-body">
                                <div class="container pt-4">
                                    <form action="function.php" method="POST">
                                        <div class="form-group">
                                            <label for="jenis">Jenis :</label>
                                            <select class="form-control" id="jenis" name="jenisunit">
                                                <option value="body">Body</option>
                                                <option value="lensa">Lensa</option>
                                                <option value="aksesoris">Aksesoris</option>
                                            </select>                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="nama">Nama Unit :</label>
                                            <input type="text" class="form-control" id="nama" name="namaunit" placeholder="Masukkan Nama Unit">
                                        </div>
                                        <div class="form-group">
                                            <label for="merk">Status :</label>
                                            <select class="form-control" id="status" name="stts">
                                                <option value="Jual / Rental">Jual / Rental</option>
                                                <option value="Jual">Jual</option>
                                                <option value="Rental">Rental</option>
                                            </select>                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="merk">Merk :</label>
                                            <select class="form-control" id="merk" name="merk">
                                                <option value="Sony">Sony</option>
                                                <option value="Canon">Canon</option>
                                                <option value="Nikon">Nikon</option>
                                                <option value="Fujifilm">Fujifilm</option>
                                                <option value="Lumix">Lumix</option>
                                                <option value="Olympus">Olympus</option>
                                            </select>                                        
                                        </div>
                                        <div class="form-group">
                                            <label for="sn">serialnumber</label>
                                            <input type="text" class="form-control" id="sn" name="sn" placeholder="Masukkan Serial Number Unit">
                                        </div>
                                        <div class="form-group">
                                            <label for="tanggal">Tanggal Masuk :</label>
                                            <input type="date" class="form-control" id="tanggal" name="tanggalmasuk" placeholder="Masukkan Tanggal Unit Masuk">
                                        </div>
                                        <div class="form-group">
                                            <label for="ket">Keterangan</label>
                                            <input type="text" class="form-control" id="ket" name="ket" placeholder="Masukkan Keterangan Tambahan Seperti Minus DLL">
                                        </div>
                                        <div class="form-group">
                                            <label for="harga">Harga Sewa :</label>
                                            <input type="text" class="form-control" id="hargasewa" name="hargasewa" placeholder="Masukkan Harga">
                                        </div>
                                    
                                </div>
                                </div>
      
                        <!-- Footer modal -->
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-primary" name="input">Simpan</button>
                                    </form>
                                </div>
                        </div>
                        </div>
                    </div>
                </main>
                <!-- Footer -->
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; @narxel 2023</div>
                            <div>
                                <a href="#">Privacy Policy</a>
                                &middot;
                                <a href="#">Terms &amp; Conditions</a>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
        <!-- Script Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <!-- Script Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <!-- Inisialisasi Modal -->
        <script>
            $(document).ready(function(){
                $('#myModal').modal('show');
            });
        </script>
        <!-- Inisialisasi Rupiah -->
        <script>
            var cleave = new Cleave('#hargasewa', {
                numeral: true,
                numeralThousandsGroupStyle: 'thousand',
                prefix: 'Rp ',
                rawValueTrimPrefix: true
            });
        </script>
    </body>
</html>