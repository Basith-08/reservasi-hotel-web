<?php
// Function  Tampil
function tampil($tampil){
    global $db;

    $result = mysqli_query($db, $tampil);
    $rows = [];

    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}
// Function  Kamar
function tambah_kamar($post) {
    global $db;

    $no_kamar = $post['no_kamar'];
    $tipe_kamar = $post['tipe_kamar'];
    $foto = $_FILES['foto']['name'];

    if($foto != '') {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $pisah_ekstensi_file = explode('.',$foto);
        $ekstensi = strtolower(end($pisah_ekstensi_file));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$foto;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'img/kamar/'.$nama_gambar_baru);
            $sql = "INSERT INTO kamar (no_kamar, tipe_kamar, foto) VALUES ('$no_kamar','$tipe_kamar','$nama_gambar_baru') ";
            $result = mysqli_query($db, $sql);

            if(!$result){
                die ("Query gagal dijalankan" . mysqli_errno($db));
            } else {
                echo "<script>alert('Data berhasil ditambah');window.location='kamar.php';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi gambar yang diupload upload harus jpg, png, atau jpeg'};window.location='kamar.php'</script>";
        }
    } else {
        $sql = "INSERT INTO kamar (no_kamar, tipe_kamar, foto) VALUES ('$no_kamar', '$tipe_kamar',null')";
        $$result = mysqli_query($db, $sql);

            if(!$result){
                die ("Query gagal dijalankan" . mysqli_errno($db));
            } else {
                echo "<script>alert('Data berhasil ditambah');window.location='kamar.php';</script>";
            }
    }

}
function ubah_kamar($post) {
    global $db;

    $id_kamar = $post['id_kamar'];
    $no_kamar = $post['no_kamar'];
    $tipe_kamar = $post['tipe_kamar'];
    $foto = $_FILES['foto']['name'];

    if($foto != '') {
        $ekstensi_diperbolehkan = array('png', 'jpg', 'jpeg');
        $pisah_ekstensi_file = explode('.',$foto);
        $ekstensi = strtolower(end($pisah_ekstensi_file));
        $file_tmp = $_FILES['foto']['tmp_name'];
        $angka_acak = rand(1,999);
        $nama_gambar_baru = $angka_acak.'-'.$foto;
        if(in_array($ekstensi, $ekstensi_diperbolehkan) === true) {
            move_uploaded_file($file_tmp, 'img/kamar/'.$nama_gambar_baru);
            $sql = "UPDATE kamar SET no_kamar='$no_kamar', tipe_kamar='$tipe_kamar', foto='$nama_gambar_baru' WHERE id_kamar = '$id_kamar' ";
            $result = mysqli_query($db, $sql);

            if(!$result){
                die ("Query gagal dijalankan".mysqli_errno($db));
            } else {
                echo "<script>alert('Data berhasil diubah');window.location='kamar.php';</script>";
            }
        } else {
            echo "<script>alert('Ekstensi gambar yang diupload upload harus jpg, png, atau jpeg'};window.location='kamar.php'</script>";
        }
    } else {
        $sql = "UPDATE kamar SET no_kamar= '$no_kamar', tipe_kamar = '$tipe_kamar' WHERE id_kamar = '$id_kamar' ";
        $result = mysqli_query($db, $sql);

            if(!$result){
                die ("Query gagal dijalankan" . mysqli_errno($db));
            } else {
                echo "<script>alert('Data berhasil diubah');window.location='kamar.php';</script>";
            }
    }

}
function hapus_kamar($post) {
    global $db;

    $id_kamar = $post['id_kamar'];

    $sql = "DELETE FROM kamar WHERE id_kamar='$id_kamar' ";
    $result = mysqli_query($db, $sql);

    if(!$result){
		die ("Gagal menghapus data ".mysqli_errno($db).mysqli_error($db));
	} else {
		echo "<script>alert('Data berhasil dihapus.');window.location='kamar.php';</script>";
	}
}
// Function  Fasilitas
function tambah_fasilitas($post){
	global $db;

	$id_kamar = $post['id_kamar'];
	$fasilitas = $post['fasilitas'];

	$query = "INSERT INTO fasilitas_kamar VALUES (null, '$id_kamar', '$fasilitas')";
	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}
function ubah_fasilitas($post){
	global $db;

	$id_fasilitas = $post['id_fasilitas'];
	$id_kamar = $post['id_kamar'];
	$fasilitas = $post['fasilitas'];

	$query = "UPDATE fasilitas_kamar SET id_kamar = '$id_kamar', fasilitas = '$fasilitas' where id_fasilitas = '$id_fasilitas'";
	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}
function hapus_fasilitas($post){
	global $db;

	$id_fasilitas = $post['id_fasilitas'];

	$query = "DELETE FROM fasilitas_kamar WHERE id_fasilitas = '$id_fasilitas'";
	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}
// Function  Galeri
function tambah_galeri($post){
	global $db;

    
	$nama = $post['nama'];
	$foto = $_FILES['foto']['name'];

	if($foto != ''){
		$ekstensi_diperbolehkan = array('png','jpg','jpeg');
		$pisah_ekstensi_file = explode('.', $foto);
		$ekstensi = strtolower(end($pisah_ekstensi_file));
		$file_tmp = $_FILES['foto']['tmp_name'];   
		$angka_acak = rand(1,999);
		$nama_gambar_baru = $angka_acak.'-'.$foto;
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			move_uploaded_file($file_tmp, 'img/galeri/'.$nama_gambar_baru);
			$query = "INSERT INTO galeri (nama, foto) VALUES ('$nama', '$nama_gambar_baru')";
			$result = mysqli_query($db, $query);

			if(!$result){
				die("Query gagal dijalankan: ".mysqli_errno($db).mysqli_error($db));
			} else {
				echo "<script>
					alert('Data Berhasil ditambah');window.location='galeri.php';
					</script>";
			}
		} else {
			echo "<script>
				alert('Ekstensi gambar harus png atau jpg.');window.location='galeri.php';
				</script>";
		}
	} else {
		$query = "INSERT INTO galeri (nama, foto) VALUES ('$nama', null)";
		$result = mysqli_query($db, $query);

		if(!$result){
				die("Query gagal dijalankan: ".mysqli_errno($db).mysqli_error($db));
			} else {
				echo "<script>
					alert('Data Berhasil ditambah');window.location='galeri.php';
					</script>";
			}
	}
}
function ubah_galeri($post){
	global $db;

	$id_galeri = $post['id_galeri'];

	$nama = $post['nama'];
	$foto = $_FILES['foto']['name'];

	if($foto != ''){
		$ekstensi_diperbolehkan = array('png','jpg','jpeg');
		$pisah_ekstensi_file = explode('.', $foto);
		$ekstensi = strtolower(end($pisah_ekstensi_file));
		$file_tmp = $_FILES['foto']['tmp_name'];   
		$angka_acak = rand(1,999);
		$nama_gambar_baru = $angka_acak.'-'.$foto;
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			move_uploaded_file($file_tmp, 'img/galeri/'.$nama_gambar_baru);
			$query = "UPDATE galeri SET nama = '$nama', foto = '$nama_gambar_baru' WHERE id_galeri = '$id_galeri' ";
			$result = mysqli_query($db, $query);

			if(!$result){
				die("Query gagal dijalankan: ".mysqli_errno($db).mysqli_error($db));
			} else {
				echo "<script>
					alert('Data Berhasil diubah');window.location='galeri.php';
					</script>";
			}
		} else {
			echo "<script>
				alert('Ekstensi gambar harus png, jpg atau jpeg.');window.location='galeri.php';
				</script>";
		}
	} else {
		$query = "UPDATE galeri SET nama = '$nama' WHERE id_galeri = '$id_galeri' ";
		$result = mysqli_query($db, $query);

		if(!$result){
				die("Query gagal dijalankan: ".mysqli_errno($db).mysqli_error($db));
			} else {
				echo "<script>
					alert('Data Berhasil diubah');window.location='galeri.php';
					</script>";
			}
	}
}
function hapus_galeri($post){
	global $db;

	$id_galeri = $post['id_galeri'];

	$query = "DELETE FROM galeri WHERE id_galeri = '$id_galeri' ";

	$result = mysqli_query($db, $query);

	if(!$result){
		die("Query menghapus data ".mysqli_errno($db).mysqli_error($db));
	}else{
		echo "<script>alert('Data berhasil dihapus.');window.location='galeri.php';</script>";
	}
}
// Function Users
function tambah_user($post){
	global $db;

	$nama = $post['nama'];
	$username = $post['username'];
	$password = md5($post['password']);
	$level = $post['level'];

	$query = "INSERT INTO user VALUES (null, '$nama', '$username', '$password', '$level')";
	$result = mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}
function ubah_user($post){
	global $db;

	$id_user = $post['id_user'];
	$nama = $post['nama'];
	$username = $post['username'];
	$password = md5($post['password']);
	$level = $post['level'];

	$query = "UPDATE user SET nama = '$nama', username = '$username', password = '$password', level = '$level' WHERE id_user = '$id_user' ";
	$result = mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}
function hapus_user($post) {
	global $db;

	$id_user = $post['id_user'];

	$query = "DELETE FROM user WHERE id_user = '$id_user' ";
	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}
// Function Pesanan
function pesanan($post){
	global $db;

	$cek_in = $post['cek_in'];
	$cek_out = $post['cek_out'];
	$jmlh_kamar = $post['jmlh_kamar'];
	$username = $post['username'];
	$email_pemesan = $post['email_pemesan'];
	$no_pemesan = $post['no_pemesan'];
	$nama_tamu = $post['nama_tamu'];
	$id_kamar = $post['id_kamar'];

	$sql = "INSERT INTO pesanan VALUES (null,'$cek_in','$cek_out','$jmlh_kamar','$username','$email_pemesan','$nama_tamu','$no_pemesan','$id_kamar', '1', 'b')";
	mysqli_query($db, $sql);
	return mysqli_affected_rows($db);
}
function hapus_riwayat($post){
	global $db;

	$id_pesanan = $post['id_pesanan'];

	$query = "DELETE FROM pesanan WHERE id_pesanan = '$id_pesanan' ";
	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}
// Function  Cek Login
function cek_login($post){
    global $db;

    $username = $_POST['username'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM user WHERE username= '$username' AND password = '$password'";
    $result = mysqli_query($db,$sql);
    if ($result->num_rows > 0) {
        $row = mysqli_fetch_array($result);

		// cek jika user login sebagai admin
        if($row['level']=='1'){
			// buat session login dan password
			$_SESSION['username'] = $row['username'];
			$_SESSION['level'] = $row['level'];
			$_SESSION['nama'] = $row['nama'];
			// alihkan ke halaman dashboard admin 
            header("Location: admin/index.php");

		// cek jika user login sebagai resepsionis
        } else if($row['level']=='2'){
			// buat session login dan password
			$_SESSION['username'] = $row['username'];
			$_SESSION['level'] = $row['level'];
			$_SESSION['nama'] = $row['nama'];
			// alihkan ke halaman dashboard resepsionis
            header("Location: resepsionis");
			
        }else if($row['level']=='3'){
			// buat session login dan password
			$_SESSION['username'] = $row['username'];
			$_SESSION['level'] = $row['level'];
			$_SESSION['nama'] = $row['nama'];
			// alihkan ke halaman dashboard resepsionis
            header("Location: component");
		}

    } else {
        echo "<script>alert('Username atau password Anda salah. Silahkan coba lagi!');
        window.location= 'login.php'</script>";
    }
}
// Function Konfirmasi pesanan
function konfirmasi($post){
	global $db;

	$id_pesanan = $post['id_pesanan'];
	$status = $post['status'];

	$query = "UPDATE pesanan SET id_pesanan = '$id_pesanan', status = '$status' WHERE id_pesanan = '$id_pesanan'";
	mysqli_query($db, $query);
	return mysqli_affected_rows($db);
}

function kirim_bukti_transaksi($post){
	global $db;

	$id_pesanan = $post['id_pesanan'];

	$foto = $_FILES['foto']['name'];

    if($foto != ''){
		$ekstensi_diperbolehkan = array('png','jpg','jpeg');
		$pisah_ekstensi_file = explode('.', $foto);
		$ekstensi = strtolower(end($pisah_ekstensi_file));
		$file_tmp = $_FILES['foto']['tmp_name'];   
		$angka_acak = rand(1,999);
		$nama_gambar_baru = $angka_acak.'-'.$foto;
		if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
			move_uploaded_file($file_tmp, '../admin/img/bukti/'.$nama_gambar_baru);
			$sql = "UPDATE pesanan SET foto = '$nama_gambar_baru' WHERE id_pesanan = '$id_pesanan'";
			$result = mysqli_query($db, $sql);

			if(!$result){
				die("Query gagal dijalankan: ".mysqli_errno($db).mysqli_error($db));
			} else {
				echo "<script>
					alert('Berhasil');window.location='index.php';
					</script>";
			}
		} else {
			echo "<script>
				alert('Ekstensi gambar harus png, jpg atau jpeg.');window.location='index.php';
				</script>";
		}
	}
}

?>