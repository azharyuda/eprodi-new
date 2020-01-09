  <nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="index2.php?ke=home"><b>E-Prodi Sistem Informasi</b></a>
      </div>
      <div id="navbar">
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="color: #000;">Hello, <?php echo $_SESSION['level']; ?>
              <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="index2.php?ke=ubh-pass">Ubah Password Akun</a></li>
                  <li><a href="#"></a></li>
                  <li role="separator" class="divider"></li>
                  <li>
                    <a href="logout.php">Log Out</a>
                  </li>
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
