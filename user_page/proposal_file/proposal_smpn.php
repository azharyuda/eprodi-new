<?php
  error_reporting(E_ALL);
  session_start();
  include "../dist/koneksi.php";
  $NIM=$_SESSION['NIM'];
  $nm=$_SESSION['nm_mahasiswa'];
  $alasan=htmlspecialchars(addslashes(trim($_POST['_alasan'])));
  $tglskrng=date("Y-m-d");
  $updateat=date("Y-m-d");

  $qry=$link->query("SELECT id_topik, judul_skripsi FROM tblmahasiswa WHERE NIM='$_SESSION[NIM]'");
  $take=$qry->fetch_array();
  $judul=$take['judul_skripsi'];
  $tpk=$take['id_topik'];
  $stat='Menunggu konfirmasi';

  if($alasan==''){
    echo "<script>window.alert('Data Berhasil Disimpan')
   window.location='../admin_page/index2.php?ke=home'</script>";
  }
    $qry=$link->query("INSERT INTO tblubah_proposal VALUES(
      '',
      '$NIM',
      '$tpk',
      '$judul',
      '$alasan',
      '$tglskrng',
      'Menunggu konfirmasi',
      '$updateat')") OR die(mysqli_error());
      echo "<script>window.alert('Data Berhasil Disimpan')
     window.location='../index.php?ke=home'</script>";

 ?>
