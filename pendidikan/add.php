<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Pendidikan</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Pendidikan</li>
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
                    <h3 class="card-title">Form Add Pendidikan</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                        <div class="form-group row">
                            <label for="pendidikan" class="col-sm-3 col-form-label">Pendidikan</label>
                            <div class="col-sm-5">
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Pendidikan">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="add" class="btn btn-info">Submit</button>
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

$pend = $_POST['pendidikan'];
if (isset($_POST['add'])) {
    $sql = $conn->query("INSERT INTO tb_pendidikan (pendidikan) VALUES('$pend')");
    if ($sql) {
?>
        <script>
            alert("Data berhasil ditambah...!");
            window.location.href = "?page=pendidikan";
        </script>
<?php
    }
}

?>