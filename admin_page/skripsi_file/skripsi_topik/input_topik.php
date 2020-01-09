<section class="main page-header">
  <h4><i class="fa fa-plus-circle fa-fw" style="color: #9150B4;"></i> Halaman Input Data Topik</h4>
  <ol class="breadcrumb">
    <li><i class="fa fa-dashboard fa-fw"> </i><a href="index2.php?ke=home"> Dashboard</a></li>
    <li><a href="index2.php?ke=tpK">Menu Topik</a>
    <li class="active">Input Topik</li>
  </ol>
</section>

<div class="panel panel-warning">
    <div class="panel-heading">
      <center>
        Input Data Topik Skripsi Mahasiswa
      </center>
    </div>
    <br />
    <form class="form-horizontal required" action="index2.php?ke=smpn_tpK" method="POST" id="frm-top">
      <div class="form-group">
        <label class="control-label col-sm-2">Kode Topik</label>
        <div class="col-sm-5">
          <input type="text" class="form-control required" name="_idtopik" placeholder="Masukkan Kode Topik">
        </div>
      </div>
      <div class="form-group">
        <label class="control-label col-sm-2">Topik Skripsi</label>
        <div class="col-sm-7">
          <input type="text" class="form-control required" name="_topik" placeholder="Masukkan Topik Skripsi">
          <br />
            <button type="submit" class="btn btn-success"><i class="fa fa-save fa-fw"></i> Simpan Data</button>
        </div>
      </div>
        </div>
      </div>
    </form>
  </div>
