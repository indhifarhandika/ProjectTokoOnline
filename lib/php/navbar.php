<?php
  $username = "Anon";
	echo '<!-- NavBar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand" href="#"><small><em>AzarineBag.id</em></small></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" id="navbarNavAltMarkup">
            <a class="nav-item nav-link text-white" href="#">Home</a>
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
                <small class="dropdown-item"><em>Username: '.$username.'</em></small>
                <a class="dropdown-item navHov" href="" data-toggle="modal" data-target="#exampleModal">Login</a>
                <a href="" class="dropdown-item navHov">Daftar</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </nav>
    <!-- End NavBar -->
    <!-- Modal untuk Login-->
    <div class="modal fade mt-5" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title text-primary fontFamily" id="exampleModalLabel" style="font-size: 40px;">Login</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form>
              <div class="form-group">
                <label for="username">Username</label>
                <input type="text" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Username" autocomplete="off" required>
              </div>
              <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" required>
              </div>
              <small>Belum punya akun, silahkan <a href="#">Daftar</a></small>
            </form>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-outline-primary">Login</button>
          </div>
        </div>
      </div>
    </div>
    <!-- End Modal -->
';
 ?>
