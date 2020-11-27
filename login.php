<?php

session_start();
include('inc/config.php');

error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));

if (isset($_POST['login'])) {
  $username       = $_POST['username'];
  $password       = $_POST['password'];

  $sql = $conn->query("SELECT * FROM tb_user WHERE username='$username' AND status='Y'");

  if (mysqli_num_rows($sql) === 1) {

    $row = mysqli_fetch_assoc($sql);
    if (password_verify($password, $row['password'])) {

      $_SESSION['login'] = true;
      if ($row['level']  == "admin") {
        $_SESSION['username'] = $username;
        $_SESSION['nama']     = $row['nama'];
        $_SESSION['id_user']  = $row['id_user'];
        $_SESSION['level']    = "admin";

        header('location:index.php');
        exit;
      } elseif ($row['level'] == "user") {
        $_SESSION['username'] = $username;
        $_SESSION['nama']     = $row['nama'];
        $_SESSION['id_user']  = $row['id_user'];
        $_SESSION['level']    = "user";

        header('location:index.php');
        exit;
      }
    }
  }

  $error = true;
}

?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>AdminLTE 3 | Log in</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="assets/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="assets/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      Amandes V.1.0
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign in to start your session</p>
        <?php if (isset($error)) : ?>
          <p style="color:red; font-style:italic; text-align:center;">Username / Password salah</p>
        <?php endif; ?>
        <form method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-user"></span>
              </div>
            </div>
          </div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" name="password" placeholder="Password">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-8"></div>
            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="login" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>
      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="assets/plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="assets/dist/js/adminlte.min.js"></script>

</body>

</html>