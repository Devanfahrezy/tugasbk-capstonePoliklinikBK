<!-- Content Header (Page header) -->
<div class="content-header">
    <div class="container-fluid">
    <div class="row mb-2">
        <div class="col-sm-6">
        <h1 class="m-0">Manajemen Pasien</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="index.php?page=home">Home</a></li>
            <li class="breadcrumb-item active">Pasien</li>
        </ol>
        </div><!-- /.col -->
    </div><!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->
<!-- Main content -->
<div class="content">
    <div class="container-fluid">
    <div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
            <h3 class="card-title">Data Pasien</h3>

            <div class="card-tools">
                <button type="button" class="btn btn-sm btn-success float-right" data-toggle="modal" data-target="#addModal">
                    Tambah
                </button>
            </div>
            </div>
            <!-- /.card-header -->
            

            <div class="card-body table-responsive p-0">
            <table class="table table-hover text-nowrap">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>No KTP</th>
                    <th>No HP</th>
                    <th>No RM</th>
                    <th>Aksi</th>
                </tr>
                </thead>
                <tbody>
                
                        <?php
                            include '../../koneksi.php';
                            $query = "SELECT * FROM pasien";
                            $result = mysqli_query($mysqli, $query);
                            
                            while ($row = mysqli_fetch_assoc($result)) {
                                echo "<tr>
                                        <td>{$row['id']}</td>
                                        <td>{$row['nama']}</td>
                                        <td>{$row['alamat']}</td>
                                        <td>{$row['no_ktp']}</td>
                                        <td>{$row['no_hp']}</td>
                                        <td>{$row['no_rm']}</td>
                                        <td>
                                            <button type='button' class='btn btn-sm btn-warning edit-btn' data-pasienid='{$row['id']}'>Edit</button>
                                            <a href='pages/pasien/hapusPasien.php?id={$row['id']}' class='btn btn-sm btn-danger' onclick='return confirm(\"Anda yakin ingin hapus?\");'>Hapus</a>
                                        </td>
                                    </tr>";
                            }
                            mysqli_close($mysqli);

                        ?>

                </tbody>
            </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->
    </div><!-- /.container-fluid -->
</div>
<!-- /.content -->

<!-- Modal Tambah Data Pasien -->
<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addModalLabel">Tambah Data Pasien</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Form tambah data pasien disini -->
                <form action="pages/pasien/tambahPasien.php" method="post">
                    <div class="form-group">
                        <label for="nama">Nama Pasien</label>
                        <input type="text" class="form-control" id="nama" name="nama" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" name="alamat" required>
                    </div>
                    <div class="form-group">
                        <label for="no_ktp">No KTP</label>
                        <input type="text" class="form-control" id="no_ktp" name="no_ktp" required>
                    </div>
                    <div class="form-group">
                        <label for="no_hp">No HP</label>
                        <input type="text" class="form-control" id="no_hp" name="no_hp" required>
                    </div>
                    <div class="form-group">
                        <label for="no_rm">No RM</label>
                        <input type="text" class="form-control" id="no_rm" name="no_rm" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div id="seg-modal"></div>

<script>
    $(document).ready(function() {
        $('.edit-btn').on('click', function() {
            var dataId = $(this).data('pasienid'); // pasienid didapat dari id yang dikirimkan melalui tombol edit
            $('#seg-modal').load('pages/pasien/editPasien.php?id=' + dataId, function() {
                $('#myModal').modal('show');
            });	
        });
    });
</script>