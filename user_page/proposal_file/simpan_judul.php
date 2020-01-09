<?php
  error_reporting(E_ALL);

  include "dist/koneksi.php";
  $NIM=$_SESSION['NIM'];
  $nm=$_SESSION['nm_mahasiswa'];
  $jdl=htmlspecialchars(addslashes(trim($_POST['_judul'])));
  $alasan=htmlspecialchars(addslashes(trim($_POST['_alasan'])));
  $tglskrng=date("Y-m-d");
  $updateat=date("Y-m-d");
  if(empty($NIM) || $jdl=="" || $alasan=="" || $nm==""){
    echo "<script>window.alert('Ada data yang kosong')
   window.location='../user_page/index.php?ke=ubah-jdl'</script>";
 }else{

  $qry=$link->query("SELECT judul_skripsi FROM tblmahasiswa WHERE NIM='$_SESSION[NIM]'");
  $take=$qry->fetch_array();
  $judul=$take['judul_skripsi'];
  if($jdl===$judul){
    echo "<script>window.alert('Judul skripsi yang baru sama dengna yang lama')
   window.location='../user_page/index.php?ke=ubah-jdl'</script>";
  }else{
    $qry=$link->query("INSERT INTO tblubah_judulskripsi VALUES(
      '',
      '$NIM',
      '$nm',
      '$judul',
      '$jdl',
      '$alasan',
      '$tglskrng',
      'Menunggu konfirmasi',
      '$updateat')") OR die(mysqli_error());
      echo "<script>window.alert('Data Berhasil disimpan!')
     window.location='../user_page/index.php?ke=home'</script>";
  }
}

 ?>
