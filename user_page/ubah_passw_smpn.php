<?php
error_reporting(E_ALL);
include "dist/koneksi.php";
$lama=htmlspecialchars(addslashes(trim($_POST['_lama'])));
$passw=htmlspecialchars(addslashes(trim($_POST['_passw'])));
$konf=htmlspecialchars(addslashes(trim($_POST['_konf'])));

if($passw=='' || $konf=='' || $lama==''){
  echo "<script>window.alert('data kosong!')
 window.location='index.php?ke=passw-gnti'</script>";
}else{
  $old=$_SESSION['passw'];
  $NIM=$_SESSION['NIM'];

  $verif=password_verify($lama, $old);
  if($verif===TRUE){
    $newpass=password_hash($passw, PASSWORD_DEFAULT);
    $konfirm=password_verify($konf, $newpass);

    if($konfirm===FALSE){
      echo "<script>window.alert('Password dan konfirmasi password tidak sesuai!')
     window.location='index.php?ke=passw-gnti'</script>";
    }else{
      if($passw===$lama){
        echo "<script>window.alert('Password baru sama dengan password lama!')
       window.location='index.php?ke=passw-gnti'</script>";}else{
      $qry=$link->query("UPDATE tblmahasiswa SET passw='$newpass' WHERE NIM='$NIM'");
      echo "<script>window.alert('Berhasil ganti password!')
     window.location='index.php?ke=passw-smpn'</script>";
      session_destroy();
    }
  }
  }else{
    echo "<script>window.alert('Password lama yang diinputkan tidak sesuai dengan yang tersimpan')
   window.location='index.php?ke=passw-gnti'</script>";

  }
}
 ?>
