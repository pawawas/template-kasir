<?php
include('koneksi.php');
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Kasir Niken</title>


    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

    <!-- Custom styles for this template -->

    <link href="assets/css/blog.css" rel="stylesheet">

    <!-- Custom javascript for this template -->
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>

</head>

<body>

    <div class="container">
        <header class="blog-header py-3">
            <div class="row flex-nowrap justify-content-between align-items-center">
                <!-- <div class="col-4 pt-1">
        <a class="link-secondary" href="#">Subscribe</a>
      </div> -->
                <div class="col-8">
                    <a class="blog-header-logo text-dark" href="#">Kasirku</a>
                </div>
                <div class="col-4 d-flex justify-content-end align-items-center">
                    <!-- <a class="link-secondary" href="#" aria-label="Search">
          <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"/><path d="M21 21l-5.2-5.2"/></svg>
        </a> -->

                </div>
            </div>
        </header>

        <div class="py-1 mb-4 border-bottom">
            <nav class="navbar navbar-expand-lg navbar-light bg-default">
                <div class="container-fluid">
                    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                            <a class="p-2 nav-link active" href="index.php"><i class="bi bi-house"></i> Home</a>
                            <a class="p-2 nav-link" href="pelanggan.php"><i class="bi bi-person"></i> Pelanggan</a>
                            <a class="p-2 nav-link" href="produk.php"><i class="bi bi-basket"></i> Produk</a>
                            <a class="p-2 nav-link" href="penjualan.php"><i class="bi bi-cart"></i> Kasir</a>
                            <a class="p-2 nav-link" href="laporan.php"><i class="bi bi-file-earmark-ruled"></i> Laporan</a>
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="bi bi-people-fill"></i> Petugas
                                </a>
                                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <li><a class="dropdown-item" href="logout.php">Logout</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </nav>
        </div>
    </div>

    <main class="container">

        <div class="row g-5 mb-4">
            <div class="col-md-12">
                <h4>Edit Produk</h4>

                <?php
                $id = $_GET['id'];
                $sql = "SELECT * FROM produk WHERE produk_id = '$id'";
                $query = mysqli_query($koneksidb, $sql);
                $result = mysqli_fetch_array($query);
                ?>
                <div class="card mt-2">
                    <div class="card-body">
                        <form method="post" action="proses_edit_produk.php">
                            <div class="mb-3">
                                <label class="form-label">Nama Produk</label>
                                <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>" required>
                                <input type="text" name="nama" class="form-control" id="barang" value="<?php echo $result['nama_produk']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Harga</label>
                                <input type="text" name="harga" class="form-control" id="alamat" value="<?php echo $result['harga']; ?>" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Stok</label>
                                <input type="text" name="stok" class="form-control" id="nomer" value="<?php echo $result['stok']; ?>" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                        <a href="produk.php" class="btn btn-danger">Kembali</a>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        </div>
        </div>

    </main>


   

</body>

</html>