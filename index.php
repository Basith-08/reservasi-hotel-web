<?php include 'layouts/header.php';?>


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
                    <?php
                    if(isset($_GET['pesan'])){
                        if($_GET['pesan']=="admin_gagal"){?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i></h5>
                        Anda harus login untuk mengakses halaman admin
                    </div>
                    <?php }else if($_GET['pesan']=="resepsionis_gagal"){ ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i></h5>
                        Anda harus login untuk mengakses halaman resepsionis
                    </div>
                    <?php }else if($_GET['pesan']=="tamu_gagal"){ ?>
                    <div class="alert alert-warning alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                        <h5><i class="icon fas fa-exclamation-triangle"></i></h5>
                        Anda harus login
                    </div>
                    <?php } }
                     ?>
                    <div class="card">
                        <div class="card-body">
                            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                                <div class="carousel-inner">
                                    <div class="carousel-item active">
                                        <img src="assets/gambar/g1.jpeg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/gambar/g2.jpeg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="assets/gambar/g3.jpeg" class="d-block w-100" alt="...">
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
                        <div class="container">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3">
                                        <input type="text" name="cek_in" class="form-control"
                                            placeholder="Tanggal Cek in" onblur="(this.type='text')"
                                            onfocus="(this.type='date')">
                                    </div>
                                    <div class="col-3">
                                        <input type="text" name="cek_out" class="form-control"
                                            placeholder="Tanggal Cek Out" onblur="(this.type='text')"
                                            onfocus="(this.type='date')">
                                    </div>
                                    <div class="col-3">
                                        <input type="number" name="jmlh_kamar" class="form-control"
                                            placeholder="Jumlah">
                                    </div>
                                    <div class="col-3">
                                        <button type="button" class="btn btn-outline-primary" name="Pesan" data-toggle="modal"
                                            data-target="#Pesan">Pesan</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal fade" id="Pesan">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <h4>Anda harus login jika ingin memesan kamar</h4>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <a href="login.php"><button class="btn btn-primary">Login</button></a>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->

                    <div class="card text-center">
                        <div class="card-body">
                            <h1>Tentang Kami</h1>
                            <p>Lepaskan diri Anda ke Hotel Hebat,dikelilingi oleh keindahan pegunungan yang
                                indah, dan sawah menghijau. Nikmat sore yang hangat dengan berenang di kolam
                                renang dengan pemandangan matahari terbenamyang memukau, Kid's Club yang luas
                                menawarkan beragam fasilitas dan kegiatan anak-anak yang akan melengkapi
                                kenyamanan keluarga. Convention Center kami dilengkapi pelayanan lengkap dengan
                                ruang terbesar di Bandung,mampu mengakomundasi hingga 3.000 delegasi. Manfaatkan
                                ruang penyelenggaraankonvensi MICE ataupun mewujudkan acara pernikahan adat yang
                                mewah.</p>
                        </div>
                    </div>
                </div>
                <!-- /.col-md-6 -->
            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'layouts/footer.php'; ?>