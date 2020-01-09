<?php
error_reporting(E_ALL ^ (E_NOTICE));
include "dist/koneksi.php";

include "email/email.php";

$NIM=addslashes($_POST['_NIM']);
$nm=addslashes($_POST['_nm_mahasiswa']);

$qry=$link->query("SELECT dosbing1, dosbing2, dosen_penguji1,dosen_penguji2 FROM tblmahasiswa WHERE NIM='$NIM'");
$take=$qry->fetch_array();
$dosbing1=$take['dosbing1'];
$dosbing2=$take['dosbing2'];
$uji1=$take['dosen_penguji1'];
$uji2=$take['dosen_penguji2'];
$kod=htmlspecialchars(addslashes(trim($_POST['_kod'])));
$email=addslashes($_POST['_email']);
$jdl=addslashes($_POST['_judul_skripsi']);
$tanggal_maju=addslashes($_POST['_tanggal_maju']);
$waktu=addslashes($_POST['_waktu']);
$ruang=addslashes($_POST['_ruangan']);
$konf=addslashes($_POST['_konf']);
$krg=addslashes($_POST['_kurang']);
$stat='Menunggu selesai seminar';
$convtgl=date('d F Y', strtotime($tanggal_maju));

if(empty($konf)){
  echo "<script>window.alert('Data Kosong!')
window.location='index2.php?ke=d4r_konf&kd=$kod'</script>";
}
if($konf=="tdK"){
  $ambil=$link->query("SELECT file_persyaratan, file_persyaratan2 FROM tbldaftar_pendadaran WHERE kode_daftar='$kod'");
$take=$ambil->fetch_array();
$syarat=$take['file_persyaratan2'];
$loc='../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_sekprod/';
unlink($loc.$syarat);
  $qry=$link->query("DELETE FROM tblseminar_pendadaran WHERE kode_daftar='$kod'") or die(mysqli_error());

      $mail->addAddress("$email");
      $mail->Subject = 'Status Pendaftaran Tanggal Pendadaran';
      $mail->Body=
"Pendaftaran Tanggal dan Waktu Pendadaran anda tidak dapat diterima dikarenakan adanya persyaratan yang kurang yaitu:

- $krg

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

    echo "<script>window.alert('Data Berhasil Dihapus')
    window.location='index2.php?ke=home'</script>";

  }elseif($konf=="y4"){

  if(empty($ruang)){
    echo "<script>window.alert('Data Kosong!')
    window.location='index2.php?ke=d4r_konf&kd=$kod'</script>";
  }else{
    $cekruangan=$link->query("SELECT * FROM tblseminar_2 WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminar2='".$stat."'");
    if(mysqli_num_rows($cekruangan)>0){
      echo "<script>window.alert('Ruangan Tidak Tersedia')
      window.location='index2.php?ke=d4r_konf&kd=$kod'</script>";
    }else{
      $cekruangan=$link->query("SELECT * FROM tblseminar_pendadaran WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_pendadaran='".$stat."'");
      if(mysqli_num_rows($cekruangan)>0){
        echo "<script>window.alert('Ruangan Tidak Tersedia')
        window.location='index2.php?ke=d4r_konf&kd=$kod'</script>";
      }else{
        $cekruangan=$link->query("SELECT * FROM tblseminar_kkp WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarkkp='".$stat."'");
        if(mysqli_num_rows($cekruangan)>0){
          echo "<script>window.alert('Ruangan Tidak Tersedia')
          window.location='index2.php?ke=d4r_konf&kd=$kod'</script>";
    }else{
      $cekruangan=$link->query("SELECT * FROM tblseminar_pi WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarpi='".$stat."'");
      if(mysqli_num_rows($cekruangan)>0){
        echo "<script>window.alert('Ruangan Tidak Tersedia')
        window.location='index2.php?ke=d4r_konf&kd=$kod'</script>";
    }else{
      $cekruangan=$link->query("SELECT * FROM tblseminar_proposal WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarproposal='".$stat."'");
      if(mysqli_num_rows($cekruangan)>0){
        echo "<script>window.alert('Ruangan Tidak Tersedia')
        window.location='index2.php?ke=d4r_konf&kd=$kod'</script>";
    }else{
    $qry=$link->query("UPDATE tblseminar_pendadaran SET
    ruangan='$ruang',
    hasil_pendadaran='$stat'
    WHERE kode_daftar='$kod'") or die(mysqli_error());

    $ambil=$link->query("SELECT file_persyaratan, file_persyaratan2 FROM tbldaftar_pendadaran WHERE kode_daftar='$kod'");
    $take=$ambil->fetch_array();
    $syarat=$take['file_persyaratan2'];
    $syarat2=$take['file_persyaratan'];
    $loc='../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_sekprod/';
    unlink($loc.$syarat);

    $loc2='../admin_page/files_upload/seminar_file/pendadaran_persyaratan/untuk_kaprodi/';
    unlink($loc2.$syarat2);
    $mail->addAddress("$email");
    $mail->Subject = 'Status Ruangan Pendadaran';
    $mail->Body=
"Pengajuan Tanggal dan waktu Pendadaran anda telah diterima. Berikut adalah detail pendaftaran seminar anda:

-NIM                               : $NIM
-Nama Mahasiswa         : $nm
-Judul Skripsi          : $jdl

-Dosen Pembimbing 1        : $dosbing1
-Dosen Pembimbing 2        : $dosbing2
-Dosen Penguji 1           : $uji1
-Dosen Penguji 2          : $uji2
-Tanggal Seminar          : $convtgl
-Waktu Seminar            : $waktu
-Ruangan                  : $ruang

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
        echo "<script>window.alert('Data Berhasil Disimpan')
        window.location='index2.php?ke=d4r_jdwl'</script>";

}
}
}
}
}
}
}

 ?>
