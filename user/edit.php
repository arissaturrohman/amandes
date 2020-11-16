<?php
if (!isset($_SESSION["login"])) {
?>
    <script>
        window.location.href = '404.html';
    </script>
<?php
} ?>
<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data User</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Data User</li>
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
                    <h3 class="card-title">Form Edit User</h3>
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
                            <label for="username">Username</label>
                            <input type="text" class="form-control" value="<?= $data['username']; ?>" id="username" name="username" placeholder="Username" required>
                            <!-- </div>
                      <div class="form-group">
                          <label for="password">Password Lama</label>
                            <input type="password" class="form-control" id="password" name="password_lama" placeholder="Password Lama" required>                          
                      </div>
                      <div class="form-group">
                          <label for="password">Password Baru</label>
                            <input type="password" class="form-control" id="password" name="password_baru" placeholder="Password Baru" required>                          
                      </div> -->
                            <div class="form-group">
                                <label for="nama">Nama Desa</label>
                                <input type="text" value="<?= $data['nama']; ?>" class="form-control" id="nama" name="nama" placeholder="Nama Desa" required>
                            </div>
                            <div class="form-group">
                                <label for="level">Level</label>
                                <select class="form-control" id="level" name="level" required>
                                    <option>Pilih Level</option>
                                    <option <?php if ($data['level'] == 'admin') {
                                                echo "selected";
                                            } ?> value="admin">Administrator</option>
                                    <option <?php if ($data['level'] == 'user') {
                                                echo "selected";
                                            } ?> value="user">User</option>
                                </select>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="Y" name="status" value="Y" <?php if (in_array("Y", $data)) echo "checked"; ?>>
                                <label class="form-check-label" for="inlineRadio1">Aktif </label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="status" id="inlineRadio1" value="N" name="status" value="N" <?php if (in_array("N", $data)) echo "checked"; ?>>
                                <label class="form-check-label" for="inlineRadio1">Tidak Aktif</label>
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

if (isset($_POST['edit'])) {

    $username  = mysqli_real_escape_string($conn, $_POST['username']);
    // $password_lama  = mysqli_real_escape_string($conn, $_POST['password_lama']);
    // $password_lama  = mysqli_real_escape_string($conn, $_POST['password_baru']);
    $nama      = mysqli_real_escape_string($conn, $_POST['nama']);
    $level     = mysqli_real_escape_string($conn, $_POST['level']);
    $status    = mysqli_real_escape_string($conn, $_POST['status']);

    // $sql = $conn->query("SELECT * FROM tb_user WHERE username='$username'");

    // if (mysqli_num_rows($sql) === 1) {

    //     $row = mysqli_fetch_assoc($sql);
    //     if (password_verify($password_lama, $row['password'])) {


    //enkripsi password
    // $password_baru = password_hash($_POST["password_baru"], PASSWORD_DEFAULT);
    $sql_edit = $conn->query("UPDATE tb_user SET username='$username', nama='$nama', level='$level', status='$status' WHERE id_user='$id_user'");

    if ($sql_edit) {
?>
        <script type="text/javascript">
            alert("User berhasil diubah..!");
            window.location.href = "?page=user";
        </script>
<?php
    }
}
?>