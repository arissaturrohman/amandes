<!-- Content Header (Page header) -->
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Data Desa</h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Data Desa</li>
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
                    <h3 class="card-title">Form Add Desa</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form class="form-horizontal" method="POST">
                    <div class="card-body">
                      <?php 
                      $sql = $conn->query("SELECT * FROM tb_kec");                      
                      ?>
                      <div class="form-group">
                        <label for="kec">Kecamatan</label>
                          <select name="kec" id="kec" class="form-control" >
                            <option value="">Pilih Kecamatan</option>
                            <?php while($data = $sql->fetch_assoc()){ ?>
                              <option value="<?= $data['id_kec']; ?>"><?= $data['kec']; ?></option>
                            <?php } ?>
                          </select>
                      </div>
                      <div class="form-group">
                          <label for="desa">Desa</label>
                              <input type="text" class="form-control" id="desa" name="desa" placeholder="Desa">                          
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" name="add" class="btn btn-info">Submit</button>
                        <a href="?page=desa" class="btn btn-default float-right">Cancel</a>
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

$kec  = $_POST['kec'];
$desa = $_POST['desa'];
if (isset($_POST['add'])) {
    $sql = $conn->query("INSERT INTO tb_desa (desa, id_kec) VALUES('$desa', '$kec')");
    if ($sql) {
?>
        <script>
            alert("Data berhasil ditambah...!");
            window.location.href = "?page=desa";
        </script>
<?php
    }
}

?>