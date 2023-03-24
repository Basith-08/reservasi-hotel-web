    <?php include 'layouts/header.php'; ?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Hotel Hebat</h1>
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
        <div class="container">
            <?php 
                    $sql = "SELECT * FROM kamar";
                    $result = mysqli_query($db, $sql);
                    if (!$result) {
                        die ("Query failed. ".mysqli_errno($db). "-". mysqli_errno($db) );
                    }

                    while ( $row = mysqli_fetch_assoc($result) ) {
                    ?>
            <div class="col-md-12">
                <div class="card card-outline card-info">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-5">
                                <div class="card-body card-outline">
                                    <table>
                                        <tr>
                                            <td>Nama Kamar : <?= "No kamar.",$row['no_kamar']; ?></td>
                                        </tr>
                                        <tr>
                                            <td> Fasilitas : 
                                                <?php
                                                $fasilitas_kamar = mysqli_query($db, "SELECT * FROM fasilitas_kamar");
                                                while ($a = mysqli_fetch_array($fasilitas_kamar)) {
                                                    if ($a['id_kamar'] == $row['id_kamar']) { ?>
                                                        <?php echo $a['fasilitas']; ?>
                                                        <?php
                                                    }
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-7">
                                <div class="card-body card-outline">
                                    <img src="admin/img/kamar/<?php echo $row['foto']; ?>" class="d-block w-100"
                                        height="300" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php } ?>
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->
<?php include 'layouts/footer.php'; ?>