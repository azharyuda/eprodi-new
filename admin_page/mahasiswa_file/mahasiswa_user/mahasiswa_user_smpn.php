<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  include "dist/koneksi.php";
  include "email/email.php";


  $nim=addslashes($_POST['_NIM']);
  $id=addslashes($_POST['_id']);
  $stat=addslashes($_POST['_status_akun']); /* pengecekan apakah akun dapat diaktifkan apa tidak */
  $alasan=addslashes($_POST['_kurang']); /*alasan akun tidak aktif */
  $nama=addslashes($_POST['_nm_mahasiswa']);
  $email=addslashes($_POST['_email']);
  $aktif="Aktif";
  $tdk="Tidak Aktif";

  if($stat=='y4'){
    $alasan="";
    $qry=$link->query("UPDATE tblmahasiswa SET status_akun='$aktif' WHERE id='$id'") or die (mysql_error());
    $mail->addAddress("$email");
    $mail->Subject = 'Konfirmasi Akun Pengguna E-Prodi';
    $mail->Body=
"Akun Anda yang didaftarkan pada sistem E-Prodi dengan detail sebagai berikut:

-NIM: $nim
-Nama Mahasiswa: $nama

Sudah dapat digunakan. Silahkan melakukan login dan menggunakan layanan yang tersedia pada sistem E-Prodi.

Tertanda

-$_SESSION[level] Sistem Informasi";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->send();
echo "<script>window.alert('Data Berhasil Disimpan dan Email Berhasil Dikirim!')
window.location='../admin_page/index2.php?ke=mh5_dftr'</script>";
  }elseif($stat=='tdK'){
    $qry=$link->query("DELETE FROM tblmahasiswa WHERE id='$id'");
    $mail->addAddress("$email");
    $mail->Subject = 'Konfirmasi Akun Pengguna E-Prodi';
    $mail->Body=
"Mohon maaf, akun Anda yang didaftarkan pada sistem E-Prodi dengan detail sebagai berikut:

-NIM: $nim
-Nama Mahasiswa: $nama

Tidak dapat diaktifkan. Alasan tidak dapat diaktifkannya akun Anda adalah:

-$alasan

Silahkan melakukan pendaftaran kembali dengan memenuhi segala persyaratan yang tersedia

Tertanda

-$_SESSION[level] Sistem Informasi";
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->send();
echo "<script>window.alert('Data Berhasil Disimpan dan Email Berhasil Dikirim!')
window.location='../admin_page/index2.php?ke=mh5_dftr'</script>";
  }else{
    echo "<meta http-equiv='refresh' content='0; url=index2.php?ke=mh5_konf&urut=$id' />";
    echo "Silahkan input status akun";
  }
 ?>
