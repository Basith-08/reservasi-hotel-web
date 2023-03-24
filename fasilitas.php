<?php include 'layouts/header.php'; ?>
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Hotel Karuro</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- Main content -->
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/gambar/gambar-fasilitas/g1.jpeg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/gambar/gambar-fasilitas/g2.jpeg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/gambar/gambar-fasilitas/g3.jpeg" class="d-block w-100"
                                            alt="...">
                                    </div>
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleControls" role="button"
                                    data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleControls" role="button"
                                    data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->

            <div class="row mb-2">
                <div class="col-sm-6">
                    <h3 class="m-0"> Fasilitas</h3>
                </div><!-- /.col -->
            </div><!-- /.row -->
            
            <div class="col-md-12">
                <div class="row">
                    <?php 
                    $sql = "SELECT * FROM galeri";
                    $result = mysqli_query($db, $sql);
                    if (!$result) {
                        die ("Query failed. ".mysqli_errno($db). "-". mysqli_errno($db) );
                    }

                    while ( $row = mysqli_fetch_assoc($result) ) {
                    ?>
                    <div class="col-md-4">
                        <div class="card card-outline ">
                            <div class="card-body">
                                <a  href="admin/img/galeri/<?php echo $row['foto'];?>" data-toggle="lightbox"
                                    data-gallery="gallery">
                                    <img class="d-block w-100" height="200" src="admin/img/galeri/<?php echo $row['foto'];?>" class="img-fluid mb-2"/>
                                </a>
                            </div>
                            <!-- /.card-body -->
                        </div>
                    </div>
                    <?php } ?>
                </div>
            </div>


        </div>

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'layouts/footer.php'; ?>