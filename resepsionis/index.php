<?php include 'layouts/header.php'; 
session_start();


// Mulai session
if($_SESSION['username'] == true){
    
}else{
    header("Location: ../index.php?pesan=resepsionis_gagal");
}
$data_pesanan = tampil("SELECT * FROM pesanan");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Dashboard</h1>
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
                        <div class="row">
                            <?php 
                            include '../koneksi/database.php';
                            $data = mysqli_query($db, "SELECT * FROM pesanan");
                            $jumlah_data = mysqli_num_rows($data);
                            ?>
                            <div class="col-lg-12 col-6">
                                <!-- small card -->
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3><?php echo $jumlah_data ?></h3>

                                        <p>Data Pesanan</p>
                                    </div>
                                    <div class="icon">
                                        <i class="fas fa-home"></i>
                                    </div>
                                    <a href="pesanan.php" class="small-box-footer">
                                        More info <i class="fas fa-arrow-circle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'layouts/footer.php'; ?>