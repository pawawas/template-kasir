<?php
session_start();
include('koneksi.php');
if(strlen($_SESSION['alogin'])==0)
{	
header('location:login.php');
}
else{
?>
<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="description" content="">
  <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
  <meta name="generator" content="Hugo 0.84.0">
  <title>Kasir</title>


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
              <a class="p-2 nav-link" href="petugas.php"><i class="bi bi-people"></i> Petugas</a>
              <a class="p-2 nav-link" href="pelanggan.php"><i class="bi bi-person"></i> Pelanggan</a>
              <a class="p-2 nav-link" href="produk.php"><i class="bi bi-basket"></i> Produk</a>
              <a class="p-2 nav-link" href="penjualan.php"><i class="bi bi-cart"></i> Kasir</a>
              <a class="p-2 nav-link" href="laporan.php"><i class="bi bi-file-earmark-ruled"></i> Laporan</a>
              <div class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  <i class="bi bi-person-fill"></i> Admin
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


        <h2 class="page-title">Laporan</h2>
					<div class="panel panel-default">
						<div class="panel-body">
							<form method="get" name="laporan" onSubmit="return valid();">
								<div class="form-group">
									<div class="col-sm-4 mt-2">
										<label>Tanggal Awal</label>
										<input type="date" class="form-control" name="awal" placeholder="From Date(dd/mm/yyyy)" required>
									</div>
									<div class="col-sm-4 mt-2">
										<label>Tanggal Akhir</label>
										<input type="date" class="form-control" name="akhir" placeholder="To Date(dd/mm/yyyy)" required>
									</div>
							
									<div class="col-sm-4 mt-2 mb-4  ">
										
										<input type="submit" name="submit" value="Lihat Laporan" class="btn btn-primary">
									</div>
									
							</form>
						</div>
					</div>
					<?php
					if (isset($_GET['submit'])) {
						$no = 0;
						$mulai 	 = $_GET['awal'];
						$selesai = $_GET['akhir'];
				
						$sqlsewa =  "SELECT produk.*,penjualan.*,detailpenjualan.*,pelanggan.* FROM produk,penjualan,detailpenjualan,pelanggan WHERE produk.produk_id=detailpenjualan.produk_id
												AND pelanggan.pelanggan_id = penjualan.pelanggan_id AND detailpenjualan.penjualan_id = penjualan.penjualan_id
												AND penjualan.tanggal_penjualan BETWEEN '$mulai' AND '$selesai'";
						$querysewa = mysqli_query($koneksidb, $sqlsewa);
					?>
						<!-- Zero Configuration Table -->
            <div class="col-mt-6">
						<div class="panel panel-default">
							<div class="panel-heading">Laporan Sewa Tanggal <?php echo $mulai; ?> sampai <?php echo $selesai; ?></div>
							<div class="panel-body">
								<table id="zctb" class="display table table-striped table-bordered table-hover" cellspacing="0" width="100%">
									<thead>
										<tr>
											<th>No</th>
											<th>Kode transaksi</th>
											<th>Nama_produk</th>
											<th>Tanggal penjualan</th>
											<th>Total</th>
											
										</tr>
									</thead>
									<tbody>
										<?php
										while ($result = mysqli_fetch_array($querysewa)) {
										

											$no++;
										?>
											<tr>
												<td><?php echo $no; ?></td>
												<td><?php echo htmlentities($result['penjualan_id']); ?></td>
												<td><?php echo htmlentities($result['nama_produk']); ?></td>
												<td><?php echo htmlentities($result['tanggal_penjualan']); ?></td>
												<td><?php echo "Rp.   ".number_format($result['subtotal']); ?></td>
												
											</tr>
										<?php }
										?>

									</tbody>
								</table>

							</div>
						</div>
						<form action="laporan_cetak.php?awal=<?php echo $mulai; ?>&akhir=<?php echo $selesai; ?>&status=<?php echo $statt?>" target="_blank" method="post">
						<div class="form-group">
						<input type="submit" name="cetak" value="Cetak" class="btn btn-primary">

							</div>
						</form>
					<?php } ?>


				</div>
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
              <label class="form-label">Nama Pelanggan</label>
              <input type="text" name="nama" class="form-control" id="barang" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Alamat</label>
              <input type="text" name="alamat" class="form-control" id="alamat" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Nomor Telepon</label>
              <input type="text" name="nomer" class="form-control" id="satuan" required>
            </div>

        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
      </div>
    </div>
  </div>
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