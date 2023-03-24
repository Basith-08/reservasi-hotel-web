<?php include 'layouts/header.php'; 

$data_galeri = tampil("SELECT * FROM galeri");

 if(isset($_POST['tambah']) && tambah_galeri($_POST) > 0 ){

 }

 if(isset($_POST['ubah']) && ubah_galeri($_POST) > 0 ){

 }

 if(isset($_POST['hapus']) && hapus_galeri($_POST) > 0 ) {
    
 }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Galeri Hotel</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <button type="button" class="btn btn-primary" data-toggle="modal"
                            data-target="#tambah">Tambah</button>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($data_galeri as $galeri) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $galeri['nama']?></td>
                                    <td>
                                        <img src="img/galeri/<?php echo $galeri['foto'];?>" class="img-thumbnail"
                                            style="width: 250px;" />
                                    </td>
                                    <td>
                                        <span class="btn btn-warning" data-toggle="modal"
                                            data-target="#ubah<?= $galeri['id_galeri'];?>">Edit</span>
                                        <span class="btn btn-danger" data-toggle="modal"
                                            data-target="#hapus<?= $galeri['id_galeri'];?>">Hapus</span>
                                    </td>
                                </tr>
                                <?php endforeach ; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- modal tambah -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Galeri</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" placeholder="Nama">
                    </div>
                    <div class="form-group">
                        <label for="file">Foto</label>
                        <input type="file" class="form-control-file" name="foto">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambah">Simpan</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<!-- mosal ubah -->
<?php foreach($data_galeri as $galeri) : ?>
<div class="modal fade" id="ubah<?= $galeri['id_galeri'];?>" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Data galeri?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_galeri" value="<?= $galeri['id_galeri'];?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama"
                            value="<?= $galeri['nama'];?>">
                    </div>
                    <div class="form-group">
                        <label for="file">Foto</label><br>
                        <img src="img/galeri/<?php echo $galeri['foto']; ?>" class="img-thumbnail my-1"
                        style="width: 150px;">
                        <input type="file" class="form-control-file" name="foto">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="ubah">Ubah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<!-- mosal hapus -->
<?php foreach($data_galeri as $galeri) : ?>
<div class="modal fade" id="hapus<?= $galeri['id_galeri'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Data galeri?</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_galeri" value="<?= $galeri['id_galeri'];?>">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="nama"
                            value="<?= $galeri['nama'];?>">
                    </div>
                    <div class="form-group">
                        <label for="file">Foto</label><br>
                        <img src="img/galeri/<?php echo $galeri['foto']; ?>" class="img-thumbnail my-1"
                        style="width: 150px;">
                        <input type="file" class="form-control-file" name="foto">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="hapus">hapus</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach; ?>

<?php include 'layouts/footer.php'; ?>