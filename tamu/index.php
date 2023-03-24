<?php
session_start();

$_SESSION['nama'];
?>

<?php include 'layouts/header.php'; 
$data_pesanan = tampil("SELECT * FROM pesanan");

 if(isset($_POST['tambah']) && kirim_bukti_transaksi($_POST) > 0 ){

 }
 if(isset($_POST['hapus']) && hapus_riwayat($_POST) > 0 ){

 }

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Pesanan</h1>
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
                    <div class="card-body">
                        <table class="table table-bordered">
                            <div class="card-header">
                                Halo <b><?php echo $_SESSION['nama']; ?></b>
                            </div>
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Tamu</th>
                                    <th>Tanggal Cek In</th>
                                    <th>Tanggal Cek out</th>
                                    <th>No Pemesan</th>
                                    <th>Bukti Transaksi</th>
                                    <th>Status</th>
                                    <th>Kirim Bukti Transaksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                global $db;
                                $no = 1 ;
                                $result = mysqli_query($db, "SELECT * FROM user INNER JOIN pesanan ON user.username = pesanan.username ");
                                    while($row = mysqli_fetch_array($result)) {
                                        ?>
                                <?php if ($row['username'] == $_SESSION['username']) { ?>
                                <tr>
                                    <td><?= $no++ ;?></td>
                                    <td><?= $row['nama_tamu']; ?></td>
                                    <td><?= $row['cek_in']; ?></td>
                                    <td><?= $row['cek_out']; ?></td>
                                    <td><?= $row['no_pemesan']; ?></td>
                                    <td>
                                        <img src="../admin/img/bukti/<?php echo $row['foto'];?>"
                                            class="img-thumbnail" style="width: 150px;" alt="Belum ada bukti">
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 1){ ?>
                                        <span class=" badge bg-warning">Belum dikonfirmasi</span>
                                        <?php }else{ ?>
                                        <span class="badge bg-success">Sudah dikonfirmasi</span>
                                        <?php }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if($row['status'] == 1){ ?>
                                        <span class="btn btn-primary" data-toggle="modal"
                                            data-target="#konfirmasi<?= $row['id_pesanan'] ;?>">Kirim</span>
                                        <?php }else{ ?>
                                        <span class="btn btn-danger" type="submit" data-toggle="modal"
                                            data-target="#hapus<?= $row['id_pesanan'] ;?>">Hapus</span>
                                        <?php }
                                        ?>
                                    </td>
                                </tr>
                                    <?php } else { ?>
                                    <?php }?>
                                <?php }?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
                         <?php foreach($data_pesanan as $row) : ?>
                        <!-- Modal Tambah bukti -->
                        <div class="modal fade" id="konfirmasi<?= $row['id_pesanan'] ;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Konfirmasi Pesanan</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <input type="hidden" name="id_pesanan"
                                                value="<?php echo $row['id_pesanan'] ;?>">
                                            <div class="form-group">
                                                <label for="">No transaksi</label>
                                                <input type="text" class="form-control"
                                                    placeholder="No Transaksi :  <?php echo $row['id_pesanan'] ;?>"
                                                    disabled>
                                            </div>
                                            <label for="file">Foto</label>
                                            <div class="form-group">
                                                <img src="../admin/img/bukti/<?php echo $row['foto']; ?>"
                                                    class="img-thumbnail my-1" style="width: 150px;">
                                                <input type="file" class="form-control-file" name="foto">
                                            </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="tambah">Kirim</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <?php endforeach ;?>

                        <?php foreach($data_pesanan as $pesanan) : ?>
                        <!-- Modal Hapus Bukti -->
                        <div class="modal fade" id="hapus<?= $pesanan['id_pesanan'] ;?>">
                            <div class="modal-dialog">
                                <div class="modal-content">

                                    <div class="modal-body">
                                        <form action="" method="post" enctype="multipart/form-data">
                                            <h3>Yakin hapus data riwayat pemesanan dengan nama tamu
                                                "<b><?php echo $pesanan['nama_tamu']; ?></b>"?</h3>
                                            <input type="hidden" name="id_pesanan"
                                                value="<?php echo $pesanan['id_pesanan'] ;?>">
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="hapus">Hapus</button>
                                    </div>
                                    </form>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                        <?php endforeach ;?>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->





<?php
 include 'layouts/footer.php'; 
?>