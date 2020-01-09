<?php
if(!isset($_GET['ke'])){
  include "home.php";
}else{
 $ke=$_GET['ke'];
 if($ke=='home'){include "home.php";}

 /*Pendaftaran KKP / PI */
 elseif($ke=='kkpi-daftar'){include "kkpi_file/kkpi_daftar.php";}
 elseif($ke=='kkpi-remedy'){include "kkpi_file/kkpi_remedy.php";}
 elseif($ke=='kkpi-ruang'){include "kkpi_file/kkpi_ruangan.php";}
 elseif($ke=='jdwl-KKp'){include "kkpi_file/kkpi_jadwalKKP.php";}
 elseif($ke=='jdwl-p1'){include "kkpi_file/kkpi_jadwalPI.php";}

 elseif($ke=='kkpi-smpndaftar'){include "../upload_files/kkpi_simpandaftar.php";}
 elseif($ke=='kkpi-remed'){include "../upload_files/kkpi_simpanremedy.php";}
 elseif($ke=='kkpi-tglsimpn'){include "../upload_files/kkpi_simpantgl.php";}

 /* Pengajuan Proposal Skripsi */
 elseif($ke=='proposal-aju'){include "proposal_file/proposal_pengajuan.php";}
elseif($ke=='proposal-smpn'){include "../upload_files/proposal_simpan.php";}

 elseif($ke=='skrip-alumni'){include "proposal_file/daftar_skripsi.php";}
 elseif($ke=='ubah-jdl'){include "proposal_file/judul_ubah.php";}
 elseif($ke=='smpn-jdlbaru'){include "proposal_file/simpan_judul.php";}
 elseif($ke=='proposal-ganti'){include "proposal_file/proposal_ubah.php";}
 elseif($ke=='daftar'){include "proposal_file/daftar_skripsi.php";}

 /* Pendaftaran Seminar Proposal */
 elseif($ke=='sempr0-dftr'){include "seminar1_file/seminar1_daftar.php";}
 elseif($ke=='sempr0-ruang'){include "seminar1_file/seminar1_ruangan.php";}
 elseif($ke=='jdwl-sempr0'){include "seminar1_file/seminar1_jadwal.php";}
 elseif($ke=='sempr0-ulang'){include "seminar1_file/seminar1_daftarremedy.php";}

 elseif($ke=='sempr0-smpndaftar'){include "../upload_files/sempro_dftrdosen.php";}
 elseif($ke=='sempr0-remed'){include "../upload_files/sempro_dftrremedy.php";}
 elseif($ke=='sempr0-tglsimpn'){include "../upload_files/sempro_simpandftr.php";}

 /* Pendaftaran Seminar Hasil */
 elseif($ke=='semhas-dftr'){include "seminar2_file/seminar2_daftar.php";}
 elseif($ke=='semhas-ulang'){include "seminar2_file/seminar2_remedy.php";}
 elseif($ke=='semhas-ruang'){include "seminar2_file/seminar2_ruang.php";}
 elseif($ke=='jdwl-semhas'){include "seminar2_file/seminar2_jadwal.php";}

 elseif($ke=='semhas-smpndaftar'){include "../upload_files/semhas_dftrdosen.php";}
 elseif($ke=='semhas-remed'){include "../upload_files/semhas_remedy.php";}
 elseif($ke=='semhas-tglsimpn'){include "../upload_files/semhas_simpandftr.php";}

 /* pendaftaran seminar Pendadaran */
 elseif($ke=='dadar-dftr'){include "pendadaran_file/dadar_daftar.php";}
 elseif($ke=='dadar-ruang'){include "pendadaran_file/dadar_ruang.php";}
 elseif($ke=='jdwl-dadar'){include "pendadaran_file/dadar_jadwal.php";}

 elseif($ke=='dadar-smpndaftar'){include "../upload_files/dadar_dftr.php";}
 elseif($ke=='dadar-tglsimpn'){include "../upload_files/dadar_simpandftr.php";}

 elseif($ke=='dosen-list'){include "dosen_file/dosen_daftar.php";}
 elseif($ke=='passw-gnti'){include "ubah_password.php";}
 elseif($ke=='passw-smpn'){include "ubah_passw_smpn.php";}
 elseif($ke=='petunjuk'){include "petunjuk_penggunaan.php";}
}
 ?>
