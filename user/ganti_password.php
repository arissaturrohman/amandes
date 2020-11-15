<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Password</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Password</li>
                </ol>
            </div>
        </div>
    </div><!-- /.container-fluid -->
</section>

<!-- Main content -->
<section class="content">
    <!-- Horizontal Form -->
    <div class="row">
        <div class="col-6">
            <div class="card card-info">
                <div class="card-header">
                    <h3 class="card-title">Form Edit Password</h3>
                </div>
                <!-- /.card-header -->
                <?php 
                $id_user = $_GET['id'];
                $sql = $conn->query("SELECT * FROM tb_user WHERE id_user=$id_user");
                $data = $sql->fetch_assoc();
                ?>
                <!-- form start -->
                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                      <div class="form-group">
                            <input type="hidden" class="form-control" name="username" value="<?= $data['username']; ?>">                          
                      </div>
                      <div class="form-group">
                          <label for="password">Password Lama</label>
                            <input type="password" class="form-control" id="password" name="password_lama" placeholder="Password Lama" required>                          
                      </div>
                      <div class="form-group">
                          <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password_baru" placeholder="Password Baru" required>                          
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-info">Submit</button>
                        <a href="?page=user" class="btn btn-default float-right">Cancel</a>
                    </div>
                    <!-- /.card-footer -->
                </form>
            </div>
            <!-- /.card -->
        </div>
    </div>
</section>
<!-- /.content -->

<?php
if (!isset($_POST['edit'])) {
    ?>
        <script>
            window.location.href='404.html';
        </script>
<?php
}
if (isset($_POST['edit'])) {

$username  = mysqli_real_escape_string($conn, $_POST['username']);
$password_lama  = mysqli_real_escape_string($conn, $_POST['password_lama']);

$sql = $conn->query("SELECT * FROM tb_user WHERE username='$username'");

if (mysqli_num_rows($sql) === 1) {

    $row = mysqli_fetch_assoc($sql);
    if (password_verify($password_lama, $row['password'])) {
      
    
    //enkripsi password
    $password_baru = password_hash($_POST["password_baru"], PASSWORD_DEFAULT);
    $sql_edit = $conn->query("UPDATE tb_user SET password='$password_baru' WHERE id_user='$id_user'");

    if ($sql_edit) {
        ?>
        <script type="text/javascript">
          alert("Password berhasil diubah..!");
          window.location.href="?page=user";
        </script>
        <?php
      } else {
        ?>
        <script type="text/javascript">
          alert("Password lama tidak sesuai..!");
        </script>
        <?php
      }
    }
  }
}
?>