<?php
error_reporting(E_ALL ^ (E_NOTICE));
  include "dist/koneksi.php";
  include "email/email.php";

  $kode=addslashes($_POST['_kode']);
  $nim=addslashes($_POST['_NIM']);
  $nm=addslashes($_POST['_nm_mahasiswa']);
  $ruang=addslashes($_POST['_ruangan']);
  $wali=addslashes($_POST['_dosen_wali']);
  $uji1=addslashes($_POST['_dosenuji1']);
  $uji2=addslashes($_POST['_dosenuji2']);
  $jdl=addslashes($_POST['_judul_KKPorPI']);
  $email=addslashes($_POST['_email']);
  $konf=addslashes($_POST['_konf']);
  $kurang=addslashes($_POST['_kurang']);
  $tanggal_maju=addslashes($_POST['_tanggal_maju']);
  $waktu=addslashes($_POST['_waktu']);
  $status="Menunggu selesai seminar";

    /*Jika persyaratan kepada sekprodi tidak lengkap */
    if($konf=='tdK'){
      if(empty($nim) || empty($kode) || empty($kurang) || empty($konf)){
        echo "<script>window.alert('Data Kosong!')
       window.location='../admin_page/index2.php?ke=kkP_konfruang&kode=$kode'</script>";
     }else{

             $ambil=$link->query("SELECT file_persyaratan2, file_persyaratan FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'");
         $take=$ambil->fetch_array();
         $syarat=$take['file_persyaratan2'];
         $syarat2=$take['file_persyaratan'];
         $loc='../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_sekprod/';
         unlink($loc.$syarat);
      $qry=$link->query("DELETE FROM tblseminar_kkp WHERE kode_daftar='$kode'");
      /* Script Email pendaftaran tidak diterima */
      $mail->addAddress("$email");
      $mail->Subject = 'Status Pendaftaran Tanggal Seminar KKP';
      $mail->Body=
  "Pendaftaran Tanggal dan Waktu Seminar KKP anda tidak dapat diterima dikarenakan adanya persyaratan yang kurang yaitu:

  - $kurang

  Silahkan segera melakukan pendaftaran Tanggal dan Waktu kembali dengan persyaratan yang sudah lengkap.

  -$_SESSION[level] Sistem Informasi";
    //passing the SSL Certificate
    $mail->SMTPOptions = array(
        'ssl' => array(
            'verify_peer' => false,
            'verify_peer_name' => false,
            'allow_self_signed' => true
        )
    );
    $mail->send();

      echo "<script>window.alert('Data Berhasil Dihapus!')
     window.location='../admin_page/index2.php?ke=kkP_ruang'</script>";
     /*jika persyaratan lengkap */
}
}elseif($konf=='y4'){
      if(empty($nim) || empty($kode) || empty($ruang) || empty($konf)){
        echo "<script>window.alert('Data Kosong!')
       window.location='../admin_page/index2.php?ke=P1_konfruang&kode=$kode'</script>";
     }else{
       /*Mencari Ruangan yang kosong */
       if(empty($ruang)){
         echo "<script>window.alert('Data Kosong!')
         window.location='index2.php?ke=kkP_konfruang&kode=$kode'</script>";
       }else{
         $cekruangan=$link->query("SELECT * FROM tblseminar_2 WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminar2='".$status."'");
         if(mysqli_num_rows($cekruangan)>0){
           echo "<script>window.alert('Ruangan Tidak Tersedia')
           window.location='index2.php?ke=kkP_konfruang&kode=$kode'</script>";
         }else{
           $cekruangan=$link->query("SELECT * FROM tblseminar_pendadaran WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_pendadaran='".$status."'");
           if(mysqli_num_rows($cekruangan)>0){
             echo "<script>window.alert('Ruangan Tidak Tersedia')
             window.location='index2.php?ke=kkP_konfruang&kode=$kode'</script>";
           }else{
             $cekruangan=$link->query("SELECT * FROM tblseminar_kkp WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarkkp='".$status."'");
             if(mysqli_num_rows($cekruangan)>0){
               echo "<script>window.alert('Ruangan Tidak Tersedia')
               window.location='index2.php?ke=kkP_konfruang&kode=$kode'</script>";
         }else{
           $cekruangan=$link->query("SELECT * FROM tblseminar_pi WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarpi='".$status."'");
           if(mysqli_num_rows($cekruangan)>0){
             echo "<script>window.alert('Ruangan Tidak Tersedia')
             window.location='index2.php?ke=kkP_konfruang&kode=$kode'</script>";
         }else{
           $cekruangan=$link->query("SELECT * FROM tblseminar_proposal WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarproposal='".$status."'");
           if(mysqli_num_rows($cekruangan)>0){
             echo "<script>window.alert('Ruangan Tidak Tersedia')
             window.location='index2.php?ke=kkP_konfruang&kode=$kode'</script>";
         }else{


$qry=$link->query("UPDATE tblseminar_kkp SET
  ruangan='$ruang',
  hasil_seminarkkp='$status'
WHERE kode_daftar='$kode' ") or die (mysqli_error());

/*Delete file persyaratan jika sudah konfirmasi*/

  $ambil=$link->query("SELECT file_persyaratan2, file_persyaratan FROM tbldaftarseminar_kkporpi WHERE kode_daftar='$kode'");
  $take=$ambil->fetch_array();
  $syarat=$take['file_persyaratan2'];
  $syarat2=$take['file_persyaratan'];
  $loc='../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_sekprod/';
  unlink($loc.$syarat);

  $loc2='../admin_page/files_upload/seminar_file/seminarKKP-PI_Persyaratan/untuk_kaprodi/';
  unlink($loc2.$syarat2);

  $mail->addAddress("$email");
  $mail->Subject = 'Status Ruangan Seminar KKP';
  $mail->Body=
"Pengajuan Tanggal dan waktu seminar KKP anda telah diterima. Berikut adalah detail pendaftaran seminar anda:

NIM                         : $nim
Nama Mahasiswa   : $nm
Judul KKP                  : $jdl

Dosen Wali/Pembimbing   : $wali
Dosen Penguji 1      : $uji1
Dosen Penguji 2      : $uji2
Tanggal seminar      : $tanggal_maju
waktu                       : $waktu
Ruangan                  : Ruang $ruang

Silahkan segera ke ruangan Program Studi Sistem Informasi untuk mengambil undangan seminar. Semoga Sukses!

Tertanda

-$_SESSION[level] Sistem Informasi";
//passing the SSL Certificate
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->send();
echo "<script>window.alert('Data Berhasil Disimpan dan Email Berhasil Dikirim!')
window.location='../admin_page/index2.php?ke=kkP_jdwl'</script>";
}
}
}
}
}
}
}
}
 ?>
