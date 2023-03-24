<?php include 'layouts/header.php';
session_start();


// Mulai session
if($_SESSION['username'] == true){
    
}else{
    header("Location: ../index.php?pesan=admin_gagal");
}
 ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Dashboard </h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                            <?php 
                            include '../koneksi/database.php';
                            $data_kamar = mysqli_query($db,"SELECT * FROM kamar");
                            $jumlah_kamar = mysqli_num_rows($data_kamar);
                            
                            $fasilitas = mysqli_query($db, "SELECT * FROM fasilitas_kamar");
                            $jumlah_fasilitas = mysqli_num_rows($fasilitas);

                            $data_galeri = mysqli_query($db,"SELECT * FROM galeri");
                            $jumlah_galeri = mysqli_num_rows($data_galeri);

                            $data_user = mysqli_query($db,"SELECT * FROM user");
                            $jumlah_user = mysqli_num_rows($data_user);
                            ?>
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3><?php echo $jumlah_kamar ?> </h3>

                            <p>Data Kamar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-home"></i>
                        </div>
                        <a href="kamar.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3><?php echo $jumlah_fasilitas ?> </h3>

                            <p>Fasilitas Kamar</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-stats-bars"></i>
                        </div>
                        <a href="fasilitas.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>

                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3><?php echo $jumlah_galeri ?> </h3>

                            <p>Galeri</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-image"></i>
                        </div>
                        <a href="galeri.php" class="small-box-footer">More info <i
                                class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3><?php echo $jumlah_user ?> </h3>

                            <p>Users</p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="user.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<?php include 'layouts/footer.php'; ?>