<?php include 'layouts/header.php';
if(isset($_POST['konfir'])){
    if(pesanan($_POST) > 0 ){
        echo "<script>alert('Berhasil pesan.');
            window.location.href='../tamu/index.php';</script>";
    }else{
    echo "<script>alert('Gagal Pesan.');
            window.location.href='index.php';</script>";
    }
} 

?>


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
                                        <img src="../assets/gambar/g1.jpeg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/gambar/g2.jpeg" class="d-block w-100" alt="...">
                                    </div>
                                    <div class="carousel-item">
                                        <img src="../assets/gambar/g3.jpeg" class="d-block w-100" alt="...">
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
                    <form action="" method="post">
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
                                        <button type="button" class="btn btn-outline-primary" data-toggle="modal"
                                            data-target="#pesan">Pesan</button>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <div class="modal fade" id="pesan">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title">Pemesanan Kamar</h4>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label for="">Username Pemesan</label>
                                            <input type="text" name="username" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Email pemesan</label>
                                            <input type="email" name="email_pemesan" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">No Handphone</label>
                                            <input type="number" name="no_pemesan" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Nama Tamu</label>
                                            <input type="text" name="nama_tamu" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="">Kamar</label>
                                            <select name="id_kamar" class="form-control">
                                                <option selected="selected">---pilih kamar---</option>
                                                <?php include 'koneksi/database.php';
                                                        $data = mysqli_query($db, "SELECT * FROM kamar");
                                                        while ($d = mysqli_fetch_array($data)) { ?>
                                                <option value="<?=$d['id_kamar'];?>">No Kamar
                                                    <?= $d['no_kamar'] ?></option>
                                                <?php
                                                        }
                                                    ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="modal-footer justify-content-between">
                                        <button type="button" class="btn btn-default"
                                            data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary" name="konfir">Konfirmasi
                                            Pesanan</button>
                                    </div>
                                </div>
                                <!-- /.modal-content -->
                            </div>
                            <!-- /.modal-dialog -->
                        </div>
                        <!-- /.modal -->
                    </form>

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