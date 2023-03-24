<?php include 'layouts/header.php'; 

$data_fasilitas = tampil("SELECT * FROM fasilitas_kamar");

if(isset($_POST['tambah'])) {
    if(tambah_fasilitas($_POST) > 0 ){
    echo "<script>alert('Data fasilitas berhsil ditambah');
            window.location.href='fasilitas.php';</script>";
    }else{
    echo "<script>alert('Data fasilitas gagal ditambah atau No kamar sudah ada');
            window.location.href='fasilitas.php';</script>";
    }
}
if(isset($_POST['ubah'])) {
    if(ubah_fasilitas($_POST) > 0 ){
    echo "<script>alert('Data fasilitas berhsil diubah');
            window.location.href='fasilitas.php';</script>";
    }else{
    echo "<script>alert('Data fasilitas gagal diubah');
            window.location.href='fasilitas.php';</script>";
    }
}
if(isset($_POST['hapus'])) {
    if(hapus_fasilitas($_POST) > 0 ){
    echo "<script>alert('Data fasilitas berhsil dihapus');
            window.location.href='fasilitas.php';</script>";
    }else{
    echo "<script>alert('Data fasilitas gagal dihapus');
            window.location.href='fasilitas.php';</script>";
    }
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Fasilitas Kamar</h1>
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
                                    <th style="width: 20px">#</th>
                                    <th>No Kamar</th>
                                    <th>Fasilitas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_fasilitas as $fasilitas) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td>
                                        <?php
                                            $kamar = mysqli_query($db, "SELECT * FROM kamar");
                                            while ($a = mysqli_fetch_array($kamar)){
                                                if ($a['id_kamar'] == $fasilitas['id_kamar']){ ?>
                                        <?= "No kamar. ",$a['no_kamar']; ?>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td><?= $fasilitas['fasilitas'] ?></td>
                                    <td>
                                        <span href="" class="btn btn-warning" data-toggle="modal"
                                            data-target="#ubah<?= $fasilitas['id_fasilitas'];?>">Edit</span>
                                        <span href="" class="btn btn-danger" data-toggle="modal"
                                            data-target="#hapus<?= $fasilitas['id_fasilitas'];?>">Hapus</span>
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

<!-- Modal Tambah Fasilitas -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Tambah Fasilitas Kamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST">
                    <div class="form-group">
                        <label>No Kamar</label>
                        <select name="id_kamar" class="form-control">
                            <option selected="selected">---pilih kamar---</option>
                            <?php include '../koneksi/database.php';
                                $data = mysqli_query($db, "SELECT * FROM kamar");
                                while ($d = mysqli_fetch_array($data)) { ?>
                            <option value="<?=$d['id_kamar'];?>" selected>No Kamar <?= $d['no_kamar'] ?></option>
                            <?php
                                }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Fasilitas_kamar">Fasilitas Kamar</label>
                        <textarea class="form-control" name="fasilitas" id="fasilitas" rows="3"></textarea>
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

<!-- Modal Ubah Fasiltas -->
<?php foreach($data_fasilitas as $fasilitas) : ?>
<div class="modal fade" id="ubah<?= $fasilitas['id_fasilitas'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah Fasilitas Kamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="id_fasilitas" value="<?= $fasilitas['id_fasilitas'];?>">
                    <div class="form-group">
                        <label>No Kamar</label>
                        <select name="id_kamar" class="form-control">
                            <?php include '../koneksi/database.php';
                                $kamar = mysqli_query($db, "SELECT * FROM kamar");
                                while ($a = mysqli_fetch_array($kamar)) { 
                                    if ($a['id_kamar'] == $fasilitas['id_kamar']){?>
                            <option value="<?=$a['id_kamar'];?>" selected>No Kamar <?= $a['no_kamar'] ?></option>
                            <?php }else{ ?>
                                <option value="<?=$a['id_kamar'];?>" >No Kamar <?= $a['no_kamar'] ?></option>
                                <?php }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Fasilitas_kamar">Fasilitas Kamar</label>
                        <textarea class="form-control" name="fasilitas" id="fasilitas"
                            rows="3"><?= $fasilitas['fasilitas']; ?></textarea>
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="ubah">ubah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach ;?>

<!-- Modal hapus Fasiltas -->
<?php foreach($data_fasilitas as $fasilitas) : ?>
<div class="modal fade" id="hapus<?= $fasilitas['id_fasilitas'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus Fasilitas Kamar</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="id_fasilitas" value="<?= $fasilitas['id_fasilitas'];?>">
                    <div class="form-group">
                        <label>No Kamar</label>
                        <select name="id_kamar" class="form-control">
                            <?php include '../koneksi/database.php';
                                $kamar = mysqli_query($db, "SELECT * FROM kamar");
                                while ($a = mysqli_fetch_array($kamar)) { 
                                    if ($a['id_kamar'] == $fasilitas['id_kamar']){?>
                            <option value="<?=$a['id_kamar'];?>" selected>No Kamar <?= $a['no_kamar'] ?></option>
                            <?php }else{ ?>
                                <option value="<?=$a['id_kamar'];?>" >No Kamar <?= $a['no_kamar'] ?></option>
                                <?php }
                            }
                            ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="Fasilitas_kamar">Fasilitas Kamar</label>
                        <textarea class="form-control" name="fasilitas" id="fasilitas"
                            rows="3"><?= $fasilitas['fasilitas']; ?></textarea>
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
<?php endforeach ;?>
<?php include 'layouts/footer.php'; ?>