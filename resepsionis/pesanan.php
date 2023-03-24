<?php include 'layouts/header.php'; 

$data_pesanan = tampil("SELECT * FROM pesanan");

if(isset($_POST['konfirmasi']) && konfirmasi($_POST)){
    echo "<script>
    alert('yakin?');
    </script>";
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
                            <thead>
                                <tr>
                                    <th style="width: 10px">#</th>
                                    <th>Nama Tamu</th>
                                    <th>Tanggal Cek In</th>
                                    <th>Tanggal Cek out</th>
                                    <th>No Kamar</th>
                                    <th>Bukti</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach($data_pesanan as $pesanan) : ?>
                                <tr>
                                    <td><?php echo $no++ ;?></td>
                                    <td><?php echo $pesanan['nama_tamu'];?></td>
                                    <td><?php echo $pesanan['cek_in'];?></td>
                                    <td><?php echo $pesanan['cek_out'];?></td>
                                    <td><?php
                                            $kamar = mysqli_query($db, "SELECT * FROM kamar");
                                            while($d = mysqli_fetch_array($kamar)) {
                                                if($d['id_kamar'] == $pesanan['id_kamar']){ ?>
                                        <?php echo $d['no_kamar'] ?>
                                        <?php
                                                }
                                            }
                                        ?>
                                    </td>
                                    <td>
                                        <img src="../admin/img/bukti/<?php echo $pesanan['foto'];?>" class="img-thumbnail"
                                            style="width: 150px;">
                                    </td>
                                    <td><?php if($pesanan['status'] == 1){ ?>
                                        <span class=" badge bg-warning">Belum dikonfirmasi</span>
                                        <?php }else{ ?>
                                        <span class="badge bg-success">Sudah dikonfirmasi</span>
                                        <?php }
                                    ?>
                                    </td>
                                    <td>
                                        <form action="" method="post">
                                            <input type="hidden" name="id_pesanan" value="<?php echo $pesanan['id_pesanan'] ?>">
                                            <input type="hidden" name="status" value="2">
                                            <?php if($pesanan['status'] == 1){ ?>
                                            <button type="submit" class="btn btn-primary" name="konfirmasi">Konfirmasi</button>
                                            <?php }else{ ?>
                                            <?php }
                                        ?>
                                        </form>
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


<?php include 'layouts/footer.php'; ?>