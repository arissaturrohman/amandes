<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Edit Data Pendidikan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Edit Data Pendidikan</li>
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
                    <h3 class="card-title">Form Edit Pendidikan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <?php
                $id_pend = $_GET['id'];
                $sql = $conn->query("SELECT * FROM tb_pendidikan WHERE id_pend='$id_pend'");
                $edit_data = $sql->fetch_assoc();
                ?>
                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="<?= $edit_data['pendidikan']; ?>">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="edit" class="btn btn-info">Submit</button>
                        <a href="?page=pendidikan" class="btn btn-default float-right">Cancel</a>
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

$pend = mysqli_real_escape_string($conn, $_POST['pendidikan']);
if (isset($_POST['edit'])) {
    $sql = $conn->query("UPDATE tb_pendidikan SET pendidikan='$pend' WHERE id_pend='$id_pend'");
    if ($sql) {
?>
        <script>
            alert("Data berhasil diubah...!");
            window.location.href = "?page=pendidikan";
        </script>
<?php
    }
}

?>