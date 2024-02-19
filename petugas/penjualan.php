<?php
error_reporting(0);
session_start();
include('koneksi.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:login.php');
} else {


    $jum = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $jum += $value['harga'] * $value['jumlah'];
            # code...
        }
    }

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
                                        <i class="bi bi-person-fill"></i> Petugas
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
                    <div class="col-md-6">

                        <div class="card mt-2">
                            <div class="card-body">


                                <h1 class="text-center">Total Belanja: Rp. <?php echo number_format($jum) ?>.</h1>

                                <form action="penjualan_act.php" method="post">
                                    <input type="hidden" name="total" value="<?php echo number_format($jum) ?>">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label class="form-label">Pelanggan</label>
                                            <select class="form-control" name="pelanggan" required="" data-parsley-error-message="Field ini harus diisi">
                                                <option value="">== Pilih Pelanggan ==</option>
                                                <?php
                                                $mySql = "SELECT * FROM pelanggan ORDER BY pelanggan_id";
                                                $myQry = mysqli_query($koneksidb, $mySql);
                                                while ($myData = mysqli_fetch_array($myQry)) {
                                                    if ($myData['pelanggan_id'] == $dataMerek) {
                                                        $cek = " selected";
                                                    } else {
                                                        $cek = "";
                                                    }
                                                    echo "<option value='$myData[pelanggan_id]' $cek>$myData[nama_pelanggan] </option>";
                                                }
                                                ?>
                                            </select>

                                        </div>
                                        <div class="mb-3 mt-2">
                                            <label class="form-label">Bayar</label>
                                            <input type="hidden" id="bayar" value="<?= $jum ?>">
                                            <input type="number" name="jumlah" class="form-control" onkeyup="kembalian();" id="satuan" required>

                                            <label class="form-label">Kembali</label>
                                            <input type="number" name="kembali" class="form-control" onkeyup="kembalian();" id="pembayaran" disabled>
                                            <button type="submit" class="btn btn-primary mt-2 ">Bayar</button>
                                        </div>


                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card mt-2">
                    <div class="card-body">
                        <table class="table" id="dt">
                            <thead class="text-center">
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Produk</th>
                                    <th scope="col">Harga Produk</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Subtotal</th>
                                </tr>
                            </thead>

                            <tbody class="text-center">
                                <?php

                                session_start();
                                $no = 0;
                                foreach ($_SESSION['cart'] as $key => $value) {
                                    $no++; ?>

                                    <tr>
                                        <td><?php echo $no ?></td>
                                        <td><?= $value['nama_produk'] ?></td>
                                        <td>Rp. <?= number_format($value['harga']) ?></td>
                                        <td><?= $value['jumlah'] ?></td>
                                        <td>Rp. <?= number_format($value['jumlah'] * $value['harga']) ?></td>
                                    </tr>

                                <?php } ?>
                                <tr>
                                    <form action="keranjang_act.php" method="post">
                                        <div class="mb-3">
                                            <label class="form-label">Produk</label>
                                            <select class="form-control" name="produk" required="" data-parsley-error-message="Field ini harus diisi">
                                                <option value="">== Pilih Produk ==</option>
                                                <?php
                                                $mySql = "SELECT * FROM produk ORDER BY produk_id";
                                                $myQry = mysqli_query($koneksidb, $mySql);
                                                while ($myData = mysqli_fetch_array($myQry)) {
                                                    if ($myData['produk_id'] == $dataMerek) {
                                                        $cek = " selected";
                                                    } else {
                                                        $cek = "";
                                                    }
                                                    echo "<option value='$myData[produk_id]' $cek>$myData[nama_produk] </option>";
                                                }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label class="form-label">Jumlah</label>
                                            <input type="number" name="jumlah" class="form-control" value="<?php $total ?>" id="satuan" required>
                                            <button type="submit" class="btn btn-primary mt-2">Tambah</button>
                                            <a href="reset_keranjang.php" class="btn btn-danger mt-2" onclick="return confirm('Apakah anda Yakin akan mereset Keranjang?')">Reset Keranjang</a>
                                        </div>

                                    </form>


                            </tbody>


                        </table>


                    </div>
                </div>
            </div>
            </div>

        </main>



        <!-- Modal Add -->
        <div class="modal fade" id="addBarang" tabindex="-1" aria-labelledby="addBarangLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addBarangLabel">Tambah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form method="post" action="proses_tambah_pelanggan.php">
                            <div class="mb-3">


                                <label class="form-label">Produk</label>
                                <select class="form-control" name="produk" required="" data-parsley-error-message="Field ini harus diisi">
                                    <option value="">== Pilih Produk ==</option>
                                    <?php
                                    $mySql = "SELECT * FROM produk ORDER BY produk_id";
                                    $myQry = mysqli_query($koneksidb, $mySql);
                                    while ($myData = mysqli_fetch_array($myQry)) {
                                        if ($myData['produk_id'] == $dataMerek) {
                                            $cek = " selected";
                                        } else {
                                            $cek = "";
                                        }
                                        echo "<option value='$myData[produk_id]' $cek>$myData[nama_produk] </option>";
                                    }
                                    ?>
                                </select>
                            </div>
                            <?php

                            $sql = "SELECT * from  produk ";
                            $query = mysqli_query($koneksidb, $sql);
                            $result = mysqli_fetch_array($query);
                            $total = 0;
                            $hargaitem = $result['harga'];
                            foreach ($hargaitem as $harga) {
                                $total += $harga;
                            }
                            ?>

                            <div class="mb-3">
                                <label class="form-label">Jumlah Produk</label>
                                <input type="text" name="alamat" class="form-control" id="alamat" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Subtotal</label>
                                <input type="text" name="nomer" class="form-control" value="<?php $total ?>" id="satuan" required>
                            </div>

                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <script>
            function kembalian() {
                var b = parseInt(document.getElementById('bayar').value);
                var a = parseInt(document.getElementById('satuan').value);
                var kembali = a - b;
                document.getElementById('pembayaran').value = kembali;

            }
        </script>
        <script type="text/javascript">
            $(document).ready(function() {
                var dt = $('#dt').DataTable({
                    bInfo: false,
                    pageLength: 10,
                    lengthChange: false,
                    deferRender: true,
                    processing: true,
                });

                $('#addBarangBtn').click(function() {
                    $('#addBarang').modal('show');
                })
            });
        </script>

    </body>

    </html>
<?php } ?>