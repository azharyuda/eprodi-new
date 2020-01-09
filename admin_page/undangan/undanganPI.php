<?php error_reporting(E_ALL);
include "../dist/koneksi.php";?>


<style>
  table {
      border-collapse: collapse;
      font-size: 15px;
  }

  table, td, th {
      border: 1px solid black;
  }
  body{
    margin-top: 3.5cm;
    margin-left: 2cm;
    margin-bottom: 4cm;
    margin-right: 2cm;
  }
</style>
<body style="font-size: 15px;">
  <link rel="stylesheet" href="bstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="bstrap/css/bootstrap.min.css" />


<?php
  $kode=addslashes($_POST['_daftar']);
  $nosurat=addslashes($_POST['_nosurat']);

  $qry=$link->query("SELECT *,tblmahasiswa.nm_mahasiswa FROM tblseminar_pi
    JOIN tblmahasiswa ON tblseminar_pi.NIM=tblmahasiswa.NIM WHERE kode_daftar='$kode'");
    $ambil=$qry->fetch_array();

    $nm=$ambil['nm_mahasiswa'];
    $nim=$ambil['NIM'];
    $doswal=$ambil['dosen_wali'];
    $jdl=$ambil['judul_pi'];
    $uji1=$ambil['dosen_uji1'];
    $uji2=$ambil['dosen_uji2'];
    $tglmaju=$ambil['tanggal_maju'];
    $jam=$ambil['waktu'];
    $ruang=$ambil['ruangan'];
    $tglskrng=date("d F Y");

    $tglmajudiambil=date("d F Y", strtotime($tglmaju));
    $day=date("D", strtotime($tglmaju));
      switch ($day) {
      case 'Sun' : $hari = "Minggu"; break;
      case 'Mon' : $hari = "Senin"; break;
      case 'Tue' : $hari = "Selasa"; break;
      case 'Wed' : $hari = "Rabu"; break;
      case 'Thu' : $hari = "Kamis"; break;
      case 'Fri' : $hari = "Jum'at"; break;
      case 'Sat' : $hari = "Sabtu"; break;
      default : $hari = "Kiamat";
    }

 ?>
 <b>Nomor&nbsp; &nbsp; &nbsp; :</b> <?php echo $nosurat; ?>
 <br />
 <br />
<b>Perihal&nbsp; &nbsp; &nbsp; :</b> Ujian Seminar Penulisan Ilmiah <?php echo "<b>$nm</b> <b>($nim)</b>"; ?>
 <br />
 <br />
 <br />
  Kepada Yth.
 <br />
   <b>Dosen Wali</b>
   <br />
    Bapak/Ibu <b><?php echo $doswal; ?></b>
   <br />
    Di -
<br />
    &nbsp; &nbsp; &nbsp; &nbsp; Tempat
   <br />
   <br />
   <br />
 Dengan Hormat,
<p>
  Sehubungan dengan pelaksanaan <b>Ujian Seminar Penulisan Ilmiah Jenjang S1 Sistem
  Informasi</b>, bersama ini kami mohon kesediaan Bapak/Ibu untuk dapat hadir pada acara
  Ujian Seminar Penulisan Ilmiah yang diadakan:
</p>
<p>
   Hari / tanggal &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;: <?php echo $hari.",&nbsp;".$tglmajudiambil; ?><br />
   Waktu &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pk <?php echo $jam; ?> Wita Selesai<br />
   Tempat &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ruang <?php echo $ruang; ?> STMIK Widya Cipta Dharma Samarinda<br />
</p>

<div>
  <table align="center">
    <thead>
      <tr>
        <th><b>Mahasiswa</b></th>
        <th><b>Pembimbing dan Penguji</b></th>
        <th><b>Judul KKP/PI</b></th>
      </tr>
    <tbody>
      <tr>
        <td rowspan="3" width="120">
          <center>
            <?php echo "$nm<br />($nim)";?>
          </center>
        </td>
        <td rowspan="3" width="350">
          &nbsp;<b>Pembimbing 1/Dosen Wali: </b><br />
          &nbsp;<?php echo $doswal;?><br /><br />
          &nbsp;<b>Penguji 1: </b><br />
          &nbsp;<?php echo $uji1;?><br /><br />
          &nbsp;<b>Penguji 2: </b><br />
          &nbsp;<?php echo $uji2;?><br />
        </td>
        <td rowspan="3" width="240">
          <center>
            <?php echo $jdl;?>
          </center>
        </td>
      </tr>
    </tbody>
  </table>
  <br />
   Demikian hal ini kami sampaikan. Atas perhatiannya kami menghaturkan banyak terima kasih.
  <br />
  <br />
  <br />
   Samarinda, <b><?php echo $tglskrng; ?></b>
  <p>
     Ketua Program Studi Sistem Informasi
  </p>
  <br />
  <br />
  <b> <u>Dr. Heny Pratiwi,S.Kom.,M.Pd.,M.TI</u></b>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<b>Nomor&nbsp; &nbsp; &nbsp; :</b> <?php echo $nosurat; ?>
<br />
<br />
<b>Perihal&nbsp; &nbsp; &nbsp; :</b> Ujian Seminar Penulisan Ilmiah <?php echo "<b>$nm</b> <b>($nim)</b>"; ?>
<br />
<br />
<br />
 Kepada Yth.
<br />
  <b>Dosen Penguji 1</b>
  <br />
   Bapak/Ibu <b><?php echo $uji1; ?></b>
  <br />
   Di -
<br />
   &nbsp; &nbsp; &nbsp; &nbsp; Tempat
  <br />
  <br />
  <br />
Dengan Hormat,
<p>
 Sehubungan dengan pelaksanaan <b>Ujian Seminar Penulisan Ilmiah Jenjang S1 Sistem
 Informasi</b>, bersama ini kami mohon kesediaan Bapak/Ibu untuk dapat hadir pada acara
 Ujian Seminar Penulisan Ilmiah yang diadakan:
</p>
<p>
  Hari / tanggal &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;: <?php echo $hari.",&nbsp;".$tglmajudiambil; ?><br />
  Waktu &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pk <?php echo $jam; ?> Wita Selesai<br />
  Tempat &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ruang <?php echo $ruang; ?> STMIK Widya Cipta Dharma Samarinda<br />
</p>

<div>
 <table align="center">
   <thead>
     <tr>
       <th><b>Mahasiswa</b></th>
       <th><b>Pembimbing dan Penguji</b></th>
       <th><b>Judul KKP/PI</b></th>
     </tr>
   <tbody>
     <tr>
       <td rowspan="3" width="120">
         <center>
           <?php echo "$nm<br />($nim)";?>
         </center>
       </td>
       <td rowspan="3" width="350">
         &nbsp;<b>Pembimbing 1/Dosen Wali: </b><br />
         &nbsp;<?php echo $doswal;?><br /><br />
         &nbsp;<b>Penguji 1: </b><br />
         &nbsp;<?php echo $uji1;?><br /><br />
         &nbsp;<b>Penguji 2: </b><br />
         &nbsp;<?php echo $uji2;?><br />
       </td>
       <td rowspan="3" width="240">
         <center>
           <?php echo $jdl;?>
         </center>
       </td>
     </tr>
   </tbody>
 </table>
 <br />
  Demikian hal ini kami sampaikan. Atas perhatiannya kami menghaturkan banyak terima kasih.
 <br />
 <br />
 <br />
  Samarinda, <b><?php echo $tglskrng; ?></b>
 <p>
    Ketua Program Studi Sistem Informasi
 </p>
 <br />
 <br />
 <b> <u>Dr. Heny Pratiwi,S.Kom.,M.Pd.,M.TI</u></b>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<b>Nomor&nbsp; &nbsp; &nbsp; :</b> <?php echo $nosurat; ?>
<br />
<br />
<b>Perihal&nbsp; &nbsp; &nbsp; :</b> Ujian Seminar Penulisan Ilmiah <?php echo "<b>$nm</b> <b>($nim)</b>"; ?>
<br />
<br />
<br />
 Kepada Yth.
<br />
  <b>Dosen Penguji 2</b>
  <br />
   Bapak/Ibu <b><?php echo $uji2; ?></b>
  <br />
   Di -
<br />
   &nbsp; &nbsp; &nbsp; &nbsp; Tempat
  <br />
  <br />
  <br />
Dengan Hormat,
<p>
 Sehubungan dengan pelaksanaan <b>Ujian Seminar Penulisan Ilmiah Jenjang S1 Sistem
 Informasi</b>, bersama ini kami mohon kesediaan Bapak/Ibu untuk dapat hadir pada acara
 Ujian Seminar Penulisan Ilmiah yang diadakan:
</p>
<p>
  Hari / tanggal &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;: <?php echo $hari.",&nbsp;".$tglmajudiambil; ?><br />
  Waktu &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pk <?php echo $jam; ?> Wita Selesai<br />
  Tempat &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ruang <?php echo $ruang; ?> STMIK Widya Cipta Dharma Samarinda<br />
</p>

<div>
 <table align="center">
   <thead>
     <tr>
       <th><b>Mahasiswa</b></th>
       <th><b>Pembimbing dan Penguji</b></th>
       <th><b>Judul KKP/PI</b></th>
     </tr>
   <tbody>
     <tr>
       <td rowspan="3" width="120">
         <center>
           <?php echo "$nm<br />($nim)";?>
         </center>
       </td>
       <td rowspan="3" width="350">
         &nbsp;<b>Pembimbing 1/Dosen Wali: </b><br />
         &nbsp;<?php echo $doswal;?><br /><br />
         &nbsp;<b>Penguji 1: </b><br />
         &nbsp;<?php echo $uji1;?><br /><br />
         &nbsp;<b>Penguji 2: </b><br />
         &nbsp;<?php echo $uji2;?><br />
       </td>
       <td rowspan="3" width="240">
         <center>
           <?php echo $jdl;?>
         </center>
       </td>
     </tr>
   </tbody>
 </table>
 <br />
  Demikian hal ini kami sampaikan. Atas perhatiannya kami menghaturkan banyak terima kasih.
 <br />
 <br />
 <br />
  Samarinda, <b><?php echo $tglskrng; ?></b>
 <p>
    Ketua Program Studi Sistem Informasi
 </p>
 <br />
 <br />
 <b> <u>Dr. Heny Pratiwi,S.Kom.,M.Pd.,M.TI</u></b>
</div>
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<br />
<b>Nomor&nbsp; &nbsp; &nbsp; :</b> <?php echo $nosurat; ?>
<br />
<br />
<b>Perihal&nbsp; &nbsp; &nbsp; :</b> Ujian Seminar Penulisan Ilmiah <?php echo "<b>$nm</b> <b>($nim)</b>"; ?>
<br />
<br />
<br />
 Kepada Yth.
<br />
  <b>Kepala Mekanik</b>
  <br />
   Di -
<br />
   &nbsp; &nbsp; &nbsp; &nbsp; Tempat
  <br />
  <br />
  <br />
Dengan Hormat,
<p>
 Sehubungan dengan pelaksanaan <b>Ujian Seminar Penulisan Ilmiah Jenjang S1 Sistem
 Informasi</b>, bersama ini kami mohon kesediaan Bapak untuk dapat menyiapkan ruangan dan peralatan yang lainnya untuk
 Ujian Seminar Penulisan Ilmiah yang diadakan pada:
</p>
<p>
  Hari / tanggal &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;: <?php echo $hari.",&nbsp;".$tglmajudiambil; ?><br />
  Waktu &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;: Pk <?php echo $jam; ?> Wita Selesai<br />
  Tempat &nbsp; &nbsp;&nbsp; &nbsp; &nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: Ruang <?php echo $ruang; ?> STMIK Widya Cipta Dharma Samarinda<br />
</p>

<div>
 <table align="center">
   <thead>
     <tr>
       <th><b>Mahasiswa</b></th>
       <th><b>Pembimbing dan Penguji</b></th>
       <th><b>Judul KKP/PI</b></th>
     </tr>
   <tbody>
     <tr>
       <td rowspan="3" width="120">
         <center>
           <?php echo "$nm<br />($nim)";?>
         </center>
       </td>
       <td rowspan="3" width="350">
         &nbsp;<b>Pembimbing 1/Dosen Wali: </b><br />
         &nbsp;<?php echo $doswal;?><br /><br />
         &nbsp;<b>Penguji 1: </b><br />
         &nbsp;<?php echo $uji1;?><br /><br />
         &nbsp;<b>Penguji 2: </b><br />
         &nbsp;<?php echo $uji2;?><br />
       </td>
       <td rowspan="3" width="240">
         <center>
           <?php echo $jdl;?>
         </center>
       </td>
     </tr>
   </tbody>
 </table>
 <br />
  Demikian hal ini kami sampaikan. Atas perhatiannya kami menghaturkan banyak terima kasih.
 <br />
 <br />
 <br />
  Samarinda, <b><?php echo $tglskrng; ?></b>
 <p>
    Ketua Program Studi Sistem Informasi
 </p>
 <br />
 <br />
 <b> <u>Dr. Heny Pratiwi,S.Kom.,M.Pd.,M.TI</u></b>
</div>
</body>
<script src="dist/js/jquery.min.js"></script>
<script src="dist/js/JQueryValidation/jquery.validate.js"></script>
<script src="dist/js/JQueryValidation/additional-methods.js"></script>
<script src="bstrap/js/bootstrap.js"></script>
