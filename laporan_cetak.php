<?php
include('koneksi.php');


?>
<!DOCTYPE html>
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

<body>
  <section id="header-kop">
    <div class="container-fluid">
      <table class="table table-borderless">
        <tbody>
          <tr>
            <td rowspan="3" width="16%" class="text-center">

            </td>
            <td class="text-center">
              <h3>Program Kasir</h3>
            </td>
            <td rowspan="3" width="16%">&nbsp;</td>
          </tr>
          <tr>
            <td class="text-center">
              <h2>Kasir NIken</h2>
            </td>
          </tr>
          <tr>
            <td class="text-center">Jl.Kamboja No 110, RW.07/RW.13, perum pondok teratai, Kec Sooko, kab Mojokerto </td>
          </tr>
        </tbody>
      </table>
      <hr class="line-top" />
    </div>
  </section>
  <?php
  if (isset($_POST['cetak'])) {
    $no = 0;
    $mulai    = $_GET['awal'];
    $selesai = $_GET['akhir'];
    $sqlsewa =  "SELECT produk.*,penjualan.*,detailpenjualan.*,pelanggan.* FROM produk,penjualan,detailpenjualan,pelanggan WHERE produk.produk_id=detailpenjualan.produk_id
    AND pelanggan.pelanggan_id = penjualan.pelanggan_id AND detailpenjualan.penjualan_id = penjualan.penjualan_id
    AND penjualan.tanggal_penjualan BETWEEN '$mulai' AND '$selesai'";
    $querysewa = mysqli_query($koneksidb, $sqlsewa);
  ?>
    <section id="body-of-report">
      <div class="container-fluid">
        <h4 class="text-center">Detail Laporan</h4>
        <h5 class="text-center">Tanggal <?php echo $mulai . " s/d " . $selesai; ?></h5>
        <br />
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
            $no = 0;
            $pemasukan = 0;
            while ($result = mysqli_fetch_array($querysewa)) {
              $biayamobil = $result['jumlah_produk'] * $result['harga'];
              $total = $biayamobil;
              $pemasukan += $total;
              $no++;
            ?>
              <tr align="center">
												<td><?php echo $no; ?></td>
												<td><?php echo htmlentities($result['penjualan_id']); ?></td>
												<td><?php echo htmlentities($result['nama_produk']); ?></td>
												<td><?php echo htmlentities($result['tanggal_penjualan']); ?></td>
												<td><?php echo "Rp.   ".number_format($result['subtotal']); ?></td>
											</tr>
            <?php } ?>
          </tbody>
          <tfoot>
            <?php
            echo '<tr>';
            echo '<th></th>';
            echo '<th colspan="3" class="text-center">Total Pemasukan</th>';
            
            echo '<th class="text-center">' . number_format($pemasukan) . '</th>';
            echo '</tr>';
            ?>
          </tfoot>
        </table>
      <?php }
      ?>

      </div><!-- /.container -->
    </section>

    <script type="text/javascript">
  

        window.print();
    
    </script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../assets/new/bootstrap.min.js"></script>
    <!-- jTebilang JavaScript -->
    <script src="../assets/new/jTerbilang.js"></script>

</body>

</html>