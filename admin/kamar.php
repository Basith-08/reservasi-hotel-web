<?php include 'layouts/header.php'; 

$data_kamar = tampil("SELECT * FROM kamar");

if(isset($_POST['tambah']) && tambah_kamar($_POST)){
    
}
if(isset($_POST['ubah']) && ubah_kamar($_POST)){
    
}
if(isset($_POST['hapus']) && hapus_kamar($_POST)){
    
}

?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Data Kamar </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
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
                                    <th style="width: 20px">#</th>
                                    <th>No Kamar</th>
                                    <th>Tipe Kamar</th>
                                    <th>Foto</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1 ;?>
                                <?php foreach($data_kamar as $kamar) :?>
                                <tr>
                                    <td><?php echo $no++ ;?></td>
                                    <td><?php echo $kamar['no_kamar'];?></td>
                                    <td><?php echo $kamar['tipe_kamar'];?></td>
                                    <td>
                                        <img src="img/kamar/<?php echo $kamar['foto'];?>" class="img-thumbnail"
                                            style="width: 250px;">
                                    </td>
                                    <td>
                                        <span class="btn btn-warning" data-toggle="modal"
                                            data-target="#ubah<?= $kamar['id_kamar'];?>">Edit</span>
                                        <span class="btn btn-danger" data-toggle="modal"
                                            data-target="#hapus<?= $kamar['id_kamar'];?>">Hapus</span>
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

<!-- Modal Tambah Kamar -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Kamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="">No Kamar</label>
                        <input type="text" name="no_kamar" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tipe Kamar</label>
                        <input type="text" name="tipe_kamar" class="form-control">
                    </div>
                    <label for="">Foto</label>
                    <div class="form-group">
                        <input type="file" name="foto">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="tambah">Tambah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<?php foreach($data_kamar as $kamar) : ?>
<!-- Modal ubah Kamar -->
<div class="modal fade" id="ubah<?= $kamar['id_kamar'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Kamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_kamar" value="<?= $kamar['id_kamar'];?>">
                    <div class="form-group">
                        <label for="">No Kamar</label>
                        <input type="text" name="no_kamar" value="<?= $kamar['no_kamar'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tipe Kamar</label>
                        <input type="text" name="tipe_kamar" value="<?= $kamar['tipe_kamar'];?> " class="form-control">
                    </div>
                    <label for="">Foto</label>
                    <div class="form-group">
                        <img src="img/kamar/<?php echo $kamar['foto'];?>" class="img-thumbnail" style="width: 250px;">
                        <input type="file" name="foto">
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
<!-- /.modal -->
<?php endforeach;?>

<?php foreach($data_kamar as $kamar) : ?>
<!-- Modal hapus Kamar -->
<div class="modal fade" id="hapus<?= $kamar['id_kamar'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">hapus Kamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_kamar" value="<?= $kamar['id_kamar'];?>">
                    <div class="form-group">
                        <label for="">No Kamar</label>
                        <input type="text" name="no_kamar" value="<?= $kamar['no_kamar'];?>" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Tipe Kamar</label>
                        <input type="text" name="tipe_kamar" value="<?= $kamar['tipe_kamar'];?> " class="form-control">
                    </div>
                    <label for="">Foto</label>
                    <div class="form-group">
                        <img src="img/kamar/<?php echo $kamar['foto'];?>" class="img-thumbnail" style="width: 250px;">
                        <input type="file" name="foto">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<?php endforeach;?>

<?php include 'layouts/footer.php'; ?>