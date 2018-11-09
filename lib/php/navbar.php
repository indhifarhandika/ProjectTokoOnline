<?php
	echo '<!-- NavBar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><small style="color: #ffffff;"><em><strong><img src="lib/img/icon.ico">AzarineBag.id</strong></em></small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <a class="nav-item nav-link text-white" href="index.php">Home</a>
            <div class="nav-item dropdown">
              <a href="" class="nav-link dropdown-toggle text-white" id="proDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Produk</a>
              <div class="dropdown-menu" sty>
                <a href="" class="dropdown-item navHov">Tas Import</a>
                <a href="" class="dropdown-item navHov">Tas Eksport</a>
              </div>
            </div>
            <a class="nav-item nav-link text-white" href="#">Contact</a>
            <div class="nav-item dropdown">
              <a href="" class="nav-link pt-3 text-white" id="nDrop" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-user-circle" style="font-size: 25px;" title="User"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="nDrop">
                <small class="dropdown-item font-weight-bold"><em>Username: '.$username.'</em></small>
                <a class="dropdown-item navHov" href="login.php">Login</a>
                <a href="daftar.php" class="dropdown-item navHov">Daftar</a>
              </div>
            </div>
          </div>
      </div>
    </nav>
    <!-- End NavBar -->
';
 ?>
