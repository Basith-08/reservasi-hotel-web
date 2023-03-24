<?php include 'layouts/header.php'; 

$data_user = tampil("SELECT * FROM user");

if(isset($_POST['tambah'])) {
    if(tambah_user($_POST) > 0 ){
    echo "<script>alert('Data user berhsil ditambah');
            window.location.href='user.php';</script>";
    }else{
    echo "<script>alert('Data user gagal ditambah');
            window.location.href='user.php';</script>";
    }
}
if(isset($_POST['ubah'])) {
    if(ubah_user($_POST) > 0 ){
    echo "<script>alert('Data user berhsil diubah');
            window.location.href='user.php';</script>";
    }else{
    echo "<script>alert('Data user gagal diubah');
            window.location.href='user.php';</script>";
    }
}
if(isset($_POST['hapus'])) {
    if(hapus_user($_POST) > 0 ){
    echo "<script>alert('Data user berhsil dihapus');
            window.location.href='user.php';</script>";
    }else{
    echo "<script>alert('Data user gagal dihapus');
            window.location.href='user.php';</script>";
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
                    <h1 class="m-0">User</h1>
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
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; ?>
                                <?php foreach ($data_user as $user) : ?>
                                <tr>
                                    <td><?php echo $no++ ?></td>
                                    <td><?php echo $user['nama'] ?></td>
                                    <td><?php echo $user['username'] ?></td>
                                    <td>
                                        <?php if($user['level'] == 1){ ?>
                                        <span class=" badge bg-warning">admin</span>
                                        <?php }else if($user['level'] == 2){ ?>
                                        <span class="badge bg-success">Resepsionis</span>
                                        <?php } else { ?>
                                        <span class="badge bg-primary">user</span>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <span href="" class="btn btn-warning" data-toggle="modal"
                                            data-target="#ubah<?= $user['id_user'];?>">Edit</span>
                                        <span href="" class="btn btn-danger" data-toggle="modal"
                                            data-target="#hapus<?= $user['id_user'];?>">Hapus</span>
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

<!-- Modal Tambah User -->
<div class="modal fade" id="tambah">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Users</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <form method="POST">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan nama">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option values="1">Admin</option>
                            <option value="2">resepsionis</option>
                            <option value="3">user</option>

                        </select>
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

<!-- Modal Ubah user -->
<?php foreach($data_user as $user) : ?>
<div class="modal fade" id="ubah<?= $user['id_user'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ubah user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="id_user" value="<?= $user['id_user'];?>">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan nama" value="<?= $user['nama'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?= $user['username'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Masukan password" value="<?= $user['password'];?>">
                    </div>
                    <div class="form-group">
                        <label>Level</label>
                        <select name="level" class="form-control">
                            <option values="1">Admin</option>
                            <option value="2">resepsionis</option>
                            <option value="3">user</option>

                        </select>
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

<!-- Modal hapus user -->
<?php foreach($data_user as $user) : ?>
<div class="modal fade" id="hapus<?= $user['id_user'];?>">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Hapus user</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST">
                    <input type="hidden" name="id_user" value="<?= $user['id_user'];?>">
                    <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" name="nama" class="form-control" placeholder="Masukan nama" value="<?= $user['nama'];?>">
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Masukan Username" value="<?= $user['username'];?>">
                    </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" name="hapus">ubah</button>
            </div>
            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<?php endforeach ;?>



<?php include 'layouts/footer.php'; ?>