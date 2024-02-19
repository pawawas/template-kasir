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

        <div class="row justify-content-end">
          <div class="col-md-6">
            <a href="#" class="btn btn-primary float-end" id="addBarangBtn"><i class="bi bi-plus-lg"></i> Tambah
              Data</a>
          </div>
        </div>

        <div class="card mt-2">
          <div class="card-body">
            <table class="table" id="dt">
              <thead class="text-center">
                <tr>
                  <th scope="col">No</th>
                  <th scope="col">Nama Pelanggan</th>
                  <th scope="col">Alamat</th>
                  <th scope="col">Nomor Telepon</th>
                  <th scope="col">Aksi</th>
                </tr>
              </thead>
              <tbody class="text-center">
                <?php
                $no = 0;
                $sql = "SELECT * from  pelanggan ";
                $query = mysqli_query($koneksidb, $sql);
                while ($result = mysqli_fetch_array($query)) {
                  $no++;
                ?>
                  <tr id="table-data">
                    <td><?php echo $no; ?></td>
                    <td><?php echo $result['nama_pelanggan']; ?></td>
                    <td><?php echo $result['alamat']; ?></td>
                    <td><?php echo $result['nomor_telepon']; ?></td>
                    <td>
                      <a href="edit_pelanggan.php?id=<?php echo $result['pelanggan_id']; ?>" class="bi bi-pencil-square"></a>
                      <a href="hapus_pelanggan.php?id=<?php echo $result['pelanggan_id']; ?>" onclick="return confirm('Apakah anda akan menghapus <?php echo $result['nama_pelanggan']; ?>?')" class="bi bi-x-octagon"></a>
                    </td>
                  </tr>
                <?php } ?>





             
              </tbody>
            </table>
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