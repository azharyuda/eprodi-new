<?php
error_reporting(E_ALL ^ (E_NOTICE));
session_start();

	include "dist/koneksi.php";

  $uname=htmlspecialchars(addslashes(trim($_POST['_uname'])));

  $pass=htmlspecialchars(addslashes(trim($_POST['_passw'])));
   if($uname=='' || $pass==''){
        echo "<script>window.alert('NIM atau Password tidak diisi!')
     window.location='login.php'</script>";
    }else{


	$qry=$link->query(
	"SELECT * FROM tbluser WHERE username='$uname'") or die(mysqli_error());

  $ambil=$qry->fetch_array();
	if(empty($ambil)){
		header("location: login.php?stat=tidak-terdaftar");
	}else{
  if(password_verify($pass, $ambil['passw'])){
    /* Tempat direct ke halaman user */
    $_SESSION['username']=$ambil['username'];
		$_SESSION['passw']=$ambil['passw'];
		$_SESSION['level']=$ambil['level'];
		header("location: index");
  }else{
    /* direct ke halaman login kembali */
    header("location: login.php?stat=salah");
}
}
}
  ?>
