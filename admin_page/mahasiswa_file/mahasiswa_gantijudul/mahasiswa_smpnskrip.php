<?php
    include "dist\koneksi.php";
    use PHPMailer\PHPMailer\PHPMailer;
    require 'dist/vendor/autoload.php';
    $urut=addslashes($_POST['_urt']);
    $nim=addslashes($_POST['_NIM']);
    $stat=addslashes($_POST['_status_prop']);
    $alasan=addslashes($_POST['_alasan']);

    //$email=$_POST['email'];

    $passw='GipsyDangeR18244277';

    if($stat=='terima'){

      $qry="UPDATE tblubah_proposal SET status='Perubahan Proposal Diterima' WHERE no_urut='$urut'";
      $link->query($qry);

      if($qry){
        $del="UPDATE tblmahasiswa SET
        judul_skripsi='Belum Mengajukan Proposal',
        dosbing1='Belum Ada',
        dosbing2='Belum Ada',
        dosen_penguji1='Belum Ada',
        dosen_penguji2='Belum Ada' WHERE NIM='$nim'";
        $link->query($del);
      }
    }
    elseif($stat=='tidak'){
        $qry="UPDATE tblubah_proposal SET status='Perubahan Proposal Tidak Diterima Karena $alasan' WHERE no_urut='$urut'";
        $link->query($qry);
    }
    /*
      //Create a new PHPMailer instance
      $mail = new PHPMailer;
      //Pakai SMTP (Cari Pengertiannya nanti)
      $mail->isSMTP();
      $mail->IsHTML(true);
      //Debug SMTP. 0 untuk tidak ada pesan
      $mail->SMTPDebug = 0;
      //hostname
      $mail->Host = 'smtp.gmail.com';
      // $mail->Host = gethostbyname('smtp.gmail.com'); kalau SMTP ga support IPv6
      // port TLS untuk smtp gmail. bisa pakai 475 dan 25 (587)
      $mail->Port = 587;
      //sistem enkripsi yang digunakan
      $mail->SMTPSecure = 'tls';
      //Whether to use SMTP authentication
      $mail->SMTPAuth = true;
      //Username to use for SMTP authentication - use full email address for gmail
      $mail->Username = "azharyuda17@gmail.com";
      //Password to use for SMTP authentication
      $mail->Password =  "$passw";
      $mail->setFrom('azharyuda17@gmail.com', 'Azhar Yuda');
      $mail->addReplyTo('azharyuda17@gmail.com', 'Azhar Yuda');
      $mail->addAddress("$email");
      $mail->Subject = 'Konfirmasi Proposal';

      if($status_prop=='revisi'){
        $mail->Body="Bagian Revisi. nanti ada upload filenya";
      }

      else if($status_prop=='terima'){
        $mail->Body="Proposal skripsi anda yang berjudul: $judul_skripsi diterima. dan berikut ini adalah dosen penguji dan pembimbing anda yang disetujui:
        Dosen Pembimbing 1: $dosbing1
        Dosen Pembimbing 2: $dosbing2
        Dosen Penguji 1: $dosen_penguji1
        Dosen Penguji 2: $dosen_penguji2";
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
      if(!$mail){
        echo "<meta http-equiv='refresh' content='5; url=index2.php?ke=prop_konf&num=1' />";
      }
      elseif(!$qry){
        echo "<meta http-equiv='refresh' content='5; url=index2.php?ke=prop_konf&num=2' />";
      }
      elseif ((!$mail) && (!$qry)){
        echo "<meta http-equiv='refresh' content='5; url=index2.php?ke=prop_konf&num=2' />";
      }
      elseif (($mail) && ($qry)){ */
        echo "<meta http-equiv='refresh' content='5; url=index2.php?ke=mh5_jdl' />";
      //}
 ?>
