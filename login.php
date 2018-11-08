<?php
  if (isset($_POST['login'])) {
    echo '<script>alert("SIP")</script>';
  }
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title>Login | Azarine Bag</title>
    <!-- Import Link -->
    <?php include('lib/php/link.php') ?>
    <!-- End Import Link -->
    <style>
      * {
        box-sizing: border-box;
      }
      .bgLogin {
        position: fixed;
        top: 0px;
        width: 100%;
        height: 100%;
      }
      .bgLogin .full {
        background-image: url('lib/img/index2.jpeg');
        background-size: cover;
      }
      .bgLogin>div {
        position: fixed;
        top: 0px;
        width: 100%;
        height: 100%;
        background-size: cover, cover;
      }
      .outer {
        display: table;
        position: absolute;
        min-width: 100%;
        margin-top: 10%;
      }
      .loginCenter {
        border-radius: 20px;
        margin-left: 25%;
        margin-right: 25%;
      }
    </style>
  </head>
  <body>
    <div class="container-fuild">
      <div class="bgLogin">
        <div class="full">
        </div>
      </div>
      <div class="row outer">
        <div class="col-xs">
          <div class="card loginCenter">
            <div class="card-header">
              <h5 class="card-title text-primary fontFamily" id="exampleModalLabel" style="font-size: 40px; text-align: center;">Login</h5>
            </div>
            <div class="card-body">
              <form name="formLogin" method="post" action="">
                <div class="form-group">
                  <label for="username">Username</label>
                  <input type="text" name="username" class="form-control" id="username" aria-describedby="usernameHelp" placeholder="Username" autocomplete="off" required>
                </div>
                <div class="form-group">
                  <label for="password">Password</label>
                  <input type="password" name="password" class="form-control" id="password" placeholder="Password" required>
                </div>
                <small>Belum punya akun, silahkan <a href="daftar.php">Daftar</a></small>
                <div class="form-group text-center pt-4" style="border-top: 1px solid #e9ecef;">
                  <a class="btn btn-outline-secondary" href="index.php" role="button">Kembali</a>
                  <button type="submit" name="login" class="btn btn-outline-primary">Login</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- Import Link2 -->
    <?php include('lib/php/link2.php') ?>
    <!-- End Import Link2 -->
  </body>
</html>
