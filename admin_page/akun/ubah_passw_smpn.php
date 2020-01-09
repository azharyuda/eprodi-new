<?php
error_reporting(E_ALL);
include "dist/koneksi.php";

$lama=htmlspecialchars(addslashes(trim($_POST['_lama'])));
$passw=htmlspecialchars(addslashes(trim($_POST['_passw'])));
$konf=htmlspecialchars(addslashes(trim($_POST['_konf'])));

if($passw=='' || $konf=='' || $lama==''){
  echo "<script>window.alert('Ada data yang kosong!!')
 window.location='index2.php?ke=ubh-pass'</script>";
}else{
  $old=$_SESSION['passw'];
  $uname=$_SESSION['username'];

  $verif=password_verify($lama, $old);
  if($verif===TRUE){
    $newpass=password_hash($passw, PASSWORD_DEFAULT);
    $konfirm=password_verify($konf, $newpass);

    if($konfirm===FALSE){
      echo "<script>window.alert('Password tidak mirip dengan konfirmasi!')
     window.location='index2.php?ke=ubh-pass'</script>";
    }else{
      $qry=$link->query("UPDATE tbluser SET passw='$newpass' WHERE username='$uname'");
      echo "<script>window.alert('Password Berhasil Diganti!')
     window.location='login.php'</script>";
      session_destroy();
    }
  }else{
    echo "<script>window.alert('Password baru sama dengan password lama!')
   window.location='index2.php?ke=ubh-pass'</script>";
  }
}
 ?>
