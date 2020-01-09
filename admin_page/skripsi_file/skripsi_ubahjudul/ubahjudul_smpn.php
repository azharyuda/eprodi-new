<?php
error_reporting(E_ALL ^ (E_NOTICE));
  include "dist/koneksi.php";
  include "email/email.php";


    /* status untuk email */
  $stat=addslashes(trim($_POST['_status']));
  /* ---- */
  $urut=addslashes(trim($_POST['_urut']));
  $nim=addslashes(trim($_POST['_NIM']));
  $usul=addslashes(trim($_POST['_usul']));
  $baru=addslashes(trim($_POST['_baru']));
  $email=addslashes($_POST['_mail']);
  $alasan=addslashes(trim($_POST['_alasanubah']));
  $tglupdate=date("Y-m-d");

  if($stat=='revisi'){
    if(empty($urut) || empty($nim) || empty($usul) || empty($alasan)){
      echo "<script>window.alert('Ada data yang kosong')
      window.location='../admin_page/index2.php?ke=ubahjdl_konf&urut=$urut'</script>";
    }else{
      $update=$link->query("UPDATE tblubah_judulskripsi
        SET status='Sudah dikonfirmasi',
        updated_at='$tglupdate'
        WHERE no_urut='$urut'") OR die(mysqli_error());

        $updatemhs=$link->query("UPDATE tblmahasiswa SET judul_skripsi='$usul' WHERE NIM='$nim'") OR die(mysqli_error());

        $propok=$link->query("UPDATE tblproposal_diterima SET judul_skripsi='$usul' WHERE NIM='$nim'") OR die(mysqli_error());

        $mail->addAddress("$email");
        $mail->Subject = 'Status Perubahan Judul Skripsi';
        $mail->Body=
"Perubahan judul skripsi yang anda ajukan yaitu:

-Judul Skripsi yang baru: $baru

Mendapat revisi. Dan judul yang diusulkan oleh Kaprodi adalah:

-Judul Skripsi baru yang diusulkan: $usul

Alasan revisi judul ini adalah: $alasan

Demikian pemberitahuan mengenai status perubahan judul Anda. Selamat berjuang, pejuang skripsi!

     -$_SESSION[level] Sistem Informasi";
     $mail->SMTPOptions = array(
         'ssl' => array(
             'verify_peer' => false,
             'verify_peer_name' => false,
             'allow_self_signed' => true
         )
     );
       $mail->send();
          echo "<script>window.alert('Data Berhasil Disimpan')
          window.location='../admin_page/index2.php?ke=home'</script>";

  }
  }elseif($stat=='terima'){
    if(empty($urut) || empty($nim) || empty($baru)){
      echo "<script>window.alert('Ada data yang kosong')
      window.location='../admin_page/index2.php?ke=ubahjdl_konf&urut=$urut'</script>";
    }else{
      $update=$link->query("UPDATE tblubah_judulskripsi SET status='Sudah dikonfirmasi', updated_at='$tglupdate'
      WHERE no_urut='$urut'") OR die(mysqli_error());

      $updatemhs=$link->query("UPDATE tblmahasiswa SET judul_skripsi='$baru' WHERE NIM='$nim'") OR die(mysqli_error());

      $propok=$link->query("UPDATE tblproposal_diterima SET judul_skripsi='$baru' WHERE NIM='$nim'") OR die(mysqli_error());

      $mail->addAddress("$email");
      $mail->Subject = 'Status Perubahan Judul Skripsi';
      $mail->Body=
"Perubahan judul skripsi yang anda ajukan yaitu:

-Judul Skripsi yang baru: $baru

Telah disetujui tanpa revisi. Silahkan untuk melanjutkan penelitian dengan judul baru tersebut.

Demikian pemberitahuan mengenai status perubahan judul Anda. Selamat berjuang, pejuang skripsi!

   -$_SESSION[level] Sistem Informasi";
   $mail->SMTPOptions = array(
       'ssl' => array(
           'verify_peer' => false,
           'verify_peer_name' => false,
           'allow_self_signed' => true
       )
   );
  $mail->send();
      echo "<script>window.alert('Data Berhasil Disimpan')
     window.location='../admin_page/index2.php?ke=home'</script>";
  }
  }


?>
