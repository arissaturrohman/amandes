<?php 

include('inc/config.php');

if (isset($_POST['regis'])) {
  $username  = mysqli_real_escape_string($conn, $_POST['username']);
  $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
  $level     = mysqli_real_escape_string($conn, $_POST['level']);
  $status    = "Y";

    //enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $sql = $conn->query("INSERT INTO tb_user (username, password, nama, level) VALUES(        
        '$username',
        '$password',
        '$nama',
        '$level'
    )");

    if ($sql) {
        ?>
        <script type="text/javascript">
          alert("User berhasil ditambahkan..!");
          window.location.href="index.php";
        </script>
        <?php
    }
}
?>



<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Registrasi</title>
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
    Registrasi
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <form method="POST">
        <div class="form-group mb-3">
          <input type="text" name="username" class="form-control" placeholder="Username" required>          
        </div>
        <div class="form-group mb-3">
          <input type="password" name="password" class="form-control" placeholder="Password" required>          
        </div>
        <div class="form-group mb-3">
          <input type="text" name="nama" class="form-control" placeholder="Nama Lengkap" required>          
        </div>
        <div class="form-group">
          <select name="level" class="form-control" required>
              <option>Pilih Level</option>
              <option value="admin">Admin</option>
              <option value="user">User</option>
          </select>
        </div>
        <div class="row">
          <div class="col-8"></div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" name="regis" class="btn btn-primary btn-block">Registrasi</button>
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
