<?php
//IMPOR FILE
    require 'function.php';
    require 'cek.php';
    require 'fungsiexport.js';
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
        <link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
        <link href="css/styles.css" rel="stylesheet" />
        <!-- Impor File Javascript -->
        <script src="https://use.fontawesome.com/releases/v6.1.0/js/all.js" crossorigin="anonymous"></script>
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
                </nav>
            </div>
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid px-4">
                        <h1 class="mt-4">DOWNLOAD LAPORAN INVENTORY</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">CHEF CAMERA</li>
                        </ol>
                    </div>
                    <div class="container-fluid px-4">
                        <div class="d-grid gap-3">
                            <button type="button" class="btn btn-info" class="btn btn-primary btn-block" onclick="window.location.href = 'exren.php';">Unit Rental</button>
                            <button type="button" class="btn btn-info" class="btn btn-primary btn-block" onclick="window.location.href = 'exjul.php';">Unit Jual</button>
                            <button type="button" class="btn btn-info" class="btn btn-primary btn-block" onclick="window.location.href = 'exser.php';">Unit Service</button>
                            <button type="button" class="btn btn-info" class="btn btn-primary btn-block" onclick="window.location.href = 'exall.php';">Semua Unit</button>
                        </div>
                    </div>
                </main>
                <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Your Website 2022</div>
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
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script src="assets/demo/chart-bar-demo.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
        <script src="js/datatables-simple-demo.js"></script>
        <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
        <!-- Script Jquery -->
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</script>
    </body>
</html>
