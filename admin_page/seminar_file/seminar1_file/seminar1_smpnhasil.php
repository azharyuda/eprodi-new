<?php
error_reporting(E_ALL ^ (E_NOTICE));
 include "dist/koneksi.php";
 include "email/email.php";
    $kode=addslashes($_POST['_daftar']);
     $NIM=addslashes($_POST['_NIM']);
     $sem1=addslashes($_POST['_hasil_seminarproposal']);
     $tanggal_maju=addslashes($_POST['_tanggal_maju']);
     $email=addslashes($_POST['_email']);
     $jdl=addslashes($_POST['_judul_skripsi']);
     $tpk=addslashes($_POST['_tpk']);
     $dosbing1=addslashes($_POST['_dosbing1']);
     $dosbing2=addslashes($_POST['_dosbing2']);
     $uj1=addslashes($_POST['_uji1']);

     $ambil1=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$dosbing1'");
     $take1=$ambil1->fetch_array();

     $ambil2=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$dosbing2'");
     $take2=$ambil2->fetch_array();

     $ambil3=$link->query("SELECT NIDN from tbldosen WHERE nm_dosen='$uji1'");
     $take3=$ambil3->fetch_array();

     $nidndosbing1=$take1['NIDN'];
     $nidndosbing2=$take2['NIDN'];
     $nidnuji1=$take3['NIDN'];

$qry=$link->query("SELECT * FROM tblseminar_proposal WHERE NIM='$NIM'
  AND hasil_seminarproposal='Tidak Lulus'
  OR hasil_seminarproposal='Ulang'");
if(mysqli_num_rows($qry)>0){
  if(empty($sem1) || empty($kode) || empty($NIM)){
    echo "<script>window.alert('Data Kosong!')
   window.location='index2.php?ke=semh4s_hsl&kd=$kode'</script>";
 }else{
  $qry=$link->query("UPDATE tblseminar_proposal SET
    hasil_seminarproposal='$sem1'
  WHERE NIM='$NIM'") or die(mysqli_error());

  $qry=$link->query("DELETE FROM tblseminar_proposal WHERE kode_daftar='$kode'");

  $mail->addAddress("$email");
  $mail->Subject = 'Hasil Seminar Proposal';
  if($sem1=='Tidak Lulus'){
  $mail->Body=
"Berdasarkan penilaian dari seminar Proposal yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Proposal anda adalah:

$sem1

Tetap semangat dan jangan menyerah!

Tertanda

-$_SESSION[level] Sistem Informasi";
    $kuota1=$link->query("UPDATE tbldosen SET kuota_pembimbing1=kuota_pembimbing1+1 WHERE NIDN='$nidndosbing1'");
    $kuota2=$link->query("UPDATE tbldosen SET kuota_pembimbing2=kuota_pembimbing2+1 WHERE NIDN='$nidndosbing2'");
    $kuota3=$link->query("UPDATE tbldosen SET kuota_penguji1=kuota_penguji1+1 WHERE NIDN='$nidnuji1'");

    $qry=$link->query("UPDATE tblmahasiswa SET
    id_topik='Belum Ada',
    judul_skripsi='Belum Ada',
    dosbing1='Belum Ada',
    dosbing2='Belum Ada',
    dosen_penguji1='Belum Ada' WHERE NIM='$NIM'");


     $qry=$link->query("SELECT * FROM tblproposal_diterima WHERE NIM='$NIM'");
     $take=$qry->fetch_array();
     $nourut=$take['no_urut'];
     $idtopik=$take['id_topik'];
     $tgl=date("Y-m-d");

     $input=$link->query("INSERT INTO tblproposal_ditolak VALUES(
       '$nourut',
       '$NIM',
       '$idtopik',
       '$jdl',
       'Ditolak pada saat Seminar Proposal',
       '$tgl'
     )");

     $del=$link->query("DELETE FROM tblproposal_diterima WHERE no_urut='$nourut'");

}elseif($sem1=='Ulang'){
  $mail->Body=
"Berdasarkan penilaian dari seminar Proposal yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Proposal anda adalah:

$sem1

Segera mendaftarkan diri kembali!

Tertanda

-$_SESSION[level] Sistem Informasi";
}elseif($sem1=='Lulus'){
$mail->Body=
"Berdasarkan penilaian dari seminar Proposal yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Proposal anda adalah:

$sem1

Selamat untuk Anda!

Tertanda

-$_SESSION[level] Sistem Informasi";
}
//passing the SSL Certificate
$mail->SMTPOptions = array(
    'ssl' => array(
        'verify_peer' => false,
        'verify_peer_name' => false,
        'allow_self_signed' => true
    )
);
$mail->send();

echo "<script>window.alert('Berhasil input Hasil!')
window.location='index2.php?ke=sempr0_sudahmaju'</script>";



$qry=$link->query("DELETE FROM tbldaftarseminar_skripsi WHERE kode_daftar='$kode'");}
}
else{
     if(empty($sem1) || empty($kode) || empty($NIM)){
       echo "<script>window.alert('Data Kosong!')
      window.location='index2.php?ke=sempr0_hsl&kd=$kode'</script>";
    }else{
     $qry=$link->query("UPDATE tblseminar_proposal SET
       hasil_seminarproposal='$sem1'
     WHERE kode_daftar='$kode'") or die(mysqli_error());
     $qry2=$link->query("DELETE FROM tbldaftarseminar_skripsi WHERE NIM='$NIM'") or die(mysqli_error());

         $mail->addAddress("$email");
         $mail->Subject = 'Hasil Seminar Proposal';
         if($sem1=='Tidak Lulus'){
         $mail->Body=
     "Berdasarkan penilaian dari seminar Proposal yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Proposal anda adalah:

     $sem1

     Tetap semangat dan jangan menyerah!

     Tertanda

     -$_SESSION[level] Sistem Informasi";
     $kuota1=$link->query("UPDATE tbldosen SET kuota_pembimbing1=kuota_pembimbing1+1 WHERE NIDN='$nidndosbing1'");
     $kuota2=$link->query("UPDATE tbldosen SET kuota_pembimbing2=kuota_pembimbing2+1 WHERE NIDN='$nidndosbing2'");
     $kuota3=$link->query("UPDATE tbldosen SET kuota_penguji1=kuota_penguji1+1 WHERE NIDN='$nidnuji1'");

     $qry=$link->query("UPDATE tblmahasiswa SET
     id_topik='Belum Ada',
     judul_skripsi='Belum Ada',
     dosbing1='Belum Ada',
     dosbing2='Belum Ada',
     dosen_penguji1='Belum Ada' WHERE NIM='$NIM'");

     $qry=$link->query("SELECT * FROM tblproposal_diterima WHERE NIM='$NIM'");
     $take=$qry->fetch_array();
     $nourut=$take['no_urut'];
     $idtopik=$take['id_topik'];
     $tgl=date("Y-m-d");

     $input=$link->query("INSERT INTO tblproposal_ditolak VALUES(
       '$nourut',
       '$NIM',
       '$idtopik',
       '$jdl',
       'Ditolak pada saat Seminar Proposal',
       '$tgl'
     )");

     $del=$link->query("DELETE FROM tblproposal_diterima WHERE no_urut='$nourut'");

   }elseif($sem1=='Ulang'){
     $mail->Body=
   "Berdasarkan penilaian dari seminar Proposal yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Proposal anda adalah:

   $sem1

   Segera mendaftarkan diri kembali!

   Tertanda

   -$_SESSION[level] Sistem Informasi";
     }elseif($sem1=='Lulus'){
       $mail->Body=
       "Berdasarkan penilaian dari seminar Proposal yang telah dilaksanakan, kedua dosen penguji memustuskan bahwa hasil seminar Proposal anda adalah:

       $sem1

       Selamat untuk Anda!

       Tertanda

       -$_SESSION[level] Sistem Informasi";
     }
       //passing the SSL Certificate
       $mail->SMTPOptions = array(
           'ssl' => array(
               'verify_peer' => false,
               'verify_peer_name' => false,
               'allow_self_signed' => true
           )
       );
       $mail->send();
     echo "<script>window.alert('Berhasil input Hasil!')
     window.location='index2.php?ke=sempr0_sudahmaju'</script>";
     /* Kode Email
     -------------
     */
   }
}
 ?>
