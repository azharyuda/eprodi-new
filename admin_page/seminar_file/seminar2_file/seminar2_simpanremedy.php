<?php
error_reporting(E_ALL ^ (E_NOTICE));
          include "dist/koneksi.php";
          include "email/email.php";

          $kd=addslashes($_POST['_kode']);
          $nim=addslashes($_POST['_NIM']);
          $nm=addslashes($_POST['_nm_mahasiswa']);
          $email=addslashes($_POST['_email']);
          $dosbing1=addslashes($_POST['_dosbing1']);
          $dosbing2=addslashes($_POST['_dosbing2']);
          $uji1=addslashes($_POST['_dosenuji1']);
          $jdl=addslashes($_POST['_judul_skripsi']);
          $dosenusul=addslashes($_POST['_usulan_dosen']); /*usulan dosen penguji */
          $status="Sudah Dikonfirmasi";
          $syarat=addslashes($_POST['_syarat']); /*syarat yang tidka lengkap */
          $cek=addslashes($_POST['_cek']); /*cek syarat */
          $alasan=addslashes($_POST['_alasan_ubah']); /*alasan perubahan dosen */

          if(empty($cek)){
            echo "<script>window.alert('Data Kosong!')
           window.location='index2.php?ke=semh4s_konfremedy&kd=$kd'</script>";
          }elseif($cek=='nope'){
            if(empty($syarat) || empty($kd)) {
              echo "<script>window.alert('Data Kosong!')
              window.location='index2.php?ke=semh4s_konfremedy&kd=$kd'</script>";
            }else{
              $ambil=$link->query("SELECT persyaratan1, persyaratan2 FROM tbldaftarseminar_skripsi WHERE kode_daftar='$kd'");
$take5=$ambil->fetch_array();
$sarat=$take5['persyaratan1'];
$loc='../admin_page/files_upload/seminar_file/seminar2_persyaratan/untuk_kaprodi/';
unlink($loc.$sarat);
echo "<script>window.alert('Data Berhasil dihapus dan email berhasil dikirim!!')
window.location='index2.php?ke=home'</script>";
              $qry=$link->query("DELETE FROM tbldaftarseminar_skripsi WHERE kode_daftar='$kd'") or die (mysqli_error());
             /* Script Kirim Email Pendaftaran Tidak Diterima */
             $mail->addAddress("$email");
             $mail->Subject = 'Status Pendaftaran Ujian Ulang Seminar Hasil';
             $mail->Body=
"Pendaftaran Ujian Ulang Seminar Hasil anda tidak dapat diterima dikarenakan adanya persyaratan yang kurang yaitu:

- $syarat

Silahkan segera melakukan pendaftaran kembali dengan persyaratan yang sudah lengkap.

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


          }
        }elseif($cek=='yak'){
              $qry=$link->query("UPDATE tbldaftarseminar_skripsi SET
              status='$status'
              WHERE kode_daftar='$kd' ") or die (mysqli_error());

                $qry2=$link->query("UPDATE tblmahasiswa SET
                dosen_penguji2='$dosenusul' WHERE NIM='$nim'") or die(mysqli_error());

                $mail->addAddress("$email");
                $mail->Subject = 'Status Pendaftaran Ujian Ulang Seminar Hasil';
                $mail->Body=
"Pendaftaran Ujian Ulang Seminar Hasil anda telah diterima dengan detail sebagai berikut:

-NIM                               : $nim
-Nama Mahasiswa         : $nm
-Judul Skripsi          : $jdl
-Dosen Pembimbing 1        : $dosbing1
-Dosen Pembimbing 2        : $dosbing2
-Dosen Penguji 1           : $uji1
-Dosen Penguji 2           : $dosenusul

Silahkan segera mendaftarkan tanggal dan waktu seminar agar segera mendapatkan ruangan Seminar.

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
              echo "<script>window.alert('Data Berhasil tersimpan!!')
              window.location='index2.php?ke=home'</script>";

          }else{
            echo "<script>window.alert('Pilihan tidak tersedia')
            window.location='index2.php?ke=semh4s_konfremedy&kd=$kd'</script>";
        }
  ?>
