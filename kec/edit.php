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
                <h1>Edit Data Kecamatan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Data Kecamatan</li>
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
                    <h3 class="card-title">Form Edit Kecamatan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php
                $id_kec = $_GET['id'];
                $sql = $conn->query("SELECT * FROM tb_kec WHERE id_kec='$id_kec'");
                $edit_data = $sql->fetch_assoc();
                ?>
                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="kec" class="col-sm-3 col-form-label">Kecamatan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="kec" name="kec" value="<?= $edit_data['kec']; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-info">Submit</button>
                        <a href="?page=kec" class="btn btn-default float-right">Cancel</a>
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
$kec = mysqli_real_escape_string($conn, $_POST['kec']);
if (isset($_POST['edit'])) {
    $sql = $conn->query("UPDATE tb_kec SET kec='$kec' WHERE id_kec='$id_kec'");
    if ($sql) {
?>
        <script>
            alert("Data berhasil diubah...!");
            window.location.href = "?page=kec";
        </script>
<?php
    }
}

?>