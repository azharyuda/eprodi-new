<?php
error_reporting(E_ALL ^ (E_NOTICE));
session_start();

	include "dist/koneksi.php";

  $nim=htmlspecialchars(trim($_POST['_nim']));

  $pass=htmlspecialchars(trim($_POST['_passw']));
    if($nim=='' || $pass==''){
        echo "<script>window.alert('NIM atau Password tidak diisi!')
     window.location='login.php'</script>";
    }else{
	$qry=$link->query(
	"SELECT * FROM tblmahasiswa WHERE NIM='$nim'") or die(mysqli_error());

  $ambil=$qry->fetch_array();
	if($ambil['status_akun']=='Menunggu Konfirmasi'){
		header("location: login.php?stat=belum-aktif");
	}elseif(empty($ambil)){
		header("location: login.php?stat=tidak-terdaftar");
	}else{
  if(password_verify($pass, $ambil['passw'])){
    /* Tempat direct ke halaman user */
    $_SESSION['NIM']=$ambil['NIM'];
		$_SESSION['nm_mahasiswa']=$ambil['nm_mahasiswa'];
		$_SESSION['passw']=$ambil['passw'];
		$_SESSION['dosen_wali']=$ambil['dosen_wali'];
		$_SESSION['dosbing1']=$ambil['dosbing1'];
		$_SESSION['dosbing2']=$ambil['dosbing2'];
		$_SESSION['dosen_penguji1']=$ambil['dosen_penguji1'];
		$_SESSION['dosen_penguji2']=$ambil['dosen_penguji2'];
		header("location: user_page/index");
  }else{
    /* direct ke halaman login kembali */
    header("location: login.php?stat=salah");
}
}
}
  ?>
