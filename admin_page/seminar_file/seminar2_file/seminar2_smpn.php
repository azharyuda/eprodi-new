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
$kode=htmlspecialchars(addslashes(trim($_POST['_kod'])));
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
      echo "<script>window.alert('Data kosong!')
      window.location='index2.php?ke=semh4s_konf&kd=$kode'</script>";
    }
    if($konf=="tdK"){
      $ambil=$link->query("SELECT persyaratan1, persyaratan2 FROM tbldaftarseminar_skripsi WHERE kode_daftar='$kode'");
$take5=$ambil->fetch_array();
$syarat=$take5['persyaratan2'];
$loc='../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_sekprod/';
unlink($loc.$syarat);
      $qry=$link->query("DELETE FROM tblseminar_2 WHERE kode_daftar='$kode'") or die(mysqli_error());

          $mail->addAddress("$email");
          $mail->Subject = 'Status Pendaftaran Tanggal Seminar Hasil';
          $mail->Body=
"Pendaftaran Tanggal dan Waktu Seminar Hasil anda tidak dapat diterima dikarenakan adanya persyaratan yang kurang yaitu:

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
        window.location='index2.php?ke=semh4s_konf&kd=$kode'</script>";
      }else{
        $cekruangan=$link->query("SELECT * FROM tblseminar_proposal WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarproposal='".$stat."'");
        if(mysqli_num_rows($cekruangan)>0){
          echo "<script>window.alert('Ruangan Tidak Tersedia')
          window.location='index2.php?ke=semh4s_konf&kd=$kode'</script>";
        }else{
          $cekruangan=$link->query("SELECT * FROM tblseminar_2 WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminar2='".$stat."'");
          if(mysqli_num_rows($cekruangan)>0){
            echo "<script>window.alert('Ruangan Tidak Tersedia')
            window.location='index2.php?ke=semh4s_konf&kd=$kode'</script>";
          }else{
            $cekruangan=$link->query("SELECT * FROM tblseminar_pendadaran WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_pendadaran='".$stat."'");
            if(mysqli_num_rows($cekruangan)>0){
              echo "<script>window.alert('Ruangan Tidak Tersedia')
              window.location='index2.php?ke=semh4s_konf&kd=$kode'</script>";
        }else{
          $cekruangan=$link->query("SELECT * FROM tblseminar_kkp WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarkkp='".$stat."'");
          if(mysqli_num_rows($cekruangan)>0){
            echo "<script>window.alert('Ruangan Tidak Tersedia')
            window.location='index2.php?ke=semh4s_konf&kd=$kode'</script>";
        }else{
          $cekruangan=$link->query("SELECT * FROM tblseminar_pi WHERE tanggal_maju='".$tanggal_maju."' && waktu='".$waktu."' && ruangan='".$ruang."' && hasil_seminarpi='".$stat."'");
          if(mysqli_num_rows($cekruangan)>0){
            echo "<script>window.alert('Ruangan Tidak Tersedia')
            window.location='index2.php?ke=semh4s_konf&kd=$kode'</script>";
        }else{

                  $qry=$link->query("UPDATE tblseminar_2 SET
                  ruangan='$ruang',
                  hasil_seminar2='$stat'
                  WHERE kode_daftar='$kode'") or die(mysqli_error());

                /*Delete file persyaratan jika sudah konfirmasi*/

                $ambil=$link->query("SELECT persyaratan1, persyaratan2 FROM tbldaftarseminar_skripsi WHERE kode_daftar='$kode'");
                $take=$ambil->fetch_array();
                $syarat=$take['persyaratan2'];
                $syarat2=$take['persyaratan1'];
                $loc='../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_sekprod/';
                unlink($loc.$syarat);

                $loc2='../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_kaprodi/';
                unlink($loc2.$syarat2);
                $mail->addAddress("$email");
                $mail->Subject = 'Status Ruangan Seminar Hasil';
                $mail->Body=
"Pengajuan Tanggal dan waktu Seminar Hasil anda telah diterima. Berikut adalah detail pendaftaran seminar anda:

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
                    echo "<script>window.alert('Data Berhasil Disimpan dan Email Berhasil Dikirim!')
                    window.location='../admin_page/index2.php?ke=semh4s_jdwl'</script>";



        }
        }
      }
    }
    }
  }
  }
 ?>
